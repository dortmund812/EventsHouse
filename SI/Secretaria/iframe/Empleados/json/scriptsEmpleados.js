$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#nom_busq').toggleClass('inp_busq');
		$('#nom_busq').val('');
		$('#ape_busq').toggleClass('inp_busq');
		$('#ape_busq').val('');
		$('#rol_busq').toggleClass('inp_busq');
		$('#rol_busq').val('');
		$('#lbl_fec').toggleClass('d-none');
		$('#fec_busq').toggleClass('d-none');
		$('#fec_busq').val('');
		$('#cor_busq').toggleClass('inp_busq');
		$('#cor_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// ACTUALIZAR TABLA
	actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	// TRAER LA PAGINACION
	paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	// ACTUALIZAR TABLA
	function actualizarTabla(consulta, id, nombre, apellido, rol, fecha, correo, estado){
		$.ajax({
			url: 'json/php/actualizarTabla',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, apellido: apellido, rol: rol, fecha: fecha, correo: correo, estado: estado},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody').html(respuesta);
			// TRAER LOS DATOS DE LA SOLICITUD
			$('.ver-mas').on('click', function(){
				traerEmpleado($(this).attr('id'));
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION DE EMPLEADOS
	function paginacionEmpleados(consulta, id, nombre, apellido, rol, fecha, correo, estado){
		$.ajax({
			url: 'json/php/paginacionEmpleados',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, apellido: apellido, rol: rol, fecha: fecha, correo: correo, estado: estado},
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
			// ACTUALIZAR TABLA POR PAGINACION
			$('.pag').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 10;
				actualizarTabla(num, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
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
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR NOMBRE
	$('#nom_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR APELLIDO
	$('#ape_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ROL
	$('#rol_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR FECHA
	$('#fec_busq').on('change', function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR CORREO
	$('#cor_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		actualizarTabla(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
		paginacionEmpleados('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#rol_busq').val(), $('#fec_busq').val(), $('#cor_busq').val(), $('#est_busq').val());
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
	// TARER EMPLEADO
	function traerEmpleado(consulta){
		$.ajax({
			url: 'json/php/traerEmpleado',
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
});