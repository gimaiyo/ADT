<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Facilitydashboard_Management extends MY_Controller {
	var $drug_array = array();
	var $drug_count = 0;
	var $counter = 0;

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function index() {

	}

	public function order_notification() {
		$facility_code = $this -> session -> userdata("facility");
		$query = $this -> db -> query("SELECT COUNT(*) as total FROM facility_order f WHERE (f.status =  '3' AND (f.facility_id ='$facility_code' OR f.central_facility='$facility_code'))ORDER BY ABS(f.id) DESC ");
		$results = $query -> result_array();
		$results[0]['total'];
	}

	public function stock_notification($level) {
		//Get the facility_code
		$facility_code = $this -> session -> userdata("facility");
		$strDATA = "";
		$strcat = "";
		$strLEVEL = "";

		$strXML = "<chart caption='Drugs Below Safety Stock' useroundedges='1' >";
		//Level is Main Store
		if ($level == 1) {
			$stock_param = " AND (source='$facility_code' OR destination='$facility_code') AND source!=destination";
		}
		//Level is Pharmacy
		else if ($level == 2) {
			$stock_param = " AND (source=destination) AND(source='$facility_code')";
		}
		//Get all drugs that are active
		$drugs_query = "select d.id as id,drug, pack_size, name from drugcode d left join drug_unit u on d.unit = u.id where d.Enabled=1 and d.id IN('15','166','108','175') ";
		$drugs = $this -> db -> query($drugs_query);
		$drugs_results = $drugs -> result_array();
		foreach ($drugs_results as $drugs_result) {
			//Get Drug
			$drug = $drugs_result['id'];
			$drug_name = $drugs_result['drug'];
			$drug_unit = $drugs_result['name'];
			$drug_packsize = $drugs_result['pack_size'];
			$stock_level = 0;
			$today = date("Y-m-d");
			//Get all batches not expired
			$allbatches_query = "SELECT DISTINCT d.batch_number AS batch FROM drug_stock_movement d WHERE d.drug =  '$drug' AND expiry_date > '$today' AND facility='$facility_code' $stock_param GROUP BY d.batch_number";
			$batches = $this -> db -> query($allbatches_query);
			$batches_results = $batches -> result_array();
			foreach ($batches_results as $batches_result) {
				//Get Batch
				$batch = $batches_result['batch'];
				$physicalcount_query = "SELECT SUM(d.quantity) AS Initial_stock, d.transaction_date AS transaction_date FROM drug_stock_movement d WHERE d.drug ='$drug' AND transaction_type ='11' AND facility='$facility_code' $stock_param AND d.batch_number = '$batch'";
				$physicalcount = $this -> db -> query($physicalcount_query);
				$physicalcount_results = $physicalcount -> result_array();
				foreach ($physicalcount_results as $physicalcount_result) {
					//Get Initial Stock
					$initial_stock = $physicalcount_result['Initial_stock'];
					$transaction_date = $physicalcount_result['transaction_date'];
					//Check if initial stock is present meaning physical count done
					if ($initial_stock != null) {
						//Query to get stock level after physical count is done
						$stocklevel_query = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels,ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '$transaction_date' AND '$today' AND facility='$facility_code' $stock_param AND ds.drug ='$drug'  AND ds.batch_number ='$batch'";
					} else {
						//Query to get stock level when no physical count is done
						$stocklevel_query = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels,ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '$drug' AND ds.expiry_date > '$today' AND facility='$facility_code' $stock_param AND ds.batch_number='$batch'";
					}
					$stocklevels = $this -> db -> query($stocklevel_query);
					$stocklevels_results = $stocklevels -> result_array();
					foreach ($stocklevels_results as $stocklevels_result) {
						//Get stock Levels
						$stock_level += $stocklevels_result['stock_levels'];
					}

				}
			}
			//End of Drug(Switching to Next Drug)
			$safetystock_query = "SELECT SUM(d.quantity_out) AS TOTAL FROM drug_stock_movement d WHERE d.drug ='$drug' AND DATEDIFF(CURDATE(),d.transaction_date)<= 90 and facility='$facility_code' $stock_param";
			$safetystocks = $this -> db -> query($safetystock_query);
			$safetystocks_results = $safetystocks -> result_array();
			$three_monthly_consumption = 0;
			foreach ($safetystocks_results as $safetystocks_result) {
				$three_monthly_consumption = $safetystocks_result['TOTAL'];
				//Calculating Monthly Consumption hence Max-Min Inventory
				$monthly_consumption = ($three_monthly_consumption) / 3;
				$monthly_consumption = number_format($monthly_consumption, 2);

				//Therefore Maximum Consumption
				$maximum_consumption = $monthly_consumption * 3;
				$maximum_consumption = number_format($maximum_consumption, 2);

				//Therefore Minimum Consumption
				$minimum_consumption = $monthly_consumption * 1.5;
				$minimum_consumption = number_format($monthly_consumption, 2);

				//divides actual stocks by packsize
				$soh_packs = ($stock_level / $drug_packsize);
				$soh_packs = number_format($soh_packs, 1);

				if ($stock_level < $minimum_consumption) {
					if ($minimum_consumption < 0) {
						$minimum_consumption = 0;
					}
					if ($stock_level < 0) {
						$stock_level = 0;
					}
					$strDATA .= "<set label='$drug_name' value='$stock_level' />";
					$strLEVEL .= "<set label='$drug_name' value='$minimum_consumption' />";
					$strcat .= "<category label='$drug_name'/>";
				}
			}

		}
		$mainstrcat = "<categories>";
		$mainstrcat .= $strcat;
		$mainstrcat .= "</categories>";
		$mainsrtdata = "<dataset><dataset seriesName='Paediatric ART Patients'  showValues= '0'>";
		$mainsrtdata .= $strDATA;
		$mainsrtdata .= "</dataset></dataset>";
		$mainsrtlevel = "<lineset seriesname='Total ART Patients' showValues= '1' lineThickness='4' >";
		$mainsrtlevel .= $strLEVEL;
		$mainsrtlevel .= "</lineset>";
		$strXML .= $mainstrcat;
		$strXML .= $mainsrtdata;
		$strXML .= $mainsrtlevel;
		header('Content-type: text/xml');
		echo $strXML .= "</chart>";

	}

	public function showChart() {
		$this -> load -> view("drug_below_safety_v");
	}

	public function getExpiringDrugs($stock_type = 1) {
		$count = 0;
		$facility_code = $this -> session -> userdata('facility');
		$drugs_sql = "SELECT s.id AS id,s.drug AS Drug_Id,d.drug AS Drug_Name,d.pack_size AS pack_size, u.name AS Unit, s.batch_number AS Batch,s.expiry_date AS Date_Expired,DATEDIFF(s.expiry_date,CURDATE()) AS Days_Since_Expiry FROM drugcode d LEFT JOIN drug_unit u ON d.unit = u.id LEFT JOIN drug_stock_movement s ON d.id = s.drug LEFT JOIN transaction_type t ON t.id=s.transaction_type WHERE t.effect=1 AND DATEDIFF(s.expiry_date,CURDATE()) <=30 AND DATEDIFF(s.expiry_date,CURDATE())>=0 AND d.enabled=1 AND s.facility ='" . $facility_code . "' GROUP BY Batch ORDER BY Days_Since_Expiry asc";
		$drugs = $this -> db -> query($drugs_sql);
		$results = $drugs -> result_array();
		//Get all expiring drugs
		foreach ($results as $result => $value) {
			$count = 1;
			$this -> getBatchInfo($value['Drug_Id'], $value['Batch'], $value['Unit'], $value['Drug_Name'], $value['Date_Expired'], $value['Days_Since_Expiry'], $value['id'], $value['pack_size'], $stock_type, $facility_code);
		}
		//If no drugs if found, return null
		if ($count == 0) {
			$data['drug_details'] = "null";
		}
		$d = 0;
	
		$drugs_array = $this -> drug_array;
		$strXML = "<chart useroundedges='1' caption='Summary of Drugs Expiring in 30 Days' showValues= '0' baseFont='Arial' baseFontSize='11' palette='2' rotateNames='1' animation='1'  labelDisplay='Rotate' slantLabels='1'>";
		$strSTOCK="<dataset seriesName='Stock Level' color='AFD8F8' showValues= '0' >";
		$strDays="<dataset seriesName='Days to Expiry' color='FDC12E' showValues= '0'>";
		$strCAT = "<categories>";
		foreach ($drugs_array as $drugs) {
			$strCAT .= "<category label='" . $drugs['drug_name'] . "(" . $drugs['batch'] . ")" . "'/>";
			$strSTOCK.="<set value='".$drugs['stocks_display']."' />";   
			$strDays.="<set value='".$drugs['expired_days_display']."' />";   
		}
		$strCAT .= "</categories>";
		$strDays.="</dataset>";
		$strSTOCK.="</dataset>";
		$strXML.=$strCAT.$strDays.$strSTOCK;
		
        header('Content-type: text/xml');
		echo $strXML .= "</chart>";
	}

	public function getBatchInfo($drug, $batch, $drug_unit, $drug_name, $expiry_date, $expired_days, $drug_id, $pack_size, $stock_type, $facility_code) {
		$stock_status = 0;
		$stock_param = "";

		//Store
		if ($stock_type == '1') {
			$stock_param = " AND (source='" . $facility_code . "' OR destination='" . $facility_code . "') AND source!=destination ";
		}
		//Pharmacy
		else if ($stock_type == '2') {
			$stock_param = " AND (source=destination) AND(source='" . $facility_code . "') ";
		}
		$initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '" . $batch . "' AS batch FROM drug_stock_movement d WHERE d.drug =  '" . $drug . "' AND facility='" . $facility_code . "' " . $stock_param . " AND transaction_type =  '11' AND d.batch_number =  '" . $batch . "'";
		$batches = $this -> db -> query($initial_stock_sql);
		$batch_results = $batches -> result_array();
		foreach ($batch_results as $batch_result => $value) {
			$initial_stock = $value['Initial_stock'];
			//Check if initial stock is present meaning physical count done
			if ($initial_stock != null) {
				$batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" . $value['transaction_date'] . "' AND curdate() AND facility='" . $facility_code . "' " . $stock_param . " AND ds.drug ='" . $drug . "'  AND ds.batch_number ='" . $value['batch'] . "'";
				$second_row = $this -> db -> query($batch_stock_sql);
				$second_rows = $second_row -> result_array();

				foreach ($second_rows as $second_row => $value) {
					if ($value['stock_levels'] > 0) {
						$batch_balance = $value['stock_levels'];
						$ed = substr($expired_days, 0, 1);
						if ($ed == "-") {
							$expired_days = $expired_days;
						}

						$batch_stock = $batch_balance / $pack_size;
						$expired_days_display = number_format($expired_days);
						$stocks_display = ceil(number_format($batch_stock, 1));

						$this -> drug_array[$this -> counter]['drug_name'] = $drug_name;
						$this -> drug_array[$this -> counter]['batch'] = $batch;
						$this -> drug_array[$this -> counter]['stocks_display'] = $stocks_display;
						$this -> drug_array[$this -> counter]['expired_days_display'] = $expired_days_display;
						$this -> counter++;
					}
				}

			} else {

				$batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '" . $drug . "' AND facility='" . $facility_code . "' " . $stock_param . " AND ds.expiry_date > curdate() AND ds.batch_number='" . $value['batch'] . "'";
				$second_row = $this -> db -> query($batch_stock_sql);
				$second_rows = $second_row -> result_array();

				foreach ($second_rows as $second_row => $value) {

					if ($value['stock_levels'] > 0) {
						$batch_balance = $value['stock_levels'];
						$ed = substr($expired_days, 0, 1);
						if ($ed == "-") {
							$expired_days = $expired_days;
						}
						$batch_stock = $batch_balance / $pack_size;
						$expired_days_display = number_format($expired_days);
						$stocks_display = number_format($batch_stock, 1);

						$this -> drug_array[$this -> counter]['drug_name'] = $drug_name;
						$this -> drug_array[$this -> counter]['batch'] = $batch;
						$this -> drug_array[$this -> counter]['stocks_display'] = $stocks_display;
						$this -> drug_array[$this -> counter]['expired_days_display'] = $expired_days_display;
						$this -> counter++;
					}
				}
			}

		}
	}

	//Get patients enrolled
	public function getPatientsStartDate($startdate = "", $enddate = "") {
		$facility_code = $this -> session -> userdata('facility');
		$timestamp = time();
		$edate = date('Y-m-d', $timestamp);
		$dates = array();
		$x = 7;
		$y = 0;

		//If no parameters are passed, get enrolled patients for the past 7 days
		if ($startdate == "" || $enddate == "") {
			for ($i = 0; $i < $x; $i++) {
				if (date("D", $timestamp) != "Sun") {
					$sdate = date('Y-m-d', $timestamp);
					//Store the days in an array
					$dates[$y] = $sdate;
					$y++;
				}
				//If sunday is included, add one more day
				else {$x = 8;
				}
				$timestamp -= 24 * 3600;
			}
			$start_date = $sdate;
			$end_date = $edate;
		} else {date
			$start_date = $startdate;
			$end_date = $enddate;
		}
		$get_patient_sql = "SELECT COUNT(DISTINCT p.patient_number_ccc) as total,p.date_enrolled FROM patient p  LEFT JOIN regimen r ON r.id = p.start_regimen LEFT JOIN regimen_service_type t ON t.id = p.service LEFT JOIN supporter s ON s.id = p.supported_by  WHERE p.date_enrolled Between '" . $start_date . "' and '" . $end_date . "'  and p.facility_code='" . $facility_code . "' GROUP BY p.date_enrolled";
		$res = $this -> db -> query($get_patient_sql);
		foreach($results as  $result){
			
			
		}
	}

	//Get patients expected for appointment
	public function getExpectedPatients($startdate = "", $enddate = "") {

		$facility_code = $this -> session -> userdata('facility');
		$timestamp = time();
		$edate = date('Y-m-d', $timestamp);
		$dates = array();
		$x = 7;
		$y = 0;

		//If no parameters are passed, get enrolled patients for the past 7 days
		if ($startdate == "" || $enddate == "") {
			for ($i = 0; $i < $x; $i++) {
				if (date("D", $timestamp) != "Sun") {
					$sdate = date('Y-m-d', $timestamp);
					//Store the days in an array
					$dates[$y] = $sdate;
					$y++;
				}
				//If sunday is included, add one more day
				else {$x = 8;
				//Exclude sundays
				$sunday=date("Y-m-d", $timestamp);
				}
				$timestamp -= 24 * 3600;
			}
			$start_date = $sdate;
			$end_date = $edate;
		} else {
			$start_date = $startdate;
			$end_date = $enddate;
		}
		//Get patients who are expected
		$patients_expected_sql = "select distinct pa.patient,pa.appointment,UPPER(p.first_name) as first_name from patient_appointment pa, patient p where pa.appointment between '" . $start_date . "' and '" . $end_date . "'  and pa.patient = p.patient_number_ccc and p.facility_code='" . $facility_code . "' AND pa.facility=p.facility_code GROUP BY pa.patient,pa.appointment ORDER BY pa.appointment";
		$res = $this -> db -> query($patients_expected_sql);
		$results = $res -> result_array();
		$counter = 0;
		$x = 0;
		$y = 0;
		$v = 0;
		$n = 0;
		$count_patient_date = 0;
		$date_appointment = "";
		$patients_array[$counter]['total_patient'] = count($results);
		//Array to store dates and count of patients
		$patients_array = array();
		foreach ($results as $key => $value) {
			$count_patient_date++;
			if ($x == 0) {
				$x = 1;
				$date_appointment = $value['appointment'];
			}
			//If appointment date changes
			if ($value['appointment'] != $date_appointment) {
				//Initialise patients visited and not visited count
				//echo $count_patient_date;
				$count_patient_date = 1;
				$v = 0;
				$n = 0;
				$y = 0;
				$counter++;
				$patients_array[$counter]['date_appointment'] = $value['appointment'];
				$patients_array[$counter]['total_day'] = $count_patient_date;
				$date_appointment = $value['appointment'];
			} else if ($value['appointment'] == $date_appointment) {

				if ($y != 1) {
					//Initialise patients visited and not visited count
					$patients_array[$counter]['date_appointment'] = $value['appointment'];
					$patients_array[$counter]['patient_visited'] = 0;
					$patients_array[$counter]['patient_not_visited'] = 0;
				}
				$patients_array[$counter]['total_day'] = $count_patient_date;
				$y = 1;

			}
			//Check if patient came for appointment
			$visited_patients_sql = "select patient_id from patient_visit pv left join patient p on p.patient_number_ccc=pv.patient_id where pv.dispensing_date='" . $value['appointment'] . "' and pv.patient_id='" . $value['patient'] . "' and pv.facility='" . $facility_code . "' and pv.facility=p.facility_code ";
			$res = $this -> db -> query($visited_patients_sql);
			$results = $res -> result_array();
			if (count($results) != 0) {
				$v++;
				$patients_array[$counter]['patient_visited'] = $v;
			} else {
				$n++;
				$patients_array[$counter]['patient_not_visited'] = $n;
			}

		}
		//var_dump($patients_array);
		$strXML = "<chart useroundedges='1' caption='Weekly summary of patient appointment'>";
		foreach ($patients_array as $patients) {

		}

	}

	public function base_params($data) {
		$data['content_view'] = "settings_v";
		$data['quick_link'] = "client_sources";
		$this -> load -> view("template_admin", $data);
	}

}
