<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>grafico</title>
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<?php
		include ('db.php');
		$mysqli = ConectarDB();
		$sql = "SELECT * FROM valores";

//if( isset($_GET["filtrar"]))
{
	$date = $_GET["tiempo"];
	$mysqli = ConectarDB();
	$resultado = $mysqli->query($sql);
	$rawdata = array();
	$timeArray = array();
	$i=0;
	
	while($row = $resultado->fetch_assoc())
	{   
		$rawdata[$i] = $row['valor'];
		$time = $row['tiempo']
		$date = date_create($time);
		//$time = $row['time'];
		$date = new DateTime($time);
		$timeArray[$i] = $date->getTimestamp()*1000;
		echo $rawdata[$i] ." - ";
		//echo $date->format('Y-m-d h:i:s');
		echo " - ".$timeArray[$i];
		echo "<br>";
		$i++;
	}
}

	
?>
</head>

<body>
    <div id="contenedor"></div>
    
    <script>
	chartCPU = new Highcharts.StockChart({
		chart: {
			renderTo: 'contenedor'
			//defaultSeriesType: 'spline'
	
		},
		rangeSelector : {
			enabled: false
		},
		title: {
			text: 'Gráfica'
		},
		xAxis: {
			type: 'datetime'
			//tickPixelInterval: 150,
			//maxZoom: 20 * 1000
		},
		yAxis: {
			minPadding: 0.2,
			maxPadding: 0.2,
			title: {
				text: 'Valores',
				margin: 10
			}
		},
		series: [{
			name: 'Valor',
			data: (function() {
					// generate an array of random data
					var data = [];
					<?php
						for($i = 0 ;$i<count($rawdata);$i++){
					?>
					data.push([<?php echo $timeArray[$i];?>,<?php echo $rawdata[$i];?>]);
					<?php } ?>
					return data;
				})()
		}],
		credits: {
				enabled: false
		}
	});
	
	</script>
    
    <script>
	Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Average Temperature'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Temperature (°C)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Tokyo',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        name: 'London',
        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }]
});
	</script>
  
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</body>
</html>