<style>
	#inner_wrapper{
		top:120px;
	}
	.main-content{
		margin:0 auto;	
	}
	#sql{
		display:none;
	}
	.full-content{
		display:table;
	}
	table th{
		text-align:left;
	}
	#drugs_table {
		background: #FFF;
		font-size: 12px;
	}
	#drugs_table input, #drugs_table select{
		font-size:12px;
		height:24px;
		width: 4.2em;
	}
	#transaction_type_details{
		padding:1%;
		display:table-cell;
		width:15%;
	}
	#transaction_type_details th{
		text-align:left;
	}
	#drug_details{
		width:82%;
		display:table-cell;
	}
	#drugs_table{
		width: 100%;
	}
	#drugs_table th{
		
		text-align:center;
	}
	#sub_title{
		margin-bottom:15px;
		font-size:16px;
	}
	#submit_section{
		text-align:right;
		padding-right:10px;	
	}
</style>


<script type="text/javascript">
	$(document).ready(function(){
		var today = new Date();
		var today_date = ("0" + today.getDate()).slice(-2)
		var today_year = today.getFullYear();
		var today_month = ("0" + (today.getMonth() + 1)).slice(-2)
		var today_full_date =today_year+ "-"+today_month + "-" + today_date ;
		$("#transaction_date").attr("value", today_full_date);
		
		$(".t_source").css("display","none");
		$(".t_destination").css("display","none");
		$("#drug_details").css("pointer-events","none");
		
		//Transaction type change
		$("#select_transtype").change(function(){
			
			if($("#select_transtype").attr("value")==0){
				$("#drug_details").css("pointer-events","none");
				$(".t_source").css("display","none");
				$(".t_destination").css("display","none");
			}
			else{
				$("#drug_details").css("pointer-events","auto");
				//Coming in
				if($("#select_transtype").attr("value")==1 || $("#select_transtype").attr("value")==2 || $("#select_transtype").attr("value")==3 || $("#select_transtype").attr("value")==4 ){
					if($("#select_transtype").attr("value")==1){
						$(".t_destination").css("display","none");
						$(".t_source").css("display","block");
					}
					else{
						$(".t_destination").css("display","none");
						$(".t_source").css("display","none");
					}
					
					
					$("#select_drug ").html("<option value='0'>Loading drugs ...</option> ");
					
					var _url="<?php echo base_url().'inventory_management/getAllDrugs'; ?>";
					//Get drugs that have a balance
					var request=$.ajax({
				     url: _url,
				     type: 'post',
				     dataType: "json"
				    });
				    request.done(function(data){
				    	$("#select_drug option").remove();
				    	$("#select_drug ").append("<option value='0'>Select commodity </option> ");
				    	$.each(data,function(key,value){
				    		//alert(value.drug);
				    		$("#select_drug ").append("<option value='"+value.id+"'>"+value.drug+"</option> ");
				    		
				    	});
				    })
				    
				    request.fail(function(jqXHR, textStatus) {
					  alert( "Could not retrieve the list of drugs : " + textStatus );
					});
				}
				//Going out
				else {
					$("#select_drug ").html("<option value='0'>Loading drugs ...</option> ");
					var stock_type=<?php echo  $stock_type ?>;
					var _url="<?php echo base_url().'inventory_management/getStockDrugs'; ?>";
					$(".t_destination").css("display","block");
					$(".t_source").css("display","none");
					//Get drugs that have a balance
					var request=$.ajax({
				     url: _url,
				     type: 'post',
				     data: {"stock_type":stock_type},
				     dataType: "json"
				    });
				    request.done(function(data){
				    	$("#select_drug option").remove();
				    	$("#select_drug ").append("<option value='0'>Select commodity </option> ");
				    	$.each(data,function(key,value){
				    		//alert(value.drug);
				    		$("#select_drug ").append("<option value='"+value.id+"'>"+value.drug+"</option> ");
				    		
				    	});
				    })
				    
				    request.fail(function(jqXHR, textStatus) {
					  alert( "Could not retrieve the list of drugs : " + textStatus );
					});
				   
				    
				    
				}
			}
		})
		
		//Drug change
		$("#select_drug").change(function(){
			resetFields($(this));
			var row=$(this);
			//Receiving
			if($("#select_transtype").attr("value")==1 || $("#select_transtype").attr("value")==2 || $("#select_transtype").attr("value")==3 || $("#select_transtype").attr("value")==4 || $("#select_transtype").attr("value")==11){
				row.closest("tr").find("#batch_1").css("display","block");
				row.closest("tr").find("#batchselect_1").css("display","none");
				
				var selected_drug=$(this).val();
				var _url="<?php echo base_url().'inventory_management/getDrugDetails'; ?>";
				var request=$.ajax({
			     url: _url,
			     type: 'post',
			     data: {"selected_drug":selected_drug},
			     dataType: "json"
			    });
			    request.done(function(data){
			    	$.each(data,function(key,value){
			    		row.closest("tr").find("#unit").val(value.Name);
			    		row.closest("tr").find("#pack_size").val(value.pack_size);
			    		
			    	});
			    });
			    request.fail(function(jqXHR, textStatus) {
				  alert( "Could not retrieve drug details : " + textStatus );
				});
				
			}
			//If issuing
			else{
				$(this).closest("tr").find("#batch_1").css("display","none");
				$(this).closest("tr").find("#batchselect_1").css("display","block");
				$(this).closest("tr").find("#batchselect_1 ").html("<option value='0'>Loading batches ...</option> ");
				var selected_drug=$(this).val();
				var stock_type=<?php echo  $stock_type ?>;
				
				//Get batches that have not yet expired and have stock balance
				var _url="<?php echo base_url().'inventory_management/getBacthes'; ?>";
				
				var request=$.ajax({
			     url: _url,
			     type: 'post',
			     data: {"selected_drug":selected_drug,"stock_type":stock_type},
			     dataType: "json"
			    });
			    request.done(function(data){
			    	row.closest("tr").find(".batchselect option").remove();
			    	row.closest("tr").find(".batchselect ").append("<option value='0'>Select batch </option> ");
			    	$.each(data,function(key,value){
			    		row.closest("tr").find("#unit").val(value.Name);
			    		row.closest("tr").find("#pack_size").val(value.pack_size);
			    		//alert(value.drug);
			    		row.closest("tr").find(".batchselect").append("<option value='"+value.batch_number+"'>"+value.batch_number+"</option> ");
			    		
			    	});
			    });
			    request.fail(function(jqXHR, textStatus) {
				  alert( "Could not retrieve the list of batches : " + textStatus );
				});
				
			}
			
		});
		
	
		//Batch change
		$(".batchselect").change(function(){
			resetFields($(this));
			var row=$(this);
			
			//Get batch details(balance,expiry date)
			if($(this).val()!=0){
				var batch_selected=$(this).val();
				var stock_type=<?php echo  $stock_type ?>;
				var selected_drug=row.closest("tr").find("#select_drug").val();
				var _url="<?php echo base_url().'inventory_management/getBacthDetails'; ?>";
				var request=$.ajax({
			     url: _url,
			     type: 'post',
			     data: {"selected_drug":selected_drug,"stock_type":stock_type,"batch_selected":batch_selected},
			     dataType: "json"
			    });
			    
			    request.done(function(data){
			    	$.each(data,function(key,value){
			    		row.closest("tr").find(".expiry").val(value.expiry_date);
			    		row.closest("tr").find(".quantity_available ").val(value.balance);
			    		
			    	});
			    });
			    request.fail(function(jqXHR, textStatus) {
				  alert( "Could not retrieve batch details : " + textStatus );
				});
				
			}
		});
		
		//Add datepicker for the transaction date
		$("#transaction_date").datepicker({
			defaultDate : new Date(),
			dateFormat : 'dd MM yy',
			changeYear : true,
			changeMonth : true
		});
		//Add datepicker for the expiry date
		$("#expiry_date").datepicker({
			defaultDate : new Date(),
			dateFormat : $.datepicker.ATOM,
			changeYear : true,
			changeMonth : true
		});
		//Check if number of packs has changed and automatically calculate the total
		$(".pack").keyup(function() {
			updateCommodityQuantity($(this));
		});
		
		//Calculate the total cost automatically
		$("#unit_cost").keyup(function() {
			updateTotalCost($(this));
		});
		
		$(".pack").change(function() {
			updateCommodityQuantity($(this));
		});
		
		$("#unit_cost").change(function() {
			updateTotalCost($(this));
		});
		$(".remove").click(function() {
			$(this).closest('tr').remove();
		});
		
		$(".add").click(function() {
			var last_row=$('#drugs_table tr:last');
			var drug_selected=last_row.find(".drug").val();
			var quantity_entered=last_row.find(".quantity").val();
			if(last_row.find(".quantity").hasClass("stock_add_form_input_error")){
				alert("Error !Quantity issued is greater than qty available!");
			}
			
			else if(drug_selected==0 ){
				alert("You have not selected a drug!");
			}
			else if(quantity_entered=="" || quantity_entered==0){
				alert("Please Specify the Quantity of the Drug");
			}
			else{
				var cloned_object = $('#drugs_table tr:last').clone(true);
				var drug_row = cloned_object.attr("drug_row");
				var next_drug_row = parseInt(drug_row) + 1;
				cloned_object.attr("drug_row", next_drug_row);
				var batch_id = "batch_" + next_drug_row;
				var batchselect_id = "batchselect_" + next_drug_row;
				var quantity_id = "quantity_" + next_drug_row;
				var expiry_id = "expiry_date_" + next_drug_row;
				var batch = cloned_object.find(".batch");
				var batchselect = cloned_object.find(".batchselect");
				batchselect.empty();
				var packs = cloned_object.find(".pack");
				var unit = cloned_object.find(".unit");
				var pack_size = cloned_object.find(".pack_size");
				var quantity = cloned_object.find(".quantity");
				var quantity_available = cloned_object.find(".quantity_available");
				var expiry_date = cloned_object.find(".expiry");
				var unit_cost = cloned_object.find(".unit_cost");
				var total_amount = cloned_object.find(".amount");
				var comment = cloned_object.find(".comment");
				cloned_object.find(".remove").show();
				batch.attr("id", batch_id);
				batchselect.attr("id", batchselect_id);
				quantity.attr("id", quantity_id);
				expiry_date.attr("id", expiry_id);
				batch.attr("value", "");
				batchselect.attr("value", "");
				quantity.attr("value", "");
				expiry_date.attr("value", "");
				packs.attr("value", "");
				pack_size.attr("value", "");
				unit.attr("value", "");
				quantity_available.attr("value", "");
				unit_cost.attr("value","");
				total_amount.attr("value","");
				comment.attr("value","");
				var expiry_selector = "#" + expiry_id;
		
				$(expiry_selector).datepicker({
					defaultDate : new Date(),
					changeYear : true,
					changeMonth : true
				});
				cloned_object.insertAfter('#drugs_table tr:last');
				refreshDatePickers();
			}
			
	
			return false;
		});
		
		//Save transaction details
		$("#btn_submit").click(function(){
			var last_row=$('#drugs_table tr:last');
			if(last_row.find(".quantity").hasClass("stock_add_form_input_error")){
				alert("There is a commodity that has a quantity greater that the quantity available!");
				return;
			}
			
			var rowCount = $('#drugs_table tr').length;
			//Check if details were entered before submiting
			if(rowCount==2){
				var drug_selected=last_row.find(".drug").val();
				var quantity_entered=last_row.find(".quantity").val();
				if(drug_selected==0 ){
					alert("You have not selected a drug!");
					return;
				}
				else if(quantity_entered=="" || quantity_entered==0){
					alert("You have not entered any quantity!");
					return;
				}
				
			}
			
			
			var facility=<?php echo $facility ?>;
			var user=<?php echo $user_id ?>;
			
			//Before going any further, first calculate the number of drugs being recorded
			var drugs_count = 0;
			$.each($(".drug"), function(i, v) {
				if($(this).attr("value")) {
					drugs_count++;
				}
			});
			//If no drugs were selected, exit
			if(drugs_count == 0) {
				return;
			}
			//Retrieve all form input elements and their values
			var dump = retrieveFormValues();
			//Call this function to do a special retrieve function for elements with several values
			var drugs = retrieveFormValues_Array('drug');
			if(dump["transaction_type"] == 1 || dump["transaction_type"] == 4 || dump["transaction_type"] == 11 || dump["transaction_type"] == 0) {
				var batches = retrieveFormValues_Array('batch');
			} 
			
			else if(dump["transaction_type"] == 1 && dump['add_stock_type']=='2'){
				var batches = retrieveFormValues_Array('batchselect');
			}
			else {
				var batches = retrieveFormValues_Array('batchselect');
			}
			var expiries = retrieveFormValues_Array('expiry');
			var quantities = retrieveFormValues_Array('quantity');
			var packs = retrieveFormValues_Array('pack');
			var unit_costs = retrieveFormValues_Array('unit_cost');
			var comments = retrieveFormValues_Array('comment');
			var amounts = retrieveFormValues_Array('amount');
			var available_quantity=retrieveFormValues_Array('available_quantity');
			var balance=0;
			
			//If transaction is from store
			var stock_type=<?php echo $stock_type; ?>;
			if(stock_type=='1'){
				//Stockin coming in
				if(dump["transaction_type"] == 1 || dump["transaction_type"] == 2 || dump["transaction_type"] == 3 || dump["transaction_type"] == 4 || dump["transaction_type"] == 11) {
					//Balance is the quantity received
					balance=quantities;
					var quantity_choice = "quantity";
					var quantity_out_choice = "quantity_out";
				} else {
					//Substract balance from qty going out
					balance=available_quantity-quantities;
					var quantity_choice = "quantity_out";
					var quantity_out_choice = "quantity";
				}
			}
			//If transaction is from pharmacy
			else if(stock_type=='2'){
				//If transaction is received from
				if(dump["transaction_type"] == 1 || dump["transaction_type"] == 2 || dump["transaction_type"] == 3 || dump["transaction_type"] == 4 || dump["transaction_type"] == 11) {
					//Balance is the quantity received
					balance=quantities;
					var quantity_choice = "quantity";
					var quantity_out_choice = "quantity_out";
					
					
				} else {
					//Substract balance from qty going out
					balance=available_quantity-quantities;
					var quantity_choice = "quantity_out";
					var quantity_out_choice = "quantity";
				}
			}
			
			//After getting the number of drugs being recorded, create a unique entry (sql statement) for each in the database in this loop
			var sql_queries = "";
			var source="";
			var destination="";
			for(var i = 0; i < drugs_count; i++) {
				//Check if destination is not the same as facility code, which would be a pharmacy transaction
				if(dump['destination']==facility && dump["transaction_type"] == 6){
					destination="";
					source=facility;
					
				}
				
				//When dispensing to patients from pharmacy
				else if(dump["transaction_type"] == 5 && stock_type=='2'){
					source=facility;
					destination=facility;
				}
				
				//When issuing, source is facility (for store transaction)
				else if(dump["transaction_type"] == 6){
					source=facility;
					destination=dump['destination'];
				}
				//Pharmacy transaction:Received from Main Store
				else if(dump["transaction_type"]==1 && stock_type=='2' && dump['source']==1){
					source=facility;
					destination=facility;
					
				}
				//Physical count store
				else if(dump["transaction_type"]==11 && stock_type=='1'){
					source=facility;
					destination="";
				}
				//Physical count pharmacy
				else if(dump["transaction_type"]==11 && stock_type=='2'){
					source=facility;
					destination=facility;
					
					
				}
				else{
					destination=facility;
					source=dump['source'];
				}
				
				
				
				var sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs," + quantity_choice + "," + quantity_out_choice + ",balance, unit_cost, amount, remarks, operator, order_number, facility) VALUES ('" + drugs[i] + "', '" + dump["transaction_date"] + "', '" + batches[i] + "', '" + dump["transaction_type"] + "', '" + source + "', '" + destination + "', '" + expiries[i] + "', '" + packs[i] + "', '" + quantities[i] + "','0','" + balance + "','" + unit_costs[i] + "', '" + amounts[i] + "', '" + comments[i] + "','" + user + "','" + dump["reference_number"] + "','" + facility + "');";
				sql_queries += sql;
				
				
				//If transaction type is issued to, create query for the receiving store
				if(dump["transaction_type"] == 6) {
					//Pharmacy
					if(dump['destination']==facility){
						source=facility;
					}else{
						source=facility;
					}
					destination=dump['destination'];
					//If transaction type is issued to, insert another transaction as a received from
					//var transaction_type=1;
					//sql_queries += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number,transaction_type, source, destination, expiry_date, packs," + quantity_out_choice + "," + quantity_choice + ", unit_cost, amount, remarks, operator, order_number, facility) VALUES ('" + drugs[i] + "', '" + dump["transaction_date"] + "', '" + batches[i] + "', '" + transaction_type + "', '" + source + "', '" + destination + "', '" + expiries[i] + "', '" + packs[i] + "', '" + quantities[i] + "','0','" + unit_costs[i] + "', '" + amounts[i] + "', '" + comments[i] + "','" + user + "','" + dump["reference_number"] + "','" +  destination + "');";
				}
				
				//??? How to get received from main store. How do we update pharmacy balance
				//If received from main store to pharmacy, insert an issued to from main store
				else if(dump["transaction_type"]=='1' && stock_type=='2' && dump['source']==1 ){
					var transaction_type=6;
					sql_queries += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs," + quantity_out_choice + "," + quantity_choice + ", unit_cost, amount, remarks, operator, order_number, facility) VALUES ('" + drugs[i] + "', '" + dump["transaction_date"] + "', '" + batches[i] + "', '" + transaction_type + "', '" + source + "', '', '" + expiries[i] + "', '" + packs[i] + "', '" + quantities[i] + "','0','" + unit_costs[i] + "', '" + amounts[i] + "', '" + comments[i] + "','" + user + "','" + dump["reference_number"] + "','" +  destination + "');";
				}
				
				//Update drug_stock_balance
				//Add to balance
				if(dump["transaction_type"]==1 || dump["transaction_type"]==2 || dump["transaction_type"]==3 || dump["transaction_type"]==4 || dump["transaction_type"]==11){
					
					//In case of physical count
					if(dump["transaction_type"]==11){
						var balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('"+drugs[i]+"','"+batches[i]+"','"+expiries[i]+"','"+stock_type+"','"+facility+"','"+quantities[i]+"') ON DUPLICATE KEY UPDATE balance="+quantities[i]+";";
					}
					else{
						
						var balance_sql="INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('"+drugs[i]+"','"+batches[i]+"','"+expiries[i]+"','"+stock_type+"','"+facility+"','"+quantities[i]+"') ON DUPLICATE KEY UPDATE balance=balance+"+quantities[i]+";";
					}
				}
				//Substract from balance
				else{
					var balance_sql="";
					//From Main Store to pharmacy, update pharmacy balance
					if(dump["transaction_type"]==6 && dump["destination"]==facility && stock_type==1){
						balance_sql+="INSERT INTO drug_stock_balance(drug_id,batch_number,expiry_date,stock_type,facility_code,balance) VALUES('"+drugs[i]+"','"+batches[i]+"','"+expiries[i]+"','2','"+facility+"','"+quantities[i]+"') ON DUPLICATE KEY UPDATE balance=balance+"+quantities[i]+";";
					}
					balance_sql+="UPDATE drug_stock_balance SET balance=balance - "+quantities[i]+" WHERE drug_id='"+drugs[i]+"' AND batch_number='"+batches[i]+"' AND expiry_date='"+expiries[i]+"' AND stock_type='"+stock_type+"' AND facility_code='"+facility+"';";
					
				}
				
				sql_queries+=balance_sql;
				
				//Done looping, post the queries to the server
				if((i+1)==drugs_count){
					$("#sql").val(sql_queries);
					$("#stock_form").submit();
					/*
					 * 
					var request=$.ajax({
				     url: _url,
				     type: 'post',
				     data: {"sql":sql_queries},
				     dataType: "json"
				    });
				    
				    request.done(function(data){
				    	$.each(data,function(key,value){
				    		if(value.msg=="success"){
				    			$("#msg_server").html("Your data were successfully saved !");
				    		}
				    		else if(value.msg=="all_failure"){
				    			$("#msg_server").html("Your data could not be saved !  Try again or contact your system administrator.");
				    		}
				    		else if(value.msg=="some_failure"){
				    			$("#msg_server").html("Some of your transactions were not successfully saved!");
				    		}
				    	});
				    });
				    request.fail(function(jqXHR, textStatus) {
					  alert( "There was an error while saving your data! : " + textStatus );
					});
					 */
				}
				
				
				
				
			};
			
			
		})
		
	});
	
	function resetFields(row){
		row.closest("tr").find(".pack").val("");
		row.closest("tr").find(".quantity").val("");
		row.closest("tr").find(".expiry").val("");
		row.closest("tr").find(".quantity_available").val("");
		row.closest("tr").find(".unit_cost").val("");
		row.closest("tr").find("#total_amount").val("");
	}
	function updateCommodityQuantity(pack_object) {
		var packs = pack_object.attr("value");
		var pack_size = pack_object.closest("tr").find(".pack_size").attr("value");
		var quantity_holder = pack_object.closest("tr").find(".quantity");
		var available_quantity=pack_object.closest("tr").find(".quantity_available").val();
		available_quantity=parseInt(available_quantity);
		
		if(!isNaN(pack_size) && pack_size.length > 0 && !isNaN(packs) && packs.length > 0) {
			var qty=packs * pack_size;
			//If stock is going out, check that qty issued to be <= to qty available
			
			//Transaction coming in
			if($("#select_transtype").attr("value") == 1 || $("#select_transtype").attr("value") == 2 || $("#select_transtype").attr("value") == 3 ||$("#select_transtype").attr("value") == 4 || $("#select_transtype").attr("value") == 11 || $("#select_transtype").attr("value") == 0) {
				quantity_holder.css("background-color","#FFF");
				quantity_holder.attr("value",qty );
				
			} 
			//Transaction going out
			else {
				if(available_quantity>=qty){
					quantity_holder.css("background-color","#FFF");
					quantity_holder.attr("value",qty );
					quantity_holder.removeClass("stock_add_form_input_error");
				}
				else{
					quantity_holder.attr("value",qty );
					alert("Error !Quantity issued is greater than qty available!");
					quantity_holder.addClass("stock_add_form_input_error");
					quantity_holder.css("background-color","rgb(255, 92, 52)");
				}
			}
			
			
			
		}
	}
	
	function updateTotalCost(unit_cost_object) {
		var unit_cost = unit_cost_object.attr("value");
		var quantity_holder = unit_cost_object.closest("tr").find(".quantity").attr("value");
		var total_cost=unit_cost_object.closest("tr").find(".amount");
		if(!isNaN(unit_cost) && unit_cost.length > 0 && !isNaN(quantity_holder) && quantity_holder.length > 0) {
			total_cost.attr("value", unit_cost * quantity_holder);
		}
		else{
			total_cost.attr("value",0);
		}
	}
	
	function refreshDatePickers() {
		var counter = 0;
		$('.expiry').each(function() {
			var new_id = "date_" + counter;
			$(this).attr("id", new_id);
			$(this).datepicker("destroy");
			$(this).not('.hasDatePicker').datepicker({
				defaultDate : new Date(),
				dateFormat : $.datepicker.ATOM,
				changeYear : true,
				changeMonth : true
			});
			counter++;

		});
	}
	
	function retrieveFormValues() {
		//This function loops the whole form and saves all the input, select, e.t.c. elements with their corresponding values in a javascript array for processing
		var dump = Array;
		$.each($("input, select, textarea"), function(i, v) {
			var theTag = v.tagName;
			var theElement = $(v);
			var theValue = theElement.val();
			if(theElement.attr('type') == "radio") {
				var text = 'input:radio[name=' + theElement.attr('name') + ']:checked';
				dump[theElement.attr("name")] = $(text).attr("value");
			} else {
				dump[theElement.attr("name")] = theElement.attr("value");
			}
		});
		return dump;
	}
	
	function retrieveFormValues_Array(name) {
		var dump = new Array();
		var counter = 0;
		$.each($("input[name=" + name + "], select[name=" + name + "], select[name=" + name + "]"), function(i, v) {
			var theTag = v.tagName;
			var theElement = $(v);
			var theValue = theElement.val();
			dump[counter] = theElement.attr("value");
			counter++;
		});
		return dump;
	}
	
	
	
</script>

<div class="main-content">
	
		<div>
			<span id="msg_server"></span>
		</div>
		<div class="full-content" id="stock_div" style="background:#9CF">
		<form id="stock_form" method="post" action="<?php echo base_url().'inventory_management/save' ?>">

			<textarea name="sql" id="sql" style="display: none"></textarea>

		
			<div id="sub_title" >
				<a href="<?php  echo base_url().'inventory_management ' ?>">Inventory</a> <i class=" icon-chevron-right"></i>  <?php echo $store ?> 
				<hr size="1">
			</div>
			<div id="transaction_type_details">
				<h3>Transaction details</h3>
				<table>
					<tr><th>Transaction Date</th></tr>
					<tr><td><input type="text" name="transaction_date" id="transaction_date" class="input-large" /></td></tr>
					<tr><th>Transaction Type</th></tr>
					<tr><td><select name="transaction_type" id="select_transtype" class="input-large">
								<option value="0" selected="">-- Select Type --</option>
								<?php
								foreach ($transaction_types as $transaction_type) {
									if($stock_type==2){
										//Hide issued to
										if($transaction_type['id']!=6){
									?>
									<option value="<?php echo $transaction_type['id'] ?>"><?php echo $transaction_type['Name'] ?></option>
									<?php
										}
									}
									else{
										?>
										<option value="<?php echo $transaction_type['id'] ?>"><?php echo $transaction_type['Name'] ?></option>
										<?php
									}
								}
								?>
								
							</select>
						</td>
					</tr>
					<tr><th>Ref. /Order No</th></tr>
					<tr><td><input type="text" name="reference_number" id="reference_number" class="input-large" /></td></tr>
					<tr class="t_source"><th>Source</th></tr>
					<tr class="t_source"><td>
						<select name="source" id="select_source" class="input-large">
							<option value="0">--Select Source --</option>
							<?php
							foreach ($drug_sources as $drug_source) {
								//If stock type is main store, don't display main store as source
								if($stock_type==1 && $drug_source['id']==1){
									continue;
								}
							?>
							<option value="<?php echo $drug_source['id'] ?>"><?php echo $drug_source['Name'] ?></option>
							<?php
							}
							?>
						</select>
						</td>
					</tr>
					<tr class="t_destination"><th>Destination</th></tr>
					<tr class="t_destination"><td>
							<select name="destination" id="select_destination" class="input-large">
								<option value="0">--Select Destination --</option>
								<?php
								//Add satelittes if transaction from main store
								
									foreach ($satelittes as $satelitte) {
										?>
										<option value="<?php echo $satelitte['facilitycode'] ?>"><?php echo $satelitte['name'] ?></option>
									<?php
									}
								
								
								foreach ($drug_destinations as $drug_destination) {
									
									//Not picking outpatient pharmacy if stock type is pharmacy
									if($stock_type==2 && $drug_destination['id']==1){
										continue;
									}
									//Outpatient pharmacy
									if($drug_destination['id']==1){
									?>
									<option value="<?php echo $facility ?>"><?php echo $drug_destination['Name'] ?></option>
									<?php
									}
									else{
									?>
									<option value="<?php echo $drug_destination['id'] ?>"><?php echo $drug_destination['Name'] ?></option>
									<?php	
									}
								?>
								
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					
				</table>
			</div>
			<div id="drug_details">
				<h3>Drug details</h3>
				<table border="0" class="table table-bordered" id="drugs_table">
					<thead>
						<tr>
							<th>Drug</th>
							<th>Unit</th>
							<th>Pack Size</th>
							<th>Batch No.</th>
							<th>Expiry&nbsp;Date</th>
							<th>Packs</th>
							<th>Qty</th>
							<th>Available Qty</th>
							<th>Unit Cost</th>
							<th>Total</th>
							<th>Comment</th>
							<th style="width:350px">Action</th>
						</tr>
					</thead>
					<tbody >
						<tr drug_row="1">
							<td>
							<select id="select_drug" name="drug" class="drug"  style="min-width:150px;max-width:250px;">
								<option value="0"> -- Select Commodity --</option>
							</select></td>
							<td>
							<input type="text" id="unit" name="unit" class="unit small_text input-small" readonly="" />
							</td>
							<td>
							<input type="text"  id="pack_size" name="pack_size" class="pack_size small_text input-small" readonly="" />
							</td>
							<td><select name="batchselect" class="batchselect" id="batchselect_1" style="display:none;width:90px;"></select>
							<input type="text" name="batch" class="batch  validate[required] input-small"   id="batch_1" style="width:90px;"/>
							</td>
							<td>
							<input type="text" name="expiry" class="expiry medium_text" id="expiry_date" style="width:78px;font-size: 11px" />
							</td>
							<td>
							<input type="text" name="pack" class="pack small_text validate[required] input-small" id="packs_1"  />
							</td>
							<td>
							<input type="text" name="quantity" id="quantity_1" class="quantity small_text input-small" readonly="" />
							</td>
							<td>
							<input type="text" id="available_quantity" name="available_quantity" class="quantity_available medium_text input-small" readonly="" />
							</td>
							<td>
							<input type="text" name="unit_cost" id="unit_cost" class="unit_cost small_text input-small" />
							</td>
							<td>
							<input type="text" name="amount" id="total_amount" class="amount input-small input-small" readonly="" />
							</td>
							<td >
							<input type="text" name="comment" class="comment " style="width:150px"/>
							</td>
							<td style="text-align: center;font-size: 10px" >
								<a href="#" class="add" >Add</a>
								<span class="remove" style="display:none;"> |<a href="#" >Remove</a></span>
							</td>
							
						</tr>
					</tbody>
					
					
				</table>
			</div>
		
		
	
		<div id="submit_section">
			<input type="reset" class="btn" id="reset" value="Reset Fields" />
			<input type="button" class="btn" id="btn_submit" value="Submit" />
		</div>
	</form>
	</div>
</div>