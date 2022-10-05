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
	$idrecibo = (int)($_POST['idrecibo']);
	$ClsRecibo->CambiarEstadoPagado($idrecibo);
	echo true;
?>