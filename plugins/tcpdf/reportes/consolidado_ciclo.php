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
$ClsRecibo = new ClsRecibo();
$ClsCiclo = new ClsCiclo();
$total = $ClsRecibo->ListarReciboTotal('',$idciclo);
$value = $ClsRecibo->ListarRecibo($total,0,'',$idciclo);
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
$total_f_recaudado = $datosTotalesRecibo['total_r'];

$mes = strtoupper($datosCiclo['mes_texto']);
$anio = strtoupper($datosCiclo['anio']);
$fecha_hora = strtoupper($datosCiclo['fecha_hora_actual']);


$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator("SISTEMA DE REGISTRO - CONSUMO ELECTRICO");
$pdf->SetAuthor('SISTEMA DE REGISTRO - CONSUMO ELECTRICO');
$pdf->SetTitle('REPORTE CONSOLIDADO CICLO '.$mes.' '.$anio.' - GENERAL');
$pdf->SetSubject('REPORTE CONSOLIDADO CICLO '.$mes.' '.$anio.' - GENERAL');
$pdf->SetKeywords('REPORTE CONSOLIDADO CICLO '.$mes.' '.$anio.' - GENERAL');
$pdf->SetHeaderData(PDF_HEADER_LOGO,"50px","SISTEMA DE REGISTRO - CONSUMO ELÉCTRICO","“Año del Buen Servicio al Ciudadano”");
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins('6px','33px','6px');
$pdf->SetHeaderMargin('5px');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 7);

$tbl = <<<EOD
<table cellpadding="2" cellspacing="0" border="0">
    <tr>
        <td COLSPAN="3" align="left"  style="font-size:15px;">REPORTE CONSOLIDADO GENERAL - <b>CICLO $mes $anio </b></td>
        <td COLSPAN="3" align="right"  style="font-size:13px;">Fecha / Hora : $fecha_hora</td>
    </tr>
</table>
EOD;
$tbl .= <<<EOD
<table cellpadding="2" cellspacing="0" border="0">
    <tr>
        <td COLSPAN="3" align="left"  style="font-size:7px;"></td>
    </tr>
</table>
EOD;

$tbl .= <<<EOD
<table  cellspacing="0" border="0">
    <tr role="row" class="heading">
        <td style="font-size:7px;" width="2%"><B>N°</B></td>
        <td style="font-size:7px;" width="15%"><B>NOMBRE</B></td>
        <td style="font-size:7px;"><B>DIRECCION</B></td>
        <td style="font-size:7px;"><B>L.ACTUAL (kWh)</B></td>
        <td style="font-size:7px;"><B>L.ANTERIOR (kWh)</B></td>
        <td style="font-size:7px;"><B>C.FACT (kWh)</B></td>
        <td style="font-size:7px;"><B>ENERGIA</B></td>
        <td style="font-size:7px;"><B>SUBTOTAL</B></td>
        <td style="font-size:7px;"><B>IGV</B></td>
        <td style="font-size:7px;"><B>R.M.ACTUAL</B></td>
        <td style="font-size:7px;"><B>D.RECIBO</B></td>
        <td style="font-size:7px;"><B>R.M.ANTERIOR</B></td>
        <td style="font-size:7px;"><B>D.ANTERIOR</B></td>
        <td style="font-size:7px;"><B>TOTAL</B></td>
        <td style="font-size:7px;"><B></B></td>
    </tr>
    <tr>
        <td COLSPAN="15" align="left"  style="font-size:7px;"></td>
    </tr>
EOD;




foreach ($value as $value) {

$deuda_anterior = ($value->deuda_anterior == '0.00')?'-':$value->deuda_anterior;

$tbl .= <<<EOD
        <tr cellpadding="0">
            <td COLSPAN="1" align="LEFT" width="2%"><b>$value->nro</b></td>
            <td COLSPAN="1" align="LEFT" width="15%" style="font-size:8px;">$value->nombres_completos</td>
            <td COLSPAN="1" align="LEFT" >$value->direccion</td>
            <td COLSPAN="1" align="LEFT" >$value->lectura_actual</td>
            <td COLSPAN="1" align="LEFT" >$value->lectura_anterior</td>
            <td COLSPAN="1" align="LEFT" >$value->consumo_facturado</td>
            <td COLSPAN="1" align="LEFT" >$value->energia</td>
            <td COLSPAN="1" align="LEFT" >$value->subtotal</td>
            <td COLSPAN="1" align="LEFT" >$value->igv_m</td>
            <td COLSPAN="1" align="LEFT" >$value->redondeo_mes_actual</td>
            <td COLSPAN="1" align="LEFT" >$value->derecho_r</td>
            <td COLSPAN="1" align="LEFT" >$value->redondeo_anterior</td>
            <td COLSPAN="1" align="LEFT" >$deuda_anterior</td>
            <td COLSPAN="1" align="LEFT" >$value->total_f</td>
            <td COLSPAN="1" align="LEFT" >$value->estado_p</td>
        </tr>
EOD;
}

$tbl .= <<<EOD
</table>
EOD;
$tbl .= <<<EOD
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td COLSPAN="3" align="left"  style="font-size:7px;"></td>
        </tr>
    </table>
EOD;
$tbl .= <<<EOD
    <table  border="0">
        <tr>
            <td COLSPAN="15"align="left"  style="font-size:7px;">      TOTALES</td>
        </tr>
        <tr>
            <td COLSPAN="15" align="left"  style="font-size:7px;">_________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</td>
        </tr>
        <tr role="row" class="heading">
            <td COLSPAN="1" align="LEFT" width="2%"></td>
            <td COLSPAN="1" align="LEFT" width="14%"></td>
            <td COLSPAN="1" align="LEFT" ></td>
            <td COLSPAN="1" align="LEFT" ></td>
            <td COLSPAN="1" align="LEFT" ></td>
            <td COLSPAN="1" align="LEFT" ></td>
            <td COLSPAN="1" align="LEFT" >$energia_total</td>
            <td COLSPAN="1" align="LEFT" >$subtotal_total</td>
            <td COLSPAN="1" align="LEFT" >$igv_m_total</td>
            <td COLSPAN="1" align="LEFT" >$redondeo_mes_actual_total</td>
            <td COLSPAN="1" align="LEFT" ></td>
            <td COLSPAN="1" align="LEFT" >$redondeo_anterior_total</td>
            <td COLSPAN="1" align="LEFT" >$deuda_anterior_total</td>
            <td COLSPAN="1" align="LEFT" >$total_f_total</td>
            <td COLSPAN="1" align="LEFT" >$total_f_recaudado</td>
        </tr>
    </table>
EOD;
$style = array(
    'border' => false,
    'padding' => 0,
    'fgcolor' => array(0,0,0),
    'bgcolor' => false
);
$pdf->write2DBarcode('SISTEMA DE REGISTRO - CONSUMO ELECTRICO  | REPORTE CONSOLIDADO CICLO '.$mes.' '.$anio.' - GENERAL '. $fecha_hora, 'QRCODE,H', 270, 2,20,20, $style, '');
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('REPORTE_CONSOLIDADO_CICLO '.$mes.'_'.$anio.'_GENERAL_'.$fecha_hora.'_.pdf', 'I');

?>
