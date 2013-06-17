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
		
		<h4 style="text-align: center">Listing of Patients Who Did Not Report In The Period 
		<br><br>
		Between <input type="text" id="start_date" value='<?php echo $from; ?>'> and <input type="text" id="end_date" value="<?php echo $to; ?>"></h4>
		<hr size="1" style="width:80%">
		<table align='center'  width='20%' style="font-size:16px; margin-bottom: 20px">
			<tr>
				<td colspan="2"><h5 class="report_title" style="text-align:center;font-size:14px;">Number of patients: <span id="total_count"><?php echo $all_count;?></span></h5></td>
			</tr>
		</table>
		
		<div id="appointment_list">
		<?php echo $dyn_table;?>
		</div>
		
		<!-- Pop up Window -->
		<input type="hidden" id="selected_report" />
		<div id="date_range_report" title="Select Date Range">
			<label> <strong class="label">From: </strong>
				<input type="text"name="date_range_from" id="date_range_from">
			</label>
			<label> <strong class="label">To: </strong>
				<input type="text"name="date_range_to" id="date_range_to">
			</label>
			<button id="generate_date_range_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
				Generate Report
			</button>
		</div>
		<div id="donor_date_range_report" title="Select Date Range and Donor">
			<label> <strong class="label">Select Donor: </strong>
				<select name="donor" id="donor">
					<option value="0">All Donors</option><option value="1">GOK</option><option value="2">PEPFAR</option>
				</select> </label>
			<label> <strong class="label">From: </strong>
				<input type="text"name="donor_date_range_from" id="donor_date_range_from">
			</label>
			<label> <strong class="label">To: </strong>
				<input type="text"name="donor_date_range_to" id="donor_date_range_to">
			</label>
			<button id="donor_generate_date_range_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
				Generate Report
			</button>
		</div>
		<div id="single_date">
			<label> <strong class="label">Select Date </strong>
				<input type="text"name="filter_date" id="single_date_filter">
			</label>
			<button id="generate_single_date_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
				Generate Report
			</button>
		</div>
		<div id="year">
			<label> <strong class="label">Report Year: </strong>
				<input type="text"name="filter_year" id="single_year_filter">
			</label>
			<button id="generate_single_year_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
				Generate Report
			</button>
		</div>
		<div id="no_filter">
			<button id="generate_no_filter_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
				Generate Report
			</button>
		</div>
		<!-- Pop up Window end-->
	