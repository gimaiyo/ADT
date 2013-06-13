<script type="text/javascript">
	$(document).ready(function() {
		$("#regimens_table tbody tr").hide('slow');
		$('#accordion_collapse').click(function() {
			if($(this).val() == "-") {
				$("#regimens_table tbody tr").hide('slow');
				$('#accordion_collapse').val("+");
			} else {
				$("#regimens_table tbody tr").show('slow');
				$('#accordion_collapse').val("-");
			}

		});
	});

</script>
<style>
	#commodity-table {
		width: 70%;
		float: left;
	}
	
	
	.regimen-table {
		width: 28%;
		float: right;
	}
	.regimen-table tbody th {
		font-size: 14px;
		padding-left: 40px;
	}
	.regimen-table input {
		margin: 5px;
	}
	
	.big-table th. ,.big-table td {
		border:1px solid #000000;
		border-top:1px solid #000000;
		vertical-align: middle;
	}
	.big-table input {
		width: 60px;
	}
	.big-table td.number {
		text-align: center;
	}
	th div {
		font-size: 10px;
	}
	.button {
		width: 100px;
		margin: 10px;
	}
	
	#comments-section td {
		border: 0px;
	}
	#comments-section th {
		text-align: left !important;
	}
	td {
		word-wrap: break-word;
	}
	.col_drug {
		width: 400px !important;
		font-size: 13px;
	}
	.accordion{
		height:25px;
	}
	
	#facility_info{
		width:60%;
		margin:0 auto;
	}
	.table-bordered input{
		width:70px;
		height:23px;
		margin:0 auto;
	}
	#commodity-table tbody tr{
		font-size:14px;
		
	}
	tr.odd{
		background-color:rgb(244, 255, 240);
	}
	.regimen-table tbody td {
		font-size: 13px;
		color: #000;
		padding:5px;
	}
	
	.ui-state-active{
		background: #e6e6e6 url(images/ui-bg_glass_75_e6e6e6_1x400.png) 50% 50% repeat-x;
	}
	.regimen-table thead .col_drug{
		font-size:14px;
	}
	.dataTables_wrapper{
		width: auto;
		margin:0 auto;
	}
</style>
<div class="full-content">
<div id="facility_info" class="header section">
	<table class="table table-bordered table-striped" >
		<tbody>
			<tr>
				<th>Order No</th>
				<td><span class="_green"><?php echo $order_no ?></span></td>
			</tr>
			<tr>
				<th width="160px">Facility code:</th>
				<td><span class="_green"><?php echo $order_details -> Facility_Object -> facilitycode;?></span></td>
				<th width="140px">Facility Name:</th>
				<td><span class="_green"><?php echo $order_details -> Facility_Object -> name;?></span></td>
				
			</tr>
			<tr>
				<th>Facility Type:</th>
				<td><span class="_green"><?php echo $order_details -> Facility_Object -> Type -> Name;?></span></td>
				<th>District/County:</th>
				<td><span class="_green"><?php echo $order_details -> Facility_Object -> Parent_District -> Name;?>/<?php echo $order_details -> Facility_Object -> County -> county;?></span></td>
			</tr>
			<tr>
				<th>Reporting Period:</th>
				<td colspan="3" >From <span class="_green"><?php echo date("d-M-Y",strtotime($order_details -> Period_Begin));?></span> To <span class="_green"><?php echo date("d-M-Y",strtotime($order_details -> Period_End));?></span></td>
			</tr>
		</tbody>
	</table>
</div>
<?php
	$type = $order_details->Code;
	$unit = "In Units";
	if($type == "1"){
		$unit = "In Packs";
	}
	$header_text = '<thead>
	<tr>
	<!-- label row -->
	<th class="col_drug" rowspan="3">Drug Name</th>
	<th class="number" rowspan="3">Pack Size</th> <!-- pack size -->
	
	<th class="number">Beginning Balance</th>
	<th class="number">Qty Received</th>
	
	<!-- dispensed_units -->
	<th class="col_dispensed_units">Total Qty Dispensed</th>
	<th class="col_losses_units">Losses (Damages, Expiries, Missing)</th>
	<!-- dispensed_packs -->
	
	<th class="col_adjustments">Adjustments (Borrowed from or Issued out to Other Facilities)</th>
	<th class="number">End of Month Physical Count</th>
	
	<!-- aggr_consumed/on_hand -->
	<th class="number">Qty required for RESUPPLY</th>
	</tr>
	<tr>
	<!-- unit row -->
	<th>'.$unit.'</th> <!-- balance -->
	<th>'.$unit.'</th> <!-- received -->
	
	<!-- dispensed_units -->
	<th class="col_dispensed_units">'.$unit.'</th>
	<th class="col_dispensed_units">'.$unit.'</th>
	<!-- dispensed_packs -->
	
	<th>'.$unit.'</th> <!-- adjustments -->
	<th>'.$unit.'</th> <!-- count -->
	
	<!-- aggr_consumed/on_hand -->
	
	<th>'.$unit.'</th> <!-- resupply -->
	</tr>
	<tr>
	<!-- letter row -->
	<th>A</th> <!-- balance -->
	<th>B</th> <!-- received -->
	<th>C</th> <!-- dispensed_units/packs -->
	<th>D</th> <!-- losses -->
	<th>E</th> <!-- adjustments -->
	<th>F</th> <!-- count -->
	<th>G</th> <!-- count -->
	
	<!-- aggr_consumed/on_hand -->
	
	</tr>
	</thead>';
	?>
<div id="commodity-table">
	<table class="table table-bordered table_order_details">
		<?php echo $header_text;?>
		<tbody>
			<?php
			$counter = 0;
			foreach($commodities as $commodity){
			$counter++;
			if($counter == 10){
			//echo $header_text;
			$counter = 0;
			}
			?>
			<tr class="ordered_drugs" drug_id="<?php echo $commodity -> Drugcode_Object -> id;?>">
				<td class="col_drug"><?php echo $commodity -> Drugcode_Object -> Drug; if($commodity -> Drugcode_Object -> Drug==""){echo $commodity ->Drug_Id;}?></td>
				<td class="number"><?php echo $commodity -> Drugcode_Object -> Pack_Size;?></td>
				<td class="number calc_count"><?php echo $commodity -> Balance;?></td>
				<td class="number calc_count"><?php echo $commodity -> Received;?></td>
				<!-- dispensed_units-->
				<td class="number col_dispensed_units calc_dispensed_packs  calc_resupply calc_count"><?php echo $commodity -> Dispensed_Units;?></td>
				<td class="number calc_count"><?php echo $commodity -> Losses;?></td>
				<td class="number calc_count"><?php echo $commodity -> Adjustments;?></td>
				<td class="number calc_resupply col_count"><?php echo $commodity -> Count;?></td>
				<!-- aggregate -->
				<td class="number col_resupply"><?php echo $commodity -> Resupply;?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<br />
	<hr size="1">
	<?php foreach($comments as $comment){?>
	<div>
		<span class="label" style="vertical-align: bottom">Comments </span>
		<textarea style="width:98%" rows="3" name="comments" readonly="readonly"><?php echo $comment->Comment ?></textarea>
		<table class="table table-bordered">
			<thead>
				<tr><th>Date</th><th>Made By</th><th>Access Level</th></tr>
			</thead>
			<tbody>
				<tr><td><span class="_green"><?php echo date('Y-m-d H:i:s', $comment -> Timestamp);?></span></td><td><span class="_green"><?php echo $comment -> User_Object -> Name;?></span></td><td><span class="_green"><?php echo $comment -> User_Object -> Access -> Level_Name;?></span></td></tr>
			</tbody>
		</table>
		
	</div>
	<?php } ?>
</div>

<table class=" table table-bordered regimen-table big-table research" id="regimens_table">
	<thead>
		<tr>
			<th class="col_drug"> Regimen </th>
			<th><input type="button" id="accordion_collapse" value="+"/></span>  Patients<span></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter = 1;
		foreach($regimens as $regimen){
		?>
		<tr>
			<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_desc col_drug"><?php echo $regimen -> Regimen_Object -> Regimen_Desc;?></td>
			<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_numbers"><?php echo $regimen -> Total;?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
</div>
