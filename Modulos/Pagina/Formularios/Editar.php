<?php
require_once("../../../logueo/_BAKA_.php");
if(isset($_POST['save']) && $_POST['save']==1){
	include('../../../includes/MiLoad.php');
	include('../../../Modulos/Pagina/Clases/ClsPagina.php');
	$idp = (int)$_POST['cp_id'];
	$idcat = (int)$_POST['cp_idcat'];
	$checkx = 1;
	switch($checkx){
		case 1:
		$n_archivo = ConvertMinSinTildes(trim($_POST['cp_titulo']));
		$alias = trim($n_archivo);
		break;
	}
	$csPagina = new ClsPagina();
	$csPagina->id = $idp;
	$csPagina->idpaginacategoria = $idcat;
	$csPagina->titulo = LimpiarCampo($_POST['cp_titulo']);
	$csPagina->alias = $alias;
	$csPagina->descripcion = LimpiarCampoY($_POST['cp_descripcion']);
	$csPagina->pagina = $alias;
	$csPagina->fecha = date('Y-m-d H:i:s');
	$csPagina->opcion = LimpiarCampo($_POST['cp_vistaf']);
	$csPagina->orden = LimpiarCampo($_POST['cp_orden']);
	$csPagina->estado = (int)$_POST['cp_estado'];
	$filValidar = true;
	if($filValidar==true){
		if($csPagina->Actualizar()){
			header("Location: ../../../cpanel.php?option=Pagina&task=Listar&cat=".$idcat."&dx=2");
		}else{
			header("Location: ../../../cpanel.php?option=Pagina&task=Error");
		}
	}
}else{
	header("Location: ../../../cpanel.php?option=Pagina&task=Error&e=n");
}
?>