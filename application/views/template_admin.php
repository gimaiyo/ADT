<?php
if (!$this -> session -> userdata('user_id')) {
	redirect("User_Management/login");
}
if (!isset($link)) {
	$link = null;
}
$access_level = $this -> session -> userdata('user_indicator');
$user_is_administrator = false;
$user_is_nascop = false;
$user_is_pharmacist = false;

if ($access_level == "system_administrator") {
	$user_is_administrator = true;
}
if ($access_level == "pharmacist") {
	$user_is_pharmacist = true;

}
if ($access_level == "nascop_staff") {
	$user_is_nascop = true;
}
?>
<!DOCTYPE html>
<html>
  <head>
    

	<?php 
	
	/**
	 * Load View with Head Section
	 */
	$this->load->view('sections/head');
	
	/**
	 * Check status of Settings View
	 */
		if(isset($settings_view) && $settings_view=="settings_view"){
			echo "<script src=\"".base_url()."Scripts/bootstrap/js/jquery_bootstrap.js\" type=\"text/javascript\"></script>";
		}
	?>


	<?php
	if ($user_is_pharmacist) {
		echo "<script src=\"" . base_url() . "Scripts/offline_database.js\" type=\"text/javascript\"></script>";
	}
	if (isset($script_urls)) {
		foreach ($script_urls as $script_url) {
			echo "<script src=\"" . $script_url . "\" type=\"text/javascript\"></script>";
		}
	}
	?>

	<?php
	if (isset($scripts)) {
		foreach ($scripts as $script) {
			echo "<script src=\"" . base_url() . "Scripts/" . $script . "\" type=\"text/javascript\"></script>";
		}
	}
	?>


	<?php
	if (isset($styles)) {
		foreach ($styles as $style) {
			echo "<link href=\"" . base_url() . "CSS/" . $style . "\" type=\"text/css\" rel=\"stylesheet\"/>";
		}
	}
	?>  
	
	<style>


	</style>
  </head>
  <body>
	<div id="wrapper">

		<div id="top-panel">

			<div class="logo"><a class="logo" href="<?php echo base_url();?>" ></a></div>
		  	

			<div id="system_title">
				<?php $this->load->view('sections/banner'); ?>
			
				<?php
				if ($user_is_pharmacist) {?>
					
					<div id="facility_name">
						
						<span><?php echo $this -> session -> userdata('facility_name');?></span>
					</div>
				<?php }?>
			</div>
			<div class="banner_text"><?php echo $banner_text;?></div>
			<div id="top_menu"> 

			 	<?php
				//Code to loop through all the menus available to this user!
				//Fet the current domain
				$menus = $this -> session -> userdata('menu_items');
				$current = $this -> router -> class;
				$counter = 0;
				?>
				 	<a href="<?php echo site_url('home_controller');?>" class="top_menu_link  first_link <?php
					if ($current == "home_controller") {echo " top_menu_active ";
					}
				?>">Home </a>
				<?php
				foreach($menus as $menu){?>
					<a href = "<?php echo site_url($menu['url']);?>" class="top_menu_link <?php
					if ($current == $menu['url'] || $menu['url'] == $link) {echo " top_menu_active ";
					}
				?>"><?php echo $menu['text']; if($menu['offline'] == "1"){?>
					 <span class="alert red_alert">off</span></a>
					
				<?php } else{?>
					 <span class="alert green_alert">on</span></a>
				<?php }?>



				<?php
				$counter++;
				}
					?>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#my_profile").click(function(){
							$("#profile_list").toggle();
						})
					})
				</script>
				<div  class="btn-group" id="div_profile" >
				<a href="#" class="top_menu_link btn dropdown-toggle" data-toggle="dropdown"  id="my_profile"><i class="icon-user icon-black"></i> Profile  <span class="caret"></span></a>
				<ul class="dropdown-menu" id="profile_list" role="menu">
					<li><a href="<?php echo base_url().'user_management/profile' ?>"><i class="icon-edit"></i> Edit Profile</a></li>
					<li><a href="<?php echo base_url().'user_management/change_password' ?>"><i class=" icon-asterisk"></i> Change Password</a></li>
				</ul>
				</div>
				<div class="welcome_msg">
					<span>Welcome <b><?php echo $this -> session -> userdata('full_name');?></b>. <a href="<?php echo base_url().'user_management/logout' ?>">Logout</a></span><br>
					<br><span><?php echo date('l, jS \of F Y') ?></span>
				</div>
			</div>

			

		</div>

		<div id="inner_wrapper">
			<div id="main_wrapper">

				

				<div id="main_content">
					<?php
					$this->load->view($settings_view);
					?>
				</div>

			</div><!-- End of main wrapper -->
		</div><!-- End of inner wrapper -->

   	</div><!--End of wrapper -->

   	<div id="bottom_ribbon">
        <div id="footer">
 			<?php $this -> load -> view("footer_v");?>
    	</div>
    </div>

  </body>
</html>