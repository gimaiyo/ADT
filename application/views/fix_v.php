<?php
echo "<script src=\"" . base_url() . "Scripts/offline_database.js\" type=\"text/javascript\"></script>";
echo "<script src=\"" . base_url() . "Scripts/jquery.js\" type=\"text/javascript\"></script>";
?>
<script type="text/javascript">
initDatabase();
	$(document).ready(function(){
		saveLogoutEnvironmentVariables();
	});
</script>