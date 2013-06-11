<?php
if(!isset($quick_link)){
$quick_link = null;
}  
?>
<div class="center-content">
<div id="sub_menu">
	<a href="<?php echo site_url("regimen_management");?>" class="top_menu_link sub_menu_link first_link <?php if($quick_link == "regimen"){echo "top_menu_active";}?>">Regimens</a>
	<a href="<?php echo site_url("pipeline_management");?>" class="top_menu_link sub_menu_link first_link <?php if($quick_link == "pipeline"){echo "top_menu_active";}?>">Pipeline Upload</a>
	<a href="<?php echo site_url("fcdrr_management");?>" class="top_menu_link sub_menu_link first_link <?php if($quick_link == "fcdrr"){echo "top_menu_active";}?>">FCDRR Upload</a>
	<!--<a href="<?php echo site_url("drugcode_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "drugcode"){echo "top_menu_active";}?>">Drug Codes</a>-->
	<!--<a href="<?php echo site_url("regimen_drug_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "regimen_drug"){echo "top_menu_active";}?>">Regimen Drugs</a>-->
<?php 
$access_level = $this -> session -> userdata('user_indicator');
if($access_level == "system_administrator"){?>
<a href="<?php echo site_url("drugcode_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "drugcode"){echo "top_menu_active";}?>">Drug Codes</a>
<a href="<?php echo site_url("dose_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "dose"){echo "top_menu_active";}?>">Drug Doses</a>
<a href="<?php echo site_url("regimen_drug_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "regimen_drug"){echo "top_menu_active";}?>">Regimen Drugs</a>
<a href="<?php echo site_url('genericname_management');?>" class="top_menu_link sub_menu_link  <?php if($quick_link == "generic"){echo "top_menu_active";}?>">Generic Names</a>
<a href="<?php echo site_url("brandname_management");?>" class="top_menu_link sub_menu_link  <?php if($quick_link == "brand"){echo "top_menu_active";}?>">Brand Names</a>
<a href="<?php echo site_url("indication_management");?>" class="top_menu_link sub_menu_link  <?php if($quick_link == "indications"){echo "top_menu_active";}?>">Drug Indications</a>
<a href="<?php echo site_url("client_management");?>" class="top_menu_link sub_menu_link  <?php if($quick_link == "client_sources"){echo "top_menu_active";}?>">Client Sources</a>
<a href="<?php echo site_url("transfersource_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "transfer_sources"){echo "top_menu_active";}?>">Transfer Sources</a>
<a href="<?php echo site_url("transferdestination_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "transfer_destination"){echo "top_menu_active";}?>">Transfer Destinations</a>
<a href="<?php echo site_url("drugsource_management");?>" class="top_menu_link sub_menu_link   <?php if($quick_link == "drug_sources"){echo "top_menu_active";}?>">Drug Sources</a>
<a href="<?php echo site_url("drugdestination_management");?>" class="top_menu_link sub_menu_link  <?php if($quick_link == "drug_destination"){echo "top_menu_active";}?>">Drug Destinations</a>
<a href="<?php echo site_url("facility_management");?>" class="top_menu_link sub_menu_link last_link  <?php if($quick_link == "facility"){echo "top_menu_active";}?>">Facility Information</a>

<?php 	
}
?> 
</div>

<div id="main_content">
<?php
$this->load->view($settings_view);
?>
</div>
</div>