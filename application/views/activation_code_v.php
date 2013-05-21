<?php
echo validation_errors('
<p class="error">','</p>
'); 
if($this->session->userdata("changed_password")){
	$message=$this->session->userdata("changed_password");
	echo "<p class='error'>".$message."</p>";
	$this->session->set_userdata("changed_password","");
}
?>
<form action="<?php echo base_url().'user_management/activation'?>" method="post" style="margin:0 auto; width:300px;">
	<label> <strong class="label">Activation Code</strong>
		<input type="text" name="activation_code" id="activation_code" required="required">
	</label>
	<br/> 
	<br/> 
	<input type="submit" class="button" name="register" id="register" value="Activate Account">
 
</form>