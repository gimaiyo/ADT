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
			#wrapper {
				width: 1050px;
				margin: 0 auto;
			}
			table#drug_listing {
				width: 100%;
				border-collapse: collapse;
				margin:  :0 auto;
			}

		</style>
		
		
		<script type="text/javascript">
		
						//-------- Date picker -------------------------

			$(document).ready(function() {
				var href = window.location.href;
				var _href=href.substr(href.lastIndexOf('/') + 1);
				var href_final=_href.split('.');
				//Hide current page from menus
				var _id="#"+href_final[0];
				$(_id).css("display","none");
				
				
				$("#edit_donor_date_range_report").dialog({
					autoOpen : false,
					modal : true,
					width:450
				});
			
				$("#date_range_report").dialog({
					autoOpen : false,
					modal : true,
					width:450
				});
				$("#donor_date_range_report").dialog({
					autoOpen : false,
					modal : true,
					width:450
				});
				$("#single_date").dialog({
					autoOpen : false,
					modal : true,
					width:450
				});
				$("#year").dialog({
					autoOpen : false,
					modal : true,
					width:450
				});
				$("#no_filter").dialog({
					autoOpen : false,
					modal : true,
					width:450
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
					if($(this).attr("id")=="commodity_summary"){
						$(".show_report_type").show();
					}
					else{
						$(".show_report_type").hide();
					}
					
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
					//If report is drug_consumption report, display select report type
					if($(this).attr("id")=='drug_stock_on_hand' || $(this).attr("id")=='expiring_drugs' || $(this).attr("id")=='expired_drugs'){
						$(".show_report_type").show();
					}
					else{
						$(".show_report_type").hide();
					}
				});
				
				$(".annual_report").click(function() {
					$("#selected_report").attr("value", $(this).attr("id"));
					$("#year").dialog("open");
				});
				$("#generate_date_range_report").click(function() {
					var stock_type=0;
					if($(".show_report_type").is(":visible")){
						stock_type=$("#commodity_summary_report_type").attr("value");
						if(stock_type=='0'){
							alert("Please select a report type ! ");
						}
						else{
							var _report =<?php echo "'".base_url()."report_management/"."'"?>;
							var report=_report+$("#selected_report").attr("value");
							var from = $("#date_range_from").attr("value");
							var to = $("#date_range_to").attr("value");
							var report_url = report + "/" + from + "/" + to+"/"+stock_type;
							window.location = report_url;
						}
					}
					else{
						var _report =<?php echo "'".base_url()."report_management/"."'"?>;
						var report=_report+$("#selected_report").attr("value");
						var from = $("#date_range_from").attr("value");
						var to = $("#date_range_to").attr("value");
						var report_url = report + "/" + from + "/" + to+"/"+stock_type;
						window.location = report_url;
					}
				});
				$("#generate_single_date_report").click(function() {
					var _report =<?php echo "'".base_url()."report_management/"."'"?>;
					var report=_report+$("#selected_report").attr("value");
					var selected_date = $("#single_date_filter").attr("value");
					var report_url = report + "/" + selected_date;
					window.location = report_url;
				});
				$("#generate_single_year_report").click(function() {
					if( $("#selected_report").attr("value")=="display_year"){
						$("#selected_report").attr("value","graph_patients_enrolled_in_year");
						var _report =<?php echo "'".base_url()."report_management/"."'"?>;
						var report=_report+$("#selected_report").attr("value");
						var selected_year = $("#single_year_filter").attr("value");
						var report_url = report + "/" + selected_year;
						window.location = report_url;
						location.reload();
					}
					else{
						var _report =<?php echo "'".base_url()."report_management/"."'"?>;
						var report=_report+$("#selected_report").attr("value");
						var selected_year = $("#single_year_filter").attr("value");
						var report_url = report + "/" + selected_year;
						window.location = report_url;
					}
					
				});
				$("#generate_no_filter_report").click(function() {
					var stock_type=0;
					if($(".report_type").is(":visible")){
						stock_type=$("#commodity_summary_report_type_1").attr("value");
						if(stock_type=='0'){
							alert("Please select a report type ! ");
						}
						else{
							var _report =<?php echo "'".base_url()."report_management/"."'"?>;
							var report=_report+$("#selected_report").attr("value");
							var report_url = report+"/"+stock_type;
							window.location = report_url;
						}
					}
					else{
						var _report =<?php echo "'".base_url()."report_management/"."'"?>;
						var report=_report+$("#selected_report").attr("value");
						var report_url = report+"/"+stock_type;
						window.location = report_url;
					}
				});
			
				$("#donor_generate_date_range_report").click(function() {
					var _report =<?php echo "'".base_url()."report_management/"."'"?>
					;
					var report = _report + $("#selected_report").attr("value");
					var from = $("#donor_date_range_from").attr("value");
					var to = $("#donor_date_range_to").attr("value");
					var donor = $("#donor").attr("value");
					var report_url = report + "/" + from + "/" + to + "/" + donor;
					window.location = report_url;
					});
					//-------- Date picker end ---------------------

					$("#standard_report").click(function() {
						$("#standard_report_sub").toggle();
						$("#visiting_patient_sub").hide();
						$("#early_warning_sub").hide();
						$("#drug_inventory_sub").hide();
					});
					$("#visiting_patient").click(function() {
						$("#visiting_patient_sub").toggle();
						$("#standard_report_sub").hide();
						$("#early_warning_sub").hide();
						$("#drug_inventory_sub").hide();
					});
					$("#early_warning").click(function() {
						$("#early_warning_sub").toggle();
						$("#visiting_patient_sub").hide();
						$("#standard_report_sub").hide();
						$("#drug_inventory_sub").hide();
					});
					$("#drug_inventory").click(function() {
						$("#drug_inventory_sub").toggle();
						$("#visiting_patient_sub").hide();
						$("#early_warning_sub").hide();
						$("#standard_report_sub").hide();
					});

					});

					$(document).ready(function() {
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
					      <li><a href="#" id="patient_enrolled" class="report donor_date_range_report active_report">Number of Patients Enrolled in Period</a></li>
					      <li><a href="#" id="getStartedonART" class="report donor_date_range_report active_report">Number of Patients Started on ART in the Period</a></li>
					      <li><a href="#" id="graph_patients_enrolled_in_year" class="report active_report annual_report">Graph of Number of Patients Enrolled Per Month in a Given Year</a></li>
					      <li><a href="#" id="cumulative_patients" class="report active_report single_date_report">Cumulative Number of Patients to Date</a></li>
					      <li><a href="#" id="patient_active_byregimen" class="report active_report single_date_report">Number of Active Patients Receiving ART (by Regimen)</a></li>
					    </ul>
					  </li>
					  <li class="dropdown divider-vertical" id="visiting_patient">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					     Visiting Patients
					    <b class="caret"></b>
					    </a>
					     <ul class="dropdown-menu" id="visiting_patient_sub">
					      <li><a href="#" id="getScheduledPatients" class="report active_report date_range_report">List of Patients Scheduled to Visit</a></li>
					      <li><a href="#" id="getPatientsStartedonDate" class="report active_report date_range_report">List of Patients Started (on a Particular Date)</a></li>
					      <li><a href="#" id="getPatientsforRefill" class="report active_report date_range_report">List of Patients Visited for Refill</a></li>
					      <li><a href="#" id="getPatientMissingAppointments" class="report active_report date_range_report">Patients Missing Appointments</a></li>
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
					      <li><a href="#" id="stock_report/drug_stock_on_hand" class="report active_report no_filter">Drug Stock on Hand Report</a></li>
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
			<h2 id="facility_name" style="text-align: center"><?php
				if (isset($facility_name)) {echo $facility_name;
				}
				if (isset($stock_type)) { echo ' - ' . $stock_type;
				}
  ?></h2>
			<?php $this->load->view($content_view) ?>
			
		</div>
		<?php $this -> load -> view('reports/menus'); ?>
	</body>
	
</html>

