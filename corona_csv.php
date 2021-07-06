

<?php

	
$pais = (empty($_GET['pais'])) ? "Brazil" : $_GET['pais'];
$pais = "China";


$handle = fopen("recovered_global.csv", "r");
$recuperados = [];
$i = 0;
while ($line = fgetcsv($handle, 1000, ",")) {
	if ($row++ == 0) {
		continue;
	}
	$recuperados[$i]['PAIS'] = $line[1];
	$recuperados[$i]['DADOS'] = $line;
	$i++;
}
fclose($handle);




$handle = fopen("time_series_covid19_confirmed_global.csv", "r");
$confirmados = [];
$i = 0;
while ($line = fgetcsv($handle, 1000, ",")) {
	if ($row++ == 0) {
		continue;
	}
	$confirmados[$i]['PAIS'] = $line[1];
	$confirmados[$i]['DADOS'] = $line;
	$i++;
}
fclose($handle);


$handle = fopen("time_series_covid19_deaths_global.csv", "r");
$mortes = [];
$i = 0;
while ($line = fgetcsv($handle, 1000, ",")) {
	if ($row++ == 0) {
		continue;
	}
	$mortes[$i]['PAIS'] = $line[1];
	$mortes[$i]['DADOS'] = $line;
	$i++;
}
fclose($handle);






$i = 0;
$listaMortes = "0";
foreach($mortes as $line1){
	if($line1['PAIS'] == $pais){
		foreach($line1['DADOS'] as $line2){
			if($i >= 4){
				$listaMortes = $listaMortes .",". $line2;
			}
		$i++;
		}
	}
}


$i = 0;
$listaConfirmados = "0";
foreach($confirmados as $line1){
	if($line1['PAIS'] == $pais){
		foreach($line1['DADOS'] as $line2){
			if($i >= 4){
				$listaConfirmados = $listaConfirmados .",". $line2;
			}
		$i++;
		}
	}
}

$i = 0;
$listaRecuperados = "0";
foreach($recuperados as $line1){
	if($line1['PAIS'] == $pais){
		foreach($line1['DADOS'] as $line2){
			if($i >= 4){
				$listaRecuperados = $listaRecuperados .",". $line2;
			}
		$i++;
		}
	}
}


echo"<pre>";
//var_dump($recuperados);
echo"</pre>";






?>

<form method = "GET" action="">
<select name="pais">
<option value=''></option>
<?php $paises = ""; foreach($recuperados as $line1){
	if($paises != $line1['PAIS']){
		$paises = $line1['PAIS'];
	echo "<option value='".$line1['PAIS']."'>".$line1['PAIS']."</option>";
	}
}
?>
</select>
<input type="submit" value="Selectionar"/>
</form>





  <script type="text/javascript" async="" src="grafico/analytics.js"></script>
  <script src="grafico/jquery-3.1.1.js" type="text/javascript"></script>
  <script src="grafico/bootstrap.js" type="text/javascript"></script>
  <script src="grafico/modernizr.js" type="text/javascript"></script>



	

	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sidebar-eq demo">

		<div class="chart-container">
						
			<script src="grafico/highcharts.js"></script>


<figure class="highcharts-figure">
    <div id="container" data-highcharts-chart="0" role="region" aria-label="Solar Employment Growth by Sector, 2010-2016. Highcharts interactive chart." aria-hidden="false" style="overflow: hidden;"><div id="highcharts-screen-reader-region-before-0" aria-label="Chart screen reader information." role="region" aria-hidden="false" style="position: relative;"></div></div>
	
	
	
	
	
	
	

	<g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7" aria-hidden="true"><text x="86.235294117642" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2010</text><text x="161.02521008403" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2011</text><text x="235.81512605042" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2012</text><text x="310.60504201681" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2013</text><text x="385.39495798319" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2014</text><text x="460.18487394958" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2015</text><text x="534.97478991597" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2016</text><text x="609.76470588236" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="382" opacity="1">2017</text></g>
	
	
	<g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7" aria-hidden="true"><text x="66" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="367" opacity="1">0</text><text x="66" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="294" opacity="1">50k</text><text x="66" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="221" opacity="1">100k</text><text x="66" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="148" opacity="1">150k</text><text x="66" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="75" opacity="1">200k</text></g>
	
	
	
	
	
	
	
	
	</div>
    </figure>


<?php



?>

		
<script>
	jQuery.noConflict();
	var example = 'line-basic', 
	theme = 'default';
	(function($){ 
	
	
<?php 

?>	
	
var text = '[{ "name":"Infectados", "data": [<?php echo $listaConfirmados; ?>]},{ "name":"Mortes", "data": [<?php echo $listaMortes; ?>]},{ "name":"Recperados", "data": [<?php echo $listaRecuperados; ?>]}   ]';
var obj = JSON.parse(text);

	
	// encapsulate jQuery
	Highcharts.chart('container', {



    title: {
        text: '<?php echo $pais;?> '
    },

    subtitle: {
        text: 'Tiago Junior - Indra - Porto Digital - Recife PE BR'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },
    xAxis: {
        accessibility: {
            rangeDescription: 'Range: 2010 to 2017'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: obj,

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});				})(jQuery);
			</script>
						