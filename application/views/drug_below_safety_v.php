<head>
<title>Dashboard-Demo</title>
<script src="<?php echo base_url().'Scripts/jquery.js'?>" type="text/javascript"></script> 
<script language="Javascript" src="<?php echo base_url().'Scripts/FusionCharts/FusionCharts.js';?>"></script>
    <script type="text/javascript">
		$(document).ready(function() {

		    var chart= new FusionCharts("<?php echo base_url().'Scripts/FusionCharts/MSBar2D.swf';?>","ChartId","80%","100%","0","0");	
	        chart.setDataURL("<?php echo base_url().'facilitydashboard_management/stock_notification/2';?>");

	        chart.render("chart_area");	

		});

    </script>
    <style type="text/css">
    	#chart_area{
    		margin:0 auto;
    		width:800px; 
    		height:400px;
    	}
    </style>
    
</head>
<body>

<div id="chart_area">
	
</div>
</body>