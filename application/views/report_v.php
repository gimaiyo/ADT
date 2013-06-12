<?php
if (!$this -> session -> userdata('user_id')) {
	redirect("User_Management/login");
}
if (!isset($link)) {
	$link = null;
}
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
}
if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

}
if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
?>

<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>My Reports</title>
		
		<script type="text/javascript">
			$(document).ready(function() {
				initDatabase();
				
				var d = new Date();
				var n = d.getFullYear();
				$("#theyear").text(n);

				//Get the environmental variables to display the hospital name
				selectEnvironmentVariables(function(transaction, results) {
					// Handle the results
					var row = results.rows.item(0);
					$("#facility_name").text(row['facility_name']);

				});
				getSatellites();
				
				$("#date_range_report").dialog({
					autoOpen : false,
					modal : true
				});
				$("#donor_date_range_report").dialog({
					autoOpen : false,
					modal : true
				});
				$("#single_date").dialog({
					autoOpen : false,
					modal : true
				});
				$("#year").dialog({
					autoOpen : false,
					modal : true
				});
				$("#no_filter").dialog({
					autoOpen : false,
					modal : true
				});

				//Add datepicker
				$("#date_range_from").datepicker({
					changeMonth : true,
					changeYear : true,
					dateFormat : 'yy-mm-dd'
				});
				$("#single_date_filter").datepicker({
					changeMonth : true,
					changeYear : true,
					dateFormat : 'yy-mm-dd'
				});
				$("#date_range_to").datepicker({
					changeMonth : true,
					changeYear : true,
					dateFormat : 'yy-mm-dd'
				});

				$("#donor_date_range_from").datepicker({
					changeMonth : true,
					changeYear : true,
					dateFormat : 'yy-mm-dd'
				});
				$("#donor_date_range_to").datepicker({
					changeMonth : true,
					changeYear : true,
					dateFormat : 'yy-mm-dd'
				});

				$(".date_range_report").click(function() {
					$("#selected_report").attr("value", $(this).attr("id"));
					$("#date_range_report").dialog("open");
				});

				$(".donor_date_range_report").click(function() {
					$("#selected_report").attr("value", $(this).attr("id"));
					$("#donor_date_range_report").dialog("open");
				});

				$(".single_date_report").click(function() {
					$("#selected_report").attr("value", $(this).attr("id"));
					$("#single_date").dialog("open");
				});
				$(".no_filter").click(function() {
					$("#selected_report").attr("value", $(this).attr("id"));
					$("#no_filter").dialog("open");
				});
				
				$(".annual_report").click(function() {
					$("#selected_report").attr("value", $(this).attr("id"));
					$("#year").dialog("open");
					
					//If report is drug_consumption report, display select report type
					
				});
				$("#generate_date_range_report").click(function() {
					var report = $("#selected_report").attr("value");
					var from = $("#date_range_from").attr("value");
					var to = $("#date_range_to").attr("value");
					var report_url = "report_management/" + report + "/" + from + "/" + to;
					window.location = report_url;
				});
				$("#generate_single_date_report").click(function() {
					var report = $("#selected_report").attr("value");
					var selected_date = $("#single_date_filter").attr("value");
					var report_url = "report_management/" + report + "/" + selected_date;
					window.location = report_url;
				});
				$("#generate_single_year_report").click(function() {
					var report = $("#selected_report").attr("value");
					var selected_year = $("#single_year_filter").attr("value");
					var report_url = "report_management/" + report + "/" + selected_year;
					window.location = report_url;
				});
				$("#generate_no_filter_report").click(function() {
					var report = $("#selected_report").attr("value"); 
					var report_url = "report_management/" + report;
					window.location = report_url;
				});

				$("#donor_generate_date_range_report").click(function() {
					var report = $("#selected_report").attr("value");
					var from = $("#donor_date_range_from").attr("value");
					var to = $("#donor_date_range_to").attr("value");
					var donor = $("#donor").attr("value");
					var report_url = "report_management/" + report + "/"+ from + "/" + to + "/" + donor;
					window.location = report_url;
				});
				
				$("#arrow_satellite").click(function(){
					$("#satellite_menus").toggle();
				});
			});
			function getSatellites(){
				getSatelliteFacilities(function(transaction, results){
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						var _link="<?php echo base_url().'reports_satellite/index/'; ?>"+row['facilitycode'];
						$("#satellite_menus").append($("<li><a href='"+_link+"'>"+row['name']+"</a></li>"));
					}
				});
			}

		</script>
		<style type="text/css">
			
		</style>
	</head>
	<body>
		<div id="wrapperd">
			
				<div class="center-content">
					<div id="reports_containerdfg">
						<!-- Select report type -->
					
						
						<div class="reports_panel">
							<div class="report_category">
								<h3>Standard Reports</h3>
								<a href="#" id="patient_enrolled" class="report donor_date_range_report active_report">Number of Patients Enrolled in Period</a>
								<a href="#" id="getStartedonART" class="report donor_date_range_report active_report">Number of Patients Started on ART in the Period</a>
								<a href="#" id="graph_patients_enrolled_in_year" class="report active_report annual_report">Graph of Number of Patients Enrolled Per Month in a Given Year</a>
								<a href="#" id="cumulative_patients" class="report active_report single_date_report">Cumulative Number of Patients to Date</a>
							    <a href="#" id="patient_active_byregimen" class="report active_report single_date_report">Number of Active Patients Receiving ART (by Regimen)</a>

							</div>
							<div class="report_category">
								<h3>Visiting Patients</h3>
								<a href="#" id="getScheduledPatients" class="report active_report date_range_report">List of Patients Scheduled to Visit</a>
								<a href="#" id="getPatientsStartedonDate" class="report active_report date_range_report">List of Patients Started (on a Particular Date)</a>
								<a href="#" id="getPatientsforRefill" class="report active_report date_range_report">List of Patients Visited for Refill</a>
								<a href="#" id="getPatientMissingAppointments" class="report active_report date_range_report">Patients Missing Appointments</a>
							    <a href="#" id="patients_adherence" class="report active_report date_range_report">Patients Adherence Report</a>

							</div>
						</div>
						<div class="reports_panel">
							<div class="report_category">
								<h3>Early Warning Indicators</h3>
								<a href="#" id="patients_who_changed_regimen" class="report active_report date_range_report">Active Patients who Have Changed Regimens</a>
								<a href="#" id="patients_starting" class="report active_report date_range_report">List of Patients Starting (By Regimen)</a>
								<a href="#" id="early_warning_indicators" class="report active_report date_range_report">HIV Early Warning Indicators</a>
								<a href="#" id="service_statistics" class="report active_report single_date_report">Service Statistics (By Regimen)</a>
							</div>
							<div class="report_category">
								<h3>Drug Inventory</h3>
								<a href="#" id="drug_consumption" class="report active_report annual_report">Drug Consumption Report</a>
								<a href="#" id="drug_stock_on_hand" class="report active_report no_filter">Drug Stock on Hand Report</a>
								<a href="#" id="commodity_summary" class="report active_report date_range_report">Facility Summary Commodity Report</a>
								<a href="#" id="expiring_drugs" class="report active_report no_filter">Short Dated Stocks &lt;6 Months to Expiry</a>
								<a href="#" id="expired_drugs" class="report active_report no_filter">List of Expired Drugs</a>
							</div>
						</div>
					</div>
					<input type="hidden" id="selected_report" />
					<div id="date_range_report" title="Select Date Range">
						<label> <strong class="label">From: </strong>
							<input type="text"name="date_range_from" id="date_range_from">
						</label>
						<label> <strong class="label">To: </strong>
							<input type="text"name="date_range_to" id="date_range_to">
						</label>
						<button id="generate_date_range_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
							Generate Report
						</button>
					</div>
					<div id="donor_date_range_report" title="Select Date Range and Donor">
						<label> <strong class="label">Select Donor: </strong>
							<select name="donor" id="donor">
								<option value="0">All Donors</option><option value="1">GOK</option><option value="2">PEPFAR</option>
							</select> </label>
						<label> <strong class="label">From: </strong>
							<input type="text"name="donor_date_range_from" id="donor_date_range_from">
						</label>
						<label> <strong class="label">To: </strong>
							<input type="text"name="donor_date_range_to" id="donor_date_range_to">
						</label>
						<button id="donor_generate_date_range_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
							Generate Report
						</button>
					</div>
					<div id="single_date">
						<label> <strong class="label">Select Date </strong>
							<input type="text"name="filter_date" id="single_date_filter">
						</label>
						<button id="generate_single_date_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
							Generate Report
						</button>
					</div>
					<div id="year">
						<label> <strong class="label">Report Year: </strong>
							<input type="text"name="filter_year" id="single_year_filter">
						</label>
						<button id="generate_single_year_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
							Generate Report
						</button>
					</div>
					<div id="no_filter">
						<button id="generate_no_filter_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
							Generate Report
						</button>
					</div>
			
				<!--End Wrapper div-->
			</div>
			
	</body>
</html>
