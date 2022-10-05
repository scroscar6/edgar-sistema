<?php
require_once("../../../logueo/_BAKA_.php");

if(isset($_POST['save']) && $_POST['save']==1){
	
	require_once("../../../ClsConexion.php");
	require_once("../../../includes/XSS.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	include('../../../Modulos/Config/Clases/ClsConfig.php');
	
	include('../../../plugins/UploadFile.php');
	include('../../../includes/funciones.php');

	$idp = (int)$_POST['cp_id'];
	
	$emails = trim($_POST['cp_email']).','.trim($_POST['cp_email1']).','.trim($_POST['cp_email2']);

	$csConfig = new ClsConfig();
	$csConfig->id = $idp;
	$csConfig->titulo = LimpiarCampo($_POST['cp_titulo']);
	$csConfig->tituloext = LimpiarCampo($_POST['cp_tituloext']);
	$csConfig->metadesc = LimpiarCampo($_POST['cp_metadesc']);
	$csConfig->metakeys = LimpiarCampo($_POST['cp_metakeys']);
	$csConfig->frase = LimpiarCampo($_POST['cp_frase']);
	$csConfig->url = LimpiarCampo($_POST['cp_url']);
	$csConfig->email = $emails;
	$csConfig->direccion = LimpiarCampo($_POST['cp_direc']);
	$csConfig->telefono = LimpiarCampo($_POST['cp_telef']);
	$csConfig->telefono1 = '';//LimpiarCampo($_POST['cp_telef1']);
	$csConfig->facebook = LimpiarCampo($_POST['cp_urlfb']);
	$csConfig->twitter = LimpiarCampo($_POST['cp_urltw']);
	$csConfig->youtube = LimpiarCampo($_POST['cp_urlyt']);
	$csConfig->igoogle = LimpiarCampo($_POST['cp_urligo']); 
		

	$filValidar = true;
	if($filValidar==true){
		//echo "bien!";
		if($csConfig->Actualizar()){
			header("Location: ../../../cpanel.php?task=Portada&dx=2");
		}else{
			header("Location: ../../../cpanel.php?option=Config&task=Error");
		}
	}
}else{
	header("Location: ../../../cpanel.php?option=Config&task=Error&e=n");
}
?>