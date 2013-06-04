<script type="text/javascript">
	
	$(document).ready( function () {
		$('.listing_table').dataTable( {
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
	} );

</script>
<?php
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;
$user_is_facilityadmin = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
}
if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

}
if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
if ($access_level == "facility_administrator") {
	$user_is_facilityadmin = true;
}
?>

<style>
	.dataTables_wrapper{
		width:100%;
		
	}
	
</style>

<div class="main-content">
	

	<div class="left-content" style="float: left">

		<h3>Quick Links</h3>
		<ul class="nav nav-list">
			<?php 
			if($user_is_pharmacist){
				?>
				
				<li><a>User Manual</a></li>			
			    <li><a>Main Site Report</a></li>
				<?php
			}
			
			if($user_is_facilityadmin){
				?>
				<li><a>Add Patients</a></li>
			    <li><a>Add Inventory</a></li>
			    <li class="divider"></li>
				<li><a>User Manual</a></li>			
			    <li><a>Main Site Report</a></li>
				
				<?php
			}
				?>
			
			
			
		</ul>
		
	</div>
	
	<div class="center-content">
		<table class="table table-bordered table-striped listing_table" style="font-size: 14px">
			<thead>
				<tr>
					<th>CCC Number</th><th>Patient Name</th><th>DOB</th><th>Phone Number</th><th>Date Enrolled</th><th>Current Regimen</th><th>Status</th><th style="width: 150px">Action</th>
				</tr>
			</thead>
			<tbody>
		<?php
		foreach ($patients as $patient) {
			?>
			<tr><td><?php echo $patient->Patient_Number_CCC ?></td>
				<td><?php echo $patient->First_Name.' '.$patient->Last_Name.' '.$patient->Other_Name ?></td>
				<td><?php echo date("d-M-Y",strtotime($patient->Dob)) ?></td>
				<td><?php echo $patient->Phone ?></td>
				<td><?php echo date("d-M-Y",strtotime($patient->Date_Enrolled)) ?></td>
				<td><?php echo $patient->Parent_Regimen['Regimen_Desc'] ?></td>
				<td><?php echo $patient->Parent_Status->Name ?></td>
				<td><a href="">Detail</a> | <a href="">Edit</a> | <a href="">Disable</a></td>
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
	</div>
	
</div>
