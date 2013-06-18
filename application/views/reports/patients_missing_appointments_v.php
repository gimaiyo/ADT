		<style>
			
			select.flt {
				font-size: 14px;
			}
			h5 {
				margin: 10px;
			}
			hr{
				margin:0 auto;
				
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
<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="center-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Listing of Patients Who Did Not Report In The Period Between <span id="start_date"><?php echo $from; ?></span> And <span id="end_date"><?php echo $to; ?></span></h4>
		<hr size="1" style="width:80%">
		<table align='center'  width='20%' style="font-size:16px; margin-bottom: 20px">
			<tr>
				<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="total_count"><?php echo $all_count;?></span></h5></td>
			</tr>
		</table>
		<div id="appointment_list">
		<?php echo $dyn_table;?>
		</div>
	</div>
</div>	
		
		