$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#tit_busq').toggleClass('inp_busq');
		$('#tit_busq').val('');
		$('#eve_busq').toggleClass('inp_busq');
		$('#eve_busq').val('');
		$('#tem_busq').toggleClass('inp_busq');
		$('#tem_busq').val('');
		$('#lbl_fec').toggleClass('d-none');
		$('#fec_busq').toggleClass('d-none');
		$('#fec_busq').val('');
		$('#lug_busq').toggleClass('inp_busq');
		$('#lug_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// ACTUALIZAR TABLA
	traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	// TARER PAGINACION
	paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	// BUSCAR POR TITULO
	$('#tit_busq').keyup(function(){
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR EVENTO
	$('#eve_busq').keyup(function(){
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TEMATICA
	$('#tem_busq').keyup(function(){
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR FECHA
	$('#fec_busq').on('change', function(){
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR LUGAR
	$('#lug_busq').keyup(function(){
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
		paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
	});
	// CANCELAR COTIZACION
	$('#btn_cancel_cot').on('click', function(e){
		e.preventDefault();
		$('#btn_cancel_cot').addClass('disabled');
		$('#btn_cancel_cot').prop('disabled', true);
		$('#btn_aprov_cot').addClass('disabled');
		$('#btn_aprov_cot').prop('disabled', true);
		cancelarCotizacion($(this).val());
	});
	// APROBAR COTIZACION
	$('#btn_aprov_cot').on('click', function(e){
		e.preventDefault();
		$('#btn_cancel_cot').addClass('disabled');
		$('#btn_cancel_cot').prop('disabled', true);
		$('#btn_aprov_cot').addClass('disabled');
		$('#btn_aprov_cot').prop('disabled', true);
		aprobarCotizacion($(this).val());
	});
	// FUNCION CANCELAR COTIZACION
	function cancelarCotizacion(consulta){
		$.ajax({
			url: 'json/php/cancelarCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#btn_cancel_cot').removeClass('disabled');
				$('#btn_cancel_cot').prop('disabled', false);
				$('#btn_aprov_cot').removeClass('disabled');
				$('#btn_aprov_cot').prop('disabled', false);
				traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
				paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
				$('#mod_2').click();
			} else {
				$('#btn_cancel_cot').removeClass('disabled');
				$('#btn_cancel_cot').prop('disabled', false);
				$('#btn_aprov_cot').removeClass('disabled');
				$('#btn_aprov_cot').prop('disabled', false);
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// FUNCION APROBAR COTIZACION
	function aprobarCotizacion(consulta){
		$.ajax({
			url: 'json/php/aprobarCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#btn_cancel_cot').removeClass('disabled');
				$('#btn_cancel_cot').prop('disabled', false);
				$('#btn_aprov_cot').removeClass('disabled');
				$('#btn_aprov_cot').prop('disabled', false);
				traerSolicitudCliente(0, $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
				paginacionCotizacion('HW', $('#tit_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#fec_busq').val(), $('#lug_busq').val(), $('#est_busq').val());
				$('#mod_2').click();
			} else {
				$('#btn_cancel_cot').removeClass('disabled');
				$('#btn_cancel_cot').prop('disabled', false);
				$('#btn_aprov_cot').removeClass('disabled');
				$('#btn_aprov_cot').prop('disabled', false);
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ACTUALIZAR TABLA
	function traerSolicitudCliente(consulta, titulo, evento, tematica, fecha, lugar, estado){
		$.ajax({
			url: 'json/php/traerCotizaciones',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, titulo: titulo, evento: evento, tematica: tematica, fecha: fecha, lugar: lugar, estado: estado},
		})
		.done(function(respuesta){
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
	// PAGINACION SOLICITUD
	function paginacionCotizacion(consulta, titulo, evento, tematica, fecha, lugar, estado){
		$.ajax({
			url: 'json/php/paginacionCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, titulo: titulo, evento: evento, tematica: tematica, fecha: fecha, lugar: lugar, estado: estado},
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
				traerSolicitudCliente(num);
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER COTIZACION
	function traerCotizacion(consulta){
		$.ajax({
			url: 'json/php/traerCotizacion',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta[3] == 'Aprobado') {
				$('#btn_cancel_cot').val(respuesta[0]);
				$('#btn_aprov_cot').val(respuesta[0]);
				$('#btn_cancel_cot').removeClass('disabled');
				$('#btn_cancel_cot').prop('disabled', false);
				$('#btn_aprov_cot').removeClass('disabled');
				$('#btn_aprov_cot').prop('disabled', false);
			} else {
				$('#btn_cancel_cot').addClass('disabled');
				$('#btn_cancel_cot').prop('disabled', true);
				$('#btn_aprov_cot').addClass('disabled');
				$('#btn_aprov_cot').prop('disabled', true);
			}
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
			$('#costoMinimo').val(respuesta[13]);
			$('#costoMaximo').val(monedaChange(respuesta[14]));
			$('#comentarios').val(respuesta[15]);
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
});