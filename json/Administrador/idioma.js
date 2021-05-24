$(document).ready(function(){
	// IDIOMA INGLES
	$('#leng_en').on('click', function(){
		window.location.href = 'administrador?lenguaje=en';
	});
	// IDIOMA ESPAÑOL
	$('#leng_es').on('click', function(){
		window.location.href = 'administrador?lenguaje=es';
	});
	// IDIOMA FRANCES
	$('#leng_fr').on('click', function(){
		window.location.href = 'administrador?lenguaje=fr';
	});
});