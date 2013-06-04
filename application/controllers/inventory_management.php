<?php
class Inventory_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> listing();
	} 
	
	public function mainstore_show(){
		$data = array();
		$data['content_view'] = "add_stock_v";
		$this -> base_params($data);
	}
	public function pharmacy_show(){
		$data = array();
		$data['content_view'] = "add_stock_pharmacy_v";
		$this -> base_params($data);
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
		$data['title'] = "Inventory";
		$data['banner_text'] = "Inventory Management";
		$data['link'] = "inventory";
		$this -> load -> view('template', $data);
	}

}
?>