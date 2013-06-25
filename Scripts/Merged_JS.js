//Load datatables settings

$(document).ready(function() {
	oTable = $('.setting_table').dataTable({
		"sScrollY" : "240px",
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",

	});

});  
/**
 * End of datatables settings
 */

	
	/**
	 *Change password validation 
	 */
	$(document).ready(function() {
		
			$("#change_password_link").click(function(){
				$("#old_password").attr("value","");
				$("#new_password").attr("value","");
				$("#new_password_confirm").attr("value","");
				$(".error").html("");
				$(".error").css("display","none");
				$("#result").html("");
			});
			
			$(".error").css("display","none");
			$('#new_password').keyup(function() {
				$('#result').html(checkStrength($('#new_password').val()))
			})
			function checkStrength(password) {
	
				//initial strength
				var strength = 0
	
				//if the password length is less than 6, return message.
				if (password.length < 6) {
					$('#result').removeClass()
					$('#result').addClass('short')
					return 'Too short'
				}
	
				//length is ok, lets continue.
	
				//if length is 8 characters or more, increase strength value
				if (password.length > 7)
					strength += 1
	
				//if password contains both lower and uppercase characters, increase strength value
				if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
					strength += 1
	
				//if it has numbers and characters, increase strength value
				if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
					strength += 1
	
				//if it has one special character, increase strength value
				if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
					strength += 1
	
				//if it has two special characters, increase strength value
				if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/))
					strength += 1
	
				//now we have calculated strength value, we can return messages
	
				//if value is less than 2
				if (strength < 2) {
					$('#result').removeClass()
					$('#result').addClass('weak')
					return 'Weak'
				} else if (strength == 2) {
					$('#result').removeClass()
					$('#result').addClass('good')
					return 'Good'
				} else {
					$('#result').removeClass()
					$('#result').addClass('strong')
					return 'Strong'
				}
			}
	
	
			$("#btn_submit_change_pass").click(function(event) {
				$(".error").css("display","none");
				$('#result_confirm').html("");
				event.preventDefault();
				var old_password = $("#old_password").attr("value");
				var new_password = $("#new_password").attr("value");
				var new_password_confirm = $("#new_password_confirm").attr("value");
				
				if (new_password == "" || new_password_confirm=="" || old_password=="") {
					$(".error").css("display","block");
					$("#error_msg_change_pass").html("All fields are required !");
				} 
				else if($('#new_password').val().length < 6){
					$(".error").css("display","block");
					$("#error_msg_change_pass").html("Your password must have more than 6 characters!");
				}
				else if ($("#result").attr("class") == "weak") {
					$(".error").css("display","block");
					$("#error_msg_change_pass").html("Please enter a strong password!");
				} else if (new_password != new_password_confirm) {
					$(".error").css("display","block");
					$('#result_confirm').removeClass();
					$('#result_confirm').addClass('short');
					$("#error_msg_change_pass").html("You passwords do not match !");
				} else {
					$(".error").css("display","none");
					//$("#fmChangePassword").submit();
					var _url="user_management/save_new_password";
					var request=$.ajax({
					     url: _url,
					     type: 'post',
					     data: {"old_password":old_password,"new_password":new_password},
					     dataType: "json"
				    });
				     request.done(function(data){
				     	$.each(data,function(key,value){
				     		if(value=="password_no_exist"){
				     			$("#error_msg_change_pass").css("display","block");
				     			$("#error_msg_change_pass").html("You entered a wrong password!");
				     		}
				    		else if(value=="password_exist"){
				    			$("#error_msg_change_pass").css("display","block");
				     			$("#error_msg_change_pass").html("Your new password matches one of your three pevious passwords!");
				    		}
				    		else if(value=="password_changed"){
				    			$("#error_msg_change_pass").css("display","block");
				    			$("#error_msg_change_pass").removeClass("error");
				    			$("#error_msg_change_pass").addClass("success");
				    			$("#error_msg_change_pass").html("Your password was successfully updated!");
				    			window.setTimeout('location.reload()', 3000);
				    		}
				    		else{
				    			alert(value);
				    		}
				   		});
				     });
				     request.fail(function(jqXHR, textStatus) {
					  alert( "An error occured while updating your password : " + textStatus+". Please try again or contact your system administrator!" );
					});
				}
			});
	
		});
		/**
	 * End Change password validation 
	 */

	initDatabase();

/*

	//initDatabase();

	//Retrieve the Facility Code
	var facility_code = "<?php echo $this -> session -> userdata('facility');?>";
	var facility_name = "<?php echo $this -> session -> userdata('facility_name');?>";

	$(document).ready(function() {
	
		var machine_code = $("#machine_code").attr("value");
		var operator = $("#operator").attr("value");
		//saveEnvironmentVariables(machine_code, operator);
		var base_url="<?php echo base_url(); ?>";
		$.ajax({
			
			type: "POST",
			url:  base_url+"user_management/update_machinecode/"+machine_code,
			success: function(data){
               console.log(data);
			}					
	    });
	  
	    
	    var fade_out = function() {
	      $(".error").fadeOut().empty();
	    }
	    setTimeout(fade_out, 5000);
		
		
		$("#manualcontent").tabs().scroll();
		$("#environment_variables").dialog({
			height : 300,
			width : 300,
			modal : true,
			autoOpen : false
		});
		$("#manual_dialog").dialog({
			height :'auto',
			width : '80%',
			modal : true,
			autoOpen : false
		});
		$(".tabs").click(function(){
				$("#manual_dialog").dialog('open');	
		})

/*
		selectEnvironmentVariables(function(transaction, results) {
			var variables = null;
			var machine_code = "";
			var operator = "";
			try {
				variables = results.rows.item(0);
			} catch(err) {
				variables = false;
			}
			//If a row was returned, retrieve the variables
			if(variables != false) {
				//Update the facility details with the ones assigned to the logged in user.
				saveFacilityDetails(facility_code, facility_name);
				//Retrieve the other environment variables if they contain any values
				if(variables['machine_id'] != null) {
					machine_code = variables['machine_id'];
				}
				if(variables['operator'] != null) {
					operator = variables['operator'];
				}

			}
			//If a row was not returned, create one with the facility id attached to the logged in user
			else if(variables == false) {
				createEnvironmentVariables(facility_code, facility_name);
			}
			//Check whether the other two environment variables (machine_code and operator) have values. If not, prompt the user to enter them
			if(machine_code.length == 0 || operator.length == 0) {
				$("#environment_variables").dialog('open');
			} else if(machine_code.length > 0 || operator.length > 0) {
				checkSync();
			}
		});
		
		
		//Add Listener to the save button of the dialog box so as to save the entered environment variables
		$("#save_variables").click(function() {
			var machine_code = $("#machine_code").attr("value");
			var operator = $("#operator").attr("value");
			//Check if both variables contain values. If so, save these values
			if(machine_code.length > 0 && operator.length > 0) {
				saveEnvironmentVariables(machine_code, operator);
				$("#environment_variables").dialog('close');
				checkSync();
			} else {
				alert("Please enter values for both fields to continue");
			}
		});
		
		//Add a listener to the hover event of the synchronize div box. When the user hovers over the div, show the 'Synchronize now' Button
			$("#synchronize").hover(
			  function () {
			    $("#synchronize_button").show();
			  }, 
			  function () {
			     $("#synchronize_button").hide();
			  });
			  
			  
		});//End .ready opener
	function checkSync() {
		var url = "";
		var facility = "";
		var machine_code = "";
		//Retrieve the environment variables
		selectEnvironmentVariables(function(transaction, results){
			var variables = results.rows.item(0);
			machine_code = variables["machine_id"];
			facility = variables["facility"];
			
					//get my total_patients
		var total_patients = null;
		countPatientTableRecords(facility, function(transaction, results){
			var row = results.rows.item(0);
			total_patients = row['total']; 
			//Create the url to be used in the ajax call
			url = "<?php echo base_url();?>synchronize_pharmacy/check_patient_numbers/"+facility;
			$.get(url, function(data) {
  				//alert(data);
  				$("#total_number_local").html(total_patients);
  				$("#total_number_registered").html(data);
  				var difference = data - total_patients;
  				if(difference != 0){
  					$("#synchronize").css("border-color","red");
  				}
		});
		});
		});

		$('#loadingDiv').ajaxStart(function() {
        	$(this).show('slow', function() {});
    	}).ajaxStop(function() {
        	$(this).hide();
        	  $('#dataDiv').show('slow', function() {});
    	});
	}
	*/
	
  	
		     