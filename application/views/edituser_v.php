<style type="text/css">
	#user_form {
		width: 500px;
		height:450px;
		margin-top: 5px;
		border:1px solid #DDD;
		padding:20px;
		margin-left:500px;
		margin-right:200px;
	}
	

</style>

<script type="text/javascript">
	$(document).ready(function() {
     $("#access_level").attr("value","<?php echo $users->Access_Level;?>");
     $("#facility").attr("value","<?php echo $users->Facility_Code;?>");
	});

</script>

<div id="user_form" title="Edit User">
	<?php
	$attributes = array('class' => 'input_form');
	echo form_open('user_management/update', $attributes);
	echo validation_errors('<p class="error">', '</p>');
	?>
	<label>
<strong class="label">Usertype</strong> 
		<select class="input" id="access_level" name="access_level">
				<?php
				foreach($user_types as $user_type){?>
					<option value="<?php echo $user_type['Id']; ?>"><?php echo $user_type['Access']; ?></option>
				<?php }
				?>
			</select>
</label>	
	
	<label>
<strong class="label">Full Name</strong>
<input type="hidden" name="user_id" id="user_id" class="input" value="<?php echo $users->id;?>" >
<input type="text" name="fullname" id="fullname" class="input" size="30" value="<?php echo $users->Name;?>">
</label>

	<label>
<strong class="label">Username</strong>
<input type="text" name="username" id="username" class="input" value="<?php echo $users->Username;?>">
</label>

	<label>
<strong class="label">Phone number</strong>
<input type="text" name="phone" id="phone" class="input" value="<?php echo $users->Phone_Number;?>">
</label>

<label>
<strong class="label">Email address</strong>
<input type="text" name="email" id="email" class="input" size="30" value="<?php echo $users->Email_Address;?>">
</label>
<label>
<strong class="label">Facility</strong>
<select name="facility" id="facility">
	<?php 
	foreach($facilities as $facility){
	?>]
	<option value="<?php echo $facility['facilitycode'];?>"><?php echo $facility['name'];?></option>
	<?php }?>
</select>
</label>
<p></p>

	<input type="submit" value="Save" class="submit-button"/>
	</form>
</div>
