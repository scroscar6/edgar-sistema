<?php
 // remove slashes added by magic quotes if enabled
  function stripData($data) {
	return ini_get('magic_quotes_gpc') ? stripslashes($data) : $data;
  }

  // add slashes if magic quotes disabled
  function prepareData($data) {
	return ini_get('magic_quotes_gpc') ? $data : addslashes($data);
  }

  // prepare data for comparison to posted data
  function compData($data) {
	return ini_get('magic_quotes_gpc') ? addslashes($data) : $data;
  }

function LimpiarXSS($tags){
	$tags = strip_tags($tags);
	$tags = stripslashes($tags);
	$tags = htmlentities($tags,ENT_QUOTES,'UTF-8');
	$tags = trim($tags);
	return $tags; 
} 
function LimpiarCampo($tags){
	$tags = str_replace(array("<div>","</div>"),array("",""), $tags);
	$tags = strip_tags($tags,"<a><p><u><em><strong><b><i><img><h1><h2><h3><h4><h5><h6><ol><ul><li><br><br/><table><tr><th><td><strike><sup><sub><span><blockquote><hr><s><del><embed>");
	$tags = trim($tags);
	return $tags;
}

function LimpiarCampoY($tags){
	//$tags = str_replace(array("<div>","</div>"),array("",""), $tags);
	$tags = strip_tags($tags,"<div><a><p><u><em><strong><b><i></i><img><h1><h2><h3><h4><h5><h6><ol><ul><li><br><br/><table><tr><th><td><strike><sup><sub><span><blockquote><hr><s><del><embed><iframe>");
	$tags = trim($tags);
	return $tags;
}

function LimpiarCampoZ($tags){
	//$tags = str_replace(array("<div>","</div>"),array("",""), $tags);
	$tags = strip_tags($tags,"<div><a><p><u><em><strong><b><i><img><h1><h2><h3><h4><h5><h6><ol><ul><li><br><br/><table><tr><th><td><strike><sup><sub><span><blockquote><hr><s><del>");
	$tags = trim($tags);
	return $tags;
}

function AlfaNumericoSS($cadena){
	$consev = '0-9a-z'; // juego de caracteres a conservar
	$regex = sprintf('~[^%s]++~i', $consev); // case insensitive
	$cadena = preg_replace($regex, '', $cadena);
	return $cadena;
}
function iTexto($itexto){
	//$itexto = utf8_encode(str_replace("\\","",trim($itexto)));
	$itexto = str_replace(array('&','"',"'"),array("&amp;","&quot;","&#039;"), trim($itexto));
	$sustituye = array("\r\n", "\n\r", "\n", "\r");
	$itexto = str_replace($sustituye, " ", $itexto);
	return trim($itexto);
}
function iDescription($itexto){
	$itexto = str_replace(array('&','<','>','/>'),array("&amp;",'&lt;','&gt;','/&gt;'), $itexto);
	$itexto = utf8_encode(str_replace("\\","",trim($itexto)));
	//$itexto = str_replace(array('"',"'"),array("&quot;","&#039;"), trim($itexto));
	return $itexto;
}
function iDescription1($itexto1){
	$itexto1 = str_replace(array("&","\\"),array("&amp;",""), $itexto1);
	$itexto1 = htmlspecialchars_decode($itexto1);
	return trim($itexto1);
}

function iDescription2($itexto2){
	$itexto2 = utf8_encode(str_replace("\\","",trim($itexto2)));
	//$itexto2 = utf8_encode($itexto2);
	return trim($itexto2);
}

function iDescriptionAddEdit($itexto){
	$itexto = utf8_encode(preg_replace("/<br \/>/","\n",trim($itexto)));
	//$itexto = str_replace(array('"',"'"),array("&quot;","&#039;"), trim($itexto));
	return $itexto;
}
function dameURL(){
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	return htmlentities(trim($url));
}
function dameHOST(){
	$url="http://".$_SERVER['HTTP_HOST'];
	return htmlentities(trim($url));
}

function ObtenerDominio(){
	$parsedUrl = parse_url($_SERVER['HTTP_HOST']);
	$host = explode('.', $parsedUrl['path']);
	$domain = "http://www.".$host[1].'.'.$host[2].'.'.$host[3];
	return trim($domain);
}

//$host =  array_shift((explode(".",$_SERVER['HTTP_HOST']))); //obtener un subdominio

function xsFloat($float = 0.00){
	$float = number_format((float)$float, 2, '.', '');
	return trim($float);
}
function xsFloatRound($float = 0){
	$float = number_format((float)$float, 0, '.', '');
	$float = round($float);
	return trim($float);
}
function valFecha($fecha = ''){
	return preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha);
}
function valFechaN($fecha = ''){
	return preg_match('/^\d{1,2}\-\d{1,2}\-\d{4}$/', $fecha);
}
function valFechaM($fecha = ''){
	return preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $fecha);
}
function diaSemana($anio,$mes,$dia){
	setlocale(LC_ALL,"es_ES");
	$anio_s = $dia.'-'.$mes.'-'.$anio;
	if(valFechaN($anio_s)){
		$dias = array("dom","lun","mar","mié","jue","vie","sáb");
		$dia_s = date('w',strtotime($anio_s));
		return $dias[$dia_s];
	}else{
		return 0;
	}
}
function LoadClase($dir='', $name=''){
	$DirClass = SSMODULO.$dir.DS.'Clases'.DS.$name.'.php';
	if(file_exists($DirClass)){
		include($DirClass);
	}else{
		die('<strong>ERROR: </strong>La clase <strong>"'.$name.'"</strong> faltante, revise.');	
	}
}

function IdVideoYT($urlyt){
	$video_id = '';
	if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $urlyt, $match)) {
		$video_id = trim($match[1]);
	}
	return $video_id;
}
function rsCheka($array = NULL){
	if($array!=NULL){
		if(is_array($array)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
function BK($array = NULL){
	if($array!=NULL){
		if(is_array($array)){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
function Entero($var){
	return preg_replace("/[^0-9]/", "",$var);
}
function getRealIP(){
    if (isset($_SERVER["HTTP_CLIENT_IP"])){
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"])){
        return $_SERVER["HTTP_FORWARDED"];
    }
    else{
        return $_SERVER["REMOTE_ADDR"];
    }
}
function validateTime($time){
    $pattern="/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
    if(preg_match($pattern,$time)) return true;
    return false;
}
?>