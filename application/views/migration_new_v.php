<html>
	<head>
		<script type="text/javascript">
			$(document).ready(function() {
				var base_url="<?php echo base_url(); ?>";
				$("#table_list").multiselect().multiselectfilter();
				var table_array =['tblARVDrugStockMain', 'tblCurrentStatus', 'tblDose', 'tblDrugsInRegimen', 'tblGenericName', 'tblIndication', 'tblReasonforChange', 'tblRegimen', 'tblRegimenCategory', 'tblSecurity', 'tblARTPatientMasterInformation', 'tblStockTransactionType', 'tblTypeOfService', 'tblVisitTransaction', 'tblSourceOfClient', 'tblARTPatientTransactions', 'tblARVDrugStockTransactions'];
				var target_array =['drugcode', 'patient_status', 'dose', 'regimen_drug', 'generic_name', 'opportunistic_infection', 'regimen_change_purpose', 'regimen', 'regimen_category', 'users', 'patient','transaction_type', 'regimen_service_type', 'visit_purpose', 'patient_source', 'patient_visit', 'drug_stock_movement'];

				$("#migrate").click(function(){
					var selected_table=$("select#table_list").val();
					var checked_value=$("input[name='tablename']:checked").val();
					if(checked_value==0){
						//Selected All
						$.each(table_array,function(i){
								var table_name=array[i];
								var target_name=target_array[i+1];
                                if(table_name=='tblARTPatientTransactions' || table_name=='tblARVDrugStockTransactions'){
                                	//If patient and drug transactions(Advanced Migration)
                                	advancedMigration(table_name,target_name);
                                }else{
                                	//Other tables(Simple Migration)
                                	simpleMigration(table_name,target_name);
                                }
                         });
					}else{
						//Custom Select
						if(selected_table){
							selected_table=selected_table.toString();
							var array = selected_table.split(",");
							$.each(array,function(i){
								var table_name=array[i];
								var target_name=target_array[i+1];
                                if(table_name=='tblARTPatientTransactions' || table_name=='tblARVDrugStockTransactions'){
                                	//If patient and drug transactions(Advanced Migration)
                                	advancedMigration(table_name,target_name);
                                }else{
                                	//Other tables(Simple Migration)
                                	simpleMigration(table_name,target_name);
                                }
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
				
				function simpleMigration(table_name,target_name){
				   var link = base_url + "migration_management/simplemigrate/"+table_name+"/"+target_name;
					$.ajax({
						url : link,
						type : 'POST',
						success : function(data) {
							$("#output").append(data);
						}
					});
				}
				function advancedMigration(table_name,target_name){
				   var link = base_url + "migration_management/advancedmigrate/"+table_name+"/"+target_name;
					$.ajax({
						url : link,
						type : 'POST',
						success : function(data) {
							$("#output").append(data);
						}
					});
				}
			});

		</script>
		<style type="text/css">
			#table_view {
				margin: 0 auto;
				width: 50%;
				height:40%;
				background:#DDD;
			}
			#left_content{
				float:left;
				width:35%;
				padding:5px;
			}
			#right_content{
				float:right;
				width:60%;
				padding:5px;
				background:#999;
			}
			#output{
				width:100%;
				
			}
			#table_select{
				display:none;
				padding:5px;
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
					<div id="left_content">
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
				   </div>
					</div>
					<div id="right_content">
						<label>Migration Output</label>
						<div id="output"  disabled="disabled">
					
				        </div>
					</div>
			</fieldset>
		</div>
	</body>
</html>