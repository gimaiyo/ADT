<?php
class Patient extends Doctrine_Record {

	public function setTableDefinition() {
		$this -> hasColumn('Medical_Record_Number', 'varchar', 10);
		$this -> hasColumn('Patient_Number_CCC', 'varchar', 10);
		$this -> hasColumn('First_Name', 'varchar', 50);
		$this -> hasColumn('Last_Name', 'varchar', 50);
		$this -> hasColumn('Other_Name', 'varchar', 50);
		$this -> hasColumn('Dob', 'varchar', 32);
		$this -> hasColumn('Pob', 'varchar', 100);
		$this -> hasColumn('Gender', 'varchar', 2);
		$this -> hasColumn('Pregnant', 'varchar', 2);
		$this -> hasColumn('Weight', 'varchar', 5);
		$this -> hasColumn('Height', 'varchar', 5);
		$this -> hasColumn('Sa', 'varchar', 5);
		$this -> hasColumn('Phone', 'varchar', 30);
		$this -> hasColumn('Physical', 'varchar', 100);
		$this -> hasColumn('Alternate', 'varchar', 50);
		$this -> hasColumn('Other_Illnesses', 'text');
		$this -> hasColumn('Other_Drugs', 'text');
		$this -> hasColumn('Adr', 'text');
		$this -> hasColumn('Tb', 'varchar', 2);
		$this -> hasColumn('Smoke', 'varchar', 2);
		$this -> hasColumn('Alcohol', 'varchar', 2);
		$this -> hasColumn('Date_Enrolled', 'varchar', 32);
		$this -> hasColumn('Source', 'varchar', 2);
		$this -> hasColumn('Supported_By', 'varchar', 2);
		$this -> hasColumn('Timestamp', 'varchar', 32);
		$this -> hasColumn('Facility_Code', 'varchar', 10);
		$this -> hasColumn('Service', 'varchar', 5);
		$this -> hasColumn('Start_Regimen', 'varchar', 5);
		$this -> hasColumn('Start_Regimen_Date', 'varchar', 20);
		$this -> hasColumn('Machine_Code', 'varchar', 5);
		$this -> hasColumn('Current_Status', 'varchar', 10);
		$this -> hasColumn('SMS_Consent', 'varchar', 2);
		$this -> hasColumn('Partner', 'varchar', 2);
		$this -> hasColumn('Fplan', 'text');
		$this -> hasColumn('Tbphase', 'varchar', 2);
		$this -> hasColumn('Startphase', 'varchar', 15);
		$this -> hasColumn('Endphase', 'varchar', 15);
		$this -> hasColumn('Partner_Status', 'varchar', 2);
		$this -> hasColumn('Status_Change_Date', 'varchar', 2);
		$this -> hasColumn('Support_Group', 'varchar', 255);
		$this -> hasColumn('Current_Regimen', 'varchar', 255);
        $this -> hasColumn('Start_Regimen_Merged_From', 'varchar', 20);
		$this -> hasColumn('Current_Regimen_Merged_From', 'varchar', 20);
		$this -> hasColumn('NextAppointment', 'varchar', 20);
		$this -> hasColumn('Start_Height', 'varchar', 20);
		$this -> hasColumn('Start_Weight', 'varchar', 20);
		$this -> hasColumn('Start_Bsa', 'varchar', 20);
		$this -> hasColumn('Transfer_From', 'varchar',100);
	}

	public function setUp() {
		$this -> setTableName('patient');
		$this -> hasOne('regimen as Parent_Regimen', array('local' => 'Current_Regimen', 'foreign' => 'id'));
		$this -> hasOne('patient_status as Parent_Status', array('local' => 'Current_Status', 'foreign' => 'id'));
	}

	public function getPatientNumbers($facility) {
		$query = Doctrine_Query::create() -> select("count(*) as Total_Patients") -> from("Patient") -> where("Facility_Code = $facility");
		$total = $query -> execute();
		return $total[0]['Total_Patients'];
	}

	public function getPagedPatients($offset, $items, $machine_code, $patient_ccc, $facility) {
		$query = Doctrine_Query::create() -> select("p.*") -> from("Patient p") -> leftJoin("Patient p2") -> where("p2.Patient_Number_CCC = '$patient_ccc' and p2.Machine_Code = '$machine_code' and p2.Facility_Code=$facility and p.Facility_Code=$facility") -> offset($offset) -> limit($items);
		$patients = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $patients;
	}
	
	public function getAllPatients($facility){
		$query=Doctrine_Query::create() -> select("*")->from ("patient")->where("Facility_Code='$facility'")->limit("500");;
		$patients = $query -> execute();
		return $patients;
	}

	public function getPagedFacilityPatients($offset, $items, $facility) {
		$query = Doctrine_Query::create() -> select("*") -> from("Patient") -> where("Facility_Code=$facility") -> offset($offset) -> limit($items);
		$patients = $query -> execute(array(), Doctrine::HYDRATE_ARRAY);
		return $patients;
	}

}
