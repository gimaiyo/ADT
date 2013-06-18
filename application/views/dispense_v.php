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
				var first_name="<?php echo $result['first_name']; ?>";
				var other_name="<?php echo $result['other_name']; ?>";
				var last_name="<?php echo $result['last_name']; ?>";
				$("#patient_details").val(first_name+" "+other_name+" "+last_name);
				$("#height").val("<?php echo $result['height']; ?>")
				
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
            
            //Attach date picker for date of next appointment
	        $("#next_appointment_date").datepicker({
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
				
            });
		</script>

	</head>
	<body>
		<div class="full-content" style="background: #f9f">

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
						<div class="max-row">
							<div class="mid-row">
								<label id="scheduled_patients" class="message information close" style="display:none"></label><label>Last Regimen Dispensed</label>
								<input type="text"name="last_regimen_disp" regimen_id="0" id="last_regimen_disp" readonly="">
								<input type="hidden" name="last_regimen" regimen_id="0" id="last_regimen">
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
									<select type="text"name="regimen_change_reason" id="regimen_change_reason" s>
										
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