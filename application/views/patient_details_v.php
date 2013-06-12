
<style>
	#inner_wrapper{
		top:120px;
	}
	.main-content{
		margin:0 auto;	
	}
	.center-content{
		width:96%;
		background: #80f26d;
		padding-bottom:15%;
	}
	#sub_title{
		margin-bottom:15px;
		font-size:16px;
	}
	.input_text{
		width:180px;
	}
	.label{
		font-weight:400;
	}
</style>

<div class="main-content">
	<div class="center-content">
		<div id="sub_title">
			<a href="<?php  echo base_url().'patient_management ' ?>">Patients</a> <i class=" icon-chevron-right"></i>  <strong>Patient ART Card</strong>
			<hr size="1">
		</div>
		
		<div class="span4">
			<fieldset style="height:900px;">
				<legend>
					Patient Information &amp; Demographics
				</legend>
				<div style="height:3px"> </div>
				<label > <strong class="label">Medical Record No</strong>
					<input type="text" name="medical_record_number" id="medical_record_number" class="input input_text" value="">
				</label>
				<br/>
				<label > <strong class="label">*Patient No CCC</strong>
					<input type="text" name="patient_number" id="patient_number" class="input input_text" >
				</label>
				<br/>
				
				<div style="width:100%">
					<label style=" float:left; margin:0px;"> <strong class="label">Last Name</strong>
					<input type="text"name="last_name" id="last_name" class="validate[required] input_text">
					</label>
					<label style=" float:right;"> <strong class="label" >First Name</strong>
						<input  type="text"name="first_name" id="first_name" class="validate[required] input_text">
					</label>
					<br/>
				</div>
				
				<div style="clear: both">
					<label> <strong class="label">Other Name</strong>
						<input type="text"name="other_name" id="other_name" class="input_text">
					</label>
					<br/>
				</div>
				
				<div style="clear: both">
					<label style="float:left;"> <strong class="label" >*Date of Birth</strong>
						<input  type="text"name="dob" id="dob" class="validate[required] input_text">
					</label>
					<label style="float:right;"> <strong class="label">Place of Birth</strong> <!--<input style="width:140px" type="text"name="pob" id="pob">-->
						<select name="pob" id="pob" class="input_text">
							<option value="None">--Select--</option>
						</select> 
					</label>
					<br>
				</div>
				<div style="clear: both">
					<label style="float:left;"> <strong class="label" >*Gender</strong>
						<select name="gender" id="gender" class="input_text">
							<option value=""></option>
							<option value="1">Male</option><option value="2">Female</option>
						</select> 
					</label>
					<label style=" float:right; display: none" id="pregnant_container"> <strong class="label">Pregnant?</br> </strong>
					<select name="pregnant" id="pregnant">
						<option value="0">No</option><option value="1">Yes</option>
					</select> </label>
					<br>
				</div>
				<div style="clear: both">
					<label style="float:left;"> <strong class="label" >Start Age(Years)</strong>
						<input type="text" id="start_age" class="input_text"/>
					</label>
					<label style="float:right;"> <strong class="label">Current Age(Years)</strong>
						<input type="text" id="age" class="input_text" />
					</label>
					<br>
				</div>
				<div style="clear: both">
					<label style=" float:left;"> <strong class="label" >Start Weight (KG)</strong>
						<input  type="text"name="start_weight" id="start_weight" class="input_text">
					</label>
					<label style="float:right;"> <strong class="label">Current Weight (KG)</strong>
						<input  type="text"name="current_weight" id="current_weight" class="input_text"  onblur="getMSQ()">
					</label>
					<br>
				</div>
				<div style="clear: both">
					<label style="float:left;"> <strong class="label" >Start Height (CM)</strong>
						<input type="text"name="start_height" id="start_height" class="input_text">
					</label>
					<label style="float:right;"> <strong class="label">Current Height (CM)</strong>
						<input type="text"name="current_height" id="current_height" class="input_text" onblur="getMSQ()">
					</label>
					<br>
				</div>
				<div style="clear: both">
					<br>
					<span class="label">Body Surface Area</span>
					<label style="float:left;"> <strong class="label">Start (MSQ)</strong>
						<input type="text" name="start_bsa" id="start_bsa" value="" class="input_text" >
					</label>
					<label style=" float:right;"> <strong class="label">Current (MSQ)</strong>
						<input type="text" name="current_bsa" id="current_bsa" value="" class="input_text">
					</label>
					<br>
				</div>
				<div style="clear: both">
					<label style="float:left; width: 180px"> 
						<strong class="label"><input type="radio" name="adult_child" id="adult" /> Adult >= <input type="text" class="maturity_age" style="width:103px; " /></strong>
						
					</label>
					<label style="float:right; width: 180px;text-align: right"> <strong class="label"><input type="radio" name="adult_child" id="child" /> Child < <input type="text" class="maturity_age " style="width:107px;" /></strong> 
						
					</label>
					<br>
				</div>
				<div style="clear: both">
					<label style="float:left;"> <strong class="label">Patient's Phone Contact(s)</strong>
						<input  type="text"  name="phone" id="phone" value="" class="input_text">
					</label>
					<label style="float:right;"> <strong class="label">Receive SMS Reminders</strong>
					<input style="width:20px" type="radio"  name="sms_consent" id="yes_reminders" value="1">
					Yes
					<input style="width:20px" type="radio"  name="sms_consent" id="no_reminders" value="0">
					No 
					</label>
					<br>
				</div>
				<div style="clear: both">
					<label> <strong class="label">Patient's Physical Contact(s)</strong> 											
						<textarea  style="width: 100%" name="physical" id="physical" value=""></textarea> 
					</label>
					<label> <strong class="label">Patient's Alternate Contact(s)</strong>
						<textarea  style="width: 100%" name="alternate" id="alternate" value=""></textarea> 
					</label>
				</div>
				
				
			</fieldset>
		</div>
		
		<div class="span4">
			<fieldset style="height:900px;">
				<legend>
					Patient History
				</legend>
				<div style="clear: both">
					<label id="stats" style="float:left;"> <strong class="label">Partner Status</strong>
						<select name="partner_status" id="partner_status" class="input_text">
							<option value="0" selected="selected">-----Select One-----</option>
							<option value="1" > Concordant</option>
							<option value="2" > Discordant</option>
						</select> 
					</label>
					<label style="float:right;" id="dcs"><strong class="label">Disclosure</br> </strong>
						<input  type="radio"  name="disco" id="disco" value="1">
						Yes
						<input  type="radio"  name="disco" id="disco1" value="0">
						No 
					</label>
				</div>
				<div style="clear: both; height:20%; overflow-y: scroll">
					<label> <strong class="label"> Family Planning Method</strong>
						<table>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_1" class="family_planning" value="-1-" disabled="disabled"/>
								</td>
								<td><label for="family_planning_1">Condoms</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_2" class="family_planning" value="-2-" disabled="disabled"/>
								</td>
								<td ><label for="family_planning_2">Intrauterine Contraceptive Device(copper T)</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_3" class="family_planning" value="-3-" disabled="disabled"/>
								</td>
								<td><label for="family_planning_3">Implants(levonorgestrel 75mg)</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_4" class="family_planning" value="-4-" disabled="disabled"/>
								</td>
								<td><label for="family_planning_4">Emergency Contraceptive pills(levonorgestrel0.75 mg)</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_5" class="family_planning" value="-5-" disabled="disabled"/>
								</td>
								<td><label for="family_planning_5">Vasectomy</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_6" class="family_planning" value="-6-" disabled="disabled"/>
								</td>
								<td><label for="family_planning_6">Tubaligation</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_7" value="-7-" class="family_planning" disabled="disabled"/>
								</td>
								<td><label for="family_planning_7">Medroxyprogestrone 150 mg</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_8" value="-8-" class="family_planning" disabled="disabled"/>
								</td>
								<td><label for="family_planning_8"> Combined Oral Contraception(Levonorgestrel/ethinylestradiol 0.15/0.03mg)</label></td>
							</tr>
							<tr>
								<td>
								<input type="checkbox"name="family_planning" id="family_planning_9" value="-9-" class="family_planning" disabled="disabled"/>
								</td>
								<td><label for="family_planning_9"> levonorgestrel 0.03mg </label></td>
							</tr>
						</table> 
					</label>
				</div>
			</fieldset>
		</div>
		
		<div class="span4">
			
		</div>
	</div>
</div>