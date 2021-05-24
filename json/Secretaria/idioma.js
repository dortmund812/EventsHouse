$(document).ready(function(){
	// IDIOMA INGLES
	$('#leng_en').on('click', function(){
		window.location.href = 'secretaria?lenguaje=en';
	});
	// IDIOMA ESPAÑOL
	$('#leng_es').on('click', function(){
		window.location.href = 'secretaria?lenguaje=es';
	});
	// IDIOMA FRANCES
	$('#leng_fr').on('click', function(){
		window.location.href = 'secretaria?lenguaje=fr';
	});
});