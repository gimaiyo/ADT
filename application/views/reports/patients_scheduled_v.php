<style>
	
	#patient_listing td th {
		padding: 10px;
	}
	#patient_listing td {
		padding: 0.25em;
	}
	select.flt {
		font-size: 14px;
	}
	h5 {
		margin: 10px;
	}
	.report_title {
		color: rgb(34, 86, 253);
		letter-spacing: 1px;
	}
	h2 {
		margin: 0.5em;
	}
	h4 {
		font-size: 18px;
	}
	.odd {
		background-color: rgb(226, 232, 255);
	}
	hr {
		margin: 0 auto;
	}
	select.pgSlc {
		height: 30px;
		width: 60px;
	}

</style>
<script type="text/javascript">
	$(document).ready( function () {
		
		$('#patient_listing').dataTable( {
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
		
	} );
</script>

<h4 style="text-align: center">Listing of Patients Expected to Visit Between
<span id="start_date"><?php echo $from; ?></span> And <span id="end_date"><?php echo $to; ?></span>
</h4>
<hr size="1" style="width:80%">
<table align='center'  width='50%' style="font-size:16px; margin-bottom: 20px">
	<tr>
		<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="total_count"><?php echo $all_count;?></span></h5></td>
	</tr>
	<tr style="text-align: center">
		<td colspan="2"><h5 class="report_title" style="text-align: center; display:inline;color:green;">Visited: <span id="total_visited_count"><?php echo $visited;?></span></h5><h5 class="report_title" style="text-align: center;display:inline; color:red;">Not Visited: <span id="total_not_visited_count"><?php echo $not_visited;?></span></h5><h5 class="report_title" style="text-align: center;display:inline; color:blue;">Visited Later: <span id="total_visted_later_count"><?php echo $visited_later;?></span></h5></td>
	</tr>
</table>
<div id="appointment_list">
	<?php echo $dyn_table; ?>
</div>
<!-- Pop up Window -->
<div class="result"></div>
<!-- Pop up Window end-->
	