<?php
	require_once("../../../logueo/_BAKA_.php");
	if(isset($_POST['save']) && $_POST['save']==1){
		require_once("../../../ClsConexion.php");
		require_once("../../../PDO.php");
		require_once("../../../includes/funciones.php");
		require_once("../../../includes/XSS.php");
		include('../../../Modulos/Cliente/Clases/ClsCliente.php');
		$ObjCliente = new ClsCliente();
		$nombre = LimpiarCampo($_POST["tag-nombre"]);
		$apellidos = LimpiarCampo($_POST["tag-apellido"]);
		$razon = LimpiarCampo($_POST["tag-razon"]);
		$direccion = LimpiarCampo($_POST["tag-direccion"]);
		$idpais = (int)$_POST["tag-pais"];
		$cuidad = LimpiarCampo($_POST["tag-ciudad"]);
		$email = LimpiarCampo($_POST["tag-email"]);
		$celular = LimpiarCampo($_POST["tag-celular"]);
		$documento = LimpiarCampo($_POST["tag-documento"]);
		$estado = (int)$_POST["tag-estado"];
		$nota = LimpiarCampo($_POST["tag-nota"]);
		$contrasena = (string)$_POST["tag-contrasena"];
		$manzana = (string)($_POST["tag-manzana"]);
		$lote = (string)$_POST["tag-lote"];
		if($ObjCliente->AgregarCliente($nombre,$apellidos,$razon,$direccion,$idpais,$cuidad,$email,$celular,$documento,$estado,$nota,$contrasena,$manzana,$lote)){
			header("Location: ../../../cpanel.php?option=Cliente&task=Listar&dx=1");
		}else{
			header("Location: ../../../cpanel.php?option=Cliente&task=Error");
		}
	}else{
		header("Location: ../../../cpanel.php?option=Cliente&task=Error&e=n");
	}
?>
