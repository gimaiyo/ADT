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
	.center-content{
		width:78%;
		margin:0px;
	}
	
</style>

<?php 
//COunt number of patients
$count_patient=count($patients);
?>
<div class="main-content">
	
	<div class="center-content">
		<table class="table table-bordered table-striped listing_table" style="font-size:0.8em">
			<thead>
				<tr>
					<th style="width: 45px">CCC No</th><th>Patient Name</th><th style="width: 100px">Next Appointment</th><th>Phone No</th><th style="width: 100px">Date Enrolled</th><th>Current Regimen</th><th style="width:150px">Status</th><th style="width: 140px">Action</th>
				</tr>
			</thead>
			<tbody>
		<?php
		foreach ($patients as $patient) {
			?>
			<tr><td><?php echo $patient->Patient_Number_CCC ?></td>
				<td><?php echo strtoupper($patient->First_Name.' '.$patient->Last_Name.' '.$patient->Other_Name) ?></td>
				<td><?php echo date("d-M-Y",strtotime($patient->NextAppointment)) ?></td>
				<td><?php echo $patient->Phone ?></td>
				<td><?php echo date("d-M-Y",strtotime($patient->Date_Enrolled)) ?></td>
				<td><?php echo $patient->Parent_Regimen['Regimen_Desc'] ?></td>
				<td><?php echo $patient->Parent_Status->Name ?></td>
				<td><a href="">Detail</a> | <a href="<?php echo base_url().'patient_management/edit/'.$patient->id ?>">Edit</a> | <a href="">Disable</a></td>
			</tr>
			<?php
		}
		?>
			</tbody>
		</table>
	</div>
	
</div>
