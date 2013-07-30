<?php
class admin_management extends MY_Controller {
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {

	}

	public function addUser($type = "0") {
		$data['content_view'] = "add_user_a";
		$data['hide_side_menu'] =0;
		$this -> base_params($data);
	}

	public function base_params($data) {
		$data['title'] = "webADT | Admin";
		$data['banner_text'] = "System Admin";
		$data['link'] = "admin";
		$this -> load -> view('template', $data);
	}

}
