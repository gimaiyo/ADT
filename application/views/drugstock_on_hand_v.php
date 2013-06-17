<script type="text/javascript">
	
	$(document).ready( function () {
		
		var stock_type=<?php echo $stock_type; ?>;
		var _url=<?php echo "'".$base_url."report_management/drug_stock_on_hand/".$stock_type."'"; ?>;
		$('#drug_table').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": _url,
	        "bJQueryUI": true,
	        "aoColumnDefs": [
          	{'bSortable': false, 'aTargets': [ 2,3 ,4,5,6] }
    		],
	        "sPaginationType": "full_numbers"
		} ).columnFilter({ sPlaceHolder: "head:after",
                           aoColumns: [
                            		 { type: "text" },
                                     { type: "text" }
                                     ]
           });
		
	} );

</script>
<h4 style="text-align: center">Report on Inventory Status as of <span><?php echo date('d-M-Y') ?></span></h4>
<hr size="1" style="width:80%">

<table id="drug_table" class="table table-bordered table-striped listing_table" style="font-size:0.8em">
	<thead>
		<tr>
			<th style="min-width: 300px">Drug</th><th>Unit</th><th>Pack Size</th><th>SOH (Units)</th><th>SOH (Packs)</th><th>Safety Stock</th><th>Stock Status</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>