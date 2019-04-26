<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Clustering\Model\Clustering;

$clustering = new Clustering();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scatter Chart</title>


    <link href="charts/samples/assets/styles.css" rel="stylesheet" />

    <style>
        #chart {
            max-width: 650px;
            margin: 35px auto;
        }
    </style>
</head>

<body>
    <div id="chart">

    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>

    <script>
        let options = {
            chart: {
                height: 350,
                type: 'scatter',
                zoom: {
                    enabled: true,
                    type: 'xy'
                }
            },
            colors: [
                '#0df65f',
                '#58d208',
                '#98f607',
                '#d0f612',
                '#d2b700',
                '#f68300',
                '#d21200',
                '#f60b67',
                '#da0fcf',
                '#9807f6',
                '#2124d2'
            ],
            series: <?php echo $clustering->getData(); ?>,
            xaxis: {
                tickAmount: 10,
                labels: {
                    formatter: function(val) {
                        return parseFloat(val).toFixed(1)
                    }
                }
            },
            yaxis: {
                tickAmount: 7
            }
        };

        let chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();
    </script>
</body>

</html>
