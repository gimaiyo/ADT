<script>
	$(document).ready(function() {
		
		$(".accordion").accordion();

		var $research = $('.research');
		$research.find("tr").not('.accordion').hide();
		$research.find("tr").eq(0).show();

		$research.find(".accordion").click(function() {
			$research.find('.accordion').not(this).siblings().fadeOut(500);
			$(this).siblings().fadeToggle(500);
		}).eq(0).trigger('click');
		
		$('#accordion_collapse').click(function() {
			if($(this).val() == "+") {
				var $research = $('.research');
				$research.find("tr").show();
				$('#accordion_collapse').val("-");
			}else{
				var $research = $('.research');
				$research.find("tr").not('.accordion').hide();
				$research.find("tr").eq(0).show();
				$('#accordion_collapse').val("+");
			}
             
		});
		
		//Validate order before submitting
		$("#save_changes").click(function(){
			var oTable=$('#generate_order').dataTable({
				"sDom": "<'row'r>t<'row'<'span5'i><'span7'p>>",
				"iDisplayStart": 4000,
				"iDisplayLength": 4000,
				"sPaginationType": "bootstrap",
				"bSort": false,
				'bDestroy':true
			});
			if($(".label-warning").is(':visible')){
				alert("Some drugs have a negative resupply quantity !");
			}
			else{
				$("#fmNewAggregated").submit();
			}
		});
		
		$(".pack_size").live('change',function() {
			calculateResupply($(this));
		});
		$(".opening_balance").live('change',function() {
			calculateResupply($(this));
		});
		$(".quantity_received").live('change',function() {
			calculateResupply($(this));
		});
		$(".quantity_dispensed").live('change',function() {
			calculateResupply($(this));
		});
		$(".losses").live('change',function() {
			calculateResupply($(this));
		});
		$(".adjustments").live('change',function() {
			calculateResupply($(this));
		});
		$(".physical_count").live('change',function() {
			calculateResupply($(this));
		});
	});
	function calculateResupply(element) {
		var row_element = element.closest("tr");
		var opening_balance = parseInt(row_element.find(".opening_balance").attr("value"));
		var quantity_received = parseInt(row_element.find(".quantity_received").attr("value"));
		var quantity_dispensed = parseInt(row_element.find(".quantity_dispensed").attr("value"));
		var losses = parseInt(row_element.find(".losses").attr("value"));
		var adjustments = parseInt(row_element.find(".adjustments").attr("value"));
		var physical_count = parseInt(row_element.find(".physical_count").attr("value"));
		var resupply = 0;
		if(!(opening_balance + 0)) {
			opening_balance = 0;
		}
		if(!(quantity_received + 0)) {
			quantity_received = 0;
		}
		if(!(quantity_dispensed + 0)) {
			quantity_dispensed = 0;
		}
		if(!(losses + 0)) {
			losses = 0;
		}

		if(!(adjustments + 0)) {
			adjustments = 0;
		}
		if(!(physical_count + 0)) {
			physical_count = 0;
		}
		calculated_physical = (opening_balance + quantity_received - quantity_dispensed - losses + adjustments);
		//console.log(calculated_physical);
		if(element.attr("class") == "physical_count") {
		 resupply = 0 - physical_count;
		 } else {
		 resupply = 0 - calculated_physical;
		 physical_count = calculated_physical;
		 }
		resupply = (quantity_dispensed * 3) - physical_count;
		
		resupply=parseInt(resupply);
		row_element.find('.label-warning').remove();
		if(resupply<0){
			row_element.find('.col_drug').append("<span class='label label-warning' style='display:block'>Warning! Resupply qty cannot be negative</<span>");
			row_element.find(".resupply").css("background-color","#f89406");
		}
		else{
			row_element.find(".resupply").css("background-color","#fff");
		}
		row_element.find(".physical_count").attr("value", physical_count);
		row_element.find(".resupply").attr("value", resupply);
	}
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
		font-size:10px;
		
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
	/**
	 * 	thead th div{
		transform:rotate(-40deg);
		-ms-transform:rotate(-40deg); /* IE 9 
		-webkit-transform:rotate(-40deg); /* Safari and Chrome 
	}
	 */

</style>
<div class="full-content">
<div class="alert-bootstrap alert-info">
   Aggregated order for order(s) No <span class="_green"><?php echo $order_nos; ?></span>. Make any changes you deem neccessary then click on 'Submit' at the bottom. <b>Note:</b> The units have been converted to packs
</div>

<form method="post" id="fmNewAggregated" action="<?php echo site_url('order_management/save')?>">
	<?php echo $aggregated_order_ids; ?>
	<div id="facility_info" class="header section">
		<table class="table table-bordered"  >
			<tbody>
				<tr>
					<input type="hidden" name="facility_id" value="<?php echo $facility_object -> facilitycode;?>" />
					<input type="hidden" name="central_facility" value="<?php echo $facility_object -> parent;?>" />
					<input type="hidden" name="order_type" value="1"/>
					<th width="160px">Facility code:</th>
					<td><span class="_green"><?php echo $facility_object -> facilitycode;?></span></td>
					<th width="160px">Facility Name:</th>
					<td><span class="_green"><?php echo $facility_object -> name;?></span></td>
					
				</tr>
				<tr>
					<th>County:</th>
					<td><span class="_green"><?php echo $facility_object ->County->county;?></span></td>
					<th>District:</th>
					<td><span class="_green"><?php echo $facility_object -> Parent_District -> Name;?></span></td>
				</tr>
				<tr>
					<input name="start_date" id="start_date" type="hidden" value="<?php echo date("d",strtotime($start_date));?>">
					<input name="end_date" id="end_date" type="hidden" value="<?php echo date("d",strtotime($end_date));?>">
					<input name="reporting_period" id="reporting_period" type="hidden" value="<?php echo date("M-Y",strtotime($end_date));?>">
					<th>Reporting Period:</th>
					<td colspan="3" >From <span class="_green"><?php echo date("d-M-Y",strtotime($start_date));?></span> To <span class="_green"><?php echo date("d-M-Y",strtotime($end_date));?></span></td>
					
				</tr>
			</tbody>
		</table>
	</div>
	<?php
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
	<th class="number">Qty required for Resupply</th>
	</tr>
	<tr>
	<!-- unit row -->
	<th>In Packs</th> <!-- balance -->
	<th>In Packs</th> <!-- received -->
	
	<!-- dispensed_units -->
	<th class="col_dispensed_units">In Packs</th>
	<th class="col_dispensed_units">In Packs</th>
	<!-- dispensed_packs -->
	
	<th>In Packs</th> <!-- adjustments -->
	<th>In Packs</th> <!-- count -->
	
	<!-- aggr_consumed/on_hand -->
	
	<th>In Packs</th> <!-- resupply -->
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
	<div>
	<table class="table table-bordered table_order_details" id="generate_order">
		<?php echo $header_text;?>
		<tbody>
			<?php
			$counter = 0;
			$x=1;
			foreach($commodities as $commodity){
			$cdrr_values = array("balance"=>'',"received"=>'',"dispensed_units"=>'',"dispensed_packs"=>'',"losses"=>'',"adjustments"=>'',"resupply"=>'',"count"=>'');
			//check if this drug has aggregated data available
			if(isset($cdrr_totals[$commodity->id])){
			$cdrr_values = $cdrr_totals[$commodity->id];
			}
			$counter++;
			if($counter == 10){
			//echo $header_text;
			$counter = 0;
			}
			?>
			<tr class="ordered_drugs <?php if($x%2==0){?>even<?php }else{?>odd<?php } ?>" drug_id="<?php echo @$commodity -> id;?>">
				<td class="col_drug" style="width:400px"><?php echo @$commodity -> Drug;?></td>
				<td class="number">
				<input id="pack_size" type="text" value="<?php echo @$commodity -> Pack_Size;?>" class="pack_size">
				</td>
				<td class="number calc_count">
				<input name="opening_balance[]" id="opening_balance_<?php echo @$commodity -> id;?>" type="text" class="opening_balance" value="<?php echo @ceil($cdrr_values['balance']/$commodity -> Pack_Size);?>">
				</td>
				<td class="number calc_count">
				<input name="quantity_received[]" id="received_in_period_<?php echo @$commodity -> id;?>" type="text" class="quantity_received" value="<?php echo @ceil($cdrr_values['received']/@$commodity -> Pack_Size);?>">
				</td>
				<!-- dispensed_units-->
				<td class="number col_dispensed_units calc_dispensed_packs  calc_resupply calc_count">
				<input name="quantity_dispensed[]" id="dispensed_in_period_<?php echo @$commodity -> id;?>" type="text" class="quantity_dispensed" value="<?php echo @ceil($cdrr_values['dispensed_units']/@$commodity -> Pack_Size);?>">
				</td>
				
				<td class="number col_dispensed_units calc_dispensed_packs  calc_resupply calc_count">
				<input name="losses[]" id="losses_in_period_<?php echo @$commodity -> id;?>" type="text" class="losses" value="<?php echo @ceil($cdrr_values['losses']/@$commodity -> Pack_Size);?>">
				</td>
				
				<td class="number calc_count">
				<input name="adjustments[]" id="CdrrItem_10_adjustments" type="text" class="adjustments" value="<?php echo @ceil($cdrr_values['adjustments']/@$commodity -> Pack_Size);?>">
				</td>
				<td class="number calc_resupply col_count">
				<input tabindex="-1" name="physical_count[]" id="CdrrItem_10_count" type="text" class="physical_count" value="<?php echo @ceil($cdrr_values['count']/@$commodity -> Pack_Size);?>">
				</td>
				<!-- aggregate -->
				<td class="number col_resupply">
				<input tabindex="-1" name="resupply[]" id="CdrrItem_10_resupply" type="text" class="resupply" value="<?php echo @ceil($cdrr_values['resupply']/@$commodity -> Pack_Size);?>">
				</td>
				<input type="hidden" name="commodity[]" value="<?php echo $commodity -> id;?>"/>
			</tr>
			<?php 
			$x++;
			}?>
		</tbody>
	</table>
	</div>
	
	<div>
		<br />
		<hr size="1">
		<span class="label" style="vertical-align: bottom">Comments </span>
		<textarea style="width:98%" rows="4" name="comments"></textarea>
		<input type="button" id="save_changes" class="btn btn-success btn-large" value="Submit Order" name="save_changes"  />
	</div>
	
	
</div>
	
	<table class=" table table-bordered regimen-table big-table research">
		<thead>
			<tr>
				<th class="col_drug"> Regimen </th>
				<th><input type="button" id="accordion_collapse" value="+"/></span>  Patients<span></th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			$counter = 1;
			foreach($regimen_categories as $category){
				?>
			<tbody>
				<?php
				$regimens = $category->Regimens;
							?><tr class="accordion"><th colspan="2" style="text-align:left"><?php echo $category -> Name;?></th></tr><?php
				foreach($regimens as $regimen){
				$maps_values = array("total"=>'');
				//check if this drug has aggregated data available
				if(isset($maps_totals[$regimen->id])){
				$maps_values = $maps_totals[$regimen->id];
				}
				?>

				<tr>
					<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_desc col_drug"><?php echo $regimen -> Regimen_Desc;?></td>
					<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_numbers">
					<input name="patient_numbers[]" id="patient_numbers_<?php echo $regimen -> id;?>" type="text" value="<?php echo $maps_values['total'];?>">
					<input name="patient_regimens[]" value="<?php echo $regimen -> id;?>" type="hidden">
					</td>
				</tr>
				<?php
				}
			?>
			</tbody>
			<?php
				}
			?> 
		</tbody>
	</table>
	
</form>
</div>