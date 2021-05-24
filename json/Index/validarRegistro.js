$(document).ready(function(){
	// TRAER LOS CARGOS DE UN ASPIRANTE
	traerCargos('HW');
	// TAMAÑO DE LA IMAGEN DE USUARIO
	var iur = $('#imagen_usuario_registro').width();
	$('#imagen_usuario_registro').height(iur*2.5);
	// VALIDAR ROL
	$('#seleccion_rol').on('change', function(){
		if ($(this).val() == 6) {
			$('#cargo_aspirante').prop('disabled', false);
			$('#subir_hoja_vida').prop('disabled', false);
			$('#lbl_shv').removeClass('deshabilitado');
			$('#lbl_shv').addClass('habilitado');
		} else if ($(this).val() == 1) {
			$('#cargo_aspirante').prop('disabled', true);
			$('#subir_hoja_vida').prop('disabled', true);
			$('#cargo_aspirante').removeClass('falta_cargo');
			$('#lbl_shv').addClass('deshabilitado');
			$('#lbl_shv').removeClass('falta');
			$('#lbl_shv').removeClass('habilitado');
		}
	});
	// SUBIR HOJA DE VIDA
	$('#subir_hoja_vida').on('change', function(){
		registrarHojaVida();
		$('#lbl_shv').html('Adjunto <i class="icon-attachment"></i>');
		$('#lbl_shv').css({
			'background':'#36C4D2'
		});
	});
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
	// VALIDAR CARGO
	$('#cargo_aspirante').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('falta_cargo');
		} else {
			$(this).removeClass('falta_cargo');
		}
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
				url: 'json/Index/php/validarTelefono',
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
				url: 'json/Index/php/validarCedula',
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
				url: 'json/Index/php/validarCorreo',
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
			url: 'json/Index/php/validarRegistro',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$("#imagen_usuario_registro").attr("src", 'img/personal/usuarios/' + response);
					$('.attrimg').attr('id', response);
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		});
	}
	// REGISTAR HOJA DE VIDA
	function registrarHojaVida(){
		var formData = new FormData();
		var files = $('#subir_hoja_vida')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: 'json/Index/php/registrarHojaVida',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$('#hoja_vida_frame').attr('src', response);
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		});
	}
	// TRAER CARGOS
	function traerCargos(consulta){
		$.ajax({
			url: 'json/Index/php/traerCargos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			var estado = respuesta;
			$('#cargo_aspirante').html(estado);
		})
		.fail(function(){
			console.log('error');
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
	// REGISTAR ASPIRANTE
	function registrarAspirante(nombre, apellido, correo, password, telefono, cedula, foto, rol_ingreso, hoja_vida, rol_aspirante){
		$.ajax({
			url: 'json/Index/php/registrarAspirante',
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
				hoja_vida: hoja_vida,
				rol_aspirante: rol_aspirante,	
			},
		})
		.done(function(respuesta){
			if (respuesta != 'Error') {
				alert('Hola ' + respuesta + ' bienvenido a Events House, nos alegra que quieras trabajar con nosotros, en este momento tu solicitud esta siendo procesada en los proximos dias recibiras un correo informando de tu proceso.');
				window.location.href = "index.php";
			} else {
				alert('Algo ha salido mal, intentalo mas tarde');
				$('#submit_registrarse').prop('disabled', false);
				$('#pre-loader').removeClass('active');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// REGISTAR CLIENTE
	function registrarCliente(nombre, apellido, correo, password, telefono, cedula, foto, rol_ingreso){
		$.ajax({
			url: 'json/Index/php/registrarCliente',
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
			if (respuesta == 'Exito') {
				window.location.href = "config/direccion";
			} else {
				alert('Ingresa un correo valido');
				$('#submit_registrarse').prop('disabled', false);
				$('#pre-loader').removeClass('active');
			}
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
		if ($('#seleccion_rol').val() == 6) {
			if ($('#subir_hoja_vida').val() == '') {
				$('#lbl_shv').addClass('falta');
			}
			if ($('#cargo_aspirante').val() == '') {
				$('#cargo_aspirante').addClass('falta_cargo');
			}
			if (valido == true && $('#subir_hoja_vida').val() != '' && $('#cargo_aspirante').val() != '') {
				$('#submit_registrarse').prop('disabled', true);
				$('#pre-loader').addClass('active');
				registrarAspirante(
					$('#registro_nombre').val(),
					$('#registro_apellido').val(),
					$('#registro_correo').val(),
					$('#registro_password').val(),
					$('#registro_telefono').val(),
					$('#registro_cedula').val(),
					$('.attrimg').attr('id'),
					$('#seleccion_rol').val(),
					$('#hoja_vida_frame').attr('src'),
					$('#cargo_aspirante').val()
				);
			}
		} else {
			if (valido == true) {
				$('#submit_registrarse').prop('disabled', true);
				$('#pre-loader').addClass('active');
				registrarCliente(
					$('#registro_nombre').val(),
					$('#registro_apellido').val(),
					$('#registro_correo').val(),
					$('#registro_password').val(),
					$('#registro_telefono').val(),
					$('#registro_cedula').val(),
					$('.attrimg').attr('id'),
					$('#seleccion_rol').val()
				);
			}
		}
	});
});