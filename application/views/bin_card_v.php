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
	#sub_title{
		margin-bottom:15px;
		font-size:16px;
	}
	#drug_info th{
		font-size:14px;
	}
</style>

<div class="main-content">
	
	<div class="center-content">
		<div id="sub_title" >
			<a href="<?php  echo base_url().'inventory_management ' ?>">Inventory</a> <i class=" icon-chevron-right"></i>  <?php echo $store ?> <i class=" icon-chevron-right"></i> <strong>Bin Card</strong>
			<hr size="1">
		</div>
		
		<div id="bin_card_details">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span5" style="width:35%">
						<div><span class="title">Drug Information</span></div>
						<table class="table" id="drug_info">
							
							<tbody>
								<tr><td>Commodity</td><th id="drug_name"><?php echo $drug_name?></th></tr>
								<tr>
									<td>Unit</td><th id="drug_unit"> <?php echo $drug_unit ?></th>
								</tr>
								<tr>
									<td>Total Stock</td><th id="stock_status" style="color:#00B831;font-weight:bold;"><?php echo $stock_level ?></th>
								</tr>
								<tr>
									<td>Max Stock Level</td><th id="maximum_consumption"><?php echo $maximum_consumption ?></th>
								</tr>
								<tr>
									<td>Min Stock Level</td><th id="minimum_consumption"><?php echo $minimum_consumption ?></th>
								</tr>
								<tr >
									<td>Avg Stock Level</td><th id="avg_consumption"><?php echo $avg_consumption ?></th>
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
						<?php foreach ($drug_transactions as $drug_transaction) {
						?>
							<tr>
								<td><?php echo  $drug_transaction->Order_Number ?></td>
								<td><?php echo  $drug_transaction->Transaction_Date ?></td>
								<?php
								$transaction_type=$drug_transaction->Transaction_Object->Name;
								
								//Main store transaction
								if($drug_transaction->Source!=$drug_transaction->Destination){
									//Stock going out
									if($drug_transaction->Quantity==0){
										$qty=$drug_transaction->Quantity_Out;
										//From Main Store to pharmacy
										if($drug_transaction->Destination==""){
											$transaction_type.=" Pharmacy";
										}
										//If destination is not a facility,get the destination name
										else if($drug_transaction->Destination < 10000){
											$transaction_type.=" ".$drug_transaction->Destination_Object->Name;
										}
										//If destination is a facility,get the destination name
										else if($drug_transaction->Destination >= 10000){
											$transaction_type.=" ".$drug_transaction->Facility_Object->name;
										}
									}
									
									//Stock coming in, received
									else if($drug_transaction->Quantity>0){
										$qty=$drug_transaction->Quantity;
										if($drug_transaction->Source=="" and $drug_transaction->Source!=""){
											$transaction_type.=" ".$drug_transaction->Facility_Object->Name;
										}
										//Source is not a facility
										else if($drug_transaction->Source < 10000){
											$transaction_type.=" ".$drug_transaction->Source_Object->Name;
										}
										//Source is a facility
										else if($drug_transaction->Source >= 10000){
											$transaction_type.=" ".$drug_transaction->Facility_Object->Name;
										}
									}
								}	
								//Pharmacy transaction
								else if($drug_transaction->Source==$drug_transaction->Destination){
									//Receive from
									if($drug_transaction->Transaction_Type==1){
										$transaction_type.=" Main Store";
									}
									//Dispensed to patients
									else if($drug_transaction->Transaction_Type==5){
										
									}
									else if($drug_transaction->Quantity==0){
										$transaction_type.=" Patients";
									}
									
								}
								?>
								<td><?php echo $transaction_type;  ?></td>
								<td><?php echo  $drug_transaction->Batch_Number ?></td>
								<td><?php echo  $drug_transaction->Expiry_date ?></td>
								<td><?php echo  $drug_transaction->Drug_Object->Pack_Size ?></td>
								<td><?php echo  $drug_transaction->Packs ?></td>
								<td><?php echo  $qty ?></td>
								<td><?php echo  $drug_transaction->Unit_Cost ?></td>
								<td><?php echo  $drug_transaction->Amount ?></td>
							</tr>
						<?php	
						}
						?>
						
						
					</tbody>
				</table>
			</div>
			
			<hr/>
			
		</div>
		
	</div>
	
</div>