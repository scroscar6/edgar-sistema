<?php
defined('_SSADMACCESO_') or die;
$csConfig = new ClsConfig();
$GET_id = $GET_id;
$GET_mod = $GET_opc;
switch($GET_mod){
	case 'Editar':
	if(ValidarId($GET_id)){
		$csConfig->id = $GET_id;
		$lsConfig = $csConfig->ObtenerPorId();
		$emails = explode(',',$lsConfig->email);
		$email = $emails[0];
		$email1 = $emails[1];
		$email2 = $emails[2];
		if($lsConfig==NULL){
			$GET_mod='Error';
			$Error=2;
		}
	}else{
		$GET_mod='Error';
		$Error=3;
	}
	break;
}

switch($GET_mod){
	case 'Editar':
    ?>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Configuración [ Editar ]</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-tooltip="Pantalla Completa" href="javascript:;"> </a>
            </div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" id="ConfigEditar" method="post" action="Modulos/Config/Formularios/Editar.php" enctype="multipart/form-data">
                <input name="cp_id" type="hidden" id="tg_id" value="<?php echo $lsConfig->id;?>" />
                <div class="form-body">
                    <div class="tabbable-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_5_1" data-toggle="tab"> Datos principales </a>
                            </li>
                            <li>
                                <a href="#tab_5_2" data-toggle="tab"> Información del sitio </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_5_1">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="zEmail" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_email" >Correo Principal:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_email" id="cp_email" type="text" value="<?php echo trim($email);?>" size="25">
                                                <span class="help-block"> E-mail principal. </span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">E-mail inválido.</span>
                                            </div>
                                        </div>
                                        <div id="zEmail1" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_email1" >Correo Secundario I:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_email1" id="cp_email1" type="text" value="<?php echo trim($email1);?>" size="25">
                                                <span class="help-block"> E-mail secundaio 1. </span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">E-mail inválido.</span>
                                            </div>
                                        </div>
                                        <div id="zEmail2" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_email2" >Correo Secundario II:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_email2" id="cp_email2" type="text" value="<?php echo trim($email2);?>" size="25">
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">E-mail inválido.</span>
                                                <span class="help-block"> E-mail secundaio 2. </span>
                                                <span class="help-block"><i>El e-mail principal y los secundarios recibirán los mensajes de los usuarios visitantes que escribirán mediante el formulario de contacto del sitio web.</i></span>
                                                <span class="help-block"><i> Si no tiene e-mails secundarios, sólo dejar el campo vacío. </i></span>
                                            </div>
                                        </div>
                                        <div id="zDirec" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_direc" >Dirección:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_direc" id="cp_direc" type="text" value="<?php echo iTexto($lsConfig->direccion);?>" size="100">
                                                <span class="help-block"> Dirección o lugar de la oficina - Si no tiene dirección solo llene con un guión "-". </span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                        <div id="zTelef" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_telef" >Teléfono 1:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_telef" id="cp_telef" type="text" value="<?php echo iTexto($lsConfig->telefono);?>" size="100">
                                                <span class="help-block"> Dirección o lugar de la oficina - Si no tiene dirección solo llene con un guión "-". </span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                        <div id="zUrlfb" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_urlfb" >URL Facebook:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_urlfb" id="cp_urlfb" type="text" value="<?php echo iTexto($lsConfig->facebook);?>" size="100">
                                                <span class="help-block">Ejemplo: <strong>http://www.facebook.com/username</strong></span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 1 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                        <div id="zUrltw" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_urltw" >URL Twitter:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_urltw" id="cp_urltw" type="text" value="<?php echo iTexto($lsConfig->twitter);?>" size="100">
                                                <span class="help-block">Ejemplo: <strong>http://www.twitter.com/username</strong></span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 1 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                        <div id="zUrlyt" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_urlyt" >URL Youtube:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_urlyt" id="cp_urlyt" type="text" value="<?php echo iTexto($lsConfig->youtube);?>" size="100">
                                                <span class="help-block">Ejemplo: <strong>http://www.youtube.com/user/username</strong></span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 1 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                        <div id="zUrligo" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_urligo" >URL Google+:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_urligo" id="cp_urligo" type="text" value="<?php echo iTexto($lsConfig->igoogle);?>" size="100">
                                                <span class="help-block">Ejemplo: <strong>http://www.google.com/+username</strong></span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 1 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_5_2">
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="zTitulo" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_titulo" >Titulo de la Web:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_titulo" id="cp_titulo" type="text" value="<?php echo iTexto($lsConfig->titulo);?>" size="100">
                                                <span class="help-block"> El título de la web  es como aparecerá en su sitio. </span>
                                                <span class="help-block"> El título de la web es útil para google en la posición web. <strong>Nota</strong>: No modificar si no está seguro!. </span>
                                            </div>
                                        </div>
                                        <div id="zTituloext" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_tituloext" >Título extendido:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_tituloext" id="cp_tituloext" type="text" value="<?php echo iTexto($lsConfig->tituloext);?>" size="100">
                                                <span class="help-block"> El título extendido de la web. </span>
                                                <span class="help-block"> El título extendido de la web es útil para google en la posición web. <strong>Nota</strong>: No modificar si no está seguro!. </span>
                                            </div>
                                        </div>
                                        <div id="zMetadesc" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label"  for="cp_metadesc">Breve descripción:</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="cp_metadesc" cols="100" rows="3" id="cp_metadesc"><?php echo iTexto($lsConfig->metadesc);?></textarea>
                                                <span class="help-block"> Pequeña descripción que el sitio web está presentando. </span>
                                                <span class="help-block"> Ésta descripción es útil para google en la posición web. <strong>Nota</strong>: No modificar si no está seguro!. </span>
                                                <span class="textareaRequiredMsg">Por favor, introduzca caracteres.</span>
                                                <span class="textareaMinCharsMsg">Por favor, introduzca al menos 10 caracteres.</span>
                                                <span class=""><span id="Countvalidta1">&nbsp;</span> caracteres</span>
                                            </div>
                                        </div>
                                        <div id="zMetakeys" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label"  for="cp_metakeys">Meta Keys:</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="cp_metakeys" cols="100" rows="3" id="cp_metakeys"><?php echo iTexto($lsConfig->metakeys);?></textarea>
                                                <span class="help-block"> Palabras claves. </span>
                                                <span class="help-block"> LLene las palabras claves separadas por ","(comas). <strong>Nota</strong>: No modificar si no está seguro!. </span>
                                                <span class="textareaRequiredMsg">Por favor, introduzca caracteres.</span>
                                                <span class="textareaMinCharsMsg">Por favor, introduzca al menos 10 caracteres.</span>
                                                <span class=""><span id="Countvalidta2">&nbsp;</span> caracteres</span>
                                            </div>
                                        </div>

                                        <div id="zFrase" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_frase" >Frase del Año:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_frase" id="cp_frase" type="text" value="<?php echo iTexto($lsConfig->frase);?>" size="100" maxlength="120">
                                                <span class="help-block"> Frase del sitio web aparecerá en su sitio. </span>
                                                <span class="help-block"> max. 120 caract&eacute;res </span>
                                            </div>
                                        </div>
                                        <div id="zUrl" class="form-group form-field form-required">
                                            <label class="col-md-3 control-label" for="cp_url" >Frase del Año:</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="cp_url" id="cp_url" type="text" value="<?php echo iTexto($lsConfig->url);?>" size="100" maxlength="120">
                                                <span class="help-block"> La URL del sitio web se utilizará en unos campos internos. </span>
                                                <span class="help-block"> <strong>Nota</strong>: No modificar si no está seguro!. </span>
                                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                                <span class="textfieldMinCharsMsg">Escriba mínimo 10 caracteres.</span>
                                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-field">
                            <center>
                                <input name="save" type="hidden" value="1"/>
                                <button type="submit" class="btn btn-circle green"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            Validacion.TConfigE();
        });
    </script>
    <?php
    break;
    case 'Error':
    ?>
    <div class="errorbg">
        <div class="error404_top"><img src="images/error.png"></div>
        <div class="error404_text">
            <h1>Error <em>!</em></h1>
            <p>La p&aacute;gina solicitada no fue encontrada.</p>
        </div>
    </div>
    <?php
    break;
}
?>