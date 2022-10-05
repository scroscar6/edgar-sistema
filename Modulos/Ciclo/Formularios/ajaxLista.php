<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('America/Lima');
	include('../../../ClsConexion.php');
	include('../../../PDO.php');
	include('../../../includes/funciones.php');
	include('../../../includes/XSS.php');
	include('../../../Modulos/Ciclo/Clases/ClsCiclo.php');
	$ClsCiclo = new ClsCiclo();
	$GET_busqueda = isset($_GET['busqueda'])?(string)($_GET['busqueda']):(string)'';
	$GET_limite = isset($_GET['limite'])?(int)$_GET['limite']:'';
	$GET_ruta = isset($_GET['ruta'])?(string)$_GET['ruta']:'';
	isset($_SESSION['PAGINA_Ciclo'])?$_SESSION['PAGINA_Ciclo']:$_SESSION['PAGINA_Ciclo']=0;
	($_SESSION['PAGINA_Ciclo'] != 0)?$_SESSION['PAGINA_Ciclo']:($_SESSION['PAGINA_Ciclo'] = 0);
	$GET_p = isset($_GET['p'])?(int)($_GET['p']):$_SESSION['PAGINA_Ciclo'];


    $PagNumber['inicio'] = 0;

	$total = $ClsCiclo->ListarCicloTotal(trim($GET_busqueda));
	$PagNumber = paginar($GET_p,$total,$GET_limite);

    if ($GET_busqueda != '' || $PagNumber['pag'] = 0) {
        $PagNumber['numpag'] = $GET_limite;
        $PagNumber['pag'] = 0;
        $PagNumber['numpag'];
    }
	$datos = $ClsCiclo->ListarCiclo($PagNumber['numpag'],$PagNumber['inicio'],trim($GET_busqueda));
	$datos = CorrelativoObj($datos,$PagNumber['inicio'],'nro');
	$_SESSION['PAGINA_Ciclo'] = $PagNumber['pag'];


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
            <table id="tabla_Ciclo" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center><b>N°</b></center></th>
                        <th><center><b>MES DE LECTURA</b></center></th>
                        <th><center><b>AÑO</b></center></th>
                        <th><center><b>COBRO / VENC</b></center></th>
                        <th><center><b>VARIABLES</BR>INICIALIZADAS</b></center></th>
                        <th></th>
                        <th><center><b>FECHA CREACIÓN</b></center></th>
                        <th><center><b>OPCIONES</b></center></th>
                    </tr>
                </thead>
                <tbody>
                     <?php foreach ($datos as $value): ?>
                            <tr>
                                <td><center><span style="font-size: 15px;color:#155083;font-weight: bold;"><?php echo $value->nro;?></span></center></td>
                                <td><center><span style="font-size: 16px;color:#133F65;font-weight: bold;"><?php echo $value->mes_texto;?></span></center></td>
                                <td><center><span style="font-size: 16px;color:#990B0B;font-weight: bold;"><?php echo $value->anio;?></span></center></td>
                                <td><center><span style="font-size: 16px;color:#664287;font-weight: bold;"><?php echo $value->rango_cobro_text;?></span></center></td>
                                <td><center><span style="font-size: 16px;color:#4E4E4E;font-weight: bold;"><?php echo $value->asig_variables;?></span></center></td>
                                <td>
                                <center>
                                <?php if ($value->asig_variables == 'VARIABLES ASIGNADAS'): ?>
                                    <a type="button" class="btn btn-xs dark btn_ver_variables" data-id="<?php echo $value->id_ciclo;?>"
                                    data-nombre="<?php echo $value->mes_texto.' '.$value->anio;?>"
                                    ><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
                                <?php else: ?>
                                    <a type="button" class="btn btn-xs dark btn_asignar_variables" data-id="<?php echo $value->id_ciclo;?>"
                                    data-nombre="<?php echo $value->mes_texto.' '.$value->anio;?>"
                                    ><i class="fa fa-list-ol" aria-hidden="true"></i> Asignar</a>
                                <?php endif ?>
                              
                                    </center>
                                    </td>
                                <td><center><span style="font-size: 16px;color:#E46119;"><i><?php echo $value->fecha_cre_tex;?></i></span></center></td>
                                <td>
                                    <a type="button" class="btn btn-xs red eliminar_ciclo" data-id="<?php echo $value->id_ciclo;?>" data-mes="<?php echo $value->mes_texto;?>" data-anio="<?php echo $value->anio;?>" style=" cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
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
   Validacion.EliminarCiclo();
   Validacion.AsignarVariables();
   Validacion.VerVariables();
</script>
