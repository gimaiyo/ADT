<?php
if(!isset($quick_link)){
$quick_link = null;
}  
?>
<div id="quick_menu" class="btn-group">
	<a class="btn" href="<?php echo site_url("order_management/submitted_orders/0");?>"><img  src="<?php echo base_url().'assets/images/pending_icon.png'?>">Pending</a>
	<a class="btn" href="<?php echo site_url("order_management/submitted_orders/1");?>"><img src="<?php echo base_url().'assets/images/approved_icon.png'?>">Approved</a>
	<a class="btn" href="<?php echo site_url("order_management/submitted_orders/2");?>"><img src="<?php echo base_url().'assets/images/delete_icon.png'?>">Declined</a>
	<a class="btn" href="<?php echo site_url("order_management/submitted_orders/3");?>"><img src="<?php echo base_url().'assets/images/dispatch_icon.png'?>">Dispatched</a>
</div>
<div id="menu_container">
	<a class="btn " data-toggle="modal" href="#select_satellite" style="margin-top:10px;">Satellite Facility Report</a>	
</div> 
