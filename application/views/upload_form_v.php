<html>
	<head>
		<script type="text/javascript">
$(document).ready(function(){

	
	$("#test_type").change(function(){
		var selected_value=$(this).val();
		if(selected_value==2){	
		    $(".errormessage").slideDown('slow', function() {

	         });
	         var message='Note:This is the Live Database Be Careful!<br/> ';
	         $(".errormessage").append(message);	
			 var fade_out = function() {
	             $(".errormessage").fadeOut().empty();
	         }
		}else{
			$(".errormessage").slideUp('slow', function() {

	         });
			
		}
		setTimeout(fade_out, 5000);
	});

var count='<?php echo @$this -> session -> userdata['upload_counter']?>';
	
	
	if(count == 2) {
    var message='Data Migration Success!<br/> ';
	var final_message=message;
	$(".passmessage").slideDown('slow', function() {

	});
	$(".passmessage").append(message);

	var fade_out = function() {
	$(".passmessage").fadeOut().empty();
	}
	setTimeout(fade_out, 5000);
     <?php $this -> session -> set_userdata('upload_counter', "0");?>

	}
	
	if(count == 1) {
	var message='Data Migration Failed! <br/> ';
	var final_message=message;

	$(".errormessage").slideDown('slow', function() {

	});
	$(".errormessage").append(final_message);

	var fade_out = function() {
	$(".errormessage").fadeOut().empty();
	}
	setTimeout(fade_out, 5000);
     <?php $this -> session -> set_userdata('upload_counter', "0");?>

	}
	

});

</script>
		<style type="text/css">
			.upload_form {
				width: 60%;
				border: 1px solid #DDD;
				height: auto;
				margin-top: 10px;
				margin-bottom: 10px;
				margin-left: 15%;
				float: left;
				padding: 20px;
				text-align: left;
				background-color: #CCFFFF;
			}
			.import_title {
				text-align: left;
				font-weight: bold;
				margin-bottom: 10px;
			}
			.button {

				margin: 5px;
				height: 40px;
				width: 90px;
			}
			.passmessage {

				display: none;
				background: #00CC33;
				color: black;
				text-align: center;
				height: 20px;
				padding: 5px;
				font: bold 1px;
				border-radius: 8px;
				width: 30%;
				margin-left: 30%;
				margin-right: 10%;
				font-size: 16px;
				font-weight: bold;
			}
			.errormessage {

				display: none;
				background:#ED5D3B;
				color: black;
				text-align: center;
				height: 20px;
				padding: 5px;
				font: bold 1px;
				border-radius: 8px;
				width: 30%;
				margin-left: 30%;
				margin-right: 10%;
				font-size: 16px;
				font-weight: bold;
			}

h3{
	font-size:1.5em;
}

.more_info{
				width:auto;
				height:auto;
				background:#FFCCCC;
				padding:2px;
			}
			
			#bottom_ribbon{
				margin-top:80px;
			}

		</style>
	</head>
	<body>
		<div id="view_content">
	<div class="container-fluid">
	  <div class="row-fluid row">
	  		<!-- Side bar menus -->
		    <?php echo $this->load->view('settings_side_bar_menus_v.php'); ?>
		    <!-- SIde bar menus end -->
		    
		    <div class="span9 span-fixed-sidebar">
	      		<div class="hero-unit">
		<div class="passmessage"></div>
		<div class="errormessage"></div>
		<?php echo $error;?>
		<?php echo form_open_multipart('upload_management/do_upload');?>
		<div class="upload_form">
			<select name="test_type" id="test_type" style="width:200px;float:right;">
				<option value="1">Test Database</option>
				<option value="2" >Live Database</option>
			</select>
			<h3 class="import_title">Data Migration</h3>
			<hr/>
			<label class="more_info">
			<u><h3>Instructions</h3></u><ul><li>SELECT FACILITY FOR DATA MIGRATION</li><li>CONVERT FILE TO <strong>CSV</strong></li><li>SELECT FILE TO MIGRATE e.g Patient Transactions</li><li>UPLOAD FILE</li></ul>	
			</label>
			<br/>
			<strong >Facility</strong> &nbsp;
			<select name="facility" id="facility" style="width:auto;">
				<option>----Select One----</option>
	<?php 
	foreach($facilities as $facility){
	?>]
	<option value="<?php echo $facility['facilitycode'];?>"><?php echo $facility['name'];?></option>
	<?php }?>
    </select>
			
			<p></p>
			<br/>
			<p>
				<input type="radio" name="upload_type" class="upload_type" value="1" required="required"/>
				<strong>Patients Master Information</strong>  &nbsp;
				<input type="radio" name="upload_type" class="upload_type" value="2" required="required"/>
				<strong>Patient Transactions </strong>&nbsp;
				<input type="radio" name="upload_type" class="upload_type" value="3" required="required"/>
				<strong>Drug Stock Transactions </strong> &nbsp;
			</p>
			<br/>
			<input type="file" name="userfile" size="20" />
			<input name="btn_save" class="button" type="submit"  value="Upload" />	
		</div>
		</form>
		</div>
			</div>	
		</div>
	</div>
</div>
	</body>
</html>