<div class="max-row">
	<label>Patient Number CCC</label>

	<input readonly="" id="patient" name="patient" class="validate[required]"/>
</div>

<div class="max-row">
	<label>Patient Name</label>
	<span id="patient_details"></span>
</div>

<div class="max-row">
	<label>Dispensing Date</label>

	<input type="text"name="dispensing_date" id="dispensing_date" class="validate[required]"/>
</div>
<div class="max-row">
	<label>Purpose of Visit</label>
	<select type="text"name="purpose" id="purpose" class="validate[required]"/>

	<option></option></select>
</div>
<div class="max-row">
	<label>Current Height(cm)</label>
	<input type="text"name="height" id="height" class="validate[required]"/>
</div>
<div class="max-row">
	<label>Current Weight(kg)</label>
	<input type="text"name="weight" id="weight" class="validate[required]"/>
</div>
<div class="max-row">
	<label id="scheduled_patients" class="message information close" style="display:none"></label>
	<label>Last Regimen Dispensed</label>
	<select type="text"name="last_regimen" id="last_regimen" class="validate[required]"/>
	<option></option></select>
</div><!---
<input type="text"name="last_regimen_disp" regimen_id="0" id="last_regimen_disp" readonly="">
<input type="hidden" name="last_regimen" regimen_id="0" id="last_regimen">
-->
<div class="max-row">
	<label>Current Regimen</label><td colspan='6'>
	<select type="text"name="current_regimen" id="current_regimen"  class="validate[required]"/>
	<option></option></select>
</div>
<div class="max-row">
	<div style="display:none" id="regimen_change_reason_container">

		<label>Regimen Change Reason</label>
		<select type="text"name="regimen_change_reason" id="regimen_change_reason" >
			<option></option>
		</select>
	</div>
</div>
<div class="max-row">
	<label>Appointment Adherence (%)</label>
	<input type="text"name="adherence" id="adherence">
</div>
<div class="max-row">
	<label> Poor/Fair Adherence Reasons </label>
	<select type="text"name="non_adherence_reasons" id="non_adherence_reasons" >
		<option></option>
	</select>
</div>
