<?php
require_once("../../../logueo/_BAKA_.php");

if(isset($_POST['save']) && $_POST['save']==1){
	require_once("../../../ClsConexion.php");
	require_once("../../../includes/funciones.php");
	require_once("../../../includes/XSS.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	
	include('../../../Modulos/Usuario/Clases/ClsUsuario.php');
	
	$flid = isset($_POST['tag-id']) ? LimpiarXSS($_POST['tag-id']) : '';
	$flnom = isset($_POST['tag-nombre']) ? LimpiarXSS(trim($_POST['tag-nombre'])) : '';
	$flape = isset($_POST['tag-apellido']) ? LimpiarXSS(trim($_POST['tag-apellido'])) : '';
	
	$flusu = isset($_POST['tag-usuario']) ? LimpiarXSS(trim($_POST['tag-usuario'])) : '';
	$flusu = validarUsuario($flusu) ? $flusu : '';
	$flusu1 = isset($_POST['tag-usuario1']) ? LimpiarXSS(trim($_POST['tag-usuario1'])) : '';
	
	$flema = isset($_POST['tag-email']) ? LimpiarXSS(trim($_POST['tag-email'])) : '';
	$flema = validarEmail($flema) ? $flema : '';
	$flema1 = isset($_POST['tag-email1']) ? LimpiarXSS(trim($_POST['tag-email1'])) : '';
	
	$flcon = isset($_POST['tag-contrasena'])? LimpiarXSS(trim($_POST['tag-contrasena'])) : '';
	$flcon0 = isset($_POST['tag-contranueva'])? LimpiarXSS(trim($_POST['tag-contranueva'])) : '';
	$flcon1 = isset($_POST['tag-contranueva1'])? LimpiarXSS(trim($_POST['tag-contranueva1'])) : '';
	
	$fltip = isset($_POST['tag-tipo']) ? (int)$_POST['tag-tipo'] : 0;
	$flest = isset($_POST['tag-estado']) ? (int)$_POST['tag-estado'] : 0;
	$flmod = 0;
	
	$csUsuario = new ClsUsuario();
	if(!empty($flid) && !empty($flnom) && !empty($flape) && !empty($flusu) && !empty($flema)){
		//verifica login
		$csUsuario->login = $flusu;
		$csUsuario->login1 = $flusu1;
		if($csUsuario->VerificarUsername()){
			header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=1");
		}else{
			$csUsuario->email = $flema;
			$csUsuario->email1 = $flema1;
			if($csUsuario->VerificarEmail()){
				header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=6");
			}else{
				$lsCambioP = true;
				if($flcon!=NULL){
					$csUsuario->id = $flid;
					$lsUsuarioCP = $csUsuario->ObtenerPorId();
					if($lsUsuarioCP!=NULL){
						$passwordenBD = $lsUsuarioCP->password;
						//$passwordencryp = zbetter_crypt($flcon);
						$validBD = comprobar_clave($flcon,$passwordenBD)? true:false;
						if($validBD==true){
							//echo $flcon."sds<br>";
							//echo $flcon0."sds<br>";
							//echo $flcon1."sds";
							//exit();
							if($flcon0!=NULL && $flcon1!=NULL){
								if($flcon0 == $flcon1){
									$csUsuario->id = $flid;
									$csUsuario->password = zbetter_crypt($flcon1);
									$lsCambioP = $csUsuario->CambiarContrasena();
								}else{
									header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=7");
									exit();
								}
							}else{
								header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=10");
								exit();
							}
						}else{
							header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=8");
							exit();
						}
					}else{
						header("Location: ../../../cpanel.php?option=Usuario&task=Error&error=9");
						exit();	
					}
				}
				
				$csUsuario->id = $flid;
				$csUsuario->idmodo = $flmod;
				//$csUsuario->idtipo = $fltip;
				$csUsuario->login = $flusu;
				$csUsuario->nombre = $flnom;
				$csUsuario->apellido = $flape;
				$csUsuario->email = $flema;
				//$csUsuario->estado = $flest;
				
				if($csUsuario->Actualizar() || $lsCambioP){
					header("Location: ../../../cpanel.php?option=Usuario&task=Listar&dx=2");
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