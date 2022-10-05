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
	$id = (int)$_POST['id'];
	$listaDatos = $ClsCliente->ObtenerCliente($id);
?>
<table class="table">
    <tbody>
	    <tr>
	        <td><b>Nombre:</b></td>
	        <td> <?php echo $listaDatos['nombre'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Apellidos:</b></td>
	        <td> <?php echo $listaDatos['apellidos'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Manzana:</b></td>
	        <td> <?php echo $listaDatos['manzana'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Lote:</b></td>
	        <td> <?php echo $listaDatos['lote'];?> </td>
	    </tr>
	  	<!--<tr>
	        <td><b>Celular:</b></td>
	        <td> <?php //echo $listaDatos['celular'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Documento de Identidad:</b></td>
	        <td> <?php //echo $listaDatos['documento'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Pais:</b></td>
	        <td> <?php //echo $listaDatos['nombre_pais'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Ciudad:</b></td>
	        <td> <?php //echo $listaDatos['cuidad'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Razón Social:</b></td>
	        <td> <?php //echo $listaDatos['razon'];?> </td>
	    </tr>
	    <tr>
	        <td><b>Nota:</b></td>
	        <td> <?php //echo $listaDatos['nota'];?> </td>
	    </tr>-->
    </tbody>
</table>
