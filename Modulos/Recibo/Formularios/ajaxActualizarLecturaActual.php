<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('America/Lima');
	include('../../../ClsConexion.php');
	include('../../../PDO.php');
	include('../../../includes/funciones.php');
	include('../../../includes/XSS.php');
	include('../../../Modulos/Recibo/Clases/ClsRecibo.php');
	$ClsRecibo = new ClsRecibo();
	$idrecibo = (int)($_GET['idrecibo']);
	$Respuesta = $ClsRecibo->LecturaActual($idrecibo);

	//echo var_dump($Respuesta);
?>
<div class="portlet-body form">
<form class="form-horizontal" id="formulario_actualizar_lectura_actual">
	<input type="hidden" name="idrecibo" value="<?php echo $idrecibo;?>">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-4 control-label">Lectura Actual</label>
			<div class="col-md-8">
				<input class="form-control" placeholder="0.00" type="text" name="lec_actual" value="<?php echo $Respuesta;?>">
				<span class="help-block"> Ingresa un valor.</span>
			</div>
		</div>
	</div>
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-5 col-md-7">
				<button type="submit" class="btn green">Guardar</button>
			</div>
		</div>
	</div>
</form>
</div>
<script>
	Validacion.FormularioActualizarLecturaActual();
</script>