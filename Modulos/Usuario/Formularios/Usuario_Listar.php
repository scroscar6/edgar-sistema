<?php
defined('_SSADMACCESO_') or die;
$csUsuario = new ClsUsuario();
$csUsuarioTipo = new ClsUsuarioTipo();
$zArrayList = $csUsuario->ObtenerTodos();
include('includes/Paginador_Info.php');
include('includes/msg-form.php');
?>

<div class="row">
    <div class="col-md-12">
        <table id="rounded-corner" class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <div class="col-md-10">
                        <div class="icon"></div>Usuarios: <small>[ Listar ]</small>
                    </div>
                    <div class="col-md-2">
                         <a href="javascript:void(0);" onclick="javascript:Link('cpanel.php?option=Usuario&amp;task=Agregar');" class="btn btn-primary" ><strong>Nuevo Usuario </strong></a>
                    </div>
                </tr>
            </tbody>
        </table>
	</div>
</div>







<div class="row">
    <div class="col-md-12">
        <table id="rounded-corner"  class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre de usuario</th>
            <th>Nombre</th>
            <th>Último acceso</th>
            <th>Tipo</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if($zArrayList!=NULL){
        $i=1;
        while($inicio<$fin){
        $zlRegistro = $zArrayList[$inicio];

        if(false){

        }else{
    ?>
    <tr>
        <td><?php echo $inicio+1;?></td>
        <td><?php echo $zlRegistro->login;?></td>
        <td><?php echo utf8_encode($zlRegistro->nombre);?></td>
        <td><?php if($zlRegistro->ingreso==0){ echo "El usuario no ha iniciado una sesión.";}else{ $fecha = explode(" ",$zlRegistro->ingreso); echo fecha_letrasCompacto($fecha[0]).' - '.$fecha[1];}?></td>
        <td>
        <?php
            $csUsuarioTipo->id = $zlRegistro->idtipo;
            $lsUsuarioTipo = $csUsuarioTipo->ObtenerPorId();
            if($lsUsuarioTipo!=NULL){
                echo $lsUsuarioTipo->tipo;
            }
         ?>
        </td>
        <td>


            <div class="btn-group btn-group-xs btn-group-solid">
            <?php
              if($zlRegistro->estado==1){
                if($zlRegistro->id!=1){
            ?>
                <a type="button" class="btn green"  href="Modulos/<?php echo $GET_form?>/Formularios/Estado.php?Es=0&amp;Id=<?php echo $zlRegistro->id;?>&amp;option=<?php echo $GET_form?>&amp;p=<?php echo $pag?>" onmouseover="Tip('Deshabilitar')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-check" aria-hidden="true"></i></a>
                <?php }

                } else { ?>
                <a type="button" class="btn yellow"  href="Modulos/<?php echo $GET_form?>/Formularios/Estado.php?Es=1&amp;Id=<?php echo $zlRegistro->id;?>&amp;option=<?php echo $GET_form?>&amp;p=<?php echo $pag?>" onmouseover="Tip('Habilitar')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-times" aria-hidden="true"></i></a>
                <?php } ?>

                <a type="button" class="btn purple" href="<?php echo $main;?>?option=<?php echo $GET_form?>&amp;task=Editar&amp;id=<?php echo $zlRegistro->id;?>"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                <?php if($zlRegistro->id==1){?>
                <?php }else{ ?>
                <a type="button" onclick="Eliminar('Modulos/<?php echo $GET_form?>/Formularios/Eliminar.php?Id=<?php echo $zlRegistro->id;?>&amp;option=<?php echo $GET_form?>&amp;p=<?php echo $pag?>')" class="btn red" onmouseover="Tip('Eliminar el registro &lt;br&gt; *Esto eliminar&aacute; el registro completamente, &lt;br&gt; y no se podr&aacute; recuperar posteriormente.')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                <?php } ?>

            </div>
        </td>
    </tr>
    <?php
        }
            $inicio++;
            $i++;
        }
    }else{
    ?>
    <tr>
        <td colspan="6" align="center">0 Registros encontrados</td>
    </tr>
    <?php
    }
    ?>
    </tbody>
        <tfoot>
    <tr>
        <td colspan="6"><?php echo $NavPages;?></td>
    </tr>
    <tr>
        <td colspan="6">
            <table cellspacing="0" cellpadding="4" border="0" align="center">
                <tbody>
                <tr align="center">
                    <td><a type="button" class="btn green btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a></td>
                    <td>Publicado y es <u>Actual</u> |</td>
                    <td><a type="button" class="btn yellow btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    <td>No Publicado |</td>
                </tr>
                <tr>
                    <td align="center" colspan="10">Haz click sobre el icono para cambiar el estado.</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tfoot>
</table>
    </div>
</div>
