<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Patient_Statistics extends MY_Controller {
	function __construct() {
		parent::__construct();

	}

	public function index() {
		$this -> checks();
	}

	public function refills() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "refills";
		$data['title'] = "Number of Patients Who Visited for a Refill";
		$data['banner_text'] = "Refill Patients";
		$data['content_view'] = "refill_patients_v";
		$this -> load -> view("national_template", $data);
	}

	public function patients_per_regimen() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "patients_per_regimen";
		$data['title'] = "Number of Patients per Regimen";
		$data['banner_text'] = "Regimen Patients";
		$data['content_view'] = "patients_per_regimen_v";
		$this -> load -> view("national_template", $data);
	}

	public function service_breakdown() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "service_breakdown";
		$data['title'] = "Breakdown of Patient Numbers";
		$data['banner_text'] = "Breakdown of Patient Numbers";
		$data['content_view'] = "service_breakdown_v";
		$this -> load -> view("national_template", $data);
	}

	public function patient_attendance() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "patient_attendance";
		$data['title'] = "Patient Attendance";
		$data['banner_text'] = "Patient Attendance";
		$data['content_view'] = "patient_attendance_v";
		$this -> load -> view("national_template", $data);
	}

	public function patient_visits() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "patient_visits";
		$data['title'] = "Patient Visits";
		$data['banner_text'] = "Patient Vists";
		$data['content_view'] = "patient_visits_v";
		$this -> load -> view("national_template", $data);
	}

	public function visit_purpose() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "visit_purpose";
		$data['title'] = "Reasons for Visit";
		$data['banner_text'] = "Reasons for Visit";
		$data['content_view'] = "visit_purpose_v";
		$this -> load -> view("national_template", $data);
	}

	public function drugs_dispensed() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['commodities'] = Drugcode::getAll();
		$data['current'] = "drugs_dispensed";
		$data['title'] = "Drugs Dispensed";
		$data['banner_text'] = "Drugs Dispensed";
		$data['content_view'] = "drugs_dispensed_v";
		$this -> load -> view("national_template", $data);
	}

	public function regimen_switches() {
		$data['facilities'] = Reporting_Facility::getAll();
		$data['current'] = "regimen_switches";
		$data['title'] = "Patients Switching Regimens";
		$data['banner_text'] = "Patients Switching Regimens";
		$data['content_view'] = "regimen_switches_v";
		$this -> load -> view("national_template", $data);
	}

	public function regimen_switches_data($date_from, $date_to, $facility) {

	}

	public function visit_purpose_data($facility, $year) {
		$title = "Reasons for Visit";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(*) as total, visit_purpose,v.name as name from patient_visit p left join visit_purpose v on p.visit_purpose = v.id where year(dispensing_date) = '$year' group by visit_purpose";
		} else {
			$sql = "elect count(*) as total, visit_purpose,v.name as name from patient_visit p left join visit_purpose v on p.visit_purpose = v.id where year(dispensing_date) = '$year'and facility_code = '$facility' group by visit_purpose";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {

			$result_array[$result_element['visit_purpose']]['visit_purpose'] = $result_element['name'];
			$result_array[$result_element['visit_purpose']]['total'] = $result_element['total'];

		}
		$chart = '<chart  pieRadius="150" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['visit_purpose'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function drugs_dispensed_data($facility, $year, $drug = 0, $pack_size = 1) {
		$title = "Packs Dispensed";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select (sum(quantity)/$pack_size) as total, month(dispensing_date) as month from patient_visit where year(dispensing_date) = '$year' and drug_id = '$drug' group by month(dispensing_date)";
		} else {
			$sql = "select month(dispensing_date) as month,(sum(quantity)/$pack_size) as total from patient_visit where year(dispensing_date) = '$year' and drug_id = '$drug' and facility_code = '$facility' group by month(dispensing_date)";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			$result_array[$result_element['month']]['total'] = $result_element['total'];
			$result_array[$result_element['month']]['month'] = date("M", mktime(0, 0, 0, $result_element['month'], 1, $year));
		}

		$chart = '<chart xAxisName="Month" yAxisName="Total Number Seen" formatNumberScale="0" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['month'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function patient_visits_data($facility, $year) {
		$title = "Number of Patients Seen";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(distinct patient_id) as total, month(dispensing_date) as month from patient_visit where year(dispensing_date) = '$year' group by month(dispensing_date)";
		} else {
			$sql = "select month(dispensing_date) as month,count(distinct patient_id) as total from patient_visit where year(dispensing_date) = '$year' and facility_code = '$facility' group by month(dispensing_date)";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			$result_array[$result_element['month']]['total'] = $result_element['total'];
			$result_array[$result_element['month']]['month'] = date("M", mktime(0, 0, 0, $result_element['month'], 1, $year));
		}

		$chart = '<chart xAxisName="Month" yAxisName="Total Number Seen" formatNumberScale="0" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['month'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function patient_attendance_data($facility, $year) {
		$title = "Number of Patients Lost to Follow-up";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(*) as total, month(status_change_date) as month from patient p where year(status_change_date) = '$year' and current_status = '5' group by month(status_change_date)";
		} else {
			$sql = "select month(status_change_date) as month,count(*) as total from patient where year(status_change_date) = '$year' and facility_code = '$facility' and current_status = '5' group by month(status_change_date)";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			$result_array[$result_element['month']]['total'] = $result_element['total'];
			$result_array[$result_element['month']]['month'] = date("M", mktime(0, 0, 0, $result_element['month'], 1, $year));
		}

		$chart = '<chart xAxisName="Month" yAxisName="Total Number Lost" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['month'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function service_breakdown_data($facility, $year) {
		$title = "Number of Active Patients by Treatment Stage";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(*) as total, line from patient p left join regimen r on p.current_regimen = r.id where year(date_enrolled) = '$year' and current_status = '1' group by line";
		} else {
			$sql = "select count(*) as total, line from patient p left join regimen r on p.current_regimen = r.id where year(date_enrolled) = '$year' and current_status = '1' and facility_code = '$facility' group by line";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {

			if ($result_element['line'] == "1") {
				$result_array[$result_element['line']]['line'] = "First Line";
				$result_array[$result_element['line']]['total'] = $result_element['total'];
			} else if ($result_element['line'] == "2") {
				$result_array[$result_element['line']]['line'] = "Second Line";
				$result_array[$result_element['line']]['total'] = $result_element['total'];
			} else {
				$result_array["other"]['line'] = "Others";
				if (isset($result_array["other"]['total'])) {
					$result_array["other"]['total'] += $result_element['total'];
				} else {
					$result_array["other"]['total'] = $result_element['total'];
				}
			}
		}
		$chart = '<chart  pieRadius="100" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['line'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function service_type_breakdown_data($facility, $year) {
		$title = "Number of Active Patients by Service Type";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(*) as total, service,r.name as service_type from patient p left join regimen_service_type r on p.service = r.id where year(date_enrolled) = '$year' and current_status = '1' group by service";
		} else {
			$sql = "select count(*) as total, service,r.name as service_type from patient p left join regimen_service_type r on p.service = r.id where year(date_enrolled) = '$year' and current_status = '1' and facility_code = '$facility' group by service";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {

			$result_array[$result_element['service']]['service'] = $result_element['service_type'];
			$result_array[$result_element['service']]['total'] = $result_element['total'];

		}
		$chart = '<chart  pieRadius="100" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['service'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function gender_breakdown_data($facility, $year) {
		$title = "Number of Active Patients by Gender";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(*) as total, gender from patient p where year(date_enrolled) = '$year' and current_status = '1' group by gender";
		} else {
			$sql = "select count(*) as total, gender from patient p where year(date_enrolled) = '$year' and current_status = '1' and facility_code = '$facility' group by gender";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			if ($result_element['gender'] == "1") {
				$result_array[$result_element['gender']]['gender'] = "Male";
				$result_array[$result_element['gender']]['total'] = $result_element['total'];
			} else if ($result_element['gender'] == "2") {
				$result_array[$result_element['gender']]['gender'] = "Female";
				$result_array[$result_element['gender']]['total'] = $result_element['total'];
			} else {
				$result_array["other"]['gender'] = "Undefined";
				if (isset($result_array["other"]['total'])) {
					$result_array["other"]['total'] += $result_element['total'];
				} else {
					$result_array["other"]['total'] = $result_element['total'];
				}
			}
		}
		$chart = '<chart  pieRadius="100" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['gender'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function patient_regimens($facility, $year) {
		$title = "Number of Active Patients by Regimen";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(*) as total,concat(regimen_desc,' (',regimen_code,')') as regimen_desc from patient p left join regimen r on p.current_regimen = r.id where year(date_enrolled) = '$year' and current_status = '1' group by current_regimen";
		} else {
			$sql = "select count(*) as total,concat(regimen_desc,' (',regimen_code,')') as regimen_desc from patient p left join regimen r on p.current_regimen = r.id where year(date_enrolled) = '$year' and current_status = '1' and facility_code = '$facility' group by current_regimen";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			$result_array[$result_element['regimen_desc']]['total'] = $result_element['total'];
			if (strlen($result_element['regimen_desc']) > 0) {
				$result_array[$result_element['regimen_desc']]['regimen'] = $result_element['regimen_desc'];
			} else {
				$result_array[$result_element['regimen_desc']]['regimen'] = "Unknown";
			}

		}
		$chart = '<chart  pieRadius="200" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['regimen'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function monthly_new_patients($facility, $year) {
		$title = "New Patients Per Month";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select month(date_enrolled) as month,count(*) as total from patient where year(date_enrolled) = '$year' group by month(date_enrolled)";
		} else {
			$sql = "select month(date_enrolled) as month,count(*) as total from patient where year(date_enrolled) = '$year' and facility_code = '$facility' group by month(date_enrolled)";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			$result_array[$result_element['month']]['total'] = $result_element['total'];
			$result_array[$result_element['month']]['month'] = date("M", mktime(0, 0, 0, $result_element['month'], 1, $year));
		}

		$chart = '<chart xAxisName="Month" yAxisName="Total Number Enrolled" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['month'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function refill_stats($facility, $year) {
		$title = "Patients Who Came For Refills";
		$this -> load -> database();
		$sql = "";
		if ($facility == "0") {
			$sql = "select count(distinct patient_id) as total, month(dispensing_date) as month from patient_visit where  visit_purpose = '2' and year(dispensing_date) = '$year' group by month(dispensing_date)";
		} else {
			$sql = "select count(distinct patient_id) as total, month(dispensing_date) as month from patient_visit where  visit_purpose = '2' and year(dispensing_date) = '$year' and facility = '$facility' group by month(dispensing_date)";
		}
		$result = $this -> db -> query($sql) -> result_array();
		$result_array = array();
		foreach ($result as $result_element) {
			$result_array[$result_element['month']]['total'] = $result_element['total'];
			$result_array[$result_element['month']]['month'] = date("M", mktime(0, 0, 0, $result_element['month'], 1, $year));
		}

		$chart = '<chart xAxisName="Month" yAxisName="Total Number Enrolled" formatNumberScale="0" showPercentageValues="1" showPercentInToolTip="0" decimals="0" caption="' . $title . '"  bgColor="FFFFFF" showBorder="0" bgAlpha="100" exportEnabled="1" exportHandler="' . base_url() . 'scripts/FusionCharts/ExportHandlers/PHP/FCExporter.php" exportAtClient="0" exportAction="download">';
		foreach ($result_array as $result_element) {
			$chart .= '<set label="' . $result_element['month'] . '" value="' . $result_element['total'] . '"/>';
		}
		$chart .= '</chart>';
		echo $chart;
	}

	public function base_params($data) {
		$data['title'] = "Survey | Checks";
		$data['current_link'] = "checks";
		$this -> load -> view('template', $data);
	}

}
