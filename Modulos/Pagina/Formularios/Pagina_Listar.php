<?php
defined('_SSADMACCESO_') or die;
include('Modulos/Pagina/Clases/ClsPagina.php');
include('Modulos/Pagina/Clases/ClsPaginaCategoria.php');
$csPagina = new ClsPagina();
$csPaginaCategoria = new ClsPaginaCategoria();
$lsPaginaCategoria = $csPaginaCategoria->ObtenerTodos();
$GET_cat = $GET_cat;
if(!ValidarId($GET_cat)){
	$GET_cat = $csPaginaCategoria->ObtenerIdCategoriaMin();
	if($GET_cat==''){
		$GET_cat = 0;
	}
	$csPagina->idpaginacategoria = $GET_cat;
	$zArrayList = $csPagina->ObtenerPorCategoria();
}else{
	if(ValidarId($GET_cat)){
		$csPagina->idpaginacategoria = $GET_cat;
		$zArrayList = $csPagina->ObtenerPorCategoria();
	}else{
		$csPagina->idpaginacategoria = 0;
		$zArrayList = $csPagina->ObtenerPorCategoria();
	}
}
include('includes/Paginador_Info.php');
include('includes/msg-form.php');
?>
<div class="row">
	<div class="col-md-12">
		<table id="rounded-corner" class="table table-striped table-bordered table-hover">
			<tbody>
				<tr>
					<div class="col-md-4">
						<form id="cat" name="cat" method="get" action="cpanel.php" >
						<label>Filtro  Categoría</label>
							<input name="option" type="hidden" id="option" value="<?php echo $GET_form?>" />
							<input name="task" type="hidden" id="task" value="<?php echo $GET_opc;?>" />
							<select id="sel-cat" name="cat" onchange="document.cat.submit();" class="inputbox select2">
								<?php
								 	if($lsPaginaCategoria!=NULL){
					                	foreach($lsPaginaCategoria as $categ){
					                    if($categ->id == $GET_cat){
					                ?>
					                    <option value="<?php echo $categ->id;?>"  selected="selected"><?php echo iTexto($categ->titulo);?> (<?php echo $categ->total;?>)</option>
					                <?php } else{ ?>
					                    <option value="<?php echo $categ->id;?>" ><?php echo iTexto($categ->titulo);?> (<?php echo $categ->total;?>)</option>
					                <?php
										}
										}
									}
					            ?>
							</select>
						</form>
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
					<a style="display: none;" href="javascript:void(0);" onclick="javascript:Link('cpanel.php?option=Pagina&amp;task=Agregar');" class="btn btn-primary" style="float: right;margin-top: 10px;"><strong> Nueva página </strong></a>
					</div>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<div class="table-responsive">
<table id="rounded-corner" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
	        <th>#</th>
	        <th>Titulo</th>
	        <th>Orden</th>
	        <th>Modificado</th>
	        <th>Opciones</th>
		</tr>
	</thead>
    <tfoot>
	<tr>
		<td colspan="5" align="left"><?php echo $NavPages;?></td>
	</tr>
	<tr>
		<td colspan="5">
            <table cellspacing="0" cellpadding="4" border="0" align="center">
            <tbody>
            <tr align="center">
                <td><img width="16" height="16" border="0" alt="Visible." src="images/publish_g.png" /> </td>
                <td> Publicado y es <u>Actual</u> |</td>
                <td> <img width="16" height="16" border="0" alt="Finalizado" src="images/publish_x.png" /></td>
                <td>No Publicado | </td>
            </tr>
            <tr>
                <td align="center" colspan="10">Haz click sobre el icono para cambiar el estado.</td>
            </tr>
            </tbody>
            </table>
		</td>
	</tr>
	</tfoot>
	<tbody>
	<?php
	if($zArrayList!=NULL){
		$i=1;
		while($inicio<$fin){
		$zlRegistro = $zArrayList[$inicio];
	?>
	<tr>
		<td><?php echo $inicio+1;?></td>
		<td><?php echo ($zlRegistro->titulo);?></td>
		<td><strong><?php  echo $zlRegistro->orden;?></strong></td>
		<td><strong><?php  echo cambiaf_a_normal($zlRegistro->fecha);?></strong></td>
		<td>
			<?php if($zlRegistro->estado==1): ?>
				<a type="button" class="btn btn-xs green" href="Modulos/<?php echo $GET_form?>/Formularios/Estado.php?Es=0&amp;Id=<?php echo $zlRegistro->id;?>&amp;option=<?php echo $GET_form?>&amp;p=<?php echo $pag?>" onmouseover="Tip('Deshabilitar')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-check" aria-hidden="true"></i></a>
			<?php else: ?>
				<a type="button" class="btn btn-xs yellow" href="Modulos/<?php echo $GET_form?>/Formularios/Estado.php?Es=1&amp;Id=<?php echo $zlRegistro->id;?>&amp;option=<?php echo $GET_form?>&amp;p=<?php echo $pag?>" onmouseover="Tip('Habilitar')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-times" aria-hidden="true"></i></a>
			<?php endif; ?>
			<a type="button"  onmouseover="Tip('Editar Registro')"  class="btn btn-xs purple" href="<?php echo $main;?>?option=<?php echo $GET_form?>&amp;task=Editar&amp;id=<?php echo $zlRegistro->id;?>"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
			<a type="button" onclick="Eliminar('Modulos/<?php echo $GET_form?>/Formularios/Eliminar.php?Id=<?php echo $zlRegistro->id;?>&amp;option=<?php echo $GET_form?>&amp;p=<?php echo $pag?>')" class="btn btn-xs red" onmouseover="Tip('Eliminar el registro &lt;br&gt; *Esto eliminar&aacute; el registro completamente, &lt;br&gt; y no se podr&aacute; recuperar posteriormente.')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>

		</td>
	</tr>
	<?php
			$inicio++;
			$i++;
		}
	}else{
	?>
	<tr>
		<td colspan="5" align="center">0 Registros encontrados</td>
	</tr>
	<?php
		}
	?>
	</tbody>
</table>
<div class="clear"></div>
</div>