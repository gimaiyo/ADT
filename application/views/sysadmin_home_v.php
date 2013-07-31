<div id="display_content" class="center-content"></div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".admin_link").click(function() {
			var link = $(this).attr("id");
			var base_url="<?php echo base_url();?>"
			var link = base_url + "admin_management/" + link;
			$("#display_content").load(link);
		});
	});

</script>