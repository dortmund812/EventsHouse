$(document).ready(function(){
	// IDIOMA INGLES
	$('#leng_en').on('click', function(){
		window.location.href = 'cliente?lenguaje=en';
	});
	// IDIOMA ESPAÑOL
	$('#leng_es').on('click', function(){
		window.location.href = 'cliente?lenguaje=es';
	});
	// IDIOMA FRANCES
	$('#leng_fr').on('click', function(){
		window.location.href = 'cliente?lenguaje=fr';
	});
});