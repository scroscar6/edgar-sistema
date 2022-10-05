$(function(){
	jQuery.validator.setDefaults({
		debug: true,
		success: "valid"
	});
	
	//Usuario Agregar
	if($("#UsuarioAgregar").length){
		$.validator.addMethod("loginRegex", function(value, element) {
			return this.optional(element) || /^[a-zA-Z0-9\.]+$/i.test(value);
		}, "Nombre de usuario debe contener sólo letras, números y puntos.");
		
		//validar usuario
		$.validator.addMethod("checkUsername", function(value, element) {
			var result = false;
			$.ajax({
				type:"GET",
				async: false,
				cache: false,
				url: "Modulos/Usuario/Formularios/checkUsername.php?username=" + value,
				success: function(msg) {
					result = (msg == "true") ? false : true;
				}
			});
			return result;
		}, "Nombre de usuario ya existe.");
		
		//validar e-mail
		$.validator.addMethod("checkEmail", function(value, element) {
			var result = false;
			$.ajax({
				type:"GET",
				async: false,
				cache: false,
				url: "Modulos/Usuario/Formularios/checkEmail.php?email=" + value,
				success: function(msg) {
					result = (msg == "true") ? false : true;
				}
			});
			return result;
		}, "Este correo electrónico ya está registrado.");
		
		//validate Usuario
		$("#UsuarioAgregar").validate({
			rules: {
				'tag-nombre': {required: true, minlength: 6},
				'tag-apellido': {required: true, minlength: 1},
				'tag-usuario': {required: true, minlength: 6, maxlength:12, loginRegex:true, checkUsername:true},
				'tag-email': {required: true, email:true, checkEmail:true},
				'tag-contrasena': {required: true, minlength: 6, password: "#tag-usuario"},
				'tag-contrasena1': {required: true, minlength: 6, equalTo: "#tag-contrasena"},
				'tag-tipo': {required: true},
				'tag-estado': {required: true}
			},
			messages: {
				'tag-contrasena1': {equalTo: "Por favor, introduzca la misma contraseña que el anterior"}
			},
			submitHandler: function(form){
				//alert('El formulario ha sido validado correctamente!');
				form.submit();
			}
		});
	}
	
	//Usuario Editar
	if($('#UsuarioEditar').length){
		
		$.validator.addMethod("loginRegex", function(value, element) {
			return this.optional(element) || /^[a-zA-Z0-9\.]+$/i.test(value);
		}, "Nombre de usuario debe contener sólo letras, números y puntos.");
		
		//validar usuario
		$.validator.addMethod("checkUsername", function(value, element) {
			var usercompara = $('#tag-usuario1').val();
			var result = false;
			$.ajax({
				type:"GET",
				async: false,
				cache: false,
				url: "Modulos/Usuario/Formularios/checkUsername.php?username=" + value + "&username1=" + usercompara,
				success: function(msg) {
					result = (msg == "true") ? false : true;
				}
			});
			return result;
		}, "Nombre de usuario ya existe.");
		
		//validar e-mail
		$.validator.addMethod("checkEmail", function(value, element) {
			var emailcompara = $('#tag-email1').val();
			var result = false;
			$.ajax({
				type:"GET",
				async: false,
				cache: false,
				url: "Modulos/Usuario/Formularios/checkEmail.php?email=" + value + "&email1=" + emailcompara,
				success: function(msg) {
					result = (msg == "true") ? false : true;
				}
			});
			return result;
		}, "Este correo electrónico ya está registrado.");
		
		$("#UsuarioEditar").validate({
			rules: {
				'tag-nombre': {required: true, minlength: 6},
				'tag-apellido': {required: true, minlength: 1},
				'tag-usuario': {required: true, minlength: 6, maxlength:12, loginRegex:true, checkUsername:true},
				'tag-email': {required: true, email:true, checkEmail:true},
				'tag-contrasena': {password: false, required: true, minlength: 8},
				'tag-contranueva': {password: true, required: true, minlength: 8, password: "#tag-usuario"},
				'tag-contranueva1': {password: true, required: true, equalTo: "#tag-contranueva"},
				'tag-tipo': {required: true},
				'tag-estado': {required: true}
			},
			messages: {
				'tag-contranueva1': {equalTo: "Por favor, introduzca la misma contraseña que el anterior"}
			},
			submitHandler: function(form){
				//alert('El formulario ha sido validado correctamente!');
				form.submit();
			}
		});
	}
	
});