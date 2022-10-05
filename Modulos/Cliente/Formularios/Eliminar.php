<?php
	require_once("../../../logueo/_BAKA_.php");
	require_once("../../../ClsConexion.php");
	require_once("../../../PDO.php");
	require_once("../../../includes/funciones.php");
	require_once("../../../includes/XSS.php");
	include('../../../Modulos/Cliente/Clases/ClsCliente.php');
	$id = (int)($_GET['Id']);
	$ObjCliente = new ClsCliente();
	if($ObjCliente->EliminarCliente($id)){
		header("Location: ../../../cpanel.php?option=Cliente&task=Listar&dx=1");
	}else{
		header("Location: ../../../cpanel.php?option=Cliente&task=Error");
	}
?>