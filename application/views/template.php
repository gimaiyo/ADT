<?php
/**
 * Using Session Data
 */
if (!$this -> session -> userdata('user_id')) {
	redirect("User_Management/login");
}
if (!isset($link)) {
	$link = null;
}
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
<title><?php echo $title; ?></title>
<link rel="SHORTCUT ICON" href="<?php echo base_url().'Images/favicon.ico'?>">

<?php
/**
 * Load View with Head Section
 */
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

if (isset($styles)) {
	foreach ($styles as $style) {
		echo "<link href=\"" . base_url() . "CSS/" . $style . "\" type=\"text/css\" rel=\"stylesheet\"/>";
	}
}
?> 

<script>
$(document).ready(function() {
	<?php 
			if($user_is_pharmacist){
				?>
				$('#notification1').load('<?php echo base_url().'facilitydashboard_management/order_notification'?>');
				$('#notification2').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/approved'?>');
				$('#notification3').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/dispatched'?>');
			
				
				
				<?php
			}
			
			if($user_is_facility_administrator){
				?>
				
				$('#notification1').load('<?php echo base_url().'facilitydashboard_management/order_notification'?>');
				$('#notification2').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/approved'?>');
				$('#notification3').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/dispatched'?>');
				$('#notification4').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/prepared'?>');
				
				<?php
			}
				?>
				});
</script>

</head>

<body>
<div id="wrapper">
	<div id="top-panel" style="margin:0px;">

		<div class="logo">
			<a class="logo" href="<?php echo base_url(); ?>" ></a> 
</div>


				<div id="system_title">

					<?php
	$this -> load -> view('sections/banner');
					?>
				
						
						<div id="facility_name">
							
							<span><?php echo $this -> session -> userdata('facility_name'); ?></span>
						</div>
					
					
					
				</div>
				<div class="banner_text" style="font-size: 22px;"><?php echo $banner_text; ?></div>
				
 <div id="top_menu"> 

 	<?php
	//Code to loop through all the menus available to this user!
	//Fet the current domain
	$menus = $this -> session -> userdata('menu_items');
	$current = $this -> router -> class;
	$counter = 0;
	if($menus){
?>
 	<a href="<?php  echo site_url('home_controller'); ?>" class="top_menu_link  first_link <?php
	if ($current == "home_controller") {echo " top_menu_active ";
	}
?>">Home </a><?php } ?>
<?php
if($menus){
foreach($menus as $menu){?>
	<a href = "<?php echo site_url($menu['url']); ?>" class="top_menu_link <?php
	if ($current == $menu['url'] || $menu['url'] == $link) {echo " top_menu_active ";
	}
?>"><?php echo $menu['text']; if($menu['offline'] == "1"){?>
	 <span class=" red_">off</span></a>
	
<?php } else{ ?>
	 <span class=" green_">on</span></a>
<?php } ?>



<?php
$counter++;
}}
if($menus){
	?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#my_profile").click(function() {
			$("#profile_list").toggle();
		})
	})
</script>
<div  class="btn-group" id="div_profile" >
<a href="#" class="top_menu_link btn dropdown-toggle" data-toggle="dropdown"  id="my_profile"><i class="icon-user icon-black"></i> Profile  <span class="caret"></span></a>
<ul class="dropdown-menu" id="profile_list" role="menu">
	<li><a href="<?php echo base_url().'user_management/profile' ?>"><i class="icon-edit"></i> Edit Profile</a></li>
	<li><a href="<?php echo base_url().'user_management/change_password' ?>"><i class=" icon-asterisk"></i> Change Password</a></li>
</ul>
</div>
<div class="welcome_msg">
	<span>Welcome <b style="font-weight: bolder;font-size: 20px;"><?php echo $this -> session -> userdata('full_name'); ?></b>. <a href="<?php echo base_url().'user_management/logout' ?>">Logout</a></span><br>
	<br><span><?php echo date('l, jS \of F Y') ?></span>
</div>
<?php } ?>
 </div>

</div>

<div id="inner_wrapper"> 


<div id="main_wrapper"> 
 	<div class="left-content" style="float: left">

		<h3>Quick Links</h3>
		<ul class="nav nav-list well">
			<?php 
			if($user_is_pharmacist){
				?>
				<li><a href="<?php echo base_url().'patient_management/addpatient_show' ?>">Add Patients</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/mainstore_show' ?>">Add Main Store Inventory</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/pharmacy_show' ?>">Add Pharmacy Inventory</a></li>
			    <li><a href="<?php echo base_url().'user_management/index' ?>">Add Facility Users</a></li>

				<li class="divider"></li>
				<li><a href="<?php echo base_url().'user_manual.pdf' ?>">User Manual</a></li>		
			  
				
				
				<?php
				}

				if($user_is_facility_administrator){
				?>
				<li><a href="<?php echo base_url().'patient_management/addpatient_show' ?>">Add Patients</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/mainstore_show' ?>">Add Main Store Inventory</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/pharmacy_show' ?>">Add Pharmacy Inventory</a></li>
			    <li class="divider"></li>
				<li><a href="<?php echo base_url().'user_manual.pdf' ?>">User Manual</a></li>			
			    
				
				<?php
				}
				?>
			
			
			
		</ul>
		<h3>Notifications</h3>
		<div class="well">
		<div class="notif" id="notification1"></div>
		<li class="divider"></li>
		<div class="notif"id="notification2"></div>
		<div class="notif" id="notification3"></div>
		<div class="notif" id="notification4"></div>
		</div>
	</div>
<?php $this -> load -> view($content_view); ?>
 
 
 
<!-- end inner wrapper --></div>
  <!--End Wrapper div--></div>

    <div id="bottom_ribbon" style= "width:90%;">

        <div id="footer">
 <?php $this -> load -> view("footer_v"); ?>
    </div>
    </div>
</body>
</html>
