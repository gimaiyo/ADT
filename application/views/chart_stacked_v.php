<script>
		$(function () {
	$('<?php echo "#" . $container; ?>').highcharts({
		colors: [
		'#66aaf7',
		'#f66c6f',
		'#8bbc21',
		'#910000',
		'#1aadce',
		'#492970',
		'#f28f43',
		'#77a1e5',
		'#c42525',
		'#a6c96a'
		],
		chart: {
		type: '<?php echo $chartType ?>'
		},
		title: {
		text: '<?php echo $chartTitle; ?>'
		},
		
		xAxis:
		{
		categories:  <?php echo $categories; ?>,
	title: {
	text: null
	}
	},
	yAxis: {
	min: 0,
	title: {
	text: '<?php echo $yAxix; ?>',
		align: 'high'
		},
		labels: {
		overflow: 'justify'
		}
		},
		tooltip: {
		valueSuffix: ''
		},
		plotOptions: {
			series: {
                    stacking: 'normal'
               }
		},
		legend: {
		layout: 'horizontal',
		align: 'left',
		verticalAlign: 'top',
		floating: true,
		borderWidth: 1,
		backgroundColor: '#FFFFFF',
		shadow: true
		},
		credits: {
		enabled: false
		},
		series:<?php echo$resultArray?>
		});
		});
</script>
<div class="graph">
	<div id="<?php echo $container?>"  style="width:100%;height:600px"  '>
</div>
</div>

