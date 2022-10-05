<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('America/Lima');
	include('../../../ClsConexion.php');
	include('../../../PDO.php');
	include('../../../includes/funciones.php');
	include('../../../includes/XSS.php');
	include('../../../Modulos/Recibo/Clases/ClsRecibo.php');
	include('../../../Modulos/Ciclo/Clases/ClsCiclo.php');
	$ClsRecibo = new ClsRecibo();
	$ClsCiclo = new ClsCiclo();
	$GET_busqueda = isset($_GET['busqueda'])?iTexto(LimpiarXSS($_GET['busqueda'])):(string)'';
	$GET_limite = isset($_GET['limite'])?(int)$_GET['limite']:'';
	$GET_categoria = isset($_GET['categoria'])?(int)$_GET['categoria']:'';
	$GET_ruta = isset($_GET['ruta'])?(string)$_GET['ruta']:'';
	isset($_SESSION['PAGINA_Recibo'])?$_SESSION['PAGINA_Recibo']:$_SESSION['PAGINA_Recibo']=0;
	($_SESSION['PAGINA_Recibo'] != 0)?$_SESSION['PAGINA_Recibo']:($_SESSION['PAGINA_Recibo'] = 0);
	$GET_p = isset($_GET['p'])?(int)($_GET['p']):$_SESSION['PAGINA_Recibo'];


    $PagNumber['inicio'] = 0;

	$total = $ClsRecibo->ListarReciboTotal((string)trim($GET_busqueda),(int)($GET_categoria));
	$total_A = $ClsRecibo->ListarReciboTotal_A((int)($GET_categoria));
	$PagNumber = paginar($GET_p,$total,$GET_limite);

    if ($GET_busqueda != '' || $PagNumber['pag'] = 0) {
        $PagNumber['numpag'] = $GET_limite;
        $PagNumber['pag'] = 0;
        $PagNumber['numpag'];
    }
	$datos = $ClsRecibo->ListarRecibo($PagNumber['numpag'],$PagNumber['inicio'],(string)trim($GET_busqueda),(int)($GET_categoria));

//echo var_dump($datos);

	$datos = CorrelativoObj($datos,$PagNumber['inicio'],'nro');
	$_SESSION['PAGINA_Recibo'] = $PagNumber['pag'];


	$vars = '';
	$vars .= $GET_busqueda==NULL?'':'busqueda='.$GET_busqueda.'&';
	$vars .= $GET_limite==NULL?'':'limite='.$GET_limite.'&';
	$vars .= $GET_categoria==NULL?'':'categoria='.$GET_categoria.'&';
	$vars .= $GET_ruta==NULL?'':'ruta='.$GET_ruta.'&';
	$vars .= $PagNumber['pag']==NULL?'':'p='.$PagNumber['pag'].'&';

	$ObjPDO = new ClsPDO();
	$paginacion= Paginacion($ObjPDO->URLBase(),$GET_p,$GET_ruta,$total,$GET_limite,$vars,$PagNumber['numpag']);

	$datosCiclo = $ClsCiclo->VerVariables($GET_categoria);
	$datosTotalesRecibo = $ClsRecibo->TotalesCiclo($GET_categoria);
	$verificar_estado_2 = $ClsRecibo->ConsultaVerificadosTodos($GET_categoria);
	//echo var_dump($verificar_estado_2);
?>
	<div class="row">
		<div class="col-md-12">
			<center>
				<h3><?php echo $datosCiclo['mes_texto'].' '.$datosCiclo['anio'];?></h3>
			</center>
		</div>
	</div>
<br>
<table class="table table-bordered table-striped">
    <tbody>
    	<tr>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Tarifa </td>
	        <td> <?php echo $datosCiclo['tarifa'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Acometida </td>
	        <td> <?php echo $datosCiclo['acometida'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Medidor </td>
	        <td> <?php echo $datosCiclo['medidor'];?> </td>
	    </tr>
	    <tr>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Sistema </td>
	        <td> <?php echo $datosCiclo['sistema'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Electronico </td>
	        <td> <?php echo $datosCiclo['electronico'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Costo kWh </td>
	        <td> <?php echo $datosCiclo['costo_kwh'];?> </td>
	    </tr>
	    <tr>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Alumbrado Publico </td>
	        <td> <?php echo $datosCiclo['alumbrado_p'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Cargo Fijo </td>
	        <td> <?php echo $datosCiclo['cargo_fijo'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Mantenimiento </td>
	        <td> <?php echo $datosCiclo['mantenimiento'];?> </td>
	    </tr>
	    <tr>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> IGV </td>
	        <td> <?php echo $datosCiclo['igv_por'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Derecho por Recibo </td>
	        <td> <?php echo $datosCiclo['derecho_r'];?> </td>
	        <td style="background-color: #2d2d2d !important;color:#ffffff;border: 0px solid #2d2d2d;"> Interes Compensatorio </td>
	        <td> <?php echo $datosCiclo['interes_c'];?> </td>
	    </tr>
	</tbody>
</table>



<?php if ($total_A != 0): ?>
	<span class="amount">Registros <?php echo $PagNumber['inicio']+1;?> - <?php echo $PagNumber['fin'];?> de <?php echo $total;?> totales</span>
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
	            <table id="tabla_Recibo" class="table table-striped table-bordered table-hover">
	                <thead>
	                    <tr style="background-color: #75458f !important;color:#ffffff;border: 2px solid #743596;">
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>N°</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>NOMBRE</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>DIRECCION</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>LEC_ACTUAL (kWh)</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>LEC_ANTERIOR (kWh)</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>C.FACTURADO (kWh)</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>ENERGIA</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>SUBTOTAL</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>IGV</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>R.M.ACTUAL</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>D.RECIBO</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>R.M.ANTERIOR</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>D.ANTERIOR</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b>TOTAL</b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b></b></center></th>
	                        <th style="border-right: 1px solid #743596;font-size: 12px;"><center><b></b></center></th>
	                    </tr>
	                </thead>
	                <tbody>
	             <tr>
	                <td style="background-color: #75458f !important;color:#ffffff;border: 2px solid #743596;">
						<center>
						<span style="color:#ffffff;font-size: 15px;"><i class="fa fa-bullseye" aria-hidden="true"></i></span>
						</center>
	                </td>
	                <td colspan="5" style="text-align: right;background-color: #B39BC0 !important;"><span style="font-size: 15px;color:#664287;"><b>TOTALES:</b></span></td>
	                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['energia'];?></b></span></center></td>
	                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['subtotal'];?></b></span></center></td>
	                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['igv_m'];?></b></span></center></td>
	                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['redondeo_mes_actual'];?></b></span></center></td>
	                <td><center><span style="font-size: 15px;color:#664287;"></span></center></td>
	              	<td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['redondeo_anterior'];?></b></span></center></td>
	                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['deuda_anterior'];?></b></span></center></td>
	                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['total_f'];?></b></span></center></td>
					<td>
						<center>
							<?php //if ($verificar_estado_2 == 1): ?>
							<?php if (true): ?>
								<a href="javascript:;" data-idciclo="<?php echo $GET_categoria;?>" class="btn btn-xs grey-gallery" id="cambiar_estado_verificado_todos">
									<i class="fa fa-check" aria-hidden="true"></i>
								</a>
							<?php endif ?>
						</center>
					</td>
					<td align="center">
						<a class="btn btn-xs grey-gallery" target="_blank" href="plugins/tcpdf/reportes/consolidado_ciclo.php?idciclo=<?php echo $GET_categoria;?>"  title="REPORTE CONSOLIDADO CICLO - GENERAL"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
						<a class="btn btn-xs red" target="_blank" href="plugins/tcpdf/reportes/recibo_full.php?idciclo=<?php echo $GET_categoria;?>"  title="REPORTE CONSOLIDADO CICLO - RECIBOS"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
					</td>
	            </tr>
			        <?php foreach ($datos as $value): ?>
			            <tr>
			                <td style="background-color: #75458f !important;color:#ffffff;border: 2px solid #743596;"><center><span style="font-size: 15px;color:#155083;"><b style="color:#ffffff;"><?php echo $value->nro;?></b></span></center></td>
			                <td><span style="font-size: 13px;color:#133F65;"><?php echo $value->nombres_completos;?></span></td>
			                <td><center><span style="font-size: 15px;color:#990B0B;"><?php echo $value->direccion;?></span></center></td>
			                <td>
				                <center>
					                <span style="font-size: 15px;color:#664287;"><?php echo $value->lectura_actual;?>
					                	
									<?php if ($value->estado == 1): ?>
										<a href="javascript:;" data-id="<?php echo $value->id_recibo;?>" class="btn btn-xs grey-cascade btn_actualizar_lectura_actual"><i class="fa fa-edit"></i></a>
									<?php else: ?>

									<?php endif ?>
					                	

					                </span>
				                </center>
			                </td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->lectura_anterior;?></span></center></td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->consumo_facturado;?></span></center></td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->energia;?></span></center></td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->subtotal;?></span></center></td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->igv_m;?></span></center></td>
			              	<td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->redondeo_mes_actual;?></span></center></td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->derecho_r;?></span></center></td>
			                <td><center><span style="font-size: 15px;color:#664287;"><?php echo $value->redondeo_anterior;?></span></center></td>
			                <style>
			                	.deuda:focus{
			                		background-color: #c90808 !important;
			                	}
			                </style>
			                <?php if ($value->deuda_anterior == '0.00'): ?>
			                	<td>
									<center>
										<span style="font-size: 15px;color:#664287;">-</span>
									</center>
								</td>
			                <?php else: ?>
								<td class="deuda" style="background-color: #c90808 !important;">
									<center>
										<span style="font-size: 15px;color:#ffffff;"><b><?php echo $value->deuda_anterior;?></b></span>
									</center>
								</td>
			                <?php endif ?>
			                <td style="background-color: #0863c9 !important;">
				                <center>
				                	<span style="font-size: 15px;color:#ffffff;"><b><?php echo $value->total_f;?></b></span>
				                </center>
			                </td>
			                <td>
				                <center>
				                	<?php if ($value->estado == 1): ?>
										<a href="javascript:;" data-id="<?php echo $value->id_recibo;?>" class="btn btn-xs yellow-soft cambiar_estado_verificado">
											<i class="fa fa-check" aria-hidden="true"></i>
										</a>
									<?php else: ?>
										<?php if ($value->estado == 2): ?>
											<a href="javascript:;" data-id="<?php echo $value->id_recibo;?>" class="btn btn-xs blue cambiar_estado_pagado">
												<i class="fa fa-money" aria-hidden="true"></i>
											</a>
										<?php else: ?>
											<?php if ($value->estado == 3): ?>
												<i style="color:#137704;" class="fa fa-circle" aria-hidden="true"></i>
											<?php endif ?>
										<?php endif ?>
									<?php endif ?>
									
				                </center>
			                </td>
			                <td>
				                <?php if ($value->estado == 2 || $value->estado == 3): ?>
				                	<center>
				                		<a target="_blank" href="plugins/tcpdf/reportes/recibo.php?idrecibo=<?php echo $value->id_recibo;?>&idciclo=<?php echo $GET_categoria;?>"  title="REPORTE_RECIBO" class="btn btn-xs red" title=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
				                	</center>
				                <?php endif; ?>
			                </td>
			            </tr>
			         <?php endforeach ?>
				     <tr>
		                <td style="background-color: #75458f !important;color:#ffffff;border: 2px solid #743596;">
							<center>
							<span style="color:#ffffff;font-size: 15px;"><i class="fa fa-bullseye" aria-hidden="true"></i></span>
							</center>
		                </td>
		                <td colspan="5" style="text-align: right;background-color: #B39BC0 !important;"><span style="font-size: 15px;color:#664287;"><b>TOTALES:</b></span></td>
		                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['energia'];?></b></span></center></td>
		                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['subtotal'];?></b></span></center></td>
		                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['igv_m'];?></b></span></center></td>
		                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['redondeo_mes_actual'];?></b></span></center></td>
		                <td><center><span style="font-size: 15px;color:#664287;"></span></center></td>
		              	<td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['redondeo_anterior'];?></b></span></center></td>
		                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['deuda_anterior'];?></b></span></center></td>
		                <td><center><span style="font-size: 15px;color:#664287;"><b><?php echo $datosTotalesRecibo['total_f'];?></b></span></center></td>
		                <td>
			                <center>
			                </center>
		                </td>
		            </tr>
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
	<span class="amount">Registros <?php echo $PagNumber['inicio']+1;?> - <?php echo $PagNumber['fin'];?> de <?php echo $total;?> totales</span>
	<div class="row" >
	    <div class="col-md-12">
	        <ul class="pagination pagination-sm">
	            <?php echo $paginacion;?>
	        </ul>
	    </div>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col-md-12">
			<center>
				<a href="javascript:;" class="btn btn-lg blue" id="generar_recibos" data-idciclo="<?php echo $GET_categoria;?>"><i class="fa fa-database" aria-hidden="true"></i>  Generar Recibos </a>
			</center>
		</div>
	</div>
<?php endif ?>
<script>
	Validacion.GenerarRecibos();
	Validacion.ActualizarLectura();
	Validacion.VerificarTodos();
	Validacion.Verificar();
	Validacion.Pagar();
</script>
