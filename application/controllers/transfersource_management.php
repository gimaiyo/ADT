<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Transfersource_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {
		$sources = Transfer_Source::getThemAll();
		$tmpl = array ( 'table_open'  => '<table class="setting_table">'  );
		$this -> table ->set_template($tmpl);
		$this -> table -> set_heading('Id', 'Name','Options');

		foreach ($sources as $source) {
			$links = anchor('transfersource_management/edit/' .$source->id, 'Edit',array('class' => 'edit_user'));
			$links.=" | ";
			if($source->Active==1){
			$links .= anchor('transfersource_management/disable/' .$source->id, 'Disable',array('class' => 'disable_user'));	
			}else{
			$links .= anchor('transfersource_management/enable/' .$source->id, 'Enable',array('class' => 'enable_user'));	
			}
			$this -> table -> add_row($source->id, $source->Name,$links);
		}

		$data['sources'] = $this -> table -> generate();
		$data['title'] = "Transfers Sources";
		$data['banner_text'] = "Transfers Sources";
		$data['link'] = "transfersources";
		$actions = array(0 => array('Edit', 'edit'), 1 => array('Disable', 'disable'));
		$data['actions'] = $actions;
		$data['settings_view'] = "transfersources_v";
		$this -> base_params($data);
	}

	public function save() {
		$creator_id = $this -> session -> userdata('user_id');
		$source = $this -> session -> userdata('facility');

		$source = new Transfer_Source();
		$source -> Name = $this -> input -> post('source_name');
		$source -> Active = "1";
		$source -> save();
		
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('source_name').' was Added');
		redirect('transfersource_management');
	}

	public function edit($source_id) {
		$data['title'] = "Edit Transfer Sources";
		$data['settings_view'] = "edittransfersources_v";
		$data['banner_text'] = "Edit Transfer Sources";
		$data['link'] = "tranfersources";
		$data['sources'] = Transfer_Source::getSource($source_id);
		$this -> base_params($data);
	}

	public function update() {
		$source_id = $this -> input -> post('source_id');
		$source_name = $this -> input -> post('source_name');
		

		$this -> load -> database();
		$query = $this -> db -> query("UPDATE transfer_source SET Name='$source_name' WHERE id='$source_id'");
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('source_name').' was Updated');
		redirect('transfersource_management');
	}

	public function enable($source_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE transfer_source SET Active='1'WHERE id='$source_id'");
		$results=Transfer_Source::getSource($source_id);
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$results->Name.' was enabled');
		redirect('transfersource_management');
	}

	public function disable($source_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE transfer_source SET Active='0'WHERE id='$source_id'");
		$results=Transfer_Source::getSource($source_id);
		$this -> session -> set_userdata('message_counter','2');
		$this -> session -> set_userdata('message',$results->Name.' was disabled');
		redirect('transfersource_management');
	}

	public function base_params($data) {
		$data['content_view'] = "settings_v";
		$data['quick_link'] = "transfer_sources";
		$this -> load -> view("template", $data);
	}

	

}
