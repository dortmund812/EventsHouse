$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#lbl_fec').toggleClass('d-none');
		$('#fec_busq').toggleClass('d-none');
		$('#fec_busq').val('');
		$('#eve_busq').toggleClass('inp_busq');
		$('#eve_busq').val('');
		$('#tem_busq').toggleClass('inp_busq');
		$('#tem_busq').val('');
		$('#lug_busq').toggleClass('inp_busq');
		$('#lug_busq').val('');
		$('#usu_busq').toggleClass('inp_busq');
		$('#usu_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// ACTUALIZAR TABLA CADA SEGUNDO
	actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	// TRAE LA PAGINACION
	paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	// ACTUALIZAR TABLA
	function actualizarTabla(consulta, id, fecha, evento, tematica, lugar, usuario, estado){
		$.ajax({
			url: 'json/php/actualizarTabla',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, fecha: fecha, evento: evento, tematica: tematica, lugar: lugar, usuario: usuario, estado: estado},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody').html(respuesta);
			// TRAER LOS DATOS DE LA SOLICITUD
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
			$('#costoMinimo').attr('placeholder', respuesta[13]);
			$('#costoMaximo').val(monedaChange(respuesta[14]));
			$('#comentarios').val(respuesta[15]);
			$('#correo_clien').val(respuesta[16]);
			// DENEGAR EL ACCESO A APROBAR Y DENEGAR
			if (respuesta[3] == 'Pre-Aprobada' || respuesta[3] == 'Aprobada') {
				$('#eliminar_solicitud').prop('disabled', true);
				$('#aprobar').prop('disabled', true);
			} else {
				$('#eliminar_solicitud').prop('disabled', false);
				$('#aprobar').prop('disabled', false);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// DENEGAR SOLICITUD
	function denegarSolicitud(consulta, correo){
		$.ajax({
			url: 'json/php/denegarSolicitud',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, correo: correo},
		})
		.done(function(respuesta){
			// ACTUALIZAR TABLA CADA SEGUNDO
			actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
			// TRAE LA PAGINACION
			paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
			// CERRAR MODALES
			$('#cerrar_denegar_solicitud_conf').click();
			$('#cerrar_denegar_solicitud_espe').click();
		})
		.fail(function(){
			console.log('error');
		});
	}
	// APROBAR SOLICITUD
	function aprobarSolicitud(consulta, costo){
		$.ajax({
			url: 'json/php/aprobarSolicitud',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, costo: costo},
		})
		.done(function(respuesta){
			if (respuesta != 'Exito') {
				alert('Error en la solicitud');
			} else {
				$('#abrir_modal').click();
				setTimeout(function(){
					// ACTUALIZAR TABLA CADA SEGUNDO
					actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
					// TRAE LA PAGINACION
					paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
					$('#cerrar_notifiacion_exitosa').click();
					$('#cerrar_denegar_solicitud_espe').click();
				},1000);
			}
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
	// PAGINACION DE SOLICITUDES
	var num = 0;
	function paginacionSolicitud(consulta, id, fecha, evento, tematica, lugar, usuario, estado){
		$.ajax({
			url: 'json/php/paginacionSolicitud',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, fecha: fecha, evento: evento, tematica: tematica, lugar: lugar, usuario: usuario, estado: estado},
		})
		.done(function(respuesta){
			$('#paginacionSolicitud').html(respuesta);
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
				actualizarTabla(num, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
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
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR FECHA
	$('#fec_busq').on('change', function(){
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR EVENTO
	$('#eve_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TEMATICA
	$('#tem_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR LUGAR
	$('#lug_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR USUARIO
	$('#usu_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#fec_busq').val(), $('#eve_busq').val(), $('#tem_busq').val(), $('#lug_busq').val(), $('#usu_busq').val(), $('#est_busq').val());
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
	// DENEGAR SOLICITUD BTN
	$('#eliminar_solicitud').on('click', function(e){
		e.preventDefault();
	});
	$('#den_sol_btn').on('click', function(e){
		e.preventDefault();
		denegarSolicitud($('#id').val(), $('#correo_clien').val());
	});
	// APROBAR SOLICITUD BTN
	$('#aprobar').on('click', function(e){
		e.preventDefault();
		$(this).prop('disabled', true);
		$(this).addClass('disabled');
		$('#eliminar_solicitud').prop('disabled', true);
		$('#eliminar_solicitud').addClass('disabled');
		aprobarSolicitud($('#id').val(), $('#costoMinimo').attr('placeholder'));
	});
});