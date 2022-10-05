var Validacion = function(){
    var init = function(){
		$('.bs-select').selectpicker({
			iconBase: 'fa',
			tickIcon: 'fa-check'
		});
		ClassAjax.valoresAjax('tabla_Ciclo',['limite'],'Modulos/Ciclo/Formularios/ajaxLista.php',{text_q:'busqueda',btn_q:'buscar'});
    };
    var btn_agregar_ciclo = function(){
        $('#btn_agregar_ciclo').click(function(){
            Lobibox.window({
                title: 'CREAR NUEVO CICLO DE COBRO',
                url: 'Modulos/Ciclo/Formularios/ajaxAgregarCiclo.php',
                loadMethod: 'GET',
                width:700,
                height:560,
                closeOnEsc: false,
                closeButton:false,
                buttons: {
                    close: {
                        text: 'Cerrar',
                        class: 'lobibox-btn lobibox-btn-default btn_agregar_ciclo_cerrar',
                        closeOnClick: true
                    }
                }
            });
        });
    };
    var btn_ver_variables = function(){
        $('.btn_ver_variables').click(function(){
            var id_ciclo = $(this).data('id');
            Lobibox.window({
                title: 'VARIABLES',
                url: 'Modulos/Ciclo/Formularios/ajaxVerVariables.php',
                loadMethod: 'GET',
                width:700,
                height:560,
                params: {
                    id_ciclo: id_ciclo
                },
                closeOnEsc: false,
                closeButton:false,
                buttons: {
                    close: {
                        text: 'Cerrar',
                        class: 'lobibox-btn lobibox-btn-default',
                        closeOnClick: true
                    }
                }
            });
        });
    };
    var btn_asignar_variables = function(){
        $('.btn_asignar_variables').click(function(){
            var id_ciclo = $(this).data('id');
            var nombre_ciclo = $(this).data('nombre');
            Lobibox.window({
                title: 'ASIGNACIÓN DE VARIABLES PARA EL CICLO  ( '+ nombre_ciclo +' )',
                url: 'Modulos/Ciclo/Formularios/ajaxAgregarVariables.php',
                loadMethod: 'POST',
                width:1000,
                height:790,
                params: {
                    id_ciclo: id_ciclo
                },
                closeOnEsc: false,
                closeButton:false,
                buttons: {
                    close: {
                        text: 'Cerrar',
                        class: 'lobibox-btn lobibox-btn-default btn_asignar_variables_cerrar',
                        closeOnClick: true
                    }
                }
            });
        });
    };
    var guardar_formulario_generar_ciclo = function(ruta,usuario){
        $("#guardar_formulario_generar_ciclo").click(function(){
            Lobibox.confirm({
                title: "Decea generar el Ciclo?",
                iconClass: false,
                msg: "Recuerde que al generar el ciclo debe tambien hacer la asociacion a sus respectivas Variables.",
                callback: function($this, type) {
                  if (type === 'yes') {
                    var url = "Modulos/Ciclo/Formularios/tsql_guardar_ciclo.php"; // El script a dónde se realizará la petición.
                    var datos = $('#formulario_ciclo_agregar').serialize();
                    $.ajax({
                       type: "POST",
                       url: url,
                       data: datos,
                       success: function(data)
                       {
                            var respuesta = JSON.parse(data);
                            if (respuesta.error != null){
                                Mensaje.init('error','Aviso Importante',respuesta.error);
                            }
                            if (respuesta.success != null) {
                                $('.btn_agregar_ciclo_cerrar').trigger('click');
                                $('#buscar').trigger('click');
                                Mensaje.init('success','Aviso Importante',respuesta.success);
                            }
                       }
                     });
                  };
                }
            });
        });
    };
    var eliminar_ciclo = function(ruta,usuario){
        $(".eliminar_ciclo").click(function(){
            var id_ciclo = $(this).data('id');
            var mes = $(this).data('mes');
            var anio = $(this).data('anio');
            Lobibox.confirm({
                title: "Decea Eliminar El ciclo ( "+mes+" "+anio+" )?",
                iconClass: false,
                msg: "Recuerde que si es posible que las variables del ciclo sean eliminadas, de haber recibos generados no se eliminara el Ciclo.",
                callback: function($this, type) {
                  if (type === 'yes') {
                    var url = "Modulos/Ciclo/Formularios/tsql_eliminar_ciclo.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                       type: "POST",
                       url: url,
                       data: 'id='+id_ciclo,
                       success: function(data)
                       {
                            var respuesta = JSON.parse(data);
                            if (respuesta.error != null){
                                Mensaje.init('error','Aviso Importante',respuesta.error);
                            }
                            if (respuesta.success != null) {
                                $('#buscar').trigger('click');
                                Mensaje.init('success','Aviso Importante',respuesta.success);
                            }
                       }
                     });
                  };
                }
            });
        });
    };
    var formulario_variables_agregar = function(){
        $('#formulario_variables_agregar').formValidation({
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
            tarifa: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese la tarifa en Texto'
                    }
                }
            },
            acometida: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese la acometida en Texto'
                    }
                }
            },
            medidor: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el medidor en Texto'
                    }
                }
            },
            sistema: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el sistema en Texto'
                    }
                }
            },
            electronico: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el electronico en Texto'
                    }
                }
            },
            costo_kwh: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el Costo kWh en Texto'
                    },
                    numeric: {
                        message: 'Este no es un Número',
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    }
                }
            },
            alumbrado_p: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el Costo por Alumbrado Publico'
                    },
                    numeric: {
                        message: 'Este no es un Número',
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    }
                }
            },
            mantenimiento: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el Costo por Mantenimiento'
                    },
                    numeric: {
                        message: 'Este no es un Número',
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    }
                }
            },
            cargo_fijo: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el Costo por Cargo Fijo'
                    },
                    numeric: {
                        message: 'Este no es un Número',
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    }
                }
            },
            igv: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el IGV (valor)'
                    },
                    numeric: {
                        message: 'Este no es un Número',
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    }
                }
            },
            derecho_r: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el Costo por Derecho de Recibo'
                    },
                    numeric: {
                        message: 'Este no es un Número',
                        thousandsSeparator: '',
                        decimalSeparator: '.'
                    }
                }
            },
            interes_c: {
                row: '.col-md-4',
                validators: {
                    notEmpty: {
                        message: 'Ingrese el Interes Compensatorio'
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
            var formData = $("#formulario_variables_agregar").serialize();
            $.ajax({
                url: 'Modulos/Ciclo/Formularios/tsql_guardar_variables.php',
                method: "GET",
                dataType: "html",
                contentType: false,
                processData: false,
                cache: false,
                data: formData
            })
            .done(function(data) {
                Mensaje.init('success','Has ingresado las variables correctamente.','Excelente');
                $("#formulario_variables_agregar").data('formValidation').resetForm();
                $('.btn_asignar_variables_cerrar').trigger('click');
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
        AgregarCiclo:function () {
            btn_agregar_ciclo();
        },
        GuardarFormularioGenerarCiclo:function(){
            guardar_formulario_generar_ciclo();
        },
        EliminarCiclo:function(){
            eliminar_ciclo();
        },
        AsignarVariables:function(){
            btn_asignar_variables();
        },
        FormularioVariablesAgregar:function(){
            formulario_variables_agregar();
        },
        VerVariables:function(){
            btn_ver_variables();
        }
    };
}();