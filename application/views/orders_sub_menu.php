<?php
if(!isset($quick_link)){
$quick_link = null;
}  
?>
<div id="quick_menu" class="btn-group">
	<button class="btn"><a href="<?php echo site_url("order_management/submitted_orders/0");?>"><img  src="<?php echo base_url().'Images/pending_icon.png'?>">Pending</a></button>
	<button class="btn "><a href="<?php echo site_url("order_management/submitted_orders/1");?>"><img src="<?php echo base_url().'Images/approved_icon.png'?>">Approved</a></button>
	<button class="btn "><a href="<?php echo site_url("order_management/submitted_orders/2");?>"><img src="<?php echo base_url().'Images/delete_icon.png'?>">Declined</a></button>
	<button class="btn "><a href="<?php echo site_url("order_management/submitted_orders/3");?>"><img src="<?php echo base_url().'Images/dispatch_icon.png'?>">Dispatched</a></button>
</div>
<div id="menu_container">
	<a class='btn' href="<?php echo base_url().'order_management/new_central_order'?>" style="margin-top:10px;">Central Facility Report</a>
	<a class="btn" href="<?php echo base_url().'order_management/new_satellite_order'?>" style="margin-top:10px;">Satellite Facility Report</a>
	
</div> 
