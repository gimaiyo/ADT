

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
		font-size: 14px;
	}

</style>
<script type="text/javascript">
	$(document).ready(function() {
		
		$("#btn_save_user").live('click',function(event){
			event.preventDefault();
			var fullname=$("#fullname").attr("value");
			var username=$("#username").attr("value");
			var phone=$("#phone").attr("value");
			var email=$("#email").attr("value");
			var filter = /^[0-9-+]+$/;
			
			var atpos=email.indexOf("@");
			var dotpos=email.lastIndexOf(".");
			
			
			if($.trim(fullname)=="" || $.trim(username)==""){
				$("#msg_error").text("Some fields are missing !");
			}
			else if ($.trim(username)!="" && $.trim(username).length<7 ){
				$("#msg_error").text("Username is supposed to be more than 6 characters");
			}
			else{
				$("#msg_error").text("");
				
				if($.trim(phone)=="" && $.trim(email)==""){
					$("#msg_error").text("Please enter phone number and/or email address!");
				}
				//Check phone number
				else if($.trim(phone)!="" && (!filter.test(phone) || phone.length<11 )){
					$("#msg_error").text("Invalid phone number !");
				}
				//Check email
				else if($.trim(email)!="" ){
					$("#msg_error").text("");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
					  $("#msg_error").text("Invalid email address !");
					  
					}
					else{
						$("#fm_user").submit();
					}
				}
				
				else{
					$("#fm_user").submit();
				}
			}
			
			
		});
		
		$("#btn_save_edit_user").live('click',function(event){
			event.preventDefault();
			var fullname=$("#e_fullname").attr("value");
			var username=$("#e_username").attr("value");
			var phone=$("#e_phone").attr("value");
			var email=$("#e_email").attr("value");
			var filter = /^[0-9-+]+$/;
			
			var atpos=email.indexOf("@");
			var dotpos=email.lastIndexOf(".");
			
			
			if($.trim(fullname)=="" || $.trim(username)==""){
				$("#e_msg_error").text("Some fields are missing !");
			}
			else if ($.trim(username)!="" && $.trim(username).length<7 ){
				$("#e_msg_error").text("Username is supposed to be more than 6 characters");
			}
			else{
				$("#e_msg_error").text("");
				
				if($.trim(phone)=="" && $.trim(email)==""){
					$("#e_msg_error").text("Please enter phone number and/or email address!");
				}
				//Check phone number
				else if($.trim(phone)!="" && (!filter.test(phone) || phone.length<11 )){
					$("#e_msg_error").text("Invalid phone number !");
				}
				//Check email
				else if($.trim(email)!="" ){
					$("#e_msg_error").text("");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
					  $("#e_msg_error").text("Invalid email address !");
					  
					}
					else{
						$("#fm_edit_user").submit();
					}
				}
				
				else{
					$("#fm_user").submit();
				}
			}
			
			
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
		
		//When clicked dialog form for new user pops up
		$("#new_user").click(function(){ 
			$("#user_form").dialog("open");
		});
		
		//Dialog form for new user form
		$("#user_form").dialog({
			height : 380,
			width : "37em",
			modal : true,
			autoOpen : false
		});
		
		//Dialog form for edit user form
		$("#edit_user").dialog({
			height : 350,
			width : "35em",
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

	//Ajax to edit a user
	$(".edit_user").live('click',function(event){
		event.preventDefault();
		var user_id=this.id;
		var request=$.ajax({
	     url: "user_management/edit",
	     type: 'GET',
	     data: {"u_id":user_id},
	     dataType: "json",
	    });
	    request.done(function(msg) {
            var access_level="";
	    	for (var key in msg){
	    		
      			if (msg.hasOwnProperty(key)){
      				if(key=="users"){
	      				for(var y in msg[key]) {
	      					
	      					if (msg[key].hasOwnProperty(y)) {
	      						access_level=msg[key][y].Access_Level;
	      						$("#e_facility").attr("value",msg[key][y].Facility_Code);
	      						$("#e_username").val(msg[key][y].Username);
								$("#e_fullname").val(msg[key][y].Name);
								$("#e_user_id").val(msg[key][y].id);
								$("#e_phone").val(msg[key][y].Phone_Number);
								$("#e_email").val(msg[key][y].Email_Address);
	      					}
	      				}
	      			}
	      			
	      			if(key=="user_type"){
	     				for(var y in msg[key]) {
	     					if (msg[key].hasOwnProperty(y)) {
	     						//if(msg[key][y].Id==access_level){
	     							$("#e_access_level").html("<option value='"+msg[key][y].Id+"'>"+msg[key][y].Access+"</option>")
	      						//}
	     						
	     					}
	     				}
	     			}
      			}
      		}
      		$("#edit_user").dialog("open");
	    });
	    request.fail(function(jqXHR, textStatus) {
		  alert( "Could not retrieve user details: " + textStatus );
		});

	});
		
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
	      		<button class="btn btn-large btn-success" type="button" id="new_user"><i class="icon-plus icon-black"></i>New User</button>
	      		<div class="passmessage"></div>
				<div class="errormessage"></div>
				<?php
				echo $users;
				?>
	      	</div>
	    </div>
	  </div>
	</div>

	<div id="user_form" title="New User">
			<?php
			$attributes = array('class' => 'input_form','id'=>'fm_user');
			echo form_open('user_management/save', $attributes);
			echo validation_errors('<p class="error">', '</p>');
			?>
			<div><span class="_red" id="msg_error">Fields with * are compulsory</span></div>
			<br>
			<table style="margin:0 auto" class="table-striped" width="100%">
				<tr><td><strong class="label">Usertype</strong> </td>
					<td>
						<select class="input-xlarge" id="access_level" name="access_level">
							<?php
							foreach($user_types as $user_type){ 
							if($user_type['Access']=="Pharmacist"){
								$level_access="User";
							}else{
								$level_access=$user_type['Access'];
							}					
							?>
								<option value="<?php echo $user_type['Id']; ?>"><?php echo $level_access ?></option>
							<?php }
							?>
						</select>
					</td>
					<td></td>
				</tr>
				
				
				<tr><td><strong class="label">Full Name</strong></td><td><input type="text" name="fullname" id="fullname" class="input-xlarge" required=""></td><td class="_red">*</td></tr>
				<tr><td><strong class="label">Username</strong></td><td><input type="text" name="username" id="username" class="input-xlarge" required=""></td><td class="_red">*</td></tr>
				<tr ><td><strong class="label">Phone number</strong></td><td><input type="text" name="phone" id="phone" class="input-xlarge"><br><span class="msg">e.g. +254721112333</span></td><td></td></tr>
				<tr><td><strong class="label">Email address</strong></td><td><input type="email" name="email" id="email" class="input-xlarge"></td><td class="_red" id="invalid_email"></td></tr>
				<tr><td><strong class="label">Facility</strong></td>
					<td>
						<select name="facility" id="facility" class="input-xlarge">
							<?php 
							foreach($facilities as $facility){
							?>]
							<option value="<?php echo $facility['facilitycode'];?>"><?php echo $facility['name'];?></option>
							<?php }?>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td align="left" colspan="3"><input type="submit" value="Save" id="btn_save_user" class=" btn btn-primary"/></td>
				</tr>
			</table>
			
			</form>
		</div>

		<div id="edit_user" title="Edit User" >
			<?php
			$attributes = array('class' => 'input_form','id'=>'fm_edit_user');
			echo form_open('user_management/update', $attributes);
			echo validation_errors('<p class="error">', '</p>');
			?>
			<div><span class="_red" id="e_msg_error">Fields with * are compulsory</span></div>
			<table style="margin:0 auto">
				<tr><td><strong class="label">Usertype</strong> </td>
					<td>
						<select class="input-xlarge" id="e_access_level" name="access_level">
							
						</select>
					</td>
				</tr>
				<tr><td><strong class="label">Full Name</strong></td>
					<td>
						<input type="hidden" name="user_id" id="e_user_id" class="input" >
						<input type="text" name="fullname" id="e_fullname" class="input-xlarge">
						
					</td>
				</tr>
				<tr><td><strong class="label">Username</strong></td>
					<td><input type="text" name="username" id="e_username" class="input"></td></tr>
				<tr><td><strong class="label">Phone number</strong></td><td><input type="text" name="phone" id="e_phone" class="input-xlarge"></td></tr>
				<tr><td><strong class="label">Email address</strong></td><td><input type="text" name="email" id="e_email" class="input-xlarge"></td></tr>
				<tr><td><strong class="label">Facility</strong></td>
					
					<td>
						<select name="facility" id="e_facility" class="input-xlarge">
							<?php 
							foreach($facilities as $facility){
							?>]
							<option value="<?php echo $facility['facilitycode'];?>"><?php echo $facility['name'];?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr><td align="left" colspan="3"><input type="submit" value="Save" id="btn_save_edit_user" class=" btn btn-primary"/></td></tr>
			</table>
			</form>
		</div>

</div>

