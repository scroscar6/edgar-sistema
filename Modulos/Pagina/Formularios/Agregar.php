<?php
session_start();
date_default_timezone_set('America/Lima');
if(!isset($_SESSION['IdUsuario'])) exit();
if(isset($_POST['save']) && $_POST['save']==1){

	include('../../../includes/MiLoad.php');

	include('../../../Modulos/Pagina/Clases/ClsPagina.php');

	$See = new ClsPagina();
	$VSee = $See->ObtenerIdCategoriaMax();
	$idp = ($VSee+1);
	$idcat = (int)$_POST['cp_categoria'];
	
	$checkx = 1;

	switch($checkx){
		case 1:
			$n_archivo = ConvertMinSinTildes(trim($_POST['cp_titulo']));
			//$n_archivo = "/page/".$idp."-".$n_archivo;
			$alias = trim($n_archivo);
		break;
	}

	$csPagina = new ClsPagina();
	$csPagina->id = $idp;
	$csPagina->idpaginacategoria = $idcat;
	$csPagina->titulo = LimpiarCampo($_POST['cp_titulo']);
	$csPagina->opcion = (int)($_POST['cp_vistaf']);
	$csPagina->orden = (int)($_POST['cp_orden']);
	$csPagina->alias = $alias;
	$csPagina->descripcion = LimpiarCampoY($_POST['cp_descripcion']);
	$csPagina->pagina = $alias;
	$csPagina->fecha = date('Y-m-d H:i:s');
	$csPagina->estado = 1;
	
	$filValidar=true;
	
	if($filValidar==true){
		if($csPagina->Registrar()){
			header("Location: ../../../cpanel.php?option=Pagina&task=Listar&cat=".$idcat."&dx=1");
		}else{
			header("Location: ../../../cpanel.php?option=Pagina&task=Error");
		}
	}
}else{
	header("Location: ../../../cpanel.php?option=Pagina&task=Error&e=n");
}
?>