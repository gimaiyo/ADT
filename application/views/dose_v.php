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

	#dose_mngt_setting_wrapper{
		width: 55%;
	}

	#client_form{
		background-color:#CCFFFF;
	}

</style>
<script type="text/javascript">
	$(document).ready(function() {
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
		
		//When clicked dialog form for new dose pops up
		$("#new_client").click(function(){ 
			$("#client_form").dialog("open");
		});
		
		$(".edit_user").live('click',function(event){ 
			event.preventDefault();
			var id=this.id;
			var request=$.ajax({
		     url: "dose_management/edit",
		     type: 'POST',
		     data: {"id":id},
		     dataType: "json"
		    });
		    
		    request.done(function(msg) {
		    	for (var key in msg){
		     		if (msg.hasOwnProperty(key)){
		     			if(key=="doses"){
			     			for(var y in msg[key]) {
		     					if (msg[key].hasOwnProperty(y)) {
		     						$('#edit_dose_id').val(msg[key][y].id);
									$('#edit_dose_name').val(msg[key][y].Name);
									$('#edit_dose_value').val(msg[key][y].Value);
									$('#edit_dose_frequency').val(msg[key][y].Frequency);
		     					}
			     			}
			     			$("#edit_form").dialog("open");
			     		}
		     		}
		     	}
		    });
		    
		});
		
		//Dialog form for new user form
		$("#client_form").dialog({
			height : 250,
			width : 500,
			modal : true,
			autoOpen : false
		});
		$("#edit_form").dialog({
			height : 250,
			width : 500,
			modal : true,
			autoOpen : false
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
<div id="action_panel_parent" style="display:none">
	<div class="actions_panel" style="visibility:hidden" >
		<?php
//Loop through all the actions passed on to this file
foreach($actions as $action){
		?>
		<a class="link" link="<?php echo $this->router->class."/".$action[1]."/"?>"><?php echo $action[0]
		?></a>
		<?php }?>
	</div>
</div>

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
				<?php echo validation_errors('<p class="error">', '</p>');?>
				<button class="btn btn-large btn-success" type="button" id="new_client"><i class="icon-plus icon-black"></i>New Drug Dose</button>
		        <?php echo $doses; ?>
			</div>
	    </div><!--/span-->
	  </div><!--/row-->
	</div><!--/.fluid-container-->
	<div id="client_form" title="New Drug Dose">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('dose_management/save', $attributes);
		echo validation_errors('<p class="error">', '</p>');
		?>
		<table>
			<tr>
				<td>
					<strong class="label">Dose Name</strong>
				</td>
				<td>
					<input type="text" name="dose_name" id="dose_name" class="input-xlarge" size="30">
				</td>
			</tr>
			<tr>
				<td>
					<strong class="label">Dose Value</strong>
				</td>
				<td>
					<input type="text" name="dose_value" id="dose_value" class="input-xlarge" size="30">
				</td>
			</tr>
			<tr>
				<td>
					<strong class="label">Dose Frequency</strong>
				</td>
				<td>
					<input type="text" name="dose_frequency" id="dose_frequency" class="input-xlarge" size="30">
				</td>
			</tr>
			<tr><td><input type="submit" value="Save" class="btn btn-primary"/></td><td></td></tr>
		</table>
		<?php echo form_close(); ?>
	</div>
	
	<!-- Edit drug dose -->
	<div id="edit_form" title="Edit Drug Dose">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('dose_management/update', $attributes);
		echo validation_errors('<p class="error">', '</p>');
		?>
		<table>
			<tr>
				<td>
					<strong class="label">Dose Name</strong>
				</td>
				<td>
					<input type="hidden" name="dose_id" id="edit_dose_id" class="input-xlarge" size="30">
					<input type="text" name="dose_name" id="edit_dose_name" class="input-xlarge" size="30">
				</td>
			</tr>
			<tr>
				<td>
					<strong class="label">Dose Value</strong>
				</td>
				<td>
					<input type="text" name="dose_value" id="edit_dose_value" class="input-xlarge" size="30">
				</td>
			</tr>
			<tr>
				<td>
					<strong class="label">Dose Frequency</strong>
				</td>
				<td>
					<input type="text" name="dose_frequency" id="edit_dose_frequency" class="input-xlarge" size="30">
				</td>
			</tr>
			<tr><td><input type="submit" value="Save" class="btn btn-primary"/></td><td></td></tr>
		</table>
		<?php echo form_close(); ?>
	</div>

</div>


