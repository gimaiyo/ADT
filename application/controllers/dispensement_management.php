<?php
class Dispensement_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function index() {
		//$this -> listing();
	}

	public function dispense($patient_no) {
		$data = array();
		$facility_code=$this -> session -> userdata('facility');
		$dispensing_date="";
		$sql = "select * from patient where patient_number_ccc='$patient_no' and facility_code='$facility_code'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['results']=$results;
		}
		$sql="SELECT r.id, r.regimen_desc,r.regimen_code, dispensing_date, pv.current_weight, pv.current_height FROM patient_visit pv, regimen r WHERE pv.patient_id =  '$patient_no' AND pv.regimen = r.id ORDER BY pv.dispensing_date DESC LIMIT 1";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['last_regimens']=$results[0];
		}
		$dispensing_date=$results[0]['dispensing_date'];
		$sql="select d.drug,pv.quantity from patient_visit pv,drugcode d where pv.patient_id = '$patient_no' and pv.dispensing_date = '$dispensing_date' and pv.drug_id = d.id order by pv.id desc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['visits']=$results;
		}
		
		
		$sql="SELECT appointment FROM patient_appointment pa WHERE pa.patient = '$patient_no' AND pa.facility =  '$facility_code' ORDER BY appointment DESC LIMIT 1";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['appointments']=$results[0];
		}
		
		$data['regimens']=Regimen::getRegimens();
		$data['non_adherence_reasons']=Non_Adherence_Reasons::getAllHydrated();
		$data['regimen_changes']=Regimen_Change_Purpose::getAllHydrated();
		$data['purposes']=Visit_Purpose::getAll();
		$data['content_view'] = "dispense_v";  
		$data['hide_side_menu']=1;
		$this -> base_params($data);
	}
	
	public function edit($record_no){
		$facility_code=$this -> session -> userdata('facility');
		$sql = "select * from patient_visit where id='$record_no' and facility='$facility_code'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['results']=$results;
		}
		$data['content_view']='edit_dispensing_v';
		$data['hide_side_menu']=1;
		$this->base_params($data);
	}

	public function save() {
		/*
		$new_patient_visit=new Patient_Visit();
		$new_patient_visit->Patient_Id=$this -> input -> get_post('patient', true);
		$new_patient_visit->Visit_Purpose=$this -> input -> get_post('purpose', true);
		$new_patient_visit->Current_Height=$this -> input -> get_post('height', true);
		$new_patient_visit->Current_Weight=$this -> input -> get_post('weight', true);
		$new_patient_visit->Regimen=$this -> input -> get_post('current_regimen', true);
		$new_patient_visit->Last_Regimen=$this -> input -> get_post('last_regimen', true);
		$new_patient_visit->Regimen_Change_Reason=$this -> input -> get_post('regimen_change_reason', true);
		$new_patient_visit->Dispensing_Date=$this -> input -> get_post('dispensing_date', true);
		$new_patient_visit->Adherence=$this -> input -> get_post('adherence', true);
		$new_patient_visit->Non_Adherence_Reason=$this -> input -> get_post('non_adherence_reasons', true);
		$new_patient_visit->save();
		*/
          
	}
	public function save_edit() {
		$this->load->database();
		$sql = $this->input->post("sql");
		$queries = explode(";", $sql);
		foreach($queries as $query){
			if(strlen($query)>0){
				$this->db->query($query);
			}
			
		}
	}
	public function base_params($data) { 
		$data['title'] = "Drug Dispensements"; 
		$data['banner_text'] = "Facility Dispensements";
		$data['link'] = "dispensements";
		$this -> load -> view('template', $data);
	}

}
?>