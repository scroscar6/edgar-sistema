var Validacion = function(){
    var ConfigE = function(){
        $('#ConfigEditar').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
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
                'cp_email': {
                    row: '.col-md-6',
                    validators: {
                        emailAddress: {
                            message: 'Este no es un email.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'El valor que ingresaste no es Email válido'
                        }
                    }
                },
                'cp_email1': {
                    row: '.col-md-6',
                    validators: {
                        emailAddress: {
                            message: 'Este no es un email.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'El valor que ingresaste no es Email válido'
                        }
                    }
                },
                'cp_email2': {
                    row: '.col-md-6',
                    validators: {
                        emailAddress: {
                            message: 'Este no es un email.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'El valor que ingresaste no es Email válido'
                        }
                    }
                },
                'cp_direc': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la dirección de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_telef': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el teléfono de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_urlfb': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el FanPage Facebook de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_urltw': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Twitter de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_urlyt': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el YouTube de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_urligo': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Google+ de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_titulo': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Titulo de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_tituloext': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el Titulo Extendido de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_metadesc': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la MetaDescripción de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_metakeys': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la MetaKeys de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_frase': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la Frase Eslogan de la Empresa u/o Organización.'
                        }
                    }
                },
                'cp_url': {
                    row: '.col-md-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese la URL FIJA de la Empresa u/o Organización.'
                        }
                    }
                }
            }
        }).on('err.validator.fv', function(e, data) {
            if (data.field === 'cp_email' || data.field === 'cp_email1' || data.field === 'cp_email2') {
                data.element
                    .data('fv.messages')
                    // Hide all the messages
                    .find('.help-block[data-fv-for="' + data.field + '"]').hide()
                    // Show only message associated with current validator
                    .filter('[data-fv-validator="' + data.validator + '"]').show();
            }
        });
    };
    return {
        TConfigE: function () {
            ConfigE();
        }
    };
}();
