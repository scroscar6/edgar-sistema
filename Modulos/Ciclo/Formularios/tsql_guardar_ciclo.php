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
	$mes = (string)($_POST['mes']);
	$anio = (string)($_POST['anio']);
	$inicio = (string)($_POST['inicio']);
	$fin = (string)($_POST['fin']);
	$Respuesta = $ClsCiclo->CrearCiclo($mes,$anio,$inicio,$fin);
	echo json_encode($Respuesta);
?>