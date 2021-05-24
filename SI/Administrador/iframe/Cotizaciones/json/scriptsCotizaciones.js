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
	// TARER EVENTOS
	traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	// TRAER PAGINACION
	paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	// APROBAR COTIZACION BTN
	$('#btn_apr_cot').on('click', function(){
		$(this).prop('disabled', true);
		$(this).addClass('disabled');
		$('#btn_den_cot').prop('disabled', true);
		$('#btn_den_cot').addClass('disabled');
		$('#btn_devol_cot').prop('disabled', true);
		$('#btn_devol_cot').addClass('disabled');
		aprobarCotizacion($(this).val(), $('#usuario').val(), $('#correo_inp').val());
	});
	// DENEGAR COTIZACION BTN
	$('#btn_den_cot').on('click', function(){
		$('#den_cot_btn').val($(this).val());
	});
	$('#den_cot_btn').on('click', function(e){
		e.preventDefault();
		denegarCotizacion($(this).val());
	})
	// DEVOLVER COTIZACION BTN
	$('#btn_devol_cot').on('click', function(){
		devolverCotizacion($(this).val());
	});
	// VAR IMPLEMENTOS
	$('#ver_impl_cot').on('click', function(){
		traerImplementosAsignados($(this).val());
	});
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
				traerCotizacionID($(this).val());
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
	$('#cos_busq').on('keypress', function(){
		return soloNumeros(event);
	});
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
	// TRAER COTIZACION ID
	function traerCotizacionID(consulta){
		$.ajax({
			url: 'json/php/traerCotizacionID',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta[14] == 'Aprobado') {
				$('#btn_den_cot').val('');
				$('#btn_den_cot').prop('disabled', true);
				$('#btn_apr_cot').val('');
				$('#btn_apr_cot').prop('disabled', true);
				$('#btn_devol_cot').val('');
				$('#btn_devol_cot').prop('disabled', true);
			} else {
				$('#btn_den_cot').val(respuesta[0]);
				$('#btn_den_cot').prop('disabled', false);
				$('#btn_apr_cot').val(respuesta[0]);
				$('#btn_apr_cot').prop('disabled', false);
				$('#btn_devol_cot').val(respuesta[0]);
				$('#btn_devol_cot').prop('disabled', false);
			}
			$('#ver_impl_cot').val(respuesta[0]);
			$('#ver_empl_cot').val(respuesta[0]);
			$('#tipo').val(respuesta[1]);
			$('#nombre').val(respuesta[2]);
			$('#lugar').val(respuesta[3]);
			$('#fecha').val(respuesta[4]);
			$('#personas').val(respuesta[5]);
			$('#tematica').val(respuesta[6]);
			$('#usuario').val(respuesta[7]);
			$('#anfitrion').val(respuesta[8]);
			$('#cost_tot').val(monedaChange(respuesta[9]));
			$('#banquete').val(respuesta[10]);
			$('#formalidad').val(respuesta[11]);
			$('#recordatorios').val(respuesta[12]);
			$('#comentarios').val(respuesta[13]);
			$('#correo_inp').val(respuesta[15]);

			// TARER EMPLEADOS Y CARGOS
			$('#ver_empl_cot').on('click', function(){
				// TRAER CARGOS Y EMPLEADOS
				traerEmpleadosPorCargo($(this).val());
				// TRAER EMPLEADOS ASIGNADOS
				traerEmpleadosAsignados($(this).val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// APROBAR COTIZACION
	function aprobarCotizacion(consulta, nombre, correo){
		$.ajax({
			url: 'json/php/aprobarCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, nombre: nombre, correo: correo},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#abrir_modal').click();
				setTimeout(function(){
					traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
					paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
					$('#mod_2').click();
					$('#cerrar_notifiacion_exitosa').click();
				},1000);
			} else {
				alert('Lo siento, algo ha salido mal');
				$('#btn_apr_cot').prop('disabled', false);
				$('#btn_apr_cot').removeClass('disabled');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// DENEGAR COTIZACION
	function denegarCotizacion(consulta){
		$.ajax({
			url: 'json/php/denegarCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
				paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
				$('#cerrar_denegar_cotizacion_conf').click();
				$('#mod_2').click();
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// DEVOLVER COTIZACION
	function devolverCotizacion(consulta){
		$.ajax({
			url: 'json/php/devolverCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerEventos(0, $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
				paginacionEventos('HW', $('#id_busq').val(), $('#eve_busq').val(), $('#tip_busq').val(), $('#cos_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
				$('#mod_2').click();
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER IMPLEMENTOS
	function traerImplementosAsignados(consulta){
		$.ajax({
			url: 'json/php/traerImplementosAsignados',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#impl_cot_id').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER CARGOS Y EMPLEADOS
	function traerEmpleadosPorCargo(consulta){
		$.ajax({
			url: 'json/php/traerListadoEmpleados',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#listar_empleados').html(respuesta);
			// ASIGNAR EMPLEADO
			$('.id_empl_asg').on('click', function(){
				asignarEmpleadoCotizacion($(this).val(), $('#btn_apr_cot').val());
				$(this).prop('disabled', true);
				$(this).children().removeClass('icon-plus');
				$(this).children().addClass('icon-minus');
			});
			// LINK MENU CARGOS
			$('.car_link').on('click', function(){
				$('.car_link').removeClass('select_link');
				$(this).addClass('select_link');
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ASIGNAR EMPLEADO
	function asignarEmpleadoCotizacion(empleado, cotizacion){
		$.ajax({
			url: 'json/php/asignarEmpleadoCotizacion',
			type: 'POST',
			dataType: 'html',
			data: {empleado: empleado, cotizacion: cotizacion},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				// ACTUALIZAR LISTA DE EMPLEADOS ASIGNADOS
				traerEmpleadosAsignados($('#btn_apr_cot').val());
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ELIMINAR ASIGNACION DE EMPLEADO
	function eliminarAsignacionEmpleado(empleado, cotizacion){
		$.ajax({
			url: 'json/php/eliminarAsignacionEmpleado',
			type: 'POST',
			dataType: 'html',
			data: {empleado: empleado, cotizacion: cotizacion},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerEmpleadosAsignados($('#btn_apr_cot').val());
				$('#asp' + empleado).prop('disabled', false);
				$('#asp' + empleado).children().removeClass('icon-minus');
				$('#asp' + empleado).children().addClass('icon-plus');
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TARER EMPLEADOS ASIGNADOS
	function traerEmpleadosAsignados(consulta){
		$.ajax({
			url: 'json/php/traerEmpleadosAsignados',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// MOSTRAR EMPLEADOS
			$('#empl_asig_list').html(respuesta);
			// RETIRAR EMPLEADO
			$('.ret_aspi_asig').on('click', function(){
				eliminarAsignacionEmpleado($(this).val(), $('#ver_empl_cot').val());
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
});