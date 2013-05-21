<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Facilitydashboard_Management extends MY_Controller {
	var $drug_array=array();
	var $drug_count=0;
	var $counter=0;
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		
	}

	public function index() {
		
	}
	
	
	public function getExpiringDrugs($stock_type=1){
		$count=0;
		$facility_code = $this -> session -> userdata('facility');
		$drugs_sql="SELECT s.id AS id,s.drug AS Drug_Id,d.drug AS Drug_Name,d.pack_size AS pack_size, u.name AS Unit, s.batch_number AS Batch,s.expiry_date AS Date_Expired,DATEDIFF(s.expiry_date,CURDATE()) AS Days_Since_Expiry FROM drugcode d LEFT JOIN drug_unit u ON d.unit = u.id LEFT JOIN drug_stock_movement s ON d.id = s.drug LEFT JOIN transaction_type t ON t.id=s.transaction_type WHERE t.effect=1 AND DATEDIFF(s.expiry_date,CURDATE()) <=180 AND DATEDIFF(s.expiry_date,CURDATE())>=0 AND d.enabled=1 AND s.facility ='".$facility_code."' GROUP BY Batch ORDER BY id";
		$drugs=$this -> db -> query($drugs_sql);
		$results=$drugs -> result_array();
		//Get all expiring drugs
		foreach ($results as $result => $value) {
			$count=1;
			$this->getBatchInfo($value['Drug_Id'], $value['Batch'], $value['Unit'], $value['Drug_Name'], $value['Date_Expired'], $value['Days_Since_Expiry'], $value['id'], $value['pack_size'],$stock_type,$facility_code);
		}
		//If no drugs if found, return null
		if($count==0){
			$data['drug_details']="null";
		}
		$d=0;
		/*
		foreach($this->drug_array as $drugs){
			$d++;
			echo $drugs['drug_name'].' - '.$drugs['batch'].' - '.$drugs['stocks_display'].' - '.$drugs['expired_days_display']."<br>";
		}
		 * */
		//echo $d;
		return $this->drug_array;
		
	}
	
	public function getBatchInfo($drug, $batch, $drug_unit, $drug_name, $expiry_date, $expired_days, $drug_id, $pack_size,$stock_type,$facility_code){
		$stock_status = 0;
		$stock_param="";	
		
		//Store
		if($stock_type=='1'){
			$stock_param=" AND (source='".$facility_code."' OR destination='".$facility_code."') AND source!=destination ";
		}
		//Pharmacy
		else if($stock_type=='2'){
			$stock_param=" AND (source=destination) AND(source='".$facility_code."') ";
		}
		$initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '".$batch."' AS batch FROM drug_stock_movement d WHERE d.drug =  '".$drug."' AND facility='".$facility_code."' ".$stock_param." AND transaction_type =  '11' AND d.batch_number =  '".$batch."'";
		$batches=$this -> db -> query($initial_stock_sql);
		$batch_results=$batches -> result_array();
		foreach ($batch_results as $batch_result => $value) {
			$initial_stock = $value['Initial_stock'];
			//Check if initial stock is present meaning physical count done
			if($initial_stock != null) {
				$batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '"  .$value['transaction_date']. "' AND curdate() AND facility='" .$facility_code. "' ".$stock_param." AND ds.drug ='" .$drug. "'  AND ds.batch_number ='".$value['batch']. "'";
				$second_row=$this -> db -> query($batch_stock_sql);
				$second_rows=$second_row -> result_array();
				
				foreach ($second_rows as $second_row => $value) {
					if($value['stock_levels'] > 0) {
						$batch_balance = $value['stock_levels'];
						$ed=substr($expired_days,0,1);
						if($ed == "-") {
							$expired_days = $expired_days;
						}
	
						$batch_stock = $batch_balance / $pack_size;
						$expired_days_display = number_format($expired_days);
						$stocks_display = ceil(number_format($batch_stock,1));
						
						$this->drug_array[$this->counter]['drug_name']=$drug_name;
						$this->drug_array[$this->counter]['batch']=$batch;
						$this->drug_array[$this->counter]['stocks_display']=$stocks_display;
						$this->drug_array[$this->counter]['expired_days_display']=$expired_days_display;
						$this->counter++;
					}
				}
					
			}
			else{
				
				$batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '".$drug. "' AND facility='".$facility_code. "' ".$stock_param." AND ds.expiry_date > curdate() AND ds.batch_number='" .$value['batch']. "'";
				$second_row=$this -> db -> query($batch_stock_sql);
				$second_rows=$second_row -> result_array();
				
				foreach ($second_rows as $second_row => $value) {
						
					if($value['stock_levels'] > 0) {
						$batch_balance = $value['stock_levels'];
						$ed=substr($expired_days,0,1);
						if($ed == "-") {
							$expired_days = $expired_days;
						}
						$batch_stock = $batch_balance / $pack_size;
						$expired_days_display = number_format($expired_days);
						$stocks_display = number_format($batch_stock,1);
						
						$this->drug_array[$this->counter]['drug_name']=$drug_name;
						$this->drug_array[$this->counter]['batch']=$batch;
						$this->drug_array[$this->counter]['stocks_display']=$stocks_display;
						$this->drug_array[$this->counter]['expired_days_display']=$expired_days_display;
						$this->counter++;
					}
				}			
			}
			
		}
	}
	
	//Get patients enrolled 
	public function getPatientsStartDate($startdate="",$enddate=""){
		$facility_code = $this -> session -> userdata('facility');
		$timestamp = time();
		$edate=date('Y-m-d', $timestamp);
		$dates=array();
		$x=7;
		$y=0;
		
		
		//If no parameters are passed, get enrolled patients for the past 7 days
		if($startdate=="" || $enddate==""){
			for ($i = 0 ; $i < $x ; $i++) {
			if (date("D", $timestamp) != "Sun"){
					$sdate=date('Y-m-d', $timestamp);
					//Store the days in an array
					$dates[$y]=$sdate;
					$y++;
				}
				//If sunday is included, add one more day
				else{$x=8;}
			    $timestamp -= 24 * 3600;
			}
			$start_date=$sdate;
			$end_date=$edate;
		}
		else{
			$start_date=$startdate;
			$end_date=$enddate;
		}
		$get_patient_sql="SELECT COUNT(DISTINCT p.patient_number_ccc) as total,p.start_regimen_date FROM patient p  LEFT JOIN regimen r ON r.id = p.start_regimen LEFT JOIN regimen_service_type t ON t.id = p.service LEFT JOIN supporter s ON s.id = p.supported_by  WHERE p.start_regimen_date Between '" .$start_date. "' and '" .$end_date. "'  and p.facility_code='" .$facility_code. "' GROUP BY p.start_regimen_date";
		$res=$this -> db -> query($get_patient_sql);
		$results=$res -> result_array();
		return $results;
	}

	//Get patients expected for appointment
	public function getExpectedPatients($startdate="",$enddate=""){
		
		$facility_code = $this -> session -> userdata('facility');
		$timestamp = time();
		$edate=date('Y-m-d', $timestamp);
		$dates=array();
		$x=7;
		$y=0;
		
		
		//If no parameters are passed, get enrolled patients for the past 7 days
		if($startdate=="" || $enddate==""){
			for ($i = 0 ; $i < $x ; $i++) {
			if (date("D", $timestamp) != "Sun"){
					$sdate=date('Y-m-d', $timestamp);
					//Store the days in an array
					$dates[$y]=$sdate;
					$y++;
				}
				//If sunday is included, add one more day
				else{$x=8;}
			    $timestamp -= 24 * 3600;
			}
			$start_date=$sdate;
			$end_date=$edate;
		}
		else{
			$start_date=$startdate;
			$end_date=$enddate;
		}
		//Get patients who are expected
		$patients_expected_sql="select distinct pa.patient,pa.appointment,UPPER(p.first_name) as first_name from patient_appointment pa, patient p where pa.appointment between '" .$start_date. "' and '" .$end_date. "'  and pa.patient = p.patient_number_ccc and p.facility_code='" .$facility_code. "' AND pa.facility=p.facility_code GROUP BY pa.patient,pa.appointment ORDER BY pa.appointment";
		$res=$this -> db -> query($patients_expected_sql);
		$results=$res -> result_array();
		$counter=0;
		$x=0;
		$y=0;
		$v=0;
		$n=0;
		$count_patient_date=0;
		$date_appointment="";
		$patients_array[$counter]['total_patient']=count($results);
		//Array to store dates and count of patients
		$patients_array=array();
		foreach ($results as $key => $value) {
			$count_patient_date++;
			if($x==0){
				$x=1;
				$date_appointment=$value['appointment'];
			}
			//If appointment date changes
			if($value['appointment']!=$date_appointment ){
				//Initialise patients visited and not visited count
				//echo $count_patient_date;
				$count_patient_date=1;
				$v=0;
				$n=0;
				$y=0;
				$counter++;
				$patients_array[$counter]['date_appointment']=$value['appointment'];
				$patients_array[$counter]['total_day']=$count_patient_date;
				$date_appointment=$value['appointment'];
			}	
			
			else if($value['appointment']==$date_appointment){
				
				if($y!=1){
					//Initialise patients visited and not visited count
					$patients_array[$counter]['date_appointment']=$value['appointment'];
					$patients_array[$counter]['patient_visited']=0;
					$patients_array[$counter]['patient_not_visited']=0;
				}
				$patients_array[$counter]['total_day']=$count_patient_date;
				$y=1;
				
				
			}
			//Check if patient came for appointment
			$visited_patients_sql="select patient_id from patient_visit pv left join patient p on p.patient_number_ccc=pv.patient_id where pv.dispensing_date='".$value['appointment']."' and pv.patient_id='" .$value['patient']. "' and pv.facility='" .$facility_code. "' and pv.facility=p.facility_code ";
			$res=$this -> db -> query($visited_patients_sql);
			$results=$res -> result_array();
			if(count($results)!=0){
				$v++;
				$patients_array[$counter]['patient_visited']=$v;
			}
			else{
				$n++;
				$patients_array[$counter]['patient_not_visited']=$n;
			}
			
		}
		//var_dump($patients_array);
		$strXML = "<chart useroundedges='1' caption='Weekly summary of patient appointment'>";
		foreach ($patients_array as $patients){
			
		}
		
	}
}
	
 ?>