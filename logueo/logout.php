<?php
	if(!isset($_SESSION['IdUsuario'])){
		@session_start();
	}
	session_unset();
	session_destroy();
	$GET_s = isset($_GET['s'])?(int)$_GET['s']:'';
	if($GET_s == 1){
		header("Location: ../");
		exit();
	}else{
		@session_start();
		$_SESSION['Msg'] = 'No ha habido actividad desde hace 1800 o m&aacute;s segundos, por favor reingrese al sitio.';
		$redi1 = trim($_SERVER['QUERY_STRING']);
		//echo $redi1."<br>";
		if(!isset($_GET['option'])) $redi1 = '?er=1'; else $redi1 = '?ref=cpanel.php?'.urlencode($redi1);
		//echo $redi1;
		header("Location: ../".$redi1);
		exit();
	}
?>