<?php

class Upload_Management extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper(array('form', 'url'));
		ini_set("max_execution_time", "1000000");
		ini_set("upload_max_filesize", "500000000");
	}

	public function index() {
		$data['error'] = '';
		$data['title'] = "Upload CSV";
		$data['banner_text'] = "ADT Data Migration";
		$data['link'] = "upload";
		$data['facilities'] = Facilities::getFacilities();
		$this -> base_params($data);
	}

	public function do_upload() {
		$config['upload_path'] = '././uploads/';
		$config['allowed_types'] = 'csv';
		$config['max_size'] = '1000000000';
		$upload_type = $_POST['upload_type'];

		$this -> load -> library('upload', $config);
		$facility_code = $this -> session -> userdata('facility');
		if (!$this -> upload -> do_upload() || $upload_type == "") {
			$data['error'] = $this -> upload -> display_errors();
			$this -> session -> set_userdata('upload_counter', '1');
			redirect("upload_management/index");
		} else {
			$test_type = $_POST['test_type'];
			$facility = $_POST["facility"];
			if ($upload_type == 1) {
				$table = "patient_temp";
				if ($test_type == 2) {
					$target_table = "patient";
					$appointment_table = "patient_appointment";
				}
				if ($test_type == 1) {
					$target_table = "patient_tempp";
					$appointment_table = "patient_appointment_temp";
				}
				$format_table = "(ArtID,Firstname,Surname,Sex,Age,Pregnant,DateTherapyStarted,WeightOnStart,ClientSupportedBy,OtherDeaseConditions,ADRorSideEffects,ReasonsforChanges,OtherDrugs,TypeOfService,DaysToNextAppointment,DateOfNextAppointment,CurrentStatus,CurrentRegimen,RegimenStarted,Address,CurrentWeight,startBSA,currentBSA,ischild,isadult,StartHeight,CurrentHeight,Naive,NonNaive,SourceofClient,Cotrimoxazole,TB,NoCotrimoxazole,NoTB,DateStartedonART,DateChangedStatus,NcurrentAge,OPIPNO,LastName,DateofBirth,PlaceofBirth,PatientCellphone,AlternateContact,PatientSmoke,PatientDrinkAlcohol,PatientDontSmoke,PatientDontDrinkAlcohol,InactiveDays,TransferFrom,facility_id)SET id=NULL,facility_id=$facility";
				//Data sanitization
				$next_sql = "update `$table` SET DateTherapyStarted=STR_TO_DATE(DateTherapyStarted,'%m/%d/%Y') WHERE DateTherapyStarted like '%/%';";
				$next_sql .= "update `$table` SET DateofBirth=DATE_SUB( DateTherapyStarted, INTERVAL Age YEAR ) WHERE DateofBirth='';";
				$next_sql .= "update `$table` SET DateofBirth=STR_TO_DATE(DateofBirth,'%m/%d/%Y') WHERE DateofBirth like '%/%';";
				$next_sql .= "update `$table` set Sex = '1' where Sex like '%Ma%';";
				$next_sql .= "update `$table` set Sex = '2' where Sex like '%F%';";
				$next_sql .= "update `$table` set Pregnant = '0' where Pregnant like '%FA%';";
				$next_sql .= "update `$table` set Pregnant = '1' where Pregnant like '%TR%';";
				$next_sql .= "update `$table` set TB = '0' where TB like '%FA%';";
				$next_sql .= "update `$table` set TB = '1' where TB like '%TR%';";
				$next_sql .= "update `$table` set PatientSmoke = '0' where PatientSmoke like '%FA%';";
				$next_sql .= "update `$table` set PatientSmoke = '1' where PatientSmoke like '%TR%';";
				$next_sql .= "update `$table` set PatientDrinkAlcohol = '0' where PatientDrinkAlcohol like '%FA%';";
				$next_sql .= "update `$table` set PatientDrinkAlcohol = '1' where PatientDrinkAlcohol like '%TR%';";
				//$next_sql .= "update `$table` set DateofBirth =  STR_TO_DATE(DateofBirth,'%m/%d/%Y') where DateofBirth like '%/%';";
				$next_sql .= "update `$table` set DateChangedStatus = STR_TO_DATE(DateChangedStatus,'%m/%d/%Y') where DateChangedStatus like '%/%';";
				//$next_sql .= "update `$table` set DateTherapyStarted = STR_TO_DATE(DateTherapyStarted,'%m/%d/%Y') where DateTherapyStarted like '%/%';";
				$next_sql .= "update `$table` set DateStartedonART = STR_TO_DATE(DateStartedonART,'%m/%d/%Y') where DateStartedonART like '%/%';";
				$next_sql .= "update `$table` set DateofNextAppointment =  STR_TO_DATE(DateofNextAppointment,'%m/%d/%Y') where DateofNextAppointment like '%/%';";
				$next_sql .= "update `$table` p, regimen r set RegimenStarted=r.id where RegimenStarted = r.regimen_code;";
				$next_sql .= "update `$table` p, regimen r set CurrentRegimen=r.id where CurrentRegimen= r.regimen_code;";
				$next_sql .= "update `$table` p, regimen r set RegimenStarted=r.merged_to,p.start_regimen_merged_from=r.id where r.merged_to !='' and p.RegimenStarted = r.regimen_code;";
				$next_sql .= "update `$table` p, regimen r set CurrentRegimen=r.merged_to,p.current_regimen_merged_from=r.id where r.merged_to !='' and p.CurrentRegimen= r.regimen_code;";

				//Transfer from temporary table to permanent table
				$next_sql .= "insert into `$target_table`(patient_number_ccc, first_name, last_name, other_name, dob, pob, gender, pregnant,start_weight,start_height,start_bsa,weight,height,sa,phone, physical, alternate, other_illnesses, other_drugs, adr, tb, smoke, alcohol, date_enrolled, source, supported_by, facility_code, service, start_regimen,current_status, migration_id,status_change_date,start_regimen_date,current_regimen,nextappointment,transfer_from,start_regimen_merged_from,current_regimen_merged_from)select ArtID, Firstname,Surname, LastName,DateofBirth , PlaceofBirth, Sex, Pregnant, WeightOnStart, StartHeight, startBSA,CurrentWeight,CurrentHeight,currentBSA,PatientCellphone, Address, AlternateContact, OtherDeaseConditions, OtherDrugs, ADRorSideEffects, TB, PatientSmoke, PatientDrinkAlcohol, DateTherapyStarted, SourceofClient, ClientSupportedBy, facility_id, TypeOfService, RegimenStarted, CurrentStatus, facility_id,DateChangedStatus,DateStartedonART,CurrentRegimen,DateofNextAppointment,TransferFrom,start_regimen_merged_from,current_regimen_merged_from from `$table`;";
				$next_sql .= "insert into `$appointment_table`(patient, appointment, facility) select ArtID, DateofNextAppointment,facility_id from `$table`;";
				$next_sql .= "truncate `$table`;";

			}
			if ($upload_type == 2) {
				$table = "patient_visit_test";
				if ($test_type == 2) {
					$target_table = "patient_visit";
				}
				if ($test_type == 1) {
					$target_table = "patient_visit_tempp";
				}
				$format_table = "(PatientTranNo,ARTID,DateofVisit,Drugname,BrandName,TransactionCode,unit,ARVQty,Dose,duration,Regimen,LastRegimen,Comment,Operator,Indication,Weight,pillCount,Adherence,DaysLate,ReasonsForChange,RefOrderNo,BatchNo,ExpiryDate)";
				//Data sanitization
				$next_sql = "update `$table` p, brand b set BrandName = b.id where BrandName = b.brand;";
				$next_sql .= "update `$table` set DateofVisit =  STR_TO_DATE(DateofVisit ,'%m/%d/%Y') where DateofVisit like '%/%';";
				$next_sql .= "update `$table` set DateofVisit= replace(DateofVisit,'0201','2011')where DateofVisit like '%0201%';";
				$next_sql .= "update `$table` p, drugcode d set p.Drugname=d.id where p.Drugname = d.drug;";
				$next_sql .= "update `$table` p, regimen r set p.Regimen=r.id where p.Regimen = r.regimen_code;";
				$next_sql .= "update `$table` p, regimen r set p.LastRegimen=r.id where p.LastRegimen = r.regimen_code;";
				$next_sql .= "update `$table` p, drugcode d set p.Drugname=d.merged_to,p.merged_from= d.id where d.merged_to !='' and Drugname = d.drug;";
				$next_sql .= "update `$table` p, regimen r set p.Regimen=r.merged_to,p.regimen_merged_from=r.id where r.merged_to !='' and Regimen = r.regimen_code;";
				$next_sql .= "update `$table` p, regimen r set p.LastRegimen=r.merged_to,p.last_regimen_merged_from=r.id where r.merged_to !='' and LastRegimen = r.regimen_code;";

				//Transfer from temporary table to permanent table
				$next_sql .= "insert into `$target_table` (patient_id, current_weight, regimen,last_regimen, regimen_change_reason, drug_id, batch_number, brand, indication, pill_count, comment, user, facility, dose, dispensing_date, migration_id,quantity,visit_purpose,duration,merged_from,regimen_merged_from,last_regimen_merged_from) select ARTID, Weight, Regimen, LastRegimen,ReasonsForChange, Drugname, BatchNo, BrandName, Indication, pillCount, Comment, Operator, $facility, Dose, DateofVisit, PatientTranNo, ARVQty, TransactionCode,duration,merged_from,regimen_merged_from,last_regimen_merged_from from `$table`;";
				$next_sql .= "truncate `$table`;";

			}

			if ($upload_type == 3) {
				$table = "drug_stock_movement_temp";
				if ($test_type == 2) {
					$target_table = "drug_stock_movement";
				}
				if ($test_type == 1) {
					$target_table = "drug_stock_movement_test";
				}
				$format_table = "(StockTranNo,ARVDrugsID,Unit,TranDate,RefOrderNo,BatchNo,TransactionType,SourceorDestination,CollectedBy,Expirydate,PackSize,Npacks,UnitCost,Qty,Amount,Remarks,operator,RunningStock,facility_id)SET id=NULL,facility_id=$facility";
				//Data sanitization
				$next_sql = "update `$table` set TranDate =  STR_TO_DATE(TranDate ,'%m/%d/%Y') where TranDate like '%/%';";
				$next_sql .= "update `$table` set Expirydate =  STR_TO_DATE(Expirydate ,'%m/%d/%Y') where Expirydate like '%/%';";
				$next_sql .= "update `$table`,drugcode d set ARVDrugsID=d.id where ARVDrugsID = d.drug;";
				$next_sql .= "update `$table` dsm,drugcode d set dsm.ARVDrugsID=d.merged_to,dsm.merged_from=d.id where d.merged_to!='' and dsm.ARVDrugsID=d.id;";

				//Transfer from temporary table to permanent table
				$next_sql .= "insert into `$target_table`(`drug`, `transaction_date`, `batch_number`, `transaction_type`, `destination`, `expiry_date`, `packs`, `quantity_out`,`unit_cost`, `amount`, `remarks`, `operator`, `order_number`, `facility`,`merged_from`) select ARVDrugsID,TranDate,BatchNo,'5',SourceorDestination,Expirydate,Npacks,Qty,UnitCost,Amount,Remarks,operator,RefOrderNo,facility_id,merged_from from `$table` where (TransactionType = 'Dispensed to Patients' or TransactionType ='5');";
				$next_sql .= "insert into `$target_table`(`drug`, `transaction_date`, `batch_number`, `transaction_type`, `destination`, `expiry_date`, `packs`, `quantity_out`,`unit_cost`, `amount`, `remarks`, `operator`, `order_number`, `facility`,`merged_from`) select ARVDrugsID,TranDate,BatchNo,'6',SourceorDestination,Expirydate,Npacks,Qty,UnitCost,Amount,Remarks,operator,RefOrderNo,facility_id,merged_from from `$table` where TransactionType = '6';";
				$next_sql .= "insert into `$target_table`(`drug`, `transaction_date`, `batch_number`, `transaction_type`, `source`, `expiry_date`, `packs`, `quantity`,`unit_cost`, `amount`, `remarks`, `operator`, `order_number`, `facility`,`merged_from`) select ARVDrugsID,TranDate,BatchNo,TransactionType,SourceorDestination,Expirydate,Npacks,Qty,UnitCost,Amount,Remarks,operator,RefOrderNo,facility_id,merged_from from `$table` where TransactionType != '6' and TransactionType != '5';";
				$next_sql .= "truncate `$table`;";
			}

			//Updating all transaction timestamps
			$next_sql .= "update `$target_table` set timestamp=id where timestamp=''; ";

			$data = array('upload_data' => $this -> upload -> data());
			foreach ($data as $thedata) {

			}
			$thedata['full_path'];
			$csv_file = str_replace("\\", "\\\\", realpath($thedata['full_path']));
			$str = realpath($_SERVER['MYSQL_HOME']) . "\mysql";
			$mysql_bin = str_replace("\\", "\\\\", $str);
			$sql = "load data concurrent infile '$csv_file' INTO TABLE $table FIELDS TERMINATED BY ',' ENCLOSED BY '\"\"' LINES TERMINATED BY '\\r\\n'  IGNORE 1 LINES $format_table;" . $next_sql;
			$mysql_con = "$mysql_bin -u root  -h localhost adt --local-infile=1  -e \"$sql\"";

			//Code to execute in command line
			exec($mysql_con);
			unlink($csv_file);
			$this -> session -> set_userdata('upload_counter', '2');
			redirect("upload_management/index");

		}
	}

	public function base_params($data) {
		$data['settings_view'] = "upload_form_v";
		$data['quick_link'] = "upload";
		$data['content_view'] = "settings_v";
		$this -> load -> view("template", $data);
	}

}
?>