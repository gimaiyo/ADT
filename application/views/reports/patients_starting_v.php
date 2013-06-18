<style>
	
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
		color:rgb(34, 86, 253);
		letter-spacing: 1px;
	}
	h2{
		margin:0.5em;
	}
	h4{
		font-size:18px;
	}
	
	.odd {
		background-color: rgb(226, 232, 255);
	}
	
	
    select.pgSlc{
		height:30px;
		width:60px;
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
<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="center-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Listing of Patients Starting Regimen in the Period Between <span class="green"><?php echo $from; ?></span> And <span class="green"><?php echo $to; ?></span></h4>
		<hr size="1" style="width:80%">
		<table align='center'  width='20%' style="font-size:16px; margin-bottom: 20px">
			<tr>
				<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="whole_total"><?php echo $total; ?></span></h5></td>
			</tr>
		</table>
		<table  id="patient_listing">
			<thead >
				<tr>
					<th> Patient No </th>
					<th> Patient Name </th>
					<th> Regimen </th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($patients as $patient) {
				?>
				<tr><td><?php echo $patient['Patient_Id']?></td><td><?php echo $patient['First'].' '.$patient['Last'] ?></td><td><?php echo $patient['Regimen']?></td></tr>
				<?php	
				}
				?>
			</tbody>
		</table>
		
	</div>
</div>
