<style>
#percentage_patients,#percentage_retention,#percentage_lost_to_follow_up{
	border: 1px solid #000;
	border-collapse:collapse;
	
	
}
	#percentage_patients {
		margin: 0 auto;
		font-size: 14px;
		
	}
	
	#percentage_retention {
		margin: 0 auto;
		font-size: 14px;
		
	}
	
	#percentage_lost_to_follow_up {
		margin: 0 auto;
		font-size: 14px;
	}
	
	.report_title {
		color:rgb(34, 86, 253);
		letter-spacing: 1px;
	}
	h3 {
		text-align: center;
		color:#0000FF;
	}
	#percentage_patients td,#retention_percentage td, #lost_to_follow_up_percentage td {
		border:1px solid #000;	
		padding:4px;
		font-weight:800;
	}
	th{
		background-color:#CCCCFF;
		border:1px solid #000;
	}
	.patient_percentage,.retention_percentage,.lost_to_follow_up_percentage{
		width: 1050px;
		font-size:14px;
		height: 160px;
		border: 1px solid #000;
		margin:0 auto;
	}
	.patient_percentage {
		border-radius: 5px 5px 0px 0px;
	}

	.lost_to_follow_up_percentage {
		border-radius: 0px 0px 5px 5px;
	}
	.report_title{
		font-size:14px;
	}
	#date_range_report table td,#single_date table td,#donor_date_range_report table td,#year table td{
		border:none;
	}
</style>

<div id="wrapperd">
			
	<div id="patient_enrolled_content" class="center-content">
		<?php $this->load->view("reports/reports_top_menus_v") ?>
		<h4 style="text-align: center">Listing of HIV Drugs Resistance Early Warning Indicators Between <span class="green"><?php echo $from; ?></span> And <span class="green"><?php echo $to; ?></span></h4>
		<hr size="1" style="width:80%">
		<div class="patient_percentage">
			<h3>Percentage of Patients Started on First Line.Suggested Target 100%</h3>
			<table   id="percentage_patients" cellspacing="5">
				<tr>
					<th> Patients Initiated on First Line </th>
					<th> Total Patients Starting ART </th>
					<th> Percentage Started on First Line(%)</th>
					<th> Percentage Started on other Regimens(%)</th>
				</tr>
				<tr><td align="center"><?php echo $first_line ?></td><td align="center"><?php echo $tot_patients ?></td><td align="center"><?php echo $percentage_firstline ?></td><td align="center"><?php echo $percentage_onotherline ?></td></tr>
			</table>
		</div>
		<div class="retention_percentage">
			<h3>Patients Retention on First Line ART.Suggested Target >70%</h3>
			<table id="percentage_retention" cellpadding="5" border="1">
				<tr>
					<th> Patients Still in First Line </th>
					<th> Total Patients Starting 12 months from selected period </th>
					<th> Percentage(%) Patients Retained in First Line</th>
				</tr>
				<tr><td align="center"><?php echo $total_from_period; ?></td><td align="center"><?php echo $stil_in_first_line ?></td><td align="center"><?php echo $percentage_stillfirstline ?></td></tr>
			</table>
		</div>
		<div class="lost_to_follow_up_percentage" cellpadding="5">
			<h3>Cohort of Patients Lost to follow up(Same Period Last Year).Suggested Target < 20%</h3>
			<table id="percentage_lost_to_follow_up" border="1">
				<tr>
					<th> No. of Patients Lost to Follow Up </th>
					<th> Total Patients Started on ART in the selected peroid </th>
					<th> Percentage(%) of Patients Lost to follow Up</th>
				</tr>
				<tr><td align="center"><?php echo $lost_to_follow ?></td><td align="center"><?php echo $total_before_period ?></td><td align="center"><?php echo $percentage_lost_to_follow ?></td></tr>
			</table>
		</div>
		
	</div>
</div>
