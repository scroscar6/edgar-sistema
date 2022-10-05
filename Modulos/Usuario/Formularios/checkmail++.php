<?php
// compruebe el nombre de usuario 
$ema = isset($_POST['email'])?$_POST['email']:'';
if($ema!=NULL){
	require_once("../ss-admin/ClsConexion.php");
	require_once("../ss-admin/includes/funciones.php");
	require_once("../ss-admin/includes/XSS.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	
	include('../ss-admin/Modulos/Registro/Clases/ClsRegistro.php');
	
	$csRegistro = new ClsRegistro();
	$csRegistro->email = trim($ema);
	$lsRegistro = $csRegistro->VerificarEmail();
	if($lsRegistro==NULL){
		echo 'true';
	}else{
		echo 'false';
	}
}
?>