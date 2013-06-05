<style>
	#inner_wrapper{
		top:120px;
	}
	.main-content{
		margin:0 auto;	
	}
	.center-content{
		width:96%;
	}
	#bin_card_details {
		padding: 5px;
		background-color: #D6DFEC;
	}
	.title {
		font-size: 20px;
		font-weight: bold;
		color: rgb(255, 116, 50);
	}
	.span5 table {
		background-color: #FFF;
	}
	.table-bordered {
		border-color: #000;
	}
	#batch_information td {
		color: blue;
	}
	.table td {
		padding: 2px;
		font-size:14px;
	}
	table.sortable thead {
		background-color: #eee;
		color: #666666;
		font-weight: bold;
		cursor: default;
	}
	.table-bordered td ,.table-bordered th{
		border-color: #000;
	}
</style>

<div class="main-content">
	
	<div class="center-content">
		<div id="quick_menu" class="btn-group">
			<a href="#" id="receive_issue_medicine" class="btn btn-success dropdown-toggle btn-quickmenu" data-toggle="dropdown" ><img  src="<?php echo base_url() ?>Images/medicine-icon.png">Receive/Issue Medicine <span class="caret"></span></a> 
			<ul class="dropdown-menu" id="transaction_type">
				<li><a href="add_stock.html">Main Store Transaction</a></li>
			    <li><a href="add_stock_pharmacy.html">Pharmacy Transaction</a></li>
			</ul>
		</div>
		
		<div id="bin_card_details">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span5" style="width:35%">
						<div><span class="title">Drug Information</span></div>
						<table class="table">
							
							<tbody>
								<tr><td>Commodity</td><th id="drug_name"><?php echo $drug_name?></th></tr>
								<tr>
									<td>Unit</td><th id="drug_unit"> <?php echo $drug_unit ?></th>
								</tr>
								<tr>
									<td>Total Stock</td><th id="stock_status" style="color:#00B831;font-weight:bold;"><?php echo $stock_level ?></th>
								</tr>
								<tr>
									<td>Max Stock Level</td><th id="maximum_consumption"></th></th>
								</tr>
								<tr>
									<td>Min Stock Level</td><th id="minimum_consumption"></th>
								</tr>
								<tr >
									<td>Avg Stock Level</td><th id="avg_consumption"></th>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="span7" style="overflow: scroll; height:240px;width:62%">
						<div><span class="title">Batch Information</span></div>
						<table class="table table-bordered sortable" id="batch_information">
							<thead>
								<tr>
									<th width="380">Drug Name</th><th>Packsize</th><th>Batch No</th><th>Qty</th><th>Expiry Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
								foreach ($batch_info as $batch) {
									$drug_name=$batch['drug'];
								?>
								<tr><td><?php echo $batch['drug'] ?></td><td><?php echo $batch['pack_size'] ?></td><td><?php echo $batch['batch_number'] ?></td><td><?php echo $batch['balance'] ?></td><td><?php echo $batch['expiry_date'] ?></td></tr>	
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div id="transactions" style="width:100%;overflow: scroll; height:230px">
				<div><span class="title">Transactions Information</span></div>
				<table class="table table-bordered table-hover sortable">
					<thead>
						<tr>
							<th>Ref./Order No</th>
							<th>Transaction Date</th>
							<th>Transaction Type</th>
							<th>Batch No</th>
							<th>Expiry Date</th>
							<th>Pack Size</th>
							<th>No. of Packs</th>
							<th>Quantity</th>
							<th>Unit Cost</th>
							<th>Total Price</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
			
			<hr/>
			
		</div>
		
	</div>
	
</div>