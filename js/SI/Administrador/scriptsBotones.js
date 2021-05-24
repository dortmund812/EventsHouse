$(document).ready(function(){
	$('#btn_create_alert').on('click', function(e){
		e.preventDefault();
		$('#card_notificacion').removeClass('en_pantalla');
		$('#card_correo').removeClass('en_pantalla');
		$('#card_recibir_notif').removeClass('en_pantalla');
		$('#card_alerta').toggleClass('en_pantalla');
		$('#mens_env_alert').text('');
	});
	// CERRAR EL MODAL CON EL BOTON DE CERRAR
	$('#cerrar-notificaciones').on('click', function(){
		$('#card_alerta').removeClass('en_pantalla');
	});
	// CERRAR EL MODAL DANDO CLICK AFUERA
	$('#fuera-menu').on('click', function(){
		$('#card_alerta').removeClass('en_pantalla');
	});

	$('#btn_create_correo').on('click', function(e){
		e.preventDefault();
		$('#card_notificacion').removeClass('en_pantalla');
		$('#card_alerta').removeClass('en_pantalla');
		$('#card_recibir_notif').removeClass('en_pantalla');
		$('#card_correo').toggleClass('en_pantalla');
		$('#mens_env_alert').text('');
	});
	// CERRAR EL MODAL CON EL BOTON DE CERRAR
	$('#cerrar-notificaciones').on('click', function(){
		$('#card_correo').removeClass('en_pantalla');
	});
	// CERRAR EL MODAL DANDO CLICK AFUERA
	$('#fuera-menu').on('click', function(){
		$('#card_correo').removeClass('en_pantalla');
	});

	$('#btn_create_notif').on('click', function(e){
		e.preventDefault();
		$('#card_correo').removeClass('en_pantalla');
		$('#card_alerta').removeClass('en_pantalla');
		$('#card_recibir_notif').removeClass('en_pantalla');
		$('#card_recibir_notif').removeClass('en_pantalla');
		$('#card_notificacion').toggleClass('en_pantalla');
		$('#mens_env_alert').text('');
	});
	// CERRAR EL MODAL CON EL BOTON DE CERRAR
	$('#cerrar-notificaciones').on('click', function(){
		$('#card_notificacion').removeClass('en_pantalla');
	});
	// CERRAR EL MODAL DANDO CLICK AFUERA
	$('#fuera-menu').on('click', function(){
		$('#card_notificacion').removeClass('en_pantalla');
	});
});