$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#eve_busq').toggleClass('inp_busq');
		$('#eve_busq').val('');
		$('#lbl_fec').toggleClass('d-none');
		$('#fec_busq').toggleClass('d-none');
		$('#fec_busq').val('');
		$('#tem_busq').toggleClass('inp_busq');
		$('#tem_busq').val('');
		$('#lug_busq').toggleClass('inp_busq');
		$('#lug_busq').val('');
		$('#dir_busq').toggleClass('inp_busq');
		$('#dir_busq').val('');
		traerEventos(0, $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
		paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	});
	// ACTUALIZAR TABLA
	traerEventos(0,$('#eve_busq').val(),$('#fec_busq').val(),$('#tem_busq').val(),$('#lug_busq').val(),$('#dir_busq').val());
	// TARER PAGINACION
	paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	// BUSCAR POR EVENTO
	$('#eve_busq').keyup(function(){
		traerEventos(0, $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
		paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	});
	// BUSCAR POR FECHA
	$('#fec_busq').on('change', function(){
		traerEventos(0, $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
		paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	});
	// BUSCAR POR TEMATICA
	$('#tem_busq').keyup(function(){
		traerEventos(0, $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
		paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	});
	// BUSCAR POR LUGAR
	$('#lug_busq').keyup(function(){
		traerEventos(0, $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
		paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	});
	// BUSCAR POR DIRECCION
	$('#dir_busq').keyup(function(){
		traerEventos(0, $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
		paginacionEventos('HW', $('#eve_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#dir_busq').val());
	});
	// ACTUALIZAR TABLA
	function traerEventos(consulta, evento, fecha, tematica, lugar, direccion){
		$.ajax({
			url: 'json/php/traerEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, evento: evento, fecha: fecha, tematica: tematica, lugar: lugar, direccion: direccion},
		})
		.done(function(respuesta){
			// LLENAR TABLA
			$('#tbody').html(respuesta);
			// VER SOLICITUD
			$('.ver-mas').on('click', function(){
				traerCotizacion($(this).attr('id'));
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionEventos(consulta, evento, fecha, tematica, lugar, direccion){
		$.ajax({
			url: 'json/php/paginacionEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, evento: evento, fecha: fecha, tematica: tematica, lugar: lugar, direccion: direccion},
		})
		.done(function(respuesta){
			$('#paginacionAspirantes').html(respuesta);
			// BOTON DE PAGINACION
			$('.pag').on('click', function(e){
				e.preventDefault();
				$('.pag').addClass('btn-dark');
				$(this).removeClass('btn-dark');
				$(this).addClass('btn-primary');
			});
			// ACTUALIZAR LA TABLA AUTOMATICAMENTE
			$('.pag').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 10;
				traerPersonal(num);
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
});