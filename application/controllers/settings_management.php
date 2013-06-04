<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Settings_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		//redirect("regimen_management");
		$access_level = $this -> session -> userdata('user_indicator');
		if($access_level=="system_administrator"){
			$data['settings_view']='settings_system_admin_v';
		}
		else{
			$data['settings_view']='settings_view';
		}
		
		$this->base_params($data);

	}

	public function base_params($data) {
		$data['title'] = "System Settings";
		$data['content_view'] = "settings_v";
		$data['banner_text'] = "System Settings";
		$data['link'] = "settings_management";
		$this -> load -> view("template_admin", $data);
	}

}
