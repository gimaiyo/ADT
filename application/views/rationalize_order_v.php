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
	#reporting_period,#period_start_date,#period_end_date{
 		color: #00B831;
 		width:190px;
 	}
	.ui-datepicker-calendar {
    	display: none;
    }
	/**
	 * 	thead th div{
		transform:rotate(-40deg);
		-ms-transform:rotate(-40deg); /* IE 9 
		-webkit-transform:rotate(-40deg); /* Safari and Chrome 
	}
	 */

</style>
<script>
	$(document).ready(function() {
		
		//Set all input to be readonly
		//$("#generate_order").find("input").attr("readonly","readonly");
		//$(".research").find("input").attr("readonly","readonly");
		//$("#facility_info").find("input").attr("readonly","readonly");
		
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
		
		$("#reporting_period").datepicker({
			yearRange : "-120:+0",
			maxDate : "0D",
			changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
	        dateFormat: 'MM-yy',
        	onClose: function(dateText, inst) { 
	            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
	            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
	            
	            month=parseInt(month);
	            var last_day_month=LastDayOfMonth(year,month+1);
	            
	            $("#period_start_date").val("01");
	            $("#period_end_date").val(last_day_month);
	            $(this).datepicker('setDate', new Date(year, month, 1));
	        }
		});
		function LastDayOfMonth(Year, Month){
		    return(new Date((new Date(Year, Month,1))-1)).getDate();
		}
		
		//Validate order before submitting
		$("#approve_order").click(function(){
			if($(".label-warning").is(':visible')){
				alert("Some drugs have a negative resupply quantity !");
			}
			else{
				$("#transaction_type").attr("value",'approved')
				$("#fmEditOrder").submit();
			}
		});
		$("#decline_order").click(function(){
			if($(".label-warning").is(':visible')){
				alert("Some drugs have a negative resupply quantity !");
			}
			else{
				$("#transaction_type").attr("value",'declined')
				$("#fmEditOrder").submit();
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

		if(!(adjustments + 0)) {
			adjustments = 0;
		}
		if(!(physical_count + 0)) {
			physical_count = 0;
		} 
		calculated_physical = (opening_balance + quantity_received - quantity_dispensed + adjustments);
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
<form method="post" id="fmEditOrder" action="<?php echo site_url('order_rationalization/save')?>">
	<input type="hidden" id="transaction_type" name="transaction_type" >
	<input type="hidden" name="order_number" value="<?php echo $order_details->id;?>" />
	<div id="facility_info" class="header section">
		<table class="table table-bordered" >
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
					<th>District / County:</th>
					<td><span class="_green"><?php echo $order_details -> Facility_Object -> Parent_District -> Name;?> / <?php echo $order_details -> Facility_Object -> County -> county;?></span></td>
				</tr>
				<tr>
					<th>Reporting Period : </th>
					<td colspan="3"><input class="_green" name="reporting_period" id="reporting_period" type="text" value="<?php echo date('F-Y',strtotime($order_details->Period_Begin)); ?>"></td>
					<input name="start_date" id="period_start_date" type="hidden" value="<?php echo date('d',strtotime($order_details->Period_Begin));?>">
					<input name="end_date" id="period_end_date" type="hidden" value="<?php echo date('d',strtotime($order_details->Period_End));?>"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
	$header_text = '<thead>
<tr>
<!-- label row -->
<th class="col_drug" rowspan="2">Drug Name</th>
<th class="number" rowspan="2">Pack Size</th> <!-- pack size -->

<th class="number">Beginning Balance</th>
<th class="number">Quantity Received in this period</th>

<!-- dispensed_units -->
<th class="col_dispensed_units">Total Quantity Dispensed this period</th>
<!-- dispensed_packs -->

<th class="col_adjustments">Adjustments (Borrowed from or Issued out to Other Facilities)</th>
<th class="number">End of Month Physical Count</th>

<!-- aggr_consumed/on_hand -->
<th class="number">Quantity required for Resupply</th>
</tr>
<tr>
<!-- unit row -->
<th>In Packs</th> <!-- balance -->
<th>In Packs</th> <!-- received -->

<!-- dispensed_units -->
<th class="col_dispensed_units">In Packs</th>
<!-- dispensed_packs -->

<th>In Packs</th> <!-- adjustments -->
<th>In Packs</th> <!-- count -->

<!-- aggr_consumed/on_hand -->

<th>In Packs</th> <!-- resupply -->
</tr>
<tr>
<!-- letter row -->
<th></th> <!-- drug name -->
<th></th> <!-- packs size -->
<th>A</th> <!-- balance -->
<th>B</th> <!-- received -->
<th>C</th> <!-- dispensed_units/packs -->
<th>D</th> <!-- losses -->
<th>E</th> <!-- adjustments -->
<th>F</th> <!-- count -->

<!-- aggr_consumed/on_hand -->

</tr>
</thead>';
	?>
<div id="commodity-table">
	<table class="table table-bordered table_order_details" id="generate_order">
		<?php echo $header_text;?>
		<tbody>
			<?php
			$counter = 0;
			foreach($commodities as $commodity){
			$counter++;
			if($counter == 10){
			echo $header_text;
			$counter = 0;
			}
			?>
			<tr class="ordered_drugs" drug_id="<?php echo $commodity -> Drugcode_Object->id;?>">
				<td class="col_drug"><?php echo $commodity -> Drugcode_Object->Drug;?></td>
				<td class="number">
				<input id="pack_size" type="text" value="<?php echo $commodity -> Drugcode_Object -> Pack_Size;?>" class="pack_size">
				</td>
				<td class="number calc_count">
				<input name="opening_balance[]" id="opening_balance_<?php echo $commodity -> id;?>" type="text" class="opening_balance" value="<?php echo $commodity -> Balance;?>">
				</td>
				<td class="number calc_count">
				<input name="quantity_received[]" id="received_in_period_<?php echo $commodity -> id;?>" type="text" class="quantity_received" value="<?php echo $commodity -> Received;?>">
				</td>
				<!-- dispensed_units-->
				<td class="number col_dispensed_units calc_dispensed_packs  calc_resupply calc_count">
				<input name="quantity_dispensed[]" id="dispensed_in_period_<?php echo $commodity -> id;?>" type="text" class="quantity_dispensed" value="<?php echo $commodity -> Dispensed_Units;?>">
				</td>
				<td class="number calc_count">
				<input name="adjustments[]" id="CdrrItem_10_adjustments" type="text" class="adjustments" value="<?php echo $commodity -> Adjustments;?>">
				</td>
				<td class="number calc_resupply col_count">
				<input tabindex="-1" name="physical_count[]" id="CdrrItem_10_count" type="text" class="physical_count" value="<?php echo $commodity -> Count;?>">
				</td>
				<!-- aggregate -->
				<td class="number col_resupply">
				<input tabindex="-1" name="resupply[]" id="CdrrItem_10_resupply" type="text" class="resupply" value="<?php echo $commodity -> Resupply;?>">
				</td>
				<input type="hidden" name="commodity[]" value="<?php echo $commodity -> id;?>"/>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<br />
	<hr size="1">
	
	<div>
	<?php 
	$has_comment=0;
	foreach($comments as $comment){
		$has_comment=1;
		?>
	
		<span class="label" style="vertical-align: bottom">Comment </span>
		<textarea style="width:98%" rows="3" name="comments"><?php echo $comment->Comment ?></textarea>
		<table class="table table-bordered">
			<thead>
				<tr><th>Date</th><th>Made By</th><th>Access Level</th></tr>
			</thead>
			<tbody>
				<tr><td><span class="_green"><?php echo date('Y-m-d H:i:s', $comment -> Timestamp);?></span></td><td><span class="_green"><?php echo $comment -> User_Object -> Name;?></span></td><td><span class="_green"><?php echo $comment -> User_Object -> Access -> Level_Name;?></span></td></tr>
			</tbody>
		</table>
		
	<?php } 
	if($has_comment==0){
	?>
		<span class="label" style="vertical-align: bottom"> Add Comment </span>
		<textarea style="width:98%" rows="3" name="comments"></textarea>
	<?php	
	}
	?>
	<input type="button" class="save_changes btn btn-success btn-small" id="approve_order" value="Approve Order" name="approve_order" />
	<input type="button" class="save_changes btn btn-danger btn-small" id="decline_order" value="Decline Order" name="decline_order"/>
	</div>
</div>
	<table class=" table table-bordered regimen-table big-table research">
		<thead>
			<tr>
				<th class="col_drug" colspan="2"> Regimen </th>
				<th><input type="button" id="accordion_collapse" value="+"/></span>Patients<span></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$counter = 1;
			foreach($regimens as $regimen){

				?>
				<tr>
				<td colspan="2" regimen_id="<?php echo $regimen -> id;?>" class="regimen_desc col_drug"><?php echo $regimen -> Regimen_Object->Regimen_Desc;?></td>
				<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_numbers"><input name="patient_numbers[]" id="patient_numbers_<?php echo $regimen -> Regimen_Object-> id;?>" type="text" value="<?php echo $regimen ->  Total;?>"><input name="patient_regimens[]" value="<?php echo $regimen -> id;?>" type="hidden"></td>
				 
			</tr>
			<?php
			}
			?> 
		</tbody>
	</table> 
		
</form>
