
<div id="wrapperd">
	<div id="commodity_summary" class="full-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Monthly Report on Drug Stock for the Period From <span class="_date" id="start_date"><?php echo $start_date ?></span> To <span class="_date" id="end_date"><?php echo $end_date ?></span></h4>
		<hr size="1" style="width:80%">
		
		<table id="drug_table" class="dataTables" style="font-size:0.8em" border="1">
			<thead>
				<tr>
					<th style="min-width: 300px">Drug Name</th><th>Beginning Balance </th><th> Recieved </th><th> Returned From Patients </th><th> Dispensed </th><th> Issued</th><th> Returned Back</th><th> Losses</th><th> Adjustments (+)</th><th> Adjustments (-)</th><th> Physical Stock</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($drug_details as $drug) {
					?>
					<tr><td><?php echo $drug[0] ?></td><td><?php echo $drug[1] ?></td><td><?php echo $drug[2] ?></td><td><?php echo $drug[3] ?></td><td><?php echo $drug[4] ?></td><td><?php echo $drug[5] ?></td><td><?php echo $drug[6] ?></td><td><?php echo $drug[7] ?></td><td><?php echo $drug[8] ?></td><td><?php echo $drug[9] ?></td><td><?php echo $drug[10] ?></td></tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>