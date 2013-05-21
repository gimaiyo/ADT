<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Client_Support extends MY_Controller {
	function __construct() {
		parent::__construct();
		
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {
		$access_level = $this -> session -> userdata('user_indicator');
		$supports = Clientsupport::getThemAll($access_level);
		$tmpl = array ( 'table_open'  => '<table class="setting_table">'  );
		$this -> table ->set_template($tmpl);
		$this -> table -> set_heading('Id', 'Name','Options');

		foreach ($supports as $support) {
			$links="";
			if($support->Active==1){
				$links = anchor('client_support/edit/' .$support->id, 'Edit',array('class' => 'edit_user','id'=>$support->id,'name'=>$support->Name));
				$links.=" | ";
			}
			if($access_level=="system_administrator" ){
				if($support->Active==1){
				
				$links .= anchor('client_support/disable/' .$support->id, 'Disable',array('class' => 'disable_user'));	
				}
				else{
				$links .= anchor('client_support/enable/' .$support->id, 'Enable',array('class' => 'enable_user'));	
				}
			}
			$this -> table -> add_row($support->id, $support->Name,$links);
		}

		$data['supports'] = $this -> table -> generate();;
		$data['title'] = "Client Supports";
		$data['banner_text'] = "Client Suppports";
		$data['link'] = "client";
		$actions = array(0 => array('Edit', 'edit'), 1 => array('Disable', 'disable'));
		$data['actions'] = $actions;
		$data['settings_view'] = "client_support_v";
		$this -> base_params($data);
	}

	public function save() {
		$creator_id = $this -> session -> userdata('user_id');
		$source = $this -> session -> userdata('facility');

		$source = new Clientsupport();
		$source -> Name = $this -> input -> post('support_name');
		$source -> Active = "1";
		$source -> save();
		
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('support_name').' was Added');
		redirect('client_support');
	}

	public function edit($source_id) {
		$data['title'] = "Edit Client Supports";
		$data['settings_view'] = "edit_support_v";
		$data['banner_text'] = "Edit Client Supports";
		$data['link'] = "indications";
		$data['sources'] = Clientsupport::getSource($source_id);
		$this -> base_params($data);
	}

	public function update() {
		$source_id = $this -> input -> post('source_id');
		$source_name = $this -> input -> post('source_name');
		

		$this -> load -> database();
		$query = $this -> db -> query("UPDATE supporter SET Name='$source_name' WHERE id='$source_id'");
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('source_name').' was Updated');
		redirect('client_support');
	}

	public function enable($source_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE supporter SET Active='1'WHERE id='$source_id'");
		$results=Clientsupport::getSource($source_id);
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$results->Name.' was enabled');
		redirect('client_support');
	}

	public function disable($source_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE supporter SET Active='0'WHERE id='$source_id'");
		$results=Clientsupport::getSource($source_id);
		$this -> session -> set_userdata('message_counter','2');
		$this -> session -> set_userdata('message',$results->Name.' was disabled');
		redirect('client_support');
	}

	public function base_params($data) {
		$data['content_view'] = "settings_v";
		$data['quick_link'] = "client_supports";
		$this -> load -> view("template_admin", $data);
	}

	

}
