<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dose_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		
	}

	public function index() {
		$this -> listing();
	}

	public function listing() {
		$access_level = $this -> session -> userdata('user_indicator');
		$doses = Dose::getAll($access_level);
		$tmpl = array ( 'table_open'  => '<table class="setting_table">'  );
		$this -> table ->set_template($tmpl);
		$this -> table -> set_heading('id', 'Name','Value','Frequency','Options');

		foreach ($doses as $dose) {
			$links="";	
			if($dose->Active==1){
				$links = anchor('','Edit',array('class' => 'edit_user','id'=>$dose->id,'name'=>$dose->Name));
				$links.=" | ";
			}
			if($access_level=="system_administrator"){
				
				if($dose->Active==1){
				$links .= anchor('dose_management/disable/' .$dose->id, 'Disable',array('class' => 'disable_user'));	
				}else{
				$links .= anchor('dose_management/enable/' .$dose->id, 'Enable',array('class' => 'enable_user'));	
				}
			}
			
			
			$this -> table -> add_row($dose->id,$dose->Name,$dose->Value,$dose->Frequency,$links);
		}

		$data['doses'] = $this -> table -> generate();
		$data['title'] = "Drug Doses";
		$data['banner_text'] = "Drug Doses";
		$data['link'] = "dose";
		$actions = array(0 => array('Edit', 'edit'), 1 => array('Disable', 'disable'));
		$data['actions'] = $actions;
		$data['settings_view'] = "dose_v";
		$this -> base_params($data);
	}

	public function save() {
		$dose = new Dose();
		$dose -> Name = $this -> input -> post('dose_name');
		$dose -> Value = $this -> input -> post('dose_value');
		$dose -> Frequency = $this -> input -> post('dose_frequency');
		$dose -> Active = "1";
		$dose -> save();
		
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('dose_name').' was Added');
		redirect('dose_management');
	}

	public function edit() {
		$dose_id=7;
		$data['doses'] = Dose::getDoseHydrated($dose_id);
		echo json_encode($data);
	}

	public function update() {
		$dose_id = $this -> input -> post('dose_id');
		$dose_name = $this -> input -> post('dose_name');
		$dose_value = $this -> input -> post('dose_value');
		$dose_frequency = $this -> input -> post('dose_frequency');

		$this -> load -> database();
		$query = $this -> db -> query("UPDATE dose SET Name='$dose_name',Value='$dose_value',Frequency='$dose_frequency' WHERE id='$dose_id'");
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$this -> input -> post('dose_name').' was Updated');
		redirect('dose_management');
	}

	public function enable($dose_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE dose SET Active='1' WHERE id='$dose_id'");
		$results=Dose::getDose($dose_id);
		$this -> session -> set_userdata('message_counter','1');
		$this -> session -> set_userdata('message',$results->Name.' was enabled');
		redirect('dose_management');
	}

	public function disable($dose_id) {
		$this -> load -> database();
		$query = $this -> db -> query("UPDATE dose SET Active='0' WHERE id='$dose_id'");
		$results=Dose::getDose($dose_id);
		$this -> session -> set_userdata('message_counter','2');
		$this -> session -> set_userdata('message',$results->Name.' was disabled');
		redirect('dose_management');
	}

	public function base_params($data) {
		$data['content_view'] = "settings_v";
		$data['quick_link'] = "dose";
		$this -> load -> view("template", $data);
	}

	

}
