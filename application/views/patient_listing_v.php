<script type="text/javascript">
	
	$(document).ready( function () {
		$('.listing_table').dataTable( {
			"bProcessing": true,
			"bServerSide": true,
			"sAjaxSource": "patient_management/listing",
	        "bJQueryUI": true,
	        "sPaginationType": "full_numbers"
		} );
	} );

</script>
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
?>

<style>
	.dataTables_wrapper{
		width:100%;
		
	}
	
</style>


<?php 
//COunt number of patients
?>
<div class="main-content">
	
	<div class="center-content">
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
						if($this->session->userdata("user_saved")){
							?>
							<div class="message success"><?php echo $this->session->userdata("user_saved") ?>'s details were successfully saved !</div>
							<?php
							$this->session->unset_userdata('user_saved');
						}
						else if($this->session->userdata("user_disabled")){
							?>
							<div class="message error"> Patient <?php echo $this->session->userdata("user_disabled") ?> was disabled !</div>
							<?php
							$this->session->unset_userdata('user_disabled');
						}
						else if($this->session->userdata("user_enabled")){
							?>
							<div class="message success"> Patient <?php echo $this->session->userdata("user_enabled") ?> was enabled !</div>
							<?php
							$this->session->unset_userdata('user_enabled');
						}
						?>
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
		
		<table class="table table-hover table-bordered table-striped listing_table" style="font-size:0.8em">
			<thead>
				<tr>
					<th style="width: 45px">CCC No</th><th>Patient Name</th><th>Contact</th><th style="width: 100px">Date Enrolled</th><th style="width: 100px">Next Appointment</th><th>Current Regimen</th><th style="width:150px">Status</th><th style="width: 140px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
</div>
