$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#eve_busq').toggleClass('inp_busq');
		$('#eve_busq').val('');
		$('#tip_busq').toggleClass('inp_busq');
		$('#tip_busq').val('');
		$('#cos_busq').toggleClass('inp_busq');
		$('#cos_busq').val('');
		$('#lug_busq').toggleClass('inp_busq');
		$('#lug_busq').val('');
		$('#usu_busq').toggleClass('inp_busq');
		$('#usu_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// TRAER EVENTOS 
	traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	// PAGINACION DE EVENTOS
	paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	// TRAER IMPLEMENTOS
	traerImplementos('HW');
	// MODIFICAR CANTIDAD
	$('#agr_cant').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#agr_cant').on('change', function(){
		if ($(this).val() > 10000000) {
			$(this).val(10000000);
		}
		if ($(this).val() <= 0) {
			$(this).val(1);
		}
	});
	// MODIFICAR TIPO DE IMPLEMENTO
	$('#sel_imp').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_error');
		} else {
			$(this).removeClass('brd_error');
		}
	});
	// AGREGAR IMPLEMENTO
	$('#btn_agr_impl').on('click', function(e){
		e.preventDefault();
		if ($('#sel_imp').hasClass("brd_error") == true
			|| $('#sel_imp').val() == ''
			|| $('#agr_cant').val() == '') {
				if ($('#sel_imp').hasClass("brd_error") == true
				|| $('#sel_imp').val() == '') {
					$('#sel_imp').addClass('brd_error');
				} else {
					$('#sel_imp').removeClass('brd_error');
				}
				if ($('#agr_cant').val() == '') {
					$('#agr_cant').addClass('brd_error');
				} else {
					$('#agr_cant').removeClass('brd_error');
				}
		} else {
			// AGREGAR IMPLEMENTO
			agregarImplemento($('#agr_cant').val(), $('#sel_imp').val(), $(this).val(), $('#cost_tot').attr('placeholder'), $('#cost_max').attr('placeholder'));
		}
	});
	// APROBAR PRODUCTOS COTIZACION BTN
	$('#btn_apr_impl').on('click', function(){
		agregarProductosCotizacion($(this).val(), $('#cost_tot').attr('placeholder'));
	});
	// AGREGAR PRODUCTOS DEFINITIVOS A LA COTIZACION
	function agregarProductosCotizacion(consulta, costo){
		$.ajax({
			url: 'json/php/agregarProductosCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, costo: costo},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#abrir_modal').click();
				setTimeout(function(){
					// TRAER EVENTOS 
					traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
					// PAGINACION DE EVENTOS
					paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
					$('#mod_2').click();
					$('#cerrar_notifiacion_exitosa').click();
				},1000);
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER EVENTOS
	function traerEventos(consulta, id, evento, tipo, costo, lugar, usuario, estado){
		$.ajax({
			url: 'json/php/traerEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, evento: evento, tipo: tipo, costo: costo, lugar: lugar, usuario: usuario, estado: estado},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody').html(respuesta);
			$('.editar').on('click', function(){
				traerCotizacion($(this).val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionEventos(consulta, id, evento, tipo, costo, lugar, usuario, estado){
		$.ajax({
			url: 'json/php/paginacionEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, evento: evento, tipo: tipo, costo: costo, lugar: lugar, usuario: usuario, estado: estado},
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
				traerEventos(num, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// BUSCAR POR ID
	$('#id_busq').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#id_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR EVENTO
	$('#eve_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TIPO
	$('#tip_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR COSTO
	$('#cos_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR LUGAR
	$('#lug_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR USUARIO
	$('#usu_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// TRAER IMPLEMENTOS
	function traerImplementos(consulta){
		$.ajax({
			url: 'json/php/traerImplementos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#sel_imp').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// FUNCION VALIDAR NUMEROS
	function soloNumeros(e) {
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = "1234567890";
		especiales = [8, 37, 39, 46];

		tecla_especial = false
		for(var i in especiales) {
			if(key == especiales[i]) {
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla) == -1 && !tecla_especial)
			return false;
	}
	// TARER COTIZACION
	function traerCotizacion(consulta){
		$.ajax({
			url: 'json/php/traerCotizacion',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#btn_agr_impl').val(respuesta[0]);
			$('#btn_apr_impl').val(respuesta[0]);
			$('#tipo').val(respuesta[1]);
			$('#lugar').val(respuesta[2]);
			$('#recordatorios').val(respuesta[3]);
			$('#personas').val(respuesta[4]);
			$('#tematica').val(respuesta[5]);
			$('#cost_min').val(monedaChange(respuesta[6]));

			$('#cost_tot').attr('placeholder', respuesta[6]);
			$('#cost_tot').val(monedaChange(respuesta[6]));

			$('#cost_max').attr('placeholder', respuesta[7]);
			$('#cost_max').val(monedaChange(respuesta[7]));
			traerImplementosAsignados(respuesta[0]);
			traerImplementos('HW');
		})
		.fail(function(){
			console.log('error');
		});
	}
	// AGREGAR IMPLEMENTO
	function agregarImplemento(cantidad, implemento, cotizacion, costoTotal, CostoMaximo){
		$.ajax({
			url: 'json/php/agregarImplemento',
			type: 'POST',
			dataType: 'html',
			data: {cantidad: cantidad, implemento: implemento, cotizacion: cotizacion, costoTotal: costoTotal, CostoMaximo: CostoMaximo},
		})
		.done(function(respuesta){
			if (respuesta == 'Excede') {
				alert('El implemento supera el costo maximo');
			} else if (respuesta == 'Igual'){
				$('#btn_agr_impl').prop('disabled', true);
				$('#btn_agr_impl').addClass('disabled');
				$('#sel_imp').prop('disabled', true);
				$('#agr_cant').prop('disabled', true);
			}
			// TRAER TABLA
			$('#sel_imp').val('');
			$('#agr_cant').val('');
			$('#sel_imp').removeClass('brd_error');
			$('#agr_cant').removeClass('brd_error');
			traerImplementosAsignados(cotizacion);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER IMPLEMENTO ASIGNADOS
	function traerImplementosAsignados(consulta){
		$.ajax({
			url: 'json/php/traerImplementosRegistrados',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#agr_imp').html(respuesta);
			$('.ret_prodc').on('click', function(){
				eliminarProducto($(this).val(), consulta);
			});
			actualizarCostos(consulta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ELIMINAR PRODUCTO
	function eliminarProducto(consulta, cotizacion){
		$.ajax({
			url: 'json/php/eliminarProducto',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerImplementosAsignados(cotizacion);
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ACTUALIZAR COSTOS
	function actualizarCostos(consulta){
		$.ajax({
			url: 'json/php/actualizarCostos',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// RESPUESTA
			$('#cost_imple').text(monedaChange(respuesta['implementos']));
			$('#cost_imple').attr('placeholder', respuesta['implementos']);
			$('#cost_tot').val(monedaChange(respuesta['total']));
			$('#cost_tot').attr('placeholder', respuesta['total']);
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