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
	$id = (int)($_POST['id']);
	$Respuesta = $ClsCiclo->EliminarCiclo($id);
	echo json_encode($Respuesta);
?>