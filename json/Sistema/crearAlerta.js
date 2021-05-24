$(document).ready(function(){
	// VALIDAR EL TITULO DE LA ALERTA
	$('#titulo_alerta_imp').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
	});
	// SELECCIONAR USUARIO DE ALERTA
	$('#select_user_alert').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
			$('#correo_alerta_inp').prop('disabled', true)
		} else {
			$(this).removeClass('brd_red');
			if ($(this).val() == 6) {
				$('#correo_alerta_inp').prop('disabled', false);
			} else {
				$('#correo_alerta_inp').val('');
				$('#correo_alerta_inp').prop('disabled', true);
				$('#correo_alerta_inp').removeClass('brd_red');
				$('#mensaje_correo_dont').text('');
			}
		}
	});
	// VALIDAR CORREO
	$('#correo_alerta_inp').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
		vlidarCorreo($(this).val());
	});
	// VALIDAR MENSAJE DE ALERTA
	$('#mensaje_alerta_inp').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
	});
	// ENVIAR ALERTA
	$('#btn_env_alert').on('click', function(e){
		e.preventDefault();
		$('#mens_env_alert').text('');
		validarDatos();
		if ($('#titulo_alerta_imp').hasClass("brd_red") == true
			|| $('#select_user_alert').hasClass("brd_red") == true
			|| $('#correo_alerta_inp').hasClass("brd_red") == true
			|| $('#mensaje_alerta_inp').hasClass("brd_red") == true) {
			$('#mens_err_alert').text('*Faltan Datos');
		} else {
			$('#mens_err_alert').text('');
			enviarAlerta($('#titulo_alerta_imp').val(), $('#select_user_alert').val(), $('#correo_alerta_inp').val(), $('#mensaje_alerta_inp').val());
		}
	});
	// VALIDAR DATOS
	function validarDatos(){
		// VALIDAR TITULO
		if ($('#titulo_alerta_imp').val() == '') {
			$('#titulo_alerta_imp').addClass('brd_red');
		} else {
			$('#titulo_alerta_imp').removeClass('brd_red');
		}
		// USUARIO
		if ($('#select_user_alert').val() == '') {
			$('#select_user_alert').addClass('brd_red');
		} else {
			$('#select_user_alert').removeClass('brd_red');
			// CORREO USUARIO
			if ($('#select_user_alert').val() == 6) {
				if ($('#correo_alerta_inp').val() == '') {
					$('#correo_alerta_inp').addClass('brd_red');
				} else {
					$('#correo_alerta_inp').removeClass('brd_red');
				}
			} else {
				$('#correo_alerta_inp').removeClass('brd_red');
			}
		}
		// VALIDAR MENSAJE
		if ($('#mensaje_alerta_inp').val() == '') {
			$('#mensaje_alerta_inp').addClass('brd_red');
		} else {
			$('#mensaje_alerta_inp').removeClass('brd_red');
		}
	}
	// VALIDAR CORREO EN LA BASE DE DATOS
	function vlidarCorreo(consulta){
		$.ajax({
			url: '../../json/Sistema/php/validarCorreo',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#correo_alerta_inp').removeClass('brd_red');
				$('#mensaje_correo_dont').text('');
			} else {
				$('#correo_alerta_inp').addClass('brd_red');
				$('#mensaje_correo_dont').text('El correo no existe');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ENVIAR ALERTA
	function enviarAlerta(titulo, usuario, correo, mensaje){
		$.ajax({
			url: '../../json/Sistema/php/enviarAlerta',
			type: 'POST',
			dataType: 'html',
			data: {titulo: titulo, usuario: usuario, correo: correo, mensaje: mensaje},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#titulo_alerta_imp').val(''); 
				$('#select_user_alert').val('');
				$('#correo_alerta_inp').val(''); 
				$('#mensaje_alerta_inp').val('');
				$('#correo_alerta_inp').prop('disabled', true);
				$('#mens_env_alert').text('*Alerta Enviada Correctamente*');
			} else {
				$('#mens_env_alert').text('');
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});