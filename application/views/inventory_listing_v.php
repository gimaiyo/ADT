<script type="text/javascript">
	
	$(document).ready( function () {
		
		$('#store_table').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "inventory_management/main_store_stock",
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
		$('#pharmacy_table').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "inventory_management/pharmacy_store_stock",
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
		
		$("#pharmacy_table_wrapper").css("display","none");
		$("#pharmacy_table").css("display","none");
		
		
		$("#store_btn").click(function(){
			$("#pharmacy_btn").removeClass();
			$(this).addClass("active");
			$("#pharmacy_table").hide();
			$("#pharmacy_table_wrapper").hide();
			$("#store_table").show();
			$("#store_table_wrapper").show();
			
		});
		$("#pharmacy_btn").click(function(){
			$("#store_btn").removeClass();
			$(this).addClass("active");
			$("#store_table").hide();
			$("#store_table_wrapper").hide();
			$("#pharmacy_table").show();
			$("#pharmacy_table_wrapper").show();
			
		});
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
		<ul class="nav nav-tabs">  
			<li id="store_btn" class="active"><a  href="#">Store Inventory</a> </li>   
			<li id="pharmacy_btn"><a  href="#">Pharmacy Inventory</a></li>   
		</ul> 
		<table id="store_table" class="table table-bordered table-striped listing_table" style="font-size:0.8em">
			<thead>
				<tr>
					<th style="min-width: 280px">Commodity</th><th>Generic Name</th><th>QTY/SOH</th><th>Unit</th><th>Pack Size</th><th>Supporter</th><th>Dose</th><th style="width: 140px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<table id="pharmacy_table" class="table table-bordered table-striped listing_table" style="font-size:0.8em">
			<thead>
				<tr>
					<th style="min-width: 280px">Commodity</th><th>Generic Name</th><th>QTY/SOH</th><th>Unit</th><th>Pack Size</th><th>Supporter</th><th>Dose</th><th style="width: 140px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
</div>
