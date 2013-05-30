<?php
if (!$this -> session -> userdata('user_id')) {
	redirect("User_Management/login");
}
if (!isset($link)) {
	$link = null;
}
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_facility_administrator=false;
$user_is_nascop = false;
$user_is_pharmacist = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
}
else if ($access_level == "facility_administrator") {
	$user_is_facility_administrator = true;
}
else if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

}
else if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
?>
<!DOCTYPE html">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link rel="SHORTCUT ICON" href="<?php echo base_url().'Images/favicon.ico'?>">
<link href="<?php echo base_url().'CSS/style.css'?>" type="text/css" rel="stylesheet"/> 
<link href="<?php echo base_url().'CSS/jquery-ui.css'?>" type="text/css" rel="stylesheet"/>

<link href="<?php echo base_url().'CSS/datatable/jquery.dataTables.css'?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url().'CSS/datatable/jquery.dataTables_themeroller.css'?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url().'CSS/datatable/demo_table.css" type="text/css'?>" rel="stylesheet"/>

<link href="<?php echo base_url().'Scripts/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
<link href="<?php echo base_url().'Scripts/bootstrap/css/bootstrap-responsive.min.css'?>" rel="stylesheet" media="screen">


<script src="<?php echo base_url().'Scripts/jquery.js'?>" type="text/javascript"></script> 
<script src="<?php echo base_url().'js/bootstrap.js'?>" type="text/javascript"></script> 
<script src="<?php echo base_url().'Scripts/sorttable.js'?>" type="text/javascript"></script> 
<script src="<?php echo base_url().'Scripts/jquery-ui.js'?>" type="text/javascript"></script> 
<script src="<?php echo base_url().'Scripts/jquery.form.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'Scripts/jquery.blockUI.js'?>" type="text/javascript"></script>


<script src="<?php echo base_url().'Scripts/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- Datatables -->
<script type="text/javascript" src="<?php echo base_url().'Scripts/datatable/jquery.dataTables.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'Scripts/bootstrap/js/paging.js'?>"></script>
<!-- Datatables end --> 


<!--Load datatables settings -->
<script type="text/javascript">
	$(document).ready(function() {
	    oTable = $('.setting_table').dataTable({
	    	"sScrollY": "240px",
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
	    });
	} );

</script>

<?php
if ($user_is_pharmacist || $user_is_facility_administrator) {
	echo "<script src=\"" . base_url() . "Scripts/offline_database.js\" type=\"text/javascript\"></script>";
}


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
		echo "<link href=\"" . base_url() . "CSS/" . $style . "\" type=\"text/css\" rel=\"stylesheet\"/>";
	}
}
?> 
<style>
	#my_profile_link_container .generated_link{
		display: none;
	}
	#my_profile_link_containe{
		vertical-align:center;
		min-width: 200px !important;
		background-color: red;
		height:100px;
	}
	.temp_link{
		font-size: 10px;
		width:100px !important;
		background-color: #B80000;  
		margin:0px;
	}
	.dataTables_wrapper{
		width: 80%;
		margin:0 auto;
	}


	table.setting_table{
		border:solid;
		border-color: grey;
		border-width: 1px;
	}
	.setting_table td{

		max-width: 300px;
	}

	.ui-widget-header{
		background:rgb(140, 214, 140);
	}
	table.dataTable tr.odd{
		background-color:rgb(234,255,232);
	}
	table.dataTable tr.odd td sorting_1{
		background-color:rgb(234,255,232);
	}
	.btn .caret {
		margin:0 auto;
		vertical-align:middle;
		margin-left:10px;
	}
	#profile_list{
		right:0;
		left:auto;
	}

</style>


</head>

<body>
<div id="wrapper">
	<div id="top-panel" style="margin:0px;">

		<div class="logo">
			<a class="logo" href="<?php echo base_url();?>" ></a> 
</div>
<?php if ($user_is_pharmacist) {?>
	<div id="synchronize">
		<div id="loadingDiv"></div>
		<div id="dataDiv" style="display: none;">
		<span style="display: block; font-size: 12px; margin: 10px 5px;">Number of Local Patients: <span id="total_number_local"></span></span>
		<span style="display: block; font-size: 12px; margin: 10px 5px;">Number of Patients Registered: <span id="total_number_registered"></span></span>
		</div>
		<a class="action_button" id="synchronize_button" href="<?php echo base_url();?>synchronize_pharmacy">Synchronize Now</a>
	</div>
	<?php }?>

				<div id="system_title">

					<span style="display: block; font-weight: bold; font-size: 22px; margin:2px;">Ministry of Health</span>
					<span style="display: block; font-size: 18px;">ARV Drugs Supply Chain Management Tool</span>

					<?php
					if ($user_is_pharmacist) {?>
						<style>
							#facility_name {
								color: green;
								margin-top: 5px;
								font-weight: bold;
							}
							#synchronize_button{
								display: none;
								width: 200px;
								margin: 0;
								height: 40px;
								position: absolute;
								top:3.5px;
								left:30px;		
								line-height: 40px;
														
							}
							
						</style>
						<div id="facility_name">
							
							<span style="display: block; font-size: 16px;"><?php echo $this -> session -> userdata('facility_name');?></span>
						</div>
					<?php }?>
				</div>
				<div class="banner_text" style="font-size: 22px;"><?php echo $banner_text;?></div>
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
	 <span class=" red_">off</span></a>
	
<?php } else{?>
	 <span class=" green_">on</span></a>
<?php }?>



<?php
$counter++;
}}
if($menus){
	?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#my_profile").click(function(){
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
	<span>Welcome <b style="font-weight: bolder;font-size: 20px;"><?php echo $this -> session -> userdata('full_name');?></b>. <a href="<?php echo base_url().'user_management/logout' ?>">Logout</a></span><br>
	<br><span><?php echo date('l, jS \of F Y') ?></span>
</div>
<?php }?>
 </div>

</div>

<div id="inner_wrapper"> 


<div id="main_wrapper"> 
 
<?php $this -> load -> view($content_view);?>
 
 
 
<!-- end inner wrapper --></div>
  <!--End Wrapper div--></div>

    <div id="bottom_ribbon" style= "width:90%;">

        <div id="footer">
 <?php $this -> load -> view("footer_v");?>
    </div>
    </div>
</body>
</html>
