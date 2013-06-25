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
$this -> load -> view('sections/head');
if ($user_is_pharmacist || $user_is_facility_administrator || $user_is_administrator) {
	echo "<script src=\"" . base_url() . "Scripts/offline_database.js\" type=\"text/javascript\"></script>";

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



				$(document).ready(function() {
	<?php 
			if($user_is_pharmacist){
				?>
				$('#notification1').load('<?php echo base_url().'facilitydashboard_management/order_notification'?>	');
				$('#notification2').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/approved'?>');

				<?php
				}

				if($user_is_facility_administrator){
				?>
				
				$('#notification1').load('<?php echo base_url().'facilitydashboard_management/order_notification'?>');
					$('#notification2').load('<?php echo base_url().'facilityadmin_dashboard_management/getOrders/approved'?>');

				<?php
				}
				?>});</script>
      

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
				<div class="banner_text"><?php echo $banner_text; ?></div>
				
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
	 <!-- Offline -->
	 <span class=" red_"></span></a>
	
<?php } else{ ?>
	<!-- Online -->
	 <span class=" green_"></span></a>
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
	<span>Welcome <b style="font-weight: bolder;font-size: 20px;"><?php echo $this -> session -> userdata('full_name'); ?></b>. <a href="<?php echo base_url().'user_management/logout' ?>">Logout</a></span>
	<br>
	<span class="date"><?php echo date('l, jS \of F Y') ?></span>
</div>
<?php } ?>
 </div>

</div>


<?php
//Load validation settings for reports
if(isset($reports)|| isset($report_title)){
?>

<script type="text/javascript">
	$(document).ready(function() {

		$(".generate_btn").live('click', function() {

			if ($(".input-medium").is(":visible") || $(".report_type").is(":visible") || $(".report_type_1").is(":visible") || $(".input_year").is(":visible") || $(".input_dates").is(":visible") || $(".donor_input_dates_from").is(":visible") || $(".input_dates_from").is(":visible") || $(".donor_input_dates_to").is(":visible") || $(".input_dates_to").is(":visible")) {

				if ($(".input_year").is(":visible") && $(".input_year").val() == "") {
					alert("Please enter the year");
				}
				//Dates not selected
				if ($(".input_dates").is(":visible") && $(".input_dates").val() == "") {
					alert("Please select the date");
				}
				//Dates not selected
				else if ($(".input_dates_from").is(":visible") && $(".input_dates_from").val() == "") {
					alert("Please select the starting date");
				}
				//Dates not selected
				else if ($(".donor_input_dates_from").is(":visible") && $(".donor_input_dates_from").val() == "") {
					alert("Please select the starting date");
				}
				//Dates not selected
				else if ($(".input_dates_to").is(":visible") && $(".input_dates_to").val() == "") {
					alert("Please select the end date");
				}
				//Dates not selected
				else if ($(".donor_input_dates_to").is(":visible") && $(".donor_input_dates_to").val() == "") {
					alert("Please select the end date");
				}

				//Dropdown not chosen
				else if ($(".report_type").is(":visible") && $(".input-large").val() == 0) {

					if ($("#commodity_summary_report_type").is(":visible") && $("#commodity_summary_report_type").val() == 0) {
						alert("Please select the report type");
					} else if ($("#commodity_summary_report_type_1").is(":visible") && $("#commodity_summary_report_type_1").val() == 0) {
						alert("Please select the report type");
					}

				}
				//If everything is ok,generatea report
				else {

					var id = $(this).attr("id");
					if (id == "generate_date_range_report") {

						var report = $(".select_report:visible").attr("value");
						var from = $("#date_range_from").attr("value");
						var to = $("#date_range_to").attr("value");
						var report_url = "report_management/" + report + "/" + from + "/" + to;
						window.location = report_url;
					} else if (id == "generate_single_date_report") {
						var report = $(".select_report:visible").attr("value");
						var selected_date = $("#single_date_filter").attr("value");
						var report_url = "report_management/" + report + "/" + selected_date;
						window.location = report_url;
					} else if (id == "generate_single_year_report") {
						var report = $(".select_report:visible").attr("value");
						var selected_year = $("#single_year_filter").attr("value");
						var report_url = "report_management/" + report + "/" + selected_year;
						window.location = report_url;
					} else if (id == "generate_no_filter_report") {
						var report = $(".select_report:visible").attr("value");
						var stock_type = "";
						if ($("#commodity_summary_report_type_1")) {
							stock_type = $("#commodity_summary_report_type_1").attr("value");
						}
						var report_url = "report_management/" + report + "/" + stock_type;
						window.location = report_url;
					} else if (id == "donor_generate_date_range_report") {
						var report = $(".select_report:visible").attr("value");
						var from = $("#donor_date_range_from").attr("value");
						var to = $("#donor_date_range_to").attr("value");
						var donor = $("#donor").attr("value");
						var report_url = "report_management/" + report + "/" + from + "/" + to + "/" + donor;
						window.location = report_url;
					}
				}
			}

		})
	})

	</script>
<?php

}
	?>


<div id="main_wrapper"> 


	<?php
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
			    <li><a href="<?php echo base_url().'user_management/index' ?>"><i class="icon-user"></i>Add Facility Users</a></li>

				<li class="divider"></li>
				<li><a href="<?php echo base_url().'user_manual.pdf' ?>"><i class="icon-book"></i>User Manual</a></li>		
			  
				
				
				<?php
				}

				if($user_is_facility_administrator){
				?>
				<li><a href="<?php echo base_url().'patient_management/addpatient_show' ?>"><i class="icon-user"></i>Add Patients</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/stock_transaction/1' ?>"><i class="icon-inbox"></i>Receive/Issue - Main Store</a></li>
			    <li><a href="<?php echo base_url().'inventory_management/stock_transaction/2' ?>"><i class="icon-inbox"></i>Receive/Issue - Pharmacy</a></li>
			    <li class="divider"></li>
				<li><a href="<?php echo base_url().'user_manual.pdf' ?>"><i class="icon-book"></i>User Manual</a></li>			
			    
				
				<?php
				}
				?>
			
			
			
		</ul>
		<h3>Notifications</h3>
		<ul class="nav nav-list well">
		<li class="notif" id="notification1"></li>
		<li class="divider"></li>
		<li class="notif"id="notification2"></li>
		<li class="notif" id="notification3"></li>
		<li class="notif" id="notification4"></li>
		</ul>
		
		
		
	</div>
	<?php
	}
	?>
 	
	
	
<?php $this -> load -> view($content_view); ?>
 
    <div id="bottom_ribbon">

        <div id="footer">
 <?php $this -> load -> view("footer_v"); ?>
    </div>
    </div>
    
</body>
</html>