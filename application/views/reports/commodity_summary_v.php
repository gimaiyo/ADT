<script type="text/javascript">
	
	$(document).ready( function () {
		
		var stock_type=<?php echo $stock_type; ?>;
		//var start_date=<?php echo $start_date; ?>;
		//var end_date=<?php echo $end_date; ?>;
		var base_url='<?php echo $base_url ?>';
		var _url=<?php echo "'".$base_url."report_management/commodity_summary/".$stock_type."/".$start_date."/".$end_date."'"; ?>;
		$('#drug_table').dataTable( {
			"oTableTools": {
				"sSwfPath": base_url+"assets/scripts/datatable/copy_csv_xls_pdf.swf",
				"aButtons": [ "copy", "print","xls","pdf" ]
			},
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": _url,
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers",
			"bDestroy":true
		} );
		
	} );

</script>
<div id="wrapperd">
	<div id="commodity_summary" class="full-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Monthly Report on Drug Stock for the Period From <span class="_date" id="start_date"><?php echo $start_date ?></span> To <span class="_date" id="end_date"><?php echo $end_date ?></span> - <?php echo $stock_type_n ?></h4>
		<hr size="1" style="width:80%">
		
		<table id="drug_table" class="dataTables" style="font-size:0.8em" border="1">
			<thead>
				<tr>
					<th style="min-width: 300px">Drug Name</th><th>Beginning Balance </th>
					<?php
					//Looping through every transaction
					foreach($trans_names as $trans){
						?>
						<th><?php echo $trans['name'] ?></th>
						<?php
					}
					?>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>