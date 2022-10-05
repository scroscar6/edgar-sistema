<?php
defined('_SSADMACCESO_') or die;
$csUsuarioTipo =  new ClsUsuarioTipo();
$lsUsuarioTipo =  $csUsuarioTipo->ObtenerTodos();
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Usuarios [Nuevo]</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-tooltip="Pantalla Completa" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" id="UsuarioAgregar" enctype="multipart/form-data" action="Modulos/Usuario/Formularios/Agregar.php" method="post">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-nombre" >Nombre:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-nombre" id="tag-nombre" type="text" value="" size="40">
                                <span class="help-block"> Escriba su nombre. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label"  for="tag-apellido">Apellidos:</label>
                            <div class="col-md-9">
                                <input class="form-control"  name="tag-apellido" id="tag-apellido" type="text" value="" size="40">
                                <span class="help-block"> Escriba sus apellidos. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-usuario">Nombre de Usuario:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-usuario" id="tag-usuario" type="text" value="" size="30">
                                <span class="help-block"> Escriba su nombre de usuario. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-email">Dirección de correo electrónico:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-email" id="tag-email" type="text" value="" size="45">
                                <span class="help-block"> Escriba su dirección de correo electrónico. </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-tipo">Nivel de usuario:</label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tag-tipo" name="tag-tipo" data-placeholder="Seleccione Nivel de Usuario">
                                    <option value=""> - </option>
                                    <?php if($lsUsuarioTipo!=NULL): ?>
                                        <?php foreach ($lsUsuarioTipo as $categ): ?>
                                            <option value="<?php echo $categ->id;?>"><?php echo utf8_encode($categ->tipo);?></option>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-contrasena">Crea una Contraseña:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-contrasena" id="tag-contrasena" type="password"  value="" size="30">
                                <span class="help-block"> Escriba su contraseña. </span>
                                 <div class="progress password-meter" id="passwordMeter">
                                    <div class="progress-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-contrasena1">Confirma tu Contraseña:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-contrasena1" id="tag-contrasena1" type="password" value="" size="30">
                                <span class="help-block"> Escriba para confirmar contraseña. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label"  for="tag-estado">Estado de usuario:</label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tag-estado" name="tag-estado" data-placeholder="Seleccione estado del Usuario">
                                    <option value=""> - </option>
                                    <option value="1">Activado</option>
                                    <option value="0">Desactivado</option>
                                </select>
                            </div>
                        </div>
                    </div>
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