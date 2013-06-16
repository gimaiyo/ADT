<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
					if (stock_validity < 0) {
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
					if (selected_value == 2 || selected_value == 5) {
						var days_count = $("#days_count").val();
						if (days_count <= 0) {
							day_percentage = "100%";
						} else if (days_count > 0 && days_count <= 2) {
							day_percentage = ">=95%";
						} else if (days_count > 2 && days_count < 14) {
							day_percentage = "84-94%";
						} else if (days_count >= 14) {
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
						if (results.rows.length > 0) {
							var row = results.rows.item(0);
							expiry_date.attr("value", row['expiry_date']);
							if (row['expiry_date'] != row['LEAST']) {
								alert("THIS IS NOT THE FIRST EXPIRING BATCH")
							}
						}
					});
					retrieveBatchesLevels(drug, $(this).val(), row_element);
				});
				//Dynamically load the list of doses
				selectDoses(function(transaction, results) {
					// Handle the results
					for (var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#dose").append($("<option/>").attr("value", row['name']));
					}

				});
				//Dynamically load the list of purposes of visit
				selectAll("visit_purpose", function(transaction, results) {
					// Handle the results
					for (var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#purpose").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}
				});
				//Dynamically load the list of non_adhrence reasons
				selectAll("non_adherence_reasons", function(transaction, results) {
					// Handle the results
					for (var i = 0; i < results.rows.length; i++) {
						var row = results.rows.item(i);
						$("#non_adherence_reasons").append($("<option></option>").attr("value", row['id']).text(row['name']));
					}
				});
				//Dynamically load the list of opportunistic infections
				selectAll("opportunistic_infections", function(transaction, results) {
					// Handle the results
					for (var i = 0; i < results.rows.length; i++) {
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
					for (var i = 0; i < results.rows.length; i++) {
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
					if (last_regimen != 0) {
						//If the previous regimen and the one currently chosen are different, display the regimen change reason dropdown list
						if (regimen != last_regimen) {
							//Retrieve all the regimen change reasons
							$("#regimen_change_reason").children('option').remove();
							$("#regimen_change_reason").append($("<option></option>").attr("value", "").text("Choose One"));
							selectAll("regimen_change_purpose", function(transaction, results) {
								// Handle the results
								for (var i = 0; i < results.rows.length; i++) {
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

						for (var i = 0; i < results.rows.length; i++) {
							var row = results.rows.item(i);
							if (i == 0) {
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
					if (results.rows.length > 0) {
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
							for (var i = 0; i < results.rows.length; i++) {
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
							if (diffDays > 0) {
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
				if (drug.attr("value") > 0) {
					//Retrieve details about the selected drug from the database
					selectSingleFilteredQuery("drugcode", "id", drug.attr("value"), function(transaction, results) {

						// Handle the results
						var row = results.rows.item(0);
						getUnitName(row['unit'], function(transaction, res) {
							if (res.rows.length > 0) {
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
					for (var i = 0; i < results.rows.length; i++) {
						var first_row = results.rows.item(i);
						var batch_value = first_row["batch"];
						var initial_stock_sql = "SELECT SUM( d.quantity ) AS Initial_stock, d.transaction_date AS transaction_date, '" + batch_value + "' AS batch FROM drug_stock_movement d WHERE d.drug =  '" + drug + "' AND facility='" + facility + "' AND transaction_type =  '11' AND d.batch_number =  '" + batch_value + "'";
						//console.log(initial_stock_sql);
						SQLExecuteAbstraction(initial_stock_sql, function(transaction, results) {
							for (var m = 0; m < results.rows.length; m++) {
								var physical_row = results.rows.item(m);
								initial_stock = physical_row['Initial_stock'];
								//Check if initial stock is present meaning physical count done
								if (initial_stock != null) {
									batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" + physical_row['transaction_date'] + "' AND date() AND facility='" + facility + "' AND ds.drug ='" + drug + "'  AND ds.batch_number ='" + physical_row['batch'] + "'";
									//console.log(batch_stock_sql);
									SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
										for (var j = 0; j < results.rows.length; j++) {
											var second_row = results.rows.item(j);
											//console.log(second_row)
											if (second_row['stock_levels'] > 0) {
												var batch_id = second_row['batch_number'];
												batch.append($("<option></option>").attr("value", batch_id).text(batch_id));
											}
										}
									});
								} else {
									batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '" + drug + "' AND facility='" + facility + "' AND ds.expiry_date > date() AND ds.batch_number='" + physical_row['batch'] + "'";
									//console.log(batch_stock_sql);
									SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
										for (var j = 0; j < results.rows.length; j++) {
											var second_row = results.rows.item(j);

											if (second_row['stock_levels'] > 0) {
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
						for (var m = 0; m < results.rows.length; m++) {
							var physical_row = results.rows.item(m);
							initial_stock = physical_row['Initial_stock'];
							//Check if initial stock is present meaning physical count done
							if (initial_stock != null) {
								batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out )) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.transaction_date BETWEEN  '" + physical_row['transaction_date'] + "' AND date() AND facility='" + facility + "' AND ds.drug ='" + drug + "'  AND ds.batch_number ='" + physical_row['batch'] + "'";
								SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
									for (var j = 0; j < results.rows.length; j++) {
										var second_row = results.rows.item(j);
										//console.log(second_row)
										if (second_row['stock_levels'] > 0) {
											batch_stock = second_row['stock_levels'];
											row_element.find(".soh").attr("value", batch_stock);
										}
									}
								});
							} else {
								batch_stock_sql = "SELECT (SUM( ds.quantity ) - SUM( ds.quantity_out ) ) AS stock_levels, ds.batch_number FROM drug_stock_movement ds WHERE ds.drug =  '" + drug + "' AND facility='" + facility + "' AND ds.expiry_date > date() AND ds.batch_number='" + physical_row['batch'] + "'";
								//console.log(batch_stock_sql)
								SQLExecuteAbstraction(batch_stock_sql, function(transaction, results) {
									for (var j = 0; j < results.rows.length; j++) {
										var second_row = results.rows.item(j);

										if (second_row['stock_levels'] > 0) {
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
					for (var i = 0; i < results.rows.length; i++) {
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
					if (formatted_date_day == 6 || formatted_date_day == 0) {
						alert("It will be on " + days_of_week[formatted_date_day] + " During the Weekend");
						if (row['total_appointments'] > row['weekend_max']) {
							alert("Maximum Appointments for Weekend Reached");
						}

					} else {

						if (row['total_appointments'] > row['weekday_max']) {
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

	</head>
	<body>
		<div class="full-content">

			<h3>Dispense Drugs</h3>

			<form id="dispense_form" class="dispense_form" method="post" >
				<input type="hidden" id="hidden_stock" name="hidden_stock"/>
				<input type="hidden" id="days_count" name="days_count"/>
				<div class="column-2">
					<fieldset>
						<legend>
							Dispensing Information
						</legend>

						<div class="max-row">
							<div class="mid-row">
								<label>Patient Number CCC</label>

								<input readonly="" id="patient" name="patient" class="validate[required]"/>
							</div>
							<div class="mid-row">
								<label>Patient Name</label>
								<span id="patient_details"></span>
							</div>
						</div>

						<div class="max-row">
							<div class="mid-row">
								<label>Dispensing Date</label>

								<input  type="text"name="dispensing_date" id="dispensing_date" class="validate[required]">
							</div>
							<div class="mid-row">
								<label>Purpose of Visit</label>

								<select  type="text"name="purpose" id="purpose" class="validate[required]">
									<option></option>
								</select>
								</label>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>Current Height(cm)</label>

								<input  type="text"name="height" id="height" class="validate[required]">
							</div>
							<div class="mid-row">
								<label>Current Weight(kg)</label>

								<input  type="text"name="weight" id="weight" class="validate[required]">
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>Days to Next Appointment</label>

								<input  type="text"name="days_to_next" id="days_to_next" class="validate[required]">
							</div>
							<div class="mid-row">
								<label>Date of Next Appointment</label>

								<input  type="text"name="next_appointment_date" id="next_appointment_date" class="validate[required]">
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label id="scheduled_patients" class="message information close" style="display:none"></label><label>Last Regimen Dispensed</label>
								<input type="text"name="last_regimen_disp" regimen_id="0" id="last_regimen_disp" readonly="">
								<input type="hidden" name="last_regimen" regimen_id="0" id="last_regimen">
							</div>

							<div class="mid-row">
								<label>Current Regimen</label>
								<select type="text"name="current_regimen" id="current_regimen"  class="validate[required]">
									<option></option>
								</select>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<div style="display:none" id="regimen_change_reason_container">
									<label>Regimen Change Reason</label>
									<select type="text"name="regimen_change_reason" id="regimen_change_reason" s>
										<option></option>
									</select>
								</div>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>Appointment Adherence (%)</label>
								<input type="text"name="adherence" id="adherence">
							</div>
							<div class="mid-row">
								<label> Poor/Fair Adherence Reasons </label>
								<select type="text"name="non_adherence_reasons" id="non_adherence_reasons" >
									<option></option>
								</select>
							</div>
						</div>

					</fieldset>
				</div>
				<div class="column-2">
					<fieldset>
						<legend>
							Previous Patient Information
						</legend>
						<div class="max-row">
							<div class="mid-row">
								<label> Appointment Date</label>
								<input readonly="" id="last_appointment_date" name="last_appointment_date"/>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>Previous Visit Date</label>
								<input readonly="" id="last_visit_date" name="last_visit_date"/>
							</div>
						</div>

						<table class="data-table" id="last_visit_data">
							<th>Drug Dispensed</th>
							<th>Quantity Dispensed</th>
						</table>
					</fieldset>
				</div>

				<div class="content-row">
					<!--div id="drugs_section">
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
					</div-->
				</div>
				<div class="btn-group">
					<input type="reset" class="btn" id="reset" value="Reset Fields" />
					<input form="dispense_form" class="btn" id="submit" value="Dispense Drugs"/>
				</div>
			</form>

		</div>

	</body>
</html>