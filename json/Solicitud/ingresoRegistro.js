$(document).ready(function(){
	// MODAL DE REGISTRO E INGRESO
	$('#btn_menu_ingresar').on('click', function(e){
		e.preventDefault();
		ingresar();
	});
	$('#btn_modal_registro').on('click', function(e){
		e.preventDefault();
		registrarse();
	});
	$('#btn_modal_ingreso').on('click', function(e){
		e.preventDefault();
		ingresar();
	});
	function ingresar(){
		$('#modal_ingreso').animate({
			left: '0px'
		}, 0);
		$('#modal_registro').animate({
			left: '-100vw'
		}, 0);
	}
	function registrarse(){
		$('#modal_ingreso').animate({
			left: '100vw'
		}, 0);
		$('#modal_registro').animate({
			left: '0px'
		}, 0);
	}
	// INGRESO DE UN USUARIO
	$('#correo').on('change', function(){
		validarImagenCorreo($(this).val());
	});

	function validarImagenCorreo(consulta){
		$.ajax({
			url: '../../json/Index/php/validarImagenCorreo',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			var estado = respuesta;
			$('#usuario_submit_ingresar').attr('src', '../../img/personal/usuarios/' + estado);
		})
		.fail(function(){
			console.log('error');
		});
	}
	function validarDatos(correo, password){
		$.ajax({
			url: '../../json/Index/php/validarIngreso',
			type: 'POST',
			dataType: 'html',
			data: {correo: correo, password: password}
		})
		.done(function(respuesta){
			if (respuesta == 'true') {
				alert('Sesion Iniciada');
			} else if (respuesta == 'Deshabilitado') {
				alert('Sesion No iniciada');
			} else {
				$('.alerta-modal').removeClass('d-none');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}

	$('#btn_submit_ingresar').on('click', function(e){
		e.preventDefault();
		validarDatos($('#correo').val(), $('#password').val());
		$('#cerrar_modal').click();
	});

	// TAMAÑO DE LA IMAGEN DE USUARIO
	var iur = $('#imagen_usuario_registro').width();
	$('#imagen_usuario_registro').height(iur*2.5);

	// SUBIR UNA IMAGEN
	$('#subir_foto').on('change', function(){
		cambiarImagen();
	});
	// VALIDAR NOMBRE
	$('#registro_nombre').on('keypress', function(){
		return soloLetras(event);
	});
	$('#registro_nombre').on('change', function(){
		validarNombre($(this).val());
	});
	// VALIDAR APELLIDO
	$('#registro_apellido').on('keypress', function(){
		return soloLetras(event);
	});
	$('#registro_apellido').on('change', function(){
		validarApellido($(this).val());
	});
	// VALIDAR TELEFONO
	$('#registro_telefono').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#registro_telefono').on('change', function(){
		validarTelefono($(this).val());
	});
	// VALIDAR CEDULA
	$('#registro_cedula').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#registro_cedula').on('change', function(){
		validarCedula($(this).val());
	});
	// VALIDAR CORREO
	$('#registro_correo').on('change', function(){
		validarCorreo($(this).val());
	});
	// VALIDAR PASSWORD
	$('#registro_password').keyup(function(){
		validarPassword();
	});
	$('#registro_password2').keyup(function(){
		validarPassword();
	});
	// VALIDAR NOMBRES
	function validarNombre(consulta){
		if (consulta.length >= 3) {
			$('#registro_nombre').removeClass('error-solicitud');
			$('#registro_nombre').addClass('success-solicitud');
		} else {
			$('#registro_nombre').removeClass('success-solicitud');
			$('#registro_nombre').addClass('error-solicitud');
		}
	}
	// VALIDAR APELLIDOS
	function validarApellido(consulta){
		if (consulta.length >= 3) {
			$('#registro_apellido').removeClass('error-solicitud');
			$('#registro_apellido').addClass('success-solicitud');
		} else {
			$('#registro_apellido').removeClass('success-solicitud');
			$('#registro_apellido').addClass('error-solicitud');
		}
	}
	// FUNCION VALIDAR TELEFONO
	function validarTelefono(consulta){
		if (consulta.length == 7 || consulta.length == 10) {
			$.ajax({
				url: '../../json/Index/php/validarTelefono',
				type: 'POST',
				dataType: 'html',
				data: {consulta: consulta},
			})
			.done(function(respuesta){
				var estado = respuesta;
				$('#registro_telefono').removeClass('error-solicitud');
				$('#registro_telefono').removeClass('success-solicitud');
				$('#registro_telefono').addClass(estado);
			})
			.fail(function(){
				console.log('error');
			});
		} else {
			$('#registro_telefono').removeClass('success-solicitud');
			$('#registro_telefono').addClass('error-solicitud');
		}
	}
	// FUNCION VALIDAR CEDULA
	function validarCedula(consulta){
		if (consulta.length >= 8 && consulta.length <= 15) {
			$.ajax({
				url: '../../json/Index/php/validarCedula',
				type: 'POST',
				dataType: 'html',
				data: {consulta: consulta},
			})
			.done(function(respuesta){
				var estado = respuesta;
				$('#registro_cedula').removeClass('error-solicitud');
				$('#registro_cedula').removeClass('success-solicitud');
				$('#registro_cedula').addClass(estado);
			})
			.fail(function(){
				console.log('error');
			});
		} else {
			$('#registro_cedula').removeClass('success-solicitud');
			$('#registro_cedula').addClass('error-solicitud');
		}
	}
	// FUNCION VALIDAR CORREO
	function validarCorreo(consulta){
		if (consulta.length >= 5 && consulta.length <= 100) {
			$.ajax({
				url: '../../json/Index/php/validarCorreo',
				type: 'POST',
				dataType: 'html',
				data: {consulta: consulta},
			})
			.done(function(respuesta){
				var estado = respuesta;
				$('#registro_correo').removeClass('error-solicitud');
				$('#registro_correo').removeClass('success-solicitud');
				$('#registro_correo').addClass(estado);
			})
			.fail(function(){
				console.log('error');
			});
		} else {
			$('#registro_correo').removeClass('success-solicitud');
			$('#registro_correo').addClass('error-solicitud');
		}
	}
	// FUNCION VALIDAR PASSWORD
	function validarPassword(){
		if ($('#registro_password').val().length >= 4) {
			$('#registro_password').removeClass('error-solicitud');
			$('#registro_password').addClass('success-solicitud');
			if ($('#registro_password2').val().length >= 4 && $('#registro_password2').val() == $('#registro_password').val()) {
				$('#registro_password').removeClass('error-solicitud');
				$('#registro_password').addClass('success-solicitud');
				$('#registro_password2').removeClass('error-solicitud');
				$('#registro_password2').addClass('success-solicitud');
			} else {
				$('#registro_password2').removeClass('success-solicitud');
				$('#registro_password2').addClass('error-solicitud');
			}
		} else {
			$('#registro_password').removeClass('success-solicitud');
			$('#registro_password').addClass('error-solicitud');
			$('#registro_password2').removeClass('success-solicitud');
			$('#registro_password2').addClass('error-solicitud');
		}
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
	// CAMBIAR LA IMAGEN DE USUARIO
	function cambiarImagen(){
		var formData = new FormData();
		var files = $('#subir_foto')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: '../../json/Index/php/validarRegistro',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$("#imagen_usuario_registro").attr("src", '../../img/personal/usuarios/' + response);
					$('.attrimg').attr('id', response);
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		});
	}
	// FUNCION VALIDAR ENVIO
	function validarEnvio(){
		validarPassword($('#registro_password').val());
		if ($('#registro_nombre').hasClass("success-solicitud") == false) {
			return false;
		} else if ($('#registro_apellido').hasClass("success-solicitud") == false) {
			return false;
		} else if ($('#registro_telefono').hasClass("success-solicitud") == false) {
			return false;
		} else if ($('#registro_cedula').hasClass("success-solicitud") == false) {
			return false;
		} else if ($('#registro_correo').hasClass("success-solicitud") == false) {
			return false;
		} else if ($('#registro_password').hasClass("success-solicitud") == false) {
			return false;
		} else if ($('#registro_password2').hasClass("success-solicitud") == false) {
			return false;
		} else {
			return true;
		}
	}
	// REGISTAR CLIENTE
	function registrarCliente(nombre, apellido, correo, password, telefono, cedula, foto, rol_ingreso){
		$.ajax({
			url: '../../json/Index/php/registrarCliente',
			type: 'POST',
			dataType: 'html',
			data: {nombre: nombre,
				apellido: apellido,
				correo: correo,
				password: password,
				telefono: telefono,
				cedula: cedula,
				foto: foto,
				rol_ingreso: rol_ingreso,	
			},
		})
		.done(function(respuesta){
			alert('Sesion Iniciada');
		})
		.fail(function(){
			console.log('error');
		});
	}
	$('#submit_registrarse').on('click', function(e){
		e.preventDefault();
		var valido = validarEnvio();
		validarNombre($('#registro_nombre').val());
		validarApellido($('#registro_apellido').val());
		validarTelefono($('#registro_telefono').val());
		validarCedula($('#registro_cedula').val());
		validarCorreo($('#registro_correo').val());
		validarPassword();
		if (valido == true) {
			registrarCliente(
				$('#registro_nombre').val(),
				$('#registro_apellido').val(),
				$('#registro_correo').val(),
				$('#registro_password').val(),
				$('#registro_telefono').val(),
				$('#registro_cedula').val(),
				$('.attrimg').attr('id'),
				1
				);
			$('#cerrar_modal').click();
		}
	});
});