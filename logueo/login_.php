<?php
defined('_SSADM_') or die;
session_start();
$error = '';
$user = '';
$clave = '';
$nueip = filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP,FILTER_FLAG_IPV4); 

if(isset($_SESSION['IdUsuario']) && isset($_SESSION['Login']) && $_SESSION["Tipo"]!==3 && $nueip==$_SESSION['ip']){
	@header('Location: '.urldecode($redi1));	
}else{
	if(isset($_POST['send']) && $_POST['send']==1){
	require_once("ClsConexion.php");
	require_once("includes/funciones.php");
	require_once("includes/XSS.php");
	require_once("includes/Password__Hashx.php");
	
	include('Modulos/Usuario/Clases/ClsUsuario.php');
	$CConexion = new ClsConexion();
	$Conectar = $CConexion->Conectar();
	
	$user = isset($_POST['username']) ? LimpiarXSS(trim($_POST['username'])):'';
	$clave = isset($_POST['password']) ? LimpiarXSS(trim($_POST['password'])):'';

		if($user!=NULL && $clave!=NULL){
			
			if(validarUsuario($user)){
				
				$usuario = new ClsUsuario();
				$usuario->login = $user;
				//$usuario->password = $password_hash;
				$idUsuario = $usuario->LoginName();

				$array_modo = array(0, 1, 2, 3);
				$array_tipo = array(1, 2, 3, 4, 5);
				if($idUsuario != NULL){
					$passwordenBD = $idUsuario->password;
					$validBD = comprobar_clave($clave,$passwordenBD)? true:false;
					
					if($validBD===true){

						if($idUsuario->estado==1){					
							if(in_array($idUsuario->idtipo, $array_tipo) && in_array($idUsuario->idmodo, $array_modo)){
								$_SESSION['timeout']=time();
								$_SESSION["IdUsuario"] = $idUsuario->id;
								$_SESSION["Login"] = $idUsuario->login;
								//$_SESSION['Nombre'] = $idUsuario->nombre;
								//$_SESSION['Apellido'] = $idUsuario->apellido;
								//$_SESSION["UltimoAcceso"]= $idUsuario->ingreso;
								//$_SESSION["Registro"]= $idUsuario->registro;
								$_SESSION["Tipo"]= $idUsuario->idtipo;
								$_SESSION["Modo"]= $idUsuario->idmodo;
								//$_SESSION["Email"]= $idUsuario->email;
								//$_SESSION["Estado"]= $idUsuario->estado;
								$_SESSION['ip'] = filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP,FILTER_FLAG_IPV4); 
												
								$usuario->id = $_SESSION["IdUsuario"];
								$usuario->ingreso = date('Y-m-d H:i:s');
								
								$usuario->ActualizarUltimoAcceso();
								
								header("Location: ".urldecode($redi1));	

								/*switch($idUsuario->idtipo){
									case 1:
										header("Location: ".urldecode($redi1));	
									break;
									case 2:
										header("Location: ".urldecode($redi1));	
									break;
									case 3:
										echo "Usuario sin permisos.";
									break;
								}*/
							}else{
								$error = "Este usuario no tiene privilegios de administrador";
							}

						}else{
							$error = "La cuenta está deshabilitada. Póngase en contacto con el administrador del sistema.";
						}
						
					}else{
						$error = "La contraseña no es válida. Por favor, asegúrate de que el bloqueo de mayúsculas no está activado e inténtalo de nuevo.";	
					}

				}else{
					$error = "La contraseña no es válida. Por favor, asegúrate de que el bloqueo de mayúsculas no está activado e inténtalo de nuevo.";
				}
			}else{
				$error = "Caracteres no válidos para el nombre de usuario.[6 - 16 caracteres]";
			}
			
		}else{
			$error = "Dejó algunos campos en blanco";	
		}
	$CConexion->Desconectar();
	}else{
		 $error = "Los campos son requeridos";	
	}
}
?>