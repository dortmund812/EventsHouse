$(document).ready(function(){
	$('#modal_alerta').fadeOut(0);
	$('#btn_cerrar_alerta').on('click', function(e){
		e.preventDefault();
		cerrarAlerta($(this).val());
	});
	setTimeout(function(){
		$('#int_alert').removeClass('d-none');
	}, 1000);
	setInterval(function(){
		validarAlertas('HW');
	}, 1000);
	// TRAER ALERTAS
	function traerAlerta(consulta){
		$.ajax({
			url: '../../json/Sistema/php/traerAlertas.php',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#btn_cerrar_alerta').val(respuesta[0]);
			$('#titulo_alerta').text('¡'+respuesta[1]+'!');
			$('#texto_alerta').text(respuesta[2]);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// VALIDAR QUE HAY ALERTAS
	function validarAlertas(consulta){
		$.ajax({
			url: '../../json/Sistema/php/validarAlerta.php',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerAlerta('HW');
				$('#modal_alerta').fadeIn(300);
			} else {

			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// CERRAR ALERTA
	function cerrarAlerta(consulta){
		$.ajax({
			url: '../../json/Sistema/php/cerrarAlerta.php',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#modal_alerta').fadeOut(300);
				validarAlertas('HW');
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});