var Validacion = function(){
    var PublicidadG = function(){
        $('#PublicidadAgregar').formValidation({
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
                'cp_titulo': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Título o Nombre de la publicidad.'
                        },
                        stringLength: {
                            min: 6,
                            max: 200,
                            message: 'El titulo debe tener mas de 6 y menos de 200 caracteres.'
                        }
                    }
                },
                'cp_url': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'La Url es necesaria.'
                        },
                        uri: {
                            message: 'La dirección Url no es valida.'
                        }
                    }
                },
                'cp_categoria': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar alguna posición para la publicidad.'
                        }
                    }
                },
                'cp_orden': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debes ingresar un número para poder ordenar tu publicidad.'
                        }
                    }
                },
                'cp_estado': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe elejir algun estado para la publicidad.'
                        }
                    }
                },
                'cp_archivo': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Selecciona alguna imagen.'
                        },
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 8097152,
                            message: 'El archivo seleccionado no es válido.'
                        }
                    }
                }
             }
            });
    };
    var PublicidadE = function(){
        $('#PublicidadEditar').formValidation({
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
                'cp_titulo': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Título o Nombre de la publicidad.'
                        },
                        stringLength: {
                            min: 6,
                            max: 200,
                            message: 'El titulo debe tener mas de 6 y menos de 200 caracteres.'
                        }
                    }
                },
                'cp_url': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'La Url es necesaria.'
                        },
                        uri: {
                            message: 'La dirección Url no es valida.'
                        }
                    }
                },
                'cp_categoria': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar alguna posición para la publicidad.'
                        }
                    }
                },
                'cp_orden': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debes ingresar un número para poder ordenar tu publicidad.'
                        }
                    }
                },
                'cp_estado': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe elejir algun estado para la publicidad.'
                        }
                    }
                },
                'cp_archivo': {
                    row: '.col-md-9',
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 8097152,
                            message: 'El archivo seleccionado no es válido.'
                        }
                    }
                }
            }
        });
    };
    return {
        TPublicidadG: function () {
            PublicidadG();
        },
        TPublicidadE: function () {
            PublicidadE();
        }
    };
}();