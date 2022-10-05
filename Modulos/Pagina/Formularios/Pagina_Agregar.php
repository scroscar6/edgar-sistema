<?php defined('_SSADMACCESO_') or die;
include('Modulos/Pagina/Clases/ClsPaginaCategoria.php');
$csPaginaCategoria = new ClsPaginaCategoria();
$lsPaginaCategoria = $csPaginaCategoria->ObtenerTodos();
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Pagina: [ Nuevo ]</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-tooltip="Pantalla Completa" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" id="PaginaAgregar" method="post" action="Modulos/Pagina/Formularios/Agregar.php" enctype="multipart/form-data">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-8">
                        <div id="zTitulo" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="cp_titulo" >Título o Nombre:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="cp_titulo" id="cp_titulo" type="text" size="75">
                                <span class="help-block"> Título o nombre de la Pagina. </span>
                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                            </div>
                        </div>
                        <div id="zCategoria" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_categoria"> Categoría: </label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tg_categoria" name="cp_categoria" data-placeholder="Seleccione Categoría">
                                    <option value="">::: Seleccione :::</option>
                                    <?php
                                    if($lsPaginaCategoria!=NULL){
                                        foreach($lsPaginaCategoria as $categ){
                                    ?>
                                        <option value="<?php echo $categ->id;?>"><?php echo iTexto($categ->titulo);?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span class="help-block"> Establecer la categoría. </span>
                            </div>
                        </div>
                        <div id="zOrden" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_orden"> Orden: </label>
                            <div class="col-md-9">
                                 <input class="form-control" name="cp_orden" id="tg_orden"  data-placeholder="Seleccione..." type="text" size="75">
                                <span class="help-block"> Establecer el n° de Orden. </span>
                            </div>
                        </div>
                        <div id="zVistaF" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_vistaf"> Vista Completa: </label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="cp_vistaf" data-placeholder="Seleccione...">
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <span class="help-block"> Establecer si la Vista de la Pagina sera Completa. </span>
                            </div>
                        </div>
                        <div id="zEstado" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_estado"> Estado: </label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tg_estado" name="cp_estado" data-placeholder="Seleccione Estado">
                                    <option value="1">Publicado</option>
                                    <option value="0">Despublicado</option>
                                </select>
                                <span class="help-block"> Define si se mostrará en el sitio. </span>
                                <span class="selectRequiredMsg">Selecciona una opción.</span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_estado"> Contenido de la pagina: </label>
                            <div class="col-md-9">
                                <textarea cols="60" rows="5" class="ckeditor form-control" name="cp_descripcion" id="tg_descripcion"></textarea>
                                <span class="help-block"> Aquí establezca una descripción completa de la página.  </span>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-field">
                            <center>
                                <input name="save" type="hidden" value="1"/>
                                <button type="submit" class="btn btn-circle green"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                                <a type="button" class="btn btn-circle red" href="cpanel.php?option=Pagina&amp;task=Listar"> Cancelar</a>
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
        Validacion.TPaginaG();
    });
</script>