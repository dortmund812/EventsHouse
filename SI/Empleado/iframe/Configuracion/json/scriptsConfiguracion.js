$(document).ready(function(){
	// TRAER INFORMACION DEL USUARIO
	traerDatosCambio('HW');
	// ENVIO DE FORMULARIO
	$('#from_cambio').submit(function(){
		validarDatos();
		return false;
	});
	// CAMBIO DE IMAGEN
	var img = '';
	$('#cambio_foto').on('change', function(){
		img = $(this)[0].files[0].name
		cambiarImagen(this);
		var wimg = $('#imagen_user').width();
		$('#imagen_user').height(wimg);
	});
	// NOMBRE
	$('#cambio_nombre').on('change', function(){
		if ($(this).val().length > 50 || $(this).val().length < 3) {
			if ($(this).val() == ''){
				$(this).removeClass('error-solicitud');
			} else {
				$(this).addClass('error-solicitud');
			}
		} else {
			$(this).removeClass('error-solicitud');
		}
	});
	$('#cambio_nombre').on('keypress', function(){
		return soloLetras(event);
	});
	// APELLIDO
	$('#cambio_apellido').on('change', function(){
		if ($(this).val().length > 50 || $(this).val().length < 3) {
			if ($(this).val() == ''){
				$(this).removeClass('error-solicitud');
			} else {
				$(this).addClass('error-solicitud');
			}
		} else {
			$(this).removeClass('error-solicitud');
		}
	});
	$('#cambio_apellido').on('keypress', function(){
		return soloLetras(event);
	});
	// TELEFONO
	$('#cambio_telefono').on('change', function(){
		if ($(this).val().length == 7 || $(this).val().length == 10) {
			$(this).removeClass('error-solicitud');
			if ($(this).val().length == 10) {
				if ($(this).val() < 3000000000 || $(this).val() >= 4000000000) {
					$(this).addClass('error-solicitud');
				}
			}
		} else if ($(this).val() == '') {
			$(this).removeClass('error-solicitud');
		} else {
			$(this).addClass('error-solicitud');
		}
	});
	$('#cambio_telefono').on('keypress', function(){
		return soloNumeros(event);
	});
	// CONTRASEÑAS
	$('#registro_password').keyup(function(){
		validarPass();
	});
	// CONTRASEÑAS
	$('#registro_password2').keyup(function(){
		validarPass();
	});
	// TRAER DATOS DE CAMBIO
	function traerDatosCambio(consulta){
		$.ajax({
			url: 'json/php/traerDatosCambio',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#imagen_user').attr('src', '../../../../img/personal/usuarios/' + respuesta[0]);
			$('#cambio_nombre').attr('placeholder', respuesta[1]);
			$('#cambio_apellido').attr('placeholder', respuesta[2]);
			$('#cambio_telefono').attr('placeholder', respuesta[3]);
			$('#cambio_correo').attr('placeholder', respuesta[4]);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// CAMBIAR LA IMAGEN DE USUARIO
	function cambiarImagen(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#imagen_user').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	// SUBIR IMAGEN
	function subirImagen(){
		var formData = new FormData();
		var files = $('#cambio_foto')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: '../../../../json/Index/php/validarRegistro',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
			}
		});
	}
	// FUNCION VALIDAR NUMEROS
	function soloNumeros(e) {
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = "1234567890";
		especiales = [8, 37, 39, 46];

		tecla_especial = false
		for(var i in especiales) {
			if(key == especiales[i]) {
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla) == -1 && !tecla_especial)
			return false;
	}
	// FUNCION VALIDAR LETRAS
	function soloLetras(e) {
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
		especiales = [8, 37, 39, 46];

		tecla_especial = false
		for(var i in especiales) {
			if(key == especiales[i]) {
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla) == -1 && !tecla_especial)
			return false;
	}
	// VALIDAR CONTRASEÑAS
	function validarPass(){
		// NI MENOR A 4 NI MAYOR A 50
		if ($('#registro_password').val().length < 4 || $('#registro_password').val().length > 50) {
			$('#registro_password').addClass('error-solicitud');
			if ($('#registro_password2').val() != $('#registro_password').val()) {
				$('#registro_password2').addClass('error-solicitud');
				$('#error_pass').text('*Las contraseñas no coinciden');
				$('#success_pass').text('');
			}
			if ($('#registro_password').val() == '') {
				if ($('#registro_password2').val() != '') {
					$('#registro_password2').addClass('error-solicitud');
				} else {
					$('#registro_password2').removeClass('error-solicitud');
					$('#error_pass').text('');
				}
				$('#registro_password').removeClass('error-solicitud');
			}
		} else {
			if ($('#registro_password2').val() != $('#registro_password').val()) {
				$('#registro_password2').addClass('error-solicitud');
				$('#error_pass').text('*Las contraseñas no coinciden');
				$('#success_pass').text('');
			} else {
				$('#registro_password').removeClass('error-solicitud');
				$('#registro_password2').removeClass('error-solicitud');
				$('#error_pass').text('');
				$('#success_pass').text('Las contraseñas coinciden');
			}
		}
	}
	// VALIDAR DATOS
	function validarDatos(){
		$.ajax({
			url: 'json/php/validarActualPass',
			type: 'POST',
			dataType: 'html',
			data: {consulta: $('#password_actual').val()},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#password_actual').removeClass('error-solicitud');
				$('#error_pass').text('');
				if (comprobarCampos()) {
					$('#error_pass').text('');
					subirImagen();
					modificarUsuario(img, $('#cambio_nombre').val(), $('#cambio_apellido').val(), $('#cambio_telefono').val(), $('#password_actual').val(), $('#registro_password').val());
				} else {
					$('#error_pass').text('*Llena los datos correctamente');
				}
			} else {
				if ($('#password_actual').val() == '') {
					$('#error_pass').text('*Porfavor Ingresa tu contraseña');
					$('#password_actual').addClass('error-solicitud');	
				} else {
					$('#error_pass').text('*Contraseña incorrecta');
					$('#password_actual').addClass('error-solicitud');
				}
				
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// COMPROBAR CAMPOS
	function comprobarCampos(){
		if ($('#cambio_nombre').hasClass("error-solicitud") == true
			|| $('#cambio_apellido').hasClass("error-solicitud") == true
			|| $('#cambio_telefono').hasClass("error-solicitud") == true
			|| $('#registro_password').hasClass("error-solicitud") == true
			|| $('#registro_password2').hasClass("error-solicitud") == true) {
			return false;
		} else {
			return true;
		}
	}
	// MODIFICAR USUARIO
	function modificarUsuario(foto, nombre, apellido, telefono, actPass, password){
		$.ajax({
			url: 'json/php/actualizarUsuario',
			type: 'POST',
			dataType: 'html',
			data: {foto: foto, nombre: nombre, apellido: apellido, telefono: telefono, actPass: actPass, password: password},
		})
		.done(function(respuesta){
			window.location.href = 'configuracion';
		})
		.fail(function(){
			console.log('error');
		});
	}
});