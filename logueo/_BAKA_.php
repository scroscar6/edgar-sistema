<?php
session_start();
date_default_timezone_set('America/Lima');
if(!isset($_SESSION['IdUsuario']) && $_SESSION['IdUsuario']==NULL){
	header("Location: ../../../");
	exit();
}
if(isset($_SESSION['timeout']) && $_SESSION['timeout'] + 30 * 60 < time()){
	header("Location: ../../../logueo/logout.php".$_SESSION['ref']);
	exit();
}
?>