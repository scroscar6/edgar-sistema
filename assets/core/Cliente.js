var Validacion = function(){
    var ClienteG = function(){
        $('#ClienteAgregar').formValidation({
            framework: 'bootstrap',
                button: {
                    selector: '[type="submit"]:not([formnovalidate])',
                    disabled: ''
                },
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
            fields: {
                'tag-nombre': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El nombre completo es necesario.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\u00f1\u00d1\u0020\u00C1\u00C9\u00CD\u00D3\u00DA\u00E1\u00E9\u00ED\u00F3\u00FA]+$/i,
                            message: 'No se admiten números ni símbolos.'
                        }
                    }
                },
                'tag-apellido': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El aapellido completo es necesario.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\u00f1\u00d1\u0020\u00C1\u00C9\u00CD\u00D3\u00DA\u00E1\u00E9\u00ED\u00F3\u00FA]+$/i,
                            message: 'No se admiten números ni símbolos.'
                        }
                    }
                },
                'tag-manzana': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Manzana.'
                        }
                    }
                },
                'tag-lote': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Lote.'
                        }
                    }
                },
                'tag-razon': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la razón social.'
                        }
                    }
                },
                'tag-direccion': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Dirección del Cliente'
                        }
                    }
                },
                'tag-email': {
                    row: '.col-md-9',
                    validators: {
                        emailAddress: {
                            message: 'El correo electrónico es necesario.'
                        },
                        notEmpty: {
                            message: 'El correo electrónico es necesario.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Este no es un correo válido.'
                        }
                    }
                },
                'tag-celular': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el celular del Cliente.'
                        }
                    }
                },
                'tag-pais': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Seleccione un pais de procedencia.'
                        }
                    }
                },
                'tag-ciudad': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la cuidad de procedencia.'
                        }
                    }
                },
                'tag-documento': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese algun documento de identidad.'
                        }
                    }
                },
                'tag-nota': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese alguna observación o ingrese (---).'
                        }
                    }
                },
                'tag-contrasena': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El password.'
                        },
                        regexp: {
                            regexp:  /^[a-zA-Z0-9\u0021\u002E\u002A\u002B\u0040]+$/i,
                            message: 'Solo se pueden usar los Simbolos: !*.+@'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var score = 0;
                                if (value === '') {
                                    return {
                                        valid: true,
                                        score: null
                                    };
                                }
                                score += ((value.length >= 8) ? 1 : -1);
                                if (/[A-Z]/.test(value)) {
                                    score += 1;
                                }
                                if (/[a-z]/.test(value)) {
                                    score += 1;
                                }
                                if (/[0-9]/.test(value)) {
                                    score += 1;
                                }
                                if (/[!#$%&^~*_]/.test(value)) {
                                    score += 1;
                                }
                                return {
                                    valid: true,
                                    score: score
                                };
                            }
                        }
                    }
                },
                'tag-estado':{
                    row: '.col-md-9',
                    validators: {
                        notEmpty:{
                            message: 'Seleccione un estado para el usuario'
                        }
                    }
                }
             }
            }).on('success.validator.fv', function(e, data) {
                if (data.field === 'tag-contrasena' && data.validator === 'callback') {
                    var score = data.result.score,
                        $bar  = $('#passwordMeter').find('.progress-bar');
                    switch (true) {
                        case (score === null):
                            $bar.html('').css('width', '0%').removeClass().addClass('progress-bar');
                            break;

                        case (score <= 0):
                            $bar.html('Insegura').css('width', '25%').removeClass().addClass('progress-bar progress-bar-danger');
                            break;

                        case (score > 0 && score <= 2):
                            $bar.html('Debíl').css('width', '50%').removeClass().addClass('progress-bar progress-bar-warning');
                            break;

                        case (score > 2 && score <= 4):
                            $bar.html('Segura').css('width', '75%').removeClass().addClass('progress-bar progress-bar-info');
                            break;

                        case (score > 4):
                            $bar.html('Muy Segura').css('width', '100%').removeClass().addClass('progress-bar progress-bar-success');
                            break;

                        default:
                            break;
                    }
                }
            });
    };
    var ClienteE = function(){
        $('#ClienteEditar').formValidation({
            framework: 'bootstrap',
                button: {
                    selector: '[type="submit"]:not([formnovalidate])',
                    disabled: ''
                },
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
            fields: {
                'tag-nombre': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El nombre completo es necesario.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\u00f1\u00d1\u0020\u00C1\u00C9\u00CD\u00D3\u00DA\u00E1\u00E9\u00ED\u00F3\u00FA]+$/i,
                            message: 'No se admiten números ni símbolos.'
                        }
                    }
                },
                'tag-apellido': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El aapellido completo es necesario.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\u00f1\u00d1\u0020\u00C1\u00C9\u00CD\u00D3\u00DA\u00E1\u00E9\u00ED\u00F3\u00FA]+$/i,
                            message: 'No se admiten números ni símbolos.'
                        }
                    }
                },
                'tag-manzana': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Manzana.'
                        }
                    }
                },
                'tag-lote': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Lote.'
                        }
                    }
                },
                'tag-razon': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la razón social.'
                        }
                    }
                },
                'tag-direccion': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Dirección del Cliente'
                        }
                    }
                },
                'tag-email': {
                    row: '.col-md-9',
                    validators: {
                        emailAddress: {
                            message: 'El correo electrónico es necesario.'
                        },
                        notEmpty: {
                            message: 'El correo electrónico es necesario.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Este no es un correo válido.'
                        }
                    }
                },
                'tag-celular': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el celular del Cliente.'
                        }
                    }
                },
                'tag-pais': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Seleccione un pais de procedencia.'
                        }
                    }
                },
                'tag-ciudad': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la cuidad de procedencia.'
                        }
                    }
                },
                'tag-documento': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese algun documento de identidad.'
                        }
                    }
                },
                'tag-nota': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese alguna observación o ingrese (---).'
                        }
                    }
                },
                'tag-contrasena': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El password.'
                        },
                        regexp: {
                            regexp:  /^[a-zA-Z0-9\u0021\u002E\u002A\u002B\u0040]+$/i,
                            message: 'Solo se pueden usar los Simbolos: !*.+@'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var score = 0;
                                if (value === '') {
                                    return {
                                        valid: true,
                                        score: null
                                    };
                                }
                                score += ((value.length >= 8) ? 1 : -1);
                                if (/[A-Z]/.test(value)) {
                                    score += 1;
                                }
                                if (/[a-z]/.test(value)) {
                                    score += 1;
                                }
                                if (/[0-9]/.test(value)) {
                                    score += 1;
                                }
                                if (/[!#$%&^~*_]/.test(value)) {
                                    score += 1;
                                }
                                return {
                                    valid: true,
                                    score: score
                                };
                            }
                        }
                    }
                },
                'tag-estado':{
                    row: '.col-md-9',
                    validators: {
                        notEmpty:{
                            message: 'Seleccione un estado para el usuario'
                        }
                    }
                }
             }
            }).on('success.validator.fv', function(e, data) {
                if (data.field === 'tag-contrasena' && data.validator === 'callback') {
                    var score = data.result.score,
                        $bar  = $('#passwordMeter').find('.progress-bar');
                    switch (true) {
                        case (score === null):
                            $bar.html('').css('width', '0%').removeClass().addClass('progress-bar');
                            break;

                        case (score <= 0):
                            $bar.html('Insegura').css('width', '25%').removeClass().addClass('progress-bar progress-bar-danger');
                            break;

                        case (score > 0 && score <= 2):
                            $bar.html('Debíl').css('width', '50%').removeClass().addClass('progress-bar progress-bar-warning');
                            break;

                        case (score > 2 && score <= 4):
                            $bar.html('Segura').css('width', '75%').removeClass().addClass('progress-bar progress-bar-info');
                            break;

                        case (score > 4):
                            $bar.html('Muy Segura').css('width', '100%').removeClass().addClass('progress-bar progress-bar-success');
                            break;

                        default:
                            break;
                    }
                }
            });
    };
    var init = function(){
		$('.bs-select').selectpicker({
			iconBase: 'fa',
			tickIcon: 'fa-check'
		});
		ClassAjax.valoresAjax('tabla_Cliente',['limite'],'Modulos/Cliente/Formularios/ajaxLista.php',{text_q:'busqueda',btn_q:'buscar'});
    };
    var VerDetalleCliente = function(){
        $('.verdatos_cliente').on('click', function () {
            var id = $(this).data('id');
            var nombre = $(this).data('nombre');
            Lobibox.window({
                title: 'Datos del Cliente: '+nombre,
                url: 'Modulos/Cliente/Formularios/ajaxVer.php',
                loadMethod: 'POST',
                params: {
                    id: id
                },
                width:600,
                height:500,
                closeOnEsc: false,
                closeButton:false,
                buttons: {
                    close: {
                        text: 'Cerrar',
                        closeOnClick: true
                    }
                }
            });
        });
    };
    return {
        TClienteG: function () {
            ClienteG();
        },
        TClienteE: function () {
            ClienteE();
        },
        Init:function () {
        	init();
        },
        DetalleCliente:function(){
            VerDetalleCliente();
        }
    };
}();
