var Validacion = function(){
		var init = function(){
			$('.bs-select').selectpicker({
				iconBase: 'fa',
				tickIcon: 'fa-check'
			});
			ClassAjax.valoresAjax('tabla_Recibo',['limite','categoria'],'Modulos/Recibo/Formularios/ajaxLista.php',{text_q:'busqueda',btn_q:'buscar'});
		};
		var generar_recibos = function(){
				 $("#generar_recibos").click(function(){
						var id_ciclo = $(this).data('idciclo');
						Lobibox.confirm({
								title: "Generar Recibos?",
								iconClass: false,
								msg: "Se generaran automaticmente los recibos para la lista actual de Clientes del Servicio.",
								callback: function($this, type) {
									if (type === 'yes') {
										var url = "Modulos/Recibo/Formularios/tsql_generar_recibos.php"; // El script a dónde se realizará la petición.
										$.ajax({
											type: "POST",
											url: url,
											data: 'idciclo='+id_ciclo,
											success: function(data)
											{
												/*var respuesta = JSON.parse(data);
												if (respuesta.error != null){
														Mensaje.init('error','Aviso Importante',respuesta.error);
												}
												if (respuesta.success != null) {*/
												$('#buscar').trigger('click');
												Mensaje.init('success','Aviso Importante','Completado');
												/*}*/
											}
										 });
									};
								}
						});
				});
		};
		var cambiar_estado_verificado_todos = function(){
				 $("#cambiar_estado_verificado_todos").click(function(){
						var id_ciclo = $(this).data('idciclo');
						Lobibox.confirm({
								title: "Verificar todos los Recibos?",
								iconClass: false,
								msg: "Al verificar todo los recibos no se podra realizar ningun cambio al valor de Lectura Actual.",
								callback: function($this, type) {
									if (type === 'yes') {
										var url = "Modulos/Recibo/Formularios/tsql_verificar_todos.php"; // El script a dónde se realizará la petición.
										$.ajax({
											 type: "POST",
											 url: url,
											 data: 'idciclo='+id_ciclo,
											 success: function(data)
											 {
												$('#buscar').trigger('click');
												Mensaje.init('success','Aviso Importante','Se ha verificado todos los Recibos.');
											 }
										 });
									};
								}
						});
				});
		};
		var cambiar_estado_verificado = function(){
				 $(".cambiar_estado_verificado").click(function(){
						var idrecibo = $(this).data('id');
						Lobibox.confirm({
								title: "Verificar Recibo?",
								iconClass: false,
								msg: "Al verificar el recibo no se podra hacer cambios a la Lectura Actual",
								callback: function($this, type) {
									if (type === 'yes') {
										var url = "Modulos/Recibo/Formularios/tsql_verificar.php"; // El script a dónde se realizará la petición.
										$.ajax({
											 type: "POST",
											 url: url,
											 data: 'idrecibo='+idrecibo,
											 success: function(data)
											 {
												$('#buscar').trigger('click');
												Mensaje.init('success','Aviso Importante','Se ha verificado el Recibos.');
											 }
										 });
									};
								}
						});
				});
		};
		var cambiar_estado_pagado = function(){
			$(".cambiar_estado_pagado").click(function(){
				var idrecibo = $(this).data('id');
				Lobibox.confirm({
					title: "Pagar Recibo?",
					iconClass: false,
					msg: "Luego de pagar el Recibo solo se podra Hacer la Impresión.",
					callback: function($this, type) {
						if (type === 'yes') {
							var url = "Modulos/Recibo/Formularios/tsql_pagar.php"; // El script a dónde se realizará la petición.
							$.ajax({
								 type: "POST",
								 url: url,
								 data: 'idrecibo='+idrecibo,
								 success: function(data)
								 {
									$('#buscar').trigger('click');
									Mensaje.init('success','Aviso Importante','Se ha verificado el Recibos.');
								 }
							 });
						};
					}
				});
			});
		};
		var btn_actualizar_lectura_actual = function(){
				$('.btn_actualizar_lectura_actual').click(function(){
						var idrecibo = $(this).data('id');
						Lobibox.window({
								title: 'Ingresar "Lectura Actual"',
								url: 'Modulos/Recibo/Formularios/ajaxActualizarLecturaActual.php',
								loadMethod: 'GET',
								width:450,
								height:350,
								params: {
										idrecibo: idrecibo
								},
								closeOnEsc: false,
								closeButton:false,
								buttons: {
										close: {
												text: 'Cerrar',
												class: 'lobibox-btn lobibox-btn-default btn_actualizar_lectura_actual_cerrar',
												closeOnClick: true
										}
								}
						});
				});
		};
		var formulario_actualizar_lectura_actual = function(){
				$('#formulario_actualizar_lectura_actual').formValidation({
				button: {
						selector: '[type="submit"]:not([formnovalidate])',
						disabled: ''
				},
				framework: 'bootstrap',
				icon: {
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
						lec_actual: {
								row: '.col-md-8',
								validators: {
										notEmpty: {
												message: 'Ingrese un valor.'
										},
										numeric: {
												message: 'Este no es un Número',
												thousandsSeparator: '',
												decimalSeparator: '.'
										}
								}
						}
				}
				}).on('success.form.fv', function(e) {
						e.preventDefault();
						var $form    = $(e.target);
						var $button  = $form.data('formValidation').getSubmitButton();
						var formData = $("#formulario_actualizar_lectura_actual").serialize();
						$.ajax({
								url: 'Modulos/Recibo/Formularios/tsql_actualizar_lectura.php',
								method: "GET",
								dataType: "html",
								contentType: false,
								processData: false,
								cache: false,
								data: formData
						})
						.done(function(data) {
								Mensaje.init('success','Has ingresado las variables correctamente.','Excelente');
								$("#formulario_actualizar_lectura_actual").data('formValidation').resetForm();
								$('.btn_actualizar_lectura_actual_cerrar').trigger('click');
								$('#buscar').trigger('click');
						})
						.fail(function() {
								Mensaje.init('error','OCURRIO UN PROBLEMA EN LA TRANSACCION','VOLVER A INTENTAR');
						})
						.always(function() {
								console.log("TRANSACCIÓN COMPLETA")
						});

				});
		};
		return {
				Init:function () {
						init();
				},
				GenerarRecibos:function () {
					generar_recibos();
				},
				ActualizarLectura:function () {
					btn_actualizar_lectura_actual();
				},
				FormularioActualizarLecturaActual:function () {
					formulario_actualizar_lectura_actual();
				},
				VerificarTodos:function () {
					cambiar_estado_verificado_todos();
				},
				Verificar:function () {
					cambiar_estado_verificado();
				},
				Pagar:function () {
					cambiar_estado_pagado();
				}
		};
}();