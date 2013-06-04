<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Dispense Drugs</title>
		<link rel="SHORTCUT ICON" href="Images/favicon.ico">
		<link href="CSS/style.css" type="text/css" rel="stylesheet"/>
		<link href="CSS/offline_css.css" type="text/css" rel="stylesheet"/>
		<link href="CSS/jquery-ui.css" type="text/css" rel="stylesheet"/>
		<link href="CSS/validator.css" type="text/css" rel="stylesheet"/>
		<script type="text/javascript" src="Scripts/offlineData.js"></script>
		<script type="text/javascript" src="Scripts/jquery.js"></script>
		<script type="text/javascript" src="Scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="Scripts/offline_database.js"></script>
		<script type="text/javascript" src="Scripts/validator.js"></script>
		<script type="text/javascript" src="Scripts/validationEngine-en.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				var $_GET = getQueryParams(document.location.hash);
				patient_number = $_GET['patient_number'];
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
				getLastVisitData();

				$(".qty_disp").change(function() {
					var selected_value = $(this).attr("value");
					var stock_at_hand = $(".soh").attr("value");
					var stock_validity = stock_at_hand - selected_value;
					if(stock_validity < 0) {
						//alert("Quantity Cannot Be larger Than Stock at Hand");

					}

				});

				$("#dispensing_date").attr('value', setCurrentDate());
				$(".remove").hide();
				//Add datepicker for the dispensing date
				$("#dispensing_date").datepicker({
					defaultDate : new Date(),
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true

				});
				//Add datepicker for the expiry date
				$("#expiry_date").datepicker({
					defaultDate : new Date(),
					dateFormat : $.datepicker.ATOM,
					changeYear : true,
					changeMonth : true
				});

				//Add datepicker for the next appointment date
				$("#next_appointment_date").datepicker({
					changeMonth : true,
					changeYear : true,
					dateFormat : $.datepicker.ATOM,
					onSelect : function(dateText, inst) {
						var base_date = new Date();
						var today = new Date(base_date.getFullYear(), base_date.getMonth(), base_date.getDate());
						var today_timestamp = today.getTime();
						var one_day = 1000 * 60 * 60 * 24;
						var appointment_timestamp = $("#next_appointment_date").datepicker("getDate").getTime();
						var difference = appointment_timestamp - today_timestamp;
						var days_difference = difference / one_day;
						$("#days_to_next").attr("value", days_difference);
						retrieveAppointedPatients();
					}
				});
				//Add listener to the 'days_to_next' field so that the date picker can reflect the correct number of days!
				$("#days_to_next").change(function() {
					var days = $("#days_to_next").attr("value");
					var base_date = new Date();
					var appointment_date = $("#next_appointment_date");
					var today = new Date(base_date.getFullYear(), base_date.getMonth(), base_date.getDate());
					var today_timestamp = today.getTime();
					var appointment_timestamp = (1000 * 60 * 60 * 24 * days) + today_timestamp;
					appointment_date.datepicker("setDate", new Date(appointment_timestamp));
					retrieveAppointedPatients();
				});
				//Add listener to check purpose
				$("#purpose").change(function() {
					$("#adherence").attr("value", " ");
					$("#adherence").removeAttr("disabled");
					var selected_value = $(this).val();
					var day_percentage = 0;
					if(selected_value == 2 || selected_value == 5) {
						var days_count = $("#days_count").val();
						if(days_count <= 0) {
							day_percentage = "100%";
						} else if(days_count > 0 && days_count <= 2) {
							day_percentage = ">=95%";
						} else if(days_count > 2 && days_count < 14) {
							day_percentage = "84-94%";
						} else if(days_count >= 14) {
							day_percentage = "<85%";
						}
						$("#adherence").attr("value", day_percentage);
						$("#adherence").attr("disabled", "disabled");
					}

				});
				//Add listener to the drug batch selecter to prepopulate the expiry date and check if it is the most appropriate
				$(".batch").change(function() {
					var row_element = $(this).closest("tr");
					var expiry_date = row_element.find(".expiry");
					var drug = row_element.find(".drug").attr("value");
					//Get basic getails of the selected patient
					getBatchExpiry(drug, $(this).attr("value"), function(transaction, results) {
						// Handle the results
						if(results.rows.length > 0) {
							var row = results.rows.item(0);
							expiry_date.attr("value", row['expiry_date']);
							if(row['expiry_date'] != row['LEAST']) {
								alert("THIS IS NOT THE FIRST EXPIRING BATCH")
							}
						}
					});
					retrieveBatchesLevels(drug, $(this).val(), row_element);
				});
				//Dynamically load the list of doses
				selectDoses(function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#dose").append($("<option/>").attr("value", row['name']));
					}

				});
				//Dynamically load the list of purposes of visit
				selectAll("visit_purpose", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#purpose").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}
				});
				//Dynamically load the list of non_adhrence reasons
				selectAll("non_adherence_reasons", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#non_adherence_reasons").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}
				});
				//Dynamically load the list of opportunistic infections
				selectAll("opportunistic_infections", function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$.each($(".indication"), function(i, v) {
							$(this).append($("<option></option>").attr("value", row['id']).text(row['name']));
						});
					}

				});
				//Dynamically load the list of regimens
				$("#current_regimen").append($("<option selected></option>").attr("value", "0").text("Select One"));
				selectRegimen(function(transaction, results) {
					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#current_regimen").append($("<option></option>").attr("value", row['id']).text(row['regimen_desc']));
					}

				});
				//Get basic getails of the selected patient
				getPatientDetails(patient_number, function(transaction, results) {
					// Handle the results
					var row = results.rows.item(0);
					$("#patient").attr("value", patient_number);
					$("#patient_details").text(row['first_name'] + " " + row['other_name'] + " " + row["last_name"]);
					$("#height").attr("value", row['height']);
					//$("#current_regimen").attr("value", row['current_regimen']);
				});
				//Dynamically change the list of drugs once a current regimen is selected
				$("#current_regimen").change(function() {
					var regimen = $("#current_regimen option:selected").attr("value");
					var last_regimen = $("#last_regimen_disp").attr("regimen_id");
					if(last_regimen != 0) {
						//If the previous regimen and the one currently chosen are different, display the regimen change reason dropdown list
						if(regimen != last_regimen) {
							//Retrieve all the regimen change reasons
							$("#regimen_change_reason").children('option').remove();
							$("#regimen_change_reason").append($("<option></option>").attr("value", "").text("Choose One"));
							selectAll("regimen_change_purpose", function(transaction, results) {
								// Handle the results
								for(var i = 0; i < results.rows.length; i++) {
									var row = results.rows.item(i);
									$("#regimen_change_reason").append($("<option></option>").attr("value", row['id']).text(row['name']));
								}
							});
							$("#regimen_change_reason_container").css("display", "block");
						} else {
							$("#regimen_change_reason_container").hide();
						}
					}
					//Clear the drugs list first
					$.each($(".drug"), function(i, v) {
						$(this).children('option').remove();
						$(this).append($("<option></option>"));
					});
					//Dynamically load the list of drugs for this regimen
					selectRegimenDrugs(regimen, function(transaction, results) {
						// Handle the results

						for(var i = 0; i < results.rows.length; i++) {
							var row = results.rows.item(i);
							if(i == 0) {
								$.each($(".drug"), function(i, v) {
									$(this).append($("<option></option>").attr("value", row['id']).text(row['drug']));

									populateDrugRow($(this));

								});
								continue;
							}
							$.each($(".drug"), function(i, v) {

								$(this).append($("<option></option>").attr("value", row['id']).text(row['drug']));
							});
						}
					});
					//In addition to the drugs in this regimen, load OI medicines too!
					//loadOIMedicine();
				});
				//Fill the whole drug row with details of the selected drug!
				$(".drug").change(function() {
					populateDrugRow($(this));

				});
				$(".add").click(function() {

					var cloned_object = $('#drugs_table tr:last').clone(true);
					var drug_row = cloned_object.attr("drug_row");
					var next_drug_row = parseInt(drug_row) + 1;
					var row_element = cloned_object;

					//Second thing, retrieve the respective containers in the row where the drug is
					row_element.find(".unit").attr("value", "");
					row_element.find(".batch").empty();
					//Fixing the expiry date in dispensing
					var expiry_id = "expiry_date_" + next_drug_row;
					var expiry_date = row_element.find(".expiry").attr("value", "");
					expiry_date.attr("id", expiry_id);
					var expiry_selector = "#" + expiry_id;

					$(expiry_selector).datepicker({
						defaultDate : new Date(),
						changeYear : true,
						changeMonth : true
					});

					row_element.find(".dose").attr("value", "");
					row_element.find(".duration").attr("value", "");
					row_element.find(".qty_disp").attr("value", "");
					row_element.find(".brand").attr("value", "");
					row_element.find(".soh").attr("value", "");
					row_element.find(".indication").attr("value", "");
					row_element.find(".pill_count").attr("value", "");
					row_element.find(".pill_count").removeAttr("disabled");
					row_element.find(".comment").attr("value", "");
					row_element.find(".missed_pills").attr("value", "");
					row_element.find(".missed_pills").removeAttr("disabled");
					row_element.find(".remove").show();
					cloned_object.attr("drug_row", next_drug_row);
					cloned_object.insertAfter('#drugs_table tr:last');
					refreshDatePickers();
					return false;
				});
				$(".remove").click(function() {
					$(this).closest('tr').remove();
				});
			});
			//Function to get details of the last visit made by this patient
			function getLastVisitData() {
				//Retrieve details of the last regimen taken by a patient
				selectPatientRegimen("patient", patient_number, function(transaction, results) {
					// Handle the results
					if(results.rows.length > 0) {
						var row = results.rows.item(0);
						//Display the Last Regimen Taken
						$("#last_regimen_disp").attr("value", row['regimen_desc']);
						$("#last_regimen_disp").attr("regimen_id", row['id']);
						$("#last_regimen").attr("value", row['id']);
						var last_visit_date = row['dispensing_date'];
						$("#last_visit_date").attr("value", last_visit_date);
						$("#height").attr("value", row['current_height']);
						//Retrieve drugs dispensed during the last visit
						selectLastVisitDetails(patient_number, last_visit_date, function(transaction, results) {
							for(var i = 0; i < results.rows.length; i++) {
								var row = results.rows.item(i);
								var append_html = "<tr><td>" + row['drug'] + "</td><td>" + row['quantity'] + "</td></tr>";
								$("#last_visit_data").append($(append_html));
							}
						});
						getLastPatientAppointment(patient_number, function(transaction, results) {
							// Handle the results
							var row = results.rows.item(0);
							var today = new Date();
							var appointment_date = $.datepicker.parseDate('yy-mm-dd', row['appointment']);
							var timeDiff = today.getTime() - appointment_date.getTime();
							var diffDays = Math.floor(timeDiff / (1000 * 3600 * 24));
							if(diffDays > 0) {
								var html = "<span style='color:#ED5D3B;'>Late by <b>" + diffDays + "</b> days.</span>";
							} else {
								var html = "<span style='color:#009905'>Not Due for <b>" + Math.abs(diffDays) + "</b> days.</span>";
							}

							$("#days_late").append(html);
							$("#days_count").attr("value", diffDays);
							$("#last_appointment_date").attr("value", row['appointment']);
						});
					}

				});
			}

			function populateDrugRow(drug) {
				//First things first, retrieve the row where this drug exists
				var row_element = drug.closest("tr");
				//Secod thing, retrieve the respective containers in the row where the drug is
				var unit = row_element.find(".unit");
				var batch = row_element.find(".batch");
				var expiry = row_element.find(".expiry");
				var dose = row_element.find(".dose");
				var duration = row_element.find(".duration");
				var qty_disp = row_element.find(".qty_disp");
				var brand = row_element.find(".brand");
				var soh = row_element.find(".soh");
				var missed_pills = row_element.find(".missed_pills");

				var pill_count = row_element.find(".pill_count");
				if(drug.attr("value") > 0) {
					//Retrieve details about the selected drug from the database
					selectSingleFilteredQuery("drugcode", "id", drug.attr("value"), function(transaction, results) {

						// Handle the results
						var row = results.rows.item(0);
						getUnitName(row['unit'], function(transaction, res) {
							if(res.rows.length > 0) {
								var r = res.rows.item(0);
								unit.attr("value", r['name']);
							}

						});
						/*if(row['supplied'] != 0) {
						missed_pills.attr("disabled", "disabled");
						pill_count.attr("disabled", "disabled");
						} else {
						row_element.find(".missed_pills").removeAttr("disabled");
						row_element.find(".pill_count").removeAttr("disabled");

						}*/
						//unit.attr("value", row['unit']);
						dose.attr("value", row['dose']);
						duration.attr("value", row['duration']);
						qty_disp.attr("value", row['quantity']);
						batch.children('option').remove();
						expiry.attr("value", "");
						//Retrieve all the batch numbers for this drug
						selectEnvironmentVariables(function(transaction, results) {
							// Handle the results
							var row = results.rows.item(0);
							var facility = row['facility'];
							retrieveBatches(drug.attr("value"), batch, facility);
						});
					});
				}
			}

			function retrieveBatches(drug, batch, facility) {
				var stock_status = 0;
				var starting_stock_sql = "SELECT (SUM( d.quantity ) - SUM( d.quantity_out )) AS Initital_stock,d.batch_number AS batch,transaction_date FROM drug_stock_movement d WHERE d.drug ='" + drug + "' AND facility='" + facility + "' AND strftime('%Y%m%d',d.expiry_date)> strftime('%Y%m%d',date()) GROUP BY d.batch_number  having Initital_stock>0 order by d.expiry_date asc";
				//console.log(starting_stock_sql);
				batch.append($("<option></option>").attr("value", "").text("Select"));
				SQLExecuteAbstraction(starting_stock_sql, function(transaction, results) {
					for(var i = 0; i < results.rows.length; i++) {
						var first_row = results.rows.item(i);
						var batch_value = first_row["batch"];
						var initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '" + batch_value + "' AS batch FROM drug_stock_movement d WHERE d.drug =  '" + drug + "' AND facility='" + facility + "' AND transaction_type =  '11' AND d.batch_number =  '" + batch_value + "'";
						//console.log(initial_stock_sql);
						SQLExecuteAbstraction(initial_stock_sql, function(transaction, results) {
							for(var m = 0; m < results.rows.length; m++) {
								var physical_row = results.rows.item(m);
								initial_stock = physical_row['Initial_stock'];
								//Check if initial stock is present meaning physical count done
								if(initial_stock != null) {
									batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" + physical_row['transaction_date'] + "' AND date() AND facility='" + facility + "' AND ds.drug ='" + drug + "'  AND ds.batch_number ='" + physical_row['batch'] + "'";
									//console.log(batch_stock_sql);
									SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
										for(var j = 0; j < results.rows.length; j++) {
											var second_row = results.rows.item(j);
											//console.log(second_row)
											if(second_row['stock_levels'] > 0) {
												var batch_id = second_row['batch_number'];
												batch.append($("<option></option>").attr("value", batch_id).text(batch_id));
											}
										}
									});
								} else {
									batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '" + drug + "' AND facility='" + facility + "' AND ds.expiry_date > date() AND ds.batch_number='" + physical_row['batch'] + "'";
									//console.log(batch_stock_sql);
									SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
										for(var j = 0; j < results.rows.length; j++) {
											var second_row = results.rows.item(j);

											if(second_row['stock_levels'] > 0) {
												var batch_id = second_row['batch_number'];
												batch.append($("<option></option>").attr("value", batch_id).text(batch_id));
											}

										}
									});
								}

							}

						});
					}

				});
			}

			function retrieveBatchesLevels(drug, batch, row_element) {
				var stock_status = 0;
				//Query to check if batch has had a physical count
				selectEnvironmentVariables(function(transaction, results) {
					// Handle the results
					var row = results.rows.item(0);
					var facility = row['facility'];

					var initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '" + batch + "' AS batch FROM drug_stock_movement d WHERE d.drug =  '" + drug + "' AND facility='" + facility + "' AND transaction_type =  '11' AND d.batch_number =  '" + batch + "'";
					//console.log(initial_stock_sql)
					SQLExecuteAbstraction(initial_stock_sql, function(transaction, results) {
						for(var m = 0; m < results.rows.length; m++) {
							var physical_row = results.rows.item(m);
							initial_stock = physical_row['Initial_stock'];
							//Check if initial stock is present meaning physical count done
							if(initial_stock != null) {
								batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" + physical_row['transaction_date'] + "' AND date() AND facility='" + facility + "' AND ds.drug ='" + drug + "'  AND ds.batch_number ='" + physical_row['batch'] + "'";
								SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
									for(var j = 0; j < results.rows.length; j++) {
										var second_row = results.rows.item(j);
										//console.log(second_row)
										if(second_row['stock_levels'] > 0) {
											batch_stock = second_row['stock_levels'];
											row_element.find(".soh").attr("value", batch_stock);
										}
									}
								});
							} else {
								batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '" + drug + "' AND facility='" + facility + "' AND ds.expiry_date > date() AND ds.batch_number='" + physical_row['batch'] + "'";
								//console.log(batch_stock_sql)
								SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
									for(var j = 0; j < results.rows.length; j++) {
										var second_row = results.rows.item(j);

										if(second_row['stock_levels'] > 0) {
											batch_stock = second_row['stock_levels'];
											row_element.find(".soh").attr("value", batch_stock);
										}

									}
								});
							}

						}

					});
				});
			}

			function loadOIMedicine() {
				//Dynamically load all opportunistic drugs
				selectOIMedicines(function(transaction, results) {

					// Handle the results
					for(var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$.each($(".drug"), function(i, v) {

							$(this).append($("<option></option>").attr("value", row['id']).text(row['drug']));
						});
					}
				});
			}

			function refreshDatePickers() {
				var counter = 0;
				$('.expiry').each(function() {
					var new_id = "date_" + counter;
					$(this).attr("id", new_id);
					$(this).datepicker("destroy");
					$(this).not('.hasDatePicker').datepicker({
						defaultDate : new Date(),
						dateFormat : $.datepicker.ATOM,
						changeYear : true,
						changeMonth : true
					});
					counter++;

				});
			}

			function retrieveAppointedPatients() {
				$("#scheduled_patients").html("");
				$('#scheduled_patients').slideUp('slow', function() {
					// Animation complete.
				});
				var next_appointment_date = $("#next_appointment_date").attr("value");
				var date_object = new Date(next_appointment_date);
				formatted_date = $.datepicker.formatDate('yy-mm-dd', date_object);
				//Get number of appointments on this date
				getTotalPatientAppointments(formatted_date, function(transaction, results) {
					// Handle the results
					var row = results.rows.item(0);
					var all_appointments_link = "<a class='link' target='_blank' href='reports/patients_scheduled_to_visit.html#?date=" + formatted_date + "' style='font-weight:bold;color:red;'>View appointments</a>";
					var html = "Patients Scheduled on Date: <b>" + row['total_appointments'] + "</b>. " + all_appointments_link;
					var new_date = new Date(formatted_date);
					var formatted_date_day = new_date.getDay();
					var days_of_week = ["Sunday", "Monday", "Tuseday", "Wednesday", "Thursday", "Friday", "Saturday"];
					if(formatted_date_day == 6 || formatted_date_day == 0) {
						alert("It will be on " + days_of_week[formatted_date_day] + " During the Weekend");
						if(row['total_appointments'] > row['weekend_max']) {
							alert("Maximum Appointments for Weekend Reached");
						}

					} else {

						if(row['total_appointments'] > row['weekday_max']) {
							alert("Maximum Appointments for Weekday Reached");
						}

					}

					$("#scheduled_patients").append(html);
					$('#scheduled_patients').slideDown('slow', function() {
						// Animation complete.
					});
				});
			}

			function numberWithCommas(x) {
				return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			}

			function setCurrentDate() {
				var d = new Date();
				var date_string = d.getFullYear() + '-' + ('0' + (d.getMonth() + 1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2);
				return date_string;
			}
		</script>
		<style type="text/css">
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
				width: 100%;
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
			}
			#patient_demographics {
				margin: 5px;
			}
			select {
				height: 30px !important;
			}
			.column_right {
				width: 40%;
				font-family: Arial;
				padding: 2px;
				float: right;
				margin-right: 10%;
			}
			.column_left {
				width: 40%;
				font-family: Arial;
				padding: 2px;
				float: left;
				margin-left: 5%;
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
			.banner_text {
				height: auto;
				margin: 0px;
			}
			#submit_section {
				margin: 0 20% 0 20%;
			}
			.short_title {
				height: 35px;
				background: #036;
				color: #FFF;
				font-weight: bold;
				width: 100%;
			}
			.banner_text {
				color: #FFF;
				font-weight: bold;
				font-family: Book Antiqua;
			}
			#main_wrapper {
				background: #FF99FF;
				font-weight: bold;
				color: #000;
				width: 100%;
			}
			input {
				height: 30px !important;
			}
			fieldset {
				padding: 20px;
			}
			.two_comlumns {
				width: 500px;
				height: 70px;
			}
			#drugs_section {
				clear: both;
				margin: 0 0 0 20px;
				padding: 20px;
				zoom: 110%;
				width: 80%;
				font-weight: bold;
				color: #000;
			}
			#dispensing_info tr {
				height: 25px;
			}
			.icondose {
				background: #FFFFFF url(Images/dropdown.png) no-repeat 55px 4px;
				padding: 4px 4px 4px 22px;
				height: 5px;
			}
			#current_regimen {
				color: red;
				font-weight: bold;
			}
			#last_regimen_disp {
				color: blue;
				font-weight: bold;
			}
			.expiry small_text {
				width: 400px;
			}
			#facility_name {
				color: green;
				margin-top: 5px;
				font-weight: bold;
			}

		</style>
	</head>
	<body>
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
						<a ref="#" class="top_menu_link" id="my_profile_link"></a>
					</div>
				</div>
			</div>
			<div id="inner_wrapper">
				<div id="main_wrapper">
					<div id="signup">
						<div class="short_title" >
							<h3 class="banner_text">Dispense Drugs</h3>
						</div>
						<hr/>
						<form id="dispense_form" method="post" >
							<input type="hidden" id="hidden_stock" name="hidden_stock"/>
							<input type="hidden" id="days_count" name="days_count"/>
							<div class="column_left">
								<fieldset>
									<legend>
										Dispensing Information
									</legend>
									<table border='0' id="dispensing_info" cellpadding="2">
										<tr>
											<td><strong class="label">Patient Number CCC</strong></td>
											<td>
											<input readonly="" id="patient" name="patient" class="validate[required]"/>
											</td>
											<td><strong class="label">Patient Name</strong></td>
											<td><span id="patient_details" style="padding:5px;"></span></td>
										</tr>
										<tr>
											<td><strong class="label">Dispensing Date</strong></td>
											<td>
											<input style="width:140px" type="text"name="dispensing_date" id="dispensing_date" class="validate[required]">
											</td>
											<td><strong class="label" >Purpose of Visit</strong></td>
											<td>
											<select style="width:140px;" type="text"name="purpose" id="purpose" class="validate[required]">
												<option></option>
											</select> </label> </td>
										</tr>
										<tr>
											<td><strong class="label" >Current Height(cm)</strong></td>
											<td>
											<input style="width:140px;" type="text"name="height" id="height" class="validate[required]">
											</td>
											<td><strong class="label" >Current Weight(kg)</strong></td>
											<td>
											<input style="width:140px" type="text"name="weight" id="weight" class="validate[required]">
											</td>
										</tr>
										<tr>
											<td><strong class="label" >Days to Next Appointment</strong></td>
											<td>
											<input style="width:140px;" type="text"name="days_to_next" id="days_to_next" class="validate[required]">
											</td>
											<td><strong class="label">Date of Next Appointment</strong></td>
											<td>
											<input style="width:140px" type="text"name="next_appointment_date" id="next_appointment_date" class="validate[required]">
											</td>
										</tr>
										<tr>
											<td colspan='6'><label id="scheduled_patients" class="message information close" style="display:none"></label></td>
										</tr>
										<tr>
											<td><strong class="label">Last Regimen Dispensed</strong></td>
											<td>
											<input type="text"name="last_regimen_disp" regimen_id="0" id="last_regimen_disp" readonly="">
											<input type="hidden" name="last_regimen" regimen_id="0" id="last_regimen">
											</td>
											<td><strong class="label">Current Regimen</strong></td>
											<td>
											<select type="text"name="current_regimen" id="current_regimen" style="width:300px;font-size:12px;" class="validate[required]">
												<option></option>
											</select></td>
										</tr>
										<tr>
											<td colspan="6"><label style="display:none" id="regimen_change_reason_container"> <strong class="label">Regimen Change Reason</strong>
												<select type="text"name="regimen_change_reason" id="regimen_change_reason" style="width:300px">
													<option></option>
												</select> </label></td>
										</tr>
										<tr>
											<td><strong class="label">Appointment Adherence (%)</strong></td>
											<td>
											<input type="text"name="adherence" id="adherence" style="font-weight:bold;">
											</td>
											<td><strong class="label"> Poor/Fair Adherence Reasons </strong></td>
											<td>
											<select type="text"name="non_adherence_reasons" id="non_adherence_reasons" style="width:300px;height:20px;">
												<option></option>
											</select></td>
										</tr>
									</table>
								</fieldset>
							</div>
							<div class="column_right">
								<fieldset>
									<legend>
										Previous Patient Information
									</legend>
									<label> <strong class="label">Appointment Date</strong>
										<input readonly="" id="last_appointment_date" name="last_appointment_date"/>
									</label><label id="days_late"> </label>
									<label> <strong class="label">Previous Visit Date</strong>
										<input readonly="" id="last_visit_date" name="last_visit_date"/>
									</label>
									<table class="data-table" id="last_visit_data">
										<th>Drug Dispensed</th>
										<th>Quantity Dispensed</th>
									</table>
								</fieldset>
							</div>
							<div id="drugs_section">
								<table border="0" class="data-table" id="drugs_table" style="font-size:12px;">
									<th class="subsection-title" colspan="14">Select Drugs</th>
									<tr>
										<th>Drug</th>
										<th>Unit</th>
										<th >Batch No.&nbsp;</th>
										<th>Expiry&nbsp;Date</th>
										<th>Dose</th>
										<th>Duration</th>
										<th>Qty. disp</th>
										<th>Brand Name</th>
										<th>Stock on Hand</th>
										<th>Indication</th>
										<th>Pill Count</th>
										<th>Comment</th>
										<th>Missed Pills</th>
										<th style="min-width: 50px;">Action</th>
									</tr>
									<tr drug_row="0">
										<td><select name="drug" class="drug"  style=" font-size: 12px;font-weight:bold; "></select></td>
										<td>
										<input type="text" name="unit" class="unit small_text" style="width: 150px;" />
										</td>
										<td><select name="batch" class="batch" style="width:200px;"></select></td>
										<td>
										<input type="text" name="expiry" name="expiry" class="expiry" id="expiry_date"  size="15"/>
										</td>
										<td>
										<input list="dose" name="dose" style="max-width:70px;height:30px;" class="dose small_text icondose">
										<datalist id="dose" ></datalist></td>
										<td>
										<input type="text" name="duration" class="duration small_text" />
										</td>
										<td>
										<input type="text" name="qty_disp" class="qty_disp small_text" />
										</td>
										<td><select name="brand" class="brand small_text"></select></td>
										<td>
										<input type="text" name="soh" class="soh small_text" disabled="disabled"/>
										</td>
										<td>
										<select name="indication" class="indication" style="max-width: 70px;">
											<option value="0">None</option>
										</select></td>
										<td>
										<input type="text" name="pill_count" class="pill_count small_text" />
										</td>
										<td>
										<input type="text" name="comment" class="comment small_text" />
										</td>
										<td>
										<input type="text" name="missed_pills" class="missed_pills small_text" />
										</td>
										<td>
										<input type="button" class="add button" value="+" style="width: 20px; min-width:0"/>
										<input type="button" class="remove button" value="-" style="width: 20px; min-width:0"/>
										</td>
									</tr>
								</table>
							</div>
							<div id="submit_section">
								<input type="reset" class="submit-button" id="reset" value="Reset Fields" style="width:200px;"/>
								<input form="dispense_form" class="submit-button" id="submit" value="Dispense Drugs" style="width:200px;"/>
							</div>
						</form>
					</div>
				</div>
				<!--End Wrapper div-->
			</div>
			<div id="bottom_ribbon" style="top:70px; width:90%;">
				<div id="footer">
					<div id="footer_text">
						Government of Kenya &copy; <span id="year" ></span>. All Rights Reserved
					</div>
				</div>
			</div>
	</body>
</html>