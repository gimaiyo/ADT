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
		<link rel="SHORTCUT ICON" href="Images/favicon.ico">
		<link href="<?php echo base_url().'CSS/style.css' ?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url().'CSS/offline_css.css' ?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url().'CSS/jquery-ui.css' ?>" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url().'CSS/validator.css' ?>" type="text/css" rel="stylesheet"/>
		
		<link href="<?php echo base_url().'Scripts/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet" media="screen">
		<link href="<?php echo base_url().'Scripts/bootstrap/css/bootstrap-responsive.min.css' ?>" rel="stylesheet" media="screen">
		
		<script type="text/javascript" src="<?php echo base_url().'Scripts/offlineData.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/jquery.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/jquery-ui.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/offline_database.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/validator.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/validationEngine-en.js' ?>"></script>
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
					var report = $("#selected_report").attr("value") + ".html#";
					var from = $("#date_range_from").attr("value");
					var to = $("#date_range_to").attr("value");
					var report_url = "reports/" + report + "?start_date=" + from + "&end_date=" + to;
					window.location = report_url;
				});
				$("#generate_single_date_report").click(function() {
					var report = $("#selected_report").attr("value") + ".html#";
					var selected_date = $("#single_date_filter").attr("value");
					var report_url = "reports/" + report + "?date=" + selected_date;
					window.location = report_url;
				});
				$("#generate_single_year_report").click(function() {
					var report = $("#selected_report").attr("value") + ".html#";
					var selected_year = $("#single_year_filter").attr("value");
					var report_url = "reports/" + report + "?year=" + selected_year;
					window.location = report_url;
				});
				$("#generate_no_filter_report").click(function() {
					var report = $("#selected_report").attr("value") + ".html#"; 
					var report_url = "reports/" + report;
					window.location = report_url;
				});

				$("#donor_generate_date_range_report").click(function() {
					var report = $("#selected_report").attr("value") + ".html#";
					var from = $("#donor_date_range_from").attr("value");
					var to = $("#donor_date_range_to").attr("value");
					var donor = $("#donor").attr("value");
					var report_url = "reports/" + report + "?start_date=" + from + "&end_date=" + to + "&donor=" + donor;
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
			#reports_container {
				width: 90%;
				margin: 0 auto;
				font-size: 14px;
			}
			.report {
				display: block;
				height: auto;
				line-height: 30px;
				background-color: #F1F1F1;
				margin: 2px;
				font-size: 12px;
				text-decoration: none;
				font-weight: bold;
				letter-spacing: 1px;
				color: #036;
				padding: 2px;
			}
			.report:hover {
				background-color: #E5E5E5;
			}
			.report_category {
				border: 2px solid #F1F1F1;
				width: 45%;
				float: left;
				margin: 5px;
				min-height: 200px;
				padding: 5px;
			}
			.category_title {
				letter-spacing: 2px;
				font-weight: bold;
				padding: 2px;
			}
			.active_report {
				color: green;
				font-size: 14px;
			}
			.reports_panel {
				overflow: hidden;
			}
			#facility_name {
				color: green;
				margin-top: 5px;
				font-weight: bold;
			}
			a:hover{
				text-decoration:none;
			}
			legend{
				font-size:20px;
				margin-top:20px;
			}
			.title{
				font-size:22px;
				color:rgb(0, 197, 0);
			}
		</style>
	</head>
	<body>
		<div id="wrapperd">
			<div id="top-panel" style="margin:0px;">
				<div class="logo"></div>
				<div class="network">
					Network Status: <span id="status" class="offline">Offline</span>
					<p>
						Out-of-Sync Records: <span id="local-count"></span>
					</p>
				</div>
				<div id="system_title">
					<span style="display: block; font-weight: bold; font-size: 14px; margin:2px;">Ministry of Health</span>
					<span style="display: block; font-size: 12px;">ARV Drugs Supply Chain Management Tool</span>
					<span style="display: block; font-size: 14px;" id="facility_name" ></span>
				</div>
				<div class="banner_text" style="font-size: 22px;"><?php echo $banner_text;?></div>
				<div id="top_menu">
					<?php
				//Code to loop through all the menus available to this user!
				//Fet the current domain
				$menus = $this -> session -> userdata('menu_items');
				$current = $this -> router -> class;
				$counter = 0;
				?>
				 	<a href="<?php echo site_url('home_controller');?>" class="top_menu_link  first_link <?php
					if ($current == "home_controller") {echo " top_menu_active ";
					}
				?>">Home </a>
				<?php
				foreach($menus as $menu){?>
					<a href = "<?php echo site_url($menu['url']);?>" class="top_menu_link <?php
					if ($current == $menu['url'] || $menu['url'] == $link) {echo " top_menu_active ";
					}
				?>"><?php echo $menu['text']; if($menu['offline'] == "1"){?>
					 <span class="alert red_alert">off</span></a>
					
				<?php } else{?>
					 <span class="alert green_alert">on</span></a>
				<?php }?>



				<?php
				$counter++;
				}
				?>
					<div id="my_profile_link_container" style="display: inline">
						<a ref="#" class="top_menu_link" id="my_profile_link"></a>
					</div>
				</div>
			</div>
			<div id="inner_wrapperre">
				<div id="main_wrapperre">
					<div id="reports_containerdfg">
						<!-- Select report type -->
						
						<div class="btn-group">
							<a style="color:#FFF" href="<?php echo base_url().'reports.html'?>"> <button class="btn btn-info"> Main Site Report </button></a>
						</div>
						<div class="btn-group">
						  <button class="btn btn-info active" id="satellite_dropdown">Satellite Reports</button>
						  <button class="btn dropdown-toggle btn-info" id="arrow_satellite" data-toggle="dropdown">
						    <span class="caret" ></span>
						  </button>
						  <ul class="dropdown-menu" id="satellite_menus" >
						    <!-- dropdown menu links -->
						  </ul>
						</div>
						
						<legend>Satellite Report - <span class="title"><?php echo @$facility_name ?></span></legend>
						
						<div class="reports_panel">
							<div class="report_category">
								<span class="category_title">Standard Reports</span>
								<a href="#" id="patients_enrolled_in_period" class="report donor_date_range_report active_report">Number of Patients Enrolled in Period</a>
								<a href="#" id="patients_enrolled_in_art" class="report donor_date_range_report active_report">Number of Patients Started on ART in the Period</a>
								<a href="#" id="graph_patients_enrolled_in_year" class="report active_report annual_report">Graph of Number of Patients Enrolled Per Month in a Given Year</a>
								<a href="#" id="cumulative_patients" class="report active_report single_date_report">Cumulative Number of Patients to Date</a>
								<!--<a href="#" id="patients_on_ART_Last_three_months" class="report active_report no_filter">Number of Patients Receiving ART in the Last 3 Months (by Regimen)</a>-->
							    <a href="#" id="patients_on_ART_active" class="report active_report single_date_report">Number of Active Patients Receiving ART (by Regimen)</a>

							</div>
							<div class="report_category">
								<span class="category_title">Visiting Patients</span>
								<a href="#" id="patients_scheduled_to_visit" class="report active_report single_date_report">List of Patients Scheduled to Visit</a>
								<a href="#" id="patients_started_on_date" class="report active_report single_date_report">List of Patients Started (on a Particular Date)</a>
								<a href="#" id="patients_visitied_for_refill" class="report active_report single_date_report">List of Patients Visited for Refill</a>
								<a href="#" id="patients_missing_appointments" class="report active_report date_range_report">Patients Missing Appointments</a>
							    <a href="#" id="patients_adherence" class="report active_report date_range_report">Patients Adherence Report</a>

							</div>
						</div>
						<div class="reports_panel">
							<div class="report_category">
								<span class="category_title">Early Warning Indicators</span>
								<a href="#" id="patients_who_changed_regimen" class="report active_report date_range_report">Active Patients who Have Changed Regimens</a>
								<a href="#" id="patients_starting" class="report active_report date_range_report">List of Patients Starting (By Regimen)</a>
								<a href="#" id="early_warning_indicators" class="report active_report date_range_report">HIV Early Warning Indicators</a>
								<a href="#" id="service_statistics" class="report active_report single_date_report">Service Statistics (By Regimen)</a>
							</div>
							<div class="report_category">
								<span class="category_title">Drug Inventory</span>
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
				</div>
				<!--End Wrapper div-->
			</div>
			<div id="bottom_ribbon" style="top:20px; width:90%;">
				<div id="footer">
					<div id="footer_text">
						Government of Kenya &copy; <span id="theyear" ></span>. All Rights Reserved
					</div>
				</div>
			</div>
	</body>
</html>
