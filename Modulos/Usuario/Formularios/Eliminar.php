<?php
require_once("../../../logueo/_BAKA_.php");

include('../../../includes/XSS.php');
$GET_form = isset($_GET['option'])?LimpiarXSS($_GET['option']):'';
$GET_id = isset($_GET['Id'])?(int)$_GET['Id']:'';
$GET_pag = isset($_GET['p'])?(int)$_GET['p']:1;

if($GET_form!=NULL && $GET_id!=NULL){
	require_once("../../../ClsConexion.php");
	$CConexion = new ClsConexion();
	$CConexion->Conectar();

	$zClase = '../../../Modulos/'.$GET_form.'/Clases/Cls'.$GET_form.'.php';
	if(file_exists($zClase)){
		include($zClase);
		if($GET_id == 1){
			header("Location: ../../../cpanel.php?option=".$GET_form."&task=Error&error=4");	
		}else{
			$zObjeto = new ClsUsuario();
			$zObjeto->id = $GET_id;
			if($zObjeto->Eliminar()){
				header("Location: ../../../cpanel.php?option=".$GET_form."&task=Listar&p=".$GET_pag);	
			}else{
				header("Location: ../../../cpanel.php?option=".$GET_form."&task=Error");	
			}
		}
	}else{
		header("Location: ../../../");
	}
}
?>