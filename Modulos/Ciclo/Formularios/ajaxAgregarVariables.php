<div class="portlet-body form">
<form class="form-horizontal" id="formulario_variables_agregar">
	<input type="hidden" name="id" value="<?php echo (int)($_POST['id_ciclo']);?>">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-2 control-label">Tarifa</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="Ingresa Texto" type="text" name="tarifa">
				<span class="help-block"> Por ejemplo 'BT5B'. </span>
			</div>
			<label class="col-md-1 control-label">Acometida</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="Ingresa Texto" type="text" name="acometida">
				<span class="help-block"> Por ejemplo 'Área'. </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Medidor</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="Ingresa Texto" type="text" name="medidor">
				<span class="help-block"> Ingresa Medidor. </span>
			</div>
			<label class="col-md-1 control-label">Sistema</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="Ingresa Texto" type="text" name="sistema">
				<span class="help-block"> Por Ejemplo 'Monofásico'. </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Electrónico</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="Ingresa Texto" type="text" name="electronico">
				<span class="help-block"> Por Ejemplo '220 V'. </span>
			</div>
			<label class="col-md-1 control-label">Costo kWh ES</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="costo_kwh">
				<span class="help-block"> Ingresa el costo kWh. </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Alumbrado</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="alumbrado_p">
				<span class="help-block"> Costo por Alumbrado Publico. </span>
			</div>
			<label class="col-md-1 control-label">Cargo Fijo</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="cargo_fijo">
				<span class="help-block"> Costo por Cargo Fijo. </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Mantenimiento</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="mantenimiento">
				<span class="help-block"> Costo por Mantenimiento. </span>
			</div>
			<label class="col-md-1 control-label">IGV</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="igv">
				<span class="help-block"> Costo IGV. </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Derecho Recibo</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="derecho_r">
				<span class="help-block"> Costo por Derecho de Recibo. </span>
			</div>
			<label class="col-md-1 control-label">Interes Compensatorio</label>
			<div class="col-md-4">
				<input class="form-control" placeholder="0.00" type="text" name="interes_c">
				<span class="help-block"> Interes Compensatorio. </span>
			</div>
		</div>


	</div>
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-5 col-md-7">
				<button type="submit" class="btn green" id="guardar_formulario_agregar_variables">Guardar</button>
			</div>
		</div>
	</div>
</form>
</div>
<script>
	Validacion.FormularioVariablesAgregar();
</script>