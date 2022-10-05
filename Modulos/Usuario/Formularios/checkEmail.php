<?php
// compruebe el nombre de usuario 
$ema = isset($_GET['email'])?$_GET['email']:'';
$ema1 = isset($_GET['email1'])?$_GET['email1']:'';
if($ema!=NULL){
	require_once("../../../../ss-admin/ClsConexion.php");
	require_once("../../../../ss-admin/includes/funciones.php");
	require_once("../../../../ss-admin/includes/XSS.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	
	include('../../../../ss-admin/Modulos/Usuario/Clases/ClsUsuario.php');
	
	$csUsuario = new ClsUsuario();
	$csUsuario->email = trim($ema);
	if($ema1!=NULL){
		$csUsuario->email1 = trim($ema1);
	}
	$lsUsuario = $csUsuario->VerificarEmail();
	if($lsUsuario!=NULL){
		echo 'true';
	}else{
		echo 'false';
	}
}
?>