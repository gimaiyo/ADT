<?php
if (!$this -> session -> userdata('user_id')) {
	redirect("User_Management/login");
}
if (!isset($link)) {
	$link = null;
}
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
}
if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

}
if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
?>

<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>My Reports</title>
		
		
		<style type="text/css">
			.center-content{
				width:76%;
			}
		</style>
	</head>
	<body>
		<div id="wrapperd">
			
			<div class="center-content">
				<ul class="nav nav-tabs">  
					<li id="standard_report" class="active reports_tabs"><a  href="#">Standard Reports</a> </li>   
					<li id="visiting_patient" class="reports_tabs"><a  href="#">Visiting Patients</a></li> 
					<li id="early_warning_indicators" class="reports_tabs"><a  href="#">Early Warning Indicators</a> </li>   
					<li id="drug_inventory" class="reports_tabs"><a  href="#">Drug Inventory</a></li>   
				</ul> 
				
				<div id="report_container">
					<?php echo $this->load->view('reports/report_home_types_v'); ?>
				</div>	
			</div>
		</div>
	</body>
</html>
