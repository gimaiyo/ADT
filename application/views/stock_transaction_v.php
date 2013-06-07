<style>
	#stock_div{
		background: #D1EAF0;
		margin-top:0.7%;
	}
	table th{
		text-align:left;
	}
	#drugs_table {
		background: #FFF;
		font-size: 12px;
	}
	#drugs_table input, #drugs_table select{
		font-size:12px;
		height:24px;
		width: 4.2em;
	}
</style>

<div class="main-content">
	
	<div class="center-content" id="stock_div">
		<div id="transaction_type_details">
			<table>
				<tr><th>Transaction Date</th><th>Transaction Type</th><th>Ref. /Order No</th><th>Source</th><th>Destination</th></tr>
				<tr>
					<td><input type="text" class="input-medium" /></td>
					<td>
						<select id="select_transtype" class="input-large">
							<?php
							foreach ($transaction_types as $transaction_type) {
							?>
							<option value="<?php echo $transaction_type['id'] ?>"><?php echo $transaction_type['Name'] ?></option>
							<?php
							}
							?>
							
						</select>
					</td>
					<td>
						<input type="text" class="input-medium" />
					</td>
					<td>
						<select id="select_source" class="input-large">
							<?php
							foreach ($drug_sources as $drug_source) {
							?>
							<option value="<?php echo $drug_source['id'] ?>"><?php echo $drug_source['Name'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
					<td>
						<select id="select_destination" class="input-large">
							<?php
							foreach ($drug_destinations as $drug_destination) {
							?>
							<option value="<?php echo $drug_destination['id'] ?>"><?php echo $drug_destination['Name'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
			</table>
		</div>
		
		<table border="0" class="table table-bordered" id="drugs_table">
			<thead>
				<tr>
					<th>Drug</th>
					<th>Unit</th>
					<th>Pack Size</th>
					<th>Batch No.</th>
					<th>Expiry&nbsp;Date</th>
					<th>Packs</th>
					<th>Qty</th>
					<th>Available Qty</th>
					<th>Unit Cost</th>
					<th>Total</th>
					<th>Comment</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody >
				<tr drug_row="1">
					<td>
					<select  name="drug" class="drug"  style="min-width:150px;max-width:250px;">
						<option>Select Commodity</option>
					</select></td>
					<td>
					<input type="text" name="unit" class="unit small_text input-small" />
					</td>
					<td>
					<input type="text" name="pack_size" class="pack_size small_text input-small" />
					</td>
					<td><select name="batchselect" class="batchselect" id="batchselect_1" style="display:none;width:120px;"></select>
					<input type="text" name="batch" class="batch  validate[required] input-small"   id="batch_1" style="width:120px;"/>
					</td>
					<td>
					<input type="text" name="expiry" class="expiry medium_text input-small" id="expiry_date" />
					</td>
					<td>
					<input type="text" name="pack" class="pack small_text validate[required] input-small" id="packs_1"  />
					</td>
					<td>
					<input type="text" name="quantity" id="quantity_1" class="quantity small_text input-small" readonly="" />
					</td>
					<td>
					<input type="text" name="available_quantity" class="quantity_available medium_text input-small" readonly="" />
					</td>
					<td>
					<input type="text" name="unit_cost" id="unit_cost" class="unit_cost small_text input-small" />
					</td>
					<td>
					<input type="text" name="amount" id="total_amount" class="amount input-small input-small" readonly="" />
					</td>
					<td >
					<input type="text" name="comment" class="comment " style="width:150px"/>
					</td>
					<td style="text-align: center">
						<button class="btn btn-info btn-small add"><i class="icon-plus"></i></button>
						<button style="display:none;" class="btn btn-danger btn-small remove"><i class="icon-minus"></i></button>
					</td>
				</tr>
			</tbody>
			
			
		</table>
	</div>
</div>