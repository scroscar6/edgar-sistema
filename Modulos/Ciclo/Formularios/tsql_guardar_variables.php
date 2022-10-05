<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('America/Lima');
	include('../../../ClsConexion.php');
	include('../../../PDO.php');
	include('../../../includes/funciones.php');
	include('../../../includes/XSS.php');
	include('../../../Modulos/Ciclo/Clases/ClsCiclo.php');
	$ClsCiclo = new ClsCiclo();
	$id = (int)($_GET['id']); 
	$tarifa = (string)($_GET['tarifa']);
	$acometida = (string)($_GET['acometida']);
	$medidor = (string)($_GET['medidor']);
	$sistema = (string)($_GET['sistema']);
	$electronico = (string)($_GET['electronico']);
	$costo_kwh = (float)($_GET['costo_kwh']);
	$alumbrado_p = (float)($_GET['alumbrado_p']);
	$cargo_fijo = (float)($_GET['cargo_fijo']);
	$mantenimiento = (float)($_GET['mantenimiento']);
	$igv = (float)($_GET['igv']);
	$derecho_r = (float)($_GET['derecho_r']);
	$interes_c = (float)($_GET['interes_c']);
	$ClsCiclo->GuardarVariables($id,$tarifa,$acometida,$medidor,$sistema,$electronico,$costo_kwh,$alumbrado_p,$cargo_fijo,$mantenimiento,$igv,$derecho_r,$interes_c);
	return true;
?>
