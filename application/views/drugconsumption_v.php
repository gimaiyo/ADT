
<h2 id="facility_name" style="text-align: center"></h2>
<h4 style="text-align: center;">Listing of Drug Consumption Report for <span class="_date" id="_year"><?php echo $year ?></span> </h4>
<hr size="1" style="width:80%">

<?php echo $drug_listing ?>

<!-- Pop up Window -->
<div id="edit_year">
	<label> <strong class="label">Report Year: </strong>
		<input type="text"name="filter_year" id="edit_single_year_filter">
	</label>
	<button id="edit_generate_single_year_report" class="action_button" style="height:30px; font-size: 13px; width: 200px;">
		Generate Report
	</button>
</div>
<div class="result"></div>
<!-- Pop up Window end-->

<script type="text/javascript">
	
	$(document).ready(function(){
		tableFilterDrugListing();
	});
	
	function tableFilterDrugListing() {
		var props = {
			sort : true,
			//remember_grid_values : true,
			remember_page_number : true,
			//remember_page_length : true,
			filters_row_index : 1,
			alternate_rows : true,
			rows_counter : true,
			rows_counter_text : "Displayed rows: ",
			btn_reset : true,
			btn_reset_text : "Clear",
			loader : true,
			//status_bar : true,
			//btn_reset_text : "Clear",
			fixed_headers: true,
			mark_active_columns : true,
			col_0 : "select",
			col_1 : "select",
			col_2 : "none",
			col_3 : "none",
			col_4 : "none",
			col_5 : "none",
			col_6 : "none",
			col_7 : "none",
			col_8 : "none",
			col_9 : "none",
			col_10 : "none",
			col_11 : "none",
			col_12 : "none",
			col_13 : "none",
			col_14 : "none",
			paging:true,
			results_per_page : ['Results per page', [10, 25, 50, 100, 500,1000]],
	
			display_all_text : "< Show All >",
	
			col_width : ["300px", "90px", "50px", "50px", "50px", "50px", "50px", "50px","50px", "50px", "50px", "50px", "50px", "50px"],
	
			//Column resize feature
			extensions : {
				name : ['ColumnsResizer'],
				src : ['TableFilter/TFExt_ColsResizer/TFExt_ColsResizer.js'],
				description : ['Columns Resizing'],
				initialize : [
				function(o) {
					o.SetColsResizer();
				}]
	
			},
			col_resizer_all_cells : false
		}
		var tf = setFilterGrid("drug_listing", props);
	}
</script>