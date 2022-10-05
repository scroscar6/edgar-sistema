<?php
$user = isset($_GET['username'])?$_GET['username']:'';
$user1 = isset($_GET['username1'])?$_GET['username1']:'';
if($user!=NULL){
	require_once("../../../../ss-admin/ClsConexion.php");
	require_once("../../../../ss-admin/includes/funciones.php");
	require_once("../../../../ss-admin/includes/XSS.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	include('../../../../ss-admin/Modulos/Usuario/Clases/ClsUsuario.php');
	$csUsuario = new ClsUsuario();
	$csUsuario->login = trim($user);
	if($user1!=NULL){
		$csUsuario->login1 = trim($user1);
	}
	$lsUsuario = $csUsuario->VerificarUsername();
	if($lsUsuario!=NULL){
		echo 'true';
	}else{
		echo 'false';
	}
}
?>