<script src="<?php echo base_url() . 'Scripts/FusionCharts/FusionCharts.js';?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
           var chart= new FusionCharts("<?php echo base_url().'Scripts/FusionCharts/MSBar2D.swf';?>","ChartId","80%","100%","0","0");	
	       chart.setDataURL("<?php echo base_url().'facilitydashboard_management/getExpiringDrugs/2';?>");
	       chart.render("chart_area");	
	});
</script>
