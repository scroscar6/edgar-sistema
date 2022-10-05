<?php
	require_once("../../../logueo/_BAKA_.php");
	require_once("../../../ClsConexion.php");
	require_once('../../../includes/funciones.php');
	require_once("../../../includes/XSS.php");
	include('../../../plugins/ClsResizeImage.php');
	include('../../../plugins/UploadFile.php');
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
?>