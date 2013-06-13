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
	<head>
		
		<?php
			$this -> load -> view('sections/head');
		?>
		
		<style>
			#wrapper{
				width:1050px;
				margin:0 auto;
			}
			table#drug_listing{
				width:100%;
				border-collapse:collapse;
				margin: :0 auto;
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
			          <a class="brand" href="<?php echo base_url().'report_management' ?>"/><img src="<?php echo base_url().'Images/home-icon.png' ?>"> | </a>
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
			        <a onClick="window.print()" class="brand" title="Print this page"/> | <img src="<?php echo base_url().'Images/printing_icon.png' ?>"> </a>
			      </div>
			 
			    </div>
			  </div>
			</div>
			<!-- Menus end -->
			
			<?php $this->load->view($content_view) ?>
			
		</div>
		
	</body>
	
</html>

