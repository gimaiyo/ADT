<style>
	#fmChangePassword .short {
		color: #FF0000;
	}

	#fmChangePassword .weak {
		color: #E66C2C;
	}

	#fmChangePassword .good {
		color: #2D98F3;
	}

	legend {
		font-size: 22px;
	}
	table tr {
		line-height: 40px;
	}
	label {
		margin-right: 20px;
	}

	#main_wrapper {
		height: auto;
	}
</style>

<script>
	$(document).ready(function() {

		$('#new_password').keyup(function() {
			$('#result').html(checkStrength($('#new_password').val()))
		})
		function checkStrength(password) {

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
			if (password.length > 7)
				strength += 1

			//if password contains both lower and uppercase characters, increase strength value
			if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
				strength += 1

			//if it has numbers and characters, increase strength value
			if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
				strength += 1

			//if it has one special character, increase strength value
			if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
				strength += 1

			//if it has two special characters, increase strength value
			if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/))
				strength += 1

			//now we have calculated strength value, we can return messages

			//if value is less than 2
			if (strength < 2) {
				$('#result').removeClass()
				$('#result').addClass('weak')
				return 'Weak'
			} else if (strength == 2) {
				$('#result').removeClass()
				$('#result').addClass('good')
				return 'Good'
			} else {
				$('#result').removeClass()
				$('#result').addClass('strong')
				return 'Strong'
			}
		}


		$("#register").click(function(event) {
			$('#result_confirm').html("");
			event.preventDefault();
			var new_password = $("#new_password").attr("value");

			var new_password_confirm = $("#new_password_confirm").attr("value");
			if (new_password == "") {

			} else if ($("#result").attr("class") == "weak" || $('#new_password').val().length < 6) {

			} else if (new_password != new_password_confirm) {
				$('#result_confirm').removeClass()
				$('#result_confirm').addClass('short')
				$('#result_confirm').html("You passwords do not match !");
			} else {
				$("#fmChangePassword").submit();
			}
		});

	});

</script>

<div class="center-content">
	<form id="fmChangePassword" action="<?php echo base_url().'user_management/save_new_password'?>" method="post" class="well">
	<legend>Change Password</legend>
	<?php
	echo validation_errors('
	<p class="error">', '</p>
	');
	if ($this -> session -> userdata("matching_password")) {
		$message = $this -> session -> userdata("matching_password");
		echo "<p class='alert-error'>" . $message . "</p>";
		$this -> session -> set_userdata("matching_password", "");
	}
	?>
	<br>
	<table>
	<tr>
	<td><label >Old Password</label></td><td><input type="password" name="old_password" id="old_password" required=""></td>
	</tr>
	<tr>
	<td><label >New Password</label></td><td><input type="password" name="new_password" id="new_password" required=""><span id="result"></span></td>
	</tr>
	<tr>
	<td><label >Confirm New Password</label></td><td>
	<input type="password" name="new_password_confirm" id="new_password_confirm" required="">
	<span id="result_confirm"></span></td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="submit" class="btn" name="register" id="register" value=" Submit ">
		</td>
	</tr>
	</table>

	</form>

</div>