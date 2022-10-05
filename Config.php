<?php
	$Config_NombreSitio = '';
	$Config_DatoNombre = '';
	$Config_MetaDesc = '';
	$Config_MetaKeys = '';
	$Config_DatoFrase = '';
	$Config_DatoDireccion = '';
	$Config_DatoTelefono = '';
	$Config_DatoTelefono1 = '';
	$Config_DatoEmail = '';
	$Config_DatoTwitter = '';
	$Config_DatoYoutube = '';
	$Config_DatoFacebook = '';
	$Config_DatoGoogle = '';
	$Config_From = isset($ConfigFrom)?$ConfigFrom:'';
	$Config_FromName = isset($ConfigFromName)?$ConfigFromName:'';
	$Config_emails = '';
	$emailp = array('');
	$Config_Url = '';
	$csConfig = new ClsConfig();
	$csConfig->id = 1;
	$lsConfig = $csConfig->ObtenerPorId();
	if($lsConfig!=NULL){
		$emailp = explode(',',trim($lsConfig->email));
		$emailname = explode('@',$emailp[0]);
		$emailname1 = explode('@',$emailp[1]);
		$emailname2 = explode('@',$emailp[2]);
		$Config_emails =  array($emailp[0]=>$emailname[0], $emailp[1]=>$emailname1[0], $emailp[2]=>$emailname2[0]);
		$Config_NombreSitio = iTexto($lsConfig->titulo);
		$Config_DatoNombre = iTexto($lsConfig->tituloext);
		$Config_MetaDesc = iTexto($lsConfig->metadesc);
		$Config_MetaKeys = iTexto($lsConfig->metakeys);
		$Config_DatoFrase = iTexto($lsConfig->frase);
		$Config_DatoDireccion = iTexto($lsConfig->direccion);
		$Config_DatoTelefono = iTexto($lsConfig->telefono);
		$Config_DatoTelefono1 = iTexto($lsConfig->telefono1);
		$Config_DatoEmail = $emailp[0];
		$Config_DatoTwitter = iTexto($lsConfig->twitter);
		$Config_DatoYoutube = iTexto($lsConfig->youtube);
		$Config_DatoFacebook = iTexto($lsConfig->facebook);
		$Config_DatoGoogle = iTexto($lsConfig->igoogle);
		$Config_Url = iTexto($lsConfig->url);
	}
?>