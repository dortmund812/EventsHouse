$(document).ready(function(){
	if ($('#detectar_idioma').text() == 'Idioma') {
		window.location.href = 'index';
	}
	var quienes_somos = $('#quienes_somos').offset().top;
	var galeria = $('#galeria').offset().top;
	var contacto = $('#contacto').offset().top;

	$('#btn_inicio').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	});
	$('#btn_quienes_somos').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: quienes_somos
		}, 500);
	});
	$('#btn_galeria').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: galeria
		}, 500);
	});
	$('#btn_contacto').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: contacto
		}, 500);
	});
	// MODAL MENU
	$('#cierre_int').hide();
	$('#btn-despliegue').on('click', function (e){
		e.preventDefault();
		$('#menu').toggleClass('d-none');
		$('#cierre_int').show(0, function(){
			$('nav ul').animate({
				left: '0px'
			}, 0, desaparecerboton());
		});
	});
	$('.cierre-int').on('click', function (e){
		e.preventDefault();
		$('nav ul').animate({
			left: '-290px'
		}, 0, aparecerboton());
	});
	function aparecerboton(){
		$('#btn-despliegue').animate({
			right: '8px'
		}, 500, function(){
			$('#cierre_int').hide(0);
			$('#menu').toggleClass('d-none');
		});
	}
	function desaparecerboton(){
		$('#btn-despliegue').animate({
			right: '-50px'
		}, 500);
	}
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
	// BOTON DE SUBIR
	$('#btn-subir').hide(300);
	$(window).scroll(function(){
		if ($(this).scrollTop() >= (quienes_somos - 300)) {
			$('#btn-subir').show(300);
		} else {
			$('#btn-subir').hide(300);
		}
	});

	$('#btn-subir').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	});

	var imagen_ingreso = $('.imagen-ingreso').width();
	$('.imagen-ingreso').height(imagen_ingreso + (imagen_ingreso/2));
});