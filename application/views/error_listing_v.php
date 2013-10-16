<script type="text/javascript">
	
	$(document).ready(function() {
          $("#error_list").change(function(){
          	 var error_list=$(this).val();
          	 var link="<?php echo base_url(); ?>"+"auto_management/error_generator";
				$.ajax({
				    url: link,
				    type: 'POST',
				    data:{"array_text" :error_list},			  
				    success: function(data) {
				       $("#error_display").empty();
				       $("#error_display").append(data);
				    }
				});
          });
          $(".listing_table").dataTable();
	});

</script>
<div class="main-content">
	
	<div class="center-content">
	<div>
	<?php
  	if($this->session->userdata("msg_success")){
  		?>
  		<span class="message success"><?php echo $this->session->userdata("msg_success")  ?></span>
  	<?php
  	$this->session->unset_userdata("msg_success");
	}
  		
  	elseif($this->session->userdata("msg_error")){
  		?>
  		<span class="message error"><?php echo $this->session->userdata("msg_error")  ?></span>
  	<?php
  	$this->session->unset_userdata("msg_error");
  	}
	?>
	</div>
		
		<div>
			<?php if($this->session->userdata("msg_save_transaction")){
				?>
				
				<script type="text/javascript">
					setTimeout(function(){
						$(".info").fadeOut("2000");
					},6000)
				</script>
				<?php
				if($this->session->userdata("msg_save_transaction")=="success"){
					?>
					<div class="message success">Your data were successfully saved !</div>
					<?php
				}
				else{
					?>
					<div class="message error">Your data were not saved ! Try again or contact your system administrator.</div>
					<?php
				}
				$this->session->unset_userdata('msg_save_transaction');
			}
			?>
		</div>
		<div>
		<ul class="breadcrumb">
		  <li><a href="<?php echo site_url().'auto_management/error_fix' ?>">Errors</a> </li>
		  <li>
		  	<select style="width:auto;" id="error_list">
		  	     <option value="0">--Select One--</option>
		  	      <?php 
		  	      foreach($errors as $error=>$error_array){
		  	      	 echo "<option value='".$error."'><b>".$error."<b></option>";
		  	      }
		  	      ?>
		    </select>
		  </li>
		 
		  	<?php
		  	if(isset($page_title)){
		  		?>
		  		 <li class="active" id="actual_page"><?php echo $page_title;?> </li>
		  		<?php
		  	}
		  	?>
		 
		</ul>
	   </div>
	   <div id='error_display'>
	   	
	   </div>	
	</div>
	
</div>
