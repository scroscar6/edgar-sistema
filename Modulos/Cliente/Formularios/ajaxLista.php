<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('America/Lima');
	include('../../../ClsConexion.php');
	include('../../../PDO.php');
	include('../../../includes/funciones.php');
	include('../../../includes/XSS.php');
	include('../../../Modulos/Cliente/Clases/ClsCliente.php');
	$ClsCliente = new ClsCliente();
	$GET_busqueda = isset($_GET['busqueda'])?(string)($_GET['busqueda']):(string)'';
	$GET_limite = isset($_GET['limite'])?(int)$_GET['limite']:'';
	$GET_ruta = isset($_GET['ruta'])?(string)$_GET['ruta']:'';
	isset($_SESSION['PAGINA_Cliente'])?$_SESSION['PAGINA_Cliente']:$_SESSION['PAGINA_Cliente']=0;
	($_SESSION['PAGINA_Cliente'] != 0)?$_SESSION['PAGINA_Cliente']:($_SESSION['PAGINA_Cliente'] = 0);
	$GET_p = isset($_GET['p'])?(int)($_GET['p']):$_SESSION['PAGINA_Cliente'];


    $PagNumber['inicio'] = 0;

	$total = $ClsCliente->ListarClienteTotal(trim($GET_busqueda));
	$PagNumber = paginar($GET_p,$total,$GET_limite);
    
    if ($GET_busqueda != '' || $PagNumber['pag'] = 0) {
        $PagNumber['numpag'] = $GET_limite;
        $PagNumber['pag'] = 0;
        $PagNumber['numpag'];
    }
	$datos = $ClsCliente->ListarCliente($PagNumber['numpag'],$PagNumber['inicio'],trim($GET_busqueda));
	$datos = CorrelativoObj($datos,$PagNumber['inicio'],'nro');
	$_SESSION['PAGINA_Cliente'] = $PagNumber['pag'];


	$vars = '';
	$vars .= $GET_busqueda==NULL?'':'busqueda='.$GET_busqueda.'&';
	$vars .= $GET_limite==NULL?'':'limite='.$GET_limite.'&';
	$vars .= $GET_ruta==NULL?'':'ruta='.$GET_ruta.'&';
	$vars .= $PagNumber['pag']==NULL?'':'p='.$PagNumber['pag'].'&';

	$ObjPDO = new ClsPDO();
	$paginacion= Paginacion($ObjPDO->URLBase(),$GET_p,$GET_ruta,$total,$GET_limite,$vars,$PagNumber['numpag']);
?>
<p class="amount">Registros <?php echo $PagNumber['inicio']+1;?> - <?php echo $PagNumber['fin'];?> de <?php echo $total;?> totales</p>
<div class="row" >
    <div class="col-md-12">
        <ul class="pagination pagination-sm">
            <?php echo $paginacion;?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="tabla_Cliente" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>N°</center></th>
                        <th><center>Nombre</center></th>
                        <th><center>Dirección</center></th>
                        <th><center>Fech.C</center></th>
                        <th><center>Opciones</center></th>
                    </tr>
                </thead>
                <tbody>
                     <?php foreach ($datos as $value): ?>
                            <tr>
                                <td><center><?php echo $value->nro;?></center></td>
                                <td><?php echo $value->nombres_completos;?></td>
                                <td><?php echo 'Mz '.$value->manzana.'  Lt '.$value->lote;?></td>
                                <td><?php echo $value->fc;?></td>
                                <td>
                                    <a type="button" class="btn btn-xs green verdatos_cliente"
                                    data-id="<?php echo $value->id;?>"
                                    data-nombre="<?php echo $value->nombres_completos;?>"
                                    >
                                    <i class="fa fa-search" aria-hidden="true"></i> Ver</a>
                                    <a type="button" class="btn btn-xs purple" href="cpanel.php?option=Cliente&amp;task=Editar&amp;id=<?php echo $value->id;?>"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                                    <a type="button" onclick="Eliminar('Modulos/Cliente/Formularios/Eliminar.php?Id=<?php echo $value->id;?>&amp;option=Cliente')" class="btn btn-xs red" onmouseover="Tip('Eliminar el registro &lt;br&gt; *Esto eliminar&aacute; el registro completamente, &lt;br&gt; y no se podr&aacute; recuperar posteriormente.')" onmouseout="UnTip()" style=" cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<p class="amount">Registros <?php echo $PagNumber['inicio']+1;?> - <?php echo $PagNumber['fin'];?> de <?php echo $total;?> totales</p>
<div class="row" >
    <div class="col-md-12">
        <ul class="pagination pagination-sm">
            <?php echo $paginacion;?>
        </ul>
    </div>
</div>
<script>
    Validacion.DetalleCliente();
</script>
