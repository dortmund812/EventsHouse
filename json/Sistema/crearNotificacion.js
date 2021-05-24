$(document).ready(function(){
	// VALIDAR TITULO DE NOTIFICACION
	$('#tit_notif').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
	});
	// VALIDAR USUARIO DE NOTIFIACION
	$('#seleccionar_user_noti').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
			$('#corr_user_notif').prop('disabled', true)
		} else {
			$(this).removeClass('brd_red');
			if ($(this).val() == 6) {
				$('#corr_user_notif').prop('disabled', false);
			} else {
				$('#corr_user_notif').val('');
				$('#corr_user_notif').prop('disabled', true);
				$('#corr_user_notif').removeClass('brd_red');
				$('#mensaje_correo_dont_notif').text('');
			}
		}
	});
	// VALIDAR MENSAJE DE NOTIFICACION
	$('#mens_notif').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
	});
	// VALIDAR CORREO
	$('#corr_user_notif').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
		vlidarCorreoNotif($(this).val());
	});
	// CREAR ALERTA
	$('#env_crear_notif').on('click', function(e){
		e.preventDefault();
		$('#si_envio_notif').text('');
		validarDatosNotif();
		if ($('#tit_notif').hasClass("brd_red") == true
			|| $('#seleccionar_user_noti').hasClass("brd_red") == true
			|| $('#corr_user_notif').hasClass("brd_red") == true
			|| $('#mens_notif').hasClass("brd_red") == true) {
			$('#no_envio_notif').text('*Faltan Datos');
		} else {
			$('#no_envio_notif').text('');
			crearNuevaNotificacion($('#tit_notif').val(), $('#seleccionar_user_noti').val(), $('#corr_user_notif').val(), $('#mens_notif').val());
		}
	});
	// VALIDAR CORREO EN LA BASE DE DATOS
	function vlidarCorreoNotif(consulta){
		$.ajax({
			url: '../../json/Sistema/php/validarCorreo',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#corr_user_notif').removeClass('brd_red');
				$('#mensaje_correo_dont_notif').text('');
			} else {
				$('#corr_user_notif').addClass('brd_red');
				$('#mensaje_correo_dont_notif').text('El correo no existe');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// VALIDAR DATOS NOTIFICACION
	function validarDatosNotif(){
		// VALIDAR TITULO
		if ($('#tit_notif').val() == '') {
			$('#tit_notif').addClass('brd_red');
		} else {
			$('#tit_notif').removeClass('brd_red');
		}
		// USUARIO
		if ($('#seleccionar_user_noti').val() == '') {
			$('#seleccionar_user_noti').addClass('brd_red');
		} else {
			$('#seleccionar_user_noti').removeClass('brd_red');
			// CORREO USUARIO
			if ($('#seleccionar_user_noti').val() == 6) {
				if ($('#corr_user_notif').val() == '') {
					$('#corr_user_notif').addClass('brd_red');
				} else {
					$('#corr_user_notif').removeClass('brd_red');
				}
			} else {
				$('#corr_user_notif').removeClass('brd_red');
			}
		}
		// VALIDAR MENSAJE
		if ($('#mens_notif').val() == '') {
			$('#mens_notif').addClass('brd_red');
		} else {
			$('#mens_notif').removeClass('brd_red');
		}
	}
	// FUNCION DE CREAR NOTIFICACION
	function crearNuevaNotificacion(titulo, usuario, correo, mensaje){
		$.ajax({
			url: '../../json/Sistema/php/crearNotificacion',
			type: 'POST',
			dataType: 'html',
			data: {titulo: titulo, usuario: usuario, correo: correo, mensaje: mensaje},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#tit_notif').val(''); 
				$('#seleccionar_user_noti').val('');
				$('#corr_user_notif').val(''); 
				$('#mens_notif').val('');
				$('#corr_user_notif').prop('disabled', true);
				$('#si_envio_notif').text('*Notificación Enviada Correctamente*');
			} else {
				$('#si_envio_notif').text('');
				alert(respuesta);
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});