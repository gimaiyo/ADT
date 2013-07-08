<?php
class Regimen_Drug_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->session->set_userdata("link_id","index");
		$this->session->set_userdata("linkSub","regimen_drug_management");
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
		$data['styles'] = array("jquery-ui.css");
		$data['scripts'] = array("jquery-ui.js");
		$data['regimens'] = Regimen::getAll($source);
		$data['regimens_enabled'] = Regimen::getAllEnabled($source);
		$data['regimen_categories'] = Regimen_Category::getAll();
		$data['regimen_service_types'] = Regimen_Service_Type::getAll();
		$data['drug_codes'] = Drugcode::getAll($source);
		$data['drug_codes_enabled'] = Drugcode::getAllEnabled($source);
		$this -> base_params($data);
	}

	public function save() {
		if ($this -> input -> post()) {
			$access_level = $this -> session -> userdata('user_indicator');
			$source = 0;
			if ($access_level == "pharmacist") {
				$source = $this -> session -> userdata('facility');
			}
			$regimen_drug = new Regimen_Drug();
			$regimen_drug -> Regimen = $this -> input -> post('regimen');
			$regimen_drug -> Drugcode = $this -> input -> post('drugid');
			$regimen_drug -> Source = $source;
			$regimen_drug -> save();
			$regimen_drug_id=$this -> input -> post('drugid');
			$results = Drugcode::getDrugCode($regimen_drug_id);
			$this -> session -> set_userdata('msg_success',$results->Drug.' was Added');
		
		}
		redirect('settings_management');

	}

	public function enable($regimen_drug_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE regimen_drug SET active='1'WHERE drugcode='$regimen_drug_id'");
		$results = Drugcode::getDrugCode($regimen_drug_id);
		//$this -> session -> set_userdata('message_counter', '1');
		$this -> session -> set_userdata('msg_success', $results -> Drug  . ' was enabled');
		redirect('settings_management');
	}

	public function disable($regimen_drug_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE regimen_drug SET active='0'WHERE drugcode='$regimen_drug_id'");
		$results = Drugcode::getDrugCode($regimen_drug_id);
		//$this -> session -> set_userdata('message_counter', '2');
		$this -> session -> set_userdata('msg_error', $results -> Drug . ' was disabled');
		redirect('settings_management');
	}

	public function base_params($data) {
		$data['quick_link'] = "regimen_drug";
		$data['title'] = "Regimen_Drug Management";
		$data['banner_text'] = "Regimen Drug Management";
		$data['link'] = "settings_management";
		$this -> load -> view('regimen_drug_listing_v', $data);
	}

}
?>