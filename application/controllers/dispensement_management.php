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
		
		$data['facility']=$facility_code;
		$data['user']=$this -> session -> userdata('full_name');
		$data['regimens']=Regimen::getRegimens();
		$data['non_adherence_reasons']=Non_Adherence_Reasons::getAllHydrated();
		$data['regimen_changes']=Regimen_Change_Purpose::getAllHydrated();
		$data['purposes']=Visit_Purpose::getAll();
		$data['content_view'] = "dispense_v";  
		$data['hide_side_menu']=1;
		$this -> base_params($data);
	}

	public function getDrugsRegimens(){
		$regimen_id=$this->input->post('selected_regimen');
		$get_drugs_sql=$this->db->query("SELECT DISTINCT(d.id),d.drug FROM drugcode d LEFT JOIN regimen_drug rd ON d.id=rd.drugcode LEFT JOIN drug_stock_balance dsb ON d.id=dsb.drug_id  WHERE dsb.balance>0 AND dsb.expiry_date>CURDATE() AND rd.regimen='".$regimen_id."'");
		$get_drugs_array=$get_drugs_sql->result_array();
		echo json_encode($get_drugs_array);
		
	}

	public function getBrands(){
		$drug_id=$this->input->post("selected_drug");
		$get_drugs_sql=$this->db->query("SELECT DISTINCT id,brand FROM brand WHERE drug_id='".$drug_id."' AND brand!=''");
		$get_drugs_array=$get_drugs_sql->result_array();
		echo json_encode($get_drugs_array);
	}
	
	public function getDoses(){
		$get_doses_sql=$this->db->query("SELECT id,Name FROM dose");
		$get_doses_array=$get_doses_sql->result_array();
		echo json_encode($get_doses_array);
	}
	
	public function getIndications(){
		$get_indication_sql=$this->db->query("SELECT id,Name FROM opportunistic_infection");
		$get_indication_array=$get_indication_sql->result_array();
		echo json_encode($get_indication_array);
	}
	
	public function edit($record_no){
		$facility_code=$this -> session -> userdata('facility');
		$sql = "select * from patient_visit pv,patient p where pv.id='$record_no' and pv.patient_id=p.patient_number_ccc and facility='$facility_code'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			$data['results']=$results;
			//Get expriry date the batch
			foreach($results as $value) {
				$batch_number=$value['batch_number'];
				$drug_ig=$value['drug_id'];
				$expiry_sql=$this->db->query("select expiry_date FROM drug_stock_balance WHERE batch_number='$batch_number' AND drug_id='$drug_ig' AND stock_type='2' AND facility_code='$facility_code' AND balance>0 LIMIT 1");
				$expiry_array=$expiry_sql->result_array();
				$expiry_date="";
				$data['expiries']=$expiry_array;
				foreach ($expiry_array as $row) {
					$expiry_date=$row['expiry_date'];
					$data['original_expiry_date']=$expiry_date;
				}
			}
			
		}
		else{
			$data['results']="";
		}
		$data['purposes']=Visit_Purpose::getAll();
		$data['record']=$record_no;
		$data['regimens']=Regimen::getRegimens();
		$data['non_adherence_reasons']=Non_Adherence_Reasons::getAllHydrated();
		$data['regimen_changes']=Regimen_Change_Purpose::getAllHydrated();
		$data['doses']=Dose::getAllActive();
		$data['indications']=Opportunistic_Infection::getAllHydrated();
		$data['content_view']='edit_dispensing_v';
		$data['hide_side_menu']=1;
		$this->base_params($data);
	}

	public function save() {
		$sql=$this->input->post("sql");
		
		$queries = explode(";", $sql);
		$count=count($queries);
		$c=0;
		foreach($queries as $query){
			$c++;
			if(strlen($query)>0){
				$this->db->query($query);
			}
			
		}
		if($count==$c){
			$this -> session -> set_userdata('msg_save_transaction', 'success');
		}
		else if($c==0){
			$this -> session -> set_userdata('msg_save_transaction', 'all_failure');
		}
		else{
			$this -> session -> set_userdata('msg_save_transaction', 'some_failure');
		}
		
		redirect("patient_management");
	}
	public function save_edit() {
		$timestamp="";
		$patient="";
		$facility="";
		$user="";
		$record_no="";
		$facility=$this->session->userdata("facility");
		$user=$this->session->userdata("full_name");
		$timestamp=date('Y-m-d H:i:s');
		$patient=@$_POST['patient'];
		//If record is to be deleted
        if(@$_POST['delete_trigger']==1) {
		  $sql ="delete from patient_visit WHERE id='".@$_POST["dispensing_id"]."';";
		  $this->db->query($sql);
		  $sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date, quantity, facility, machine_code,timestamp) SELECT '".@$_POST["original_drug"]."','".@$_POST["original_dispensing_date"]."', '".@$_POST["batch"]."','4','$facility','$facility',expiry_date,'".@$_POST["qty_disp"]."','$facility','0','$timestamp' from drug_stock_movement WHERE batch_number= '".@$_POST["batch"]."' AND drug='".@$_POST["original_drug"]."' LIMIT 1;";
	      $this->db->query($sql);
		  //Update drug_stock_balance
			$sql="UPDATE drug_stock_balance SET balance=balance+".@$_POST["qty_disp"]." WHERE drug_id='".@$_POST["original_drug"]."' AND batch_number='".@$_POST["batch"]."' AND expiry_date='".@$_POST["original_expiry_date"]."' AND stock_type='2' AND facility_code='$facility";
			$this->db->query($sql);
			$this -> session -> set_userdata('dispense_deleted', 'success');
		} else {
		  $sql = "UPDATE patient_visit SET dispensing_date = '".@$_POST["dispensing_date"]."', visit_purpose = '".@$_POST["purpose"]."', current_weight='".@$_POST["weight"]."', current_height='".@$_POST["height"]."', regimen='".@$_POST["current_regimen"]."', drug_id='".@$_POST["drug"]."', batch_number='".@$_POST["batch"]."', dose='".@$_POST["dose"]."', duration='".@$_POST["duration"]."', quantity='".@$_POST["qty_disp"]."', brand='".@$_POST["brand"]."', indication='".@$_POST["indication"]. "', pill_count='".@$_POST["pill_count"]. "', missed_pills='".@$_POST["missed_pills"]. "', comment='".@$_POST["comment"]."',non_adherence_reason='".@$_POST["non_adherence_reasons"]."',adherence='".@$_POST["adherence"]."' WHERE id='".@$_POST["dispensing_id"]."';";
		  $this->db->query($sql);	 
			 if(@$_POST["batch"] != @$_POST["batch_hidden"] || @$_POST["qty_disp"] != @$_POST["qty_hidden"]) {
						$sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date, quantity, facility, machine_code,timestamp) SELECT '".@$_POST["original_drug"]."','".@$_POST["original_dispensing_date"] . "', '".@$_POST["batch_hidden"]."','4','$facility','$facility',expiry_date,'".@$_POST["qty_hidden"]."','$facility','0','$timestamp' from drug_stock_movement WHERE batch_number= '".@$_POST["batch_hidden"]."' AND drug='".@$_POST["original_drug"]."' LIMIT 1;";
						$this->db->query($sql);
						$sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date, quantity_out, facility, machine_code,timestamp) SELECT '".@$_POST["drug"]."','".@$_POST["original_dispensing_date"] . "', '".@$_POST["batch"]."','5','$facility','$facility',expiry_date,'".@$_POST["qty_disp"]."','$facility','0','$timestamp' from drug_stock_movement WHERE batch_number= '".@$_POST["batch"]. "' AND drug='".@$_POST["drug"]. "' LIMIT 1;";
			            $this->db->query($sql);
						//Update drug_stock_balance
						//Balance=balance+(previous_qty_disp-actual_qty_dispense) 
						$new_qty_dispensed=$_POST["qty_hidden"]-$_POST["qty_disp"];
						
						if($new_qty_dispensed>0){
							$sql="UPDATE drug_stock_balance SET balance=balance+".@$new_qty_dispensed." WHERE drug_id='".@$_POST["original_drug"]."' AND batch_number='".@$_POST["batch"]."' AND expiry_date='".@$_POST["original_expiry_date"]."' AND stock_type='2' AND facility_code='$facility";
							$this->db->query($sql);
						}
						else if($new_qty_dispensed<0){
							
							$new_qty_dispensed=abs($new_qty_dispensed);
							$sql="UPDATE drug_stock_balance SET balance=balance-".@$new_qty_dispensed." WHERE drug_id='".@$_POST["original_drug"]."' AND batch_number='".@$_POST["batch"]."' AND expiry_date='".@$_POST["original_expiry_date"]."' AND stock_type='2' AND facility_code='$facility";
							echo $sql;
							die();
							$this->db->query($sql);
						}
						
						
						
			  }
			  $this -> session -> set_userdata('dispense_updated', 'success');
		}
		$sql="select * from patient where patient_number_ccc='$patient' and facility_code='$facility'";
		$query=$this->db->query($sql);
		$results=$query->result_array();
		$record_no=$results[0]['id'];
		$this -> session -> set_userdata('msg_save_transaction', 'success');
        redirect("patient_management/viewDetails/$record_no");	
	}
	
	public function base_params($data) { 
		$data['title'] = "webADT | Drug Dispensements"; 
		$data['banner_text'] = "Facility Dispensements";
		$data['link'] = "dispensements";
		$this -> load -> view('template', $data);
	}

}
?>