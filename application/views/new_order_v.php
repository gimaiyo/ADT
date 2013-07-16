
<script>
	$(document).ready(function() {
		//initDatabase();

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
		
		function convertDate(stringdate){
		    // Internet Explorer does not like dashes in dates when converting, 
		    // so lets use a regular expression to get the year, month, and day 
		    var DateRegex = /([^-]*)-([^-]*)-([^-]*)/;
		    var DateRegexResult = stringdate.match(DateRegex);
		    var DateResult;
		    var StringDateResult = "";
		
		    // try creating a new date in a format that both Firefox and Internet Explorer understand
		    try
		    {
		        DateResult = new Date(DateRegexResult[2]+"/"+DateRegexResult[3]+"/"+DateRegexResult[1]);
		    } 
		    // if there is an error, catch it and try to set the date result using a simple conversion
		    catch(err) 
		    { 
		        DateResult = new Date(stringdate); 
		    }
			
			var _month=DateResult.getMonth()+1;
			if(parseInt(DateResult.getMonth()+1)<10){
				_month="0"+parseInt((DateResult.getMonth()+1));
			}
			
		    // format the date properly for viewing
		    StringDateResult =(DateResult.getFullYear())+"-"+_month;
		
		    return StringDateResult;
		}
		
		$("#generate").click(function() {
			//When get dispensing button is clicked, remove pagination
			var oTable=$('#generate_order').dataTable({
				"sDom": "<'row'r>t<'row'<'span5'i><'span7'p>>",
				"iDisplayStart": 4000,
				"iDisplayLength": 4000,
				"sPaginationType": "bootstrap",
				"bSort": false,
				'bDestroy':true
			});
			//Put the comment section after the order details table
			
			
			var reporting_period=$("#reporting_period").attr("value");
			reporting_period=convertDate(reporting_period);
			var start_date =reporting_period+"-"+ $("#period_start_date").attr("value");
			var end_date =reporting_period+"-"+ $("#period_end_date").attr("value");
			var count=0;
			
			//Do the calculation to get dispensing data
			$.each($(".ordered_drugs"), function(i, v) {
				getPeriodDrugBalance($(this).attr("drug_id"), start_date, end_date, function(transaction, results) {
					count++;
					var row = results.rows.item(0);
					var total_received = row['total_received'];
					var total_dispensed = row['total_dispensed'];
					var total_received_div = "#received_in_period_" + row['drug'];
					var total_dispensed_div = "#dispensed_in_period_" + row['drug'];
					$(total_received_div).attr("value", total_received);
					$(total_dispensed_div).attr("value", total_dispensed);
					calculateResupply($(total_dispensed_div));
					//Once the calculations are done for the whole table, put back the pagination
					if($(".ordered_drugs").length==count){
						$('#generate_order').dataTable({
								"sDom": "<'row'r>t<'row'<'span5'i><'span7'p>>",
								"sPaginationType": "bootstrap",
								"bSort": false,
								'bDestroy':true
						});
					}
				});
				
			});
			
			
			
			
			getPeriodRegimenPatients(start_date, end_date, function(transaction, results) {
				//Loop through all the regimen information returned and populate the appropriate fields
				for(var i = 0; i < results.rows.length; i++) {
					var row = results.rows.item(i);
					var total_patients = row['patients'];
					var total_patients_div = "#patient_numbers_" + row['regimen'];
					$(total_patients_div).attr("value", total_patients);
				}

			});
			getPeriodRegimenMos(start_date, end_date, function(transaction, results) {
				//Loop through all the regimen information returned and populate the appropriate fields
				for(var i = 0; i < results.rows.length; i++) {
					var row = results.rows.item(i);
					var total_mos = row['total_mos'];
					var total_mos_div = "#mos_" + row['regimen'];
					$(total_mos_div).attr("value", total_mos);
				}

			});
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
				$("#fmNewSatellite").submit();
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
		width:80%;
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

</style>


<form method="post" id="fmNewSatellite" action="<?php echo site_url('order_management/save')?>">
	<?php
	if ($facility_object -> supported_by == "1") {
		$supporter = "GOK";
	}
	if ($facility_object -> supported_by == "2") {
		$supporter = "PEPFAR";
	}
	if ($facility_object -> supported_by == "3") {
		$supporter = "MSF";
	}
	$p=0;
	if ($facility_object -> service_art == "1") {
		$p=1;
		$type_of_service = "ART";
	}
	if ($facility_object -> service_pmtct == "1") {
		if($p==1){$type_of_service .= ",PMTCT";}
		else{$type_of_service .= "PMTCT";$p=1;}
		
	}
	if ($facility_object -> service_pep == "1") {
		if($p==1){$type_of_service .= ",PEP";}
		else {$type_of_service .= "PEP";}	
		
	}
	?>
	<div id="facility_info" class="header section">
		<table class="table table-bordered" >
			<tbody>
				<tr>
					<input type="hidden" name="facility_id" value="<?php echo $facility_object -> facilitycode;?>" />
					<input type="hidden" name="central_facility" value="<?php echo $facility_object -> parent;?>" />
					<input type="hidden" name="order_type" value="2"/>
					<th width="180px">Facility code:</th>
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
					<th>Programme Sponsor:</th>
					<td><span name="sponsors" id="Cdrr_sponsors" class="_green"><?php echo $supporter;?></span></td>
					<th>Service provided:</th>
					<td><span name="services" id="Cdrr_services" class="_green"><?php echo $type_of_service;?></span></td>
				</tr>
				<tr>
					<th>Reporting Period : </th><td><input class="_green" name="reporting_period" id="reporting_period" type="text" placeholder="Click here to select period"></td>
					<input name="start_date" id="period_start_date" type="hidden">
					<input name="end_date" id="period_end_date" type="hidden"></td>
					<td colspan="2"><?php
						$logged_in_facility = $this -> session -> userdata('facility_id');
						$ordering_facility = $facility_object->id;
						if($logged_in_facility == $ordering_facility){
						?>
						<input style="width: auto" name="generate" id="generate" class="btn btn-success btn-small" value="Get Dispensing Data" >
						<?php }?>
					</td>
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
	<th>In Units</th> <!-- balance -->
	<th>In Units</th> <!-- received -->
	
	<!-- dispensed_units -->
	<th class="col_dispensed_units">In Units</th>
	<th class="col_dispensed_units">In Units</th>
	<!-- dispensed_packs -->
	
	<th>In Units</th> <!-- adjustments -->
	<th>In Units</th> <!-- count -->
	
	<!-- aggr_consumed/on_hand -->
	
	<th>In Units</th> <!-- resupply -->
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
			foreach($commodities as $commodity){
				if($commodity -> Drug !=NULL){
			$counter++;
			if($counter ==10){
			//echo $header_text;
			$counter = 0;
			}
			?>
			<tr class="ordered_drugs" drug_id="<?php echo $commodity -> id;?>">
				<td class="col_drug"><?php echo $commodity -> Drug;?></td>
				<td class="number">
				<input id="pack_size" type="text" value="<?php echo $commodity -> Pack_Size;?>" class="pack_size">
				</td>
				<td class="number calc_count">
				<input name="opening_balance[]" id="opening_balance_<?php echo $commodity -> id;?>" type="text" class="opening_balance">
				</td>
				<td class="number calc_count">
				<input name="quantity_received[]" id="received_in_period_<?php echo $commodity -> id;?>" type="text" class="quantity_received">
				</td>
				<!-- dispensed_units-->
				<td class="number col_dispensed_units calc_dispensed_packs  calc_resupply calc_count">
				<input name="quantity_dispensed[]" id="dispensed_in_period_<?php echo $commodity -> id;?>" type="text" class="quantity_dispensed">
				</td>
				
				<td class="number col_dispensed_units calc_dispensed_packs  calc_resupply calc_count">
				<input name="losses[]" id="losses_in_period_<?php echo $commodity->id;?>" type="text" class="losses">
				</td>
				
				<td class="number calc_count">
				<input name="adjustments[]" id="CdrrItem_10_adjustments" type="text" class="adjustments">
				</td>
				<td class="number calc_resupply col_count">
				<input tabindex="-1" name="physical_count[]" id="CdrrItem_10_count" type="text" class="physical_count">
				</td>
				<!-- aggregate -->
				<td class="number col_resupply">
				<input tabindex="-1" name="resupply[]" id="CdrrItem_10_resupply" type="text" class="resupply">
				</td>
				<input type="hidden" name="commodity[]" value="<?php echo $commodity -> id;?>"/>
			</tr>
			<?php }}?>
		</tbody>
	</table>
	</div>
	
	<div id="comment_section">
		<br />
		<hr size="1">
		<span class="label" style="vertical-align: bottom">Comment </span>
		<textarea style="width:98%" rows="4" name="comments"></textarea>
		<input type="button" id="save_changes" class="btn btn-success btn-large" value="Submit Order" name="save_changes"  />
	</div>
</div>

	<table class=" table table-bordered regimen-table big-table research">
		<thead>
			<tr>
				<th class="col_drug" colspan="2"> Regimen </th>
				<th><input type="button" id="accordion_collapse" value="+"/></span>Patients<span></th>
			</tr>
		</thead>
		<?php
		$counter = 1;
		foreach($regimen_categories as $category){
		?>
		<tbody>
			<?php

			$regimens = $category -> Regimens;
			?><tr class="accordion"><th colspan="3" ><?php echo $category -> Name;?></th></tr><?php
			foreach($regimens as $regimen){?>
			<tr>
				<td style="border-right:2px solid #DDD;"><?php echo $regimen -> Regimen_Code;?></td>
				<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_desc col_drug"><?php echo $regimen -> Regimen_Desc;?></td>
				<td regimen_id="<?php echo $regimen -> id;?>" class="regimen_numbers">
				<input name="patient_numbers[]" id="patient_numbers_<?php echo $regimen -> id;?>" type="text">
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
	</table>
	
</form>
