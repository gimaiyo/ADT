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
	//Retrieve the Facility Code
	var facility_code = "<?php echo $this -> session -> userdata('facility');?>";
	var facility_name = "<?php echo $this -> session -> userdata('facility_name');?>";   
</script>



<script type="text/javascript">
$(document).ready(function() {
      var period=30;
      var location=2;
      
      
      //Get Today's Date and Upto Saturday
      var someDate = new Date();
      var dd = ("0" + someDate.getDate()).slice(-2);
      var mm = ("0" + (someDate.getMonth() + 1)).slice(-2);
      var y = someDate.getFullYear();
      var fromDate =y+'-'+mm+'-'+dd;
      
      var numberOfDaysToAdd = 5;
      var to_date=new Date(someDate.setDate(someDate.getDate() + numberOfDaysToAdd)); 
      var dd = ("0" + to_date.getDate()).slice(-2);
      var mm = ("0" + (to_date.getMonth() + 1)).slice(-2);
      var y = to_date.getFullYear();
      var endDate =y+'-'+mm+'-'+dd;
      
      $("#enrollment_start").val(fromDate);
      $("#enrollment_end").val(endDate);
      
      $("#visit_start").val(fromDate);
      $("#visit_end").val(endDate);
    
	   $(".loadingDiv").show();
	   var expiry_link="<?php echo base_url().'facilitydashboard_management/getExpiringDrugs/';?>"+period+'/'+location;
	   var enrollment_link="<?php echo base_url().'facilitydashboard_management/getPatientEnrolled/';?>"+fromDate+'/'+endDate;
	   var visits_link="<?php echo base_url().'facilitydashboard_management/getExpectedPatients/';?>"+fromDate+'/'+endDate;
       $('#chart_area').load(expiry_link);
       $('#chart_area2').load(enrollment_link);
       $('#chart_area3').load(visits_link);
       $('#table1').load('<?php echo base_url().'facilitydashboard_management/stock_notification'?>',function(){
				$('#stock_level').dataTable({
					"bJQueryUI": true,
	        		"sPaginationType": "full_numbers"
	            });
	   });
       
		    $('.generate').click(function(){
                 var button_id=$(this).attr("id");
                 if(button_id=="expiry_btn"){
                 	 period = $('.period').val();
		    	     location = $('.location').val();
		    	     var expiry_link="<?php echo base_url().'facilitydashboard_management/getExpiringDrugs/';?>"+period+'/'+location;
		    	 	 $('#chart_area').load(expiry_link);           	
                 }else if(button_id=="enrollment_btn"){
                 	 var from_date=$("#enrollment_start").val();
                 	 var to_date=$("#enrollment_end").val();
                 	 var enrollment_link="<?php echo base_url().'facilitydashboard_management/getPatientEnrolled/';?>"+from_date+'/'+to_date;
                 	 $('#chart_area2').load(enrollment_link);
                 }else if(button_id=="appointment_btn"){
                 	 var from_date=$("#visit_start").val();
                 	 var to_date=$("#visit_end").val();
                 	 var visits_link="<?php echo base_url().'facilitydashboard_management/getExpectedPatients/';?>"+from_date+'/'+to_date;
                     $('#chart_area3').load(visits_link);
                 }else if(button_id=="stockout_btn"){
                 	 period=$("#store_location").val();
                 	 $('#table1').load('<?php echo base_url().'facilitydashboard_management/stock_notification/'?>'+period,function(){
				         $('#stock_level').dataTable({
					        "bJQueryUI": true,
	        		        "sPaginationType": "full_numbers"
	                     });
	                 });
                 }		
            });
		});
    </script>

<div class="main-content">
	<div class="center-content">
		<div id="expDiv>"></div>
	<div class="tile-half">
		<div class="tile">
			<h3>Summary of Drugs Expiring in 
				<select style="width:auto" class="period">
					<option valuue="7">7 Days</option>
					<option value="14">14 Days</option>
				   <option value="30" selected=selected>1 Month</option>
				   <option value="90">3 Months</option>
				   <option value="180">6 Months</option>
			</select> at
			<select style="width:auto" class="location">
				   <option value="1">Main Store</option>
				   <option  selected=selected value="2">Pharmacy</option>
			</select> 
			<button class="generate btn" id="expiry_btn">Generate</button>
			</h3>
			
			<div id="chart_area">
				<div class="loadingDiv" style="width:100%;height:100%" ><img style="width: 30px;margin-left:50%" src="<?php echo base_url().'Images/loading_spin.gif' ?>"></div>
			</div>
			
		</div>

		<div class="tile">
			<h3>Weekly Summary of Patient Enrollment from
				<input type="text" placeholder="Start" class="input-mini" id="enrollment_start"/> to
				<input type="text" placeholder="End" class=" input-mini" id="enrollment_end" readonly="readonly"/>
				<button class="btn generate btn-mini" id="enrollment_btn">Generate</button>
				 </h3>
			<div id="chart_area2">
				<div class="loadingDiv" style="width:100%;height:100%" ><img style="width: 30px;margin-left:50%" src="<?php echo base_url().'Images/loading_spin.gif' ?>"></div>
			</div>
		</div>
	</div>
	<div class="tile-half">
		<div class="tile">
			<h3>Weekly Summary of Patient Appointments
				from
				<input type="text" placeholder="Start" class="input-mini" id="visit_start"/> to
				<input type="text" placeholder="End" class=" input-mini" id="visit_end" readonly="readonly" />
				<button class="btn-mini generate btn" id="appointment_btn">Generate</button>
				</h3>
			<div id="chart_area3">
						<div class="loadingDiv" style="width:100%;height:100%" ><img style="width: 30px;margin-left:50%" src="<?php echo base_url().'Images/loading_spin.gif' ?>"></div>		
			</div>
		</div>
		<div class="tile">
			<h3>Stocks About to Run Out at
			<select style="width:auto" class="location" id="store_location"> 
				   <option value="1">Main Store</option>
				   <option  selected=selected value="2">Pharmacy</option>
			</select> 	
			<button class="btn-mini generate btn" id="stockout_btn">Generate</button>
			</h3>
			<div id="table1">
			 	<div class="loadingDiv" style="width:100%;height:100%" ><img style="width: 30px;margin-left:50%" src="<?php echo base_url().'Images/loading_spin.gif' ?>"></div>
			</div>
		</div>
	</div>
</div>
	
</div>

<script type="text/javascript">
$(document).ready(function(){
	var base_url="<?php echo base_url(); ?>";    		      	   
	        $("#enrollment_start").datepicker({
					yearRange : "-120:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true,
					beforeShowDay: function(date){ 
                                   var day = date.getDay(); 
                                   return [day == 1];
                                   }
			});			
			
			$("#visit_start").datepicker({
					yearRange : "-120:+0",
					maxDate : "0D",
					dateFormat : $.datepicker.ATOM,
					changeMonth : true,
					changeYear : true,
					beforeShowDay: function(date){ 
                                   var day = date.getDay(); 
                                   return [day == 1];
                                   }
			});
						
			//Visit Onchange Events
			$("#visit_start").change(function(){
				var from_date=$(this).val();
				var someDate = new Date(from_date);
                var numberOfDaysToAdd = 5;
                var to_date=new Date(someDate.setDate(someDate.getDate() + numberOfDaysToAdd)); 
                var dd = ("0" + to_date.getDate()).slice(-2);
                var mm = ("0" + (to_date.getMonth() + 1)).slice(-2);
                var y = to_date.getFullYear();
                var someFormattedDate =y+'-'+mm+'-'+dd;
				$("#visit_end").val(someFormattedDate);
			});
			
			//Enrollments Onchange Events
			$("#enrollment_start").change(function(){
				var from_date=$(this).val();
				var someDate = new Date(from_date);
                var numberOfDaysToAdd = 5;
                var to_date=new Date(someDate.setDate(someDate.getDate() + numberOfDaysToAdd)); 
                var dd = ("0" + to_date.getDate()).slice(-2);
                var mm = ("0" + (to_date.getMonth() + 1)).slice(-2);
                var y = to_date.getFullYear();
                var someFormattedDate =y+'-'+mm+'-'+dd;
				$("#enrollment_end").val(someFormattedDate);
			});
			
		      });
</script>