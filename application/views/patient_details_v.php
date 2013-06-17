<div class="full-content" style="background:#9CF">
	<h3>Patient ART Card
	<div style="float:right;margin:5px 40px 0 0;">
		(Fields Marked with <b><span class='astericks'>*</span></b> Asterisks are required)
	</div></h3>

	<form id="edit_patient_form" method="post"  action="<?php echo base_url() . 'patient_management/save'; ?>" onsubmit="return processData('add_patient_form')" >
		<div class="column" id="columnOne">
			<fieldset>
				<legend>
					Patient Information &amp; Demographics
				</legend>
				<div class="max-row">
					<div class="mid-row">
						<label> Medical Record No.</label>
						<input type="text" name="medical_record_number" id="medical_record_number" value="">
					</div>
					<div class="mid-row">
						<label> <span class='astericks'>*</span>Patient Number CCC </label>
						<input type="text"name="patient_number" id="patient_number" class="validate[required]">
					</div>
				</div>
				<div class="max-row">
					<label><span class='astericks'>*</span>Last Name</label>
					<input  type="text"name="last_name" id="last_name" class="validate[required]">
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label><span class='astericks'>*</span>First Name</label>
						<input type="text"name="first_name" id="first_name" class="validate[required]">
					</div>

					<div class="mid-row">
						<label>Other Name</label>
						<input type="text"name="other_name" id="other_name">
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label><span class='astericks'>*</span>Date of Birth</label>
						<input type="text"name="dob" id="dob" class="validate[required]">
					</div>
					<div class="mid-row">
						<label> Place of Birth </label>
						<select name="pob" id="pob">
							<option value=" ">--Select--</option>
							<?php
							foreach ($districts as $district) {
								echo "<option value='" . $district['id'] . "'>" . $district['Name'] . "</option>";
							}
							?>
						</select>
					</div>
				</div>

				<div class="max-row">
					<div class="mid-row">
						<label><span class='astericks'>*</span>Gender</label>
						<select name="gender" id="gender" class="validate[required]">
							<option value=" ">--Select--</option>
							<?php
							foreach ($genders as $gender) {
								echo "<option value='" . $gender['id'] . "'>" . $gender['name'] . "</option>";
							}
							?>
						</select>
					</div>
					<div id="pregnant_view" class="mid-row" style="display:none;">
						<label id="pregnant_container"> Pregnant?</label>
						<select name="pregnant" id="pregnant">
							<option value="0">No</option><option value="1">Yes</option>
						</select>
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label >Start Age(Years)</label>
						<input type="text" id="start_age" disabled="disabled"/>
					</div>
					<div class="mid-row">
						<label >Current Age(Years)</label>
						<input type="text" id="age" disabled="disabled"/>
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label >Start Weight (KG)</label>
						<input type="text"name="start_weight" id="start_weight">
					</div>
					<div class="mid-row">
						<label>Current Weight (KG) </label>
						<input type="text"name="current_weight" id="current_weight">
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label > Start Height (CM)</label>
						<input type="text"name="start_height" id="start_height" onblur="getStartMSQ()">
					</div>
					<div class="mid-row">
						<label > Current Height (CM)</label>
						<input  type="text"name="current_height" id="current_height" onblur="getMSQ()">
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label > Start Body Surface Area (MSQ)</label>
						<input type="text" name="start_bsa" id="start_bsa" value="" >
					</div>
					<div class="mid-row">
						<label > Current Body Surface Area (MSQ)</label>
						<input type="text" name="current_bsa" id="current_bsa" value="" >
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">

					</div>
					<div class="mid-row"></div>
				</div>
				<div class="max-row">
					<div class="mid-row">

					</div>
					<div class="mid-row"></div>
				</div>

				<div class="max-row">
					<label> Patient's Physical Contact(s)</label>
					<textarea name="physical" id="physical" value=""></textarea>
				</div>
				<div class="max-row">
					<label> Patient's Alternate Contact(s)</label>
					<input type="text" name="alternate" id="alternate" value="">
				</div>

		</div>

		<div class="column" id="colmnTwo">
			<fieldset>
				<legend>
					Program History
				</legend>
				<div class="max-row">
					<label  id="tstatus"> Partner Status</label>
					<select name="partner_status" id="partner_status" >
						<option value="0" selected="selected">No Partner</option>
						<option value="1" > Concordant</option>
						<option value="2" > Discordant</option>
					</select>

				</div>
				<div class="max-row">
					<div class="mid-row">
						<label id="dcs" >Disclosure</label>
						<input  type="radio"  name="disclosure" value="1">
						Yes
						<input  type="radio"  name="disclosure" value="0">
						No
					</div>
				</div>
				<div class="max-row">
					<label>Family Planning Method</label>
					<select name="family_planning" id="family_planning" multiple="multiple"  >
						<?php
						foreach ($family_planning as $fplan) {
							echo "<option value='" . $fplan['indicator'] . "'>" . $fplan['name'] . "</option>";
						}
						?>
					</select>

				</div>
				<div class="max-row">
					<label>Does Patient have other Chronic illnesses</label>
					<select name="other_illnesses" id="other_illnesses"  multiple="multiple" >
						<?php
						foreach ($other_illnesses as $other_illness) {
							echo "<option value='" . $other_illness['indicator'] . "'>" . $other_illness['name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="max-row">
					<label>If <b>Other Illnesses</b>
						<br/>
						Click Here
						<input type="checkbox" name="other_other" id="other_other" value="">
						<br/>
						List Them Below (Use Commas to separate) </label>
					<textarea  name="other_chronic" id="other_chronic"></textarea>
				</div>
				<div class="max-row">
					<label> List Other Drugs Patient is Taking </label>
					<label>Yes
						<input type="checkbox" name="other_drugs_box" id="other_drugs_box" value="">
					</label>

					<label>List Them</label>
					<textarea name="other_drugs" id="other_drugs"></textarea>
				</div>
				<div class="max-row">
					<label>Does Patient have any Drugs Allergies/ADR</label>

					<label>Yes
						<input type="checkbox" name="other_allergies" id="other_allergies" value="">
					</label>

					<label>List Them</label>
					<textarea class="list_area" name="other_allergies_listing" id="other_allergies_listing"></textarea>
				</div>
				<div class="max-row">
					<label>Does Patient belong to any support group?</label>
					<label>Yes
						<input type="checkbox" name="support_group" id="support_group" value="">
					</label>

					<div class="list">
						List Them
					</div>
					<textarea class="list_area" name="support_group_listing" id="support_group_listing"></textarea>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label > Does Patient
							<br/>
							Smoke?</label>
						<select name="smoke" id="smoke">
							<option value="0" selected="selected">No</option>
							<option value="1">Yes</option>
						</select>
					</div>
					<div class="mid-row">
						<label> Does Patient Drink Alcohol?</label>
						<select name="alcohol" id="alcohol">
							<option value="0" selected="selected">No</option>
							<option value="1">Yes</option>
						</select>
					</div>
				</div>

				<div class="max-row">
					<div class="mid-row">
						<label> Does Patient Have TB?</label>
						<select name="tb" id="tb" class="tb">
							<option value="0" selected="selected">No</option>
							<option value="1">Yes</option>
						</select>
					</div>
					<div class="mid-row" id="tbphase_view" style="display:none;">
						<label id="tbstats"> TB Phase</label>
						<select name="tbphase" id="tbphase" class="tbphase">
							<option value="0" selected="selected">--Select One--</option>
							<option value="1">Intensive</option>
							<option value="2">Continuation</option>
							<option value="3">Completed</option>
						</select>
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row" id="fromphase_view" style="display:none;">
						<label id="ttphase">Start of Phase</label>
						<input type="text" name="fromphase" id="fromphase" value=""/>
					</div>
					<div class="mid-row" id="tophase_view" style="display:none;">
						<label id="endp">End of Phase</label>
						<input type="text" name="tophase" id="tophase" value=""/>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="column" id="columnThree">
			<fieldset>
				<legend>
					Patient Information
				</legend>
				<div class="max-row">
					<label><span class='astericks'>*</span>Date Patient Enrolled</label>
					<input type="text" name="enrolled" id="enrolled" value="" class="validate[required]">
				</div>
				<div class="max-row">
					<label><span class='astericks'>*</span>Current Status</label>
					<select name="current_status" id="current_status" class="validate[required]">
						<option value="">--Select--</option>
						<?php
						foreach ($statuses as $status) {
							echo "<option value='" . $status['id'] . "'>" . $status['Name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="max-row">
					<label class="status_started" ><span class='astericks'>*</span>Date of Status Change</label>
					<input type="text" name="status_started" id="status_started" value="" class="validate[required]">
				</div>
				<div class="max-row">
					<label><span class='astericks'>*</span>Source of Patient</label>
					<select name="source" id="source" class="validate[required]">
						<option value="">--Select--</option>
						<?php
						foreach ($sources as $source) {
							echo "<option value='" . $source['id'] . "'>" . $source['Name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div id="patient_source_listing" class="max-row" style="display:none;">
					<label> Transfer From</label>
					<select name="transfer_source" id="transfer_source" >
						<option value="">--Select--</option>
						<?php
						foreach ($facilities as $facility) {
							echo "<option value='" . $facility['facilitycode'] . "'>" . $facility['name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="max-row">
					<label><span class='astericks'>*</span>Patient Supported by</label>
					<select name="support" id="support" class="validate[required]">
						<option value="">--Select--</option>
						<?php
						foreach ($supporters as $supporter) {
							echo "<option value='" . $supporter['id'] . "'>" . $supporter['Name'] . "</option>";
						}
						?>
					</select>
				</div>
				<div class="max-row">
					<label><span class='astericks'>*</span>Type of Service</label>
					<select name="service" id="service" class="validate[required]">
						<option value="">--Select--</option>
						<?php
						foreach ($service_types as $service_type) {
							echo "<option value='" . $service_type['id'] . "'>" . $service_type['Name'] . "</option>";
						}
						?>
					</select> </label>
					</select>
				</div>
				<div class="max-row">
					<label id="start_of_regimen"><span class='astericks'>*</span>Start Regimen </label>
					<select name="regimen" id="regimen" class="validate[required] start_regimen" >
						<option value=" ">--Select One--</option>

					</select>

				</div>
				<div class="max-row">
					<label style="color:red;font-weight:bold;">Current Regimen</label>
					<select type="text"name="current_regimen" id="current_regimen" class="validate[required]">
						<option></option>
					</select>
				</div>
			</fieldset>
			<div id="dispensing_history" style="display:none;">
				<fieldset>
					<legend>
						Dispensing History
					</legend>
					<table border="0" class="data-table sortable" id="drugs_table" style="width:90%;">
						<thead>
							<tr id="table-header">
								<th>Date</th>
								<th>Purpose of Visit</th>
								<th>Unit</th>
								<th>Dose</th>
								<th>Duration</th>
								<th>Indication</th>
								<th>Action</th>
								<th>Drug</th>
								<th>Qty</th>
								<th>Weight</th>
								<th>Height</th>
								<th>Last Regimen</th>
								<th>Regimen</th>
								<th>BatchNo</th>
								<th>Pill Count</th>
								<th>Adherence</th>
								<th>Operator</th>
								<th>Reasons For Change</th>
							</tr>
						</thead>
						<tbody>
							<tr></tr>
						</tbody>
					</table>
				</fieldset>
			</div>
		</div>
		<div class="button-bar">
			<input type="button" class="btn" id="patient_info" value="Patient Info Report" />
			<input type="button" class="btn" id="edit_patient" value="Edit Patient Record" />
			<input type="button" class="btn" id="dispense" value="Dispense to Patient" />

		</div>

	</form>
</div>