<?php
class Regimen_management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {
		$access_level = $this -> session -> userdata('user_indicator');
		
		$source = 0;
		if ($access_level == "pharmacist") {
			$source = $this -> session -> userdata('facility');
		}

		$data = array();
		$data['content_view'] = "regimen_listing_v";
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		
		$regimens = Regimen::getAllHydrated($source,$access_level);
		$tmpl = array ( 'table_open'  => '<table id="regimen_setting" class="table table-bordered setting_table">' );
		$this -> table ->set_template($tmpl);
		$this -> table -> set_heading('id', 'Regimen Code', 'Regimen Desc', 'Line', 'Regimen Category', 'Type Of Service', 'Options');
		
		
		foreach ($regimens as $regimen) {
			$links="";
			$drug = $regimen['id'];
			$type_of_service=$regimen['Regimen_Service_Type'];

			if($type_of_service!="ART" && $access_level!="system_administrator"){
				if($regimen['Enabled'] == 1){
					$links .= anchor('' . $regimen['id'], 'Edit', array('class' => 'edit_user','id'=>$regimen['id']));
					
				}
				
			}
			elseif($access_level=="system_administrator"){
				if($regimen['Enabled'] == 1){
					$links .= anchor('regimen_management/edit/' . $regimen['id'], 'Edit', array('class' => 'edit_user','id'=>$regimen['id']));
					
				}
			}
			
			if ($regimen['Enabled'] == 1 && $regimen['Merged_To']) {
				$links .= " | ";
				$links .= anchor('regimen_management/disable/' . $regimen['id'], 'Disable', array('class' => 'disable_user'));
		
			} 

			if ($regimen['Enabled'] == 1 && $regimen['Merged_To']=="" && $access_level == "system_administrator") {
				$links .= anchor('regimen_management/disable/' . $regimen['id'], 'Disable', array('class' => 'disable_user'));
				$links .= " | ";
				$links .= "<a href='#' class='merge_drug' id='$drug'>Merge</a>";
			}
			if ($regimen['Enabled'] == 0 && $access_level == "system_administrator"){
				$links .= anchor('regimen_management/enable/' . $regimen['id'], 'Enable', array('class' => 'enable_user'));
			}
			if ($regimen['Merged_To']) {
				if($access_level == "system_administrator"){
					$links .= " | ";
					$links .= anchor('regimen_management/unmerge/' . $regimen['id'], 'Unmerge', array('class' => 'unmerge_drug'));
				}
				$checkbox = "<input type='checkbox' name='drugcodes' id='drugcodes' value='$drug' disabled/>";

			} else {
				
				$checkbox = "<input type='checkbox' name='drugcodes' id='drugcodes' value='$drug'/>";
			}
			$this -> table -> add_row($regimen['id'], $checkbox . "&nbsp;" .$regimen['Regimen_Code'], $regimen['Regimen_Desc'], $regimen['Line'], $regimen['Regimen_Category'], $regimen['Regimen_Service_Type'], $links);
		}
		$data['access_level']=$access_level;
		$data['regimens'] = $this -> table -> generate();

		$data['regimen_categories'] = Regimen_Category::getAll();
		$data['regimen_service_types'] = Regimen_Service_Type::getAll();
		$this -> base_params($data);
	}

	public function save() {
		$access_level = $this -> session -> userdata('user_indicator');
		$source = 0;
		if ($access_level == "pharmacist") {
			$source = $this -> session -> userdata('facility');
		}
		$regimen = new Regimen();
		$regimen -> Regimen_Code = $this -> input -> post('regimen_code');
		$regimen -> Regimen_Desc = $this -> input -> post('regimen_desc');
		$regimen -> Category = $this -> input -> post('category');
		$regimen -> Line = $this -> input -> post('line');
		$regimen -> Type_Of_Service = $this -> input -> post('type_of_service');
		$regimen -> Remarks = $this -> input -> post('remarks');
		$regimen -> Enabled = "1";
		$regimen -> Source = $source;

		$regimen -> save();
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('message', $this -> input -> post('regimen_code') . ' was added.');
		redirect('regimen_management');
	}

	public function edit() {
		$regimen_id=$this -> input -> post('id');
		$data['regimens'] = Regimen::getHydratedRegimen($regimen_id);
		echo json_encode($data);
	}

	public function update() {
		$regimen_id = $this -> input -> post('regimen_id');		
		$regimen_Code = $this -> input -> post('regimen_code');
		$regimen_Desc = $this -> input -> post('regimen_desc');
		$category = $this -> input -> post('category');
		$line = $this -> input -> post('line');
		$type_Of_Service = $this -> input -> post('type_of_service');
		$remarks =str_replace("'","\'",$this -> input -> post('remarks'));

		$this -> load -> database();
		
		$query = $this -> db -> query("UPDATE regimen SET regimen_code='$regimen_Code',regimen_desc='$regimen_Desc',category='$category',line='$line',type_of_service='$type_Of_Service',remarks='$remarks' WHERE id='$regimen_id'");
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('message', $this -> input -> post('regimen_code') . ' was Updated');
		redirect('regimen_management');
	}

	public function enable($regimen_id) {
		$this -> load -> database();
        $query = $this -> db -> query("UPDATE regimen SET enabled='1'WHERE id='$regimen_id'");	
        $results = Regimen::getRegimen($regimen_id);
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('message', $results -> Regimen_Code . ' was enabled');
		redirect('regimen_management');
	}

	public function disable($regimen_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE regimen SET enabled='0'WHERE id='$regimen_id'");
		$results = Regimen::getRegimen($regimen_id);
		$this -> session -> set_userdata('message_counter', '2');
		$this -> session -> set_userdata('message', $results -> Regimen_Code . ' was disabled');
		redirect('regimen_management');
	}
	
	public function merge($primary_drugcode_id) {
		//Handle the array with all regimens that are to be merged
		$drugcodes = $_POST['drug_codes'];
		$drugcodes = array_diff($drugcodes, array($primary_drugcode_id));
		$drugcodes_to_remove = implode(",", $drugcodes);

		$this -> load -> database();
		//First Query that disables the regimen that are to be merged
		$the_query = "UPDATE regimen SET enabled='0',merged_to='$primary_drugcode_id' WHERE id IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Second Query that updates patient table start_regimen
		$the_query = "UPDATE patient SET start_regimen_merged_from=start_regimen,start_regimen='$primary_drugcode_id' WHERE start_regimen IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Third Query that updates patient table current_regimen
		$the_query = "UPDATE patient SET current_regimen_merged_from=current_regimen,current_regimen='$primary_drugcode_id' WHERE current_regimen IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Fourth Query that updates patient_visit table regimen
		$the_query = "UPDATE patient_visit SET regimen_merged_from=regimen,regimen='$primary_drugcode_id' WHERE regimen IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Fifth Query that updates patient_visit table last_regimen
		$the_query = "UPDATE patient_visit SET last_regimen_merged_from=last_regimen,last_regimen='$primary_drugcode_id' WHERE last_regimen IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Final Query that updates regimen_drug table 
		$the_query = "UPDATE regimen_drug SET regimen_merged_from=regimen,regimen='$primary_drugcode_id' WHERE regimen IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		$results = Regimen::getRegimen($primary_drugcode_id);
		echo $results -> Regimen_Desc . ' was merged';
	}

	public function unmerge($drugcode) {
		$this -> load -> database();
		//First Query that umerges the regimen
		$the_query = "UPDATE regimen SET merged_to='' WHERE id='$drugcode';";
		$this -> db -> query($the_query);
		//Second Query that updates patient table start_regimen
		$the_query = "UPDATE patient SET start_regimen='$drugcode',start_regimen_merged_from='' WHERE start_regimen_merged_from='$drugcode';";
		$this -> db -> query($the_query);
		//Third Query that updates patient table current_regimen
		$the_query = "UPDATE patient SET current_regimen='$drugcode',current_regimen_merged_from='' WHERE current_regimen_merged_from='$drugcode';";
		$this -> db -> query($the_query);
		//Fourth Query that updates patient_visit table 
		$the_query = "UPDATE patient_visit SET regimen='$drugcode',regimen_merged_from='' WHERE regimen_merged_from='$drugcode';";
		$this -> db -> query($the_query);
		//Fifth Query that updates patient_visit table last regimen
		$the_query = "UPDATE patient_visit SET last_regimen='$drugcode',last_regimen_merged_from='' WHERE last_regimen_merged_from='$drugcode';";
		$this -> db -> query($the_query);
		//Final Query that updates regimen_drug table 
		$the_query = "UPDATE regimen_drug SET regimen='$drugcode',regimen_merged_from='' WHERE regimen_merged_from='$drugcode';";
		$this -> db -> query($the_query);
		
		$results = Regimen::getRegimen($drugcode);
		$this -> session -> set_userdata('message_counter', '2');
		$this -> session -> set_userdata('message', $results -> Regimen_Desc . ' was unmerged');
		redirect('regimen_management');

	}
	
	public function getRegimenLine($service){
		$regimens=Regimen::getLineRegimens($service);
		echo json_encode($regimens);
	}
	
	public function getDrugs($regimen){
		$sql="select rd.drugcode as drug_id,d.drug as drug_name from drugcode d,regimen_drug rd where rd.regimen='$regimen' and rd.drugcode=d.id and rd.active='1' group by rd.drugcode order by rd.drugcode desc";
		$query=$this->db->query($sql);
		$results=$query->result_array();
		if($results){
		echo json_encode($results);
		}
	}

	public function base_params($data) {
		$data['quick_link'] = "regimen";
		$data['title'] = "Regimens";
		$data['banner_text'] = "Regimen Management";
		$data['link'] = "settings_management";
		$this -> load -> view('regimen_listing_v', $data);
	}

}
?>