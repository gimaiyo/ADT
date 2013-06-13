<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript">
						$(document).ready(function(){
			var base_url="<?php echo base_url(); ?>
				";
				$("#patient_number").change(function(){
				var patient_no=$("#patient_number").val();
				var link=base_url+"patient_management/checkpatient_no/"+patient_no;
				$.ajax({
				url: link,
				type: 'POST',
				success: function(data) {
				if(data==1){
				alert("Patient Number Matches an existing record");
				}
				}
				});
				});
		</script>

	</head>

	<body>
		<div class="center-content">
			<h3>Patient Registration
			<div style="float:right;margin:5px 40px 0 0;">
				(Fields Marked with <b>*</b> Asterisks are required)
			</div></h3>

			<form id="add_patient_form" method="post">
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
								<label> *Patient Number CCC </label>
								<input type="text"name="patient_number" id="patient_number" class="validate[required]">
							</div>
						</div>
						<div class="max-row">
							<label> *Last Name</label>
							<input  type="text"name="last_name" id="last_name" class="validate[required]">
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>*First Name</label>
								<input type="text"name="first_name" id="first_name" class="validate[required]">
							</div>

							<div class="mid-row">
								<label>Other Name</label>
								<input type="text"name="other_name" id="other_name">
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label> *Date of Birth</label>
								<input type="text"name="dob" id="dob" class="validate[required]">
							</div>
							<div class="mid-row">
								<label> Place of Birth </label>
								<select name="pob" id="pob">
									<option value="None">--Select--</option>
								</select>
							</div>
						</div>
						<div class="max-row">
							<label> *Age(Years)</label>
							<input type="text" id="age_in_years" name="age_in_years" disabled="disabled"/>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>Gender</label>
								<select name="gender" id="gender">
									<option value=""></option>
									<option value="1">Male</option><option value="2">Female</option>
								</select>
							</div>
							<div class="mid-row">
								<label id="pregnant_container"> Pregnant?</label>
								<select name="pregnant" id="pregnant">
									<option value="0">No</option><option value="1">Yes</option>
								</select>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label>*Weight (KG)</label>
								<input type="text"name="weight" id="weight" class="validate[required]" onblur="getMSQ()">
							</div>
							<div class="mid-row">
								<label > Height (CM)</label>
								<input  type="text"name="height" id="height" class="validate[required]" onblur="getMSQ()">
							</div>
						</div>
						<div class="max-row">
							<label> Body Surface Area (MSQ)</label>
							<input type="text" name="surface_area" id="surface_area" value="" readonly="readonly">

						</div>
						<div class="max-row">
							<div class="mid-row">
								<label> Patient's Phone Contact(s)</label>
								<input  type="text"  name="phone" id="phone" value="">
							</div>
							<div class="mid-row">
								<label > Receive SMS Reminders</label>
								<input  type="radio"  name="sms_consent" value="1">
								Yes
								<input  type="radio"  name="sms_consent" value="0">
								No
							</div>

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
							<select name="pstatus" id="pstatus" style="width:300px">
								<option value="0" selected="selected">-----Select One-----</option>
								<option value="1" > Concordant</option>
								<option value="2" > Discordant</option>
							</select>

						</div>
						<div class="max-row">
							<div class="mid-row">
								<label id="dcs" >Disclosure</label>
								<input  type="radio"  name="disco" id="disco" value="1">
								Yes
								<input  type="radio"  name="disco" id="disco1" value="0">
								No
							</div>
						</div>
						<div class="max-row">
							<label>Family Planning Method</label>
							<select name="plan_listing" id="plan_listing" multiple="multiple" class="plan_listing" >
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

						</div>
						<div class="max-row">
							<label>Does Patient have other Chronic illnesses</label>
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
						</div>
						<div class="max-row">
							<label>If <b>Other</b> List Them(Use Commas to separate)</label>
							<textarea  name="other_chronic" id="other_chronic"></textarea>
						</div>
						<div class="max-row">
							<label> List Other Drugs Patient is Taking </label>
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
							<label > Does Patient Smoke?</label>
							<select name="smoke" id="smoke">
								<option value=""></option>
								<option value="0">No</option><option value="1">Yes</option>
							</select>
						</div>
						<div class="max-row">
							<label> Does Patient Drink Alcohol?</label>
							<select name="alcohol" id="alcohol">
								<option value=""></option>
								<option value="0">No</option><option value="1">Yes</option>
							</select>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label> Does Patient Have TB?</label>
								<select name="tb" id="tb" class="tb">
									<option value=""></option>
									<option value="0">No</option><option value="1">Yes</option>
								</select>
							</div>
							<div class="mid-row">
								<label id="tbstats"> TB Phase</label>
								<select name="tbphase" id="tbphase">
									<option value="0" selected="selected"></option><option value="1">Intensive</option><option value="2">Continuation</option><option value="3">Completed</option>
								</select>
							</div>
						</div>
						<div class="max-row">
							<div class="mid-row">
								<label id="ttphase">Start of Phase</label>
								<input type="text" name="fromphase" id="fromphase" value=""/>
							</div>
							<div class="mid-row">
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
							<label> *Date Patient Enrolled</label>
							<input type="text" name="enrolled" id="enrolled" value="" class="validate[required]">
						</div>
						<div class="max-row">
							<label> *Current Status</label>
							<select name="current_status" id="current_status"></select>
						</div>
						<div class="max-row">
							<label class="status_started" style="">*Date of Status Change</label>
							<input type="text" name="status_started" id="status_started" value="">
						</div>
						<div class="max-row">
							<label> *Source of Patient</label>
							<select name="source" id="source" class="validate[required]">
								<option></option>
							</select>
						</div>
						<div class="max-row">
							<label style="display:none;" id="patient_source_listing"> Transfer From</label>
							<select style="display:none;" name="patient_source" id="patient_source"></select>
						</div>
						<div class="max-row">
							<label> *Patient Supported by</label>
							<select name="support" id="support" class="validate[required]">
								<option></option>
							</select>
						</div>
						<div class="max-row">
							<label> *Type of Service</label>
							<select name="service" id="service" class="validate[required]">
								<option></option>
							</select> </label>
							</select>
						</div>
						<div class="max-row">
							<label id="start_of_regimen"> *Start Regimen </label>
							<select name="regimen" id="regimen" class="validate[required]"></select>

						</div>
						<div class="max-row">
							<label id="date_service_started"> *Start Regimen Date</label>
							<input type="text" name="service_started" id="service_started" value="">
						</div>
					</fieldset>
				</div>
				<div class="button-bar">
					<div class="btn-group">
						<button class="btn" type="submit">Submit</button>
						<button class="btn">Dispense</button>
						<button class="btn btn-danger">Reset</button>
					</div>
					
				</div>

			</form>
		</div>
	</body>
</html>