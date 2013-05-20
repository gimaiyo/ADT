<style type="text/css">
	.actions_panel {
		width: 200px;
		margin-top: 5px;
	}
	.hovered td {
		background-color: #E5E5E5 !important;
	}
	a{
		text-decoration: none;
	}
	.enable_user{
		color:green;
		font-weight:bold;
	}
	.disable_user{
		color:red;
		font-weight:bold;
	}
	.edit_user{
		color:blue;
		font-weight:bold;
	}
	.passmessage {

		display: none;
		background: #00CC33;
		color: black;
		text-align: center;
		height: 20px;
		padding:5px;
		font: bold 1px;
		border-radius: 8px;
		width: 30%;
		margin-left: 30%;
		margin-right: 10%;
		font-size: 16px;
		font-weight: bold;
	}
	.errormessage {

		display: none;
		background: #FF0000;
		color: black;
		text-align: center;
		height: 20px;
		padding:5px;
		font: bold 1px;
		border-radius: 8px;
		width: 30%;
		margin-left: 30%;
		margin-right: 10%;
		font-size: 16px;
		font-weight: bold;
	}
	#facility_form(
	    width: 300px;
		height:150px;
		margin-top: 5px;
		border:1px solid #DDD;
		padding:20px;
		margin-left:500px;
		margin-right:200px;
	)
	.submit-button .Save{
		display:none;
	}
	


</style>

<script type="text/javascript">
$(document).ready(function() {
$("#facilities_list").change(function(){
	$("#facility_form").css("display","none");
	$("#loading").css("display","block"); 
	var facility_c=$("#facilities_list").val();
	
	var request=$.ajax({
     url: "facility_management/view",
     type: 'POST',
     data: {"id":facility_c},
     dataType: "json"
    });

    request.done(function(msg) {
    	$("#facility_form").css("display","block");
    	$("#loading").css("display","none");
      for (var key in msg){
      	if (msg.hasOwnProperty(key)){
	      //Fill facilities details
	      if(key=="facilities"){
	      	for(var y in msg[key]) {
	      		if (msg[key].hasOwnProperty(y)) {
		         $("#facility_id").val(msg[key][y].id);
		         $("#facility_cod").val(msg[key][y].facilitycode);
		         $("#facility_code").text(msg[key][y].facilitycode);
		         $("#facility_name").val(msg[key][y].name);
		         $("#facilities_list").attr("value",msg[key][y].facilitycode);
		         $("#facility_type").attr("value",msg[key][y].facilitytype);
				 $("#district").attr("value",msg[key][y].district);
				 $("#county").attr("value",msg[key][y].county);
				 $("#central_site").attr("value",msg[key][y].parent);
				 $("#adult_age").attr("value",msg[key][y].adult_age);
				 $("#weekday_max").attr("value",msg[key][y].weekday_max);
				 $("#weekend_max").attr("value",msg[key][y].weekend_max);
				 $("#"+msg[key][y].supported_by).attr('checked', 'checked');
				 var art_service=msg[key][y].service_art;
				 var pmtct_service=msg[key][y].service_pmtct;
				 var pep_service=msg[key][y].service_pep;
				 $("#supply_"+msg[key][y].supplied_by).attr('checked', 'checked');

				 if(art_service==1){
				 	$("#art_service").attr('checked', true);
				 }
				 else{
				 	$("#art_service").attr('checked',false);
				 }
				 if(pmtct_service==1){
				 	$("#pmtct_service").attr('checked', true);
				 }
				 else{
				 	("#pmtct_service").attr('checked', false);
				 }
				 if(pep_service==1){
				 	$("#pep_service").attr('checked', true);
				 }
				 else{
				 	$("#pep_service").attr('checked', false);
				 }

		        }
	      	break;
	      	}
	      	
	      }
	      
	    }
      }

	});
	request.fail(function(jqXHR, textStatus) {
	  alert( "Could not retrieve facility information: " + textStatus );
	});

});


		
//count to check which message to display
 var count='<?php echo @$this -> session -> userdata['message_counter']?>';
 var message='<?php echo @$this -> session -> userdata['message']?>';	
	
	if(count == 1) {
	$(".passmessage").slideDown('slow', function() {

	});
	$(".passmessage").append(message);

	var fade_out = function() {
	$(".passmessage").fadeOut().empty();
	}
	setTimeout(fade_out, 5000);
     <?php 
     $this -> session -> set_userdata('message_counter', "0");
     $this -> session -> set_userdata('message', " ");
     ?>

	}
	if(count == 2) {
	$(".errormessage").slideDown('slow', function() {

	});
	$(".errormessage").append(message);

	var fade_out = function() {
	$(".errormessage").fadeOut().empty();
	}
	setTimeout(fade_out, 5000);
     <?php 
     $this -> session -> set_userdata('message_counter', "0");
     $this -> session -> set_userdata('message', " ");
     ?>

	}
		
	});

	

</script>
	<div class="container-fluid">
	  <div class="row-fluid row">
		 <!-- Side bar menus -->
	    <?php echo $this->load->view('settings_side_bar_menus_v.php'); ?>
	    <!-- SIde bar menus end -->

	    <div class="span9 span-fixed-sidebar" >
	      	<div class="hero-unit" style="padding:10px;background:#CCFFCC">
				<div class="passmessage"></div>
			    <div class="errormessage"></div>
				<?php echo validation_errors('<p class="error">', '</p>');?>
				<div style="text-align:center;width:100%">
					<label ><strong >Select facility</strong>
						<select id="facilities_list" name="facilities_list" style="display:inline">
							<option value="">--Select One--</option>
				        	<?php 
				        		foreach ($facilities_list as $facility_list) {
				        	?>
				        	<option value="<?php echo $facility_list['facilitycode'] ?>"><?php echo $facility_list['name'] ?></option>
				        	<?php		
				        		}
				        	?>
				        </select>
			       
			   		</label>
			     </div>


	    		<div id="facility_form" title="Facility Information" style="display:none">
	    			
		      		<?php
						$attributes = array('class' => 'input_form');
						echo form_open('facility_management/update', $attributes);
						echo validation_errors('<p class="error">', '</p>');
					?>
						<fieldset>
	    					<h3>Facility Details</h3>
							<table class="facility_basic_info" style="width:70%;">
								<tr><td><label for="facility_code"><strong class="label">Organization Code/MFL No</strong></label></td>
									<td>
										<input type="hidden" name="facility_id" id="facility_id" class="input" >
										<input type="hidden" name="facility_cod" id="facility_cod" class="input" >
										<span name="facility_code" id="facility_code"  class="input-large uneditable-input"></span>
										
									</td>
								</tr>
								<tr><td><strong class="label">Name of Organization / System</strong></td>
									<td><input type="text" name="facility_name" id="facility_name" class="input-xlarge" style="color:green" >
									</td>
								</tr>
								<tr><td><strong class="label">Adult Age</strong></td>
									<td><input type="text" name="adult_age" id="adult_age" class="input-small">
									</td>
								</tr>
								<tr><td><strong class="label">Maximum Patients Per Day</strong></td>
									<td><input type="text" name="weekday_max" id="weekday_max" class="input-small" value="<?php echo @$facility['weekday_max'];?>"></td>
								</tr>
								<tr><td><strong class="label">Maximum Patients Per Week</strong></td>
									<td><input type="text" name="weekend_max" id="weekend_max" class="input-small" value="<?php echo @$facility['weekend_max'];?>"></td>
								</tr>
								<tr><td><strong class="label">Facility Type</strong></td>
									<td><select class="input-xlarge" id="facility_type" name="facility_type">
											<?php foreach($facility_types as $facility_type){?>
											<option value="<?php echo $facility_type['id'];?>"><?php echo @$facility_type['Name'];?></option>
											<?php }?>
										</select>
									</td>
								</tr>
								<tr><td><strong class="label">District</strong></td>
									<td><select class="input-xlarge" id="district" name="district">
											<?php foreach($districts as $district){?>
											<option value="<?php echo $district['id'];?>"><?php echo $district['name'];?></option>
											<?php }?>
										</select>
									</td>
								</tr>
								<tr><td><strong class="label">County</strong></td>
									<td><select class="input-xlarge" id="county" name="county">
											<?php foreach($counties as $county){?>
											<option value="<?php echo $county['id'];?>"><?php echo $county['county'];?></option>
											<?php }?>
										</select>
									</td>
								</tr>
								 <tr><td><strong class="label">Central Site</strong></td>
									<td><select class="input-xlarge" id="central_site" name="central_site">
											<?php foreach($sites as $site){?>
											<option value="<?php echo $site['facilitycode'];?>"><?php echo $site['name'];?></option>
											<?php }?>
										</select>
									</td>
								</tr>
							
							</table>
							<hr size="2" style="border-top: 1px solid #000;">
							<div class="span3">
								<fieldset>
									<legend style="color:red">Client Supported By</legend>
									
									  <?php foreach ($supporter as $support) {
									  	?>
									  	<label class="radio">
										  	<input type="radio" name="supported_by" value="<?php echo $support->id?>" id="<?php echo $support->id?>">
										    <?php echo $support->Name ?> Sponsorship
										  </label> 
									  	<?php
									  }	
									  ?>

								</fieldset>
							</div>

							<div class="span4">
								<fieldset>
									<legend style="color:red">Services offered at the facility</legend>
									<label class="checkbox">
									  <input type="checkbox" id="art_service" name="art_service">
									 ART
									</label>
									<label class="checkbox">
									  <input type="checkbox" id="pmtct_service" name="pmtct_service">
									 PMTCT
									</label>
									<label class="checkbox">
									  <input type="checkbox" id="pep_service" name="pep_service">
									 PEP
									</label>
								</fieldset>
							</div>
							<div class="span2">
								<fieldset>
									<legend style="color:red">Client Supplied By</legend>
									<label class="radio">
									  	<input type="radio" name="supplied_by" value="1" id="supply_1">
									     KEMSA
									</label>
									<label class="radio">
									  	<input type="radio" name="supplied_by" value="2" id="supply_2">
									     Kenya Pharma
									</label> 
								</fieldset>
							</div>

							<div class="span3" style="padding-top: 5em;padding-left:8em">
								<input type="submit" class="btn btn-primary" value="Save" style="padding-left: 2em; padding-right: 2em;">
							</div>

							
						</fieldset>
					</form>
				</div>
	    		

			    
			</div>
			<div id="loading" style="text-align:center;display:none"><img width="120px" src="<?php echo site_url().'/Images/loading.gif' ?>"></div> 
			    
	    </div><!--/span-->
	  </div><!--/row-->
	</div><!--/.fluid-container-->
	
</div>