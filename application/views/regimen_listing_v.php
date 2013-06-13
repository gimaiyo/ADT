<script>
	$(document).ready(function() {
		
		$("#entry_form").dialog({
			height : 390,
			width : 750,
			modal : true,
			autoOpen : false
		});
		$("#edit_form").dialog({
			height : 390,
			width : 750,
			modal : true,
			autoOpen : false
		});
		
		$(".edit_user").live('click',function(event) {
			event.preventDefault();
			var _id=this.id;
			var request=$.ajax({
		     url: "regimen_management/edit",
		     type: 'POST',
		     data: {"id":_id},
		     dataType: "json",
		     
		    });
		    
		     request.done(function(msg) {
		     	for (var key in msg){
			     	if (msg.hasOwnProperty(key)){
			     		if(key=="regimens"){
			     			
			     			for(var y in msg[key]) {
			     					if (msg[key].hasOwnProperty(y)) {
			     						$("#edit_regimen_id").val(msg[key][y].id);
			     						$("#edit_regimen_code").val(msg[key][y].Regimen_Code);
			     						$("#edit_regimen_desc").val(msg[key][y].Regimen_Desc);
			     						$("#edit_category").attr("value",msg[key][y].Category);
			     						$("#edit_line").val(msg[key][y].Line);
			     						$("#edit_type_of_service").attr("value",msg[key][y].Type_Of_Service);
			     						$("#edit_remarks").val(msg[key][y].Remarks);
			     					}	
			     					break;	
			     			}
			     			$("#edit_form").dialog("open");
			     		}
			     	}
			    }
		     });
		     
		     request.fail(function(jqXHR, textStatus) {
			  alert( "Could not retrieve regimen details: " + textStatus );
			});
		    
			
		});
		
		$("#new_regimen").click(function() {
			$("#entry_form").dialog("open");
		});
		
		//Check the drugcodes selected when merge is clicked
		$(".merge_drug").live('click',function(){
			var primary_drug_merge_id = $(this).attr("id");
			var drug_codes=new Array();
			var base_url='<?php echo base_url();?>';
			$("input:checkbox[name='drugcodes']:checked").each(function(){
			drug_codes.push($(this).val());
            });
			$.ajax({
                url: base_url+'regimen_management/merge/'+primary_drug_merge_id,
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
<style type="text/css">
	.actions_panel {
		width: 200px;
		margin-top: 5px;
	}
	.hovered td {
		background-color: #E5E5E5 !important;
	}
	a {
		text-decoration: none;
	}
	.enable_user {
		color: green;
		font-weight: bold;
	}
	.disable_user {
		color: red;
		font-weight: bold;
	}
	.edit_user {
		color: blue;
		font-weight: bold;
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
		padding: 5px;
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
		padding: 5px;
		font: bold 1px;
		border-radius: 8px;
		width: 30%;
		margin-left: 30%;
		margin-right: 10%;
		font-size: 16px;
		font-weight: bold;
	}
	#entry_form,#edit_form{
		background-color:#CCFFFF;
	}

</style>



<div id="view_content">
	

    <div class="container-fluid">
	  <div class="row-fluid row">

	    <!-- Side bar menus -->
	    <?php echo $this->load->view('settings_side_bar_menus_v.php'); ?>
	    <!-- SIde bar menus end -->

	    <div class="span9 span-fixed-sidebar">
	      <div class="hero-unit">
	      	<div class="passmessage"></div>
    		<div class="errormessage"></div>
	      	
	        <?php echo $regimens;?>
	      </div>

	      
	    </div><!--/span-->
	  </div><!--/row-->


	</div><!--/.fluid-container-->


	<div id="entry_form" title="New Regimen">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('regimen_management/save', $attributes);
		echo validation_errors('<p class="error">', '</p>');
		?>
		<table>
			<tr><td><strong class="label">Regimen Code</strong></td>
				<td><input type="hidden" name="regimen_id" id="regimen_id" class="input" >
					<input type="text" name="regimen_code" id="regimen_code" class="input-xlarge"></td>
				
			</tr>
			<tr><td><strong class="label">Description</strong></td>
				<td>
					<input type="text" name="regimen_desc" id="regimen_desc" class="input-xlarge"></td>
				
			</tr>
			<tr><td><strong class="label">Category</strong></td>
				<td>
					<select class="input-xlarge" id="category" name="category">
						<?php
		foreach($regimen_categories as $regimen_category){
						?>
						<option value="<?php echo $regimen_category -> id;?>"><?php echo $regimen_category -> Name;?></option>
						<?php }?>
					</select>
				</td>
				
			</tr>
			<tr>
				<td><strong class="label">Line</strong></td>
				<td><input type="text" name="line" id="line" class="input-xlarge"></td>
			</tr>
			<tr>
				<td><strong class="label">Type of Service</strong></td>
				<td>
					<select class="input-xlarge" id="type_of_service" name="type_of_service">
						<?php 
							foreach($regimen_service_types as $regimen_service_type){
							if($access_level!="system_administrator"){
								if($regimen_service_type -> Name!="ART"){
								?>
								<option value="<?php echo $regimen_service_type -> id;?>"><?php echo $regimen_service_type -> Name;?></option>
								<?php  
								}
							}
							elseif($access_level=="system_administrator") {
								?>
								<option value="<?php echo $regimen_service_type -> id;?>"><?php echo $regimen_service_type -> Name;?></option>
								<?php
							}
						}?>
					</select>
				</td>
				
			</tr>
			<tr><td><strong class="label">Remarks</strong></td>
				<td>
					<textarea name="remarks" id="remarks" class="input-xxlarge" rows="3"></textarea>
				</td>
				
			</tr>
			<tr><td><input type="submit" value="Save" class="btn btn-primary " /></td></tr>
		</table>
		<?php echo form_close(); ?>
	</div>
	<button class="btn btn-large" type="button" id="new_regimen"><i class="icon-plus icon-black"></i>New Regimen</button>
	
	<div id="edit_form" title="Edit Regimen">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('regimen_management/update', $attributes);
		echo validation_errors('<p class="error">', '</p>');
		?>
		<table>
			<tr><td><strong class="label">Regimen Code</strong></td>
				<td><input type="hidden" name="regimen_id" id="edit_regimen_id" class="input" >
					<input type="text" name="regimen_code" id="edit_regimen_code" class="input-xlarge"></td>
				
			</tr>
			<tr><td><strong class="label">Description</strong></td>
				<td>
					<input type="text" name="regimen_desc" id="edit_regimen_desc" class="input-xlarge"></td>
				
			</tr>
			<tr><td><strong class="label">Category</strong></td>
				<td>
					<select class="input-xlarge" id="edit_category" name="category">
						<?php
		foreach($regimen_categories as $regimen_category){
						?>
						<option value="<?php echo $regimen_category -> id;?>"><?php echo $regimen_category -> Name;?></option>
						<?php }?>
					</select>
				</td>
				
			</tr>
			<tr>
				<td><strong class="label">Line</strong></td>
				<td><input type="text" name="line" id="edit_line" class="input-xlarge"></td>
			</tr>
			<tr>
				<td><strong class="label">Type of Service</strong></td>
				<td>
					<select class="input-xlarge" id="edit_type_of_service" name="type_of_service">
						<?php
		foreach($regimen_service_types as $regimen_service_type){
						?>
						<option value="<?php echo $regimen_service_type -> id;?>"><?php echo $regimen_service_type -> Name;?></option>
						<?php }?>
					</select>
				</td>
				
			</tr>
			<tr><td><strong class="label">Remarks</strong></td>
				<td>
					<textarea name="remarks" id="edit_remarks" class="input-xxlarge" rows="3"></textarea>
				</td>
				
			</tr>
			<tr><td><input type="submit" value="Save" class="btn btn-primary " /></td></tr>
		</table>
		
		<?php echo form_close() ; ?>
		
	</div>
</div>