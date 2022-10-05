<?php
    defined('_SSADMACCESO_') or die;
    include('Modulos/Cliente/Clases/ClsCliente.php');
    $ClsCliente =  new ClsCliente();
    $ListaPaises =  $ClsCliente->ListaPaises();
    $ListaDatos =  $ClsCliente->ObtenerCliente((int)$_GET['id']);
    // echo var_dump($ListaDatos);
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Cliente [Editar]</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-tooltip="Pantalla Completa" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" id="ClienteEditar" enctype="multipart/form-data" action="Modulos/Cliente/Formularios/Editar.php" method="post">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                    	<input type="hidden" name="tg-id" value="<?php echo $ListaDatos['id'];?>">
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-nombre" >Nombre:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-nombre" id="tag-nombre" type="text" value="<?php echo $ListaDatos['nombre'];?>" size="40">
                                <span class="help-block"> Escriba su nombre. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label"  for="tag-apellido">Apellidos:</label>
                            <div class="col-md-9">
                                <input class="form-control"  name="tag-apellido" id="tag-apellido" type="text" value="<?php echo $ListaDatos['apellidos'];?>" size="40">
                                <span class="help-block"> Escriba sus apellidos. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label"  for="tag-manzana">Manzana:</label>
                            <div class="col-md-9">
                                <input class="form-control"  name="tag-manzana" id="tag-manzana" type="text" value="<?php echo $ListaDatos['manzana'];?>" size="40">
                                <span class="help-block"> Ingrese la Manzana (Dirección). </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label"  for="tag-lote">Lote:</label>
                            <div class="col-md-9">
                                <input class="form-control"  name="tag-lote" id="tag-lote" type="text" value="<?php echo $ListaDatos['lote'];?>" size="40">
                                <span class="help-block"> Ingrese la Lote (Dirección). </span>
                            </div>
                        </div>
                        <input class="form-control" name="tag-razon" id="tag-razon" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-razon">Razon Social:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-razon" id="tag-razon" type="text" value="<?php //echo $ListaDatos['razon'];?>">
                                <span class="help-block"> Ingrese su Razón social. </span>
                            </div>
                        </div>-->
                        <input class="form-control" name="tag-direccion" id="tag-direccion" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-direccion">Dirección:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-direccion" id="tag-direccion" type="text" value="<?php //echo $ListaDatos['direccion'];?>">
                                <span class="help-block"> Ingrese su Dirección. </span>
                            </div>
                        </div>-->
                        <input class="form-control" name="tag-email" id="tag-email" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-email">Dirección de correo electrónico:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-email" id="tag-email" type="text" value="<?php //echo $ListaDatos['email'];?>" >
                                <span class="help-block"> Escriba su dirección de correo electrónico. </span>
                            </div>
                        </div>-->
                        <input class="form-control" name="tag-celular" id="tag-celular" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-celular">Celular/Teléfono:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-celular" id="tag-celular" type="text" value="<?php //echo $ListaDatos['celular'];?>" >
                                <span class="help-block"> Escriba su celular o Telefono. </span>
                            </div>
                        </div>-->
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" name="tag-pais" id="tag-pais" type="hidden" value="1">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-pais">Pais de Procedencia:</label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tag-pais" name="tag-pais" data-placeholder="Seleccione Pais">
                                    <option value=""> - </option>
                                    <?php //if($ListaPaises!=NULL): ?>
                                        <?php //foreach ($ListaPaises as $value): ?>
                                            <option value="<?php //echo $value['id'];?>" <?php //echo (int)$ListaDatos['idpais']==(int)$value['id']?'selected="selected"':'';?>><?php //echo ($value['nombre']);?></option>
                                        <?php //endforeach ?>
                                    <?php //endif; ?>
                                </select>
                            </div>
                        </div>-->
                        <input class="form-control" name="tag-ciudad" id="tag-ciudad" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-ciudad">Cuidad:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-ciudad" id="tag-ciudad" type="text" value="<?php //echo $ListaDatos['cuidad'];?>" >
                                <span class="help-block"> Escriba su cuidad. </span>
                            </div>
                        </div>-->
                        <!--<input class="form-control" name="tag-documento" id="tag-documento" type="hidden" value="-">-->
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-documento">Doc.Identidad:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-documento" id="tag-documento" type="text" value="<?php echo $ListaDatos['documento'];?>" >
                                <span class="help-block"> Escriba su documento de Identidad. </span>
                            </div>
                        </div>
                        <input class="form-control" name="tag-nota" id="tag-nota" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-nota">Nota:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-nota" id="tag-nota" type="text" value="<?php //echo $ListaDatos['nota'];?>" >
                                <span class="help-block"> Alguna Observación. </span>
                            </div>
                        </div>-->
                        <input class="form-control" name="tag-contrasena" id="tag-contrasena" type="hidden" value="-">
                        <!--<div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tag-contrasena">Crea una Contraseña:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="tag-contrasena" id="tag-contrasena" type="password"  value="<?php //echo $ListaDatos['contrasena'];?>" autocomplete="false">
                                <span class="help-block"> Escriba su contraseña. </span>
                                 <div class="progress password-meter" id="passwordMeter">
                                    <div class="progress-bar"></div>
                                </div>
                            </div>
                        </div>-->
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label"  for="tag-estado">Estado de Cliente:</label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tag-estado" name="tag-estado" data-placeholder="Seleccione estado del Cliente">
                                    <option value="1" <?php echo $ListaDatos['estado']==1?'selected="selected"':'';?>>Publicado</option>
                                    <option value="0" <?php echo $ListaDatos['estado']==0?'selected="selected"':'';?>>Despublicado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group form-field">
                            <center>
                                <input name="save" type="hidden" value="1"/>
                                <button type="submit" class="btn btn-circle green"><i class="fa fa-floppy-o" aria-hidden="true"></i> Editar</button>
                                <a type="button" id="" class="btn btn-circle red" href="cpanel.php?option=Cliente&amp;task=Listar"> Cancelar</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        Validacion.TClienteE();
    });
</script>
