<?php
defined('_SSADMACCESO_') or die;
switch($tipo){
	case 1:
$GET_id = $GET_id;
$GET_mod = $GET_opc;
$csUsuario =  new ClsUsuario();
$csUsuarioTipo =  new ClsUsuarioTipo();
$csUsuarioModo =  new ClsUsuarioModo();
$lsUsuarioTipo = $csUsuarioTipo->ObtenerTodos();
$lsUsuarioModo = $csUsuarioModo->ObtenerTodos();
switch($GET_mod){
	case 'Editar':
	if (ValidarId($GET_id)){
		$csUsuario->id = $GET_id;
		$lsUsuario = $csUsuario->ObtenerPorId();
		if($lsUsuario==NULL){
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
            <span class="caption-subject font-dark sbold uppercase">Usuarios [ Editar ]</span>
        </div>
        <div class="actions">
           <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-tooltip="Pantalla Completa" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" id="UsuarioEditar" name="UsuarioEditar" enctype="multipart/form-data" action="Modulos/Usuario/Formularios/Editar.php" method="post">
            <input name="tag-id" type="hidden" id="tag-id" value="<?php echo $lsUsuario->id;?>" />
            <div class="form-body">
                <div class="tabbable-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_5_1" data-toggle="tab"> Datos de Usuario </a>
                        </li>
                        <li>
                            <a href="#tab_5_2" data-toggle="tab"> Cambiar Contraseña </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_5_1">
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-nombre" >Nombre:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="tag-nombre" id="tag-nombre" type="text" value="<?php echo utf8_encode($lsUsuario->nombre);?>" size="40">
                                            <span class="help-block"> Escriba su nombre. </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label"  for="tag-apellido">Apellidos:</label>
                                        <div class="col-md-9">
                                            <input class="form-control"  name="tag-apellido" id="tag-apellido" type="text" value="<?php echo utf8_encode($lsUsuario->apellido);?>" size="40">
                                            <span class="help-block"> Escriba sus apellidos. </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-usuario">Nombre de Usuario:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="tag-usuario" id="tag-usuario" type="text" value="<?php echo $lsUsuario->login;?>" size="30" readonly>
                                            <input name="tag-usuario1" id="tag-usuario1" type="hidden" value="<?php echo $lsUsuario->login;?>" size="30" />
                                            <span class="help-block"> Escriba su nombre de usuario. </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-email">Dirección de correo electrónico:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="tag-email" id="tag-email" type="text" value="<?php echo $lsUsuario->email;?>" size="45">
                                            <input name="tag-email1" id="tag-email1" type="hidden" value="<?php echo $lsUsuario->email;?>" size="45" />
                                            <span class="help-block"> Escriba su dirección de correo electrónico. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-tipo">Nivel de usuario:</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="tag-tipo" value="<?php echo $lsUsuario->idtipo;?>" />
                                            <select class="form-control select2" id="tag-tipo" name="tag-tipo1" >
                                                 <?php
                                                    if($lsUsuarioTipo != NULL){
                                                        foreach($lsUsuarioTipo as $categ){
                                                        if($categ->id == $lsUsuario->idtipo){
                                                    ?>
                                                        <option value="<?php echo $categ->id;?>"  selected="selected"><?php echo iTexto($categ->tipo);?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $categ->id;?>" ><?php echo iTexto($categ->tipo);?></option>
                                                    <?php
                                                        }
                                                        }
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label"  for="tag-estado">Estado de usuario:</label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="tag-estado" value="<?php echo $lsUsuario->estado;?>" />
                                            <select class="form-control select2"  id="tag-estado" name="tag-estado1" >
                                                <?php
                                                if($lsUsuario->estado == 1){
                                                ?>
                                                <option value="1" selected="selected">Activado</option>
                                                <option value="0">Desactivado</option>
                                                <?php
                                                }else{
                                                ?>
                                                <option value="1">Activado</option>
                                                <option value="0" selected="selected">Desactivado</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <label id="tag-fecharegistro">Fecha de registro:</label>
                                            <p><?php if($lsUsuario->registro==0){ echo "Fecha no definida.";}else{$fecha = explode(" ",$lsUsuario->registro); echo fecha_letrasCompacto($fecha[0]).' - '.$fecha[1];}?></p>
                                            <label id="tag-ultimoacceso">Fecha del último acceso:</label>
                                            <p><?php if($lsUsuario->ingreso==0){ echo "El usuario no ha iniciado una sesión.";}else{$fecha = explode(" ",$lsUsuario->ingreso); echo fecha_letrasCompacto($fecha[0]).' - '.$fecha[1];}?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_5_2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-contrasena">Contraseña actual:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="tag-contrasena" id="tag-contrasena" type="password" value="" size="30">
                                            <span class="help-block"> Escriba su contraseña actual. </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-contranueva">Nueva contraseña:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="tag-contranueva" id="tag-contranueva" type="password" value="" size="30">
                                            <span class="help-block"> Escriba su nueva contraseña. </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label" for="tag-contranueva1">Verificar nueva contraseña:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="tag-contranueva1" id="tag-contranueva1" type="password" value="" size="30" >
                                            <span class="help-block"> Escriba para confirmar contraseña. </span>
                                        </div>
                                    </div>
                                    <div class="form-group form-field form-required">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <div class="password-meter">
                                                <div class="password-meter-message"> </div>
                                                <div class="password-meter-bg">
                                                    <div class="password-meter-bar"></div>
                                                </div>
                                            </div>
                                            <span class="help-block"> Nivel de contraseña </span>
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
                                <a type="button" id="" class="btn btn-circle red" href="cpanel.php?option=Usuario&amp;task=Listar"> Cancelar</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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
	}
break;
}
?>