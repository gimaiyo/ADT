<?php

class Upload_Management extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper(array('form', 'url'));
		ini_set("max_execution_time", "1000000");
		ini_set("upload_max_filesize", "500000000");
		$this -> load -> database();
		$data = array();
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

	public function startMigration() {
		$sql = "select facilitycode,name from facilities order by name asc";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$data['facilities'] = $results;
		$this -> load -> view('migration_v', $data);
	}

	public function migrate($facility="") {
		$str = "";
		/*SQL SCRIPT*/

		//Migrating drugcodes
		$sql = "Truncate drugcode;";
		$sql .= "INSERT INTO drugcode(drug,pack_size,unit,generic_name,safety_quantity,comment,supported_by,dose,duration,quantity,tb_drug,drug_in_use,supplied)SELECT arvdrugsid,packsizes,unit,genericname,saftystock,comment,supportedby,stddose,stdduration,stdqty,IF(tbdrug=0,'F','T')as tbdrug,'T','1' from tblarvdrugstockmain;";
		//Migrating patient status
		$sql .= "Truncate patient_status;";
		$sql .= "INSERT INTO patient_status(id,Name,Active)SELECT currentstatusid,currentstatus,'1' FROM tblcurrentstatus WHERE currentstatus is not null;";
		//Migrating patient doses
		$sql .= "Truncate dose;";
		$sql .= "INSERT INTO dose(Name,value,frequency,Active)SELECT dose,value,frequency ,'1' FROM tbldose;";
		//Migrating generic names
		$sql .= "Truncate generic_name;";
		$sql .= "INSERT INTO generic_name(id,name,active)SELECT genid,genericname,'1' FROM tblgenericname WHERE genericname is not null;";
		//Migrating Opportunistic Infections
		$sql .= "Truncate opportunistic_infection;";
		$sql .= "INSERT INTO opportunistic_infection(name,indication,active)SELECT indicationname,indicationcode,'1'  FROM tblindication;";
		//Migrating Regimen Change Purposes
		$sql .= "Truncate regimen_change_purpose;";
		$sql .= "INSERT INTO regimen_change_purpose(id,name,active)SELECT  reasonforchangeid,reasonforchange,'1'  FROM tblreasonforchange  WHERE reasonforchange is not null;";
		//Migrating Regimen Categories
		$sql .= "Truncate regimen_category;";
		$sql .= "INSERT INTO regimen_category(id,Name,Active)SELECT categoryid,categoryname,'1' FROM tblregimencategory;";
		//Migrating Regimen Service Types
		$sql .= "Truncate regimen_service_type;";
		$sql .= "INSERT INTO regimen_service_type(id,name,active)SELECT typeofserviceid,typeofservice,'1'  FROM tbltypeofservice;";
		//Migrating Regimens
		$sql .= "Truncate regimen;";
		$sql .= "INSERT INTO regimen(regimen_code,regimen_desc,line,remarks,category,type_of_service,enabled)SELECT regimencode,regimen,line,remarks,category,typeoservice,IF(status='New','1','0') as status FROM tblregimen;";
		//Migrating Regimens_Drugs
		$sql .= "Truncate regimen_drug;";
		$sql .= "INSERT INTO regimen_drug(regimen,drugcode,active)SELECT  regimencode,combinations,'1' FROM tbldrugsinregimen;";
		//Migration Users
		$sql .= "Truncate users;";
		$sql .= "INSERT INTO users(Name,Username,Password,Access_Level,Facility_Code,Active)SELECT name,userid,md5(concat('67d573de98323509593b1e2f258ee47e',password)) as password,IF(UCASE(authoritylevel)='USER','2','1')  as authoritylevel,'$facility','1' FROM tblsecurity;";
		//Migration Patient Sources
		$sql .= "Truncate patient_source;";
		$sql .= "INSERT INTO patient_source(id,name,active)SELECT sourceid,sourceofclient,'1' FROM tblsourceofclient WHERE sourceofclient is not null;";
		//Migration Transaction Types
		$sql .= "Truncate transaction_type;";
		$sql .= "INSERT INTO transaction_type(id,name,`desc`,active)SELECT transactiontype,transactiondescription,reporttitle,'1' FROM tblstocktransactiontype;";
		//Migration Visit Purposes
		$sql .= "Truncate visit_purpose;";
		$sql .= "INSERT INTO visit_purpose(id,name,active) SELECT transactioncode,visittranname,'1'  FROM tblvisittransaction;";
		//Migration Patients
		$sql .= "Truncate patient;";
		$sql .= "INSERT INTO patient(`patient_number_ccc`,`first_name`,`last_name`,`gender`,`pregnant`,`date_enrolled`,`start_weight`,`supported_by`,`other_illnesses`,`adr`,`other_drugs`,`service`,`nextappointment`,`current_status`,`current_regimen`,`start_regimen`,`physical`,`weight`,`start_bsa`,`sa`,`start_height`,`height`,`source`,`tb`,`start_regimen_date`,`status_change_date`,`other_name`,`dob`,`pob`,`phone`,`alternate`,`smoke`,`alcohol`,`transfer_from`,`facility_code`)select artid,firstname,surname,sex,pregnant,datetherapystarted,weightonstart,clientsupportedby,otherdeaseconditions,adrorsideeffects,otherdrugs,typeofservice,dateofnextappointment,currentstatus,currentregimen,regimenstarted,address,currentweight, startbsa,currentbsa,startheight,currentheight,sourceofclient,tb,datestartedonart,datechangedstatus,lastname,dateofbirth,placeofbirth, patientcellphone,alternatecontact,patientsmoke,patientdrinkalcohol,transferfrom,'$facility' FROM tblartpatientmasterinformation;";
		//Migrate Patient Visits
		$sql.="INSERT INTO patient_visit(patient_id,dispensing_date,drug_id,brand,visit_purpose,quantity,dose,duration,regimen,last_regimen,comment,user,indication,current_weight,pill_count,adherence,regimen_change_reason,batch_number,facility)SELECT artid,dateofvisit,drugname,brandname,transactioncode,arvqty,dose,duration,regimen,lastregimen,comment,operator,indication,weight,pillcount,adherence,reasonsforchange,batchno,'$facility' FROM tblartpatienttransactions;";
		//Migrate drug Stock Movements
		//$sql.="INSERT INTO drug_stock_movement(drug,transaction_date,order_number,batch_number,transaction_type,source,destination,expiry_date,packs,unit_cost,quantity,quantity_out,amount,remarks,facility)SELECT arvdrugsid,trandate,reforderno,batchno,transactiontype,'$facility','$facility',expirydate,npacks,unitcost,'0',qty,amount,remarks,operator,'$facility' FROM tblarvdrugstocktransactions;";

		/*DROP STATEMENTS*/
		$sql .= "DROP TABLE tblARVDrugStockMain;";
		$sql .= "DROP TABLE tblCurrentStatus;";
		$sql .= "DROP TABLE tblDose;";
		$sql .= "DROP TABLE tblDrugsInRegimen;";
		$sql .= "DROP TABLE tblGenericName;";
		$sql .= "DROP TABLE tblIndication;";
		$sql .= "DROP TABLE tblReasonforChange;";
		$sql .= "DROP TABLE tblRegimen;";
		$sql .= "DROP TABLE tblRegimenCategory;";
		$sql .= "DROP TABLE tblSecurity;";
		$sql .= "DROP TABLE tblARTPatientMasterInformation;";
		$sql .= "DROP TABLE tblStockTransactionType;";
		$sql .= "DROP TABLE tblTypeOfService;";
		$sql .= "DROP TABLE tblVisitTransaction;";
		$sql .= "DROP TABLE tblSourceOfClient;";
		$sql.="DROP TABLE tblARTPatientTransactions;";
		//$sql.="DROP TABLE tblARVDrugStockTransactions;";

		$file = 'migrate.sql';
		// Open the file to get existing content
		$current = @file_get_contents($file);
		// Append SQL SCRIPT
		$current .= "$sql";
		// Write the contents back to the file
		file_put_contents($file, $current);
		$str = realpath($_SERVER['MYSQL_HOME']) . "\mysql";
		$script_path = $_SERVER['DOCUMENT_ROOT'] . "/ADT/" . $file;
		$mysql_bin = str_replace("\\", "\\\\", $str);
		$script_path = str_replace("/", "//", $script_path);
		//Load File to mysql for execcution in command prompt
		$command = "$mysql_bin -v -u root -h localhost testadt<\"$script_path\"";
		$results = shell_exec($command);
		echo $results."Migration Complete";
		//file_put_contents($file,"");
	}

	public function base_params($data) {
		$data['settings_view'] = "upload_form_v";
		$data['quick_link'] = "upload";
		$data['content_view'] = "settings_v";
		$this -> load -> view("template", $data);
	}

}
?>