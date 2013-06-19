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
				$("#patient").val("<?php echo $result['patient_id'];?>");
				var first_name="<?php echo strtoupper($result['first_name']); ?>";
				var other_name="<?php echo strtoupper($result['other_name']); ?>";
				var last_name="<?php echo strtoupper($result['last_name']); ?>";
				$("#patient_details").val(first_name+" "+other_name+" "+last_name);
				 
				$("#dispensing_date").val("<?php echo $result['dispensing_date'];?>"); 
				$("#original_dispensing_date").val("<?php echo $result['dispensing_date'];?>"); 
				$("#purpose").val("<?php echo $result['visit_purpose'];?>"); 
				$("#weight").val("<?php echo $result['current_weight'];?>"); 
				$("#height").val("<?php echo $result['current_height'];?>"); 
				$("#last_regimen").val("<?php echo $result['last_regimen'];?>"); 
				$("#current_regimen").val("<?php echo $result['regimen'];?>"); 
				$("#adherence").val("<?php echo $result['adherence'];?>"); 
				$("#non_adherence_reasons").val("<?php echo $result['non_adherence_reason'];?>"); 
				$("#regimen_change_reason").val("<?php echo $result['regimen_change_reason'];?>"); 
				
				
				
				if($("#last_regimen").val() !=$("#current_regimen").val()){
				 $("#regimen_change_reason_container").show();	
				}
				
				
				//Get Drugs in current_regimen
				getRegimenDrugs($("#current_regimen").val());
				
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
				
			//Attach date picker for date of dispensing
	        $("#dispensing_date").datepicker({
					yearRange : "-120:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true
			});
			
			//Add datepicker for the expiry date
			$("#expiry").datepicker({
					defaultDate : new Date(),
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true

			});
			
			
			//Set Delete Trigger
			$("#delete_btn").click(function(){
				$("#delete").val("1");
				var message=confirm("Are You Sure You want to Delete?");
				if(message){
					return true;
				}else{
					return false;
				}
				
			});
			
	       //Function to display all Drugs in this regimen
		   $("#current_regimen").change(function() {
		   	$("#drug option").remove();
		   	$("#unit").val("");
		   	  var current_regimen = $(this).val();
              getRegimenDrugs(current_regimen);
		   });
		   
		   function getRegimenDrugs(regimen){
		   	  var base_url="<?php echo base_url();?>";
		   	  var link=base_url+"regimen_management/getDrugs/"+regimen;
				$.ajax({
				    url: link,
				    type: 'POST',
				    dataType: "json",
				    success: function(data) {	
				    	$("#drug").append($("<option></option>").attr("value",'').text('--Select One--'));
				    	$.each(data, function(i, jsondata){
				    		$("#drug").append($("<option></option>").attr("value",jsondata.drug_id).text(jsondata.drug_name));
				    	});
				    }
				});
		   }
		   
		   //Event Checker for Drugs
		   $("#drug").change(function(){
		   	  $("#batch option").remove();
		   	  $("#unit").val("");
			  $("#dose").val("");
			  $("#duration").val("");
			  $("#qty_disp").val("");
		   	  $("#expiry").val("");
			  $("#soh").val("");
		   	  var drug = $(this).val();
              getDrugBatches(drug);
              getBrands(drug);
		   });
		   
		   function getDrugBatches(drug){
		   	  var base_url="<?php echo base_url();?>";
		   	  var link=base_url+"inventory_management/getDrugsBatches/"+drug;
				$.ajax({
				    url: link,
				    type: 'POST',
				    dataType: "json",
				    success: function(data) {	
				    	
				    	$("#batch").append($("<option></option>").attr("value",'').text('--Select One--'));
				    	$.each(data, function(i, jsondata){
				    		$("#batch").append($("<option></option>").attr("value",jsondata.batch_number).text(jsondata.batch_number));
				    	    $("#unit").val(jsondata.unit);
				    	    $("#dose").val(jsondata.dose);
				    	    $("#duration").val(jsondata.duration);
				    	    $("#qty_disp").val(jsondata.quantity);
				    	});
				    }
				});
		   }
		   
		   function getBrands(drug){
		   	 var base_url="<?php echo base_url();?>";
		   	  var link=base_url+"inventory_management/getDrugsBrands/"+drug;
				$.ajax({
				    url: link,
				    type: 'POST',
				    dataType: "json",
				    success: function(data) {	
				    	
				    	$("#brand").append($("<option></option>").attr("value",'').text('-Select One-'));
				    	$.each(data, function(i, jsondata){
				    		$("#brand").append($("<option></option>").attr("value",jsondata.id).text(jsondata.brand));
				    	});
				    }
				});
		   }
		   
		   $("#batch").change(function(){
		   	   getBatchInfo();
		   });
		   
		   function getBatchInfo(){
		   	 var base_url="<?php echo base_url();?>";
		   	 var drug=$("#drug").val();
		   	 var batch=$("#batch").val();
		   	 var link=base_url+"inventory_management/getBatchInfo/"+drug+"/"+batch;
		   	 $.ajax({
				    url: link,
				    type: 'POST',
				    dataType: "json",
				    success: function(data) {	
				    	console.log(data)
				    		$("#expiry").val(data[0].expiry_date);
				    	    $("#soh").val(data[0].balance);
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
<div class="full-content" style="background:#FFCC99">
	<h3>Dispensing History Editing</h3>
	<form id="edit_dispense_form" method="post"  action="<?php echo base_url().'dispensement_management/save_edit';?>" onsubmit="return processData('edit_dispense_form')" >
		<input id="original_dispensing_date" name="original_dispensing_date" type="hidden"/>
		<input id="original_drug" name="original_drug" type="hidden"/>
		<input id="delete_trigger" name="delete_trigger" type="hidden" value="0"/>
		<div class="column-5">
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
						<option value="">--Select One--</option>
									<?php 
									foreach($purposes as $purpose){
										echo "<option value='".$purpose['id']."'>".$purpose['Name']."</option>";
									}
									?>
						</select>
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
							<select name="last_regimen" id="last_regimen" class="validate[required]"/>
							<option value="">-Select One--</option>
										<?php 
									       foreach($regimens as $regimen){
										     echo "<option value='".$regimen['id']."'>".$regimen['Regimen_Code']." | ".$regimen['Regimen_Desc']."</option>";
									       }
									     ?>
							</select>
						</div>
						<div class="mid-row">
							<label>Current Regimen</label>
							<select name="current_regimen" id="current_regimen"  class="validate[required]"/>
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
						<div style="display:none" id="regimen_change_reason_container">
							<label>Regimen Change Reason</label>
							<select type="text"name="regimen_change_reason" id="regimen_change_reason" >
									<option value="">--Select One--</option>
										 <?php
										   foreach($regimen_changes as $changes){
										   	echo "<option value='".$changes['id']."'>".$changes['Name']."</option>";
										   }
										  ?>
							</select>
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
		<div id="edit_drugs_section" style="margin: 0 auto;">
			<table border="0" class="data-table" id="drugs_table" style="width:100%;">
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
			<td><select name="drug" class="drug input-large" id="drug" style="width:300px"></select></td>
			<td>
			<input type="text" name="unit" id="unit" class="unit input-small"  readonly="readonly"/>
			</td>

			<input type="hidden" name="batch_select" id="batch_select" class="batch_select input-small"  disabled="disabled"/>
			<input type="hidden" name="original_drug_no" id="original_drug_no" class="original_drug_no input-small"  disabled="disabled"/>
			<input type="hidden" name="original_dose_no" id="original_dose_no" class="original_dose_no input-small"  disabled="disabled"/>
			<input type="hidden" name="original_duration_no" id="original_duration_no" class="original_duration_no input-small"  disabled="disabled"/>
			<input type="hidden" name="original_qty_no" id="original_qty_no" class="original_qty_no input-small"  disabled="disabled"/>

			<td><select id="batch" name="batch" class="batch input-small" style="width:200px"></select></td>
			<td>
			<input type="text" id="expiry" name="expiry" class="expiry input-small" />
			</td>
			<td>
			<select id="dose" name="dose" class="expiry input-small">
				<option value="">-Select-</option>
				<?php
				  foreach($doses as $dose){
				  	echo "<option value='".$dose['Name']."'>".$dose['Name']."</option>";
				  }
				?>			
			</select>
			</td>
			<td>
			<input type="text" id="duration" name="duration" class="duration input-small" />
			</td>
			<td>
			<input type="text" id="qty_disp" name="qty_disp" class="qty_disp input-small" />
			</td>
			<td>
			<input type="text" id="soh" name="soh" class="soh input-small" readonly="readonly"/>
			</td>
			<td><select name="brand" id="brand" class="brand input-small"></select></td>
			<td>
			<select name="indication" id="indication" class="indication input-small" style="max-width: 70px;">
			<option value=" ">None</option>
			<?php 
			foreach($indications as $indication){
				echo "<option value='".$indication['id']."'>".$indication['Name']."</option>";
			}
			?>
			</select></td>
			<td>
			<input type="text" name="pill_count" id="pill_count" class="pill_count input-small" />
			</td>
			<td>
			<input type="text" name="comment" id="comment" class="comment input-small" />
			</td>
			</tr>
			</table>
		</div>
		<input type="hidden" name="dispensing_id" id="dispensing_id" />
		<input type="hidden" name="batch_hidden" id="batch_hidden" />
		<input type="hidden" name="qty_hidden" id="qty_hidden" />
		<div id="submit_section">
			<div class="btn-group">
				<input type="submit" form="edit_dispense_form" class="btn" id="submit" name="submit" value="Save & go Back" />
				<input type="submit" class="btn btn-danger" id="delete_btn" name="delete" value="Delete Record"/>
			</div>
		</div>
	</form>
</div>
</body>
</html>