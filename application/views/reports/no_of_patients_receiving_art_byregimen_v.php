
		<style>
			
		
			#patient_listing td  {
				text-align: justify;
			}
			#start_date, #end_date{
		    	color: rgb(45, 173, 13);
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
			hr{
				margin:0 auto;
				margin-bottom:10px;
			}
			table#patient_listing{
				width:80%;
			}
		</style>
<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="center-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Active Patients Started By Regimen as of <span  id="date_of_appointment"><?php echo $from;?></span></h4>
		<hr size="1" style="width:80%">
		<?php echo  $dyn_table;?>
	</div>
</div>	
		