<?php
class Drugcode_management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> session -> set_userdata("link_id", "index");
		$this -> session -> set_userdata("linkSub", "drugcode_management");
		$this -> session -> set_userdata("linkTitle", "DrugCode Management");
		ini_set("max_execution_time", "100000");
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
		$drugcodes = Drugcode::getAll($source, $access_level);
		$tmpl = array('table_open' => '<table id="drugcode_setting" class="setting_table">');
		$this -> table -> set_template($tmpl);
		$this -> table -> set_heading('id', 'Drug', 'Pack Size', 'Safety Quantity', 'Quantity', 'Duration', 'Options');

		foreach ($drugcodes as $drugcode) {
			$array_param = array('id' => $drugcode['id'], 'role' => 'button', 'class' => 'edit_user', 'data-toggle' => 'modal');

			$links = "";
			if ($drugcode['Enabled'] == 1) {
				//$links = anchor('#edit_drugcode', 'Edit', array('class' => 'edit_user','id'=>$drugcode['id']));
				$links .= anchor('#edit_drugcode', 'Edit', $array_param);

			}

			$drug = $drugcode['id'];
			if ($drugcode['Enabled'] == 1 && $access_level == "facility_administrator") {
				$links .= " | ";
				$links .= anchor('drugcode_management/disable/' . $drugcode['id'], 'Disable', array('class' => 'disable_user'));
				$links .= " | ";
				$links .= "<a href='#' class='merge_drug' id='$drug'>Merge</a>";
			} elseif ($access_level == "facility_administrator") {
				$links .= anchor('drugcode_management/enable/' . $drugcode['id'], 'Enable', array('class' => 'enable_user'));

			}
			if ($drugcode['Merged_To'] != '') {
				if ($access_level == "facility_administrator") {
					$links .= " | ";
					$links .= anchor('drugcode_management/unmerge/' . $drugcode['id'], 'Unmerge', array('class' => 'unmerge_drug'));
				}
				$checkbox = "<input type='checkbox' name='drugcodes' id='drugcodes' value='$drug' disabled/>";
			} else {
				$checkbox = "<input type='checkbox' name='drugcodes' id='drugcodes' value='$drug'/>";
			}
			$this -> table -> add_row($drugcode['id'], $checkbox . "&nbsp;" . $drugcode['Drug'], $drugcode['Pack_Size'], $drugcode['Safety_Quantity'], $drugcode['Quantity'], $drugcode['Duration'], $links);
		}

		$data['drugcodes'] = $this -> table -> generate();

		$this -> base_params($data);

	}

	public function add() {
		$data = array();
		//$data['settings_view'] = "drugcode_add_v";
		$data['drug_units'] = Drug_Unit::getThemAll();
		$data['generic_names'] = Generic_Name::getAllActive();
		$data['supporters'] = Supporter::getAllActive();
		$data['doses'] = Dose::getAllActive();
		echo json_encode($data);
		//$this -> base_params($data);
	}

	public function save() {

		$valid = $this -> _submit_validate();
		//if ($valid == false) {
		//$this -> add();
		//} else {

		$access_level = $this -> session -> userdata('user_indicator');
		$source = 0;
		if ($access_level == "pharmacist") {
			$source = $this -> session -> userdata('facility');
		}
		$non_arv = 0;
		$tb_drug = 0;
		$drug_in_use = 0;
		$supplied = 0;
		if ($this -> input -> post('none_arv') == "on") {
			$non_arv = 1;
		}
		if ($this -> input -> post('tb_drug') == "on") {
			$tb_drug = 1;
		}
		if ($this -> input -> post('drug_in_use') == "on") {
			$drug_in_use = 1;
		}

		$drugcode = new Drugcode();
		$drugcode -> Drug = $this -> input -> post('drugname');
		$drugcode -> Unit = $this -> input -> post('drugunit');
		$drugcode -> Pack_Size = $this -> input -> post('packsize');
		$drugcode -> Safety_Quantity = $this -> input -> post('safety_quantity');
		$drugcode -> Generic_Name = $this -> input -> post('genericname');
		$drugcode -> Supported_By = $this -> input -> post('supplied_by');
		$drugcode -> classification = $this -> input -> post('classification');
		$drugcode -> none_arv = $non_arv;
		$drugcode -> Tb_Drug = $tb_drug;
		$drugcode -> Drug_In_Use = $drug_in_use;
		$drugcode -> Comment = $this -> input -> post('comments');
		$drugcode -> Dose = $this -> input -> post('dose_frequency');
		$drugcode -> Duration = $this -> input -> post('duration');
		$drugcode -> Quantity = $this -> input -> post('quantity');
		$drugcode -> Strength = $this -> input -> post('dose_strength');
		$drugcode -> Source = $source;

		$drugcode -> save();
		//$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('msg_success', $this -> input -> post('drugname') . ' was successfully Added!');
		redirect('settings_management');
	}

	//}

	public function edit() {
		$drugcode_id = $this -> input -> post('drugcode_id');
		$data['generic_names'] = Generic_Name::getAllActive();
		$data['drug_units'] = Drug_Unit::getThemAll();
		$data['doses'] = Dose::getAllActive();
		$data['supporters'] = Supporter::getAllActive();
		$data['doses'] = Dose::getAllActive();
		$data['drugcodes'] = Drugcode::getDrugCodeHydrated($drugcode_id);
		echo json_encode($data);
	}

	public function update() {
		$non_arv = "0";
		$tb_drug = "0";
		$drug_in_use = "0";
		$supplied = 0;
		if ($this -> input -> post('none_arv') == "on") {
			$non_arv = "1";
		}
		if ($this -> input -> post('tb_drug') == "on") {

			$tb_drug = "1";
		}
		if ($this -> input -> post('drug_in_use') == "on") {
			$drug_in_use = "1";
		}

		$source_id = $this -> input -> post('drugcode_id');

		$data = array('Drug' => $this -> input -> post('drugname'), 'Unit' => $this -> input -> post('drugunit'), 'Pack_Size' => $this -> input -> post('packsize'), 'Safety_Quantity' => $this -> input -> post('safety_quantity'), 'Generic_Name' => $this -> input -> post('genericname'), 'Supported_By' => $this -> input -> post('supplied_by'), 'classification' => $this -> input -> post('classification'), 'none_arv' => $non_arv, 'tb_drug' => $tb_drug, 'Drug_In_Use' => $drug_in_use, 'Comment' => $this -> input -> post('comments'), 'Dose' => $this -> input -> post('dose_frequency'), 'Duration' => $this -> input -> post('duration'), 'Quantity' => $this -> input -> post('quantity'), 'Strength' => $this -> input -> post('dose_strength'));

		$this -> load -> database();
		$this -> db -> where('id', $source_id);
		$this -> db -> update('drugcode', $data);
		//$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('msg_success', $this -> input -> post('drugname') . ' was Updated');
		redirect('settings_management');
	}

	public function enable($drugcode_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE drugcode SET Enabled='1'WHERE id='$drugcode_id'");
		$results = Drugcode::getDrugCode($drugcode_id);
		//$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('msg_success', $results['Drug'] . ' was enabled!');

		redirect('settings_management');
	}

	public function disable($drugcode_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE drugcode SET Enabled='0'WHERE id='$drugcode_id'");
		$results = Drugcode::getDrugCode($drugcode_id);
		$this -> session -> set_userdata('message_counter', '2');
		$this -> session -> set_userdata('msg_success', $results['Drug'] . ' was disabled!');
		redirect('settings_management');
	}

	public function merge($primary_drugcode_id) {
		//Handle the array with all drugcodes that are to be merged
		$drugcodes = $_POST['drug_codes'];
		$drugcodes = array_diff($drugcodes, array($primary_drugcode_id));
		$drugcodes_to_remove = implode(",", $drugcodes);

		$this -> load -> database();
		//First Query that disables the drug_codes that are to be merged
		$the_query = "UPDATE drugcode SET enabled='0',merged_to='$primary_drugcode_id' WHERE id IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Second Query that updates drug_stock_movement table to merge all drug id's in transactions that have the drugcodes that are to be merged with the primary_drugcode_id
		$the_query = "UPDATE drug_stock_movement SET merged_from=drug,drug='$primary_drugcode_id' WHERE drug IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Third Query that updates patient_visit table for all transactions involving the drugcode to be merged with the primary_drugcode_id
		$the_query = "UPDATE patient_visit SET merged_from=drug_id,drug_id='$primary_drugcode_id' WHERE drug_id IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		//Final Query that updates regimen_drug table for all regimens involving the drugcode to be merged with the primary_drugcode_id
		$the_query = "UPDATE regimen_drug SET merged_from=drugcode,drugcode='$primary_drugcode_id' WHERE drugcode IN($drugcodes_to_remove);";
		$this -> db -> query($the_query);
		$results = Drugcode::getDrugCode($primary_drugcode_id);
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('msg_success', $results -> Drug . ' was Merged!');
	}

	public function unmerge($drugcode) {
		$this -> load -> database();
		//First Query that umerges the drug_code
		$the_query = "UPDATE drugcode SET merged_to='' WHERE id='$drugcode';";
		$this -> db -> query($the_query);
		//Second Query that updates drug_stock_movement table to unmerge all drug id's that match the merged_from column
		$the_query = "UPDATE drug_stock_movement SET drug='$drugcode',merged_from='' WHERE merged_from='$drugcode';";
		$this -> db -> query($the_query);
		//Third Query that updates patient_visit table to unmerge all drug id's that match the merged_from column
		$the_query = "UPDATE patient_visit SET drug_id='$drugcode',merged_from='' WHERE merged_from='$drugcode';";
		$this -> db -> query($the_query);
		//Final Query that updates regimen_drug table to unmerge all drug id's that match the merged_from column
		$the_query = "UPDATE regimen_drug SET drugcode='$drugcode',merged_from='' WHERE merged_from='$drugcode';";
		$this -> db -> query($the_query);

		$results = Drugcode::getDrugCode($drugcode);
		$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('msg_error', $results -> Drug . ' was unmerged!');
		redirect('settings_management');

	}

	private function _submit_validate() {
		// validation rules
		$this -> form_validation -> set_rules('drugname', 'Drug Name', 'trim|required|min_length[2]|max_length[100]');
		$this -> form_validation -> set_rules('packsize', 'Pack Size', 'trim|required|min_length[2]|max_length[10]');

		return $this -> form_validation -> run();
	}

	public function base_params($data) {
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['quick_link'] = "drugcode";
		$data['title'] = "Drug Code";
		$data['banner_text'] = "Drug Code Management";
		$data['link'] = "settings_management";
		$this -> load -> view('drugcode_listing_v', $data);
	}

}
?>