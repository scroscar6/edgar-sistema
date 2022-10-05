<?php
require_once("../../../logueo/_BAKA_.php");

if(isset($_POST['save']) && $_POST['save']==1){

	require_once("../../../ClsConexion.php");
	require_once("../../../includes/funciones.php");
	require_once("../../../includes/XSS.php");

	$CConexion = new ClsConexion();
	$CConexion->Conectar();

	include('../../../Modulos/Usuario/Clases/ClsUsuario.php');

	$flnom = isset($_POST['tag-nombre']) ? LimpiarXSS(trim($_POST['tag-nombre'])) : '';
	$flape = isset($_POST['tag-apellido']) ? LimpiarXSS(trim($_POST['tag-apellido'])) : '';
	$flusu = isset($_POST['tag-usuario']) ? LimpiarXSS(trim($_POST['tag-usuario'])) : '';
	$flusu = validarUsuario($flusu) ? $flusu : '';
	$flema = isset($_POST['tag-email']) ? LimpiarXSS(trim($_POST['tag-email'])) : '';
	//$flema = validarEmail($flema) ? $flema : '';
	$flcon = isset($_POST['tag-contrasena1'])? zbetter_crypt(LimpiarXSS(trim($_POST['tag-contrasena1']))) : '';
	$fltip = isset($_POST['tag-tipo']) ? (int)$_POST['tag-tipo'] : 0;
	$flest = isset($_POST['tag-estado']) ? (int)($_POST['tag-estado']) : 0;
	$flreg = date('Y-m-d H:i:s');
	$flmod = 0;

	$csUsuario = new ClsUsuario();
	if(!empty($flnom) && !empty($flape) && !empty($flusu) && !empty($flema) && !empty($flcon)){
		$csUsuario->login = $flusu;
		if($csUsuario->VerificarLoginExiste()){
			header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=1");
		}else{
			//verificar email
			$csUsuario->email = $flema;
			if($csUsuario->VerificarEmail()){
				header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=6");
			}else{
				$See = new ClsUsuario();
				$VSee = $See->ObtenerIdCategoriaMax();
				$idp = ($VSee+1);
				$csUsuario->id = $idp;
				$csUsuario->idtipo = $fltip;
				$csUsuario->idmodo = $flmod;
				$csUsuario->login = $flusu;
				$csUsuario->password = $flcon;
				$csUsuario->registro = $flreg;
				$csUsuario->nombre = $flnom;
				$csUsuario->apellido = $flape;
				$csUsuario->email = $flema;
				$csUsuario->estado = $flest;
				if($csUsuario->Registrar()){
					header("Location: ../../../cpanel.php?option=Usuario&task=Listar&dx=1");
				}else{
					header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=2");
				}
			}
		}
	}else{
		header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=3");
	}
}else{
	header('Location: ../../../');
}
?>