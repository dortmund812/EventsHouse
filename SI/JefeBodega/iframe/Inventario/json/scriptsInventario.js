$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#nom_busq').toggleClass('inp_busq');
		$('#nom_busq').val('');
		$('#tip_busq').toggleClass('inp_busq');
		$('#tip_busq').val('');
		$('#can_busq').toggleClass('inp_busq');
		$('#can_busq').val('');
		$('#cos_busq').toggleClass('inp_busq');
		$('#cos_busq').val('');
		paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
		traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	});
	// TRAER TIPOS DE IMPLEMENTOS
	traerTipoImplemento('HW');
	// TRAER INVENTARIO
	traerInventario(0, '', '', '', '', '');
	// TRAER PAGINACION
	paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	// TRAER INVENTARIO
	function traerInventario(consulta, id, nombre, tipo, cantidad, costo){
		$.ajax({
			url: 'json/php/traerInventario',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, tipo: tipo, cantidad: cantidad, costo: costo},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody').html(respuesta);
			// ELIMINAR
			$('.eliminar').on('click', function(e){
				e.preventDefault();
				$('#btn_elim_imp').val($(this).val());
			});
			// MODIFICAR
			$('.editar').on('click', function(e){
				e.preventDefault();
				traerImplementoID($(this).val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	$('#btn_elim_imp').on('click', function(e){
		e.preventDefault();
		eliminarImplemento($(this).val());
	});
	var num = 0;
	// PAGINACION INVENTARIO
	function paginacionInventario(consulta, id, nombre, tipo, cantidad, costo){
		$.ajax({
			url: 'json/php/paginacionInventario',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, nombre: nombre, tipo: tipo, cantidad: cantidad, costo: costo},
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
				traerInventario(num, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
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
		paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
		traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	});
	// BUSCAR POR NOMBRE
	$('#nom_busq').keyup(function(){
		paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
		traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	});
	// BUSCAR POR TIPO
	$('#tip_busq').keyup(function(){
		paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
		traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	});
	// BUSCAR POR CANTIDAD
	$('#can_busq').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#can_busq').keyup(function(){
		paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
		traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	});
	// BUSCAR POR COSTO
	$('#cos_busq').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#cos_busq').keyup(function(){
		paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
		traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
	});


	// TIPOS DE IMPLEMENTOS
	function traerTipoImplemento(consulta){
		$.ajax({
			url: 'json/php/traerTipoImplemento',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#tipo').html(respuesta);
			$('#mod_tipo').html(respuesta);
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
	// REGISTARR IMPLEMENTO
	function registrarImplemento(nombre, tipo, cantidad, costo){
		$.ajax({
			url: 'json/php/registrarImplemento',
			type: 'POST',
			dataType: 'html',
			data: {nombre: nombre, tipo: tipo, cantidad: cantidad, costo: costo},
		})
		.done(function(respuesta){
			if (respuesta != 'Exito') {
				alert('Lo siento algo salio mal');
			} else {
				$('#abrir_modal').click();
				setTimeout(function(){
					$('#reg_nombre').val('');
					$('#tipo').val('');
					$('#reg_cantidad').val('');
					$('#reg_costo').val('');
					paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
					traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
					$('#cerrar_notifiacion_exitosa').click();
				},1000);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// VALIDAR CAMPOS
	function validarCampos(){
		// VALIDAR NOMBRE
		if ($('#reg_nombre').val() == '') {
			$('#reg_nombre').addClass('brd_error');
		} else {
			$('#reg_nombre').removeClass('brd_error');
		}
		// VALIDAR TIPO
		if ($('#tipo').val() == '') {
			$('#tipo').addClass('brd_error');
		} else {
			$('#tipo').removeClass('brd_error');
		}
		// VALIDAR CANTIDAD
		if ($('#reg_cantidad').val() == '') {
			$('#reg_cantidad').addClass('brd_error');
		} else {
			$('#reg_cantidad').removeClass('brd_error');
		}
		// VALIDAR COSTO
		if ($('#reg_costo').val() == '') {
			$('#reg_costo').addClass('brd_error');
		} else {
			$('#reg_costo').removeClass('brd_error');
		}

		if ($('#reg_nombre').hasClass("brd_error") == true
			|| $('#tipo').hasClass("brd_error") == true
			|| $('#reg_cantidad').hasClass("brd_error") == true
			|| $('#reg_costo').hasClass("brd_error") == true) {
			return false;
		} else {
			return true;
		}
	}
	// ELIMINAR IMPLEMENTO
	function eliminarImplemento(consulta){
		$.ajax({
			url: 'json/php/eliminarImplemento',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
				traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
				$('#cerrar_modal').click();
			} else {
				alert('Lo siento algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER IMPLEMENTO ID
	function traerImplementoID(consulta){
		$('#mod_tipo').removeClass('brd_error');
		$.ajax({
			url: 'json/php/traerImplementoID',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#nom_impl_mod').val(respuesta[1]);
			$('#mod_tipo').val(respuesta[2], function(){
				$(this).attr('selected', true);
			});
			$('#cant_impl_mod').val(respuesta[3]);
			$('#cost_impl_mod').val(respuesta[4]);
			$('#mod_impl').val(respuesta[0]);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// MODIFICAR IMPLEMENTO
	function modificarImplemento(id, nombre, cantidad, costo, tipo){
		$.ajax({
			url: 'json/php/modificarImplemento',
			type: 'POST',
			dataType: 'html',
			data: {id: id, nombre: nombre, cantidad: cantidad, costo: costo, tipo: tipo},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				paginacionInventario('HW', $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
				traerInventario(0, $('#id_busq').val(), $('#nom_busq').val(), $('#tip_busq').val(), $('#can_busq').val(), $('#cos_busq').val());
				$('#btn_cer_mod').click();
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// CAMBIAR NOMBRE
	$('#nom_impl_mod').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_error');
		} else {
			$(this).removeClass('brd_error');
		}
	});
	// MODIFICAR CANTIDAD
	$('#cant_impl_mod').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#cant_impl_mod').on('change', function(){
		if ($(this).val() > 10000000) {
			$(this).val(10000000);
		}
		if ($(this).val() < 0) {
			$(this).val('');
		}
	});
	// MODIFICAR COSTO
	$('#cost_impl_mod').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#cost_impl_mod').on('change', function(){
		if ($(this).val() > 10000000) {
			$(this).val(10000000);
		}
		if ($(this).val() < 50) {
			$(this).val('');
		}
	});
	// MODIFICAR TIPO DE IMPLEMENTO
	$('#mod_tipo').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_error');
		} else {
			$(this).removeClass('brd_error');
		}
	});
	// MODIFICAR IMPLEMENTO BTN
	$('#mod_impl').on('click', function(e){
		e.preventDefault();
		if ($('#nom_impl_mod').hasClass("brd_error") == true
			|| $('#mod_tipo').hasClass("brd_error") == true) {
			alert('Error de datos');
		} else {
			modificarImplemento($(this).val(), $('#nom_impl_mod').val(), $('#cant_impl_mod').val(), $('#cost_impl_mod').val(), $('#mod_tipo').val());
		}
	});
	// CANTIDAD
	$('#reg_cantidad').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#reg_cantidad').on('change', function(){
		if ($(this).val() > 10000000) {
			$(this).val(10000000);
		}
		if ($(this).val() < 0) {
			$(this).val('');
		}
	});
	// COSTO
	$('#reg_costo').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#reg_costo').on('change', function(){
		if ($(this).val() > 10000000) {
			$(this).val(10000000);
		}
		if ($(this).val() < 50) {
			$(this).val('');
		}
	});
	// TIPO
	$('#tipo').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_error');
		} else {
			$(this).removeClass('brd_error');
		}
	});
	// AGREGAR IMPLEMENTO
	$('#agr_implemento').on('click', function(e){
		e.preventDefault();
		if (validarCampos()) {
			registrarImplemento($('#reg_nombre').val(), $('#tipo').val(), $('#reg_cantidad').val(), $('#reg_costo').val());
		}
	});
});