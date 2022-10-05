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
	$id_ciclo = (string)($_GET['id_ciclo']);
	$Respuesta = $ClsCiclo->VerVariables($id_ciclo);?>
<table class="table table-bordered table-striped">
    <tbody>
    	<tr>
	        <td> Tarifa </td>
	        <td> <?php echo $Respuesta['tarifa'];?> </td>
	    </tr>
	    <tr>
	        <td> Acometida </td>
	        <td> <?php echo $Respuesta['acometida'];?> </td>
	    </tr>
	    <tr>
	        <td> Medidor </td>
	        <td> <?php echo $Respuesta['medidor'];?> </td>
	    </tr>
	    <tr>
	        <td> Sistema </td>
	        <td> <?php echo $Respuesta['sistema'];?> </td>
	    </tr>
	    <tr>
	        <td> Electronico </td>
	        <td> <?php echo $Respuesta['electronico'];?> </td>
	    </tr>
	    <tr>
	        <td> Costo kWh </td>
	        <td> <?php echo $Respuesta['costo_kwh'];?> </td>
	    </tr>
	    <tr>
	        <td> Alumbrado Publico </td>
	        <td> <?php echo $Respuesta['alumbrado_p'];?> </td>
	    </tr>
	    <tr>
	        <td> Cargo Fijo </td>
	        <td> <?php echo $Respuesta['cargo_fijo'];?> </td>
	    </tr>
	    <tr>
	        <td> Mantenimiento </td>
	        <td> <?php echo $Respuesta['mantenimiento'];?> </td>
	    </tr>
	    <tr>
	        <td> IGV </td>
	        <td> <?php echo $Respuesta['igv_por'];?> </td>
	    </tr>
	    <tr>
	        <td> Derecho por Recibo </td>
	        <td> <?php echo $Respuesta['derecho_r'];?> </td>
	    </tr>
	    <tr>
	        <td> Interes Compensatorio </td>
	        <td> <?php echo $Respuesta['interes_c'];?> </td>
	    </tr>
	</tbody>
</table>