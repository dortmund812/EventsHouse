$(document).ready(function(){
	contarNotificaciones('HW');
	$('#btn_view_notif').on('click', function(e){
		e.preventDefault();
		$('#card_notificacion').removeClass('en_pantalla');
		$('#card_correo').removeClass('en_pantalla');
		$('#card_alerta').removeClass('en_pantalla');
		$('#card_recibir_notif').toggleClass('en_pantalla');
		$('#mens_env_alert').text('');
		// TRAER NOTIFICACIONES
		traerNotificaciones(0);
		// TRAER PAGINACION
		paginacionNotifiaciones('HW');
		// CONTE DE NOTIFICACIONES
		contarNotificaciones('HW');
	});
	// CERRAR EL MODAL CON EL BOTON DE CERRAR
	$('#cerrar-notificaciones').on('click', function(){
		$('#card_recibir_notif').removeClass('en_pantalla');
	});
	// CERRAR EL MODAL DANDO CLICK AFUERA
	$('#fuera-menu').on('click', function(){
		$('#card_recibir_notif').removeClass('en_pantalla');
	});
	// TRAER NOTIFICACIONES
	function traerNotificaciones(consulta){
		$.ajax({
			url: '../../json/Sistema/php/traerNotificaciones',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER NOTIFICACIONES
			$('#container_notif').html(respuesta);
			// ELIMINAR NOTIFICACIONES
			$('.btn_elim_not').on('click', function(){
				eliminarNotificacion($(this).val());
			});
			// RESPONDER NOTIFICACION
			$('.btn_resp_not').on('click', function(){
				$('#mensaje'+$(this).val()).toggleClass('d-none');
				$('#confir_resp'+$(this).val()).toggleClass('d-none');
				$('#conf'+$(this).val()).toggleClass('d-none');
				$('#options'+$(this).val()).toggleClass('d-none');
			});
			// RESPONDER NOTIFICACION
			$('.cancel_resp').on('click', function(){
				$('#mensaje'+$(this).val()).toggleClass('d-none');
				$('#confir_resp'+$(this).val()).toggleClass('d-none');
				$('#conf'+$(this).val()).toggleClass('d-none');
				$('#options'+$(this).val()).toggleClass('d-none');
			});
			// ENVIAR NOTIFICACION DE RESPUESTA
			$('.btn_resp_not_confirmado').on('click', function(){
				if ($('#mensaje'+$(this).val()).val() != '') {
					$('#mensaje'+$(this).val()).css({
						'border-color':'#f2f2f2'
					});
					responderNotificacion($(this).val(), $('#mensaje'+$(this).val()).val());
					$('#mensaje'+$(this).val()).toggleClass('d-none');
					$('#confir_resp'+$(this).val()).toggleClass('d-none');
					$('#conf'+$(this).val()).toggleClass('d-none');
					$('#options'+$(this).val()).toggleClass('d-none');
				} else {
					$('#mensaje'+$(this).val()).css({
						'border-color':'red'
					});
				}
			});
		})
		.fail(function(){
			console.log('error');
		});	
	}
	// VARIABLE DE PAGINA 
	var num = 0;
	// PAGINAR NOTIFICACIONES
	function paginacionNotifiaciones(consulta){
		$.ajax({
			url: '../../json/Sistema/php/paginacionNotificaciones',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER PAGINACION
			$('#pagin_notif').html(respuesta);
			// PAGINAS
			$('.pag').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 2;
				traerNotificaciones(num);
			});
			// COLOR
			$('.pag').on('click', function(){
				$('.pag').removeClass('btn-info');
				$('.pag').addClass('btn-dark');
				$(this).removeClass('btn-dark');
				$(this).addClass('btn-info');
			});
		})
		.fail(function(){
			console.log('error');
		});	
	}
	// ELIMINAR NOTIFICACION
	function eliminarNotificacion(consulta){
		$.ajax({
			url: '../../json/Sistema/php/eliminarNotificacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				// TRAER NOTIFICACIONES
				traerNotificaciones(0);
				// TRAER PAGINACION
				paginacionNotifiaciones('HW');
				// CONTEO DE NOTIFICACIONES
				contarNotificaciones('HW');
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// RESPONDER NOTIFICACION
	function responderNotificacion(consulta, mensaje){
		$.ajax({
			url: '../../json/Sistema/php/responderNotificacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, mensaje: mensaje},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				alert('Respuesta enviada');
				// TRAER NOTIFICACIONES
				traerNotificaciones(0);
				// TRAER PAGINACION
				paginacionNotifiaciones('HW');
				// CONTEO DE NOTIFICACIONES
				contarNotificaciones('HW');
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});	
	}
	// CONTAR NOTIFICACIONES
	function contarNotificaciones(consulta){
		$.ajax({
			url: '../../json/Sistema/php/contarNotificaciones',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#cont_notif').text(respuesta);
			$('#cant_not_int').text(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
});