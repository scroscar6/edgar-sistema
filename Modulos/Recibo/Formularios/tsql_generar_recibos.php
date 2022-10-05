<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('America/Lima');
	include('../../../ClsConexion.php');
	include('../../../PDO.php');
	include('../../../includes/funciones.php');
	include('../../../includes/XSS.php');
	include('../../../Modulos/Recibo/Clases/ClsRecibo.php');
	$ClsRecibo = new ClsRecibo();
	$idciclo = (int)($_POST['idciclo']);
	$Respuesta = $ClsRecibo->GenerarRecibos($idciclo);
	echo json_encode($Respuesta);
?>