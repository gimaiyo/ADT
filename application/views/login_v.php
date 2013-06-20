<?php?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title;?></title>
		<link rel="SHORTCUT ICON" href="<?php echo base_url() . 'Images/favicon.ico';?>">
		<?php

		$this -> load -> view('sections/head');
		?>
	</head>
	<body>
		<header>
			<img src='<?php echo base_url();?>Images/nascop.jpg'>
		</header>
		<?php
			echo validation_errors('

<p class="error">', '</p>
');
			if ($this -> session -> userdata("changed_password")) {
				$message = $this -> session -> userdata("changed_password");
				echo "<p class='error'>" . $message . "</p>";
				$this -> session -> set_userdata("changed_password", "");
			}
			if (isset($invalid)) {
				echo "<p class='error'>Invalid Credentials. Please try again " . @$login_attempt . "</p>";
			} else if (isset($inactive)) {
				echo "<p class='error'>The Account is not active. Seek help from the Administrator</p>";
			} else if (isset($expired)) {
				echo "<p class='error'>" . @$login_attempt . "</p>";
			}
		?>
		<div id="signup_form">
			<div class="short_title" >
				Login
			</div>
			
			<form class="login-form" action="<?php echo base_url().'user_management/authenticate'?>" method="post" style="margin:0 auto " >
				<label> <strong >Please Enter Your Email/Username</strong>
					<br>
					<input type="text" name="username" class="input-xlarge" id="username" value="" placeholder="user@example.com">
				</label>
				<label> <strong >Password</strong>
					<br>
					<input type="password" name="password" class="input-xlarge" id="password" placeholder="********">
				</label>
				<input type="submit" class="btn" name="register" id="register" value="Login" >
				<div style="margin:auto;width:30%" class="anchor">
					<strong><a href="<?php echo base_url().'user_management/resetPassword' ?>" >Forgot Password?</a></strong>
				</div>
			</form>
			
		</div>
		<footer id="bottom_ribbon2">
			 <?php $this -> load -> view("footer_v"); ?>
		</footer>
	</body>
</html>
