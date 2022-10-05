<?php
set_time_limit(2600);
require_once('tcpdf_include.php');
date_default_timezone_set('America/Lima');
include('../../../ClsConexion.php');
include('../../../PDO.php');
include('../../../includes/funciones.php');
include('../../../includes/XSS.php');
include('../../../Modulos/Recibo/Clases/ClsRecibo.php');
include('../../../Modulos/Ciclo/Clases/ClsCiclo.php');
ob_clean();

$idciclo = (int)$_GET['idciclo'];
$idrecibo = (int)$_GET['idrecibo'];
$ClsRecibo = new ClsRecibo();
$ClsCiclo = new ClsCiclo();
$value = $ClsRecibo->ListarReciboUno($idrecibo);
$value = CorrelativoObj($value,0,'nro');

$datosCiclo = $ClsCiclo->VerVariables($idciclo);

$datosTotalesRecibo = $ClsRecibo->TotalesCiclo($idciclo);

$energia_total = $datosTotalesRecibo['energia'];
$subtotal_total = $datosTotalesRecibo['subtotal'];
$igv_m_total = $datosTotalesRecibo['igv_m'];
$redondeo_mes_actual_total = $datosTotalesRecibo['redondeo_mes_actual'];
$redondeo_anterior_total = $datosTotalesRecibo['redondeo_anterior'];
$deuda_anterior_total = $datosTotalesRecibo['deuda_anterior'];
$total_f_total = $datosTotalesRecibo['total_f'];
//echo var_dump($datosTotalesRecibo);
//exit();

$mes = strtoupper($datosCiclo['mes_texto']);
$anio = strtoupper($datosCiclo['anio']);
$fecha_hora = strtoupper($datosCiclo['fecha_hora_actual']);



$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SISTEMA DE REGISTRO - CONSUMO ELECTRICO');
$pdf->SetTitle('IMPRESIÓN RECIBOS CICLO '.$mes.' '.$anio.' - GENERAL');
$pdf->SetSubject('IMPRESIÓN RECIBOS CICLO '.$mes.' '.$anio.' - GENERAL');
$pdf->SetKeywords('IMPRESIÓN RECIBOS CICLO '.$mes.' '.$anio.' - GENERAL');
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(5);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('dejavusans', '', 10);






foreach ($value as $value) { 
    $pdf->AddPage();

if ($value->dato_deuda == 1) {
    $encabezado_datos = '
    <table border="0" cellspacing="0" cellpadding="9">
        <tr bgcolor="#CCCCCC" cellpadding="15">
            <td align="center" style="font-size:40px;">
            '.$value->direccion.'
            </td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="15">
        <tr bgcolor="#CCCCCC" cellpadding="6">
            <td align="center">
            <b>MES FACTURADO</b>
            </td>
            <td align="center">
            <b>'.strtoupper($value->mes_texto).' '.$value->anio.'</b>
            </td>
        </tr>
    </table>';
    $t_fecha_secundario = ' <table border="0" cellspacing="0" cellpadding="5">
                <tr bgcolor="#CCCCCC" cellpadding="15">
                    <td align="center" style="font-size:20px;">
                    '.$value->direccion.'
                    </td>
                </tr>
            </table>
            <table border="0" cellspacing="0" cellpadding="7">
                <tr bgcolor="#CCCCCC" cellpadding="6">
                    <td align="center" style="font-size:8px;">
                    <b>MES FACTURADO</b>
                    </td>
                    <td align="center" style="font-size:9px;">
                    <b>'.strtoupper($value->mes_texto).' '.$value->anio.'</b>
                    </td>
                </tr>
            </table>';
}else{
    $encabezado_datos = '<table border="0" cellspacing="0" cellpadding="9">
        <tr bgcolor="#EF5350" cellpadding="15">
            <td align="center" style="font-size:40px;color:#ffffff;">
            '.$value->direccion.'
            </td>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="15">
        <tr bgcolor="#EF5350" cellpadding="6">
            <td align="center">
            <b style="color:#ffffff;">MES FACTURADO</b>
            </td>
            <td align="center">
            <b style="color:#ffffff;">'.strtoupper($value->mes_texto).' '.$value->anio.'</b>
            </td>
        </tr>
    </table>';
    $t_fecha_secundario = ' <table border="0" cellspacing="0" cellpadding="5">
                <tr bgcolor="#EF5350" cellpadding="15">
                    <td align="center" style="font-size:20px;color:#ffffff;">
                    '.$value->direccion.'
                    </td>
                </tr>
            </table>
            <table border="0" cellspacing="0" cellpadding="7">
                <tr bgcolor="#EF5350" cellpadding="6">
                    <td align="center" style="font-size:8px;">
                    <b style="color:#ffffff;">MES FACTURADO</b>
                    </td>
                    <td align="center" style="font-size:9px;">
                    <b style="color:#ffffff;">'.strtoupper($value->mes_texto).' '.$value->anio.'</b>
                    </td>
                </tr>
            </table>';
}

    $grafico_barras = '<img src="http://localhost:8080/sistema_edgar/was/plugins/jp/src/grafico/grafico.php?idciclo='.$idciclo.'&idrecibo='.$idrecibo.'" width="360px">';
    $logosuperior = '<img src="http://localhost:8080/sistema_edgar/was/plugins/tcpdf/reportes/images/tcpdf_logo_3.jpg"  width="340px">';
    
        $DATOS_CLIENTE= '
        <table border="0.1" cellspacing="0" cellpadding="3">
            <tr>
                <td align="center" style="font-size:10px;"><b>DATOS DEL CLIENTE</b></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" width="78px;" style="font-size:10px;"><b>NOMBRES:</b></td>
                            <td align="left" width="239px;" style="font-size:10px;">'.$value->nombres_completos.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="78px;" style="font-size:10px;"><b>DNI:</b></td>
                            <td align="left" width="239px;" style="font-size:10px;">'.$value->documento.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="78px;" style="font-size:10px;"><b>DIRECCIÓN:</b></td>
                            <td align="left" width="239px;" style="font-size:10px;">'.$value->direccion.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="78px;" style="font-size:10px;"><b>DPTO/PROV:</b></td>
                            <td align="left" width="239px;" style="font-size:10px;"> TACNA - TACNA -TACNA </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        ';



        $DATOS_TECNICOS= '
        <table border="0.1" cellspacing="0" cellpadding="3">
            <tr>
                <td align="center" style="font-size:10px;"><b>DATOS TÉCNICOS</b></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" width="78px;" style="font-size:10px;"><b>TARIFA:</b></td>
                            <td align="left" width="239px;" style="font-size:10px;">'.$datosCiclo['tarifa'].'</td>
                        </tr>
                        <tr>
                            <td align="left" width="79px;" style="font-size:10px;"><b>ACOMETIDA:</b></td>
                            <td align="left" width="70px;" style="font-size:10px;">'.$datosCiclo['acometida'].'</td>
                            <td align="left" width="69px;" style="font-size:10px;"><b>SISTEMA:</b></td>
                            <td align="left" width="100px;" style="font-size:10px;">'.$datosCiclo['sistema'].'</td>
                        </tr>
                        <tr>
                            <td align="left" width="79px;" style="font-size:10px;"><b>MEDIDOR:</b></td>
                            <td align="left" width="70px;" style="font-size:10px;">'.$datosCiclo['medidor'].'</td>
                            <td align="left" width="94px;" style="font-size:10px;"><b>ELECTRÓNICO:</b></td>
                            <td align="left" width="75px;" style="font-size:10px;">'.$datosCiclo['electronico'].'</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        ';


        $DETALLE_FACTURACION= '
        <table border="0.1" cellspacing="0" cellpadding="3">
            <tr>
                <td align="center" style="font-size:10px;"><b>DATOS DEL CLIENTE</b></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;" align="left"><b>CONCEPTO</b></td>
                            <td align="left" width="157px;" style="font-size:10px;" align="right"><b>IMPORTE S/.</b></td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Alumbrado Público:</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->alumbrado_p.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Cargo Fijo:</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->cargo_fijo.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Energía:</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->energia.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Mantenimiento</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->mantenimiento.'</td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                    </table>
                </td>
            </tr>  
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;" ><b>SUBTOTAL</b></td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right"><b>'.$value->subtotal.'</b></td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">IGV '.$value->igv_text.'</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->igv_m.'</td>
                        </tr>
                    </table>
                </td>
            </tr>  
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;" align="left"><b>OTROS PAGOS</b></td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Derecho Recibo</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->derecho_r.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Deuda Mes Anterior</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->deuda_anterior.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Redondeo del Mes</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->redondeo_mes_actual.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Redondeo mes Anterior</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->redondeo_anterior.'</td>
                        </tr>
                        <tr>
                            <td align="left" width="157px;" style="font-size:10px;">Interes compensatorio</td>
                            <td align="left" width="130px;" style="font-size:10px;" align="right">'.$value->interes_c.'</td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                        <tr>
                            <td align="left" style="font-size:10px;"></td>
                        </tr>
                    </table>
                </td>
            </tr>  
        </table>
        ';



        $DETALLE_CONSUMO= '
        <table border="0.1" cellspacing="0" cellpadding="3">
            <tr>
                <td align="center" style="font-size:10px;"><b>DETALLE DE CONSUMO</b></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" width="140px;" style="font-size:10px;"><b>LECTURA ACTUAL</b></td>
                            <td align="left" width="100px;" style="font-size:10px;" align="right">'.$value->lectura_actual.'</td>
                            <td align="left" width="50px;" style="font-size:10px;" align="right">kWh</td>
                        </tr>
                        <tr>
                            <td align="left" width="140px;" style="font-size:10px;"><b>LECTURA ANTERIOR</b></td>
                            <td align="left" width="100px;" style="font-size:10px;" align="right">'.$value->lectura_anterior.'</td>
                            <td align="left" width="50px;" style="font-size:10px;" align="right">kWh</td>
                        </tr>
                        <tr>
                            <td align="left" width="140px;" style="font-size:10px;"><b>CONSUMO FACTURADO</b></td>
                            <td align="left" width="100px;" style="font-size:10px;" align="right">'.$value->consumo_facturado.'</td>
                            <td align="left" width="50px;" style="font-size:10px;" align="right">kWh</td>
                        </tr>
                        <tr>
                            <td align="left" width="140px;" style="font-size:10px;"><b>COSTO kWh ES:</b></td>
                            <td align="left" width="100px;" style="font-size:10px;" align="right">S/.'.$value->costo_kwh.'</td>
                            <td align="left" width="50px;" style="font-size:10px;" align="right">sin IGV</td>
                        </tr>
                    </table>
                </td>
            </tr>  
        </table>
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"></td>
            </tr>
        </table>
        <table border="0.1" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="left" style="font-size:10px;" align="center"><b>EVOLUCIÓN DE ENERGIA</b></td>
                        </tr>
                        <tr>
                            <td align="center"  style="font-size:10px;">
                                '.$grafico_barras.'
                            </td>
                        </tr>
                        <tr>
                            <td align="left" width="140px;" style="font-size:10px;"></td>
                        </tr>
                    </table>
                </td>
            </tr>  
        </table>
        ';

    $html = '
    <table>
        <tr>
            <th align="center">'.$logosuperior.'</th>
            <th align="right">'.$encabezado_datos.'</th>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="4">
        <tr>
            <th align="center"><b>RECIBO DE ENERGÍA ELÉCTRICA</b></th>
            <th align="center"><b>FACTURACIÓN INTERNA</b></th>
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="4">
        <tr>
            <th>'
            .$DATOS_CLIENTE
            .$DATOS_TECNICOS
            .$DETALLE_CONSUMO.
            '</th>
            <th>'
            .$DETALLE_FACTURACION.
            '</th>
        </tr>
    </table>
    <table border="0.1" cellspacing="0" cellpadding="4">
        <tr bgcolor="#CCCCCC">
            <td align="center">
            FECHA EMISIÓN
            </td>
            <td align="center">
            FECHA VENCIMIENTO
            </td>
            <td align="center">
            TOTAL A PAGAR S/.
            </td>
        </tr>
         <tr bgcolor="#CCCCCC">
            <td align="center">
            <b>'.$value->venc_dia_ini.' '.strtoupper($value->mes_texto).' '.$value->anio.'</b>
            </td>
            <td align="center">
            <b>'.$value->venc_dia_final.' '.strtoupper($value->mes_texto).' '.$value->anio.'</b>
            </td>
            <td align="center">
            <b>'.$value->total_f.'</b>
            </td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td align="center" width="70px;">
            SON:
            </td>
            <td colspan="2" width="638.5px;">
           <i>'.$value->total_f_texto.'</i>
        </td>
           
        </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>
    </td>
    </tr>
    </table>
    <hr>
    <table border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>
    </td>
    </tr>
    </table>
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table border="0.1" cellspacing="0" cellpadding="3">
                    <tr>
                        <td align="center" style="font-size:10px;"><b>DATOS DEL CLIENTE</b></td>
                    </tr>
                </table>
                <table border="0.1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <table border="0" cellspacing="0" cellpadding="1">
                                <tr>
                                    <td align="left" width="55px;" style="font-size:7px;"><b>NOMBRES:</b></td>
                                    <td align="left" width="239px;" style="font-size:7px;">'.$value->nombres_completos.'</td>
                                </tr>
                                <tr>
                                    <td align="left" width="55px;" style="font-size:7px;"><b>DNI:</b></td>
                                    <td align="left" width="239px;" style="font-size:7px;">-</td>
                                </tr>
                                <tr>
                                    <td align="left" width="55px;" style="font-size:7px;"><b>DIRECCIÓN:</b></td>
                                    <td align="left" width="239px;" style="font-size:7px;">'.$value->direccion.'</td>
                                </tr>
                                <tr>
                                    <td align="left" width="55px;" style="font-size:7px;"><b>DPTO/PROV:</b></td>
                                    <td align="left" width="239px;" style="font-size:7px;"> TACNA - TACNA -TACNA</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td align="center">
                <center><img src="http://localhost:8080/sistema_edgar/was/plugins/tcpdf/reportes/images/tcpdf_logo_3.jpg"  width="190px"></center>
            </td>
            <td>
                '.$t_fecha_secundario.'
            </td>
        </tr>
    </table>
    <table border="0.1" cellspacing="0" cellpadding="0">
        <tr bgcolor="#CCCCCC">
            <td align="center" width="160px;">
                TOTAL A PAGAR S/.:
                </td>
                <td colspan="2" width="548px;">
               <i>'.$value->total_f.'</i>
            </td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td align="center" width="70px;">
                SON:
                </td>
                <td colspan="2" width="638.5px;">
               <i>'.$value->total_f_texto.'</i>
            </td>
        </tr>
    </table>


  ';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->lastPage();
}
$pdf->Output('REPORTE_RECIBOS_CICLO '.$mes.'_'.$anio.'_GENERAL_'.$fecha_hora.'_.pdf', 'I');