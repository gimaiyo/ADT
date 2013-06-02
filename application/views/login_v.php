<?php ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" manifest="/ADT/offline.appcache">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link href="<?php echo base_url().'CSS/style.css'?>" type="text/css" rel="stylesheet"/>
<link rel="SHORTCUT ICON" href="<?php echo base_url() . 'Images/favicon.ico'; ?>">

<?php

$this -> load -> view('sections/head');

if (isset($script_urls)) {
	foreach ($script_urls as $script_url) {
		echo "<script src=\"" . $script_url . "\" type=\"text/javascript\"></script>";
	}
}
?>

<?php
if (isset($scripts)) {
	foreach ($scripts as $script) {
		echo "<script src=\"" . base_url() . "Scripts/" . $script . "\" type=\"text/javascript\"></script>";
	}
}
?>


 
<?php
if (isset($styles)) {
	foreach ($styles as $style) {
		echo "<link href=\"" . base_url() . "CSS/" . $style . "\" type=\"text/css\" rel=\"stylesheet\"></link>";
	}
}
?> 

</head>

<body>
<div id="wrapper">
	<div id="top-panel" style="margin:0px;">

		<div class="logo">
<a class="logo" href="<?php echo base_url(); ?>" ></a> 

</div>
<div id="system_title">
<?php $this->load->view('sections/banner')?>
</div>
 
</div>

<div id="inner_wrapper"> 


<div id="main_wrapper"> 

 
 

<div id="signup_form">
	 <div class="short_title" >
Sign in
</div>
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
<form class="login-form" action="<?php echo base_url().'user_management/authenticate'?>" method="post" >
	<label for="username">Email or Phone or Username</label>
	<input type="text" name="username" class="input-xlarge" id="username" value="" placeholder="e.g John Doe">
	<label for="password"> Password</label>
	<input type="password" name="password" class="input-xlarge" id="password" placeholder="e.g password">
	<input type="submit" class="btn" name="register" id="register" value="Sign in">
	
	
	<div id="login-other">
	<label for="remember" class="remember-label" >
		 Stay signed in 
	</label>
	
	<input type="checkbox" name="remember">
		
	
		<strong class="forgotten-password"><a href="<?php echo base_url().'user_management/resetPassword' ?>">Forgot Password?</a></strong>
	</div>

</form>
</div>

</div>  
 
  <!--End Wrapper div--></div>
    <div id="bottom_ribbon">
        <div id="footer">
 <?php $this -> load -> view("footer_v"); ?>
    </div>
    </div>
</body>
</html>
