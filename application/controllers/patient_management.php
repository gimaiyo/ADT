<?php
class Patient_Management extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('PHPExcel');
		ini_set("max_execution_time", "100000");
		ini_set('memory_limit', '512M');
		$this -> load -> database();
	}

	public function index() {
		$this -> listing();
	}

	public function addpatient_show() {
		$data = array();
		$data['content_view'] = "add_patient_v";
		$this -> base_params($data);
	}

	public function checkpatient_no($patient_no) {
		//Variables
		$facility_code = $this -> session -> userdata('facility');
		$sql = "select * from patient where facility_code='$facility_code' and patient_number_ccc='$patient_no'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			echo json_decode("1");
		} else {
			echo json_decode("0");
		}

	}

	public function listing() {
		$data = array();
		$data['content_view'] = "patient_listing_v";
		$this -> base_params($data);
	}

	public function edit($record_no) {
		$sql = "select * from patient where id='$record_no'";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		if ($results) {
			return $results;
		}

	}

	public function save() {
		//Patient Information & Demographics
		$medical_record_number = $_POST['medical_record_number'];
		$patient_number_ccc = $_POST['patient_number'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$other_name = $_POST['other_name'];
		$dob = $_POST['dob'];
		$pob = $_POST['pob'];
		$gender = $_POST['gender'];
		$pregnant = $_POST['pregnant'];
		$start_weight = $_POST['weight'];
		$start_height = $_POST['height'];
		$start_bsa = $_POST['surface_area'];
		$phone = $_POST['phone'];
		$sms_consent = $_POST['sms_consent'];
		$physical_address = $_POST['physical'];
		$alternate_address = $POST['alternate'];

		//Patient History
		$patient_status = $_POST['pstatus'];
		$disclosure = $_POST['disco'];
		$family_planning = $_POST['plan_listing'];
		$other_illness_listing = $_POST['other_illnesses_listing'];
		$other_chronic = $_POST['other_chronic'];
		$other_drugs = $_POST['other_drugs'];
		$other_allergies = $_POST['other_allergies'];
		$other_allergies_listing = $_POST['other_allergies_listing'];
		$support_group = $_POST['support_group'];
		$smoke = $_POST['smoke'];
		$alcohol = $POST['alcohol'];
		$tb = $_POST['tb'];
		$tbphase = $_POST['tbphase'];
		$fromphase = $_POST['fromphase'];
		$tophase = $_POST['tophase'];

		//Program Information
		$date_enrolled = $_POST['current_status'];
		$date_of_status_change = $_POST['status_started'];
		$patient_source = $_POST['source'];
		$transfer_from = $_POST['patient_source'];
		$supported_by = $_POST['support'];
		$type_of_service = $_POST['service'];
		$start_regimen = $_POST['regimen'];
		$start_regimen_date = $_POST['service_started'];

		//Save data

		//Patient Information & Demographics
		$new_patient = new Patient();
		$new_patient -> Medical_Record_Number = $medical_record_number;
		$new_patient -> Patient_Number_CCC = $patient_number_ccc;
		$new_patient -> First_Name = $first_name;
		$new_patient -> Last_Name = $last_name;
		$new_patient -> Other_Name = $other_name;
		$new_patient -> Dob = $dob;
		$new_patient -> Pob = $pob;
		$new_patient -> Gender = $gender;
		$new_patient -> Dob = $dob;
		$new_patient -> Pob = $pob;
		$new_patient -> Gender = $gender;
		$new_patient -> Pregnant = $pregnant;
		$new_patient -> Start_Weight = $start_weight;
		$new_patient -> Start_Height = $start_height;
		$new_patient -> Start_Bsa = $start_bsa;
		$new_patient -> Phone = $phone;
		$new_patient -> SMS_Consent = $sms_consent;
		$new_patient -> Physical = $physical_address;
		$new_patient -> Alternate = $alternate_address;

		//Patient History
		$new_patient -> Partner = $patient_status;
		$new_patient -> Partner_Status = $disclosure;
		$new_patient -> Fplan = $family_planning;
		$new_patient -> Other_Illnesses = $other_illness_listing;
		$new_patient -> Other_Drugs = $other_chronic;
		$new_patient -> Adr = $other_allergies;
		$new_patient -> Smoke = $smoke;
		$new_patient -> Alcohol = $alcohol;
		$new_patient -> Tb = $tb;
		$new_patient -> Tbphase = $tbphase;
		$new_patient -> Startphase = $fromphase;
		$new_patient -> Endphase = $tophase;

		//Program Information
		$new_patient -> Date_Enrolled = $date_enrolled;
		$new_patient -> Status_Change_Date = $date_of_status_change;
		$new_patient -> Source = $patient_source;
		$new_patient -> Supported_By = $supported_by;
		$new_patient -> Facility_Code = $this -> session -> userdata('facility');
		$new_patient -> Service = $type_of_service;
		$new_patient -> Start_Regimen = $start_regimen;
		$new_patient -> Start_Regimen_Date = $start_regimen_date;
		$new_patient -> save();
	}

	public function update($record_id) {
		
		//Patient Information & Demographics
		$medical_record_number = $_POST['medical_record_number'];
		$patient_number_ccc = $_POST['patient_number'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$other_name = $_POST['other_name'];
		$dob = $_POST['dob'];
		$pob = $_POST['pob'];
		$gender = $_POST['gender'];
		$pregnant = $_POST['pregnant'];
		$start_weight = $_POST['weight'];
		$start_height = $_POST['height'];
		$start_bsa = $_POST['surface_area'];
		$phone = $_POST['phone'];
		$sms_consent = $_POST['sms_consent'];
		$physical_address = $_POST['physical'];
		$alternate_address = $POST['alternate'];

		//Patient History
		$patient_status = $_POST['pstatus'];
		$disclosure = $_POST['disco'];
		$family_planning = $_POST['plan_listing'];
		$other_illness_listing = $_POST['other_illnesses_listing'];
		$other_chronic = $_POST['other_chronic'];
		$other_drugs = $_POST['other_drugs'];
		$other_allergies = $_POST['other_allergies'];
		$other_allergies_listing = $_POST['other_allergies_listing'];
		$support_group = $_POST['support_group'];
		$smoke = $_POST['smoke'];
		$alcohol = $POST['alcohol'];
		$tb = $_POST['tb'];
		$tbphase = $_POST['tbphase'];
		$fromphase = $_POST['fromphase'];
		$tophase = $_POST['tophase'];

		//Program Information
		$date_enrolled = $_POST['current_status'];
		$date_of_status_change = $_POST['status_started'];
		$patient_source = $_POST['source'];
		$transfer_from = $_POST['patient_source'];
		$supported_by = $_POST['support'];
		$type_of_service = $_POST['service'];
		$start_regimen = $_POST['regimen'];
		$start_regimen_date = $_POST['service_started'];

		//Update data

		$data=array('Medical_Record_Number' => $medical_record_number,
		'Patient_Number_CCC' => $patient_number_ccc,
		'First_Name' => $first_name,
		'Last_Name' => $last_name,
		'Other_Name' => $other_name,
		'Dob' => $dob,
		'Pob' => $pob,
		'Gender' =>$gender,
        'Pregnant' => $pregnant,
		'Start_Weight' => $start_weight,
		'Start_Height' =>$start_height,
		'Start_Bsa' => $start_bsa,
		'Phone' => $phone,
		'SMS_Consent' =>$sms_consent,
		'Physical' => $physical_address,
		'Alternate' => $alternate_address,
        'Partner' => $patient_status,
		'Partner_Status' => $disclosure,
		'Fplan' => $family_planning,
		'Other_Illnesses' => $other_illness_listing,
		'Other_Drugs' => $other_chronic,
		'Adr' =>$other_allergies,
		'Smoke' => $smoke,
		'Alcohol' => $alcohol,
		'Tb' => $tb,
		'Tbphase' => $tbphase,
		'Startphase' =>$fromphase,
		'Endphase' => $tophase,
        'Date_Enrolled' => $date_enrolled,
		'Status_Change_Date' => $date_of_status_change,
		'Source' => $patient_source,
		'Supported_By' => $supported_by,
		'Facility_Code' => $this -> session -> userdata('facility'),
		'Service' => $type_of_service,
		'Start_Regimen' => $start_regimen,
		'Start_Regimen_Date' => $start_regimen_date
		);
		$this -> db -> where('id', $record_id);
		$this -> db -> update('patient', $data);
	}

	public function base_params($data) {
		$data['title'] = "Patients";
		$data['banner_text'] = "Facility Patients";
		$data['link'] = "patients";
		$this -> load -> view('template', $data);
	}

	public function create_timestamps() {
		$visits = Patient_Visit::getAll();
		foreach ($visits as $visit) {
			$current_date = $visit -> Dispensing_Date;
			$changed_date = strtotime($current_date);
			$visit -> Dispensing_Date_Timestamp = $changed_date;
			$visit -> save();
		}
	}

	public function regimen_breakdown() {
		$selected_facility = $this -> input -> post('facility');
		if (isset($selected_facility)) {
			$facility = $this -> input -> post('facility');
		}
		$this -> load -> database();
		$data = array();
		$data['current'] = "patient_management";
		$data['title'] = "Patient Regimen Breakdown";
		$data['content_view'] = "patient_regimen_breakdown_v";
		$data['banner_text'] = "Patient Regimen Breakdown";
		$data['facilities'] = Reporting_Facility::getAll();
		//Get the regimen data
		$data['optimal_regimens'] = Regimen::getOptimalityRegimens("1");
		$data['sub_optimal_regimens'] = Regimen::getOptimalityRegimens("2");
		$months = 12;
		$months_previous = 11;
		$regimen_data = array();
		for ($current_month = 1; $current_month <= $months; $current_month++) {
			$start_date = date("Y-m-01", strtotime("-$months_previous months"));
			$end_date = date("Y-m-t", strtotime("-$months_previous months"));
			//echo $start_date." to ".$end_date."</br>";
			if ($facility) {
				$get_month_statistics_sql = "SELECT regimen,count(patient_id) as patient_numbers,sum(months_of_stock) as months_of_stock FROM (select  distinct patient_id,months_of_stock,regimen,dispensing_date from `patient_visit` where facility = '" . $facility . "' and  dispensing_date between str_to_date('" . $start_date . "','%Y-%m-%d') and str_to_date('" . $end_date . "','%Y-%m-%d')) patient_visits group by regimen";
			} else {
				$get_month_statistics_sql = "SELECT regimen,count(patient_id) as patient_numbers,sum(months_of_stock) as months_of_stock FROM (select  distinct patient_id,months_of_stock,regimen,dispensing_date from `patient_visit` where dispensing_date between str_to_date('" . $start_date . "','%Y-%m-%d') and str_to_date('" . $end_date . "','%Y-%m-%d')) patient_visits group by regimen";
			}
			$month_statistics_query = $this -> db -> query($get_month_statistics_sql);
			foreach ($month_statistics_query->result_array() as $month_data) {
				$regimen_data[$month_data['regimen']][$start_date] = array("patient_numbers" => $month_data['patient_numbers'], "mos" => $month_data['months_of_stock']);
			}
			//echo $get_month_statistics_sql . "<br>";
			$months_previous--;
		}
		$data['regimen_data'] = $regimen_data;
		$this -> load -> view("platform_template", $data);
	}

	public function create_appointment_timestamps() {
		/*$appointments = Patient_Appointment::getAll();
		 foreach($appointments as $appointment){
		 $app_date = $appointment->Appointment;
		 $changed_date = strtotime($app_date);
		 //echo $app_date." currently becomes ".$changed_date." which was initially ".date("m/d/Y",$changed_date)."<br>";
		 $appointment->Appointment = $changed_date;
		 $appointment->save();
		 }*/
	}

	public function export() {
		$facility_code = $this -> session -> userdata('facility');
		$this -> load -> database();
		$sql = "SELECT medical_record_number,patient_number_ccc,first_name,last_name,other_name,dob,pob,IF(gender=1,'MALE','FEMALE')as gender,IF(pregnant=1,'YES','NO')as pregnant,weight as Current_Weight,height as Current_height,sa as Current_BSA,p.phone,physical as Physical_Address,alternate as Alternate_Address,other_illnesses,other_drugs,adr as Drug_Allergies,IF(tb=1,'YES','NO')as TB,IF(smoke=1,'YES','NO')as smoke,IF(alcohol=1,'YES','NO')as alcohol,date_enrolled,ps.name as Patient_source,s.Name as supported_by,timestamp,facility_code,rst.name as Service,r1.regimen_desc as Start_Regimen,start_regimen_date,pst.Name as Current_status,migration_id,machine_code,IF(sms_consent=1,'YES','NO') as SMS_Consent,fplan as Family_Planning,tbphase,startphase,endphase,IF(partner_status=1,'Concordant',IF(partner_status=2,'Discordant','')) as partner_status,status_change_date,IF(partner_type=1,'YES','NO') as Disclosure,support_group,r.regimen_desc as Current_Regimen,nextappointment,start_height,start_weight,start_bsa,IF(p.transfer_from !='',f.name,'N/A') as Transfer_From,DATEDIFF(nextappointment,CURDATE()) AS Days_to_NextAppointment
FROM patient p
left join regimen r on r.id=p.current_regimen
left join regimen r1 on r1.id=p.start_regimen
left join patient_source ps on ps.id=p.source
left join supporter s on s.id=p.supported_by
left join regimen_service_type rst on rst.id=p.service
left join patient_status pst on pst.id=p.current_status
left join facilities f on f.facilitycode=p.transfer_from
WHERE facility_code='$facility_code' 
ORDER BY p.patient_number_ccc ASC";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel -> setActiveSheetIndex(0);
		$i = 1;

		$objPHPExcel -> getActiveSheet() -> SetCellValue('A' . $i, "medical_record_number");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('B' . $i, "patient_number_ccc");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('C' . $i, "first_name");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('D' . $i, "last_name");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('E' . $i, "other_name");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('F' . $i, "dob");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('G' . $i, "pob");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('H' . $i, "gender");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('I' . $i, "pregnant");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('J' . $i, "Current_Weight");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('K' . $i, "Current_height");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('L' . $i, "Current_BSA");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('M' . $i, "phone");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('N' . $i, "Physical_Address");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('O' . $i, "Alternate_Address");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('P' . $i, "other_illnesses");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('Q' . $i, "other_drugs");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('R' . $i, "Drug_Allergies");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('S' . $i, "TB");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('T' . $i, "smoke");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('U' . $i, "alcohol");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('V' . $i, "date_enrolled");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('W' . $i, "Patient_source");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('X' . $i, "supported_by");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('Y' . $i, "timestamp");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('Z' . $i, "facility_code");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AA' . $i, "pob");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AB' . $i, "Service");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AC' . $i, "Start_Regimen");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AD' . $i, "start_regimen_date");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AE' . $i, "Current_status");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AF' . $i, "migration_id");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AG' . $i, "machine_code");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AH' . $i, "SMS_Consent");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AI' . $i, "Family_Planning");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AJ' . $i, "tbphase");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AK' . $i, "startphase");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AL' . $i, "endphase");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AM' . $i, "partner_status");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AN' . $i, "status_change_date");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AO' . $i, "Disclosure");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AP' . $i, "support_group");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AQ' . $i, "Current_Regimen");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AR' . $i, "nextappointment");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AS' . $i, "start_height");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AT' . $i, "start_weight");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AU' . $i, "start_bsa");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AV' . $i, "Transfer_From");
		$objPHPExcel -> getActiveSheet() -> SetCellValue('AW' . $i, "Days_To_NextAppointment");

		foreach ($results as $result) {
			$i++;
			$objPHPExcel -> getActiveSheet() -> SetCellValue('A' . $i, $result["medical_record_number"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('B' . $i, $result["patient_number_ccc"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('C' . $i, $result["first_name"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('D' . $i, $result["last_name"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('E' . $i, $result["other_name"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('F' . $i, $result["dob"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('G' . $i, $result["pob"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('H' . $i, $result["gender"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('I' . $i, $result["pregnant"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('J' . $i, $result["Current_Weight"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('K' . $i, $result["Current_height"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('L' . $i, $result["Current_BSA"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('M' . $i, $result["phone"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('N' . $i, $result["Physical_Address"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('O' . $i, $result["Alternate_Address"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('P' . $i, $result["other_illnesses"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('Q' . $i, $result["other_drugs"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('R' . $i, $result["Drug_Allergies"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('S' . $i, $result["TB"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('T' . $i, $result["smoke"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('U' . $i, $result["alcohol"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('V' . $i, $result["date_enrolled"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('W' . $i, $result["Patient_source"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('X' . $i, $result["supported_by"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('Y' . $i, $result["timestamp"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('Z' . $i, $result["facility_code"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AA' . $i, $result["pob"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AB' . $i, $result["Service"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AC' . $i, $result["Start_Regimen"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AD' . $i, $result["start_regimen_date"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AE' . $i, $result["Current_status"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AF' . $i, $result["migration_id"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AG' . $i, $result["machine_code"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AH' . $i, $result["SMS_Consent"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AI' . $i, $result["Family_Planning"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AJ' . $i, $result["tbphase"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AK' . $i, $result["startphase"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AL' . $i, $result["endphase"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AM' . $i, $result["partner_status"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AN' . $i, $result["status_change_date"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AO' . $i, $result["Disclosure"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AP' . $i, $result["support_group"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AQ' . $i, $result["Current_Regimen"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AR' . $i, $result["nextappointment"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AS' . $i, $result["start_height"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AT' . $i, $result["start_weight"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AU' . $i, $result["start_bsa"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AV' . $i, $result["Transfer_From"]);
			$objPHPExcel -> getActiveSheet() -> SetCellValue('AW' . $i, $result["Days_to_NextAppointment"]);

		}

		if (ob_get_contents())
			ob_end_clean();
		$filename = "Patient Master For " . $facility_code . ".csv";
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $filename);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');

		$objWriter -> save('php://output');

		$objPHPExcel -> disconnectWorksheets();
		unset($objPHPExcel);

	}

}
?>