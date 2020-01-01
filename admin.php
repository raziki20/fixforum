<?php include 'components/authentication.php'; ?> 
<?php include 'components/session-check.php'; ?>
<?php include 'controllers/base/head.php'; ?>
<?php include 'controllers/navigation/first-navigation.php'; ?>
<?php include 'controllers/navigation/second-navigation.php';?>
<script type="text/javascript"> 
        ChangeIt();
    </script>
    <div class="container">
    <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        
    </p>
</figure>
</div>
<!-- VIEW GRAFIK -->
<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/exporting.js"></script>
<script src="assets/highcharts/export-data.js"></script>
<script src="assets/highcharts/accessibility.js"></script>
    
<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Graphics'
    },
    
    xAxis: {
        categories: ['Topics', 'Events', 'Users'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Millions'
        },
        labels: {
            formatter: function () {
                return this.value / 1000;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Asia',
        data: [502, 635, 809,]
    
    }]
});
    </script>