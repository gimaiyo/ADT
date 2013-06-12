<script type="text/javascript" src="<?php echo base_url().'Scripts/datatable/jquery.dataTables.rowGrouping.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function() {

    $('#brand_name_table').dataTable({
    			"sScrollY": "240px",
    			"bLengthChange": false,
                "bPaginate": false,
                "bJQueryUI": true,
            	"bDestroy":true})
    	.rowGrouping({
                    bExpandableGrouping: true,
                    bExpandSingleGroup: false,
                    iExpandGroupOffset: -1,
                    asExpandedGroups: [""],
                    
                });
        GridRowCount();
});
	function GridRowCount() {
                $('span.rowCount-grid').remove();
                $('input.expandedOrCollapsedGroup').remove();

                $('.dataTables_wrapper').find('[id|=group-id]').each(function () {
                    var rowCount = $(this).nextUntil('[id|=group-id]').length;
                    $(this).find('td').append($('<span />', { 'class': 'rowCount-grid' }).append($('<b />', { 'text': '('+rowCount+')' })));
                });

                $('.dataTables_wrapper').find('.dataTables_filter').append($('<input />', { 'type': 'button', 'class': 'expandedOrCollapsedGroup collapsed', 'value': 'Expanded All Group' }));

                $('.expandedOrCollapsedGroup').live('click', function () {
                    if ($(this).hasClass('collapsed')) {
                        $(this).addClass('expanded').removeClass('collapsed').val('Collapse All Group').parents('.dataTables_wrapper').find('.collapsed-group').trigger('click');
                    }
                    else {
                        $(this).addClass('collapsed').removeClass('expanded').val('Expanded All Group').parents('.dataTables_wrapper').find('.expanded-group').trigger('click');
                    }
                });
            };

</script>

<script>
	$(document).ready(function() {
		$("#entry_form").dialog({
			height : 200,
			width : 500,
			modal : true,
			autoOpen : false
		});
		$("#new_brandname").click(function() {
			$("#entry_form").dialog("open");
		});
		$("#drug_listing").accordion({
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
	#drug_listing{
		width:90%;
		margin:10px auto;
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

	    <div class="span-fixed-sidebar">
	      <div class="hero-unit">
	      	<div class="passmessage"></div>
    		<div class="errormessage"></div>
    		<?php echo validation_errors('<p class="error">', '</p>');?>
	      	<button class="btn btn-large btn-success" type="button" id="new_brandname"><i class="icon-plus icon-black"></i>New Brand Name</button>
	        <table class="setting_table" id="brand_name_table">
	        	<thead>
	        		<tr>
	        			<th>Drug Codes</th>
	        			<th>Drug Codes - Brand Names</th>
	        			<th>Options</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        		<?php
	        		foreach($drug_codes as $drug_code){
	        			foreach($drug_code->Brands as $brand){
	        		?>
	        		<tr><td><?php echo $drug_code->Drug;?></td><td><?php echo $brand->Brand; ?></td>
	        			<td><?php echo anchor('brandname_management/delete/'.$brand->id,'Delete') ; ?></td></tr>
	        		<?php 
	        			}
	        		} ?>
	        	</tbody>
	        </table>	
	      </div>
	    </div><!--/span-->
	  </div><!--/row-->
	</div><!--/.fluid-container-->

	<div id="entry_form" title="New Brandname">
		<?php
		$attributes = array('class' => 'input_form');
		echo form_open('brandname_management/save', $attributes);
		?>
		<table>
			<tr><td><strong class="label">Select Drug</strong></td>
				<td>
					<select class="input-xlarge" id="drugid" name="drugid">
						<?php
						foreach($drug_codes as $drug_code){
						?>
						<option value="<?php echo $drug_code -> id;?>"><?php echo $drug_code -> Drug;?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr><td><strong class="label">Brand Name</strong></td>
				<td>
					<input type="text" name="brandname" id="brandname" class="input-xlarge">
				</td>
			</tr>
			<tr><td><input type="submit" value="Save" class="btn btn-primary"/></td>
				<td>
					
				</td>
			</tr>
		
		</table>
		<?php echo form_close() ; ?>
	</div>
</div>