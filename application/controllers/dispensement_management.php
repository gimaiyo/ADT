<?php
class Dispensement_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		//$this -> listing();
	}

	public function dispense($patient_no) {
		$data = array();
		$facility_code=$this -> session -> userdata('facility');
		$sql = "select * from patient where patient_number_ccc='$patient_no' and facility_code='$facility_code'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['patients']=$results;
		}
		$data['regimens']=Regimen::getAllEnabled();
		$data['non_adherence_reasons']=Non_Adherence_Reasons::getAll();
		$data['content_view'] = "dispense_v";  
		$this -> base_params($data);
	}
	
	public function edit(/*$record_no*/){
		$data['content_view']='edit_dispensing_v';
		$data['hide_side_menu']=1;
		$this->base_params($data);
	}

	public function save() {
		$this->load->database();
		$sql = $this->input->post("sql");
		$queries = explode(";", $sql);
		foreach($queries as $query){
			if(strlen($query)>0){
				$this->db->query($query);
				$new_log = new Sync_Log();
				$new_log -> logggedsql = $query;
				$new_log -> machine_code ="1";
				$new_log -> facility = $this -> session -> userdata('facility');
				$new_log -> save();
			}
			
		}
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