<?php 
foreach($results as $result){
	
}
?>

<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript">
			$(document).ready(function() {
				$("#patient").val("<?php echo $result['patient_number_ccc'];?>");
				var first_name="<?php echo strtoupper($result['first_name']); ?>";
				var other_name="<?php echo strtoupper($result['other_name']); ?>";
				var last_name="<?php echo strtoupper($result['last_name']); ?>";
				$("#patient_details").val(first_name+" "+other_name+" "+last_name);
				$("#height").val("<?php echo $result['height']; ?>");
				$("#last_regimen_disp").val("<?php echo $last_regimens['regimen_code']." | ".$last_regimens['regimen_desc'];?>");
				$("#last_regimen").val("<?php echo $last_regimens['id'];?>");
				
				
				var last_visit_date ="<?php echo $last_regimens['dispensing_date']; ?>";
				$("#last_visit_date").attr("value", last_visit_date);
				
				//Get Prev Appointment
				var today = new Date();
				var appointment_date = $.datepicker.parseDate('yy-mm-dd',"<?php echo $appointments['appointment']; ?>");
				var timeDiff = today.getTime() - appointment_date.getTime();
				var diffDays = Math.floor(timeDiff / (1000 * 3600 * 24));
				if(diffDays > 0) {
					var html = "<span style='color:#ED5D3B;'>Late by <b>" + diffDays + "</b> days.</span>";
				} else {
					var html = "<span style='color:#009905'>Not Due for <b>" + Math.abs(diffDays) + "</b> days.</span>";
				}

				$("#days_late").append(html);
				$("#days_count").attr("value", diffDays);
				$("#last_appointment_date").attr("value","<?php echo $appointments['appointment']; ?>");
				
				
		    //Attach date picker for date of dispensing
	        $("#dispensing_date").datepicker({
					yearRange : "-120:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
			$("#dispensing_date").datepicker();
            $("#dispensing_date").datepicker("setDate", new Date());
            
           
			
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
			 
			 //Dynamically change the list of drugs once a current regimen is selected
			$("#current_regimen").change(function() {
			   var regimen = $("#current_regimen option:selected").attr("value");
			   var last_regimen = $("#last_regimen").attr("value");
			   if(last_regimen != 0) {
						if(regimen != last_regimen) {
							$("#regimen_change_reason_container").show();
						} else {
							$("#regimen_change_reason_container").hide();
							$("#regimen_change_reason").val("");
						}
				}else{
					if(regimen != last_regimen) {
							$("#regimen_change_reason_container").show();
						} else {
							$("#regimen_change_reason_container").hide();
							$("#regimen_change_reason").val("");
					 }
				}	
			});
			
		 function retrieveAppointedPatients(){
          	$("#scheduled_patients").html("");
			$('#scheduled_patients').hide();
                //Function to Check Patient Number exists
			    var base_url="<?php echo base_url();?>";
				var appointment=$("#next_appointment_date").val();
				var link=base_url+"patient_management/getAppointments/"+appointment;
				$.ajax({
				    url: link,
				    type: 'POST',
				    dataType: 'json',
				    success: function(data) {		        
				       var all_appointments_link = "<a class='link' target='_blank' href='reports/patients_scheduled_to_visit.html#?date=" + appointment + "' style='font-weight:bold;color:red;'>View appointments</a>";
					   var html = "Patients Scheduled on Date: <b>" + data[0].total_appointments + "</b>. " + all_appointments_link;
					   var new_date = new Date(appointment);
					   var formatted_date_day = new_date.getDay();
					   var days_of_week = ["Sunday", "Monday", "Tuseday", "Wednesday", "Thursday", "Friday", "Saturday"];
					      if(formatted_date_day == 6 || formatted_date_day == 0) {
						     alert("It will be on " + days_of_week[formatted_date_day] + " During the Weekend");
						   if(data[0].total_appointments  > data[0].weekend_max ) {
							 alert("Maximum Appointments for Weekend Reached");
						   }
					      } else {
						if(data[0].total_appointments  > data[0].weekday_max ) {
							alert("Maximum Appointments for Weekday Reached");
						}

					}

					$("#scheduled_patients").append(html);
					$('#scheduled_patients').show();
				   }
				});
           }
           
       });
               //Function to validate required fields
		    function processData(form) {
		          var form_selector = "#" + form;
		          var validated = $(form_selector).validationEngine('validate');
		            if(!validated) {
	                   return false;
		            }else{
		            	return true;
		            }
		     }

		</script>

	</head>
	<body>
		<div class="full-content" style="background: #f9f">

			<h3>Dispense Drugs</h3>

			<form id="dispense_form" class="dispense_form" method="post"  action="<?php echo base_url().'dispensement_management/save';?>" onsubmit="return processData('dispense_form')" >
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
								<input readonly="" id="patient_details" name="patient" class="validate[required]"/>
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
									<option value="">--Select One--</option>
									<?php 
									foreach($purposes as $purpose){
										echo "<option value='".$purpose['id']."'>".$purpose['Name']."</option>";
									}
									?>
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

						<span id="scheduled_patients"  style="display:none;">
							
						</span>
						
						<div class="max-row">
							<div class="mid-row">
								<label id="scheduled_patients" class="message information close" style="display:none"></label><label>Last Regimen Dispensed</label>
								<input type="text"name="last_regimen_disp" value="0" id="last_regimen_disp" readonly="">
								<input type="hidden" name="last_regimen" regimen_id="0" id="last_regimen" value="0">
							</div>

							<div class="mid-row">
								<label>Current Regimen</label>
								<select type="text"name="current_regimen" id="current_regimen"  class="validate[required]">
									<option value="">-Select One--</option>
										<?php 
									       foreach($regimens as $regimen){
										     echo "<option value='".$regimen['id']."'>".$regimen['Regimen_Code']." | ".$regimen['Regimen_Desc']."</option>";
									       }
									     ?>
								</select>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<div style="display:none" id="regimen_change_reason_container">
									<label>Regimen Change Reason</label>
									<select type="text"name="regimen_change_reason" id="regimen_change_reason">
										<option value="">--Select One--</option>
										 <?php
										   foreach($regimen_changes as $changes){
										   	echo "<option value='".$changes['id']."'>".$changes['Name']."</option>";
										   }
										  ?>
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
									<option value="">-Select One--</option>
										<?php 
									       foreach($non_adherence_reasons as $reasons){
										     echo "<option value='".$reasons['id']."'>".$reasons['Name']."</option>";
									       }
									     ?>
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
                        <div class="max-row">
                        <div class="mid-row">
						<table class="data-table" id="last_visit_data">
							<thead>
							<th>Drug Dispensed</th>
							<th>Quantity Dispensed</th>
							</thead>
							<tbody>
								<?php 
								foreach(@$visits as $visit){
									echo "<tr><td>".$visit['drug']."</td><td>".$visit['quantity']."</td></tr>";
								}
								?>
							</tbody>
						</table>
						</div>
						</div>
					</fieldset>
				</div>

				<div class="content-rowy">
					<table border="0" class="data-table" id="drugs_table" style="">
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
					<th style="">Action</th>
					</tr>
					<tr drug_row="0">
					<td><select name="drug" class="drug"  style=" "></select></td>
					<td>
					<input type="text" name="unit" class="unit small_text" style="" />
					</td>
					<td><select name="batch" class="batch" style=""></select></td>
					<td>
					<input type="text" name="expiry" name="expiry" class="expiry" id="expiry_date"  size="15"/>
					</td>
					<td>
					<input list="dose" name="dose" style="" class="dose small_text icondose">
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
					<select name="indication" class="indication" style="">
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
					<input type="button" class="add button" value="+" style=""/>
					<input type="button" class="remove button" value="-" style=""/>
					</td>
					</tr>
					</table>
				
				</div>
				<div class="btn-group">
					<input type="reset" class="btn" id="reset" value="Reset Fields" />
					<input form="dispense_form" class="btn" id="submit" type="submit" value="Dispense Drugs"/>
				</div>
			</form>

		</div>

	</body>
</html>