$(document).ready(function(){
	if ($('#detectar_idioma').text() == 'Idioma') {
		window.location.href = 'cotizacion';
	}
	
	buscarEventos($('#buscar').val());
	
	$('#btn_buscar_evento').on('click', function(e){
		e.preventDefault();
	});

	$('#buscar').keyup(function(){
		buscarEventos($(this).val());
	});

	function buscarEventos(consulta){
		$.ajax({
			url: '../../json/Cotizacion/php/buscarEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			var estado = respuesta;
			$('#contenedor_eventos').html(estado);
		})
		.fail(function(){
			console.log('error');
		});
	}
});