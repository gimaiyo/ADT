<style>
	#fmChangePassword .short{
	    color:#FF0000;
	}
	 
	#fmChangePassword .weak{
	    color:#E66C2C;
	}
	 
	#fmChangePassword .good{
	    color:#2D98F3;
	}
	 
	#fmChangePassword .strong{
	    color:#006400;
	}
</style>

<script>
	$(document).ready(function() {
 
	    $('#new_password').keyup(function(){
	        $('#result').html(checkStrength($('#new_password').val()))
	    })  
	 
	    function checkStrength(password){
	 
	    //initial strength
	    var strength = 0
	 
	    //if the password length is less than 6, return message.
	    if (password.length < 6) {
	        $('#result').removeClass()
	        $('#result').addClass('short')
	        return 'Too short'
	    }
	 
	    //length is ok, lets continue.
	 
	    //if length is 8 characters or more, increase strength value
	    if (password.length > 7) strength += 1
	 
	    //if password contains both lower and uppercase characters, increase strength value
	    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
	 
	    //if it has numbers and characters, increase strength value
	    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 
	 
	    //if it has one special character, increase strength value
	    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
	 
	    //if it has two special characters, increase strength value
	    if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1
	 
	    //now we have calculated strength value, we can return messages
	 
	    //if value is less than 2
	    if (strength < 2 ) {
	        $('#result').removeClass()
	        $('#result').addClass('weak')
	        return 'Weak'
	    } else if (strength == 2 ) {
	        $('#result').removeClass()
	        $('#result').addClass('good')
	        return 'Good'
	    } else {
	        $('#result').removeClass()
	        $('#result').addClass('strong')
	        return 'Strong'
	    }
	}
	
	$("#register").click(function(event){
		$('#result_confirm').html("");
		event.preventDefault();
		var new_password=$("#new_password").attr("value");
		var new_password_confirm=$("#new_password_confirm").attr("value");
		if($("#result").attr("class")=="weak" || $('#new_password').val().length<6){
			
		}
		else if(new_password!=new_password_confirm){
			$('#result_confirm').removeClass()
	        $('#result_confirm').addClass('short')
			$('#result_confirm').html("You passwords do not match !");
		}
		else{
			$("#fmChangePassword").submit();
		}
	});
	
	});
	
	
	
	
</script>
<?php
echo validation_errors('
<p class="error">','</p>
'); 
if($this->session->userdata("matching_password")){
	$message=$this->session->userdata("matching_password");
	echo "<p class='error'>".$message."</p>";
	$this->session->set_userdata("matching_password","");
}
?>
<form id="fmChangePassword" action="<?php echo base_url().'user_management/save_new_password'?>" method="post" style="margin:0 auto; width:500px;">
	<label> <strong class="label">Old Password</strong>
		<input type="password" name="old_password" id="old_password" required="">
	</label><label> <strong class="label">New Password</strong>
		<input type="password" name="new_password" id="new_password" required=""><span id="result"></span>
	</label><label> <strong class="label">Confirm New Password</strong>
		<input type="password" name="new_password_confirm" id="new_password_confirm" required=""><span id="result_confirm"></span>
	</label>
	<br/> 
	<br/> 
		<input type="submit" class="button" name="register" id="register" value="Change Password">
 
</form>