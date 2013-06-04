<!DOCTYPE html>
<html lang="en">
	<head>
		  <script type="text/javascript">
			$(document).ready(function(){
				var base_url="<?php echo base_url();?>";
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
				//Add Multiselect Library to Family planning methods
				$("#plan_listing").multiselect().multiselectfilter();
				
				
			});

		</script>
	
	</head>
      

	
	<body>
						<div class="short_title" >
							<h3 class="banner_text" style="float:left;">Patient Registration</h3>
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

											<input type="text" id="age_in_years" name="age_in_years" style="width:80px;" disabled="disabled"/>

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
							
							<div id="submit_section">

								<input form="add_patient_form" class="submit-button" id="submit" value="Save" style="width:200px;"/>

								<input form="add_patient_form" class="submit-button" id="dispense" value="Save &amp Dispense" style="width:200px;"/>
								<input type="reset" class="submit-button" id="reset" value="Reset Page" style="width:200px;"/>
							</div>
						</form>
			<div id="bottom_ribbon" style="top:20px; width:90%;">
				<div id="footer">
					<div id="footer_text">
						Government of Kenya &copy; <span id="year" ></span>. All Rights Reserved
					</div>
				</div>
			</div>
	</body>
</html>