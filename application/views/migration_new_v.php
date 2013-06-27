<html>
	<head>
		<script type="text/javascript">
			$(document).ready(function() {
				var base_url="<?php echo base_url(); ?>";
				$("#table_list").multiselect().multiselectfilter();
				var table_array =['tblARVDrugStockMain', 'tblCurrentStatus', 'tblDose', 'tblDrugsInRegimen', 'tblGenericName', 'tblIndication', 'tblReasonforChange', 'tblRegimen', 'tblRegimenCategory', 'tblSecurity', 'tblARTPatientMasterInformation', 'tblStockTransactionType', 'tblTypeOfService', 'tblVisitTransaction', 'tblSourceOfClient', 'tblARTPatientTransactions', 'tblARVDrugStockTransactions'];
				var target_array =['drugcode', 'patient_status', 'dose', 'regimen_drug', 'generic_name', 'opportunistic_infection', 'regimen_change_purpose', 'regimen', 'regimen_category', 'users_new', 'patient_new','transaction_type', 'regimen_service_type', 'visit_purpose', 'patient_source','patient_visit_new', 'drug_stock_movement_new'];

				$("#migrate").click(function(){
					var selected_table=$("select#table_list").val();
					var checked_value=$("input[name='tablename']:checked").val();
					if(checked_value==0){
						//Selected All
						$.each(table_array,function(i){
								var table_name=table_array[i];
								var offset=0;
								var index =table_array.indexOf(table_name);
								var target_name=target_array[index];
								//Check Migration Log
								checklog(table_name,target_name);
                         });
					}else{
						//Custom Select
						if(selected_table){
							selected_table=selected_table.toString();
							var array = selected_table.split(",");
							$.each(array,function(i){
								var table_name=array[i];
								var index =table_array.indexOf(table_name);
								var target_name=target_array[index];
								//Check Migration Log
								checklog(table_name,target_name);
                            });
						}						  
					}
				});
				
				$("#tablecustom").click(function(){
					$("#table_select").show();
				});
				$("#tablename").click(function(){
					$("#table_select").hide();
				});
				
				function simpleMigration(table_name,target_name,offset){
				   var link = base_url + "migration_management/simplemigrate/"+table_name+"/"+target_name+"/"+offset;
					$.ajax({
						url : link,
						type : 'POST',
						success : function(data) {
							$("#output").append(data);
						}
					});
				}
				function advancedMigration(table_name,target_name,offset){
				   var link = base_url + "migration_management/countRecords/"+table_name;
                   var count=parseFloat(offset);
				   var percentage=0;
				   var viewpercentage="";
				   if(table_name=="tblARTPatientTransactions"){
				   	viewpercentage="ppercentage";
				   }else if(table_name=="tblARVDrugStockTransactions"){
				   	viewpercentage="dpercentage";
				   }
				   $.ajax({
						url : link,
						type : 'POST', 
						success : function(data) {
							      var total_records=parseFloat(data);
							      percentage=((count/total_records)*100).toFixed(1);
							       $("#output").append("Data From <b>"+table_name+"</b> Migrated to <b>"+target_name+"</b> table (<span id='"+viewpercentage+"'>"+percentage+"% </span>)<br/>");
							           //Check while Counter is not equal to total
							           recursive(table_name,target_name,count,total_records); 
								  }
				    });
				}

				function recursive(table_name,target_name,count,total_records) {
					var link = base_url + "migration_management/advancedmigrate/" + table_name + "/" + target_name + "/" + count;
						$.ajax({
						  url : link,
						  type : 'POST',
						  success : function(data) {
						  	var selected_data=data.toString();
							var selected_array = selected_data.split(",");
							var count=parseFloat(selected_array[0]);
							var offset=parseFloat(selected_array[1]);
						    percentage = ((count / total_records) * 100).toFixed(1);
						    
						    if(table_name=="tblARTPatientTransactions"){
				   	           var percent="ppercentage";
				   	           if(count<=total_records){
								recursive(table_name,target_name,offset,total_records); 
							   }
				            }else if(table_name=="tblARVDrugStockTransactions"){
				   	           var percent="dpercentage";
				   	           if(count<=total_records){
								recursive(table_name,target_name,offset,total_records); 
							  }
				            }
				            $("#"+percent).text(percentage + '%');
							 
						   }
						});
				}
				
				function updatelog(table_name,last_index,count){
					var link = base_url + "migration_management/updatelog/" + table_name+"/"+last_index+"/"+count;
						$.ajax({
						  url : link,
						  type : 'POST',
						  success : function(data) {
                         
                          }
						});
					
				}
				function checklog(table_name,target_name){
					var link = base_url + "migration_management/checklog/" + target_name;
						$.ajax({
						  url : link,
						  type : 'POST',
						  success : function(data) {
						    var offset=parseFloat(data)
						     if(table_name=='tblARTPatientTransactions' || table_name=='tblARVDrugStockTransactions'){
                                	//If patient and drug transactions(Advanced Migration)
                                	advancedMigration(table_name,target_name,offset);
                                }else{
                                	//Other tables(Simple Migration)
                                	simpleMigration(table_name,target_name,offset);
                               }
						  }
						});
					
				}

		  });
		</script>
		<style type="text/css">
			#table_view {
				margin: 0 auto;
				width:65%;
				background:#DDD;
			}
			#output{
				width:100%;
			}
			#table_select{
				display:none;
				padding:5px;
				width:400px;
			}
			#table_list{
				width:250px;
			}
		</style>
	</head>
	<body>
		<div class="full-content" id="table_view">
			<fieldset>
				<legend class="leg">
						<p>
							webADT Migration Configuration
						</p>
					</legend>
						<p>
						All <input type="radio" name="tablename" id="tablename" checked="checked" value="0"/>
						Custom <input type="radio" name="tablename" id="tablecustom" value="1"/>
						</p>
						<div id="table_select">
						Tables
						<select id="table_list" multiple="multiple">
							<?php 
							 foreach($tables as $table){
							 	echo "<option value='".$table."'> ". $table." </option>";
							 }
							?>
						</select>
						</div>
						<div class="button-bar">
						<p></p>
						<div class="btn-group">
							<input type="submit" value="Migrate"  id='migrate'" class="btn"/>
						</div>
						<p>
						<div id="output"  disabled="disabled">
					          Migration Started<br/><hr/>
				        </div>
				        </p>
			</fieldset>
		</div>
	</body>
</html>