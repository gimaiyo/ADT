<?php
echo validation_errors('
<p class="error">','</p>
'); 
if($this->session->userdata("changed_password")){
	$message=$this->session->userdata("changed_password");
	echo "<p class='error'>".$message."</p>";
	$this->session->set_userdata("changed_password","");
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		 var ajaxDelay =10;
 
         setInterval(function(){
         	
         	window.location.href="home_controller/home";
            
         }, ajaxDelay);
		
	});
</script>