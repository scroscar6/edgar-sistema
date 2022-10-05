	function abrir_popup (pagina,ancho,altura) {
		var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=" + ancho + ", height=" + altura + ", top=85, left=140";
		window.open(pagina,"",opciones);
	}
	function Link(vinculo){
		open(vinculo, "_parent");
	}
	function strstr(a,c,d){var b=0,a=a+"",b=a.indexOf(c);return-1==b?!1:d?a.substr(0,b):a.slice(b)};
	function Borrar(url){
		if(confirm("¿Desea Borrar el Registro?")){
			open(url, "_parent");
		}
	}
	function Restaurar(url){
		if(confirm("¿Desea Restaurar el Registro?")){
			open(url, "_parent");
		}
	}
	function Eliminar(url){
		swal({
			title: "Eliminar Registro?",
			text: "presione cancelar si decea evitar esto.",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: 'btn-danger',
			confirmButtonText: 'Eliminar',
			cancelButtonText: "Cancelar",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
			if(isConfirm){
				swal({
					title: "Eliminando",
					text: "...",
					type: "success",
					closeOnConfirm: true
				},function(){
					setTimeout(function () {
						open(url, "_parent");
					}, 500);
				});
			}else{
				swal("Cancelado", "Revisa tu informacion antes de eliminar", "error");
			}
		});
	}
	function RestaurarTodo(url){
		if(confirm("¿Desea restaurar todos los elementos?")){
			open(url, "_parent");
		}
	}
	function VaciarPapelera(url){
		if(confirm("¿Desea eliminar completamente todos los elementos? \n Recuerde que una vez realizada la accion no se podra recuperar los registros.")){
			open(url, "_parent");
		}
	}
	function objetoAjax(){
	  var xmlhttp=false;
	  try {
	  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	  } catch (e) {
		  try {
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (e) {
		  xmlhttp = false;
		  }
	  }
	  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  	xmlhttp = new XMLHttpRequest();
	  }
	  return xmlhttp;
	}
	function Mostrar_Contenido_Div(url,contenedor){
			divResultado = document.getElementById(contenedor);
			ajax1=objetoAjax();
			ajax1.open("GET", url);
			ajax1.onreadystatechange=function() {
				   switch (ajax1.readyState) 
				   {
						case 4:
							divResultado.innerHTML = ajax1.responseText;  
						break;
						case 1:divResultado.innerHTML='<br/><br/><br/><div align="center"><img src="imagenes/cargador2.gif" ><br>Cargando<br>Por favor espere...</div><br/><br/><br/><br/><br/><br/><br/>';break;
				   }
			}
			ajax1.send(null);
	}
	var nav4 = window.Event ? true : false;
	function obtenerAnchoPagina(){
		return screen.width;
	}
	function obtenerAltoPagina(){
		return screen.height;
	}
	function centrarObj(obj,w,h){
		var top = ((obtenerAltoPagina()-h)/2)-100;
		var left = (obtenerAnchoPagina()-w)/2;
		document.getElementById(obj).style.top = top;
		document.getElementById(obj).style.left = left;
	}
	function cerrarSesion(url){
		swal({
			title: "Deceas cerrar la sesion?",
			text: "Asegurese de guardar correctamente todos sus avances",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: 'btn-danger',
			confirmButtonText: 'Si, ya e terminado!',
			cancelButtonText: "No, me falta!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
			if(isConfirm){
				swal("Cerrando", "...", "error");
				document.location.href = url;
			}else{
				swal("Buena decision!", "Siempre hay algo que hacer en WAS!", "success");
			}
		});
	}
	function oClick(url){
		document.location.href = url;
	}
	function colorFondo(src,clrOver) {
		src.bgColor = clrOver;
	}
	function colorFondoMenu(src,clrOver) {
		src.bgColor = clrOver;
	}
	function mostrarVineta(obj,ver){
		document.getElementById(obj).style.display = ver;
	}
	function ltrim(s) { return s.replace(/^\s+/, ""); }
	function rtrim(s) { return s.replace(/\s+$/, ""); }
	function trim(s)  { return rtrim(ltrim(s)); }
	function eliminarUno(url,txt){
		var msg = 'Realmente desea eliminar '+txt;
		if(confirm(msg)){
			document.location.href=url;
		}
	}
	function marcarDesmarcar(frm,total,colorMarcado,colorDesmarcado){
		var marcado = eval("frm.chkGeneral.checked");
		var nombre;
		var fila;
		var i;
		for(i=1; i<=total; i++){
			nombre = "chk"+i;
			fila = "fl"+i;
			eval("frm."+nombre+".checked="+marcado);
			if(marcado==true) document.getElementById(fila).style.backgroundColor = colorMarcado;
			else document.getElementById(fila).style.backgroundColor=colorDesmarcado;
		}
	}
	function verificar_total_check(frm,total){
		var j=0;
		var varCheck;
		for(i=1;i<=total;i++){
			obj="chk"+i;
			varCheck = eval("frm."+obj+".checked");
			if(varCheck == true) j=j+1;
		}
		if(j==total) eval("frm.chkGeneral.checked=true");
		else eval("frm.chkGeneral.checked=false");
	}
	function marcar(frm,obj,fila,totalCheck,colorMarcado,colorDesmarcado) {
		var varCheck = eval("frm."+obj+".checked");
		if (varCheck == true){
			eval("frm."+obj+".checked=true");
			document.getElementById(fila).style.backgroundColor=colorDesmarcado;
		}else{
			eval("frm."+obj+".checked=false");
			document.getElementById(fila).style.backgroundColor = colorMarcado;
		}
		verificar_total_check(frm,totalCheck);
	}
	function marcarOption(fila,totFilas,colorMarcado,colorDesmarcado){
		var varFila;
		for(i=1;i<=totFilas;i++){
			varFila = "fl"+i;
			if(varFila==fila){
				document.getElementById(varFila).style.backgroundColor = colorMarcado;
			}else{
				document.getElementById(varFila).style.backgroundColor = colorDesmarcado;
			}
		}
	}
	function soloNumero(evt){
		var key = nav4 ? evt.which : evt.keyCode;	//46
		return (key <= 13 || (key >= 48 && key <= 57));
	}

	function limpiarCaja(caja,valor){
		var valorAnt = trim(valor);
		if(valorAnt!=""){
			switch(valorAnt){
				case "-- buscar --":
					caja.value="";
					break;
			}
		}else{
			switch(caja.name){
				case "buscar":	
					caja.value="-- buscar --";
					break;
			}
		}
	}
	function cambiarEstilo(obj,estilo1,estilo2){
		obj.className=estilo1;
		if(trim(obj.value)!=""){
			obj.className=estilo2;
		}
	}
	function cambiarEstiloPaginacion(obj,estilo){
		obj.className=estilo;
	}
	function cambiarEstiloPaginacion(obj,estilo){
		obj.className=estilo;
	}
	function cambiarEstilo(obj,estilo){
		obj.className=estilo;
	}
	function Tip(){
	}
	function UnTip(){
	}

	$(document).ready(function(){
		$(".date_time_regular").datetimepicker({
		    autoclose: !0,
		    isRTL: App.isRTL(),
		    format:'dd/mm/yyyy hh:ii',
		    language: 'es',
		    pickerPosition: App.isRTL() ? "bottom-right" : "bottom-left",
		    formatDate:'Y/m/d'
		})
	});