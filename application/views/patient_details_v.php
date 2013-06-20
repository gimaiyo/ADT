<?php
if(isset($results)){
	foreach($results as $result){
		
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<script type="text/javascript">
		$(document).ready(function(){
			
			//Function to Check Patient Numner exists
			var base_url="<?php echo base_url();?>";
			var patient_identification="<?php echo @$result['patient_number_ccc'];?>";
			var record_id="<?php echo @$result['id'];?>";
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
	        
	        //Attach date picker for date of birth
	        $("#dob").datepicker({
					yearRange : "-120:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
			
			$("#medical_record_number").val("<?php echo $result['medical_record_number'];?>");
			$("#patient_number").val("<?php echo $result['patient_number_ccc'];?>");
			$("#last_name").val("<?php echo $result['last_name'];?>");
			$("#first_name").val("<?php echo $result['first_name'];?>");
			$("#other_name").val("<?php echo $result['other_name'];?>");
			$("#dob").val("<?php echo $result['dob'];?>");
			$("#pob").val("<?php echo $result['pob'];?>");
			$("#gender").val("<?php echo $result['gender'];?>");
			
			//Display Gender Tab
			if($("#gender").val()==2){
				$("#pregnant_view").show();
			}
			
			
			$('#start_age').val(getStartAge("<?php echo $result['dob'];?>","<?php echo $result['date_enrolled'];?>"));
			$('#age').val(getAge("<?php echo $result['dob'];?>"));
			$("#info_age").text($('#age').val());
	        $('#start_weight').val("<?php echo $result['start_weight'];?>");
	        $('#start_height').val("<?php echo $result['start_height'];?>");
	        $('#start_bsa').val("<?php echo $result['start_bsa'];?>");
	        $('#current_weight').val("<?php echo $result['weight'];?>");
	        $('#current_height').val("<?php echo $result['height'];?>");
	        $('#current_bsa').val("<?php echo $result['sa'];?>");
	        $('#phone').val("<?php echo $result['phone'];?>");
	        
	        //To Check Sms Consent
			var sms_consent="<?php echo $result['sms_consent'];?>";
			if(sms_consent==1){
			$("#sms_yes").attr("checked", "true");	
			}else if(sms_consent==0){
			$("#sms_no").attr("checked", "true");	
			}
	        
	        
	        $('#physical').val("<?php echo $result['physical'];?>");
	        $('#alternate').val("<?php echo $result['alternate'];?>");
	        
	        $('#partner_status').val("<?php echo $result['partner_status'];?>");
	        $('#disclosure').val("<?php echo $result['disclosure'];?>");
	        
			
			    //Select Family Planning Methods Selected
			    var family_planning="<?php echo $result['fplan'];?>";
			
				if(family_planning != null || family_planning != " ") {
					var fplan = family_planning.split(',');
					for(var i = 0; i < fplan.length; i++) {
                      $('input[name="family_planning"][type="checkbox"][value="' + fplan[i] + '"]').attr('checked', true);
					}
				}

			//To Disable Textareas
			$("textarea[name='other_chronic']").not(this).attr("disabled", "true");
			$("textarea[name='other_drugs']").not(this).attr("disabled", "true");
			$("textarea[name='other_allergies_listing']").not(this).attr("disabled", "true");
			$("textarea[name='support_group_listing']").not(this).attr("disabled", "true");
			
				
			//Select Other Illnesses Methods Selected
			var other_illnesses='<?php echo $result['other_illnesses'];?>';
			
			if (other_illnesses.indexOf(',') == -1) {
              other_illnesses=other_illnesses+",";
            }else{
              other_illnesses=other_illnesses;
            }
			var other_sickness="";
				if(other_illnesses != null || other_illnesses != " ") {
					var other_ill = other_illnesses.split(',');
					for(var i = 0; i < other_ill.length; i++) {
					   $('input[name="other_illnesses_listing"][type="checkbox"][value="' + other_ill[i] + '"]').attr('checked', true);
	                   if(other_ill[i].charAt(0) !="-"){
	                   	other_sickness+=","+other_ill[i];
	                   }
					}
					$("#other_chronic").val(other_sickness.substring(1));
				}

			if($("#other_chronic").val()){
				$("input[name='other_other']").not(this).attr("checked", "true");
			    $("textarea[name='other_chronic']").not(this).removeAttr("disabled");		
			}
			
				
			
					//Hide Unchecked checkboxes
					$(":checkbox:not(:checked)").attr("style", "display:none;");
					$(':checkbox:not(:checked)').each(function() {
						var unchecked = $(this).attr('id');
						$('label[for="' + unchecked + '"]').attr('style', 'display:none;');

					});
                    
                    //Hide Unchecked radiobuttons
					$(':radio:not(:checked)').each(function() {
						var unchecked = $(this).attr('id');
						$('label[for="' + unchecked + '"]').attr('style', 'display:none;');

					});			

            $("#other_drugs").val("<?php echo $result['other_drugs']?>");

            if($("#other_drugs").val()){
				$("input[name='other_drugs_box']").not(this).attr("checked", "true");
			    $("textarea[name='other_drugs']").not(this).removeAttr("disabled");		
			}
			
			//To Check Disclosure
			var disclosure="<?php echo $result['disclosure'];?>";
			if(disclosure==1){
			$("#disclosure_yes").attr("checked", "true");	
			}else if(disclosure==0){
			$("#disclosure_no").attr("checked", "true");	
			}
			
			$("#other_allergies_listing").val("<?php echo $result['adr']?>");

            if($("#other_allergies_listing").val()){
				$("input[name='other_allergies']").not(this).attr("checked", "true");
			    $("textarea[name='other_allergies_listing']").not(this).removeAttr("disabled");		
			}
			
			 $("#support_group_listing").val("<?php echo $result['support_group']?>");

            if($("#support_group_listing").val()){
				$("input[name='support_group']").not(this).attr("checked", "true");
			    $("textarea[name='support_group_listing']").not(this).removeAttr("disabled");		
			}
			
			$('#smoke').val("<?php echo $result['smoke'];?>");
			$('#alcohol').val("<?php echo $result['alcohol'];?>");	
			
			$("#tb").val("<?php echo $result['tb']; ?>");
			
			if($("#tb").val()==1){
				$("#tbphase_view").show();
				$("#tbphase").val("<?php echo $result['tbphase']; ?>");
				$("#fromphase").val("<?php echo $result['startphase']; ?>");
				$("#tophase").val("<?php echo $result['endphase']; ?>");
				
				 if($("#tbphase").val() ==3) {
		   	     	$("#fromphase_view").hide();
				    $("#tophase_view").show();
				 } 
				 else if($("#tbphase").val()==0){
				 	$("#fromphase_view").hide();
				 	$("#tophase_view").hide();
				 }else {
					$("#fromphase_view").show();
				    $("#tophase_view").show();
					$("#transfer_source").attr("value",'');
			     }
			}

				

			//Function to display tb phases
		   $(".tb").change(function() {
		   	    var tb = $(this).val();
		   	     if(tb == 1) {
				    $("#tbphase_view").show();
				 } 
				 else {
					$("#tbphase_view").hide();
					$("#fromphase_view").hide();
				 	$("#tophase_view").hide();
					$("#tbphase").attr("value",'0');
					$("#fromphase").attr("value",'');
		   	        $("#tophase").attr("value",'');
			     }
		   });
		   
		   //Function to display tbphase dates
		   $(".tbphase").change(function() {
		   	    var tbpase = $(this).val();
		   	    $("#fromphase").attr("value",'');
		   	    $("#tophase").attr("value",'');
		   	     if(tbpase ==3) {
		   	     	$("#fromphase_view").hide();
				    $("#tophase_view").show();
				 } 
				 else if(tbpase==0){
				 	$("#fromphase_view").hide();
				 	$("#tophase_view").hide();
				 }else {
					$("#fromphase_view").show();
				    $("#tophase_view").show();
					$("#transfer_source").attr("value",'');
			     }
		   });
		   
		   //Function to display datepicker for tb fromphase
		   $("#fromphase").datepicker({
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
			
			//Function to display datepicker for tb tophase
			$("#tophase").datepicker({
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
			
			//Function to enable textareas for other chronic illnesses
			$("#other_other").change(function() {
					var other = $(this).is(":checked");
					if(other){
						$("textarea[name='other_chronic']").not(this).removeAttr("disabled");
					}else{
						$("textarea[name='other_chronic']").not(this).attr("disabled", "true");
					}
			});
			
			//Function to enable textareas for other allergies
			$("#other_drugs_box").change(function() {
					var other = $(this).is(":checked");
					if(other){
						$("textarea[name='other_drugs']").not(this).removeAttr("disabled");
					}else{
						$("textarea[name='other_drugs']").not(this).attr("disabled", "true");
					}
			});
			
			//Function to enable textareas for other allergies
			$("#other_allergies").change(function() {
					var other = $(this).is(":checked");
					if(other){
						$("textarea[name='other_allergies_listing']").not(this).removeAttr("disabled");
					}else{
						$("textarea[name='other_allergies_listing']").not(this).attr("disabled", "true");
					}
			});
			
			//Function to enable textareas for support group
			$("#support_group").change(function() {
					var other = $(this).is(":checked");
					if(other){
						$("textarea[name='support_group_listing']").not(this).removeAttr("disabled");
					}else{
						$("textarea[name='support_group_listing']").not(this).attr("disabled", "true");
					}
			});
			
			//Attach date picker for date of enrollment
			$("#enrolled").datepicker({
					yearRange : "-30:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
			$("#enrolled").val("<?php echo $result['date_enrolled'] ?>");
			$("#current_status").val("<?php echo $result['current_status'] ?>");	
			$("#info_status").text($('#current_status option:selected').text());	
			$("#status_started").val("<?php echo $result['status_change_date'] ?>");
			$("#source").val("<?php echo $result['source'] ?>");
			$("#support").val("<?php echo $result['supported_by'] ?>");
			
			$("#service").val("<?php echo $result['service'] ?>");
			$("#service_started").val("<?php echo $result['start_regimen_date'] ?>");
			
			$("#regimen").val("<?php echo $result['start_regimen'] ?>");
			$("#current_regimen").val("<?php echo $result['current_regimen'] ?>");
			
			//Attach date picker for date of status change
			$("#status_started").datepicker({
					yearRange : "-30:+0",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					maxDate : "0D",
					changeYear : true
			});
			
			//Attach date picker for date of start regimen 
			$("#service_started").datepicker({
					yearRange : "-30:+0",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true,
					maxDate : "0D"
			});
			
			//Function to display transfer from list if patient source is(transfer in)
				$("#source").change(function() {
					var selected_value = $(this).val();
					if(selected_value == 3) {
						$("#patient_source_listing").show();
					} else {
						$("#patient_source_listing").hide();
						$("#transfer_source").attr("value",'');
					}
				});
				
		   //Function to display Regimens in this line
		   $("#service").change(function() {
		   	$("#regimen option").remove();
		   	  var service_line = $(this).val();
		   	  var link=base_url+"regimen_management/getRegimenLine/"+service_line;
				$.ajax({
				    url: link,
				    type: 'POST',
				    dataType: "json",
				    success: function(data) {	
				    	$("#regimen").append($("<option></option>").attr("value",'').text('--Select One--'));
				    	$.each(data, function(i, jsondata){
				    		$("#regimen").append($("<option></option>").attr("value",jsondata.id).text(jsondata.Regimen_Code+" | "+jsondata.Regimen_Desc));
				    	});
				    }
				});
		   });
		   
		   $("#next_appointment_date").datepicker({
	         yearRange : "-30:+0",
	         dateFormat : $.datepicker.ATOM,
	         changeMonth : true,
	         changeYear : true
	       });
	       
	       $("#next_appointment_date").val("<?php echo $result['nextappointment'];?>");
	       $("#prev_appointment_date").val("<?php echo $result['nextappointment'];?>");
	       
	       var appointment=$("#next_appointment_date").val();
	       var days = getDays(appointment);
	       if(days>=0){
	       $('#days_to_next').attr("value", days);
	       }
	       
	       $("#next_appointment_date").change(function(){
	       	    var appointment=$(this).val();
	       	    var days = getDays(appointment);
	       	    $('#days_to_next').attr("value", days);
	       });
	       
	       $("#days_to_next").change(function() {
	           var days = $("#days_to_next").attr("value");
	           var base_date = new Date();
	           var appointment_date = $("#next_appointment_date");
	           var today = new Date(base_date.getFullYear(), base_date.getMonth(), base_date.getDate());
	           var today_timestamp = today.getTime();
	           var appointment_timestamp = (1000 * 60 * 60 * 24 * days) + today_timestamp;
	           appointment_date.datepicker("setDate", new Date(appointment_timestamp));
	       });
	       
	       
	       //Function to display tranfer From	
	       if($("#source").val()==3){
	       	$("#patient_source_listing").show();
	       }       
	       $("#transfer_source").val("<?php echo $result['transfer_from']; ?>");
	       
	       //Function to check if female is pregnant
			$("#gender").change(function() {
					var selected_value = $(this).attr("value");
					//if female, display the prengancy selector
					if(selected_value == 2) {
						//If female show pregnant container
						$('#pregnant_view').slideDown('slow', function() {

						});
					} else {
						//If male do not show pregnant container
						$('#pregnant_view').slideUp('slow', function() {

						});
					}
			});
			
			//Disabling the form
			$("input,select,textarea").attr("disabled", 'disabled');
		    $(".btn").removeAttr("disabled");
		    $(".button").removeAttr("disabled");
		    
		    var current_status="<?php echo $result['current_status']; ?>";
			//Disable the dispense button
			if(current_status != 1) {
               alert("Cannot Dispense to Patient:Status Not Active");
			   $("#dispense").attr("disabled", "disabled");
			}
		    /*
		    //Fixed Table Header and footer for dispansing History
		    $('#history_table').fixedHeaderTable({ 
	           footer: false,
	           cloneHeadToFoot: false,
	           altClass: 'odd',
	           autoShow: true
             });
             */
                    $(".edit_dispensing").click(function() {
						var dispensing_id = $(this).attr("id");
						var url = base_url+"dispensement_management/edit/" + dispensing_id;
						window.location.href = url;
					});
					$("#edit_patient").click(function() {
						var url = base_url+"patient_management/edit/" + record_id;
						window.location.href = url;
					});
					$("#dispense").click(function() {
						var url = base_url+"dispensement_management/dispense/" + patient_identification;
						window.location.href = url;
					});
					$("#patient_info").click(function() {
						getDispensing();
						getRegimenChange();
						getAppointmentHistory();
						$("#patient_details").dialog("open");
					});
					
					$("#patient_details").dialog({
			           width : 1200,
			           modal : true,
			           height: 'auto',
			           autoOpen : false,
			           show: 'fold'
		             });
		             
		             function getDispensing(){
		             	 var patient_no=$("#patient_number").val();
		             	 var link=base_url+"patient_management/getSixMonthsDispensing/"+patient_no;
							$.ajax({
							    url: link,
							    type: 'POST',
							    success: function(data) {	
							    	$("#patient_pill_count>tbody").empty();
							    	$("#patient_pill_count").append(data);
							    	
							    }
							});
		             }
		             
		              function getRegimenChange(){
		             	 var patient_no=$("#patient_number").val();
		             	 var link=base_url+"patient_management/getRegimenChange/"+patient_no;
							$.ajax({
							    url: link,
							    type: 'POST',
							    success: function(data) {	
							    	$("#patient_regimen_history>tbody").empty();
							    	$("#patient_regimen_history").append(data);
							    	
							    }
							});
		             }
		             
		             function getAppointmentHistory(){
		             	 var patient_no=$("#patient_number").val();
		             	 var link=base_url+"patient_management/getAppointmentHistory/"+patient_no;
							$.ajax({
							    url: link,
							    type: 'POST',
							    success: function(data) {	
							    	$("#patient_appointment_history>tbody").empty();
							    	$("#patient_appointment_history").append(data);
							    	
							    }
							});
		             }
		             
		             
		             
				
		    });
			function getMSQ() {
			  var weight = $('#current_weight').attr('value');
			  var height = $('#current_height').attr('value');
			  var MSQ = Math.sqrt((parseInt(weight) * parseInt(height)) / 3600);
			  $('#current_bsa').attr('value', MSQ);
			}
		
			function getStartMSQ() {
			  var weight = $('#start_weight').attr('value');
			  var height = $('#start_height').attr('value');
			  var MSQ = Math.sqrt((parseInt(weight) * parseInt(height)) / 3600);
			  $('#start_bsa').attr('value', MSQ);
			}
		
			function getDays(dateString) {
		        var base_date = new Date();
		        var today = new Date(base_date.getFullYear(), base_date.getMonth(), base_date.getDate());
		        var today_timestamp = today.getTime();
		        var one_day = 1000 * 60 * 60 * 24;
		        var appointment_timestamp = new Date(Date.parse(dateString, "YYYY/MM/dd")).getTime();
		        var difference = appointment_timestamp - today_timestamp;
		        var days_difference = Math.ceil(difference / one_day);
		        return (days_difference-1);
		    }

		
		
			function getStartAge(dateString, baseDate) {
	            var today = new Date(baseDate);
	            var birthDate = new Date(dateString);
	            var age = today.getFullYear() - birthDate.getFullYear();
	            var m = today.getMonth() - birthDate.getMonth();
	                if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
	                 age--;
	                }
	                if(isNaN(age)) {
	                 return "N/A";
	                }
	                return age;
	        }
	        
	        function getAge(dateString) {
	           var today = new Date();
	           var birthDate = new Date(dateString);
	           var age = today.getFullYear() - birthDate.getFullYear();
	           var m = today.getMonth() - birthDate.getMonth();
	              if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
	                age--;
	              }
	              if(isNaN(age)) {
	                return "N/A";
	              }
	              return age;
	        }
	        
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
<div class="full-content" style="background:#9CF">
	<div>
		<?php if($this->session->userdata("msg_save_transaction")){
			?>
			
			<script type="text/javascript">
				setTimeout(function(){
					$(".info").fadeOut("2000");
				},6000)
			</script>
			<?php
			if($this->session->userdata("msg_save_transaction")=="success"){
				if($this->session->userdata("user_updated")){
						?>
						<p class="info"><span class="alert-success"><?php echo $this->session->userdata("user_updated") ?>'s details were successfully updated !</span></p>
						<?php
						$this->session->unset_userdata('user_updated');
					}
					else if($this->session->userdata("dispense_updated")){
						?>
						<p class="info"><span class="alert-success">The dispensing details were successfully updated !</span></p>
						<?php
						$this->session->unset_userdata('dispense_updated');
					}
					else if($this->session->userdata("dispense_deleted")){
						?>
						<p class="info"><span class="alert-error">The dispensing details were successfully deleted !</span></p>
						<?php
						$this->session->unset_userdata('dispense_deleted');
					} 
			}
			else{
				?>
				<p class="info"><span class="alert-error">Your data were not saved ! Try again or contact your system administrator.</span></p>
				<?php
			}
			$this->session->unset_userdata('msg_save_transaction');
		}
		?>
	</div>
	<div id="sub_title" >
		<a href="<?php  echo base_url().'patient_management ' ?>">Patient Listing </a> <i class=" icon-chevron-right"></i> <strong>ART Card</strong>
		<hr size="1">
	</div>
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
						<label > Start Body Surface Area <br/> (MSQ)</label>
						<input type="text" name="start_bsa" id="start_bsa" value="" >
					</div>
					<div class="mid-row">
						<label > Current Body Surface Area (MSQ)</label>
						<input type="text" name="current_bsa" id="current_bsa" value="" >
					</div>
				</div>
				<div class="max-row">
				<div class="mid-row">
				<label> Patient's Phone Contact(s)</label>
				<input  type="text"  name="phone" id="phone" value="" placeholder="e.g 0722123456">
			    </div>
				<div class="mid-row">
				<label > Receive SMS Reminders</label>
				<input  type="radio"  name="sms_consent" value="1" id="sms_yes">
				    Yes
				  <input  type="radio"  name="sms_consent" value="0" id="sms_no">
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
					<select name="partner_status" id="partner_status" >
						<option value="0" selected="selected">No Partner</option>
						<option value="1" > Concordant</option>
						<option value="2" > Discordant</option>
					</select>

				</div>
				<div class="max-row">
					<div class="mid-row">
						<label id="dcs" >Disclosure</label>
						<input  type="radio"  name="disclosure" value="1" id="disclosure_yes">
						Yes
						<input  type="radio"  name="disclosure" value="0" id="disclosure_no">
						No
					</div>
				</div>
				<div class="max-row">
					<label><u>Family Planning Method</u></label>
					<table>
						<?php
						$i=1;
						foreach ($family_planning as $fplan) {						
							echo "<tr><td><input type='checkbox' name='family_planning' id='family_planning_$i' class='family_planning' value=".$fplan['indicator'] ." /></td><td><label for='family_planning_$i'><b>".$fplan['name']."<b></label></td></tr>";
						    $i++;
						}
						?>
					</table>
				</div>
				<div class="max-row">
					<label><u>Does Patient have other Chronic illnesses</u></label>
					<table>
						<?php
						$i=1;
						foreach ($other_illnesses as $other_illness) {
							echo "<tr><td><input type='checkbox' name='other_illnesses_listing' id='other_illnesses_listing_$i' class='other_illnesses_listing' value=".$other_illness['indicator'] ." /></td><td><label for='other_illnesses_listing_$i'><b>".$other_illness['name']."<b></label></td></tr>";
						    $i++;
						}
						?>
					</table>
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
				
			 <div class="max-row">
				<div class="mid-row">
				<label> Date of Next Appointment</label>
				<input type="text" name="next_appointment_date" id="next_appointment_date"  style="color:red"/>
				<input type="hidden" name="prev_appointment_date" id="prev_appointment_date" />
				</div>
				<div class="mid-row">
				<label> Days to Next Appointment</label>
				<input  type="text"name="days_to_next" id="days_to_next" style="color:red">
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
					<select name="current_status" id="current_status" class="validate[required] red">
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
                        <?php
					    foreach ($regimens as $regimen) {
						 echo "<option value='" . $regimen['id'] . "'>".$regimen['Regimen_Code'] ." | " . $regimen['Regimen_Desc'] . "</option>";
					    }
					    ?>
					</select>

				</div>
				<div class="max-row">
					<label style="color:red;font-weight:bold;">Current Regimen</label>
					<select type="text"name="current_regimen" id="current_regimen" class="validate[required] red">
						<option>--Select One--</option>
						<?php
					    foreach ($regimens as $regimen) {
						 echo "<option value='" . $regimen['id'] . "'>".$regimen['Regimen_Code'] ." | " . $regimen['Regimen_Desc'] . "</option>";
					    }
					    ?>
					</select>
				</div>
			</fieldset>

	</form>
</div>	
<div class="button-bar">
			<input type="button" class="btn" id="patient_info" value="Patient Info Report" />
			<input type="button" class="btn" id="edit_patient" value="Edit Patient Record" />
			<input type="button" class="btn" id="dispense" value="Dispense to Patient" />
</div>
			<div id="dispensing_history">
				<fieldset>
					<legend>
						Dispensing History
					</legend>
					<table border="1" class="table-bordered table-hover sortable" id="history_table" >
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
							<?php 
							if($history_logs){
							foreach($history_logs as $history){
								echo "<tr><td>".date('d-M-Y',strtotime($history['dispensing_date']))."</td><td>".$history['visit']."</td><td>".$history['unit']."</td><td>".$history['dose']."</td><td>".$history['duration']."</td><td>".$history['indication']."</td><td><input id='".$history['record']."' type='button' class='button edit_dispensing' value='Edit'/></td><td>".$history['drug']."</td><td>".$history['quantity']."</td><td>".$history['current_weight']."</td><td>".$history['current_height']."</td><td>".$history['regimen_desc']."</td><td>".$history['regimen_desc']."</td><td>".$history['batch_number']."</td><td>".$history['pill_count']."</td><td>".$history['adherence']."</td><td>".$history['user']."</td><td>".$history['regimen_change_reason']."</td></tr>";
							}
							}else{
								echo "<tr><td colspan='20'>No History Available</td></tr>";
							}
							?>
							
						</tbody>
					</table>
				</fieldset>
			</div>
			</div>
			<div id="patient_details" title="Patient Summary">
						<h3 id="facility_name" style="text-align: center"></h3>
		<h4 style="text-align: center">Patient Information</h4>
		<table  id="patient_information" class="data-table">
			<tr>
				<th>Art Number</th>
				<th>First Name</th>
				<th>Surname</th>
				<th>Sex</th>
				<th>Age</th>
				<th>Date Therapy Started</th>
				<th>Current Status</th>
			</tr>
			<tr>
				<td><?php echo $result['patient_number_ccc']; ?></td>
				<td><?php echo strtoupper($result['first_name']); ?></td>
				<td><?php echo strtoupper($result['last_name']); ?></td>
				<td><?php if($result['gender']==1){echo "Male";}else{echo "Female";}; ?></td>
				<td id="info_age"></td>
				<td><?php echo date('d-M-Y',strtotime($result['date_enrolled'])); ?></td>
				<td id="info_status"></td>
			</tr>
		</table>
		<h4 style="text-align: center">Patient Pill Count History (Last 6 Months)</h4>
		<table id="patient_pill_count"  class="data-table sortable">
			<thead>
				<th>Date of Visit</th>
				<th>Drug Name</th>
				<th>Qty. Dispensed</th>
				<th>Pill Count</th>
				<th>Pills Taken</th>
				<th>Missed Pills</th>
				<th>Adherence</th>
				<th>Self-Reported Adherence</th>
			</thead>
		</table>
		<h4 style="text-align: center">Patient Regimen Change History</h4>
		<table   id="patient_regimen_history" class="sortable data-table">
			<thead>
			<tr>
				<th>Date of Visit</th>
				<th>Last Regimen Dispensed</th>
				<th>Current Regimen</th>
				<th>Reason for Change</th> 
			</tr>
			</thead>
		</table>
		<h4 style="text-align: center">Patient Appointment History</h4>
		<table id="patient_appointment_history" class="sortable data-table">
			<thead>
			<tr>
				<th>Date of Next Appointment</th>
				<th>Days To Appointment</th> 
			</tr>
			</thead>
		</table>
				
			</div>


</body>
</html>