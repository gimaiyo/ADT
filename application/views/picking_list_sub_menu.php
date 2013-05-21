<?php
if(!isset($quick_link)){
$quick_link = null;
}  
?>
<div id="quick_menu" class="btn-group">
	<button class="btn btn-primary btn-quickmenu"><a href="<?php echo site_url("picking_list_management/submitted_lists/0");?>"><img  src="<?php echo base_url().'Images/open-icon.png'?>">Open Lists</a></button>
	<button class="btn btn-primary btn-quickmenu"><a href="<?php echo site_url("picking_list_management/submitted_lists/1");?>"> <img  src="<?php echo base_url().'Images/close-icon.png'?>"> Closed Lists</a></button> 
</div>
