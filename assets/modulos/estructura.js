$('.txt_tag').tagsinput({trimValue: true});
$(".form_datetime_s").datetimepicker({
    isRTL: false,
    format: 'dd/mm/yyyy hh:ii',
    autoclose:true,
    language: 'es'
});
var ClassAjax = function (){
    var ruta_clave_sound = function(){
        var ruta =  'assets/global/plugins/lobibox-master/dist/sounds/';
        return ruta;
    };
    var ObtenerEnviarValoresEventos = function(form,valor,ruta,extra_d){
        var formulario = form;
        var valores =  valor;
        var rutap  = new String(ruta);
        var ruta  = new String(ruta);
        var sd = new Array();
        var n = '';
        var b = '';
        var ki = [];
        var string = '';
        $(document).ready(function() {
            $("#"+extra_d.text_q).val('');
            for (var j = 0; j < valores.length; j++) {
                sd.push('#'+valores[j]);
                for (var i = 0; i < valores.length; i++) {
                    n = valores[j];
                    b = $('#'+n).val();
                    ki[j] = n+'='+b;
                };
                string += ki[j]+"&";
            };
            App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
            $.ajax({
                url: ruta,
                data: string+'ruta='+rutap,
                type:"GET",
                cache: false
            }).done(function(html) {
                $("#Registros_rows").html(html);
                App.unblockUI("#"+form);
            });
            string = '';
        });
        $(sd.join(',')).on('keyup change',function(){
            $("#"+extra_d.text_q).val('');
            for (var j = 0; j < valores.length; j++) {
                for (var i = 0; i < valores.length; i++) {
                    n = valores[j];
                    b = $('#'+n).val();
                    ki[j] = n+'='+b;
                };
                string += ki[j]+"&";
            };
            App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
            $.ajax({
                url: ruta,
                data: string+'ruta='+rutap,
                type:"GET",
                cache: false
            }).done(function(html) {
                $("#Registros_rows").html(html);
                App.unblockUI("#"+form);
            });
            string = '';
        });


        if (extra_d.text_q != '' && extra_d.btn_q != ''){
            $("#"+extra_d.btn_q).on('click',function (e) {
                var busqueda = $('#'+extra_d.text_q).val();
                for (var j = 0; j < valores.length; j++) {
                    for (var i = 0; i < valores.length; i++) {
                        n = valores[j];
                        b = $('#'+n).val();
                        ki[j] = n+'='+b;
                    };
                    string += ki[j]+"&";
                };
                App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
                $.ajax({
                    url: ruta,
                    data: string+'ruta='+rutap+"&busqueda="+busqueda,
                    type:"GET",
                    cache: false
                }).done(function(html) {
                    $("#Registros_rows").html(html);
                    App.unblockUI("#"+form);
                });
                string = '';
            });
           $("#"+extra_d.text_q).on('keypress',function (e) {
                if (e.which == '13') {
                    var busqueda = $('#'+extra_d.text_q).val();
                    for (var j = 0; j < valores.length; j++) {
                        for (var i = 0; i < valores.length; i++) {
                            n = valores[j];
                            b = $('#'+n).val();
                            ki[j] = n+'='+b;
                        };
                        string += ki[j]+"&";
                    };
                    App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
                    $.ajax({
                        url: ruta,
                        data: string+'ruta='+rutap+"&busqueda="+busqueda,
                        type:"GET",
                        cache: false
                    }).done(function(html) {
                        $("#Registros_rows").html(html);
                        App.unblockUI("#"+form);
                    });
                    string = '';
                }
            });
        }
    };
    var ObtenerEnviarValoresEventosRegistros_rows = function(form,valor,ruta,extra_d,espacio_ajax){
        var formulario = form;
        var valores =  valor;
        var rutap  = new String(ruta);
        var ruta  = new String(ruta);
        var sd = new Array();
        var n = '';
        var b = '';
        var ki = [];
        var string = '';
        $(document).ready(function() {
            $("#"+extra_d.text_q).val('');
            for (var j = 0; j < valores.length; j++) {
                sd.push('#'+valores[j]);
                for (var i = 0; i < valores.length; i++) {
                    n = valores[j];
                    b = $('#'+n).val();
                    ki[j] = n+'='+b;
                };
                string += ki[j]+"&";
            };
            App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
            $.ajax({
                url: ruta,
                data: string+'ruta='+rutap,
                type:"GET",
                cache: false
            }).done(function(html) {
                $("#"+espacio_ajax).html(html);
                App.unblockUI("#"+form);
            });
            string = '';
        });
        $(sd.join(',')).on('keyup change',function(){
            $("#"+extra_d.text_q).val('');
            for (var j = 0; j < valores.length; j++) {
                for (var i = 0; i < valores.length; i++) {
                    n = valores[j];
                    b = $('#'+n).val();
                    ki[j] = n+'='+b;
                };
                string += ki[j]+"&";
            };
            App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
            $.ajax({
                url: ruta,
                data: string+'ruta='+rutap,
                type:"GET",
                cache: false
            }).done(function(html) {
                $("#"+espacio_ajax).html(html);
                App.unblockUI("#"+form);
            });
            string = '';
        });


        if (extra_d.text_q != '' && extra_d.btn_q != ''){
            $("#"+extra_d.btn_q).on('click',function (e) {
                var busqueda = $('#'+extra_d.text_q).val();
                for (var j = 0; j < valores.length; j++) {
                    for (var i = 0; i < valores.length; i++) {
                        n = valores[j];
                        b = $('#'+n).val();
                        ki[j] = n+'='+b;
                    };
                    string += ki[j]+"&";
                };
                App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
                $.ajax({
                    url: ruta,
                    data: string+'ruta='+rutap+"&busqueda="+busqueda,
                    type:"GET",
                    cache: false
                }).done(function(html) {
                    $("#"+espacio_ajax).html(html);
                    App.unblockUI("#"+form);
                });
                string = '';
            });
           $("#"+extra_d.text_q).on('keypress',function (e) {
                if (e.which == '13') {
                    var busqueda = $('#'+extra_d.text_q).val();
                    for (var j = 0; j < valores.length; j++) {
                        for (var i = 0; i < valores.length; i++) {
                            n = valores[j];
                            b = $('#'+n).val();
                            ki[j] = n+'='+b;
                        };
                        string += ki[j]+"&";
                    };
                    App.blockUI({target: "#"+form,boxed: !0,message: "Cargando...",baseZ: 9999999});
                    $.ajax({
                        url: ruta,
                        data: string+'ruta='+rutap+"&busqueda="+busqueda,
                        type:"GET",
                        cache: false
                    }).done(function(html) {
                        $("#"+espacio_ajax).html(html);
                        App.unblockUI("#"+form);
                    });
                    string = '';
                }
            });
        }
    };
    var EliminarDatos = function(ruta){
        var ruta = ruta;
        $(function() {
            $('.eliminar').click(function(){
                var id = $(this).data('id');
                var d = $(this).data('d');
                bootbox.confirm("Deceas eliminar el registro con detalle : "+d+"  <small>("+id+")</small>?", function(result){
                    if (result){
                        var url = ruta; // El script a dónde se realizará la petición.
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: 'id='+id+"&d="+d, // Adjuntar los campos del formulario enviado.
                            success: function(data)
                            {
                                $("#response").html(data); // Mostrar la respuestas del script PHP.
                                $('#busqueda').trigger('change');
                            }
                        });
                    }
                });
            });
        });
    };
    var actualizarEstados = function(ruta){
        var ruta = ruta;

        $(function() {
            $('.estado').click(function(){
                var actual = this;
                var id = $(this).data('id');
                var url = ruta; // El script a dónde se realizará la petición.
                if ($(this).hasClass('green')){
                        $(this).removeClass("green");
                        $(this).addClass("red");
                        $(this).html('<i class="fa fa-remove"></i>No Activo');
                }else{
                        $(this).removeClass("red");
                        $(this).addClass("green");
                        $(this).html('<i class="fa fa-check"></i>Activo');
                };
                $.ajax({
                   type: "GET",
                   url: url,
                   data: 'id='+id, // Adjuntar los campos del formulario enviado.
                   success: function(data)
                   {
                        if (data.indexOf('Error de Permisos!') > 0) {
                            if ($(actual).hasClass('green')){
                                    $(actual).removeClass("green");
                                    $(actual).addClass("red");
                                    $(actual).html('<i class="fa fa-remove"></i>No Activo');
                            }else{
                                    $(actual).removeClass("red");
                                    $(actual).addClass("green");
                                    $(actual).html('<i class="fa fa-check"></i>Activo');
                            };
                            $("#response").html(data);
                        }else{
                            $("#response").html(data); // Mostrar la respuestas del script PHP.
                        };
                   }
                 });
            });
        });
    };
    return{
        valoresAjax: function(form,valor,ruta,extra_d){
            ObtenerEnviarValoresEventos(form,valor,ruta,extra_d);
        },
        simpleAjax: function(form,valor,ruta,extra_d,espacio_ajax){
            ObtenerEnviarValoresEventosRegistros_rows(form,valor,ruta,extra_d,espacio_ajax);
        },
        ajaxEliminar: function(ruta){
            EliminarDatos(ruta);
        },
        ajaxEstados: function(ruta){
            actualizarEstados(ruta);
        },
        RutaSound: function(){
            return ruta_clave_sound();
        }
    };
}();
var Funciones = function(){
    var Eliminar = function(){
    }
    var paginar__ = function(element){
        $("#load_animate").css("visibility", "visible");
        var ydata_url = $(element).attr("data-url");
        $.ajax({
            url: ydata_url,
            cache: false,
            type: "GET"
        }).done(function( html ) {
            $("#Registros_rows").html(html);
            $("#load_animate").css("visibility", "hidden");
        });
    }
    var formatoMoneda = function(number, places, symbol, thousand, decimal) {
        number = number || 0;
        places = !isNaN(places = Math.abs(places)) ? places : 2;
        symbol = symbol !== undefined ? symbol : "S/. ";
        thousand = thousand || ",";
        decimal = decimal || ".";
        var negative = number < 0 ? "-" : "",
            i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
    }
    var Redireccion = function(url) {
        window.location.href = url;
    }
    var Ajax = function(rutas,contenedor){
        $.ajax({
            type: "POST",
            url: rutas,
            data: 'completado', // Adjuntar los campos del formulario enviado.
            success: function(data)
            {
            $("#"+contenedor).empty(data);
            $("#"+contenedor).html(data);
            }
        });
    }
    var TEstado = function(nombre_tabla,ruta,post){
        var columna = '';
        var alias = '';
            if (post != false){
                alias = post.alias;
                columna = post.nombre;
            }else{
                post =false;
            }
            var ruta = ruta;
            $('#'+nombre_tabla+' tbody').on('click', 'a.estado', function () {
                var url = ruta;
                var table = $('#'+nombre_tabla).DataTable();
                var data = table.row($(this).parent('td').parent()).data();
                var ajax_POST = '';
                var actual = this;
                if ($(this).hasClass('green')){
                        $(this).removeClass("green");
                        $(this).addClass("red");
                        $(this).html(' Inactivo <i class="fa fa-remove"></i> ');
                }else{
                        $(this).removeClass("red");
                        $(this).addClass("green");
                        $(this).html(' Activo <i class="fa fa-check"></i> ');
                };
                if (post == false)
                {
                    data = data;
                    ajax_POST = data;
                }else{
                    data = data[columna];
                    ajax_POST = alias+"="+data;
                }
                $.ajax({
                    type: "POST",
                    url: url,
                    data:ajax_POST, // Adjuntar los campos del formulario enviado.
                    success: function(datos){
                        if (datos.indexOf('true') > 0) {
                            Mensaje.init('success','Modificación de Estado Exitosa ','Aviso Importante');
                        }else{
                            if ($(actual).hasClass('green')){
                                    $(actual).removeClass("green");
                                    $(actual).addClass("red");
                                    $(actual).html(' Inactivo <i class="fa fa-remove"></i> ');

                            }else{
                                    $(actual).removeClass("red");
                                    $(actual).addClass("green");
                                    $(actual).html(' Activo <i class="fa fa-check"></i> ');

                            };
                            Mensaje.init('error','ocurrio un problema en la validacion','Aviso Importante');
                        };
                    }
                });
                //table.ajax.reload();
            } );
    }
    return {
        Estado: function(nombre_tabla,ruta,post){
            TEstado(nombre_tabla,ruta,post);
        },
        init: function () {
        },
        url: function(url){
            Redireccion(url);
        },
        ajax: function(rutas,contenedor){
                Ajax(rutas,contenedor);
        },
        paginar: function(element){
            paginar__(element);
        },
        formatoMoney: function(numero){
            formatoMoneda(numero);
        }
    };

}();