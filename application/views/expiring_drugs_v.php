<script type="text/javascript">
	
	$(document).ready( function () {
		
		$('#drug_table').dataTable( {
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
		
	} );

</script>

<h2 id="facility_name" style="text-align: center"><?php echo $facility_name ?></h2>
<h4 style="text-align: center">List of Short-Dated Stocks as of <span><?php echo date('d-M-Y') ?></span></h4>
<hr size="1" style="width:80%">

<table id="drug_table" class="table table-bordered table-striped listing_table" style="font-size:0.8em">
	<thead>
		<tr>
			<th style="min-width: 300px">Drug</th><th>Unit</th><th>Batch No</th><th>Expiry Date</th><th>SOH (Packs)</th><th>Days To Expiry</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($drug_details as $drug) {
			?>
			<tr><td><?php echo $drug['drug_name'] ?></td><td><?php echo $drug['drug_unit'] ?></td><td><?php echo $drug['batch'] ?></td><td><?php echo date('d-M-Y',strtotime($drug['expiry_date'])) ?></td><td><?php echo $drug['stocks_display'] ?></td><td><?php echo $drug['expired_days_display'] ?></td></tr>
			<?php
		}
		?>
	</tbody>
</table>