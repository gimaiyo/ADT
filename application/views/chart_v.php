<head>
	<?php
	$this->load->view('sections/head');
	?>
</head>
<script>
$(function () {
        $('#container').highcharts({
            chart: {
                type: '<?php echo $chartType ?>'
            },
            title: {
                text: '<?php echo $chartTitle;?>'
            },
            xAxis: {
            	categories:<?php echo  json_encode($categories);?>,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<?php echo $yAxix;?>',
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
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series:<?php echo$resultArray ?>
        });
    });
    </script>
    <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div