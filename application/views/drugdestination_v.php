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
	#DataTables_Table_0_wrapper{
		width: 80%;
	}
	#edit_form, #client_form{
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
		
		//When clicked dialog form for new indication pops up
		$("#new_client").click(function(){ 
			$("#client_form").dialog("open");
		});
		
		$(".edit_user").live('click',function(event){
			event.preventDefault(); 
			$("#edit_source_id").val(this.id);
			$("#edit_source_name").val(this.name);
			$("#edit_form").dialog("open");
		});
		
		//Dialog form for new user form
		$("#client_form").dialog({
			height : 200,
			width : 340,
			modal : true,
			autoOpen : false
		});
		$("#edit_form").dialog({
			height : 200,
			width : 340,
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

	    <div class="span12 span-fixed-sidebar">
	      	<div class="hero-unit">
				<div class="passmessage"></div>
			    <div class="errormessage"></div>
				<?php echo validation_errors('<p class="error">', '</p>');?>
				<button class="btn btn-large btn-success" type="button" id="new_client"><i class="icon-plus icon-black"></i>New Drug Destination</button>
		        <?php echo $sources;?>
			</div>
	    </div><!--/span-->
	  </div><!--/row-->
	</div><!--/.fluid-container-->
	<div id="client_form" title="New Drug Destination">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('drugdestination_management/save', $attributes);
		echo validation_errors('<p class="error">', '</p>');
		?>
			
		<label>
			<strong class="label">Drug Destination Name</strong>
			<input type="text" name="source_name" id="source_name" class="input-xlarge" size="30">
		</label>
		<input type="submit" value="Save" class="btn btn-primary"/>
		</form>
	</div>
	<div id="edit_form" title="Edit Drug Destination">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('drugdestination_management/update', $attributes);
		echo validation_errors('<p class="error">', '</p>');
		?>
			
		<label>
			<strong class="label">Drug Destination Name</strong>
			<input type="hidden" name="source_id" id="edit_source_id" class="input" size="30">
			<input type="text" name="source_name" id="edit_source_name" class="input-xlarge">
		</label>
		<input type="submit" value="Save" class="btn btn-primary"/>
		</form>
	</div>

</div>

