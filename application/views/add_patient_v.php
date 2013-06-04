<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Add Patient</title>
		<link rel="SHORTCUT ICON" href="Images/favicon.ico">
		<link href="CSS/style.css" type="text/css" rel="stylesheet"/>
		<link href="CSS/offline_css.css" type="text/css" rel="stylesheet"/>
		<link href="CSS/jquery-ui.css" type="text/css" rel="stylesheet"/>
		<link href="CSS/validator.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="CSS/assets/jquery.multiselect.css" />
		<link rel="stylesheet" type="text/css" href="CSS/assets/jquery.multiselect.filter.css" />
		<link rel="stylesheet" type="text/css" href="CSS/assets/style.css" />
		<link rel="stylesheet" type="text/css" href="CSS/assets/prettify.css" />
		<script type="text/javascript" src="Scripts/offlineData.js"></script>
		<script type="text/javascript" src="Scripts/jquery.js"></script>
		<script type="text/javascript" src="Scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="Scripts/offline_database.js"></script>
		<script type="text/javascript" src="Scripts/validator.js"></script>
		<script type="text/javascript" src="Scripts/validationEngine-en.js"></script>
		<script type="text/javascript" src="Scripts/jquery.multiselect.filter.js"></script>
		<script type="text/javascript" src="Scripts/jquery.multiselect.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				initDatabase();
				var d = new Date();
				var n = d.getFullYear();
				$("#year").text(n);

				//Get the environmental variables to display the hospital name
				selectEnvironmentVariables(function(transaction, results) {
					// Handle the results
					var row = results.rows.item(0);
					$("#facility_name").text(row['facility_name']);

				});
				//Dynamically load the list of statuses!
				selectAll("patient_status", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#current_status").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}
				});
				selectDistricts(function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#pob").append($("<option></option>").attr("value", row['name']).text(row['name']));
					}

				});
				//Dynamically load the list of supporters!
				selectAll("supporter", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#support").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}

				});
				//Dynamically load the list of patient sources
				selectAll("patient_source", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#source").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}

				});
				$("#patient_source").append($("<option></option>").attr("value","").text("--Select One--"));
				//Dynamically load the list of patient sources
				selectAll("facilities", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#patient_source").append($("<option></option>").attr("value", row['facilitycode']).text(row['name']));
					}

				});
				//Dynamically load the list of service types
				selectAll("regimen_service_type", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#service").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}
				});
				//Dynamically change the regimens based on the service type!
				$("#service").change(function() {
					$("#regimen option").remove();
					var value = $("#service option:selected").attr("value");
					//Dynamically load the list of service types
					selectServiceRegimen(value, function(transaction, results) {
						// Handle the results
						$("#regimen").append($("<option></option>"));
						for(var i = 0; i < results.rows.length; i++) {
							var row = results.rows.item(i);
							$("#regimen").append($("<option></option>").attr("value", row['id']).text(row['regimen_desc']));
						}
					});
				});
				//When date of birth changes automatically calculate age in years and months
				$("#dob").change(function() {
					var dob = $(this).val();
					dob = new Date(dob);
					var today = new Date();
					var age_in_years = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
					$("#age_in_years").attr("value", age_in_years);
					//calculate age in months
					var yearDiff = today.getFullYear() - dob.getFullYear();
					var y1 = today.getFullYear();
					var y2 = dob.getFullYear();
					var age_in_months = (today.getMonth() + y1 * 12) - (dob.getMonth() + y2 * 12);
					$("#age_in_months").attr("value", age_in_months);

				});

				$("#dob").datepicker({
					yearRange : "-120:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
				});
				$("#enrolled").datepicker({
					yearRange : "-30:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
				});
				$("#service_started").datepicker({
					yearRange : "-30:+0",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true,
					maxDate : "0D"
				});
				$("#partner").change(function() {

					$('#tstatus').slideDown('slow', function() {
						// Animation complete.
					});
					$('#plani').slideDown('slow', function() {
						// Animation complete.
					});
				});

				$("#other_chronic").change(function() {
					var other_diseases = $(this).val();
					$("select#other_illnesses_listing option[id='13']").val(other_diseases);
					var values = $("select#other_illnesses_listing").val();
				});

				$("#current_status").change(function() {
					var status_start_date = new Date();
					var status_date = ("0" + status_start_date.getDate()).slice(-2)
					var status_year = status_start_date.getFullYear();
					var status_month = ("0" + (status_start_date.getMonth() + 1)).slice(-2)
					var status_full_date = status_year + "-" + status_month + "-" + status_date;

					$("#status_started").attr("value", status_full_date);

				});
				$("#regimen").change(function() {
					var regimen_start_date = new Date();
					var regimen_date = ("0" + regimen_start_date.getDate()).slice(-2);
					var regimen_year = regimen_start_date.getFullYear();
					var regimen_month = ('0' + (regimen_start_date.getMonth() + 1)).slice(-2);
					var regimen_full_date = regimen_year + "-" + regimen_month + "-" + regimen_date;

					$("#service_started").attr("value", regimen_full_date);

				});
				var status_start_date = new Date();
				var status_date = ("0" + status_start_date.getDate()).slice(-2)
				var status_year = status_start_date.getFullYear();
				var status_month = ("0" + (status_start_date.getMonth() + 1)).slice(-2)
				var status_full_date = status_year + "-" + status_month + "-" + status_date;
				$("#status_started").attr("value", status_full_date);

				$("#partner1").change(function() {

					$('#tstatus').slideUp('slow', function() {
						// Animation complete.

					});
					$('#plani').slideUp('slow', function() {
						// Animation complete.

					});
					$('#npstatus').attr('checked', true);
					$('#plan_listing').attr("value", "0");

				});
				//Add listener to the gender drop down
				$("#gender").change(function() {
					var selected_value = $(this).attr("value");
					//if female, display the prengancy selector
					if(selected_value == 2) {
						$('#pregnant_container').slideDown('slow', function() {
							// Animation complete.
						});
					} else {
						$('#pregnant_container').slideUp('slow', function() {
							// Animation complete.
						});
					}
				});
				$("#status_started").datepicker({
					yearRange : "-30:+0",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					maxDate : "0D",
					changeYear : true
				});

				$("#fromphase").datepicker({
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
				});
				$("#tophase").datepicker({
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
				});
				//If source selected is transfer_in then a list of facilities will display
				$("#source").change(function() {
					var selected_value = $(this).val();
					if(selected_value == 3) {
						$("#patient_source_listing").show();
					} else {
						$("#patient_source_listing").hide();
					}
				});

				$(".tb").change(function() {
					var selected_value = $(this).attr("value");
					//if has tb(yes)
					if(selected_value == 1) {
						$('#tbstats').slideDown('slow', function() {
							// Animation complete.
						});
					} else {
						$('#tbstats').slideUp('slow', function() {
							// Animation complete.
						});
						$('#ttphase').slideUp('slow', function() {
							// Animation complete.
						});
						$('#endp').slideUp('slow', function() {
							// Animation complete.
						});
					}
				});
				$("#tbphase").change(function() {
					var selected_value = $(this).attr("value");

					if(selected_value == 0) {

						$('#ttphase').slideUp('slow', function() {
							// Animation complete.
						});
						$('#endp').slideUp('slow', function() {
							// Animation complete.
						});
					}
					if(selected_value == 3) {

						$('#ttphase').slideUp('slow', function() {
							// Animation complete.
						});
						$('#endp').slideDown('slow', function() {
							// Animation complete.
						});
					}

					if(selected_value != 0 && selected_value != 3) {

						$('#ttphase').slideDown('slow', function() {
							// Animation complete.
						});
						$('#endp').slideDown('slow', function() {
							// Animation complete.
						});
						$('#tophase').attr("value", " ");

					}
				});

				$('#ttphase').hide();
				$('#endp').hide();

				$("textarea[name='other_chronic']").not(this).attr("disabled", "true");
				$("#plan_listing").multiselect().multiselectfilter();
				$("#other_illnesses_listing").multiselect({
					click : function(event, ui) {
						if(ui.value == "-13-" && ui.checked) {
							$("textarea[name='other_chronic']").not(this).removeAttr("disabled");
						}
						if(ui.value == "-13-" && !ui.checked) {
							$("textarea[name='other_chronic']").not(this).attr("disabled", "true");
							var prev_value = $("#other_chronic").val();
							$("select#other_illnesses_listing option[value='" + prev_value + "']").val("-13-");
							$("#other_chronic").attr("value", "");

						}

					}
				});
				// bind to uncheckall
				$("#other_illnesses_listing").bind("multiselectuncheckall", function(event, ui) {
					$("textarea[name='other_chronic']").not(this).attr("disabled", "true");
					var prev_value = $("#other_chronic").val();
					$("select#other_illnesses_listing option[value='" + prev_value + "']").val("-13-");
					$("#other_chronic").attr("value", "");
				});
			});
			function getMSQ() {
				var weight = $('#weight').attr('value');
				var height = $('#height').attr('value');
				var MSQ = Math.sqrt((parseInt(weight) * parseInt(height)) / 3600);
				$('#surface_area').attr('value', MSQ);
			}
		</script>
		<style type="text/css">
			#signup {
				width: 100%;
			}
			.first_column {
				border: 1px solid #000;
				width: 30%;
				float: left;
				padding: 5px;
			}
			.middle_column {
				border: 1px solid #000;
				width: 30%;
				float: left;
				padding: 5px;
			}
			.last_column {
				border: 1px solid #000;
				width: 30%;
				float: right;
				padding: 5px;
			}
			.submit_section {
				clear: both;
				margin-top: 10px;
			}

		</style>
		<style>
			.data-holder {
				height: 20px;
				line-height: 20px;
				width: 120px !important;
			}
			.data-holder-2 {
				height: 15px;
				line-height: 15px;
				width: 70px !important;
				overflow: hidden;
			}
			.data-table {
				width: 90%;
			}
			.data-table tr {
				width: 99%;
			}
			table.data-table td {
				height: 20px !important;
				width: 45%;
			}
			label {
				margin: 0 !important;
				display: inline;
				font-size: 11px;
			}
			#patient_demographics {
				margin: 5px;
			}
			select {
				height: 30px !important;
			}
			.column {
				width: 32%;
				font-size: 90%;
				font-family: Arial;
				padding: 2px;
				height: 850px;
			}
			strong {
				width: 100%;
				padding-right: 0;
			}
			.inner-table strong {
				width: 50px;
			}
			#dispensing_history {
				min-width: 980px !important;
				max-height: 500px !important;
				overflow: scroll;
				margin: 0 auto;
			}
			#drugs_table td {
				min-width: 60px;
			}
			#drugs_table {
				font-size: 85%;
			}
			.banner_text {
				height: auto;
				margin: 0px;
			}
			#submit_section {
				margin: 0 20% 0 20%;
			}
			#add_patient_form {
				background: #CCFFCC;
			}
			.short_title {
				height: 35px;
				background: #036;
				color: #FFF;
				font-weight: bold;
			}
			.banner_text {
				color: #FFF;
				font-weight: bold;
				font-family: Book Antiqua;
			}
			#facility_name {
				color: green;
				margin-top: 5px;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<input type="hidden" id="sql">
		<div id="wrapper">
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
				<div id="top_menu">
					<a href="home_controller" class="top_menu_link  first_link">Home </a>
					<a href="patient_management.html" class="top_menu_link top_menu_active">Patients<span class="alert red_alert">off</span></a>
					<a href="inventory.html" class="top_menu_link">Inventory<span class="alert red_alert">off</span></a>
					<a href="reports.html" class="top_menu_link">Reports<span class="alert red_alert">off</span></a>
					<a href="settings_management" class="top_menu_link">Settings<span class="alert green_alert">on</span></a>
					<a href="order_management" class="top_menu_link">Order<span class="alert green_alert">on</span></a>
					<div id="my_profile_link_container" style="display: inline">
						<a href="#" class="top_menu_link" id="my_profile_link"></a>
					</div>
				</div>
			</div>
			<div id="inner_wrapper">
				<div id="main_wrapper">
					<div id="signup">
						<div class="short_title" style="width:auto;" >
							<h3 class="banner_text" style="float:left;">New Patient Registration</h3>
							<h4 style="float:right;margin:5px 40px 0 0;">(Fields Marked with <b>*</b> Asterisks are required)</h4>
						</div>
						<hr/>
						<form id="add_patient_form" method="post">
							<div class="column">
								<fieldset style="height:800px;">
									<legend>
										Patient Information &amp; Demographics
									</legend>
									<label style="width:100px;"> <strong class="label">Medical Record Number</strong>
										<input type="text" name="medical_record_number" id="medical_record_number" value="">
									</label>
									<br/>
									<label> <strong class="label">*Patient Number CCC</strong>
										<input type="text"name="patient_number" id="patient_number" class="validate[required]">
									</label>
									<br/>
									<div class="two_comlumns">
										<label style="width:140px; float:left; margin:0px;"> <strong class="label">*Last Name</strong>
											<input style="width:140px" type="text"name="last_name" id="last_name" class="validate[required]">
										</label>
										<label style="width:140px; float:right; margin:20px;"> <strong class="label" >*First Name</strong>
											<input style="width:140px;" type="text"name="first_name" id="first_name" class="validate[required]">
										</label>
									</div>
									<label> <strong class="label">Other Name</strong>
										<input type="text"name="other_name" id="other_name" style="width:200px;">
									</label>
									<br/>
									<div class="two_comlumns">
										<br/>
										<label style="width:140px; float:left;"> <strong class="label" >*Date of Birth</strong>
											<input style="width:140px;" type="text"name="dob" id="dob" class="validate[required]">
										</label>
										<label style="width:140px; float:right;"> <strong class="label">Place of Birth</strong> <!--<input style="width:140px" type="text"name="pob" id="pob">-->
											<select name="pob" id="pob" style="width:120px">
												<option value="None">--Select--</option>
											</select> </label>
									</div>
									<br/>
									<div class="two_comlumns">
										<label style="width:140px; float:left;"> <strong class="label" >*Age(Years)</strong>
											<input type="text" id="age_in_years" style="width:80px;" disabled="disabled"/>
										</label>
										<label style="width:140px; float:right;"> <strong class="label">Age(Months)</strong> <!--<input style="width:140px" type="text"name="pob" id="pob">-->
											<input type="text" id="age_in_months" style="width:80px;" disabled="disabled"/>
									</div>
									<div class="two_comlumns">
										<br/>
										<label style="width:140px; float:left;"> <strong class="label" >*Gender</strong>
											<select name="gender" id="gender">
												<option value=""></option>
												<option value="1">Male</option><option value="2">Female</option>
											</select> </label>
										<br/>
										<label style="width:140px; float:right; display: none" id="pregnant_container"> <strong class="label">Pregnant?</br> </strong>
											<select name="pregnant" id="pregnant">
												<option value="0">No</option><option value="1">Yes</option>
											</select> </label>
									</div>
									<p>
										<div class="two_comlumns">
											<label style="width:140px; float:left;"> <strong class="label" >*Weight (KG)</strong>
												<input style="width:140px;" type="text"name="weight" id="weight" class="validate[required]" onblur="getMSQ()">
											</label>
											<label style="width:140px; float:right;"> <strong class="label">Height (CM)</strong>
												<input style="width:140px" type="text"name="height" id="height" class="validate[required]" onblur="getMSQ()">
											</label>
										</div>
										<label> <strong class="label">Body Surface Area (MSQ)</strong>
											<input type="text" name="surface_area" id="surface_area" value="" readonly="readonly">
										</label>
										<div class="two_comlumns">
											<label style="width:140px; float:left;"> <strong class="label">Patient's Phone Contact(s)</strong>
												<input style="width:140px" type="text"  name="phone" id="phone" value="">
											</label>
											<label style="width:140px; float:right;"> <strong class="label">Receive SMS Reminders</strong>
												<input style="width:20px" type="radio"  name="sms_consent" value="1">
												Yes
												<input style="width:20px" type="radio"  name="sms_consent" value="0">
												No </label>
										</div>
										<label> <strong class="label">Patient's Physical Contact(s)</strong> 											<textarea name="physical" id="physical" value=""></textarea> </label>
										<label> <strong class="label">Patient's Alternate Contact(s)</strong>
											<input type="text" name="alternate" id="alternate" value="">
										</label>
								</fieldset>
							</div>
							<div class="column">
								<fieldset style="height:800px;">
									<legend>
										Patient History
									</legend>
									<label  id="tstatus"> <strong class="label">Partner Status</br> </strong>
										<select name="pstatus" id="pstatus" style="width:300px">
											<option value="0" selected="selected">-----Select One-----</option>
											<option value="1" > Concordant</option>
											<option value="2" > Discordant</option>
										</select> </label>
									<p>
										<label id="dcs" ><strong class="label">Disclosure</br> </strong>
											<input style="width:20px" type="radio"  name="disco" id="disco" value="1">
											Yes
											<input style="width:20px" type="radio"  name="disco" id="disco1" value="0">
											No </label>
									<p>
										<strong class="label"> Family Planning Method</strong>
										<select name="plan_listing" id="plan_listing" multiple="multiple" class="plan_listing">
											<option value="-1-">Condoms</option>
											<option value="-2-">Intrauterine Contraceptive Device(copper T)</option>
											<option value="-3-">Implants(levonorgestrel 75mg)</option>
											<option value="-4-">Emergency Contraceptive pills(levonorgestrel0.75 mg)</option>
											<option value="-5-">Vasectomy</option>
											<option value="-6-">Tubaligation</option>
											<option value="-7-">Medroxyprogestrone 150 mg</option>
											<option value="-8-">Combined Oral Contraception(Levonorgestrel/ethinylestradiol 0.15/0.03mg)</option>
											<option value="-9-">levonorgestrel 0.03mg</option>
										</select>
									<p>
										<strong class="label">Does Patient have other Chronic illnesses</strong>
										<select name="other_illnesses_listing" id="other_illnesses_listing" class="other_illnesses_listing" multiple="multiple">
											<option value="-1-">Diabetes</option>
											<option value="-2-">Hypertension</option>
											<option value="-3-">Obesity</option>
											<option value="-4-">Asthma</option>
											<option value="-5-">Gout</option>
											<option value="-6-">Arthritis</option>
											<option value="-7-">Cancer</option>
											<option value="-8-">Stroke</option>
											<option value="-9-">Epilepsy</option>
											<option value="-10-">Mental Disorder</option>
											<option value="-11-">Cryptococcal Meningitis</option>
											<option value="-12-">Diability</option>
											<option id="13" value="-13-">Other</option>
										</select>
									<p>
										If <b>Other</b> List Them(Use Commas to separate)
									<p></p>
									<textarea  name="other_chronic" id="other_chronic"></textarea>
									<br/>
									<label> <strong class="label">List Other Drugs Patient is Taking</strong> 										<textarea name="other_drugs" id="other_drugs"></textarea> </label>
									<div class="three_columns">
										<strong class="label">Does Patient have any Drugs Allergies/ADR</strong>
										Yes
										<input type="checkbox" name="other_allergies" id="other_allergies" value="">
										<div class="list">
											List Them
										</div>
										<textarea class="list_area" name="other_allergies_listing" id="other_allergies_listing"></textarea>
									</div>
									<div class="three_columns">
										<strong class="label">Does Patient belong to any support group?</strong>
										Yes
										<input type="checkbox" name="support_group" id="support_group" value="">
										<div class="list">
											List Them
										</div>
										<textarea class="list_area" name="support_group_listing" id="support_group_listing"></textarea>
									</div>
									<div style="width:220px;height:80px;">
										<label style="float:left;width:100px;"> <strong class="label">Does Patient Smoke?</strong>
											<select name="smoke" id="smoke">
												<option value=""></option>
												<option value="0">No</option><option value="1">Yes</option>
											</select> </label><label style="width:100px;float:right;"> <strong class="label">Does Patient Drink Alcohol?</strong>
											<select name="alcohol" id="alcohol">
												<option value=""></option>
												<option value="0">No</option><option value="1">Yes</option>
											</select> </label>
									</div>
									<div style="width:350px;">
										<label style="float:left;width:200px;"> <strong class="label">Does Patient Have TB?</strong>
											<select name="tb" id="tb" class="tb">
												<option value=""></option>
												<option value="0">No</option><option value="1">Yes</option>
											</select> </label>
										<label id="tbstats" style="display:none;float:right;width:150px;"> <strong class="label">TB Phase</strong>
											<select name="tbphase" id="tbphase">
												<option value="0" selected="selected"></option><option value="1">Intensive</option><option value="2">Continuation</option><option value="3">Completed</option>
											</select> </label>
									</div>
									<br/>
									<label id="ttphase" style="display:inline-block;"> <strong class="label">Start of Phase</strong>
										<input type="text" name="fromphase" id="fromphase" value=""/>
									</label>
									&nbsp; <label id="endp" style="display:inline-block;"> <strong class="label">End of Phase</strong>
										<input type="text" name="tophase" id="tophase" value=""/>
									</label>
								</fieldset>
							</div>
							<div class="column">
								<fieldset style="height:800px;">
									<legend>
										Program Information
									</legend>
									<label> <strong class="label">*Date Patient Enrolled</strong>
										<input type="text" name="enrolled" id="enrolled" value="" class="validate[required]">
									</label>
									<p>
										<label> <strong class="label">*Current Status</strong> <select name="current_status" id="current_status"></select> </label>
									<p>
										<label class="status_started" style=""><strong class='label'>*Date of Status Change </strong>
											<input type="text" name="status_started" id="status_started" value="">
										</label>
									<p>
										<label> <strong class="label">*Source of Patient</strong>
											<select name="source" id="source" class="validate[required]">
												<option></option>
											</select> </label>
									<p>
										<label style="display:none;" id="patient_source_listing"> <strong class="label">Transfer From</strong> <select name="patient_source" id="patient_source"></select> </label>
									<p>
										<label> <strong class="label">*Patient Supported by</strong>
											<select name="support" id="support" class="validate[required]">
												<option></option>
											</select> </label>
									<p>
										<label> <strong class="label">*Type of Service</strong>
											<select name="service" id="service" class="validate[required]">
												<option></option>
											</select> </label>
									<p>
										<label id="start_of_regimen"> <strong class="label">*Start Regimen</strong> <select name="regimen" id="regimen" style="width:300px" class="validate[required]"></select> </label>
									<p>
										<label id="date_service_started" style=""> <strong class="label">*Start Regimen Date</strong>
											<input type="text" name="service_started" id="service_started" value="">
										</label>
								</fieldset>
							</div>
							<div id="submit_section">
								<input form="add_patient_form" class="submit-button" id="submit" value="Save &amp View List" style="width:200px;"/>
								<input form="add_patient_form" class="submit-button" id="dispense" value="Save &amp Dispense" style="width:200px;"/>
								<input type="reset" class="submit-button" id="reset" value="Reset Page" style="width:200px;"/>
							</div>
						</form>
					</div>
				</div>
				<!--End Wrapper div-->
			</div>
			<div id="bottom_ribbon" style="top:20px; width:90%;">
				<div id="footer">
					<div id="footer_text">
						Government of Kenya &copy; <span id="year" ></span>. All Rights Reserved
					</div>
				</div>
			</div>
	</body>
</html>