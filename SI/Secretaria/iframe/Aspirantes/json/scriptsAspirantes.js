$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#nom_busq').toggleClass('inp_busq');
		$('#nom_busq').val('');
		$('#cor_busq').toggleClass('inp_busq');
		$('#cor_busq').val('');
		$('#tel_busq').toggleClass('inp_busq');
		$('#tel_busq').val('');
		$('#ced_busq').toggleClass('inp_busq');
		$('#ced_busq').val('');
		$('#car_busq').toggleClass('inp_busq');
		$('#car_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// ACTUALIZAR TABLA
	actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	// PAGINACION
	paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	// ACTUALIZAR TABLA
	function actualizarTabla(consulta, id, nombre, correo, telefono, cedula, cargo, estado){
		$.ajax({
			url: 'json/php/actualizarTabla',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, correo: correo, telefono: telefono, cedula: cedula, cargo: cargo, estado: estado},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody').html(respuesta);
			// TRAER LOS DATOS DE LA SOLICITUD
			$('.ver-mas').on('click', function(){
				traerAspirante($(this).attr('id'));
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TARER ASPIRANTE
	function traerAspirante(consulta){
		$.ajax({
			url: 'json/php/traerAspirante',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER INFO DE ASPIRANTE
			$('#id').val(respuesta[0]);
			$('#fecha').val(respuesta[1]);
			$('#rol').val(respuesta[2]);
			$('#nombre').val(respuesta[3]);
			$('#apellido').val(respuesta[4]);
			$('#correo').val(respuesta[5]);
			$('#telefono').val(respuesta[6]);
			$('#cedula').val(respuesta[7]);
			$('#estado').val(respuesta[8]);
			$('#foto_aspirante').attr('src', '../../../../img/personal/usuarios/' + respuesta[9]);
			$('#hoja_vida_aspirante').attr('src', '../../../../archivos/hoja_vida/' + respuesta[10]);
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION ASPIRANTES
	function paginacionSolicitud(consulta, id, nombre, correo, telefono, cedula, cargo, estado){
		$.ajax({
			url: 'json/php/paginacionAspirantes',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, correo: correo, telefono: telefono, cedula: cedula, cargo: cargo, estado: estado},
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
			// ACTUALIZA LA TABLA
			$('.pag').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 10;
				actualizarTabla(num, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
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
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR NOMBRE
	$('#nom_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR CORREO
	$('#cor_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TELEFONO
	$('#tel_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR CEDULA
	$('#ced_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR CARGO
	$('#car_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
		paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
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
	// CONTRATAR ASPIRANTE
	$('#contratar').on('click', function(e){
		e.preventDefault();
		contratarAspirante($('#id').val(), $('#correo').val());
	});
	// DENEGAR ASPIRANTE
	$('#eliminar_aspirante').on('click', function(e){
		e.preventDefault();
	});
	$('#den_asp_btn').on('click', function(e){
		e.preventDefault();
		denegarAspirante($('#id').val(), $('#correo').val());
	});
	// CONTRATAR ASPIRANTE
	function contratarAspirante(consulta, correo){
		$.ajax({
			url: 'json/php/contratarAspirante',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, correo: correo},
		})
		.done(function(respuesta){
			if (respuesta != 'Exito') {
				alert('Error de solicitud');
			} else {
				$('#abrir_modal').click();
				setTimeout(function(){
					actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
					paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
					$('#cerrar_modal').click();
					$('#cerrar_notifiacion_exitosa').click();
				},1000);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// DENEGAR ASPIRANTE
	function denegarAspirante(consulta, correo){
		$.ajax({
			url: 'json/php/denegarAspirante',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, correo: correo},
		})
		.done(function(respuesta){
			if (respuesta != 'Exito') {
				alert('Error de solicitud');
			} else {
				actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
				paginacionSolicitud('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#cor_busq').val(), $('#tel_busq').val(), $('#ced_busq').val(), $('#car_busq').val(), $('#est_busq').val());
				// CERRAR MODAL
				$('#cerrar_denegar_aspirante_conf').click();
				$('#cerrar_modal').click();
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});