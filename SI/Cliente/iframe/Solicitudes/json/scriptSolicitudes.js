$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#eve_busq').toggleClass('inp_busq');
		$('#eve_busq').val('');
		$('#tit_busq').toggleClass('inp_busq');
		$('#tit_busq').val('');
		$('#lbl_fec').toggleClass('d-none');
		$('#fec_busq').toggleClass('d-none');
		$('#fec_busq').val('');
		$('#tem_busq').toggleClass('inp_busq');
		$('#tem_busq').val('');
		$('#lug_busq').toggleClass('inp_busq');
		$('#lug_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// TARER SOLICITUDES
	traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	// TARER PAGINACION
	paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	// BUSCAR POR EVENTO
	$('#eve_busq').keyup(function(){
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TITULO
	$('#tit_busq').keyup(function(){
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR FECHA
	$('#fec_busq').on('change', function(){
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TEMATICA
	$('#tem_busq').keyup(function(){
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR LUGAR 
	$('#lug_busq').keyup(function(){
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		traerSolicitudCliente(0, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// VARIABLE DE PAGINA
	var num = 0;
	// TARER SOLICITUDES
	function traerSolicitudCliente(consulta, evento, titulo, fecha, tematica, lugar, estado){
		$.ajax({
			url: 'json/php/traerSolicitudes',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, evento: evento, titulo: titulo, fecha: fecha, tematica: tematica, lugar: lugar, estado: estado},
		})
		.done(function(respuesta){
			$('#tbody').html(respuesta);
			// VER SOLICITUD
			$('.ver-mas').on('click', function(){
				traerSolicitud($(this).attr('id'));
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER SOLICITUD
	function traerSolicitud(consulta){
		$.ajax({
			url: 'json/php/traerSolicitud',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#id').val(respuesta[0]);
			$('#fecha').val(respuesta[1]);
			$('#evento').val(respuesta[2]);
			$('#estado').val(respuesta[3]);
			$('#usuario').val(respuesta[4] + ' ' + respuesta[5]);
			$('#anfitrion').val(respuesta[6]);
			$('#tematica').val(respuesta[7]);
			$('#lugar').val(respuesta[8]);
			$('#personas').val(respuesta[9]);
			$('#banquete').val(respuesta[10]);
			$('#formalidad').val(respuesta[11]);
			$('#recordatorios').val(respuesta[12]);
			$('#costoMinimo').val(monedaChange(respuesta[13]));
			$('#costoMaximo').val(monedaChange(respuesta[14]));
			$('#comentarios').val(respuesta[15]);
			// ACCION DE ELIMINAR
			if ($('#estado').val() == 'Pre-Aprobada') {
				$('#eliminar_Solicitud').addClass('disabled');
			} else {
				$('#eliminar_Solicitud').removeClass('disabled');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// PAGINACION SOLICITUD
	function paginacionSolicitud(consulta, evento, titulo, fecha, tematica, lugar, estado){
		$.ajax({
			url: 'json/php/paginacionSolicitudes',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, evento: evento, titulo: titulo, fecha: fecha, tematica: tematica, lugar: lugar, estado: estado},
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
			$('.pag').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 10;
				traerSolicitudCliente(num, $('#eve_busq').val(), $('#tit_busq').val(), $('#fec_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// CONVERSION A MONEDA
	function monedaChange(inputNumv) {
		let cif = 3;
		// tomamos el valor que tiene el input
		let inputNum = inputNumv;
		// Lo convertimos en texto
		inputNum = inputNum.toString()
		// separamos en un array los valores antes y después del punto
		inputNum = inputNum.split('.')
		// evaluamos si existen decimales
		if (!inputNum[1]) {
			inputNum[1] = '00'
		}

		let separados
		// se calcula la longitud de la cadena
		if (inputNum[0].length > cif) {
			let uno = inputNum[0].length % cif
			if (uno === 0) {
				separados = []
			} else {
				separados = [inputNum[0].substring(0, uno)]
			}
			let posiciones = parseInt(inputNum[0].length / cif)
			for (let i = 0; i < posiciones; i++) {
				let pos = ((i * cif) + uno)
				console.log(uno, pos)
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		return '$' + separados.join(',');
	};
	// ELIMINAR SOLICITUD
	function eliminarSolicitud(consulta){
		$.ajax({
			url: 'json/php/eliminarSolicitud',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta != 'Exito') {
				alert('Error en la solicitud');
			} else {
				window.location.href = 'solicitudesCliente';
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ELIMINAR SOLICITUD
	$('#eliminar_Solicitud').on('click', function(e){
		e.preventDefault();
		eliminarSolicitud($('#id').val());
	});
});