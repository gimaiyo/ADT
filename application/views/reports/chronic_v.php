
		<style>
			
		
			#patient_listing td  {
				text-align: justify;
			}
			
		    .report_title {
				color:rgb(34, 86, 253);
				letter-spacing: 1px;
			}
			.tfoot{
				background-color:#DDD;
				font-weight: bold;
				font-size:16px;
			}
			table#patient_listing{
				width:80%;
			}
			
		</style>
<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="full-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Chronic Illnesses Summary Between <span  id="start_date"><?php echo $from;?></span> and <span id="end_date"><?php echo $to;?></span> </h4>
		<hr size="1" style="width:80%">
         <?php echo $dyn_table;?>
	</div>
</div>