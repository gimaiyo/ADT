
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
			<tbody>
				<?php 
				foreach ($drug_details as $drug) {
					?>
					<tr><td><?php echo $drug["drug_name"] ?></td><td><?php echo $drug["stock_status"] ?></td>
						<?php
						//Looping through every transaction
						foreach($trans_names as $trans){
							?>
							<td><?php echo $drug[$trans['name']] ?></td>
							<?php
						}
						?>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>