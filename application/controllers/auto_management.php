<?php
error_reporting(0);
class auto_management extends MY_Controller {
	function __construct() {
		parent::__construct();
		ini_set("max_execution_time", "100000");
		$this -> load -> library('PHPExcel');
		$this -> load -> helper('url');
		$this -> load -> database();
	}

	public function index() {

		$facility = $this -> session -> userdata('facility');
		/*Change Active to Lost_to_follow_up*/
		$sql = "update patient p,(SELECT patient_number_ccc FROM patient WHERE current_status =1 AND (DATEDIFF( CURDATE( ) ,nextappointment )) >=90 AND facility_code =  '$facility') as p1 set p.current_status = '5' where p.patient_number_ccc=p1.patient_number_ccc AND p.facility_code='$facility';";
		$query = $this -> db -> query($sql);
		/*Change Lost_to_follow_up to Active */
		$sql = "update patient p,(SELECT patient_number_ccc FROM patient WHERE current_status =5 AND (DATEDIFF( CURDATE( ) , nextappointment )) <90 AND facility_code =  '$facility') as p1 set p.current_status = '1' where p.patient_number_ccc=p1.patient_number_ccc AND p.facility_code='$facility';";
		$query = $this -> db -> query($sql);
		/*Change Active to PEP End*/
		$sql = "update patient p,(SELECT patient_number_ccc FROM patient WHERE (DATEDIFF(CURDATE(),date_enrolled))>=30 AND service=2 AND current_status !=3 AND facility_code='$facility') as p1 set p.current_status = '3' where p.patient_number_ccc=p1.patient_number_ccc AND p.facility_code='$facility';";
		$query = $this -> db -> query($sql);
		/*Change Active to PMTCT End(children)*/
		$sql = "update patient p,(SELECT patient_number_ccc FROM patient WHERE (DATEDIFF(CURDATE(),dob)) >=720 AND (DATEDIFF(CURDATE(),dob)) <4320 AND service=3 AND current_status !=4 AND facility_code='$facility') as p1 set p.current_status = '4' where p.patient_number_ccc=p1.patient_number_ccc AND p.facility_code='$facility';";
		$query = $this -> db -> query($sql);
		/*Change PMTCT End to Active(Adults)*/
		$sql = "update patient p,(SELECT patient_number_ccc FROM patient WHERE (DATEDIFF(CURDATE(),dob)) >=720 AND (DATEDIFF(CURDATE(),dob)) >=4320 AND service=3 AND current_status =4 AND facility_code='$facility') as p1 set p.current_status = '5' where p.patient_number_ccc=p1.patient_number_ccc AND p.facility_code='$facility';";
		$query = $this -> db -> query($sql);
	}

	public function export() {
		$facility_code = $this -> session -> userdata('facility');
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

		//if (ob_get_contents())
		//ob_end_clean();
		ob_start();
		$filename = "Patient Master For " . $facility_code . ".csv";
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=' . $filename);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		//ob_end_clean();
		$objWriter -> save('php://output');

		$objPHPExcel -> disconnectWorksheets();
		unset($objPHPExcel);
	}

	public function auto_sms() {
		$tommorrow = date('Y-m-d', strtotime('+1 day'));
		$sql = "SELECT phone FROM patient WHERE sms_consent ='1' AND nextappointment ='$tommorrow' GROUP BY phone";
		$query = $this -> db -> query($sql);
		$results = $query -> result_array();
		$phone = "";
		$phone_list = "";
		$message = "You have an Appointment Tommorow on " . date('d-M-Y', strtotime($tommorrow)) . " at Liverpool VCT";
		if ($results) {
			foreach ($results as $result) {
				$phone = $result['phone'];
				if (strlen($phone) == '10') {

				} else if (strlen($phone) == 9) {
					if ($phone[0] != '0') {
						$phone = "0" . $phone;
					}
				}
				$phone = "+254" . substr($phone, 1);
				$phone_list .= $phone;
			}
			 $phone_list = substr($phone_list, 1);
		}
		$message = urlencode($message);
		file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$phone_list=$message");
	}

}
?>	