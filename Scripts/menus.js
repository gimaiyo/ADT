//-------- Date picker -------------------------

$(document).ready(function() {
	var href = window.location.href;
	var _href=href.substr(href.lastIndexOf('/') + 1);
	var href_final=_href.split('.');
	//Hide current page from menus
	var _id="#"+href_final[0];
	$(_id).css("display","none");
	
	
	$("#edit_donor_date_range_report").dialog({
		autoOpen : false,
		modal : true,
		width:450
	});

	$("#date_range_report").dialog({
		autoOpen : false,
		modal : true,
		width:450
	});
	$("#donor_date_range_report").dialog({
		autoOpen : false,
		modal : true,
		width:450
	});
	$("#single_date").dialog({
		autoOpen : false,
		modal : true,
		width:450
	});
	$("#year").dialog({
		autoOpen : false,
		modal : true,
		width:450
	});
	$("#no_filter").dialog({
		autoOpen : false,
		modal : true,
		width:450
	});

	//Add datepicker
	$("#date_range_from").datepicker({
		changeMonth : true,
		changeYear : true,
		dateFormat : 'yy-mm-dd'
	});
	$("#single_date_filter").datepicker({
		changeMonth : true,
		changeYear : true,
		dateFormat : 'yy-mm-dd'
	});
	$("#date_range_to").datepicker({
		changeMonth : true,
		changeYear : true,
		dateFormat : 'yy-mm-dd'
	});

	$("#donor_date_range_from").datepicker({
		changeMonth : true,
		changeYear : true,
		dateFormat : 'yy-mm-dd'
	});
	$("#donor_date_range_to").datepicker({
		changeMonth : true,
		changeYear : true,
		dateFormat : 'yy-mm-dd'
	});

	$(".date_range_report").click(function() {
		$("#selected_report").attr("value", $(this).attr("id"));
		$("#date_range_report").dialog("open");
		if($(this).attr("id")=="commodity_summary"){
			$(".show_report_type").show();
		}
		else{
			$(".show_report_type").hide();
		}
		
	});

	$(".donor_date_range_report").click(function() {
		
		$("#selected_report").attr("value", $(this).attr("id"));
		$("#donor_date_range_report").dialog("open");
		
		
	});

	$(".single_date_report").click(function() {
		$("#selected_report").attr("value", $(this).attr("id"));
		$("#single_date").dialog("open");
	});
	$(".no_filter").click(function() {
		$("#selected_report").attr("value", $(this).attr("id"));
		$("#no_filter").dialog("open");
		//If report is drug_consumption report, display select report type
		if($(this).attr("id")=='drug_stock_on_hand' || $(this).attr("id")=='expiring_drugs' || $(this).attr("id")=='expired_drugs'){
			$(".show_report_type").show();
		}
		else{
			$(".show_report_type").hide();
		}
	});
	
	$(".annual_report").click(function() {
		$("#selected_report").attr("value", $(this).attr("id"));
		$("#year").dialog("open");
	});
	$("#generate_date_range_report").click(function() {
		var stock_type=0;
		if($(".show_report_type").is(":visible")){
			stock_type=$("#commodity_summary_report_type").attr("value");
			if(stock_type=='0'){
				alert("Please select a report type ! ");
			}
			else{
				var report = $("#selected_report").attr("value") + ".html#";
				var from = $("#date_range_from").attr("value");
				var to = $("#date_range_to").attr("value");
				var report_url = report + "?start_date=" + from + "&end_date=" + to+"&stock_type="+stock_type;;
				window.location = report_url;
			}
		}
		else{
			var report = $("#selected_report").attr("value") + ".html#";
			var from = $("#date_range_from").attr("value");
			var to = $("#date_range_to").attr("value");
			var report_url = report + "?start_date=" + from + "&end_date=" + to+"&stock_type="+stock_type;;
			window.location = report_url;
		}
	});
	$("#generate_single_date_report").click(function() {
		var report = $("#selected_report").attr("value") + ".html#";
		var selected_date = $("#single_date_filter").attr("value");
		var report_url = report + "?date=" + selected_date;
		window.location = report_url;
	});
	$("#generate_single_year_report").click(function() {
		if( $("#selected_report").attr("value")=="display_year"){
			$("#selected_report").attr("value","graph_patients_enrolled_in_year");
			var report = $("#selected_report").attr("value") + ".html#";
			var selected_year = $("#single_year_filter").attr("value");
			var report_url = report + "?year=" + selected_year;
			window.location = report_url;
			location.reload();
		}
		else{
			var report = $("#selected_report").attr("value") + ".html#";
			var selected_year = $("#single_year_filter").attr("value");
			var report_url = report + "?year=" + selected_year;
			window.location = report_url;
		}
		
	});
	$("#generate_no_filter_report").click(function() {
		var stock_type=0;
		if($(".report_type").is(":visible")){
			stock_type=$("#commodity_summary_report_type_1").attr("value");
			if(stock_type=='0'){
				alert("Please select a report type ! ");
			}
			else{
				var report = $("#selected_report").attr("value") + ".html#"; 
				var report_url = report+"?stock_type="+stock_type;
				window.location = report_url;
			}
		}
		else{
			var report = $("#selected_report").attr("value") + ".html#"; 
			var report_url = report+"?stock_type="+stock_type;
			window.location = report_url;
		}
	});

	$("#donor_generate_date_range_report").click(function() {
		var report = $("#selected_report").attr("value") + ".html#";
		var from = $("#donor_date_range_from").attr("value");
		var to = $("#donor_date_range_to").attr("value");
		var donor = $("#donor").attr("value");
		var report_url = report + "?start_date=" + from + "&end_date=" + to + "&donor=" + donor;
		window.location = report_url;
	});
	//-------- Date picker end ---------------------
	
	$("#standard_report").click(function(){
		$("#standard_report_sub").toggle();
		$("#visiting_patient_sub").hide();
		$("#early_warning_sub").hide();
		$("#drug_inventory_sub").hide();
	});
	$("#visiting_patient").click(function(){
		$("#visiting_patient_sub").toggle();
		$("#standard_report_sub").hide();
		$("#early_warning_sub").hide();
		$("#drug_inventory_sub").hide();
	});
	$("#early_warning").click(function(){
		$("#early_warning_sub").toggle();
		$("#visiting_patient_sub").hide();
		$("#standard_report_sub").hide();
		$("#drug_inventory_sub").hide();
	});
	$("#drug_inventory").click(function(){
		$("#drug_inventory_sub").toggle();
		$("#visiting_patient_sub").hide();
		$("#early_warning_sub").hide();
		$("#standard_report_sub").hide();
	});
			
});

function tableFilter() {

		var props = {
			sort : true,
			//remember_grid_values : true,
			remember_page_number : true,
			//remember_page_length : true,
			//filters_row_index : 1,
			alternate_rows : true,
			rows_counter : true,
			rows_counter_text : "Displayed rows: ",
			btn_reset : true,
			btn_reset_text : "Clear",
			loader : true,
			//status_bar : true,
			//btn_reset_text : "Clear",
			fixed_headers: true,
			//mark_active_columns : true,
			col_0 : "select",
			col_1 : "select",
			col_2 : "select",
			col_3 : "select",
			col_4 : "select",
			col_5 : "select",
			col_6 : "select",
			col_7 : "select",
			paging:true,
			results_per_page : ['Results per page', [10, 25, 50, 100, 500,1000]],

			display_all_text : "< Show All >",

			col_width : ["80px", "150px", "180px", "120px", "70px", "80px", "150px", "80px"],

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
			col_resizer_all_cells : true
		}
		var tf = setFilterGrid("patient_listing", props);
	}
	
