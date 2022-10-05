<?php
defined('_SSADMACCESO_') or die;
include('Modulos/Pagina/Clases/ClsPagina.php');
include('Modulos/Pagina/Clases/ClsPaginaCategoria.php');
$csPaginaCategoria = new ClsPaginaCategoria();
$lsPaginaCategoria = $csPaginaCategoria->ObtenerTodos();
$csPagina = new ClsPagina();
$GET_id = $GET_id;
$GET_mod = $GET_opc;
switch($GET_mod){
	case 'Editar':
    	if(ValidarId($GET_id)){
    		$csPagina->id = $GET_id;
    		$lsPagina = $csPagina->ObtenerPorId();
    		if($lsPagina==NULL){
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
        $csPagina->idpaginacategoria = $lsPagina->idpaginacategoria;
        $conteoP = $csPagina->ObtenerPorCategoria();
        $conteoP = count($conteoP)+1;
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Pagina: [ Editar ]</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-tooltip="Pantalla Completa" href="javascript:;"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" id="PaginaEditar" method="post" action="Modulos/Pagina/Formularios/Editar.php" enctype="multipart/form-data">
            <input name="cp_id" type="hidden" id="cp_id" value="<?php echo $lsPagina->id;?>" />
            <input name="cp_pagina" type="hidden" id="cp_pagina" value="<?php echo $lsPagina->pagina;?>" />
            <input name="cp_alias" type="hidden" id="cp_alias" value="<?php echo $lsPagina->alias;?>" />
            <input name="cp_estado" type="hidden" id="cp_estado" value="<?php echo $lsPagina->estado;?>" />
            <input name="cp_idcat" type="hidden" id="cp_idcat" value="<?php echo $lsPagina->idpaginacategoria;?>" />
            <div class="form-body">
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-8">
                        <div id="zTitulo" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="cp_titulo" >Título o Nombre:</label>
                            <div class="col-md-9">
                                <input class="form-control" name="cp_titulo" id="cp_titulo" type="text" size="75" value="<?php echo iTexto($lsPagina->titulo);?>">
                                <span class="help-block"> Título o nombre del video. </span>
                                <span class="textfieldRequiredMsg">Por favor, rellena este campo.</span>
                                <span class="textfieldMinCharsMsg">Escriba mínimo 6 caracteres.</span>
                                <span class="textfieldInvalidFormatMsg">Formato no válido.</span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="cp_alias">Alias:</label>
                            <div class="col-md-9">
                                <strong><?php echo $lsPagina->alias;?></strong>
                            </div>
                        </div>
                        <div  class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="cp_titulo">URL:</label>
                            <div class="col-md-9">
                            <strong><?php echo dameHOST();?><?php echo $URLBase;?>/pagina/<?php echo trim($lsPagina->paginaalias);?>/<?php echo trim($lsPagina->alias);?></strong>
                            </div>
                        </div>
                        <div id="zCategoria" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_categoria"> Categoría: </label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tg_categoria" name="cp_categoria" data-placeholder="Seleccione Categoría">
                                    <?php
                                    if($lsPaginaCategoria!=NULL){
                                        foreach($lsPaginaCategoria as $categ){
                                    ?>
                                        <option value="<?php echo $categ->id;?>" <?php echo $categ->id == $lsPagina->idpaginacategoria ? 'selected="selected"':'';?>><?php echo iTexto($categ->titulo);?></option>
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
                                <select class="form-control select2" id="tg_orden" name="cp_orden" data-placeholder="Seleccione...">
                                    <option value="0">0</option>
                                <?php for ($e=1; $e <= $conteoP; $e++):?>
                                    <option value="<?php echo $e; ?>" <?php echo $lsPagina->orden==$e?'selected="selected"':'';?>><?php echo $e; ?></option>
                                <?php endfor; ?>
                                </select>
                                <span class="help-block"> Establecer el Orden. </span>
                            </div>
                        </div>
                        <div id="zVistaF" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_vistaf"> Vista Completa: </label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tg_vistaf" name="cp_vistaf" data-placeholder="Seleccione...">
                                    <option value="1" <?php echo $lsPagina->opcion==1?'selected="selected"':'';?>>SI</option>
                                    <option value="0" <?php echo $lsPagina->opcion==0?'selected="selected"':'';?>>NO</option>
                                </select>
                                <span class="help-block"> Establecer si la vista sera completa. </span>
                            </div>
                        </div>
                        <div id="zEstado" class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="tg_estado"> Estado: </label>
                            <div class="col-md-9">
                                <select class="form-control select2" id="tg_estado" name="cp_estado" data-placeholder="Seleccione Estado">
                                    <option value="1" <?php echo $lsPagina->estado==1?'selected="selected"':'';?>>Activo</option>
                                    <option value="0" <?php echo $lsPagina->estado==0?'selected="selected"':'';?>>Inactivo</option>
                                </select>
                                <span class="help-block"> Define si se mostrará en el sitio. </span>
                            </div>
                        </div>
                        <div class="form-group form-field form-required">
                            <label class="col-md-3 control-label" for="cp_descripcion"> Contenido de la pagina: </label>
                            <div class="col-md-9">
                                <textarea cols="60" rows="5" class="ckeditor form-control" name="cp_descripcion" id="cp_descripcion"><?php echo ($lsPagina->descripcion);?></textarea>
                                <span class="help-block"> Aquí establezca una descripción completa de la página.  </span>
                            </div>
                        </div>
                        <div class="form-group form-field">
                            <label class="col-md-3 control-label" id="tag-modificado">Modificado:</label>
                            <div class="col-md-9">
                                <p><?php if($lsPagina->fecha==0){ echo "Fecha no definida.";}else{$fecha = explode(" ",$lsPagina->fecha); echo fecha_letrasCompacto($fecha[0]).' - '.$fecha[1];}?></p>
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
        Validacion.TPaginaE();
    });
</script>
<?php
	break;
	case 'Error':
?>
    <div class="errorbg">
        <div class="error404_top"><img src="images/error.png" alt=""></div>
        <div class="error404_text">
            <h1>Error <em>!</em></h1>
            <p>La p&aacute;gina solicitada no fue encontrada.</p>
        </div>
    </div>
<?php
	break;
}
?>