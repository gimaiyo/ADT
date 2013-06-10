<script type="text/javascript">
	
	$(document).ready( function () {
		$('.listing_table').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "patient_management/listing",
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



<?php 
//COunt number of patients
?>
<div class="main-content">
	
	<div class="center-content">
		<table class="table table-bordered table-striped listing_table" style="font-size:0.8em">
			<thead>
				<tr>
					<th style="width: 45px">CCC No</th><th>Patient Name</th><th>Phone No</th><th style="width: 100px">Date Enrolled</th><th style="width: 100px">Next Appointment</th><th>Current Regimen</th><th style="width:150px">Status</th><th style="width: 140px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
</div>
