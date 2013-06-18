<div class="full-content" style="background:#FFCC99">
	<h3>Dispensing History Editing</h3>
	<form id="edit_dispense_form" method="post" >
		<input id="original_dispensing_date" name="original_dispensing_date" type="hidden"/>
		<input id="original_drug" name="original_drug" type="hidden"/>
		<input id="delete_trigger" name="delete_trigger" type="hidden"/>
		<div class="column-3">
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
						<input type="text"name="dispensing_date" id="dispensing_date" class="validate[required]"/>
					</div>
					<div class="mid-row">
						<label>Purpose of Visit</label>
						<select type="text"name="purpose" id="purpose" class="validate[required]"/>
						<option></option></select>
					</div>
				</div>
				<div class="max-row">
					<div class="mid-row">
						<label>Current Height(cm)</label>
						<input type="text"name="height" id="height" class="validate[required]"/>
					</div>
					<div class="mid-row">
						<label>Current Weight(kg)</label>
						<input type="text"name="weight" id="weight" class="validate[required]"/>
					</div>
					<div class="max-row">
						<div class="mid-row">
							<label id="scheduled_patients" class="message information close" style="display:none"></label>
							<label>Last Regimen Dispensed</label>
							<select type="text"name="last_regimen" id="last_regimen" class="validate[required]"/>
							<option></option></select>
						</div><!---
						<input type="text"name="last_regimen_disp" regimen_id="0" id="last_regimen_disp" readonly="">
						<input type="hidden" name="last_regimen" regimen_id="0" id="last_regimen">
						-->
						<div class="mid-row">
							<label>Current Regimen</label><td colspan='6'>
							<select type="text"name="current_regimen" id="current_regimen"  class="validate[required]"/>
							<option></option></select>
						</div>
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
						<div class="mid-row">
							<label>Appointment <br/>Adherence (%)</label>
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
		<div id="drugs_section" style="margin: 0 auto;">
			<!--table border="0" class="data-table" id="drugs_table">
			<th class="subsection-title" colspan="14">Select Drugs</th>
			<tr>
			<th>Drug</th>
			<th>Unit</th>

			<th>Batch No.</th>
			<th>Expiry Date</th>
			<th>Dose</th>
			<th>Duration</th>
			<th>Qty. disp</th>
			<th>Stock on Hand</th>
			<th>Brand Name</th>
			<th>Indication</th>
			<th>Pill Count</th>
			<th>Comment</th>
			</tr>
			<tr drug_row="0">
			<td><select name="drug" class="drug" id="drug" style="max-width: 200px; font-size: 11px"></select></td>
			<td>
			<input type="text" name="unit" id="unit" class="unit small_text" />
			</td>

			<input type="hidden" name="batch_select" id="batch_select" class="batch_select small_text"  disabled="disabled"/>
			<input type="hidden" name="original_drug_no" id="original_drug_no" class="original_drug_no small_text"  disabled="disabled"/>
			<input type="hidden" name="original_dose_no" id="original_dose_no" class="original_dose_no small_text"  disabled="disabled"/>
			<input type="hidden" name="original_duration_no" id="original_duration_no" class="original_duration_no small_text"  disabled="disabled"/>
			<input type="hidden" name="original_qty_no" id="original_qty_no" class="original_qty_no small_text"  disabled="disabled"/>

			<td><select id="batch" name="batch" class="batch small_text" style="width:400px"></select></td>
			<td>
			<input type="text" id="expiry" name="expiry" class="expiry small_text" />
			</td>
			<td>
			<input list="dose" name="dose" style="max-width:70px;height:30px;" class="dose small_text icondose">
			<datalist id="dose" ></datalist></td>
			<td>
			<input type="text" id="duration" name="duration" class="duration small_text" />
			</td>
			<td>
			<input type="text" id="qty_disp" name="qty_disp" class="qty_disp small_text" />
			</td>
			<td>
			<input type="text" id="soh" name="soh" class="soh small_text" disabled="disabled"/>
			</td>
			<td><select name="brand" id="brand" class="brand small_text"></select></td>
			<td>
			<select name="indication" id="indication" class="indication" style="max-width: 70px;">
			<option value="0">None</option>
			</select></td>
			<td>
			<input type="text" name="pill_count" id="pill_count" class="pill_count small_text" />
			</td>
			<td>
			<input type="text" name="comment" id="comment" class="comment small_text" />
			</td>
			</tr>
			</table-->
		</div>
		<input type="hidden" name="dispensing_id" id="dispensing_id" />
		<input type="hidden" name="batch_hidden" id="batch_hidden" />
		<input type="hidden" name="qty_hidden" id="qty_hidden" />
		<div id="submit_section">
			<div class="btn-group">
				<input form="edit_dispense_form" class="btn" id="submit" value="Save & go Back" />
				<input type="button" class="btn btn-danger" id="delete" value="Delete Record"/>
			</div>
		</div>
	</form>
</div>