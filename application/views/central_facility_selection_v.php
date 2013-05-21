<script>
$(document).ready(function() { 
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
		
		
		
});
</script>
<style>
	
	#commodity-table {
		width: 70%;
		float: left;
	}
	
	#proceed{
		width:120px;
		height:40px;
		text-align:center;
		vertical-align:middle;
		font-size:14px;
		font-weight:bold;
	}
 	table td{
 		color: #00B831;
 	}
 	#reporting_period,#period_start_date,#period_end_date{
 		color: #00B831;
 	}
	.ui-datepicker-calendar {
    	display: none;
    }
</style>
<div class="alert-bootstrap alert-info">
    <b>Select the period that you want to create an order for then click 'Proceed'</b>
</div>
<?php
echo validation_errors('
<p class="error">','</p>
'); 
?>
<form  action="<?php echo base_url().'order_management/new_central_order'?>" method="post" style="margin:0 auto; width:700px;">
		<table class="table" >
			<tbody>
				<tr>
					<th>Facility code:</th><td><?php echo $facility_object->facilitycode;?></td>
				</tr>
				<tr>
					<input type="hidden" name="facility_id" value="<?php echo $facility_object->id;?>" />
					<input type="hidden" name="central_facility" value="<?php echo $facility_object->parent;?>" />
					<th>Facility Name:</th><td><?php echo $facility_object->name;?></td>
				</tr>
				
				<tr>
					<th>District:</th><td><?php echo $facility_object->Parent_District->Name;?></td>
				</tr>
				<tr>
					<th>County:</th><td><?php echo $facility_object ->County->county;?></td>
				</tr>
				<tr>
					<th>Reporting Period : </th><td><input name="reporting_period" id="reporting_period" type="text"></td>
					<input name="start_date" id="period_start_date" type="hidden">
					<input name="end_date" id="period_end_date" type="hidden"></td>
				</tr>
				
					<th colspan='4' align="center">
						<input type="submit" class="btn btn-large" name="btn_period_select_proceed" id="proceed" value="Proceed">
					</th>
				</tr>
			</tbody>
		</table> 
</form>