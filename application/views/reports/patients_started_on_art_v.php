
<style>
	#patient_listing {
		margin: 0 auto;
		font-size: 14px;
		letter-spacing: 0.5px;
		width: 1200px;
		border-collapse:collapse;
	}

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
</style>
<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="center-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Listing of Patients Started on ART in the period  From <span id="start_date"><?php echo $from; ?></span> To <span id="end_date"><?php echo $to; ?></span>
		<hr size="1" style="width:80%">
         <?php echo $dyn_table;?>
	</div>
</div>
