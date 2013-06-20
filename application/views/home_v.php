<?php
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;
$user_is_facilityadmin = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
}
if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

}
if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
if ($access_level == "facility_administrator") {
	$user_is_facilityadmin = true;
}



if($this->session->userdata("changed_password")){
	$message=$this->session->userdata("changed_password");
	echo "<p class='error'>".$message."</p>";
	$this->session->set_userdata("changed_password","");
}
?>

<script type="text/javascript">
	//initDatabase();
	//Retrieve the Facility Code
	var facility_code = "<?php echo $this -> session -> userdata('facility');?>";
	var facility_name = "<?php echo $this -> session -> userdata('facility_name');?>";

	$(document).ready(function() {
		
		var machine_code = $("#machine_code").attr("value");
		var operator = $("#operator").attr("value");
		//saveEnvironmentVariables(machine_code, operator);
		var base_url="<?php echo base_url(); ?>";
		/*
		$.ajax({
			
			type: "POST",
			url:  base_url+"user_management/update_machinecode/"+machine_code,
			success: function(data){
               console.log(data);
			}					
	    });
	    */
	    
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
		*/
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
	
	    	
		      
</script>


<script src="<?php echo base_url().'Scripts/FusionCharts/FusionCharts.js';?>"></script>

<script type="text/javascript">
		$(document).ready(function() {
		    var chart= new FusionCharts("<?php echo base_url().'Scripts/FusionCharts/MSBar2D.swf';?>","ChartId","80%","100%","0","0");	
	        chart.setDataURL("<?php echo base_url().'facilitydashboard_management/getExpiringDrugs/2';?>");
	        chart.render("chart_area");	
	        
	        var chart1= new FusionCharts("<?php echo base_url().'Scripts/FusionCharts/StackedColumn2D.swf';?>","ChartId","80%","100%","0","0");	
	        chart1.setDataURL("<?php echo base_url().'facilitydashboard_management/getPatientEnrolled/2013-03-17/2013-03-24';?>");
	        chart1.render("chart_area2");
	        
	         var chart2= new FusionCharts("<?php echo base_url().'Scripts/FusionCharts/MSBar2D.swf';?>","ChartId","80%","100%","0","0");	
	        chart2.setDataURL("<?php echo base_url().'facilitydashboard_management/getExpectedPatients/2013-03-17/2013-03-24';?>");
	        chart2.render("chart_area3");	
	        
	      
	        
	        
	        $('#table1').load('<?php echo base_url().'facilitydashboard_management/stock_notification'?>',function(){
	        
				$('#stock_level').dataTable( {
					"bJQueryUI": true,
	        		"sPaginationType": "full_numbers"
	        });
	 
	           });
	        	 
	       

		});

    </script>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-responsive.css"/>
    <style type="text/css">
    	
    
    </style>

<style type="text/css">
	#environment_variables {
		width: 600px;
		margin: 0 auto;
		display:none;
	}
	#synchronize {
		text-align: left;
		font-size: 16px;
		text-shadow: 0 1px rgba(0, 0, 0, 0.1);
		letter-spacing: 1px;
		position: absolute;
		right: 15px;
		top: 60px;
		color: #036;
		border: 2px solid #DDDDDD;
		width: 300px;
		height:55px;
		padding: 2px;
		overflow: hidden;
	}
	#loadingDiv{
		width:100px;
		height: 55px;
		margin: 0 auto;
		background: url("../Images/spinner.gif") no-repeat;
	}
	#main_container{
		width:100%;
	}
	#main_sidebar{
		width:20%;
		border:1px solid #DDD;
		height:300px;
		float:left;
		margin-left:2%;	
		
	}
	#main_contentbar{
		width:71%;
		border:1px solid #DDD;
		height:600px;
		float:right;
		margin-right:5%;
		
	}
	#maincontent_header{
		height:30px;
		background:#DDD;
		font-size:20px;
		width:auto;
		padding:5px;
	}
	#main_videocontent{
		width:auto;
		border:1px solid #FFF;
		padding:5px;
	}
	#main_manualcontent{
		height:100%;
		width:auto;
		border:1px solid #FFF;
		padding:5px;
		
	}
	.section{
		width:29.5%;
		border:1px solid #FFF;
		height:40%;
		padding:5px;
		background #000;
		margin:10px 5px 5px 5px;
	}
	.tleft{
		float:left;
	}
	.tright{
		float:right;
	}
	.tmiddle{
		float:left;
		margin-left:3.5%;
		margin-right:3%;
	}
	.bleft{
		float:left;
	}
	.bright{
		float:right;
	}
	.bmiddle{
		float:left;
		margin-left:3.5%;
		margin-right:3%;
	}
	
	div#manualcontent {
    position: relative;
    padding-left: 200px;
}
 
div#manualcontent > div {
    min-height: 300px;
}
 
div#manualcontent .ui-tabs-nav {
    position: absolute;
    left: 0px;
    top: 0px;
    bottom: 0px;
    width: 200px;
    padding: 5px 0px 5px 5px;
}
 
div#manualcontent .ui-tabs-nav li {
    left: 0px;
    width: 195px;
    border-right: none;
    overflow: hidden;
    margin-bottom: 2px;
}
 
div#manualcontent .ui-tabs-nav li a {
    float: right;
    width: 100%;
    text-align: right;
}
 
div#manualcontent .ui-tabs-nav li.ui-tabs-selected {
    border: none;
    border-right: solid 1px #fff;
    background: none;
    background-color: #fff;
    width: 200px;
}
div#manualcontent .ui-tabs-panel{height:700px;overflow-x:hidden; overflow-y:auto;}

 #main_manualcontent ul {
  list-style: none;
  margin: 0;
  padding: 0;
  border: none;
  }
   #main_manualcontent li {
  border-bottom: 1px solid #90bade;
  margin: 0;
  }
	
	 #main_manualcontent li a {
  display: block;
  padding: 10px 5px 10px 0.5em;
  background-color: #036;
  color: #fff;
  text-decoration: none;
  width:auto;
  } html>body #main_manualcontent li a {
  width: auto;
  } #main_manualcontent li a:hover {

  background-color: #00B831;
  color: #fff;
  }
  
  #weekly_summary{
  	font-size:10px;
  	font-family:Verdana;
  	background:rgb(222, 245, 247);
  }
  #weekly_summary th{
  	background:#DDD;
  }
  
  #weekly_summary td+td{
  	text-align:center;
  }
  
  #bottom_ribbon{
  	margin-top:120px;
  }
#chart_area,#chart_area2,#chart_area3,#table1{
	height:80%;
}
.dataTables_wrapper{
	width:100%;
}

#stock_level{
	font-size:12px;
}
.ui-widget-header{
	display:none;
}
</style>
<div id="environment_variables" title="System Initialization">
	<h1 class="banner_text" style="width:auto; font-size: 20px;">Environment Variables</h1>
	<div class="two_comlumns">
		<label style="width:250px; "> <strong class="label" >Machine Code</strong>
			<input style="width:250px;" type="text"name="machine_code" id="machine_code" value="<?php echo $mac;  ?>" readonly="readonly">
		</label>
		<label style="width:250px; "> <strong class="label">Operator Name</strong>
			<input style="width:250px" type="text"name="operator" id="operator"  value="<?php echo $user;?>" readonly="readonly">
		</label>
	</div>
	<input type="submit" class="submit-button" id="save_variables" value="Save" style="width:100px; margin: 10px auto;"/>
</div>

<div class="main-content">
	

	
	<div class="center-content">
		<div id="expDiv>"></div>
	<div class="tile-half">
		<div class="tile">
			<h3>Summary of Drugs Expiring in 30 Days</h3>
			<div id="chart_area"></div>
		</div>

		<div class="tile">
			<h3>Weekly Summary of Patient Enrolment</h3>
			<div id="chart_area2"></div>
		</div>
	</div>
	<div class="tile-half">
		<div class="tile">
			<h3>Weekly Summary of Patient Appointments</h3>
			<div id="chart_area3"></div>
		</div>
		<div class="tile">
			<h3>Stocks About to Run Out</h3>
			<div id="table1"></div>
		</div>
	</div>
</div>
	
</div>

<script type="text/javascript">
$(document).ready(function(){
	var base_url="<?php echo base_url(); ?>";    	
		      $.ajax({
			        type: "POST",
					url: base_url+'home_controller/getNotified',
					dataType: "json",
					success: function(data){
						var days_counter=0;
						var weekly_summary="<tbody>";
						for(days_counter=0;days_counter<6;days_counter++){
							weekly_summary+="<tr><td colspan='2'>"+data["Days"][days_counter]+"</td><td>"+data["Appointments"][days_counter]+"</td><td>"+data["Visits"][days_counter]+"</td><td>"+data["Percentage"][days_counter]+"</td></tr>";
						}
						weekly_summary+="</tbody>";
						$("#weekly_summary").append($(weekly_summary));
					}
					
		      });
		      });
</script>