



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
require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';
	ini_set('default_charset','UTF-8');
    $con = new conexao(); 
    $con->connect(); 



$dataAtual = date('Y-m-d');



function consultaNum($codigo){
	require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';
    $con = new conexao(); 
    $con->connect(); 
	$consulta = mysqli_query($con->connect(),"SELECT `".$codigo."` AS TOTAL FROM confirmados c ");
	$col = "0";
	$atual = "0";
	$i = 0;
	while ($campo = mysqli_fetch_array($consulta)) { 
		if($i >=2){
			if(empty($campo['TOTAL'])){
				$col .= ",".$atual;
			}else{
				$atual = $campo['TOTAL'];
				$col .= ",".$campo['TOTAL'];
			}
		}
		$i++;
	}
	return $col ;
}


$resultadoBrasil = consultaNum("COL 28"); 
$resultadoChina = consultaNum("COL 41"); 
$resultadoItalia = consultaNum("COL 95"); 
$resultadoEUA = consultaNum("COL 190"); 

?>

		
<script>
	jQuery.noConflict();
	var example = 'line-basic', 
	theme = 'default';
	(function($){ 
	
	
<?php 

?>	
	
var text = '[{ "name":"Brazil", "data": [<?php echo $resultadoBrasil; ?>]},{ "name":"china", "data": [<?php echo $resultadoChina; ?>]},{ "name":"Italia", "data": [<?php echo $resultadoItalia; ?>]}, { "name":"EUA", "data": [<?php echo $resultadoEUA; ?>]}    ]';
var obj = JSON.parse(text);

	
	// encapsulate jQuery
	Highcharts.chart('container', {



    title: {
        text: 'Compra'
    },

    subtitle: {
        text: 'kyo'
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
						