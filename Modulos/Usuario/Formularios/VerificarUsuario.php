<?php
$user1 = isset($_POST['tag-usuario'])?$_POST['tag-usuario']:'';
if($user1!=NULL){
	require_once("../../../../was/ClsConexion.php");
	require_once("../../../../was/includes/funciones.php");
	require_once("../../../../was/includes/XSS.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	include('../../../../was/Modulos/Usuario/Clases/ClsUsuario.php');
	$csUsuario = new ClsUsuario();
	$csUsuario->login1 = trim($user1);
	$lsUsuario = $csUsuario->UsuarioComp();
	echo $lsUsuario;
}
?>