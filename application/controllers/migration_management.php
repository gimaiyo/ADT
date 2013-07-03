<?php
class Migration_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$data = array();
		$this -> load -> database();
		$this -> load -> library('encrypt');
	}

	public function index() {
		$this -> migration_interface();
	}

	public function migration_interface() {
		$data['content_view'] = "migration_new_v";
		$data['banner_text'] = "Data Migration";
		$tables = array('tblARVDrugStockMain', 'tblCurrentStatus', 'tblDose', 'tblDrugsInRegimen', 'tblGenericName', 'tblIndication', 'tblReasonforChange', 'tblRegimen', 'tblRegimenCategory', 'tblSecurity', 'tblARTPatientMasterInformation', 'tblStockTransactionType', 'tblTypeOfService', 'tblVisitTransaction', 'tblSourceOfClient', 'tblARTPatientTransactions', 'tblARVDrugStockTransactions');
		$data['tables'] = $tables;
		$this -> base_params($data);
	}

	public function simplemigrate($tablename, $targetname, $offset = 0) {
		$facility = $this -> session -> userdata('facility');
		$message = "";
		$appendsql = "LIMIT $offset,18446744073709551615";
		$sql = "";
		if ($targetname == 'drugcode') {
			$sql .= "INSERT IGNORE INTO drugcode(drug,pack_size,unit,generic_name,safety_quantity,comment,supported_by,dose,duration,quantity,tb_drug,drug_in_use,supplied)SELECT arvdrugsid,packsizes,unit,genericname,saftystock,comment,supportedby,stddose,stdduration,stdqty,IF(tbdrug=0,'F','T')as tbdrug,IF(inuse=0,'F','T') as inuse,'1' from tblarvdrugstockmain $appendsql;";
		} else if ($targetname == 'patient_status') {
			$sql .= "INSERT IGNORE INTO patient_status(id,Name,Active)SELECT currentstatusid,currentstatus,'1' FROM tblcurrentstatus WHERE currentstatus is not null $appendsql;";
		} else if ($targetname == 'dose') {
			$sql .= "INSERT IGNORE INTO dose(Name,value,frequency,Active)SELECT dose,value,frequency ,'1' FROM tbldose $appendsql;";
		} else if ($targetname == 'generic_name') {
			$sql .= "INSERT IGNORE INTO generic_name(id,name,active)SELECT genid,genericname,'1' FROM tblgenericname WHERE genericname is not null $appendsql;";
		} else if ($targetname == 'opportunistic_infection') {
			$sql .= "INSERT IGNORE INTO opportunistic_infection(name,indication,active)SELECT indicationname,indicationcode,'1'  FROM tblindication $appendsql;";
		} else if ($targetname == 'regimen_change_purpose') {
			$sql .= "INSERT IGNORE INTO regimen_change_purpose(id,name,active)SELECT  reasonforchangeid,reasonforchange,'1'  FROM tblreasonforchange  WHERE reasonforchange is not null $appendsql;";
		} else if ($targetname == 'regimen_category') {
			$sql .= "INSERT IGNORE INTO regimen_category(id,Name,Active)SELECT categoryid,categoryname,'1' FROM tblregimencategory $appendsql;";
		} else if ($targetname == 'regimen_service_type') {
			$sql .= "INSERT IGNORE INTO regimen_service_type(id,name,active)SELECT typeofserviceid,typeofservice,'1'  FROM tbltypeofservice $appendsql;";
		} else if ($targetname == 'regimen') {
			$sql .= "INSERT IGNORE INTO regimen(regimen_code,regimen_desc,line,remarks,category,type_of_service,enabled)SELECT regimencode,regimen,line,remarks,category,typeoservice,IF(`show`=0,'0','1') as active FROM tblregimen $appendsql;";
			$this -> db -> query($sql);
			$sql = "UPDATE `regimen` SET `enabled`='0' WHERE `regimen_desc`='';";
		} else if ($targetname == 'regimen_drug') {
			$sql .= "INSERT IGNORE INTO regimen_drug(regimen,drugcode,active)SELECT regimencode,combinations,'1' FROM tbldrugsinregimen WHERE combinations is not null $appendsql;";
			$this -> db -> query($sql);
			$sql = "UPDATE regimen_drug rd,regimen r,drugcode d SET rd.regimen=r.id,rd.drugcode=d.id WHERE rd.regimen=r.regimen_code AND rd.drugcode=d.drug;";
		} else if ($targetname == 'users_new') {
			$key = $this -> encrypt -> get_key();
			$today = date('Y-m-d H:i:s');
			$sql .= "INSERT IGNORE INTO users_new(id,Name,Username,Password,Access_Level,Facility_Code,Active,Created_By,Time_Created)VALUES('1','System Admin','admin',md5(concat('$key','admin')),'1','$facility','1','1','$today')";
			$this -> db -> query($sql);
			$sql = "INSERT IGNORE INTO users_new(Name,Username,Password,Access_Level,Facility_Code,Active,Created_By,Time_Created)SELECT name,userid,md5(concat('$key',password)) as password,IF(UCASE(authoritylevel)='USER','2','3')  as authoritylevel,'$facility','1','1','$today' FROM tblsecurity $appendsql;";
		} else if ($targetname == 'patient_source') {
			$sql .= "INSERT IGNORE INTO patient_source(id,name,active)SELECT sourceid,sourceofclient,'1' FROM tblsourceofclient WHERE sourceofclient is not null $appendsql;";
		} else if ($targetname == 'transaction_type') {
			$sql .= "INSERT IGNORE INTO transaction_type(id,name,`desc`,active)SELECT transactiontype,transactiondescription,reporttitle,'1' FROM tblstocktransactiontype $appendsql;";
		} else if ($targetname == 'visit_purpose') {
			$sql .= "INSERT IGNORE INTO visit_purpose(id,name,active) SELECT transactioncode,visittranname,'1'  FROM tblvisittransaction $appendsql;";
		} else if ($targetname == 'patient_new') {
			$sql = "INSERT IGNORE INTO patient_appointment_new(`patient`,`appointment`,`facility`)select artid,STR_TO_DATE(dateofnextappointment,'%Y-%m-%d'),'$facility' FROM tblartpatientmasterinformation $appendsql;";
			$this -> db -> query($sql);
			$sql = "select count(*) as total from $tablename";
			$query = $this -> db -> query($sql);
			$results = $query -> result_array();
			$last_index = $results[0]['total'];
			$this -> updatelog("patient_appointment_new", $last_index);
			$sql = "update `tblartpatientmasterinformation` SET dateofbirth=DATE_SUB(datetherapystarted, INTERVAL ncurrentage YEAR ) WHERE dateofbirth is null;";
			$query = $this -> db -> query($sql);
			$sql = "update `tblartpatientmasterinformation`,regimen r SET currentregimen=r.id WHERE currentregimen=r.regimen_code;";
			$query = $this -> db -> query($sql);
			$sql = "update `tblartpatientmasterinformation`,regimen r SET regimenstarted=r.id WHERE regimenstarted=r.regimen_code;";
			$query = $this -> db -> query($sql);
			$sql = "INSERT IGNORE INTO patient_new(`patient_number_ccc`,`first_name`,`last_name`,`gender`,`pregnant`,`date_enrolled`,`start_weight`,`supported_by`,`other_illnesses`,`adr`,`other_drugs`,`service`,`nextappointment`,`current_status`,`current_regimen`,`start_regimen`,`physical`,`weight`,`start_bsa`,`sa`,`start_height`,`height`,`source`,`tb`,`start_regimen_date`,`status_change_date`,`other_name`,`dob`,`pob`,`phone`,`alternate`,`smoke`,`alcohol`,`transfer_from`,`facility_code`)select artid,firstname,surname,IF(UCASE(sex)='MALE','1','2'),IF(pregnant=0,'0','1'),STR_TO_DATE(datetherapystarted, '%Y-%m-%d'),weightonstart,clientsupportedby,otherdeaseconditions,adrorsideeffects,otherdrugs,typeofservice,STR_TO_DATE(dateofnextappointment, '%Y-%m-%d'),currentstatus,currentregimen,regimenstarted,address,currentweight, startbsa,currentbsa,startheight,currentheight,sourceofclient,tb,STR_TO_DATE(datestartedonart, '%Y-%m-%d'),STR_TO_DATE(datechangedstatus, '%Y-%m-%d'),lastname,STR_TO_DATE(dateofbirth,'%Y-%m-%d'),placeofbirth, patientcellphone,alternatecontact,patientsmoke,patientdrinkalcohol,transferfrom,'$facility' FROM tblartpatientmasterinformation $appendsql;";

		}
		$this -> db -> query($sql);
		$message = "Data From <b>$tablename</b> Migrated to <b>$targetname</b> table <br/>";
		$sql = "select count(*) as total from $tablename";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$last_index = $results[0]['total'];
		$this -> updatelog($targetname, $last_index);
		echo $message;
	}

	public function advancedmigrate($tablename, $targetname, $offset = 0, $limit = 10000) {
		$facility = $this -> session -> userdata('facility');
		$message = "";
		$sql = "";
		if ($tablename == 'tblARTPatientTransactions') {
			$appendsql = "WHERE patienttranno >=$offset LIMIT $limit";
			$mainsql = "SELECT artid,dateofvisit,drugname,brandname,transactioncode,arvqty,dose,duration,regimen,lastregimen,comment,operator,indication,weight,pillcount,adherence,reasonsforchange,batchno,'$facility' FROM tblartpatienttransactions $appendsql;";
			$minsql = "SELECT temp.patienttranno as max FROM (SELECT patienttranno FROM tblartpatienttransactions $appendsql) as temp ORDER BY temp.patienttranno desc LIMIT 1";
			$query = $this -> db -> query($minsql);
			$results = $query -> result_array();
			$last_index = $results[0]['max'];
			$thesql = "SELECT patienttranno FROM tblartpatienttransactions WHERE patienttranno <='$last_index';";
			$sql .= "INSERT INTO patient_visit_new(patient_id,dispensing_date,drug_id,brand,visit_purpose,quantity,dose,duration,regimen,last_regimen,comment,user,indication,current_weight,pill_count,adherence,regimen_change_reason,batch_number,facility)$mainsql";
		} else if ($tablename == 'tblARVDrugStockTransactions') {
			$appendsql = "WHERE stocktranno >=$offset LIMIT $limit";
			$mainsql = "SELECT arvdrugsid,trandate,reforderno,batchno,transactiontype,'$facility','$facility',expirydate,npacks,unitcost,'0',qty,amount,remarks,operator,'$facility' FROM tblarvdrugstocktransactions $appendsql;";
			$minsql = "SELECT temp.stocktranno as max FROM (SELECT stocktranno FROM tblarvdrugstocktransactions $appendsql) as temp ORDER BY temp.stocktranno desc LIMIT 1";
			$query = $this -> db -> query($minsql);
			$results = $query -> result_array();
			$last_index = $results[0]['max'];
			$thesql = "SELECT stocktranno FROM tblarvdrugstocktransactions WHERE stocktranno <='$last_index';";
			$sql .= "INSERT INTO drug_stock_movement_new(drug,transaction_date,order_number,batch_number,transaction_type,source,destination,expiry_date,packs,unit_cost,quantity,quantity_out,amount,remarks,operator,facility)$mainsql";
		}
		$this -> db -> query($sql);
		$query = $this -> db -> query($thesql);
		$answer = $query -> num_rows();
		$this -> updatelog($targetname, $last_index, $answer);
		echo $answer . "," . $last_index;
	}

	public function countRecords($tablename) {
		$sql = "Select count(*) as total from $tablename";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		echo $results[0]['total'];

	}

	public function checklog($tablename) {
		$last_index = 0;
		$sql = "select * from migration_log where source='$tablename'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($tablename == "patient_visit_new" || $tablename == "drug_stock_movement_new") {
			$last_index = $results[0]['count'] . "," . $results[0]['last_index'];
		} else {
			$last_index = $results[0]['last_index'];
		}

		echo $last_index;
	}

	public function updatelog($tablename, $last_index, $count = '0') {
		$sql = "select * from migration_log where source='$tablename'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($tablename == "patient_visit_new" || $tablename == "drug_stock_movement_new") {
			if ($results) {
				//update
				$sql = "update migration_log set last_index='$last_index',count='$count' where source='$tablename'";
			} else {
				//insert
				$sql = "insert into migration_log(source,last_index,count)VALUES('$tablename','$last_index','$count')";
			}
		} else {
			if ($results) {
				//update
				$sql = "update migration_log set last_index='$last_index' where source='$tablename'";
			} else {
				//insert
				$sql = "insert into migration_log(source,last_index)VALUES('$tablename','$last_index')";
			}
		}
		$query = $this -> db -> query($sql);
	}

	public function base_params($data) {
		$data['title'] = "webADT | Data Migration";
		$data['_type'] = 'migration';
		$data['link'] = "migration_management";
		$this -> load -> view('template', $data);
	}

}
?>