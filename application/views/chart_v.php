
<script>
$(function () {
        $('<?php echo "#".$container; ?>').highcharts({

            chart: {
                type: '<?php echo $chartType ?>'
            },
            title: {
                text: '<?php echo $chartTitle;?>'
            },
            xAxis:            
             {
             	categories: <?php echo $categories; ?>,
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
    <div class="graph">
    	<div id="<?php echo $container?>"  style="width:100%;height:600px"  '></div>
    </div>
    
    
    
