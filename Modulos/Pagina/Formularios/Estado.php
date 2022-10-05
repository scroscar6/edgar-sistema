<?php
session_start();
if(!isset($_SESSION['IdUsuario'])) exit();

include('../../../includes/XSS.php');
$GET_form = isset($_GET['option'])?LimpiarXSS($_GET['option']):'';
$GET_id = isset($_GET['Id'])?(int)$_GET['Id']:'';
$GET_estado = isset($_GET['Es'])?(int)$_GET['Es']:'';
$GET_pag = isset($_GET['p'])?(int)$_GET['p']:1;
$GET_cat = isset($_GET['cat'])?(int)$_GET['cat']:0;
//$vb = 0;
if($GET_form!=NULL && $GET_id!=NULL){
	require_once("../../../ClsConexion.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();
	
	$zClase = '../../../Modulos/'.$GET_form.'/Clases/Cls'.$GET_form.'.php';
	if(file_exists($zClase)){
		include($zClase);
		$zObjeto = new ClsPagina();
		$zObjeto->id = $GET_id;
		$zObjeto->estado = $GET_estado;
		if($zObjeto->ActualizarEstado()){
			header("Location: ../../../cpanel.php?option=".$GET_form."&task=Listar&p=".$GET_pag);	
		}else{
			header("Location: ../../../cpanel.php?option=".$GET_form."&task=Error");	
		}
	}else{
		header("Location: ../../../");
	}
}
?>