<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Drug_stock_balance_sync extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		ini_set("max_execution_time", "1000000");
	}
	public function index() {
		$this->synch_balance();	
	}
	
	public function synch_balance($stock_type="2"){
		$not_saved=0;
		
		$facility_code = $this -> session -> userdata('facility');
		$stock_param="";
		//Store
		if($stock_type=='1'){
			$stock_param=" AND (source='".$facility_code."' OR destination='".$facility_code."') AND source!=destination ";
		}
		//Pharmacy
		else if($stock_type=='2'){
			$stock_param=" AND (source=destination) AND(source='".$facility_code."') ";
		}
		$get_all_drugs="select '" .$facility_code. "' as facility,d.id as id,drug from drugcode d where d.Enabled=1";
		$drugs=$this -> db -> query($get_all_drugs);
		$results=$drugs -> result_array();
		$count_it=0;
		//Loop through each drug to get the batches
		foreach ($results as $key => $value) {
			$stock_status=0;
			$drug_id=$value['id'];
			//Get all the batches
			$get_batches_sql="SELECT DISTINCT d.batch_number AS batch,expiry_date FROM drug_stock_movement d WHERE d.drug =  '" .$drug_id. "' AND facility='" .$facility_code. "' ".$stock_param." GROUP BY d.batch_number";
			$bacthes=$this -> db -> query($get_batches_sql);
			$batch_results=$bacthes -> result_array();
			foreach ($batch_results as $key => $batch_row) {
				//echo $count_it."<br>";
				//Query to check if batch has had a physical count
				$batch_no = $batch_row['batch'];
				$expiry_date=$batch_row['expiry_date'];
				$initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '" .$batch_no. "' AS batch FROM drug_stock_movement d WHERE d.drug =  '" .$drug_id. "' AND transaction_type =  '11' AND facility='" .$facility_code. "' ".$stock_param." AND d.batch_number =  '" .$batch_no. "'";
				$bacthes_initial_stock=$this -> db -> query($initial_stock_sql);
				$batch_initial_stock=$bacthes_initial_stock -> result_array();
				$x=count($batch_initial_stock);
				foreach ($batch_initial_stock as $key => $value2) {
					//If initial stock is not null
					if($value2['Initial_stock']!=null){
						//Get the balance for that batch
						$batch_stock_balance_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" .$value2['transaction_date']. "' AND curdate() AND facility='" .$facility_code. "' ".$stock_param." AND ds.drug ='" .$drug_id. "'  AND ds.batch_number ='" .$value2['batch']. "'";
						$bacthes_balance=$this -> db -> query($batch_stock_balance_sql);
						$batch_balance_array=$bacthes_balance -> result_array();
						foreach ($batch_balance_array as $key => $value3) {
							//Save balance in drug_stock_balance table
							if($value3['stock_levels']>0){
								$batch_balance_save=$value3['stock_levels'];
							}
							else{
								$batch_balance_save=0;
							}
							$batch_number_save=$batch_no;
							$drug_id_save=$drug_id;
							$expiry_date_save=$expiry_date;
							$insert_balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,stock_type,expiry_date,facility_code,balance) VALUES('".$drug_id_save."','".$batch_number_save."','".$stock_type."','".$expiry_date_save."','".$facility_code."','".$batch_balance_save."') ON DUPLICATE KEY UPDATE balance='".$batch_balance_save."'";
							$q=$this -> db -> query($insert_balance_sql);
							if(!$q){
								$not_saved++;
							}
						}
					}
					else{
						//Get the balance for that batch
						$batch_stock_balance_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '" .$drug_id. "' AND ds.expiry_date > curdate() AND facility='" .$facility_code. "' ".$stock_param." AND ds.batch_number='" .$value2['batch']. "'";
						$bacthes_balance=$this -> db -> query($batch_stock_balance_sql);
						$batch_balance_array=$bacthes_balance -> result_array();
						foreach ($batch_balance_array as $key => $value3) {
							//Store balance in drug_stock_balance table
							$batch_balance_save=$value3['stock_levels'];
							if($value3['stock_levels']>0){
								$batch_balance_save=$value3['stock_levels'];
							}
							else{
								$batch_balance_save=0;
							}
							$batch_number_save=$batch_no;
							$drug_id_save=$drug_id;
							$expiry_date_save=$expiry_date;
							$insert_balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,stock_type,expiry_date,facility_code,balance) VALUES('".$drug_id_save."','".$batch_number_save."','".$stock_type."','".$expiry_date_save."','".$facility_code."','".$batch_balance_save."') ON DUPLICATE KEY UPDATE balance='".$batch_balance_save."'";
							$q=$this -> db -> query($insert_balance_sql);
							if(!$q){
								$not_saved++;
							}
						}
					}
				}
			}

			$count_it++."<br>";
		}
	}

	public function drug_stock_movement_balance($stock_type="2"){
		$facility_code = $this -> session -> userdata('facility');
		$stock_param="";
		//Store
		if($stock_type=='1'){
			$stock_param=" AND (source='".$facility_code."' OR destination='".$facility_code."') AND source!=destination ";
		}
		//Pharmacy
		else if($stock_type=='2'){
			$stock_param=" AND (source=destination) AND(source='".$facility_code."') ";
		}
		//Get all drugs
		echo "<table border='1'><thead><th>Drug</th><th>Transaction Date</th><th>Transaction_Type</th><th>Batch</th><th>Quantity</th><th>Quantity_Out</th><th>Balance</th></thead>
				<tbody>";
		$get_all_drugs="select '" .$facility_code. "' as facility,d.id as id,drug from drugcode d where d.Enabled=1";
		$drugs=$this -> db -> query($get_all_drugs);
		$results=$drugs -> result_array();
		//Loop through each drug to get the batches
		foreach ($results as $key => $value) {
			$stock_status=0;
			$drug_id=$value['id'];
			//Get all the batches
			$get_batches_sql="SELECT DISTINCT d.batch_number AS batch,expiry_date FROM drug_stock_movement d WHERE d.drug =  '" .$drug_id. "' AND facility='" .$facility_code. "' ".$stock_param." GROUP BY d.batch_number";
			$batches=$this -> db -> query($get_batches_sql);
			$batch_results=$batches -> result_array();
			foreach ($batch_results as $key => $batch_row) {
				$batch_number=$batch_row['batch'];
				//get drug balances
				$get_balances_sql="SELECT ID,TRANSACTION_DATE,TRANSACTION_TYPE,QUANTITY,QUANTITY_OUT,IF(TRANSACTION_TYPE='11',@BALANCE:=@BALANCE-@BALANCE+QUANTITY,@BALANCE:=@BALANCE+QUANTITY-QUANTITY_OUT) as balance FROM drug_stock_movement ,(SELECT @BALANCE:=0) as DUMMY WHERE drug='" .$drug_id. "' AND batch_number='".$batch_number."' AND facility='" .$facility_code. "' ".$stock_param." ORDER BY ID ASC";
				$balances=$this -> db -> query($get_balances_sql);
				$balance_results=$balances -> result_array();
				//Loop through the array to get the actual values
				foreach ($balance_results as $key => $balance) {
					//Update the balance column 
					$update_balance_sql="UPDATE drug_stock_movement SET balance='".$balance['balance']."' WHERE id=".$balance['ID'];
					$balances=$this -> db -> query($update_balance_sql);
					//$balance_results=$balances -> result_array();
					
					echo "<tr><td>".$drug_id."</td><td>".$balance['TRANSACTION_DATE']."</td><td>".$balance['TRANSACTION_TYPE']."</td><td>".$batch_number."</td><td>". $balance['QUANTITY']."</td><td> ".$balance['QUANTITY_OUT']." </td><td> ".$balance['balance']."</td></tr>";
				}
			}
		}
		echo "</tbody></table>";
		
	}

	//Update balances in drug_stock_balance
	public function drug_stock_balance_update(){
		//SELECT QUANTITY ,QUANTITY_OUT,@BALANCE:=@BALANCE+QUANTITY-QUANTITY_OUT FROM adt.drug_stock_movement ,(SELECT @BALANCE:=0) as DUMMY WHERE transaction_type!='11' AND drug='155' AND batch_number='NVSA12022-' AND source='13050' AND source=destination ORDER BY ID ASC; 
		//SELECT TRANSACTION_TYPE,QUANTITY ,QUANTITY_OUT,IF(TRANSACTION_TYPE='11',@BALANCE:=@BALANCE-@BALANCE+QUANTITY,@BALANCE:=@BALANCE+QUANTITY-QUANTITY_OUT) FROM adt.drug_stock_movement ,(SELECT @BALANCE:=0) as DUMMY WHERE drug='155' AND batch_number='NVSA12022-' AND source='13050' AND source=destination ORDER BY ID ASC; 
		
	}

}
?>