<div class="portlet-body form">
<form class="form-horizontal" id="formulario_ciclo_agregar">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-2 control-label">Mes de Lectura</label>
			<div class="col-md-9">
				<select name="mes" id="mes" class="form-control" placeholder="Enter text">
					<option value="1" <?php echo (date('n') != 1)?'':'selected' ?>>Enero</option>
					<option value="2" <?php echo (date('n') != 2)?'':'selected' ?>>Febrero</option>
					<option value="3" <?php echo (date('n') != 3)?'':'selected' ?>>Marzo</option>
					<option value="4" <?php echo (date('n') != 4)?'':'selected' ?>>Abril</option>
					<option value="5" <?php echo (date('n') != 5)?'':'selected' ?>>Mayo</option>
					<option value="6" <?php echo (date('n') != 6)?'':'selected' ?>>Junio</option>
					<option value="7" <?php echo (date('n') != 7)?'':'selected' ?>>Julio</option>
					<option value="8" <?php echo (date('n') != 8)?'':'selected' ?>>Agosto</option>
					<option value="9" <?php echo (date('n') != 9)?'':'selected' ?>>Septiembre</option>
					<option value="10" <?php echo (date('n') != 10)?'':'selected' ?>>Octubre</option>
					<option value="11" <?php echo (date('n') != 11)?'':'selected' ?>>Noviembre</option>
					<option value="12" <?php echo (date('n') != 12)?'':'selected' ?>>Diciembre</option>
				</select>
				<span class="help-block"> Selecciona un Mes </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Año</label>
			<div class="col-md-9">
				<select name="anio" id="anio" class="form-control" placeholder="Enter text">
					<option value="2017" <?php echo (date('Y') != 2017)?'':'selected' ?>>2017</option>
					<option value="2018" <?php echo (date('Y') != 2018)?'':'selected' ?>>2018</option>
					<option value="2019" <?php echo (date('Y') != 2019)?'':'selected' ?>>2019</option>
					<option value="2020" <?php echo (date('Y') != 2020)?'':'selected' ?>>2020</option>
				</select>
				<span class="help-block"> Selecciona un Año </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Inicio Venc.</label>
			<div class="col-md-9">
				<select name="inicio" id="inicio" class="form-control" placeholder="Enter text">
						<option value="99" selected>SIN SELECCIÓN</option>
					<?php for($i=1; $i <= 31; $i++): ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				<span class="help-block"> Selecciona un Día </span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Fin Venc.</label>
			<div class="col-md-9">
				<select name="fin" id="fin" class="form-control" placeholder="Enter text">
						<option value="99" selected>SIN SELECCIÓN</option>
					<?php for($i=1; $i <= 31; $i++): ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				<span class="help-block"> Selecciona un Día </span>
			</div>
		</div>
	</div>
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-5 col-md-7">
				<button type="button" class="btn green" id="guardar_formulario_generar_ciclo">Generar</button>
			</div>
		</div>
	</div>
</form>
</div>
<script>
	Validacion.GuardarFormularioGenerarCiclo();
</script>