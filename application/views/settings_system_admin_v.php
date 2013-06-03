<?php
	if(!isset($quick_link)){
	$quick_link = null;
	}  
?>

<div class="container-fluid" style="margin:0px auto;margin-top:80px;margin-left:12%;margin-right:12%;">

	<div class="span5 well" >
		<div class="btn-toolbar ">
			<div class="btn-group">		
				<button  class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >Facilities <span class="caret"></button>
				<ul class="dropdown-menu" style="width:100%; font-size:1em">
                  <li><a href="<?php echo site_url("regimen_management");?>" class="<?php if($quick_link == "regimen"){echo "top_menu_active";}?>">View Facilities</a></li>
                  <li><a href="<?php echo site_url("regimen_drug_management");?>" class="<?php if($quick_link == "regimen_drug"){echo "top_menu_active";}?>">Facility TYpe</a></li>
                </ul>
			</div>			
		</div>	

		<div class="btn-toolbar ">
			<div class="btn-group">
				<button  class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >Menus<span class="caret"></button>
				<ul class="dropdown-menu" style="width:100%; font-size:1em">
                  <li><a href="<?php echo site_url("drugcode_management");?>">Main Menus</a></li>
                  <li><a href="<?php echo site_url("dose_management");?>" class="<?php if($quick_link == "dose"){echo "top_menu_active";}?>">Side Menus</a></li>                
                </ul>
			</div>
			
		</div>

		<div class="btn-toolbar ">
			<div class="btn-group">
				<button  class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >Users <span class="caret"></button>
				<ul class="dropdown-menu" style="width:100%; font-size:1em">
                  <li><a href="<?php echo site_url("client_management");?>" class="<?php if($quick_link == "client_sources"){echo "top_menu_active";}?>">View Users</a></li>
		                  <li><a href="<?php echo site_url("client_support");?>" class="<?php if($quick_link == "client_supports"){echo "top_menu_active";}?>">User Right</a></li>
		        </ul>
			</div>
			
		</div>	

	</div>	
	
	<div class="span5 well" style="margin-right:0px">
		<div class="btn-toolbar"><a href="<?php echo site_url('genericname_management');?>" class="<?php if($quick_link == "generic"){echo "top_menu_active";}?>"><button class="btn btn-xlarge">Districts</button></a></div>
		<div class="btn-toolbar"><a href="<?php echo site_url("brandname_management");?>" class="<?php if($quick_link == "brand"){echo "top_menu_active";}?>"><button class="btn btn-xlarge">Counties</button></a></div>
		<div class="btn-toolbar">
			<div class="btn-group">
				<button  class="btn dropdown-toggle btn-xlarge " data-toggle="dropdown" style="font-size:1.3em" >Miscellaneous <span class="caret"></button>
				<ul class="dropdown-menu" style="width:100%; font-size:1em">
                  <li><a href="<?php echo site_url("facility_management");?>" class="<?php if($quick_link == "facility_info"){echo "top_menu_active";}?>">Pipeline </a></li>
		          <li><a href="<?php echo site_url("auto_management");?>" class="<?php if($quick_link == "export"){echo "top_menu_active";}?>">Supporters</a></li> 
		        </ul>
			</div>
			
	</div>
</div>