//main function to be called on submit
function processData(button) {
	var form = button.attr("form");
	var form_selector = "#" + form;
	var validated = $(form_selector).validationEngine('validate');
	//var validated = true;
	if(validated) {
		var target = '';
		var local_table = '';
		var facility = "";
		var user = "";
		var machine_code = "";
		//Retrieve the environment variables
		selectEnvironmentVariables(function(transaction, results) {
			var variables = results.rows.item(0);
			machine_code = variables["machine_id"];
			facility = variables["facility"];
			user = variables['operator'];

			if(form == "add_patient_form") {
				target = "patient_management/save";
				local_table = 'patient';
				var dump = retrieveFormValues();
				var beast = "";
				var beast1 = "";
				//tokenize the information being gathered from checkboxes
				if($("select#plan_listing").val() != null) {
					beast = $("select#plan_listing").val();
				}

				if($("select#other_illnesses_listing").val() != null) {
					beast1 = $("select#other_illnesses_listing").val();
				}

				//Retrieve all form input elements and their values

				var patient_number = dump["patient_number"];
				getPatientDetails(patient_number, function(transaction, results) {
					if(results.rows.length > 0) {
						alert("patient number id already exists");
						return
					} else {
						var timestamp = new Date().getTime();
						var sql = "INSERT INTO patient (medical_record_number, patient_number_ccc, first_name, last_name, other_name, dob, pob, gender, pregnant," + " start_weight,start_height,start_bsa, phone, physical, alternate, other_illnesses, other_drugs, adr, tb, smoke, alcohol, date_enrolled, source, supported_by," + " timestamp, facility_code, service, machine_code,sms_consent,partner,fplan,tbphase,startphase,endphase,partner_status,current_status,status_change_date,support_group,start_regimen,start_regimen_date,transfer_from,height,weight,sa) VALUES ('" + dump["medical_record_number"] + "', '" + dump["patient_number"] + "', '" + dump["first_name"] + "', '" + dump["last_name"] + "', '" + dump["other_name"] + "', '" + dump["dob"] + "', '" + dump["pob"] + "', '" + dump["gender"] + "', '" + dump["pregnant"] + "', '" + dump["weight"] + "', '" + dump["height"] + "', '" + dump["surface_area"] + "', '" + dump["phone"] + "', '" + dump["physical"] + "', '" + dump["alternate"] + "', '" + beast1 + "', '" + dump["other_drugs"] + "', '" + dump["other_allergies_listing"] + "', '" + dump["tb"] + "', '" + dump["smoke"] + "', '" + dump["alcohol"] + "', '" + dump["enrolled"] + "', '" + dump["source"] + "', '" + dump["support"] + "', '" + timestamp + "','" + facility + "', '" + dump["service"] + "','" + machine_code + "','" + dump["sms_consent"] + "','" + dump["pstatus"] + "','" + beast + "','" + dump["tbphase"] + "','" + dump["fromphase"] + "','" + dump["tophase"] + "','" + dump["disco"] + "','" + dump["current_status"] + "','" + dump["status_started"] + "','" + dump["support_group_listing"] + "','" + dump["regimen"] + "','" + dump["service_started"] + "','" + dump["patient_source"] + "','" + dump["height"] + "','" + dump["weight"] + "','" + dump["surface_area"] + "');";
						//console.log(sql);
						var url = "";
						if(button.attr("id") == "dispense") {
							url = "dispense.html#?patient_number=" + dump["patient_number"];
						} else {
							url = "patient_management.html#?message=Patient record for " + dump["first_name"] + " " + dump["last_name"] + " saved successfully";
						}
						var combined_object = {
							0 : target,
							1 : sql,
							2 : timestamp,
							3 : local_table,
							4 : url
						};
						var saved_object = JSON.stringify(combined_object);
						saveDataLocally(saved_object);

					}
				});
			} else if(form == "dispense_form") {
				var timestamp = new Date().getTime();
				target = "dispensement_management/save";
				local_table = 'patient_visit';
				//Before going any further, first calculate the number of drugs being dispensed
				var drugs_count = 0;
				$.each($(".drug"), function(i, v) {
					if($(this).attr("value")) {
						drugs_count++;
					}
				});
				//If no drugs were dispensed, exit
				if(drugs_count == 0) {
					return;
				}
				//Retrieve all form input elements and their values
				var dump = retrieveFormValues();
				//Call this function to do a special retrieve function for elements with several values
				var drugs = retrieveFormValues_Array('drug');
				var batches = retrieveFormValues_Array('batch');
				var doses = retrieveFormValues_Array('dose');
				var brands = retrieveFormValues_Array('brand');
				var expiry = retrieveFormValues_Array('expiry');
				var indications = retrieveFormValues_Array('indication');
				var pill_counts = retrieveFormValues_Array('pill_count');
				var comments = retrieveFormValues_Array('comment');
				var missed_pills = retrieveFormValues_Array('missed_pills');
				var quantities = retrieveFormValues_Array('qty_disp');
				var durations = retrieveFormValues_Array('duration');
				var next_appointment_sql = "";
				var drug_consumption = " ";
				var transaction_type = 5;
				var dispensing_date_timestamp = Date.parse(dump["dispensing_date"]);
				//Check if there is a date indicated for the next appointment. If there is, schedule it!
								if($("#next_appointment_date").attr("value").length > 1) {
					var last_date = dump["last_appointment_date"];
					var todays_date = dump["dispensing_date"];
					var last_String = last_date.toString();
					var today_string = todays_date.toString();
					//If there is a last appointment date
					if(last_String) {
						//Check if last appointment date is greater than today(Came later than appointment date)
						if(last_String > today_string) {
							next_appointment_sql = "update patient_appointment set appointment='" + dump["next_appointment_date"] + "' where patient='" + dump["patient"] + "' and appointment='" + last_date + "';";
						}
						//check if last apppointment date is equal to today(Came on correct appointment date) or //Check if last appointment date is less than today(Came earlier than appointment date)
						else {
							next_appointment_sql = "insert into patient_appointment (patient,appointment,facility,machine_code) values ('" + dump["patient"] + "','" + dump["next_appointment_date"] + "','" + facility + "','" + machine_code + "');";

						}
					}
					//If no appointment date
					else {
						next_appointment_sql = "insert into patient_appointment (patient,appointment,facility,machine_code) values ('" + dump["patient"] + "','" + dump["next_appointment_date"] + "','" + facility + "','" + machine_code + "');";

					}

				}
				var sql = next_appointment_sql;
				sql += "UPDATE patient SET height='" + dump["height"] + "',current_regimen='" + dump["current_regimen"] + "',nextappointment='" + dump["next_appointment_date"] + "' where patient_number_ccc ='" + dump["patient"] + "';";
				//After getting the number of drugs issued, create a unique entry (sql statement) for each in the database in this loop
				for(var i = 0; i < drugs_count; i++) {
					sql += "INSERT INTO patient_visit (patient_id, visit_purpose, current_height, current_weight, regimen, regimen_change_reason, drug_id, batch_number, brand, indication, pill_count, comment, timestamp, user, facility, dose, dispensing_date, dispensing_date_timestamp,machine_code,quantity,duration,adherence,missed_pills,non_adherence_reason) VALUES ('" + dump["patient"] + "', '" + dump["purpose"] + "', '" + dump["height"] + "', '" + dump["weight"] + "', '" + dump["current_regimen"] + "', '" + dump["regimen_change_reason"] + "', '" + drugs[i] + "', '" + batches[i] + "', '" + brands[i] + "', '" + indications[i] + "', '" + pill_counts[i] + "', '" + comments[i] + "', '" + timestamp + "', '" + user + "', '" + facility + "', '" + doses[i] + "', '" + dump["dispensing_date"] + "', '" + dispensing_date_timestamp + "','" + machine_code + "','" + quantities[i] + "','" + durations[i] + "','" + dump["adherence"] + "','" + missed_pills[i] + "','" + dump["non_adherence_reasons"] + "');";
					drug_consumption = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date,quantity, quantity_out, facility, machine_code,timestamp) VALUES ('" + drugs[i] + "', '" + dump["dispensing_date"] + "', '" + batches[i] + "', '" + transaction_type + "','"+facility+"','"+facility+"','" + expiry[i] + "',0,'" + quantities[i] + "','" + facility + "','" + machine_code + "','" + timestamp + "');";
					sql += drug_consumption;
				};
				//console.log(sql);
				var url = "patient_details.html#?patient_number=" + dump['patient'] + "&message=Dispensing data for " + dump['patient'] + " saved successfully";
				var combined_object = {
					0 : target,
					1 : sql,
					2 : timestamp,
					3 : local_table,
					4 : url
				};
				var saved_object = JSON.stringify(combined_object);
				saveDataLocally(saved_object);
			} 
			
			else if(form == "stock_form") {
				target = "inventory_management/save";
				var timestamp = new Date().getTime();
				local_table = 'drug_stock_movement';
				//Before going any further, first calculate the number of drugs being recorded
				var drugs_count = 0;
				$.each($(".drug"), function(i, v) {
					if($(this).attr("value")) {
						drugs_count++;
					}
				});
				//If no drugs were dispensed, exit
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

				//If transaction is from store
				if(dump['add_stock_type']=='1'){
					if(dump["transaction_type"] == 1 || dump["transaction_type"] == 2 || dump["transaction_type"] == 3 || dump["transaction_type"] == 4 || dump["transaction_type"] == 11) {
						var quantity_choice = "quantity";
						var quantity_out_choice = "quantity_out";
					} else {
						var quantity_choice = "quantity_out";
						var quantity_out_choice = "quantity";
					}
				}
				//If transaction is from pharmacy
				else if(dump['add_stock_type']=='2'){
					//If transaction is received from
					if(dump["transaction_type"] == 1 || dump["transaction_type"] == 2 || dump["transaction_type"] == 3 || dump["transaction_type"] == 4 || dump["transaction_type"] == 11) {
						var quantity_choice = "quantity";
						var quantity_out_choice = "quantity_out";
						
						
					} else {
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
					else if(dump["transaction_type"] == 5 && dump['add_stock_type']=='2'){
						source=facility;
						destination=facility;
					}
					
					//When issuing, source is facility (for store transaction)
					else if(dump["transaction_type"] == 6){
						source=facility;
						destination=dump['destination'];
					}
					//Pharmacy transaction:Received from Main Store
					else if(dump["transaction_type"]==1 && dump['add_stock_type']=='2'){
						source=dump['source'];
						destination=facility;
					}
					//Physical count store
					else if(dump["transaction_type"]==11 && dump['add_stock_type']=='1'){
						source=facility;
						destination="";
					}
					//Physical count pharmacy
					else if(dump["transaction_type"]==11 && dump['add_stock_type']=='2'){
						source=facility;
						destination=facility;
						
					}
					else{
						destination=facility;
						source=dump['source'];
					}
					var sql = "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs," + quantity_choice + "," + quantity_out_choice + ", unit_cost, amount, remarks, operator, order_number, facility, machine_code,timestamp) VALUES ('" + drugs[i] + "', '" + dump["transaction_date"] + "', '" + batches[i] + "', '" + dump["transaction_type"] + "', '" + source + "', '" + destination + "', '" + expiries[i] + "', '" + packs[i] + "', '" + quantities[i] + "','0','" + unit_costs[i] + "', '" + amounts[i] + "', '" + comments[i] + "','" + user + "','" + dump["reference_number"] + "','" + facility + "','" + machine_code + "','" + timestamp + "');";
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
						var transaction_type=1;
						sql_queries += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number,transaction_type, source, destination, expiry_date, packs," + quantity_out_choice + "," + quantity_choice + ", unit_cost, amount, remarks, operator, order_number, facility, machine_code,timestamp) VALUES ('" + drugs[i] + "', '" + dump["transaction_date"] + "', '" + batches[i] + "', '" + transaction_type + "', '" + source + "', '" + destination + "', '" + expiries[i] + "', '" + packs[i] + "', '" + quantities[i] + "','0','" + unit_costs[i] + "', '" + amounts[i] + "', '" + comments[i] + "','" + user + "','" + dump["reference_number"] + "','" +  destination + "','" + machine_code + "','" + timestamp + "')";
					}
					
					//Pharmacy transaction, substract main store balance
					else if(dump["transaction_type"]=='1' && dump["source"]==facility ){
						var transaction_type=6;
						sql_queries += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type, source, destination, expiry_date, packs," + quantity_out_choice + "," + quantity_choice + ", unit_cost, amount, remarks, operator, order_number, facility, machine_code,timestamp) VALUES ('" + drugs[i] + "', '" + dump["transaction_date"] + "', '" + batches[i] + "', '" + transaction_type + "', '" + source + "', '', '" + expiries[i] + "', '" + packs[i] + "', '" + quantities[i] + "','0','" + unit_costs[i] + "', '" + amounts[i] + "', '" + comments[i] + "','" + user + "','" + dump["reference_number"] + "','" +  destination + "','" + machine_code + "','" + timestamp + "')";
					}
					
					
				};
				var url = "inventory.html#?message=Stock inventory data saved successfully";
				var combined_object = {
					0 : target,
					1 : sql_queries,
					2 : timestamp,
					3 : local_table,
					4 : url
				};
				var saved_object = JSON.stringify(combined_object);
				saveDataLocally(saved_object);
				return;

			} else if(form == "edit_patient_form") {
				target = "patient_management/save";
				local_table = 'patient';
				var dump = retrieveFormValues();
				var family_planning = $("select#theplan").multiselect("getChecked").map(function() {
					return this.value;
				}).get();
				var beast3 = $("select#other_illnesses_listing").multiselect("getChecked").map(function() {
					return this.value;
				}).get();

				var other_diseases = $("#other_chronic").val();

				//Fixing Other for other illness listing
				if(jQuery.inArray("-13-", beast3) != -1 && other_diseases != "") {
					beast3[beast3.indexOf("-13-")] = other_diseases;
				}

				var timestamp = new Date().getTime();
				//Check if there is a date indicated for the next appointment. If there is, schedule it!
				if(dump["appointment_checker"] == 1) {
					next_appointment_sql = "update patient_appointment set appointment = '" + dump["next_appointment_date_holder"] + "' where patient = '" + dump["patient_number"] + "' and facility = '" + facility + "';";

				}
				if(dump["appointment_checker"] == 0) {
					next_appointment_sql = "insert into patient_appointment (patient,appointment,facility,machine_code) values ('" + dump["patient_number"] + "','" + dump["next_appointment_date_holder"] + "','" + facility + "','" + machine_code + "');";

				}
				var sql = "UPDATE patient SET medical_record_number='" + dump["medical_record_number"] + "', first_name='" + dump["first_name"] + "', last_name='" + dump["last_name"] + "', other_name='" + dump["other_name"] + "', dob='" + dump["dob"] + "', pob='" + dump["pob"] + "', gender='" + dump["gender"] + "', pregnant='" + dump["pregnant"] + "',weight='" + dump["current_weight"] + "', height='" + dump["current_height"] + "', sa='" + dump["current_bsa"] + "', phone='" + dump["phone"] + "', physical='" + dump["physical"] + "', alternate='" + dump["alternate"] + "', other_illnesses='" + beast3 + "', other_drugs='" + dump["other_drugs"] + "', adr='" + dump["other_allergies_listing"] + "', tb='" + dump["tb"] + "', smoke='" + dump["smoke"] + "', alcohol='" + dump["alcohol"] + "', date_enrolled='" + dump["enrolled"] + "', source='" + dump["source"] + "', supported_by='" + dump["support"] + "',timestamp='" + timestamp + "',service='" + dump["service"] + "', start_regimen='" + dump["regimen"] + "', start_regimen_date='" + dump["service_started"] + "', machine_code='" + machine_code + "', sms_consent='" + dump["sms_consent"] + "', current_status='" + dump["current_status"] + "',partner_status='" + dump["partner_status"] + "',fplan='" + family_planning + "',tbphase='" + dump["tbphase"] + "',startphase='" + dump["fromphase"] + "',endphase='" + dump["tophase"] + "',partner_type='" + dump["disco"] + "',status_change_date='" + dump["status_started"] + "',support_group='" + dump["support_group_listing"] + "',nextappointment='" + dump["next_appointment_date_holder"] + "',current_regimen='" + dump["current_regimen"] + "',start_height='" + dump["start_height"] + "',start_weight='" + dump["start_weight"] + "',start_bsa='" + dump["start_bsa"] + "',transfer_from='" + dump["patient_source"] + "'  WHERE patient_number_ccc='" + dump["patient_number"] + "' AND facility_code='" + facility + "';";
				sql += next_appointment_sql;
				//console.log(sql);
				var combined_object = {
					0 : target,
					1 : sql,
					2 : timestamp,
					3 : local_table,
					4 : "patient_details.html#?patient_number=" + dump["patient_number"] + "&message=Edited Data for " + dump['patient_number'] + " saved successfully"
				};
				var saved_object = JSON.stringify(combined_object);
				saveDataLocally(saved_object);
			} else if(form == "edit_dispense_form") {
				target = "dispensement_management/save_edit";
				local_table = 'patient_visit';
				var dump = retrieveFormValues();
				var timestamp = new Date().getTime();
				var redirect_url = "";
				if(dump["delete_trigger"] == "1") {
					var sql = "delete from patient_visit WHERE patient_id='" + dump["patient"] + "' AND facility='" + facility + "' and dispensing_date='" + dump["original_dispensing_date"] + "' and drug_id='" + dump["original_drug"] + "' and id='" + dump["dispensing_id"] + "';";
					sql += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date, quantity, facility, machine_code,timestamp) SELECT '" + dump["original_drug"] + "','" + dump["original_dispensing_date"] + "', '" + dump["batch"] + "','4','"+facility+"','"+facility+"',expiry_date,'" + dump["qty_disp"] + "','" + facility + "','" + machine_code + "','" + timestamp + "' from drug_stock_movement WHERE batch_number= '" + dump["batch"] + "' AND drug='" + dump["original_drug"] + "' LIMIT 1;";
					redirect_url = "patient_details.html#?patient_number=" + dump['patient'] + "&message=Dispensing Data for " + dump['patient'] + " deleted successfully";
				} else {
					var sql = "UPDATE patient_visit SET dispensing_date = '" + dump["dispensing_date"] + "', visit_purpose = '" + dump["purpose"] + "', current_weight='" + dump["weight"] + "', current_height='" + dump["height"] + "', regimen='" + dump["current_regimen"] + "', drug_id='" + dump["drug"] + "', batch_number='" + dump["batch"] + "', dose='" + dump["dose"] + "', duration='" + dump["duration"] + "', quantity='" + dump["qty_disp"] + "', brand='" + dump["brand"] + "', indication='" + dump["indication"] + "', pill_count='" + dump["pill_count"] + "', comment='" + dump["comment"] + "',non_adherence_reason='" + dump["non_adherence_reasons"] + "',adherence='" + dump["adherence"] + "' WHERE patient_id='" + dump["patient"] + "' AND facility='" + facility + "' and dispensing_date='" + dump["original_dispensing_date"] + "' and drug_id='" + dump["original_drug"] + "' and id='" + dump["dispensing_id"] + "';";
					if(dump["batch"] != dump["batch_hidden"] || dump["qty_disp"] != dump["qty_hidden"]) {
						sql += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date, quantity, facility, machine_code,timestamp) SELECT '" + dump["original_drug"] + "','" + dump["original_dispensing_date"] + "', '" + dump["batch_hidden"] + "','4','"+facility+"','"+facility+"',expiry_date,'" + dump["qty_hidden"] + "','" + facility + "','" + machine_code + "','" + timestamp + "' from drug_stock_movement WHERE batch_number= '" + dump["batch_hidden"] + "' AND drug='" + dump["original_drug"] + "' LIMIT 1;";
						sql += "INSERT INTO drug_stock_movement (drug, transaction_date, batch_number, transaction_type,source,destination,expiry_date, quantity_out, facility, machine_code,timestamp) SELECT '" + dump["drug"] + "','" + dump["original_dispensing_date"] + "', '" + dump["batch"] + "','5','"+facility+"','"+facility+"',expiry_date,'" + dump["qty_disp"] + "','" + facility + "','" + machine_code + "','" + timestamp + "' from drug_stock_movement WHERE batch_number= '" + dump["batch"] + "' AND drug='" + dump["drug"] + "' LIMIT 1;";
					}
					redirect_url = "patient_details.html#?patient_number=" + dump['patient'] + "&message=Edited Dispensing Data for " + dump['patient'] + " saved successfully";
				}

				//console.log(sql);
				var combined_object = {
					0 : target,
					1 : sql,
					2 : timestamp,
					3 : local_table,
					4 : redirect_url
				};
				var saved_object = JSON.stringify(combined_object);
				saveDataLocally(saved_object);

			}
		});
		//end environmental variables callback
	}
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

function retrieveSelectedFormValues_Array(name) {
	var dump = new Array();
	var counter = 0;
	$.each($("input[name=" + name + "]:checked, select[name=" + name + "]:checked, select[name=" + name + "]:checked"), function(i, v) {
		var theTag = v.tagName;
		var theElement = $(v);
		var theValue = theElement.val();
		dump[counter] = theElement.attr("value");
		counter++;
	});
	return dump;
}

//called on submit if device is online from processData()
function sendDataToServer(data) {
	var separated_data = JSON.parse(data);
	var dataString = separated_data[1];
	var target = separated_data[0];
	var local_timestamp = separated_data[2];
	var local_table = separated_data[3];
	$.post(target, {
		sql : dataString
	}, function(data_returned) {
		console.log('Sent to server: ' + dataString + '');
		window.localStorage.removeItem(local_timestamp);
	});
}

//called on submit if device is offline from processData()
function saveDataLocally(data) {

	var separated_data = JSON.parse(data);
	var sql = separated_data[1];
	var timestamp = separated_data[2];
	var url = separated_data[4];

	var length = window.localStorage.length;
	document.querySelector('#local-count').innerHTML = length;
	var queries = sql.split(";");
	callbackExecuteStatementArray(queries, function(transaction, resultset) {

		//alert(transaction);
		localStorage.setItem(timestamp, data);
		window.location = url;

	});
	//
}

//called if device goes online or when app is first loaded and device is online
//only sends data to server if locally stored data exists
function sendLocalDataToServer() {

	var status = document.querySelector('#status');
	status.className = 'online';
	status.innerHTML = 'Online';

	var i = 0, dataString = '';

	for( i = 0; i <= window.localStorage.length - 1; i++) {
		dataString = localStorage.key(i);
		if(dataString) {
			sendDataToServer(localStorage.getItem(dataString));
		}
	}

	document.querySelector('#local-count').innerHTML = window.localStorage.length;
}

//called when device goes offline
function notifyUserIsOffline() {

	var status = document.querySelector('#status');
	status.className = 'offline';
	status.innerHTML = 'Offline';
}

//This function is to get the 'get' parameters passed in the url
function getQueryParams(qs) {
	qs = qs.substr(1);
	qs = qs.split("+").join(" ");
	var params = {}, tokens, re = /[?&]?([^=]+)=([^&]*)/g;

	while( tokens = re.exec(qs)) {
		params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
	}

	return params;
}

//called when DOM has fully loaded
function loaded() {

	//update local storage count
	var length = window.localStorage.length;
	document.querySelector('#local-count').innerHTML = length;

	//if online

	if(navigator.onLine) {

		//update connection status
		var status = document.querySelector('#status');
		status.className = 'online';
		status.innerHTML = 'Online';

		//if local data exists, send try post to server
		if(length !== 0) {
			sendLocalDataToServer();
		}
	}

	//listen for connection changes
	window.addEventListener('online', sendLocalDataToServer, false);
	window.addEventListener('offline', notifyUserIsOffline, false);

	//
	//document.querySelector('.submit-button').addEventListener('click', processData, true);
	$(".submit-button").click(function() {
		//Check if there exist some rows which have qty issued greater than the qty available
		if ($(".stock_add_form_input_error")[0]){
		   alert("Some commodities have quantity issued greated than available qty !");
		}
		else{
			processData($(this));
		}
		
	});
}

window.addEventListener('load', loaded, true);
