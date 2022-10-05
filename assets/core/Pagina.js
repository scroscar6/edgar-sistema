var Validacion = function(){
    var PaginaG = function(){
        $('#PaginaAgregar').formValidation({
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
                'cp_titulo': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Título o Nombre de la Pagina.'
                        },
                        stringLength: {
                            min: 6,
                            max: 300,
                            message: 'El titulo debe tener mas de 6 y menos de 300 caracteres.'
                        }
                    }
                },
                'cp_categoria': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe seleccionar alguna categoría para la Pagina'
                        }
                    }
                },
                'cp_orden': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar un valor en el campo.'
                        }
                    }
                },
                'cp_vistaf': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar un valor en el campo.'
                        }
                    }
                },
                'cp_estado': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar un valor en el campo.'
                        }
                    }
                },
                'cp_descripcion': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El Contenido de la Pagina no puede quedar vacia.'
                        },
                        callback: {
                            message: 'La descripción debe tener como MAXIMO 20000 palabras',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                var div  = $('<div/>').html(value).get(0),
                                    text = div.textContent || div.innerText;

                                return text.length <= 20000;
                            }
                        }
                    }
                }
            }
        }).find('[name="cp_descripcion"]')
            .ckeditor()
            .editor
            .on('change', function() {
                $('#PaginaAgregar').formValidation('revalidateField', 'cp_descripcion');
            });
    };
    var PaginaE = function(){
        $('#PaginaEditar').formValidation({
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
                'cp_titulo': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Título o Nombre de la Pagina.'
                        },
                        stringLength: {
                            min: 6,
                            max: 300,
                            message: 'El titulo debe tener mas de 6 y menos de 300 caracteres.'
                        }
                    }
                },
                'cp_categoria': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe seleccionar alguna categoría para la Pagina'
                        }
                    }
                },
                'cp_orden': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar un valor en el campo.'
                        }
                    }
                },
                'cp_vistaf': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar un valor en el campo.'
                        }
                    }
                },
                'cp_estado': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'Debe ingresar un valor en el campo.'
                        }
                    }
                },
                'cp_descripcion': {
                    row: '.col-md-9',
                    validators: {
                        notEmpty: {
                            message: 'El Contenido de la Pagina no puede quedar vacia.'
                        },
                        callback: {
                            message: 'La descripción debe tener como MAXIMO 20000 palabras',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                var div  = $('<div/>').html(value).get(0),
                                    text = div.textContent || div.innerText;

                                return text.length <= 20000;
                            }
                        }
                    }
                }
            }
        }).find('[name="cp_descripcion"]')
            .ckeditor()
            .editor
            .on('change', function() {
                $('#PaginaEditar').formValidation('revalidateField', 'cp_descripcion');
            });
    };
    return {
        TPaginaG: function () {
            PaginaG();
        },
        TPaginaE: function () {
            PaginaE();
        }
    };
}();
