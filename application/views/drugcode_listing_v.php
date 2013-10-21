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
	.merge_drug{
	    color:green;
		font-weight:bold;	
	}
	.unmerge_drug{
	    color:red;
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

	.color_red{
		color:red;
	}
	.color_blue{
		color:#0072D3;
	}
	#new_drugcode,#edit_drugcode{
		background-color:#CCFFFF;
	}

</style>
<script type="text/javascript">
	$(document).ready(function() {
		$(".setting_table").find("tr :first").css("min-width","300px");
		//This loop goes through each table row in the page and applies the necessary modifications
		$.each($(".table_row"), function(i, v) {
			//First get the row id which will be used later
			var row_id = $(this).attr("row_id");
			//This gets the first td element of that row which will be used to add the action links
			var first_td = $(this).find("td:first");
			//Get the width of this td element in integer form (i.e. remove the .px part)
			var width = first_td.css("width").replace("px", "");
			//If the width is less than 200px, extend it to 200px so as to have a more uniform look
			if(width < 200) {
				first_td.css("width", "200px");
			} 
			/*
			//Append the contents of the 'action_panel_parent' to this first td element
			$($("#action_panel_parent").html()).appendTo(first_td);
			//Loop through all the links included in the action panel for this td and append the row_id to the end of it
			$.each($(this).find(".link"), function(i,v){
				var current_link = $(this).attr("link");
				var new_link = $(this).attr("link")+row_id; 
				$(this).attr("href",new_link);
			});
			*/
		});
		//Add a hover listener to all rows
		$(".table_row").hover(function() {
			//When hovered on, make the background color of the row darker and show the action links
			$(this).addClass("hovered");
			$(this).find(".actions_panel").css("visibility", "visible");
		}, function() {
			//When hovered off, reset the background color and hide the action links
			$(this).removeClass("hovered");
			$(this).find(".actions_panel").css("visibility", "hidden");
		});

		//When clicked dialog form for new indication pops up
		$("#btn_new_drugcode").click(function(event){ 

			event.preventDefault();
			var request=$.ajax({
		     url: "drugcode_management/add",
		     type: 'POST',
		     dataType: "json"
		    });

		     request.done(function(msg) {
		     	for (var key in msg){
		     		if (msg.hasOwnProperty(key)){
		     			if(key=="drug_units"){
		     				$("#add_drugunit option").remove();
		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     						$("#add_drugunit").append("<option value="+msg[key][y].id+">"+msg[key][y].Name+"</option>");
		     					}
		     				}
		     			}
		     			if(key=="generic_names"){
		     				$("#add_genericname option").remove();
		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     						$("#add_genericname").append("<option value="+msg[key][y].id+">"+msg[key][y].Name+"</option>");
		     					}
		     				}
		     			}

		     			if(key=="doses"){
		     				$("#add_dose_frequency option").remove();
		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     						$("#add_dose_frequency").append("<option value=\""+msg[key][y].Name+"\">"+msg[key][y].Name+"</option>");
		     					}
		     				}
		     			}
		     		}
		     	}
		     	//$("#new_drugcode").dialog("open");
		     });
			request.fail(function(jqXHR, textStatus) {
			  alert( "Could not open the form to add new drug code: " + textStatus );
			});
		});

		//Edit user
		$(".edit_user").live('click',function(event){
			event.preventDefault();
			var drugcode_id=this.id;

			var request=$.ajax({
		     url: "drugcode_management/edit",
		     type: 'POST',
		     data: {"drugcode_id":drugcode_id},
		     dataType: "json",

		    });

		    request.done(function(msg) {

		    	for (var key in msg){
		     		if (msg.hasOwnProperty(key)){
		     			if(key=="drug_units"){
		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {

		     						$("#drugunit").append("<option value="+msg[key][y].id+">"+msg[key][y].Name+"</option>");
		     					}
		     				}
		     			}
		     			if(key=="generic_names"){
		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     						$("#genericname").append("<option value="+msg[key][y].id+">"+msg[key][y].Name+"</option>");
		     					}
		     				}
		     			}

		     			if(key=="doses"){
		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     						$("#dose_frequency").append("<option value=\""+msg[key][y].Name+"\">"+msg[key][y].Name+"</option>");
		     					}
		     				}
		     			}
		     			var drugname,drugunit,packsize,safety_quantity,genericname,supported_by,none_arv,tb_drug,drug_in_use,comments,dose_frequency,duration,quantity,dose_strength="";

		     			if(key=="drugcodes"){

		     				for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     					 $("#drugcode_id").val(msg[key][y].id);
		     					 $("#drugname").val(msg[key][y].Drug);
							     $("#drugunit").attr("value",msg[key][y].Unit);
							     $("#packsize").attr("value",msg[key][y].Pack_Size);
							     $("#safety_quantity").attr("value",msg[key][y].Safety_Quantity);
							     $("#genericname").attr("value",msg[key][y].Generic_Name);
							     $("#supplied_by").attr("value",msg[key][y].Supported_By);
							     $("#classification").attr("value",msg[key][y].classification);
							     if(msg[key][y].none_arv=="1"){
							     	$("#none_arv").attr("checked",true);
							     }
							     else{
							     	$("#none_arv").attr("checked",false);
							     }
							     if(msg[key][y].Tb_Drug=="1"){
							     	$("#tb_drug").attr("checked",true);
							     }
							     else{
							     	$("#tb_drug").attr("checked",false);
							     }
							     if(msg[key][y].Drug_In_Use=="1"){
							     	$("#drug_in_use").attr("checked",true);
							     }
							     else{
							     	$("#drug_in_use").attr("checked",false);
							     }


							     $("#comments").attr("value",msg[key][y].Comment);
							     $("#dose_frequency").attr("value",msg[key][y].Dose);
							     $("#duration").attr("value",msg[key][y].Duration);
							     $("#quantity").attr("value",msg[key][y].Quantity);
							     $("#dose_strength").attr("value",msg[key][y].Strength);
		     					}


		     				}
		     			}
		     		}
		     	}


		     	$("#edit_drugcode").dialog("open");

		    });

		    request.fail(function(jqXHR, textStatus) {
			  alert( "Could not retrieve facility information: " + textStatus );
			});
		});
		//Dialog form for new user form
		/*
		$("#new_drugcode").dialog({
			height : 530,
			width : "62em",
			modal : true,
			autoOpen : false
		});
		$("#edit_drugcode").dialog({
			height : 530,
			width : "62em",
			modal : true,
			autoOpen : false
		});
		*/
		//Check the drugcodes selected when merge is clicked
		$(".merge_drug").live('click',function(){
			var primary_drug_merge_id = $(this).attr("id");
			var drug_codes=new Array();
			var base_url='<?php echo base_url();?>';
			$("input:checkbox[name='drugcodes']:checked").each(function(){
			drug_codes.push($(this).val());
            });
			$.ajax({
                url: base_url+'drugcode_management/merge/'+primary_drug_merge_id,
                type: 'POST', 
                data: { 'drug_codes': drug_codes },      
                success: function(data) {
                	//Message Bar to Slidedown
                	$(".passmessage").slideDown('slow', function() {

	                });
	                //Append the message
	                var message=data;
	                $(".passmessage").append(message);
	                //Fade out Message bar in 5 sec
	                var fade_out = function() {
	                  $(".passmessage").fadeOut().empty();
	                }
	                setTimeout(fade_out, 5000);

                     //Refresh Page
                     location.reload(); 
                },
                error: function(){
                	alert("Failed merged")
                }
           });

		});

		//count to check which message to display
        var count='<?php echo @$this -> session -> userdata['message_counter'];?>';
        var message='<?php echo @$this -> session -> userdata['message'];?>';	


	
		
	});

</script>

<div id="view_content">
	<div class="passmessage"></div>
    <div class="errormessage"></div>
	
	<div class="container-fluid">
	  <div class="row-fluid row">

	    <!-- Side bar menus -->
	    <?php echo $this->load->view('settings_side_bar_menus_v.php'); ?>
	    <!-- SIde bar menus end -->
		<a href="#new_drugcode" role="button" id="btn_new_drugcode" class="btn" data-toggle="modal"><i class="icon-plus icon-black"></i>New Drug Code</a>
	    <div class="span12 span-fixed-sidebar">
	      <div class="hero-unit">
	      	<?php echo $drugcodes;?>
	      	
	      </div>

	      
	    </div><!--/span-->
	  </div><!--/row-->


	</div><!--/.fluid-container-->
	<!-- Add new drug -->
	<div style="width:1000px;margin-left:-500px;" id="new_drugcode" title="Add New Drug" class="modal hide fade cyan" tabindex="-1" role="dialog" aria-labelledby="NewDrug" aria-hidden="true">
		<?php
			$attributes = array('id' => 'entry_form');
			echo form_open('drugcode_management/save', $attributes);

		?>
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="NewDrug">Drug details</h3>
		</div>
		<div class="modal-body">
		<div class="span5">
			
			<table style="margin-top:54px">
				<tr><td>
					<strong class="label">Drug ID</strong></td><td><input type="text" class="input-xlarge" style="width:320px;font-size:13px" id="add_drugname" name="drugname"/></td></tr>
				<tr><td><strong class="label">Unit</strong></td>
					<td>
						<select id="add_drugunit" class="input-small" name="drugunit">
							
						</select>		
					</td>
				</tr>
				<tr><td><strong class="label">Packsize</strong></td><td><input type="text" class="input-small" id="add_packsize" name="packsize" /></td></tr>
				<tr><td><strong class="label">Safety Quantity</strong></td><td><input type="text" class="input-small" id="add_safety_quantity" name="safety_quantity" /></td></tr>
				<tr><td><strong class="label">Generic Name</strong></td>
					<td>
						<select class="input-xlarge" id="add_genericname" name="genericname">
							
						</select>
					</td>
				</tr>
				<tr><td><strong class="label">Supplied By</strong></td>
					<td>
						<select class="input-large" id="add_supplied_by" name="supplied_by">
							<option value='0'>-Select One--</option>
							<?php
							  foreach($suppliers as $supplier){
							  	echo "<option value='".$supplier['id']."'>".$supplier['Name']."</option>";
							  }
							?>
						</select>
					</td>
				</tr><td><strong class="label">Classification</strong></td>
				<td>
						<select class="input-xlarge" id="add_classification" name="classification">
							<option value="1">ARV</option>
							<option value="2">Family Planning medicine</option>
							<option value="3">Anti TB</option>
							<option value="4">Essential drug</option>
							<option value="5">Anti Malaria</option>
						</select>
					</td>
				<tr>
					<td colspan="2"><hr size="1"></td>
				</tr>
				
				<tr>
					<td colspan="2">
						<label class="checkbox"><input type="checkbox" id="add_none_arv" name="none_arv" />Non ARV Drug</label> 
						<label class="checkbox" ><input type="checkbox" id="add_tb_drug" name="tb_drug" /><span class="color_red"> TB Drug</span></label> 
						<label class="checkbox"><input type="checkbox" id="add_drug_in_use" name="drug_in_use"/> Drug In Use?</label>
						
					</td>
					<td></td></tr>
			</table>
		</div>		
		<div class="span4">
			
				<legend class="color_blue">Standard Dispensing Information</legend>
				<table class="tbl_new_drug">
					<tr><td><strong class="label">Dose Strength</strong></td>
						<td>
							<select class="input-small" name="dose_strength" id="add_dose_strength">
								<option value="1">mg</option>
								<option value="2">g</option>
								<option value="3">ml</option>
								<option value="4">l</option>
							</select>
						</td>
					</tr>
					<tr><td><strong class="label">Dose</strong></td>
						<td>
							<select class="input" id="add_dose_frequency" name="dose_frequency">
								
							</select>
						</td>
					</tr>
					<tr>
						<td><strong class="label">Duration</strong></td><td><input type="text" class="input-small" id="add_duration" name="duration"/></td>
					</tr>
					<tr>
						<td><strong class="label">Quantity</strong></td><td><input type="text" class="input-small" name="quantity" id="add_quantity" /></td>
					</tr>
					<tr><td><strong class="label">Comments</strong></td>
						<td><textarea id="add_comments" name="comments" rows="4"></textarea></td>
					</tr>
				</table>
			
			</div>
		</div>
		<div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <input type="submit" value="Save" class="btn btn-primary " />
		</div>
		
		<?php echo form_close() ?>
	</div>
	
	<!-- Edit drugcode -->
	<div style="width:1000px;margin-left:-500px;" id="edit_drugcode" title="Edit Drug" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="NewDrug" aria-hidden="true">
		<?php
			$attributes = array('id' => 'entry_form');
			echo form_open('drugcode_management/update', $attributes);

		?>
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="NewDrug">Drug details</h3>
		</div>
		<div class="modal-body">
			<div class="span5">
			
			<table style="margin-top:54px">
				<tr><td>
					<input type="hidden" name="drugcode_id" id="drugcode_id" class="input">
					<strong class="label">Drug ID</strong></td>
					<td><input type="text" class="input-xlarge" style="width:320px;font-size:13px" id="drugname" name="drugname"/></td></tr>
				<tr><td><strong class="label">Unit</strong></td>
					<td>
						<select id="drugunit" class="input-small" name="drugunit">
							
						</select>		
					</td>
				</tr>
				<tr><td><strong class="label">Packsize</strong></td><td><input type="text" class="input-small" id="packsize" name="packsize" /></td></tr>
				<tr><td><strong class="label">Safety Quantity</strong></td><td><input type="text" class="input-small" id="safety_quantity" name="safety_quantity" /></td></tr>
				<tr><td><strong class="label">Generic Name</strong></td>
					<td>
						<select class="input-xlarge" id="genericname" name="genericname">
							
						</select>
					</td>
				</tr>
				<tr><td><strong class="label">Supplied By</strong></td>
					<td>
						<select class="input-large" id="supplied_by" name="supplied_by">
							<option value='0'>-Select One--</option>
							<?php
							  foreach($suppliers as $supplier){
							  	echo "<option value='".$supplier['id']."'>".$supplier['Name']."</option>";
							  }
							?>
						</select>
					</td>
				</tr>
				<tr><td><strong class="label">Classification</strong></td>
					<td>
						<select class="input-xlarge" id="classification" name="classification">
							<option value="1">ARV</option>
							<option value="2">Family Planning medicine</option>
							<option value="3">Anti TB</option>
							<option value="4">Essential drug</option>
							<option value="5">Anti Malaria</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><hr size="1"></td>
				</tr>
				<tr>
					<td colspan="2">
						<label class="checkbox"><input type="checkbox" id="none_arv" name="none_arv" />Non ARV Drug</label> 
						<label class="checkbox" ><input type="checkbox" id="tb_drug" name="tb_drug" /><span class="color_red"> TB Drug</span></label> 
						<label class="checkbox"><input type="checkbox" id="drug_in_use" name="drug_in_use"/> Drug In Use?</label>
						
					</td>
					<td></td></tr>
			</table>
		</div>		
		<div class="span4">
			
				<legend class="color_blue">Standard Dispensing Information</legend>
				<table class="tbl_new_drug">
					<tr><td><strong class="label">Dose Strength</strong></td>
						<td>
							<select class="input-small" name="dose_strength" id="dose_strength">
								<option value="1">mg</option>
								<option value="2">g</option>
								<option value="3">ml</option>
								<option value="4">l</option>
							</select>
						</td>
					</tr>
					<tr><td><strong class="label">Dose</strong></td>
						<td>
							<select class="input" id="dose_frequency" name="dose_frequency">
								
							</select>
						</td>
					</tr>
					<tr>
						<td><strong class="label">Duration</strong></td><td><input type="text" class="input-small" id="duration" name="duration"/></td>
					</tr>
					<tr>
						<td><strong class="label">Quantity</strong></td><td><input type="text" class="input-small" name="quantity" id="quantity" /></td>
					</tr>
					<tr><td><strong class="label">Comments</strong></td>
						<td><textarea id="comments" name="comments" rows="4"></textarea></td>
					</tr>
				</table>
			
			</div>
		</div>
		<div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <input type="submit" value="Save" class="btn btn-primary " />
		</div>
		<?php echo form_close() ?>
	</div>
</div>