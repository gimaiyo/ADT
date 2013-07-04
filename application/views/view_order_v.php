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

<div class="full-content" style="background:#9CF">
<div class="facility_info">
	<table class="table table-bordered table-striped" style="width:60%;margin:auto">
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
	<table class="table table-bordered table_order_details ">
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
