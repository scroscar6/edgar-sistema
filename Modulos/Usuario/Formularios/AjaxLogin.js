function creaAjax(){
         var objetoAjax=false;
         try {
          /*Para navegadores distintos a internet explorer*/
          objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
          try {
                   /*Para explorer*/
                   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
                   }
                   catch (E) {
                   objetoAjax = false;
          }
         }

         if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
          objetoAjax = new XMLHttpRequest();
         }
         return objetoAjax;
}




 function AjaxLogin (url,capa,valores)
{
          var ajax=creaAjax();
          var capaContenedora = document.getElementById(capa);

/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/

         ajax.open ('POST', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                         capaContenedora.innerHTML='<img height="16" width="16" src="images/loading.gif" alt="Realizando la operación..."> Realizando la operaci&oacute;n...';
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200)
                   {
                        
						document.getElementById(capa).innerHTML=ajax.responseText;
						//var respuesta = ajax.responseText;
	
						
                   }
                   else if(ajax.status==404)
                                             {

                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                           else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
                  }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(valores);
         return;

/*Creamos y ejecutamos la instancia si el metodo elegido es GET*/

} 


 function AjaxEmail(url,capa,valores)
{
          var ajax=creaAjax();
          var capaContenedora = document.getElementById(capa);

/*Creamos y ejecutamos la instancia si el metodo elegido es POST*/

         ajax.open ('POST', url, true);
         ajax.onreadystatechange = function() {
         if (ajax.readyState==1) {
                          //capaContenedora.innerHTML='<table width="100%" height="100%"><tr><td align="center" valign="middle"><img src="imagenes/cargar.gif"></td></tr></table>';
         }
         else if (ajax.readyState==4){
                   if(ajax.status==200)
                   {
                        
						//document.getElementById(capa).innerHTML=ajax.responseText;
						var respuesta = ajax.responseText;
						
						switch(respuesta){
							case "1":
								//alert("Codigo Ya existe");
								var a="<span style='color:#CC0000';>Este e-mail ya está en uso.</span>";
								//document.getElementById('cmp_codigo').value = "";
								document.getElementById('cmp_email').focus();
								
							break;
							
							case "2":
								var a="<span style='color:#00CC00';>Este e-mail est&aacute; disponible.</span>";
								//alert("Codigo dispobible");
							break;
							
							case "3":
								var a="<span style='color:#CC0000';>Contiene caracteres raros.</span>";
								document.getElementById('cmp_email').focus();
								//alert("Contiene caracteres raros");
							break;
							
							default:
								var a="Ingrese su e-mail."
								document.getElementById('cmp_email').focus();
						}
						
						document.getElementById(capa).innerHTML=a;
						
                   }
                   else if(ajax.status==404)
                                             {

                            capaContenedora.innerHTML = "La direccion no existe";
                                             }
                           else
                                             {
                            capaContenedora.innerHTML = "Error: ".ajax.status;
                                             }
                                    }
                  }
         ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
         ajax.send(valores);
         return;

/*Creamos y ejecutamos la instancia si el metodo elegido es GET*/

} 