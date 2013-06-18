<style>
	#patient_listing {
		margin: 0 auto;
		border-top: 1px solid #B9B9B9;
		font-size: 13px;
		letter-spacing: 0.8px;
	}
	#patient_listing td th {
		padding: 10px;
	}
	#patient_listing td {
		padding: 0.25em;
		text-align: left;
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
	@media screen {
		div#footer {
			display: none;
		}
	}
	@media print {
		#inf_patient_listing {
			display: none;
		}
		.fltrow {
			display: none;
		}
		div.#footer {
			position: fixed;
			height: 200px; /* put the image height here */
			width: 90%;
			bottom: 0;
		}
	}
	#date_of_starting {
		color: rgb(45, 173, 13);
		font-size: 14px;
		border: none;
		font-weight: 800;
		width: 110px;
		padding-bottom: 0px;
		height: 25px;
	}
	#date_of_starting:hover {
		cursor: pointer;
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
<h4 style="text-align: center">Listing of Patients Who Started Between
<input type="text" class="_date" id="start_date" value="<?php echo $from;?>">
AND
<input type="text" class="_date" id="end_date" value="<?php echo $to;?>">
</h4>
<hr size="1" style="width:80%">
<table align='center'  width='20%' style="font-size:16px; margin-bottom: 20px">
	<tr>
		<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="total_count"><?php echo $all_count; ?></span></h5></td>
	</tr>
</table>
<div id="appointment_list">
	<?php echo $dyn_table;?>
</div>
<!-- Pop up Window -->
<div class="result"></div>
<!-- Pop up Window end-->
	