<?php
/**
 * Using Session Data
 */
if (!$this -> session -> userdata('user_id')) {
	redirect("User_Management/login");
}
if (!isset($link)) {
	$link = null;
}
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_facility_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
} else if ($access_level == "facility_administrator") {
	$user_is_facility_administrator = true;
} else if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

} else if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<title><?php echo $title; ?></title>
		<link rel="SHORTCUT ICON" href="<?php echo base_url().'Images/favicon.ico'?>">
		<link href="<?php echo base_url().'Scripts/bootstrap/css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet" media="screen"/>
		<link href="<?php echo base_url().'CSS/offline_css.css" type="text/css' ?>" rel="stylesheet"/>
		<link href="<?php echo base_url().'CSS/jquery-ui.css" type="text/css' ?>" rel="stylesheet"/>
		
		<script type="text/javascript" src="<?php echo base_url().'Scripts/jquery.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/jquery-ui.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/offline_database.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'Scripts/offlineData.js' ?>"></script>
		
		<style>
			#wrapper{
				width:1200px;
				margin:0 auto;
			}
			table#drug_listing{
				width:100%;
				border-collapse:collapse;
				margin: :0 auto;
			}
			.nav{
				
			}
		</style>
		
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#edit_year").dialog({
					autoOpen : false,
					modal : true
				});
			})
		</script>
	</head>
	<body>
		<div id="wrapper">
			<!-- Menus -->
			<div class="navbar ">
			  <div class="navbar-inner">
			    <div class="container">
			 
			      <!-- Everything you want hidden at 940px or less, place within here -->
			      <div class="nav-collapse collapse" id="acdmenu">
			        <ul class="nav">
			          <a class="brand" href="../reports.html"/><img src="../Images/home-icon.png"> | </a>
					  <li class="dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="standard_report">
					     Standard Reports
					    <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu" id="standard_report_sub">
					      <li><a href="#" id="patients_enrolled_in_period" class="report donor_date_range_report active_report">Number of Patients Enrolled in Period</a></li>
					      <li><a href="#" id="patients_enrolled_in_art" class="report donor_date_range_report active_report">Number of Patients Started on ART in the Period</a></li>
					      <li><a href="#" id="graph_patients_enrolled_in_year" class="report active_report annual_report">Graph of Number of Patients Enrolled Per Month in a Given Year</a></li>
					      <li><a href="#" id="cumulative_patients" class="report active_report single_date_report">Cumulative Number of Patients to Date</a></li>
					      <li><a href="#" id="patients_on_ART_active" class="report active_report single_date_report">Number of Active Patients Receiving ART (by Regimen)</a></li>
					    </ul>
					  </li>
					  <li class="dropdown divider-vertical" id="visiting_patient">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					     Visiting Patients
					    <b class="caret"></b>
					    </a>
					     <ul class="dropdown-menu" id="visiting_patient_sub">
					      <li><a href="#" id="patients_scheduled_to_visit" class="report active_report date_range_report">List of Patients Scheduled to Visit</a></li>
					      <li><a href="#" id="patients_started_on_date" class="report active_report date_range_report">List of Patients Started (on a Particular Date)</a></li>
					      <li><a href="#" id="patients_visitied_for_refill" class="report active_report date_range_report">List of Patients Visited for Refill</a></li>
					      <li><a href="#" id="patients_missing_appointments" class="report active_report date_range_report">Patients Missing Appointments</a></li>
					      <li><a href="#" id="patients_adherence" class="report active_report date_range_report">Patients Adherence Report</a></li>
					    </ul>
					  </li>
					  <li class="dropdown divider-vertical">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="early_warning">
					     Early Warning Indicators
					    <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu " id="early_warning_sub">
					      <li><a href="#" id="patients_who_changed_regimen" class="report active_report date_range_report">Active Patients who Have Changed Regimens</a></li>
					      <li><a href="#" id="patients_starting" class="report active_report date_range_report">List of Patients Starting (By Regimen)</a></li>
					      <li><a href="#" id="early_warning_indicators" class="report active_report date_range_report">HIV Early Warning Indicators</a></li>
					      <li><a href="#" id="service_statistics" class="report active_report single_date_report">Service Statistics (By Regimen)</a></li>
					     
					    </ul>
					  </li>
					  <li class="dropdown divider-vertical">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="drug_inventory">
					     Drug Inventory
					    <b class="caret"></b>
					    </a>
					    <ul class="dropdown-menu" id="drug_inventory_sub">
					      <li><a href="#" id="drug_consumption" class="report active_report annual_report">Drug Consumption Report</a></li>
					      <li><a href="#" id="drug_stock_on_hand" class="report active_report no_filter">Drug Stock on Hand Report</a></li>
					      <li><a href="#" id="commodity_summary" class="report active_report date_range_report">Facility Summary Commodity Report</a></li>
					      <li><a href="#" id="expiring_drugs" class="report active_report no_filter">Short Dated Stocks &lt;6 Months to Expiry</a></li>
					      <li><a href="#" id="expired_drugs" class="report active_report no_filter">List of Expired Drugs</a></li>
					    </ul>
					  </li>
					</ul>
			        <a onClick="window.print()" class="brand" title="Print this page"/> | <img src="../Images/printing_icon.png"> </a>
			      </div>
			 
			    </div>
			  </div>
			</div>
			<!-- Menus end -->
			
			<h2 id="facility_name" style="text-align: center"></h2>
			<h4 style="text-align: center;">Listing of Drug Consumption Report for <input type="text" class="_date" id="_year"> (in Packs)</h4>
			<hr size="1" style="width:80%">
			
			
			<table class="table table-bordered"  id="drug_listing" >
				<thead>
					<tr>
						<th width="300px"> Drug </th>
						<th width="90px"> Unit </th>
						<th> Jan </th>
						<th> Feb </th>
						<th> Mar </th>
						<th> Apr </th>
						<th> May </th>
						<th> Jun </th>
						<th> Jul </th>
						<th> Aug </th>
						<th> Sep </th>
						<th> Oct </th>
						<th> Nov </th>
						<th> Dec </th>
					</tr>
				</thead>
				<tbody></tbody>
				
			</table>
			
			<!-- Pop up Window -->
			<div id="edit_year">
				<label> <strong class="label">Report Year: </strong>
					<input type="text"name="filter_year" id="edit_single_year_filter">
				</label>
				<button id="edit_generate_single_year_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
					Generate Report
				</button>
			</div>
			<div class="result"></div>
			<!-- Pop up Window end-->
		</div>
		
	</body>
	
</html>

