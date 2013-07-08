<script type="text/javascript" src="<?php echo base_url().'Scripts/datatable/jquery.dataTables.rowGrouping.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
	});
		

</script>

<script>
	$(document).ready(function() {
		/*
		$("#entry_form").dialog({
			height : 200,
			width : 'auto',
			modal : true,
			autoOpen : false
		});
		$("#new_regimen_drug").click(function() {
			$("#entry_form").dialog("open");
		});
		*/
		$("#regimen_drug_listing").accordion({
			autoHeight : false,
			navigation : true
		});
		
		//count to check which message to display
        var count='<?php echo @$this -> session -> userdata['message_counter']?>';
        var message='<?php echo @$this -> session -> userdata['message']?>';	
	
		if(count == 1) {
		$(".passmessage").slideDown('slow', function() {

		});
		$(".passmessage").append(message);

		var fade_out = function() {
		$(".passmessage").fadeOut().empty();
		}
		setTimeout(fade_out, 5000);
	     <?php 
	     $this -> session -> set_userdata('message_counter', "0");
	     $this -> session -> set_userdata('message', " ");
	     ?>

		}
		if(count == 2) {
		$(".errormessage").slideDown('slow', function() {

		});
		$(".errormessage").append(message);

		var fade_out = function() {
		$(".errormessage").fadeOut().empty();
		}
		setTimeout(fade_out, 5000);
	     <?php 
	     $this -> session -> set_userdata('message_counter', "0");
	     $this -> session -> set_userdata('message', " ");
	     ?>

		}
		});

</script>
<style>
	#regimen_drug_listing {
		width: 90%;
		margin: 10px auto;
	}
	a {
		text-decoration: none;
	}
	.enable_user {
		color: green;
		font-weight: bold;
	}
	.disable_user {
		color: red;
		font-weight: bold;
	}
	.edit_user {
		color: blue;
		font-weight: bold;
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
		background: #FF0000;
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
	#entry_form{
		background-color:#CCFFFF;
	}

</style>
<div id="view_content">
	<div class="container-fluid">
	  <div class="row-fluid row">
		 <!-- Side bar menus -->
	    <?php echo $this->load->view('settings_side_bar_menus_v.php'); ?>
	    <!-- SIde bar menus end -->

	    <div class="span12 span-fixed-sidebar">
	      	<div class="hero-unit">
				<div class="passmessage"></div>
			    <div class="errormessage"></div>
				<?php echo validation_errors('<p class="error">', '</p>');?>
				<table class="setting_table" id="brand_name_table">
		        	<thead>
		        		<tr>
		        			<th>Regimens</th>
		        			<th>Regimens - Drug Codes</th>
		        			
		        			<th>Options</th>
		        			
		        		</tr>
		        	</thead>
		        	<tbody>
		        		<?php
		        		$access_level=$this -> session -> userdata('user_indicator');
						
		        		foreach($regimens as $regimen){
		        			foreach($regimen->Drugs as $drug){
		        		?>
		        		<?php
		        		if($drug -> Drug ->id !=""){
		        			if($access_level!="system_administrator"){
								if($drug -> Active == 1){
							
					        		?>
					        		<tr>
					        			<td><?php 
					        			echo $regimen -> Regimen_Desc." - <b>". $regimen -> Regimen_Service_Type-> Name ."</b>";
					        			?>
					        			
					        			</td>
					        			<td><?php echo $drug -> Drug -> Drug; ?></td>
					        			<td></td>
		        					</tr>
		        		<?php	
								}
							}
							else{
							?>
								<tr>
					        			<td><?php 
					        			echo $regimen -> Regimen_Desc." - <b>". $regimen -> Regimen_Service_Type-> Name ."</b>";
					        			?>
					        			
					        			</td>
					        			<td><?php echo $drug -> Drug -> Drug; ?></td>
					        			<td><?php 
					        			if ($drug -> Active == 1) {
											echo anchor("regimen_drug_management/disable/" . $drug -> Drug -> id ,'Disable',array('class'=>'disable_user')) ;
										} else {
											echo anchor("regimen_drug_management/enable/" . $drug -> Drug -> id ,'Enable',array('class'=>'enable_user')) ;
										}
							
		        			 			?></td>
		        					</tr>
			        		<?php
								}
			        		}
		        		  }
		        		} ?>
		        	</tbody>
		        </table>
		        <a href="#entry_form" role="button" id="new_regimen_drug" class="btn" data-toggle="modal"><i class="icon-plus icon-black"></i>New Regimen Drug</a>	
    		</div>
	    </div><!--/span-->
	  </div><!--/row-->
	</div><!--/.fluid-container-->
	
	<div id="entry_form" title="New Regimen Drug" class="modal hide fade cyan" tabindex="-1" role="dialog" aria-labelledby="NewDrug" aria-hidden="true">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('regimen_drug_management/save', $attributes);
		?>
		<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="NewDrug">Drug details</h3>
		</div>
		<div class="modal-body">
			<table>
				<tr><td><strong class="label">Select Regimen</strong></td>
					<td>
						<select class="input-xlarge" id="regimen" name="regimen">
						<?php
						foreach($regimens_enabled as $regimen){
						?>
						<option value="<?php echo $regimen -> id;?>"><?php echo $regimen -> Regimen_Desc;?></option>
						<?php }?>
				</select>
					</td>
				</tr>
				<tr><td><strong class="label">Select Drug</strong></td>
					<td>
						<select class="input-xlarge" id="drugid" name="drugid">
							<?php
							foreach($drug_codes_enabled as $drug){
							?>
							<option value="<?php echo $drug ['id'];?>"><?php echo $drug['Drug'];?></option>
							<?php }?>
						</select>
					</td>
				</tr>
			</table>
		</div>	
		
		<div class="modal-footer">
		   <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		   <input type="submit" value="Save" class="btn btn-primary " />
		</div>
		<?php echo form_close() ; ?>
	</div>
</div>