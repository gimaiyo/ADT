<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Regimenchange_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {
		$access_level = $this -> session -> userdata('user_indicator');
		$sources = Regimen_change_purpose::getThemAll($access_level);
		$tmpl = array ( 'table_open'  => '<table class="setting_table">'  );
		$this -> table ->set_template($tmpl);
		$this -> table -> set_heading('Id', 'Name','Options');

		foreach ($sources as $source) {
			$links="";
			if($source->Active==1){
				$links = anchor('regimenchange_management/edit/' .$source->id, 'Edit',array('id'=>$source->id,'class' => 'edit_user','name'=>$source->Name));
				$links.=" | ";
				
			}
			if($access_level=="system_administrator" ){
				if($source->Active==1){
				$links .= anchor('regimenchange_management/disable/' .$source->id, 'Disable',array('class' => 'disable_user'));	
				}
				else{
				
				$links .= anchor('regimenchange_management/enable/' .$source->id, 'Enable',array('class' => 'enable_user'));	
				}
			}
			$this -> table -> add_row($source->id, $source->Name,$links);
		}

		$data['sources'] = $this -> table -> generate();;
		$data['title'] = "Regimen change Reasons";
		$data['banner_text'] = "Regimen change Reasons";
		$data['link'] = "Regimen_change_reasons";
		$actions = array(0 => array('Edit', 'edit'), 1 => array('Disable', 'disable'));
		$data['actions'] = $actions;
		$data['settings_view'] = "regimenchange_listing_v";
		$this -> base_params($data);
	}

	public function save() {
		$creator_id = $this -> session -> userdata('user_id');
		$source = $this -> session -> userdata('facility');

		$source = new Regimen_change_purpose();
		$source -> Name = $this -> input -> post('regimenchange_name');
		$source -> Active = "1";
		$source -> save();
		
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('regimenchange_name').' was Added');
		redirect('regimenchange_management');
	}

	public function edit($source_id) {
		$data['title'] = "Edit Regimen Change reasons";
		$data['settings_view'] = "editclient_v";
		$data['banner_text'] = "Edit Regimen Change reasons";
		$data['link'] = "regimen_change_reasons";
		$data['sources'] = Regimen_change_purpose::getSource($source_id);
		$this -> base_params($data);
	}

	public function update() {
		$regimenchange_id = $this -> input -> post('regimenchange_id');
		$regimenchange_name = $this -> input -> post('regimenchange_name');
		
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE Regimen_Change_Purpose SET Name='$regimenchange_name' WHERE id='$regimenchange_id'");
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('regimenchange_name').' was Updated');
		redirect('regimenchange_management');
	}

	public function enable($regimenchange_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE Regimen_Change_Purpose SET Active='1'WHERE id='$regimenchange_id'");
		$results=Regimen_change_purpose::getSource($regimenchange_id);
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$results->Name.' was enabled');
		redirect('regimenchange_management');
	}

	public function disable($regimenchange_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE Regimen_Change_Purpose SET Active='0'WHERE id='$regimenchange_id'");
		$results=Regimen_change_purpose::getSource($regimenchange_id);
		$this -> session -> set_userdata('message_counter','2');
		$this -> session -> set_userdata('message',$results->Name.' was disabled');
		redirect('regimenchange_management');
	}

	public function base_params($data) {
		$data['content_view'] = "settings_v";
		$data['quick_link'] = "regimen_change_reason";
		$this -> load -> view("template_admin", $data);
	}

	

}
