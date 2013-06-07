<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Patients Enrolled in Period</title>
		<link href="../CSS/style.css" type="text/css" rel="stylesheet"/>
		<link rel="SHORTCUT ICON" href="../Images/favicon.ico">
		<link href="../Scripts/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen"/>
		<link href="../CSS/offline_css.css" type="text/css" rel="stylesheet"/>
		<link href="../CSS/jquery-ui.css" type="text/css" rel="stylesheet"/>
		<link href="TableFilter/filtergrid.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="../Scripts/jquery.js"></script>
		<script type="text/javascript" src="../Scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="../Scripts/offline_database.js"></script>
		<script type="text/javascript" src="../Scripts/offlineData.js"></script>
		<script type="text/javascript" src="TableFilter/tablefilter_all.js"></script>
		<style>
			#patient_listing {
				margin: 0 auto;
				border-top: 1px solid #B9B9B9;
				font-size: 14px;
				letter-spacing: 1.5px;
				width: 800px;
			}
			#adult_enrollments {
				border-bottom: 1px solid #000;
			}
			#child_enrollments {
				margin-top: 30px;
				border: 1px solid #FFF;
			}
			#patient_listing td th {
				padding: 10px;
			}
			table#top_enrollments_panel {
				width: 1200px;
				border-collapse: collapse;
			}
			.subcategory_title, .category_title {
				margin-left: 0.2em;
				text-align: center;
				font-weight: bold;
				height: 30px;
			}
			tr, td, table {
				padding-left: 0 auto;
				padding-right: 0 auto;
			}
			th {
				background-color: rgb(192, 192, 192);
			}
			.category_title {
				font-size: 16px;
				background-color: #CCF;
				border: 1px solid;
				border-color: black;
			}
			.subcategory_title, .subcategory_title td {
				font-size: 14px;
				border-left: 1px solid;
				border-right: 1px solid;
			}
			h4 {
				font-size: 18px;
				font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
			}
			th {
				font-weight: bolder;
				font-size: 16px;
			}
			.report_title {
				color: rgb(34, 86, 253);
				letter-spacing: 1px;
			}
			.male {

			}
			.female {
				border-left: none;
			}
			#overall_adult_female_total, #overall_adult_male_total, #overall_child_female_total, #overall_child_male_total {
				font-weight: bold;
				color: rgb(45, 173, 13);
			}
		</style>
	</head>
	<body>
		<!-- Menus -->
		<div class="navbar ">
			<div class="navbar-inner">
				<div class="container">
					<!-- Everything you want hidden at 940px or less, place within here -->
					<div class="nav-collapse collapse" id="acdmenu">
						<a class="brand" href="../reports.html"/><img src="../Images/home-icon.png"> | </a>
						<ul class="nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="standard_report"> Standard Reports <b class="caret"></b> </a>
								<ul class="dropdown-menu" id="standard_report_sub">
									<li>
										<a href="#" id="patients_enrolled_in_period" class="report donor_date_range_report active_report">Number of Patients Enrolled in Period</a>
									</li>
									<li>
										<a href="#" id="patients_enrolled_in_art" class="report donor_date_range_report active_report">Number of Patients Started on ART in the Period</a>
									</li>
									<li>
										<a href="#" id="graph_patients_enrolled_in_year" class="report active_report annual_report">Graph of Number of Patients Enrolled Per Month in a Given Year</a>
									</li>
									<li>
										<a href="#" id="cumulative_patients" class="report active_report single_date_report">Cumulative Number of Patients to Date</a>
									</li>
									<li>
										<a href="#" id="patients_on_ART_active" class="report active_report single_date_report">Number of Active Patients Receiving ART (by Regimen)</a>
									</li>
								</ul>
							</li>
							<li class="dropdown divider-vertical" id="visiting_patient">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Visiting Patients <b class="caret"></b> </a>
								<ul class="dropdown-menu" id="visiting_patient_sub">
									<li>
										<a href="#" id="patients_scheduled_to_visit" class="report active_report date_range_report">List of Patients Scheduled to Visit</a>
									</li>
									<li>
										<a href="#" id="patients_started_on_date" class="report active_report date_range_report">List of Patients Started (on a Particular Date)</a>
									</li>
									<li>
										<a href="#" id="patients_visitied_for_refill" class="report active_report date_range_report">List of Patients Visited for Refill</a>
									</li>
									<li>
										<a href="#" id="patients_missing_appointments" class="report active_report date_range_report">Patients Missing Appointments</a>
									</li>
									<li>
										<a href="#" id="patients_adherence" class="report active_report date_range_report">Patients Adherence Report</a>
									</li>
								</ul>
							</li>
							<li class="dropdown divider-vertical">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="early_warning"> Early Warning Indicators <b class="caret"></b> </a>
								<ul class="dropdown-menu " id="early_warning_sub">
									<li>
										<a href="#" id="patients_who_changed_regimen" class="report active_report date_range_report">Active Patients who Have Changed Regimens</a>
									</li>
									<li>
										<a href="#" id="patients_starting" class="report active_report date_range_report">List of Patients Starting (By Regimen)</a>
									</li>
									<li>
										<a href="#" id="early_warning_indicators" class="report active_report date_range_report">HIV Early Warning Indicators</a>
									</li>
									<li>
										<a href="#" id="service_statistics" class="report active_report single_date_report">Service Statistics (By Regimen)</a>
									</li>
								</ul>
							</li>
							<li class="dropdown divider-vertical">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="drug_inventory"> Drug Inventory <b class="caret"></b> </a>
								<ul class="dropdown-menu" id="drug_inventory_sub">
									<li>
										<a href="#" id="drug_consumption" class="report active_report annual_report">Drug Consumption Report</a>
									</li>
									<li>
										<a href="#" id="drug_stock_on_hand" class="report active_report no_filter">Drug Stock on Hand Report</a>
									</li>
									<li>
										<a href="#" id="commodity_summary" class="report active_report date_range_report">Facility Summary Commodity Report</a>
									</li>
									<li>
										<a href="#" id="expiring_drugs" class="report active_report no_filter">Short Dated Stocks &lt;6 Months to Expiry</a>
									</li>
									<li>
										<a href="#" id="expired_drugs" class="report active_report no_filter">List of Expired Drugs</a>
									</li>
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
		<h4 style="text-align: center">Listing of Patients enrolled in the period from
		<input type="text" id="start_date" value="<?php echo $from; ?>"/>
		to
		<input type="text" id="end_date" value="<?php echo $to; ?>"/>
		</h4>
		<hr size="1" style="width:80%">
		<table align='center'  width='20%' style="font-size:16px; margin-bottom: 20px">
			<tr>
				<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="whole_total"><?php echo $overall_total; ?></span></h5></td>
			</tr>
		</table>
		<table id="top_enrollments_panel" align="center">
			<tr class="category_title">
				<td colspan="2">Adults</td>
			</tr>
			<tr class="subcategory_title">
				<td>Male</td><td>Female</td>
			</tr>
			<tr>
				<td>
				<table class="male" width="100%"  border="1" cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="adult_male_art_outpatient"><?php echo $adult_male_art_outpatient;?></td>
						<td align='center' id="adult_male_pep_outpatient"><?php echo $adult_male_pep_outpatient;?></td>
						<td align='center' id="adult_male_oi_outpatient"><?php echo $adult_male_oi_outpatient;?></td>
						<td align='center' id="adult_male_outpatient_total"><?php echo $total_adult_male_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="adult_male_art_inpatient"><?php echo $adult_male_art_inpatient;?></td>
						<td  align='center' id="adult_male_pep_inpatient"><?php echo $adult_male_pep_inpatient;?></td>
						<td align='center' id="adult_male_oi_inpatient"><?php echo $adult_male_oi_inpatient;?></td>
						<td align='center' id="adult_male_inpatient_total"><?php echo $total_adult_male_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="adult_male_art_transferin"><?php echo $adult_male_art_transferin;?></td>
						<td  align='center' id="adult_male_pep_transferin"><?php echo $adult_male_pep_transferin;?></td>
						<td  align='center' id="adult_male_oi_transferin"><?php echo $adult_male_oi_transferin;?></td>
						<td align='center' id="adult_male_transferin_total"><?php echo $total_adult_male_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="adult_male_art_casualty"><?php echo $adult_male_art_casualty;?></td>
						<td align='center'  id="adult_male_pep_casualty"><?php echo $adult_male_pep_casualty;?></td>
						<td  align='center' id="adult_male_oi_casualty"><?php echo $adult_male_oi_casualty;?></td>
						<td align='center' id="adult_male_casualty_total"><?php echo $total_adult_male_casualty;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="adult_male_art_transit"><?php echo $adult_male_art_transit;?></td>
						<td align='center' id="adult_male_pep_transit"><?php echo $adult_male_pep_transit;?></td>
						<td align='center' id="adult_male_oi_transit"><?php echo $adult_male_oi_transit;?></td>
						<td align='center' id="adult_male_transit_total"><?php echo $total_adult_male_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="adult_male_art_htc"><?php echo $adult_male_art_htc;?></td>
						<td align='center' id="adult_male_pep_htc"><?php echo $adult_male_pep_htc;?></td>
						<td align='center' id="adult_male_oi_htc"><?php echo $adult_male_oi_htc;?></td>
						<td align='center' id="adult_male_htc_total"><?php echo $total_adult_male_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="adult_male_art_other"><?php echo $adult_male_art_other;?></td>
						<td align='center' id="adult_male_pep_other"><?php echo $adult_male_pep_other;?></td>
						<td align='center' id="adult_male_oi_other"><?php echo $adult_male_oi_other;?></td>
						<td align='center' id="adult_male_other_total"><?php echo $total_adult_male_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_adult_male_art_total"><?php echo $total_adult_male_art;?></td>
						<td align='center' id="overall_adult_male_pep_total"><?php echo $total_adult_male_pep;?></td>
						<td align='center' id="overall_adult_male_oi_total"><?php echo $total_adult_male_oi;?></td>
						<td align='center' id="overall_adult_male_total"><?php echo $overall_line_adult_male;?></td>
					</tr>
				</table></td>
				<td>
				<table class="female" width="100%"  border="1" cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>PMTCT</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="adult_female_art_outpatient"><?php echo $adult_female_art_outpatient;?></td>
						<td align='center' id="adult_female_pep_outpatient"><?php echo $adult_female_pep_outpatient;?></td>
						<td align='center' id="adult_female_pmtct_outpatient"><?php echo $adult_female_pmtct_outpatient;?></td>
						<td align='center' id="adult_female_oi_outpatient"><?php echo $adult_female_oi_outpatient;?></td>
						<td align='center' id="adult_female_outpatient_total"><?php echo $total_adult_female_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="adult_female_art_inpatient"><?php echo $adult_female_art_inpatient;?></td>
						<td  align='center' id="adult_female_pep_inpatient"><?php echo $adult_male_pep_inpatient;?></td>
						<td align='center' id="adult_female_pmtct_inpatient"><?php echo $adult_female_pmtct_inpatient;?></td>
						<td align='center' id="adult_female_oi_inpatient"><?php echo $adult_male_oi_inpatient;?></td>
						<td align='center' id="adult_female_inpatient_total"><?php echo $total_adult_female_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="adult_female_art_transferin"><?php echo $adult_female_art_transferin;?></td>
						<td  align='center' id="adult_female_pep_transferin"><?php echo $adult_female_pep_transferin;?></td>
						<td align='center' id="adult_female_pmtct_transferin"><?php echo $adult_female_pmtct_transferin;?></td>
						<td  align='center' id="adult_female_oi_transferin"><?php echo $adult_female_pep_transferin;?></td>
						<td align='center' id="adult_female_transitin_total"><?php echo $total_adult_female_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="adult_female_art_casualty"><?php echo $adult_female_art_casualty;?></td>
						<td align='center'  id="adult_female_pep_casualty"><?php echo $adult_female_pep_casualty;?></td>
						<td align='center'  id="adult_female_pmtct_casualty"><?php echo $adult_female_pmtct_casualty;?></td>
						<td  align='center' id="adult_female_oi_casualty"><?php echo $adult_female_oi_casualty;?></td>
						<td align='center' id="adult_female_casualty_total"><?php echo $total_adult_female_casualty;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="adult_female_art_transit"><?php echo $adult_female_art_transit;?></td>
						<td align='center' id="adult_female_pep_transit"><?php echo $adult_female_pep_transit;?></td>
						<td align='center'  id="adult_female_pmtct_transit"><?php echo $adult_female_pmtct_transit;?></td>
						<td align='center' id="adult_female_oi_transit"><?php echo $adult_female_oi_transit;?></td>
						<td align='center' id="adult_female_transit_total"><?php echo $total_adult_female_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="adult_female_art_htc"><?php echo $adult_female_art_htc;?></td>
						<td align='center' id="adult_female_pep_htc"><?php echo $adult_female_pep_htc;?></td>
						<td align='center' id="adult_female_pmtct_htc"><?php echo $adult_female_pmtct_htc;?></td>
						<td align='center' id="adult_female_oi_htc"><?php echo $adult_female_oi_htc;?></td>
						<td align='center' id="adult_female_htc_total"><?php echo $total_adult_female_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="adult_female_art_other"><?php echo $adult_female_art_other;?></td>
						<td align='center' id="adult_female_pep_other"><?php echo $adult_female_pep_other;?></td>
						<td align='center' id="adult_female_pmtct_other"><?php echo $adult_female_pmtct_other;?></td>
						<td align='center' id="adult_female_oi_other"><?php echo $adult_female_oi_other;?></td>
						<td align='center' id="adult_female_other_total"><?php echo $total_adult_female_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_adult_female_art_total"><?php echo $total_adult_female_art;?></td>
						<td align='center' id="overall_adult_female_pep_total"><?php echo $total_adult_female_pep;?></td>
						<td align='center' id="overall_adult_female_pep_total"><?php echo $total_adult_female_pmtct;?></td>
						<td align='center' id="overall_adult_female_oi_total"><?php echo $total_adult_female_oi;?></td>
						<td align='center' id="overall_adult_female_total"><?php echo $overall_line_adult_female;?></td>
					</tr>
				</table></td>
			</tr>
			<tr class="category_title">
				<td colspan="2">Children</td>
			</tr>
			<tr class="subcategory_title">
				<td>Male</td><td>Female</td>
			</tr>
			<tr>
				<td>
				<table class="male" width="100%"  border="1" cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>PMTCT</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="child_male_art_outpatient"><?php echo $child_male_art_outpatient;?></td>
						<td align='center' id="child_male_pep_outpatient"><?php echo $child_male_pep_outpatient; ?></td>
						<td align='center' id="child_male_pmtct_outpatient"><?php echo $child_male_pmtct_outpatient; ?></td>
						<td align='center' id="child_male_oi_outpatient"><?php echo $child_male_oi_outpatient; ?></td>
						<td align='center' id="child_male_outpatient_total"><?php echo $total_child_male_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="child_male_art_inpatient"><?php echo $child_male_art_inpatient;?></td>
						<td  align='center' id="child_male_pep_inpatient"><?php echo $child_male_pep_inpatient;?></td>
						<td align='center' id="child_male_pmtct_inpatient"><?php echo $child_male_pmtct_inpatient;?></td>
						<td align='center' id="child_male_oi_inpatient"><?php echo $child_male_oi_inpatient;?></td>
						<td align='center' id="child_male_inpatient_total"><?php echo $total_child_male_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="child_male_art_transferin"><?php echo $child_male_art_transferin;?></td>
						<td  align='center' id="child_male_pep_transferin"><?php echo $child_male_pep_transferin;?></td>
						<td align='center' id="child_male_pmtct_transferin"><?php echo $child_male_pmtct_transferin;?></td>
						<td  align='center' id="child_male_oi_transferin"><?php echo $child_male_oi_transferin;?></td>
						<td align='center' id="child_male_transitin_total"><?php echo $total_child_male_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="child_male_art_casualty"><?php echo $child_male_art_casualty;?></td>
						<td align='center'  id="child_male_pep_casualty"><?php echo $child_male_pep_casualty;?></td>
						<td align='center' id="child_male_pmtct_casualty"><?php echo $child_male_pmtct_casualty;?></td>
						<td  align='center' id="child_male_oi_casualty"><?php echo $child_male_oi_casualty;?></td>
						<td align='center' id="child_male_casualty_total"><?php echo $total_child_male_casualty;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="child_male_art_transit"><?php echo $child_male_art_transit;?></td>
						<td align='center' id="child_male_pep_transit"><?php echo $child_male_pep_transit;?></td>
						<td align='center' id="child_male_pmtct_transit"><?php echo $child_male_pmtct_transit;?></td>
						<td align='center' id="child_male_oi_transit"><?php echo $child_male_oi_transit;?></td>
						<td align='center' id="child_male_transit_total"><?php echo $total_child_male_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="child_male_art_htc"><?php echo $child_male_art_htc;?></td>
						<td align='center' id="child_male_pep_htc"><?php echo $child_male_pep_htc;?></td>
						<td align='center' id="child_male_pmtct_htc"><?php echo $child_male_pmtct_htc;?></td>
						<td align='center' id="child_male_oi_htc"><?php echo $child_male_oi_htc;?></td>
						<td align='center' id="child_male_htc_total"><?php echo $total_child_male_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="child_male_art_other"><?php echo $child_male_art_other;?></td>
						<td align='center' id="child_male_pep_other"><?php echo $child_male_pep_other;?></td>
						<td align='center' id="child_male_pmtct_other"><?php echo $child_male_pmtct_other;?></td>
						<td align='center' id="child_male_oi_other"><?php echo $child_male_oi_other;?></td>
						<td align='center' id="child_male_other_total"><?php echo $total_child_male_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_child_male_art_total"><?php echo $total_child_male_art;?></td>
						<td align='center' id="overall_child_male_pep_total"><?php echo $total_child_male_pep;?></td>
						<td align='center' id="overall_child_male_pmtct_total"><?php echo $total_child_male_pmtct;?></td>
						<td align='center' id="overall_child_male_oi_total"><?php echo $total_child_male_oi;?></td>
						<td align='center' id="overall_child_male_total"><?php echo $overall_line_child_male;?></td>
					</tr>
				</table></td>
				<td>
				<table class="female" width="100%"  border="1" cellpadding="1" style="border-collapse:collapse;">
					<tr>
						<th>Source</th>
						<th>ART</th>
						<th>PEP</th>
						<th>PMTCT</th>
						<th>OI</th>
						<th>Total</th>
					</tr>
					<tr>
						<td><b>Outpatient</b></td>
						<td align='center' id="child_female_art_outpatient"><?php echo $child_female_art_outpatient;?></td>
						<td align='center' id="child_female_pep_outpatient"><?php echo $child_female_pep_outpatient;?></td>
						<td align='center' id="child_female_pmtct_outpatient"><?php echo $child_female_pmtct_outpatient;?></td>
						<td align='center' id="child_female_oi_outpatient"><?php echo $child_female_oi_outpatient;?></td>
						<td align='center' id="child_female_outpatient_total"><?php echo $total_child_female_outpatient;?></td>
					</tr>
					<tr>
						<td><b>Inpatient</b></td>
						<td align='center' id="child_female_art_inpatient"><?php echo $child_female_art_inpatient;?></td>
						<td  align='center' id="child_female_pep_inpatient"><?php echo $child_female_pep_inpatient;?></td>
						<td align='center' id="child_female_pmtct_inpatient"><?php echo $child_female_pmtct_inpatient;?></td>
						<td align='center' id="child_female_oi_inpatient"><?php echo $child_female_oi_inpatient;?></td>
						<td align='center' id="child_female_inpatient_total"><?php echo $total_child_female_inpatient;?></td>
					</tr>
					<tr>
						<td><b>Transfer In</b></td>
						<td  align='center' id="child_female_art_transferin"><?php echo $child_female_art_transferin;?></td>
						<td  align='center' id="child_female_pep_transferin"><?php echo $child_female_pep_transferin;?></td>
						<td align='center' id="child_female_pmtct_transferin"><?php echo $child_female_pmtct_transferin;?></td>
						<td  align='center' id="child_female_oi_transferin"><?php echo $child_female_oi_transferin;?></td>
						<td align='center' id="child_female_transitin_total"><?php echo $total_child_female_transferin;?></td>
					</tr>
					<tr>
						<td><b>Casualty</b></td>
						<td align='center' id="child_female_art_casualty"><?php echo $child_female_art_casualty;?></td>
						<td align='center'  id="child_female_pep_casualty"><?php echo $child_female_pep_casualty;?></td>
						<td align='center' id="child_female_pmtct_casualty"><?php echo $child_female_pmtct_casualty;?></td>
						<td  align='center' id="child_female_oi_casualty"><?php echo $child_female_oi_casualty;?></td>
						<td align='center' id="child_female_casualty_total"><?php echo $total_child_female_transferin;?></td>
					</tr>
					<tr>
						<td><b>Transit</b></td>
						<td align='center' id="child_female_art_transit"><?php echo $child_female_art_transit;?></td>
						<td align='center' id="child_female_pep_transit"><?php echo $child_female_pep_transit;?></td>
						<td align='center' id="child_female_pmtct_transit"><?php echo $child_female_pmtct_transit;?></td>
						<td align='center' id="child_female_oi_transit"><?php echo $child_female_oi_transit;?></td>
						<td align='center' id="child_female_transit_total"><?php echo $total_child_female_transit;?></td>
					</tr>
					<tr>
						<td><b>HTC</b></td>
						<td align='center' id="child_female_art_htc"><?php echo $child_female_art_htc;?></td>
						<td align='center' id="child_female_pep_htc"><?php echo $child_female_pep_htc;?></td>
						<td align='center' id="child_female_pmtct_htc"><?php echo $child_female_pmtct_htc;?></td>
						<td align='center' id="child_female_oi_htc"><?php echo $child_female_oi_htc;?></td>
						<td align='center' id="child_female_htc_total"><?php echo $total_child_female_htc;?></td>
					</tr>
					<tr>
						<td><b>Other</b></td>
						<td align='center' id="child_female_art_other"><?php echo $child_female_art_other;?></td>
						<td align='center' id="child_female_pep_other"><?php echo $child_female_pep_other;?></td>
						<td align='center' id="child_female_pmtct_other"><?php echo $child_female_pmtct_other;?></td>
						<td align='center' id="child_female_oi_other"><?php echo $child_female_oi_other;?></td>
						<td align='center' id="child_female_other_total"><?php echo $total_child_female_other;?></td>
					</tr>
					<tr style="background:#DDD;">
						<td><b>Overall Total</b></td>
						<td align='center' id="overall_child_female_art_total"><?php echo $total_child_female_art;?></td>
						<td align='center' id="overall_child_female_pep_total"><?php echo $total_child_female_pep;?></td>
						<td align='center' id="overall_child_female_pmtct_total"><?php echo $total_child_female_pmtct;?></td>
						<td align='center' id="overall_child_female_oi_total"><?php echo $total_child_female_oi;?></td>
						<td align='center' id="overall_child_female_total"><?php echo $overall_line_child_female;?></td>
					</tr>
				</table></td>
			</tr>
		</table>
		<!--  ENd -->
		<div class="result"></div>
		<!-- Pop up Window end-->
	</body>
</html>