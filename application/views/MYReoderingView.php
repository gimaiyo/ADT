<div class="center-content">
	<h3>Patient Registration
	<div style="float:right;margin:5px 40px 0 0;">
		(Fields Marked with <b>*</b> Asterisks are required)
	</div></h3>

	<form id="add_patient_form" method="post">
		<div class="column">
			<fieldset>
				<legend>
					Patient Information &amp; Demographics
				</legend>
				<div class="row">
					<label> Medical Record Number </label>
					<input type="text" name="medical_record_number" id="medical_record_number" value="">
				</div>
				<div class="row">
					<input type="text"name="patient_number" id="patient_number" class="validate[required]">
					<label> *Patient Number CCC </label>
				</div>
				<div class="row">
					<label> *Last Name</label>
					<input  type="text"name="last_name" id="last_name" class="validate[required]">
				</div>
				<div class="mid-row">
					<label>*First Name</label>
					<input style="width:140px;" type="text"name="first_name" id="first_name" class="validate[required]">
				</div>
				<div class="mid-row">
					<label>Other Name</label>
					<input type="text"name="other_name" id="other_name">
				</div>
				<div class="row">
					<label> *Date of Birth</label>
					<input type="text"name="dob" id="dob" class="validate[required]">
				</div>
				<div class="row">
					<label> Place of Birth </label>
					<select name="pob" id="pob" style="width:120px">
						<option value="None">--Select--</option>
					</select>
				</div>
				<div class="row">
					<label> *Age(Years)</label>
						<input type="text" id="age_in_years" name="age_in_years" style="width:80px;" disabled="disabled"/>
				</div>

				<br/>

				<br/>
				<div class="two_comlumns">

					</label>
				</div>

				<br/>
				<div class="two_comlumns">
					<br/>

				</div>
				<br/>
				<div class="two_comlumns">
				
				</div>
				<div class="two_comlumns">
					
					<label>Gender</label>
						<select name="gender" id="gender">
							<option value=""></option>
							<option value="1">Male</option><option value="2">Female</option>
						</select> 
					<br/>
					<label id="pregnant_container"> Pregnant?</label>
						<select name="pregnant" id="pregnant">
							<option value="0">No</option><option value="1">Yes</option>
						</select>
				</div>
				<p>
					<div class="two_comlumns">
						<label style="width:140px; float:left;"> <strong class="label" >*Weight (KG)
							<input style="width:140px;" type="text"name="weight" id="weight" class="validate[required]" onblur="getMSQ()">
						</label>
						<label > Height (CM)
							<input  type="text"name="height" id="height" class="validate[required]" onblur="getMSQ()">
						</label>
					</div>
					<label> Body Surface Area (MSQ)
						<input type="text" name="surface_area" id="surface_area" value="" readonly="readonly">
					</label>
					<div class="two_comlumns">
						<label style="width:140px; float:left;"> Patient's Phone Contact(s)
							<input  type="text"  name="phone" id="phone" value="">
						</label>
						<label > Receive SMS Reminders
							<input  type="radio"  name="sms_consent" value="1">
							Yes
							<input  type="radio"  name="sms_consent" value="0">
							No </label>
					</div>
					<label> Patient's Physical Contact(s) 						<textarea name="physical" id="physical" value=""></textarea> </label>
					<label> Patient's Alternate Contact(s)
						<input type="text" name="alternate" id="alternate" value="">
					</label>
			</fieldset>
		</div>
		<div class="column">
			<fieldset>
				<legend>
					Patient History
				</legend>
				<label  id="tstatus"> Partner Status</br>
					<select name="pstatus" id="pstatus" style="width:300px">
						<option value="0" selected="selected">-----Select One-----</option>
						<option value="1" > Concordant</option>
						<option value="2" > Discordant</option>
					</select> </label>
				<p>
					<label id="dcs" >Disclosure</br>
						<input  type="radio"  name="disco" id="disco" value="1">
						Yes
						<input  type="radio"  name="disco" id="disco1" value="0">
						No </label>
				<p>
					Family Planning Method
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
					Does Patient have other Chronic illnesses
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
				<label> List Other Drugs Patient is Taking 					<textarea name="other_drugs" id="other_drugs"></textarea> </label>
				<div class="three_columns">
					Does Patient have any Drugs Allergies/ADR
					Yes
					<input type="checkbox" name="other_allergies" id="other_allergies" value="">
					<div class="list">
						List Them
					</div>
					<textarea class="list_area" name="other_allergies_listing" id="other_allergies_listing"></textarea>
				</div>
				<div class="three_columns">
					Does Patient belong to any support group?
					Yes
					<input type="checkbox" name="support_group" id="support_group" value="">
					<div class="list">
						List Them
					</div>
					<textarea class="list_area" name="support_group_listing" id="support_group_listing"></textarea>
				</div>
				<div >
					<label > Does Patient Smoke?
						<select name="smoke" id="smoke">
							<option value=""></option>
							<option value="0">No</option><option value="1">Yes</option>
						</select> </label><label style="width:100px;float:right;"> Does Patient Drink Alcohol?
						<select name="alcohol" id="alcohol">
							<option value=""></option>
							<option value="0">No</option><option value="1">Yes</option>
						</select> </label>
				</div>
				<div >
					<label> Does Patient Have TB?
						<select name="tb" id="tb" class="tb">
							<option value=""></option>
							<option value="0">No</option><option value="1">Yes</option>
						</select> </label>
					<label id="tbstats" style="display:none;float:right;width:150px;"> TB Phase
						<select name="tbphase" id="tbphase">
							<option value="0" selected="selected"></option><option value="1">Intensive</option><option value="2">Continuation</option><option value="3">Completed</option>
						</select> </label>
				</div>
				<br/>
				<label id="ttphase"> Start of Phase
					<input type="text" name="fromphase" id="fromphase" value=""/>
				</label>
				&nbsp; <label id="endp"> End of Phase
					<input type="text" name="tophase" id="tophase" value=""/>
				</label>
			</fieldset>
		</div>
		<div class="column">
			<fieldset>
				<legend>
					Program Information
				</legend>
				<label> *Date Patient Enrolled
					<input type="text" name="enrolled" id="enrolled" value="" class="validate[required]">
				</label>
				<p>
					<label> *Current Status <select name="current_status" id="current_status"></select> </label>
				<p>
					<label class="status_started" style=""><strong class='label'>*Date of Status Change
						<input type="text" name="status_started" id="status_started" value="">
					</label>
				<p>
					<label> *Source of Patient
						<select name="source" id="source" class="validate[required]">
							<option></option>
						</select> </label>
				<p>
					<label style="display:none;" id="patient_source_listing"> Transfer From <select name="patient_source" id="patient_source"></select> </label>
				<p>
					<label> *Patient Supported by
						<select name="support" id="support" class="validate[required]">
							<option></option>
						</select> </label>
				<p>
					<label> *Type of Service
						<select name="service" id="service" class="validate[required]">
							<option></option>
						</select> </label>
				<p>
					<label id="start_of_regimen"> *Start Regimen <select name="regimen" id="regimen" style="width:300px" class="validate[required]"></select> </label>
				<p>
					<label id="date_service_started" style=""> *Start Regimen Date
						<input type="text" name="service_started" id="service_started" value="">
					</label>
			</fieldset>
		</div>
		<div id="submit_section">

			<input form="add_patient_form" class="submit-button" id="submit" value="Save" style="width:200px;"/>

			<input form="add_patient_form" class="submit-button" id="dispense" value="Save &amp Dispense" style="width:200px;"/>
			<input type="reset" class="submit-button" id="reset" value="Reset Page" style="width:200px;"/>
		</div>
	</form>

</div>