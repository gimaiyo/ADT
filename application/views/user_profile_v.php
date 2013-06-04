<style>
	#fm_user_profile{ 
		background-color:whiteSmoke; 
		border: 1px solid #E5E5E5;
		padding: 20px 25px 15px;
		width:700px;
		margin:0 auto;
		margin-top:50px;
	}
	#inner_wrapper{
		height:200px;
	}
	legend{
		font-size:22px;
	}
	table tr{
		line-height: 40px;
	}
	label{
		margin-right: 20px;
	}
	#u_fullname,#u_username,#u_email,#u_phone{
		height:30px;
	}
</style>
<div id="fm_user_profile">
	<p>
		<?php 
		if(isset($error)){
			echo $error;
		}
		else if(isset($message_success)){
			echo $message_success;
		}
		?>
	</p>
	<legend>User details</legend>
<form action="<?php echo base_url().'user_management/profile_update' ?>" method="post">
	<table>
		<tr>
			
			<td><label >Full Name</label></td><td><div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" class="input-xxlarge" name="u_fullname" id="u_fullname" required="" value="<?php echo $this->session->userdata('full_name') ?>" /></div></td>
		</tr>
		<tr>
			<td><label >Username</label></td><td><div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" class="input-xlarge" name="u_username" id="u_username" required="" value="<?php echo $this->session->userdata('username') ?>" /></div></td>
		</tr>
		<tr>
			<td><label>Email Address</label></td><td><div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="email" class="input-xlarge" name="u_email" id="u_email" value="<?php echo $this->session->userdata('Email_Address') ?>" /></div></td>
		</tr>
		<tr>
			<td><label>Phone Number</label></td><td><div class="input-prepend"><span class="add-on"><i class="icon-plus"></i></span><input type="tel" class="input-xlarge" name="u_phone" id="u_phone" value="<?php echo $this->session->userdata('Phone_Number') ?>"/></div></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" class="btn btn-success " value=" Submit " />
			</td>
			
		</tr>
	</table>
</form>
</div>