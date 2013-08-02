<?php
/**
 * Using Session Data
 */
if (!$this -> session -> userdata('user_id') && $content_view !='resend_password_v' && $content_view !='resend_password_success_v') {
	redirect("User_Management/login");
}

if (!isset($link)) {
	$link = null;
}
$actual_page = $this -> uri -> segment(1);

if ($this -> uri -> segment(2) != "") {
	$actual_page .= "/" . $this -> uri -> segment(2);
}
if ($this -> uri -> segment(3) != "") {
	$actual_page .= "/" . $this -> uri -> segment(3);

}
if ($this -> uri -> segment(4) != "") {
	$actual_page .= "/" . $this -> uri -> segment(4);
}
if ($this -> uri -> segment(5) != "") {
	$actual_page .= "/" . $this -> uri -> segment(5);
}
if ($this -> uri -> segment(6) != "") {
	$actual_page .= "/" . $this -> uri -> segment(6);
}
if ($this -> uri -> segment(7) != "") {
	$actual_page .= "/" . $this -> uri -> segment(7);
}
$this -> input -> set_cookie("actual_page", $actual_page, 3600);

//
if ($this -> session -> userdata("prev_page")) {
	if ($this -> input -> cookie("actual_page") and $this -> input -> cookie("actual_page") != "") {
		$actual_page = $this -> input -> cookie("actual_page");
		$this -> session -> unset_userdata("prev_page");
		redirect($actual_page);
		die();
	}
}

//setcookie("actual_page",$actual_page,3600);

$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_facility_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
} else if ($access_level == "facility_administrator") {
	$user_is_facility_administrator = true;
} else if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

} else if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
?>


<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link rel="SHORTCUT ICON" href="<?php echo base_url().'Images/favicon.ico'?>">
<?php
$this -> load -> view('sections/head');
if ($user_is_pharmacist || $user_is_facility_administrator || $user_is_administrator) {
	//echo "<script src=\"" . base_url() . "Scripts/offline_database.js\" type=\"text/javascript\"></script>";
}
/**
 * Load View with Head Section
 */

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

if (isset($styles)) {
	foreach ($styles as $style) {
		echo "<link href=\"" . base_url() . "CSS/" . $style . "\" type=\"text/css\" rel=\"stylesheet\"/>";
	}
}
?> 

<script>
   	$(document).ready(function(){<?php 
		if($user_is_pharmacist){
	   ?>
	    $('#notification1').load('<?php echo base_url() . 'facilitydashboard_management/order_notification';?>');<?php
	}
	if($user_is_facility_administrator){
	   ?>
		$('#notification1').load('<?php echo base_url() . 'facilitydashboard_management/order_notification';?>');<?php
	}
	   ?>});</script>
<script>
	  	$(document).ready(function(){
		 $(".error").css("display","block");
		 $("#inactive_users").click(function(){<?php
			$this -> session -> set_userdata("link_id", "index");
			$this -> session -> set_userdata("linkSub", "user_management");
			$this -> session -> set_userdata("linkTitle", "Users Management");
		 	?>
				});
				});
</script>
<?php 
//Load tableTools for datatables printing and exporting
if(isset($report_title)){
	?>
	<style type="text/css" title="currentStyle">
		@import "../../media/css/demo_page.css";
		@import "../../media/css/demo_table.css";
		@import "<?php echo base_url().'css/datatable/TableTools.css' ?>
			";
	</style>
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url().'Scripts/datatable/ZeroClipboard.js' ?>"></script>
	<script type="text/javascript" charset="utf-8"  src="<?php echo base_url().'Scripts/datatable/TableTools.js' ?>"></script>
	<?php
	}
?>      
<style>
	.setting_table {
		font-size: 0.8em;
	}
</style>
</head>

<body onload="set_interval()" onmousemove="set_interval()" onclick="set_interval" onkeypress="set_interval()" onscroll="set_interval()">


	<div id="top-panel" style="margin:0px;">

		<div class="logo">
			<a class="logo" href="<?php echo base_url();?>" ></a> 
</div>


				<div id="system_title">
					<?php
					$this -> load -> view('sections/banner');
					?>
					<div id="facility_name">							
						<span><?php echo $this -> session -> userdata('facility_name');?></span>
					</div>
					
				</div>
				<div class="banner_text"><?php echo $banner_text;?></div>	
				
 <div id="top_menu"> 

 	<?php
	//Code to loop through all the menus available to this user!
	//Fet the current domain
	$menus = $this -> session -> userdata('menu_items');
	$current = $this -> router -> class;
	$counter = 0;
	if($menus){
?>
 	<a href="<?php  echo site_url('home_controller');?>" class="top_menu_link  first_link <?php
	if ($current == "home_controller") {echo " top_menu_active ";
	}
?>">Home </a><?php }?>
<?php
if($menus){
foreach($menus as $menu){?>
	<a href = "<?php echo site_url($menu['url']);?>" class="top_menu_link <?php
	if ($current == $menu['url'] || $menu['url'] == $link) {echo " top_menu_active ";
	}
?>"><?php echo $menu['text']; if($menu['offline'] == "1"){?>
	 <!-- Offline -->
	 <span class=" red_"></span></a>
	
<?php } else{?>
	<!-- Online -->
	 <span class=" green_"></span></a>
<?php }?>



<?php
$counter++;
}}
if($menus){
	?>

<div  class="btn-group" id="div_profile" >
	<a href="#" class="top_menu_link btn dropdown-toggle" data-toggle="dropdown"  id="my_profile"><i class="icon-user icon-black"></i> Profile  <span class="caret"></span></a>
	<ul class="dropdown-menu" id="profile_list" role="menu">
		<li><a href="#edit_user_profile" data-toggle="modal"><i class="icon-edit"></i> Edit Profile</a></li>
		<li id="change_password_link"><a href="#user_change_pass" data-toggle="modal"><i class=" icon-asterisk"></i> Change Password</a></li>
	</ul>
</div>
<div class="welcome_msg">
	<span>Welcome <b style="font-weight: bolder;font-size: 20px;"><?php echo $this -> session -> userdata('full_name');?></b>. <a id="logout_btn" href="<?php echo base_url().'user_management/logout/2' ?>">Logout</a></span>
	<br>
	<span class="date"><?php echo date('l, jS \of F Y') ?></span>
	<input type="hidden" id="facility_hidden" />
</div>
<?php }?>
 </div>

</div>


<?php
//Load validation settings for reports
if(isset($reports)|| isset($report_title)){
?>

<?php

}
	?>


	<?php
	if($this->session->userdata("message_user_update_success")){
		?>
		<script type="text/javascript">
			setTimeout(function() {
				$("#msg_user_update").fadeOut("2000");
			}, 6000)
		</script>
		<div id="msg_user_update"><?php  echo $this -> session -> userdata("message_user_update_success");?></div>
		<?php
		$this -> session -> unset_userdata('message_user_update_success');
		}
		if(!isset($hide_side_menu)){
	    ?>
	<div class="left-content" style="float: left">


		<h3>Quick Links</h3>
		<ul class="nav nav-list well">
			    <?php 
			    if($user_is_pharmacist){
				?>
				<li><a href="<?php echo base_url().'patient_management/addpatient_show' ?>"><i class="icon-user"></i>Add Patients</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/stock_transaction/1' ?>"><i class="icon-inbox"></i>Receive/Issue - Main Store</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/stock_transaction/2' ?>"><i class="icon-inbox"></i>Receive/Issue - Pharmacy</a></li>
            
				<li class="divider"></li>
				<li><a href="<?php echo base_url().'auto_management/export' ?>"><i class="icon-book"></i>Export Patient List</a></li>			
			    <li><a href="<?php echo base_url().'user_manual.pdf' ?>"><i class="icon-book"></i>User Manual</a></li>	
				
				
				<?php
				}

				if($user_is_facility_administrator){
				?>
				<li><a href="<?php echo base_url().'patient_management/addpatient_show' ?>"><i class="icon-user"></i>Add Patients</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/stock_transaction/1' ?>"><i class="icon-inbox"></i>Receive/Issue - Main Store</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/stock_transaction/2' ?>"><i class="icon-inbox"></i>Receive/Issue - Pharmacy</a></li>
			    <li class="divider"></li>
				<li><a href="<?php echo base_url().'auto_management/export' ?>"><i class="icon-book"></i>Export Patient List</a></li>			
			    <li><a href="<?php echo base_url().'user_manual.pdf' ?>"><i class="icon-book"></i>User Manual</a></li>	
				
				<?php
				}
				if($user_is_administrator){
				?>
			    	<li>
						<a  id="addCounty" class="admin_link"><i class="icon-plus icon-black"></i>Add County</a>
					</li>
					<li>
						<a  id="addSatellite" class="admin_link"><i class="icon-plus icon-black"></i>Add Satellites</a>
					</li>
					<li>
						<a  id="addDistrict" class="admin_link"><i class="icon-plus icon-black"></i>Add Districts</a>
					</li>
					<li>
						<a  id="addMenu" class="admin_link"><i class="icon-plus icon-black"></i>Add Menus</a>
					</li>
					<li>
						<a  id="addUsers" class="admin_link"><i class="icon-user"></i>Add Users</a>
					</li>
					<li class="divider"></li>
					<li>
						<a  id="assignRights" class="admin_link"><i class="icon-cog"></i>Assign User Rights</a>
					</li>
					<li>
						<a  id="nascopSettings" class="admin_link"><i class="icon-cog"></i>Nascop Settings</a>
					</li>
					<li>
						<a  id="getAccessLogs" class="admin_link"><i class="icon-book"></i>Access Logs</a>
					</li>
					<li>
						<a  id="getDeniedLogs" class="admin_link"><i class="icon-book"></i>Denied Logs</a>
					</li>
			    <?php
				}
				?>
			
			
		</ul>
		<h3>Notifications</h3>
		<ul id="notification1" class="nav nav-list well">
		
		</ul>	
	</div>
	<?php
	}

	$this -> load -> view($content_view);

	//Load modals view
	$this -> load -> view('sections/modals_v');
	//Load modals view end
?>
     

 <div id="bottom_ribbon">
 	<div id="footer">
 		<?php $this -> load -> view('footer_v');?>
 	</div>
 </div> 
</body>

</html>