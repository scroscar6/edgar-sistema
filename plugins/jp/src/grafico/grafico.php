<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph.php');
require_once ('../jpgraph_bar.php');
date_default_timezone_set('America/Lima');
include('../../../../ClsConexion.php');
include('../../../../PDO.php');
include('../../../../includes/funciones.php');
include('../../../../includes/XSS.php');
include('../../../../Modulos/Recibo/Clases/ClsRecibo.php');
include('../../../../Modulos/Ciclo/Clases/ClsCiclo.php');
$idciclo = (int)$_GET['idciclo'];
$idrecibo = (int)$_GET['idrecibo'];
$ClsRecibo = new ClsRecibo();
$ClsCiclo = new ClsCiclo();
$value = $ClsRecibo->ListarReciboUno($idrecibo);
$value = CorrelativoObj($value,0,'nro');
$datosCiclo = $ClsCiclo->VerVariables($idciclo);
$datosTotalesRecibo = $ClsRecibo->TotalesCiclo($idciclo);


$mes = strtoupper($datosCiclo['mes_texto']);
$anio = strtoupper($datosCiclo['anio']);
$fecha_hora = strtoupper($datosCiclo['fecha_hora_actual']);




foreach ($value as $value) { 

	$d_grafico = $ClsRecibo->DatosGrafico($value->idcliente);
	$d_grafico = array_reverse($d_grafico);
	$datay = array();
	$datal = array();
	foreach ($d_grafico as $gh) {
		array_push($datay, $gh['consumo_facturado']);
		array_push($datal, $gh['mes_texto'].' '.$gh['anio']);
	}


	
	 
	// Create the graph. These two calls are always required
	$graph = new Graph(300,200);
	$graph->SetScale('textlin');
	 
	// Add a drop shadow
	$graph->SetShadow();
	 
	// Adjust the margin a bit to make more room for titles
	$graph->SetMargin(40,10,10,60);
	 $graph->xaxis->SetTickLabels($datal);
	// Create a bar pot
	$bplot = new BarPlot($datay);
	 
	// Adjust fill color
	$bplot->SetFillColor('orange');
	$graph->Add($bplot);
	 
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->xaxis->SetLabelAngle(45);
	$graph->title->Set($value->direccion);
	$graph->xaxis->title->Set("Mes");
	$graph->yaxis->title->Set("Consumo Facturado");
	// Display the graph
	$graph->Stroke();
}
?>