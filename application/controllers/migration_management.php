<?php
class Migration_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$data = array();
		$this -> load -> database();
	}

	public function index() {
		$this -> migration_interface();
	}

	public function migration_interface() {
		$data['content_view'] = "migration_new_v";
		$data['banner_text'] = "Data Migration";
		$tables = array('tblARVDrugStockMain', 'tblCurrentStatus', 'tblDose', 'tblDrugsInRegimen', 'tblGenericName', 'tblIndication', 'tblReasonforChange', 'tblRegimen', 'tblRegimenCategory', 'tblSecurity', 'tblARTPatientMasterInformation', 'tblARTPatientMasterInformation', 'tblStockTransactionType', 'tblTypeOfService', 'tblVisitTransaction', 'tblSourceOfClient', 'tblARTPatientTransactions', 'tblARVDrugStockTransactions');
		$data['tables'] = $tables;
		$this -> base_params($data);
	}

	public function simplemigrate($tablename, $targetname, $offset = 0) {
		$facility = $this -> session -> userdata('facility');
		$message = "";
		$appendsql="LIMIT $offset,18446744073709551615";
		$sql = "TRUNCATE $targetname";
		$this -> db -> query($sql);
		$sql = "";
		if ($targetname == 'drugcode') {
			$sql .= "INSERT INTO drugcode(drug,pack_size,unit,generic_name,safety_quantity,comment,supported_by,dose,duration,quantity,tb_drug,drug_in_use,supplied)SELECT arvdrugsid,packsizes,unit,genericname,saftystock,comment,supportedby,stddose,stdduration,stdqty,IF(tbdrug=0,'F','T')as tbdrug,'T','1' from tblarvdrugstockmain $appendsql;";
		} else if ($targetname == 'patient_status') {
			$sql .= "INSERT INTO patient_status(id,Name,Active)SELECT currentstatusid,currentstatus,'1' FROM tblcurrentstatus WHERE currentstatus is not null $appendsql;";
		} else if ($targetname == 'dose') {
			$sql .= "INSERT INTO dose(Name,value,frequency,Active)SELECT dose,value,frequency ,'1' FROM tbldose $appendsql;";
		} else if ($targetname == 'generic_name') {
			$sql .= "INSERT INTO generic_name(id,name,active)SELECT genid,genericname,'1' FROM tblgenericname WHERE genericname is not null $appendsql;";
		} else if ($targetname == 'opportunistic_infection') {
			$sql .= "INSERT INTO opportunistic_infection(name,indication,active)SELECT indicationname,indicationcode,'1'  FROM tblindication $appendsql;";
		} else if ($targetname == 'regimen_change_purpose') {
			$sql .= "INSERT INTO regimen_change_purpose(id,name,active)SELECT  reasonforchangeid,reasonforchange,'1'  FROM tblreasonforchange  WHERE reasonforchange is not null $appendsql;";
		} else if ($targetname == 'regimen_category') {
			$sql .= "INSERT INTO regimen_category(id,Name,Active)SELECT categoryid,categoryname,'1' FROM tblregimencategory $appendsql;";
		} else if ($targetname == 'regimen_service_type') {
			$sql .= "INSERT INTO regimen_service_type(id,name,active)SELECT typeofserviceid,typeofservice,'1'  FROM tbltypeofservice $appendsql;";
		} else if ($targetname == 'regimen') {
			$sql .= "INSERT INTO regimen(regimen_code,regimen_desc,line,remarks,category,type_of_service,enabled)SELECT regimencode,regimen,line,remarks,category,typeoservice,IF(status='New','1','0') as status FROM tblregimen $appendsql;";
		} else if ($targetname == 'regimen_drug') {
			$sql .= "INSERT INTO regimen_drug(regimen,drugcode,active)SELECT  regimencode,combinations,'1' FROM tbldrugsinregimen $appendsql;";
		} else if ($targetname == 'users') {
			$sql .= "INSERT INTO users_new(Name,Username,Password,Access_Level,Facility_Code,Active)SELECT name,userid,md5(concat('67d573de98323509593b1e2f258ee47e',password)) as password,IF(UCASE(authoritylevel)='USER','2','1')  as authoritylevel,'$facility','1' FROM tblsecurity $appendsql;";
		} else if ($targetname == 'patient_source') {
			$sql .= "INSERT INTO patient_source(id,name,active)SELECT sourceid,sourceofclient,'1' FROM tblsourceofclient WHERE sourceofclient is not null $appendsql;";
		} else if ($targetname == 'transaction_type') {
			$sql .= "INSERT INTO transaction_type(id,name,`desc`,active)SELECT transactiontype,transactiondescription,reporttitle,'1' FROM tblstocktransactiontype $appendsql;";
		} else if ($targetname == 'visit_purpose') {
			$sql .= "INSERT INTO visit_purpose(id,name,active) SELECT transactioncode,visittranname,'1'  FROM tblvisittransaction $appendsql;";
		} else if ($targetname == 'patient') {
			$sql .= "INSERT INTO patient(`patient_number_ccc`,`first_name`,`last_name`,`gender`,`pregnant`,`date_enrolled`,`start_weight`,`supported_by`,`other_illnesses`,`adr`,`other_drugs`,`service`,`nextappointment`,`current_status`,`current_regimen`,`start_regimen`,`physical`,`weight`,`start_bsa`,`sa`,`start_height`,`height`,`source`,`tb`,`start_regimen_date`,`status_change_date`,`other_name`,`dob`,`pob`,`phone`,`alternate`,`smoke`,`alcohol`,`transfer_from`,`facility_code`)select artid,firstname,surname,sex,pregnant,datetherapystarted,weightonstart,clientsupportedby,otherdeaseconditions,adrorsideeffects,otherdrugs,typeofservice,dateofnextappointment,currentstatus,currentregimen,regimenstarted,address,currentweight, startbsa,currentbsa,startheight,currentheight,sourceofclient,tb,datestartedonart,datechangedstatus,lastname,dateofbirth,placeofbirth, patientcellphone,alternatecontact,patientsmoke,patientdrinkalcohol,transferfrom,'$facility' FROM tblartpatientmasterinformation $appendsql;";
		}
		$this -> db -> query($sql);
		$message = "Data From <b>$tablename</b> Migrated to <b>$targetname</b> table <br/>";
		$sql="select count(*) as total from $tablename";
		$query=$this -> db -> query($sql);
		$results=$query->result_array();
		$last_index=$results[0]['total'];
		$this->updatelog($targetname,$last_index);
		echo $message;
	}

	public function advancedmigrate($tablename, $targetname, $offset = 0, $limit = 10000) {
		$facility = $this -> session -> userdata('facility');
		$message = "";
		$sql = "";
		if ($tablename == 'tblARTPatientTransactions') {
			$appendsql="WHERE patienttranno >=$offset LIMIT $limit";
			$mainsql = "SELECT artid,dateofvisit,drugname,brandname,transactioncode,arvqty,dose,duration,regimen,lastregimen,comment,operator,indication,weight,pillcount,adherence,reasonsforchange,batchno,'$facility' FROM tblartpatienttransactions $appendsql;";
			$minsql="SELECT max(patienttranno)as max  FROM tblartpatienttransactions $appendsql";
			$query =$this -> db -> query($minsql);
			$last_index=$results[0]['max'];
			$sql .= "INSERT INTO patient_visit_new(patient_id,dispensing_date,drug_id,brand,visit_purpose,quantity,dose,duration,regimen,last_regimen,comment,user,indication,current_weight,pill_count,adherence,regimen_change_reason,batch_number,facility)$mainsql";
		} else if ($tablename == 'tblARVDrugStockTransactions') {
			$appendsql="WHERE stocktranno >=$offset LIMIT $limit";
			$mainsql = "SELECT arvdrugsid,trandate,reforderno,batchno,transactiontype,'$facility','$facility',expirydate,npacks,unitcost,'0',qty,amount,remarks,operator,'$facility' FROM tblarvdrugstocktransactions $appendsql;";
			$minsql="SELECT max(stocktranno)as max  FROM tblartpatienttransactions $appendsql";
			$query =$this -> db -> query($minsql);
			$results=$query->result_array();
			$last_index=$results[0]['max'];
			$sql .= "INSERT INTO drug_stock_movement_new(drug,transaction_date,order_number,batch_number,transaction_type,source,destination,expiry_date,packs,unit_cost,quantity,quantity_out,amount,remarks,operator,facility)$mainsql";
		}
		$sql;
		$this -> db -> query($sql);
		$query = $this -> db -> query($mainsql);
		$answer = $query -> num_rows();
		echo $offset + $answer.",".$last_index;
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
		if ($results) {
			foreach ($results as $result) {
				$last_index = $result['last_index'];
			}
		}
		echo $last_index;
	}

	public function updatelog($tablename,$last_index) {
		$sql = "select * from migration_log where source='$tablename'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			//update
			$sql = "update migration_log set last_index='$last_index' where source='$tablename'";
		} else {
			//insert
			$sql = "insert into migration_log(source,last_index)VALUES('$tablename','$last_index')";
		}
		$query = $this -> db -> query($sql);
	}

	public function base_params($data) {
		$data['title'] = "Data Migration";
		$data['_type'] = 'migration';
		$data['link'] = "migration_management";
		$this -> load -> view('template', $data);
	}

}
?>