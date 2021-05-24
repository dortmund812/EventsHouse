$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#nom_busq').toggleClass('inp_busq');
		$('#nom_busq').val('');
		$('#ape_busq').toggleClass('inp_busq');
		$('#ape_busq').val('');
		$('#car_busq').toggleClass('inp_busq');
		$('#car_busq').val('');
		$('#hon_busq').toggleClass('inp_busq');
		$('#hon_busq').val('');
		$('#tel_busq').toggleClass('inp_busq');
		$('#tel_busq').val('');
		$('#cor_busq').toggleClass('inp_busq');
		$('#cor_busq').val('');
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// TARER PERSONAL
	traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	// TRAER PAGINACIOM
	paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	// TRAER CARGOS
	traerCargos('HW');
	// TARER ESTADOS
	traerEstados('HW');
	// MODIFICAR
	$('#mod_empl').on('click', function(){
		$('#cargo').prop('disabled', false);
		$('#cargo').addClass('brd_cambio');
		$('#estado').prop('disabled', false);
		$('#estado').addClass('brd_cambio');
		$('#desp_empl').toggleClass('d-none');
		$('#btn_act_camb').toggleClass('d-none');
		$(this).toggleClass('d-none');
	});
	// ACEPTAR CAMBIOS
	$('#btn_act_camb').on('click', function(){
		modificarEmpleado($('#mod_empl').val(), $('#estado').val(), $(this).val(), $('#cargo').val());
		$('#cargo').prop('disabled', true);
		$('#cargo').removeClass('brd_cambio');
		$('#estado').prop('disabled', true);
		$('#estado').removeClass('brd_cambio');
		$('#desp_empl').toggleClass('d-none');
		$('#mod_empl').toggleClass('d-none');
		$(this).toggleClass('d-none');
	});
	// DESPEDIR EMPLEADO
	$('#desp_empl').on('click', function(){
		$('#desp_emp_btn').val($(this).val());
	});
	$('#desp_emp_btn').on('click', function(e){
		e.preventDefault();
		despedirEmpleado($(this).val());
	});
	// BUSCAR POR ID
	$('#id_busq').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#id_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// BUSCAR POR NOMBRE
	$('#nom_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// BUSCAR POR APELLIDO
	$('#ape_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// BUSCAR POR CARGO
	$('#car_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// BUSCAR POR HONORARIOS
	$('#hon_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// BUSCAR POR TELEFONO
	$('#tel_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// BUSCAR POR CORREO
	$('#cor_busq').keyup(function(){
		traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
		paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
	});
	// TRAER PERSONAL
	function traerPersonal(consulta, id, nombre, apellido, cargo, honorarios, telefono, correo){
		$.ajax({
			url: 'json/php/traerPersonal',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, apellido: apellido, cargo: cargo, honorarios: honorarios, telefono: telefono, correo: correo},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody').html(respuesta);
			$('.editar').on('click', function(){
				traerPersonalID($(this).val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionPersonal(consulta, id, nombre, apellido, cargo, honorarios, telefono, correo){
		$.ajax({
			url: 'json/php/paginacionPersonal',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, apellido: apellido, cargo: cargo, honorarios: honorarios, telefono: telefono, correo: correo},
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
				traerPersonal(num, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TARER PERSONAL ID
	function traerPersonalID(consulta){
		$.ajax({
			url: 'json/php/traerPersonalID',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#id').text(respuesta[0]);
			$('#desp_empl').val(respuesta[0]);
			$('#mod_empl').val(respuesta[0]);
			$('#nombre').val(respuesta[1] + ' ' + respuesta[2]);
			$('#cedula').val(respuesta[3]);
			$('#img_persona').attr('src', '../../../../img/personal/usuarios/' + respuesta[4]);
			$('#hoja_vida_empleado').attr('src', '../../../../archivos/hoja_vida/' + respuesta[5]);
			$('#telefono').val(respuesta[6]);
			$('#cargo').val(respuesta[7], function(){
				$(this).attr('selected', true);
			});
			$('#correo').val(respuesta[8]);
			$('#fecha_contrato').val(respuesta[9]);
			$('#estado').val(respuesta[10], function(){
				$(this).attr('selected', true);
			});
			$('#honorarios').val(monedaChange(respuesta[11]));
			$('#btn_act_camb').val(respuesta[12]);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TARER CARGOS
	function traerCargos(consulta){
		$.ajax({
			url: 'json/php/traerCargos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#cargo').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER ESTADOS
	function traerEstados(consulta){
		$.ajax({
			url: 'json/php/traerEstados',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#estado').html(respuesta);
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
	// MODIFICAR EMPLEADO
	function modificarEmpleado(id, estado, aspirante, rol){
		$.ajax({
			url: 'json/php/modificarEmpleado',
			type: 'POST',
			dataType: 'html',
			data: {id: id, estado: estado, aspirante: aspirante, rol: rol},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerPersonalID(id);
				$('#abrir_modal').click();
				// CERRAR ALERTA
				setTimeout(function(){
					$('#cerrar_notifiacion_exitosa').click();
				}, 1000);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// DESPEDIR EMPLEADO
	function despedirEmpleado(consulta){
		$.ajax({
			url: 'json/php/despedirEmpleado',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerPersonal(0, $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
				paginacionPersonal('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#ape_busq').val(), $('#car_busq').val(), $('#hon_busq').val(), $('#tel_busq').val(), $('#cor_busq').val());
				$('#cerrar_despedir_empleado_conf').click();
				$('#mod_2').click();
			} else {
				alert('Lo siento, algo ha salido mal');
			}
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
});