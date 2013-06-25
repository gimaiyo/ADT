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

	public function simplemigrate($tablename, $targetname) {
		$facility = $this -> session -> userdata('facility');
		$message = "";
		$sql = "TRUNCATE $targetname";
		$this -> db -> query($sql);
		$sql="";
		if ($targetname == 'drugcode') {
			$sql .= "INSERT INTO drugcode(drug,pack_size,unit,generic_name,safety_quantity,comment,supported_by,dose,duration,quantity,tb_drug,drug_in_use,supplied)SELECT arvdrugsid,packsizes,unit,genericname,saftystock,comment,supportedby,stddose,stdduration,stdqty,IF(tbdrug=0,'F','T')as tbdrug,'T','1' from tblarvdrugstockmain;";
		} else if ($targetname == 'patient_status') {
			$sql .= "INSERT INTO patient_status(id,Name,Active)SELECT currentstatusid,currentstatus,'1' FROM tblcurrentstatus WHERE currentstatus is not null;";
		} else if ($targetname == 'dose') {
			$sql .= "INSERT INTO dose(Name,value,frequency,Active)SELECT dose,value,frequency ,'1' FROM tbldose;";
		} else if ($targetname == 'generic_name') {
			$sql .= "INSERT INTO generic_name(id,name,active)SELECT genid,genericname,'1' FROM tblgenericname WHERE genericname is not null;";
		} else if ($targetname == 'opportunistic_infection') {
			$sql .= "INSERT INTO opportunistic_infection(name,indication,active)SELECT indicationname,indicationcode,'1'  FROM tblindication;";
		} else if ($targetname == 'regimen_change_purpose') {
			$sql .= "INSERT INTO regimen_change_purpose(id,name,active)SELECT  reasonforchangeid,reasonforchange,'1'  FROM tblreasonforchange  WHERE reasonforchange is not null;";
		} else if ($targetname == 'regimen_category') {
			$sql .= "INSERT INTO regimen_category(id,Name,Active)SELECT categoryid,categoryname,'1' FROM tblregimencategory;";
		} else if ($targetname == 'regimen_service_type') {
			$sql .= "INSERT INTO regimen_service_type(id,name,active)SELECT typeofserviceid,typeofservice,'1'  FROM tbltypeofservice;";
		} else if ($targetname == 'regimen') {
			$sql .= "INSERT INTO regimen(regimen_code,regimen_desc,line,remarks,category,type_of_service,enabled)SELECT regimencode,regimen,line,remarks,category,typeoservice,IF(status='New','1','0') as status FROM tblregimen;";
		} else if ($targetname == 'regimen_drug') {
			$sql .= "INSERT INTO regimen_drug(regimen,drugcode,active)SELECT  regimencode,combinations,'1' FROM tbldrugsinregimen;";
		} else if ($targetname == 'users') {
			$sql .= "INSERT INTO users(Name,Username,Password,Access_Level,Facility_Code,Active)SELECT name,userid,md5(concat('67d573de98323509593b1e2f258ee47e',password)) as password,IF(UCASE(authoritylevel)='USER','2','1')  as authoritylevel,'$facility','1' FROM tblsecurity;";
		} else if ($targetname == 'patient_source') {
			$sql .= "INSERT INTO patient_source(id,name,active)SELECT sourceid,sourceofclient,'1' FROM tblsourceofclient WHERE sourceofclient is not null;";
		} else if ($targetname == 'transaction_type') {
			$sql .= "INSERT INTO transaction_type(id,name,`desc`,active)SELECT transactiontype,transactiondescription,reporttitle,'1' FROM tblstocktransactiontype;";
		} else if ($targetname == 'visit_purpose') {
			$sql .= "INSERT INTO visit_purpose(id,name,active) SELECT transactioncode,visittranname,'1'  FROM tblvisittransaction;";
		} else if ($targetname == 'patient') {
			$sql .= "INSERT INTO patient(`patient_number_ccc`,`first_name`,`last_name`,`gender`,`pregnant`,`date_enrolled`,`start_weight`,`supported_by`,`other_illnesses`,`adr`,`other_drugs`,`service`,`nextappointment`,`current_status`,`current_regimen`,`start_regimen`,`physical`,`weight`,`start_bsa`,`sa`,`start_height`,`height`,`source`,`tb`,`start_regimen_date`,`status_change_date`,`other_name`,`dob`,`pob`,`phone`,`alternate`,`smoke`,`alcohol`,`transfer_from`,`facility_code`)select artid,firstname,surname,sex,pregnant,datetherapystarted,weightonstart,clientsupportedby,otherdeaseconditions,adrorsideeffects,otherdrugs,typeofservice,dateofnextappointment,currentstatus,currentregimen,regimenstarted,address,currentweight, startbsa,currentbsa,startheight,currentheight,sourceofclient,tb,datestartedonart,datechangedstatus,lastname,dateofbirth,placeofbirth, patientcellphone,alternatecontact,patientsmoke,patientdrinkalcohol,transferfrom,'$facility' FROM tblartpatientmasterinformation;";
		}
		$this -> db -> query($sql);
		$message = "Data From <b>$tablename</b> Migrated to <b>$targetname</b> table <br/>";
		echo $message;
	}

	public function base_params($data) {
		$data['title'] = "Data Migration";
		$data['_type'] = 'migration';
		$data['link'] = "migration_management";
		$this -> load -> view('template', $data);
	}

}
?>