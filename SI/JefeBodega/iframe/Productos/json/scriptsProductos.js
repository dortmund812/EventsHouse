$(document).ready(function(){
	// BTN BUSCAR
	$('#incon_search').on('click', function(){
		$('#id_busq').toggleClass('inp_busq');
		$('#id_busq').val('');
		$('#imp_busq').toggleClass('inp_busq');
		$('#imp_busq').val('');
		$('#tip_busq').toggleClass('inp_busq');
		$('#tip_busq').val('');
		$('#cot_busq').toggleClass('inp_busq');
		$('#cot_busq').val('');
		$('#eve_busq').toggleClass('inp_busq');
		$('#eve_busq').val('');
		$('#can_busq').toggleClass('inp_busq');
		$('#can_busq').val('');
		$('#cos_busq').toggleClass('inp_busq');
		$('#cos_busq').val('');
		$('#est_busq').toggleClass('inp_busq');
		$('#est_busq').val('');
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// TRAER TABLA PRODUCTOS
	traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	// MOSTRAR PAGINACION
	paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	// TRAER TIPO DE IMPLEMENTO
	traerTipoImplemento('HW');
	// ELIMINAR PRODUCTO BTN
	$('#btn_elim_imp').on('click', function(e){
		e.preventDefault();
		eliminarProducto($(this).val());
	});
	// MODIFICAR CANTIDAD
	$('#cam_cant').on('keypress', function(){
		return soloNumeros(event);
	});
	$('#cam_cant').on('change', function(){
		if ($(this).val() > 10000000) {
			$(this).val(10000000);
		}
		if ($(this).val() <= 0) {
			$(this).val(1);
		}
	});
	// MODIFICAR TIPO DE IMPLEMENTO
	$('#cam_impl').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_error');
		} else {
			$(this).removeClass('brd_error');
		}
	});
	// MODIFICAR IMPLEMENTO BTN
	$('#btn_mod').on('click', function(e){
		e.preventDefault();
		if ($('#cam_impl').hasClass("brd_error") == true) {
			alert('Error de datos');
		} else {
			modificarProducto($(this).val(), $('#cam_cant').val(), $('#cam_impl').val());
		}
	});
	// TRAER PRODUCTOS
	function traerProductos(consulta, id, implemento, tipo, cotizacion, evento, cantidad, costo, estado){
		$.ajax({
			url: 'json/php/traerProductos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, implemento: implemento, tipo: tipo, cotizacion: cotizacion, evento: evento, cantidad: cantidad, costo: costo, estado: estado},
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
				traerProductoID($(this).val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TARER PAGINACION
	var num = 0;
	// PAGINACION INVENTARIO
	function paginacionInventario(consulta, id, implemento, tipo, cotizacion, evento, cantidad, costo, estado){
		$.ajax({
			url: 'json/php/paginacionProductos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta, id: id, implemento: implemento, tipo: tipo, cotizacion: cotizacion, evento: evento, cantidad: cantidad, costo: costo, estado: estado},
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
				traerProductos(num, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
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
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR IMPLEMENTO
	$('#imp_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR TIPO
	$('#tip_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR COTIZACION
	$('#cot_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR EVENTO
	$('#eve_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR CANTIDAD
	$('#can_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR COSTO
	$('#cos_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
		paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// BUSCAR POR ESTADO
	$('#est_busq').keyup(function(){
		traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
	});
	// ELIMINAR PRODUCTO
	function eliminarProducto(consulta){
		$.ajax({
			url: 'json/php/eliminarProducto',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
				paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
				$('#cerrar_modal').click();
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// MODIFICAR PRODUCTO
	function modificarProducto(id, cantidad, implemento){
		$.ajax({
			url: 'json/php/modificarProducto',
			type: 'POST',
			dataType: 'html',
			data: {id: id, cantidad: cantidad, implemento: implemento},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				traerProductos(0, $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
				paginacionInventario('HW', $('#id_busq').val(), $('#imp_busq').val(), $('#tip_busq').val(), $('#cot_busq').val(), $('#eve_busq').val(), $('#can_busq').val(), $('#cos_busq').val(), $('#est_busq').val());
				$('#cerrar_modificar').click();
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER TIPO DE IMPLEMENTO
	function traerTipoImplemento(consulta){
		$.ajax({
			url: 'json/php/traerTipoImplemento',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#cam_impl').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TARER PRODUCTO ID
	function traerProductoID(consulta){
		$.ajax({
			url: 'json/php/traerProductoID',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#cam_impl').val(respuesta[1], function(){
				$(this).attr('selected', true);
			});
			$('#cam_cant').val(respuesta[2]);
			$('#btn_mod').val(respuesta[0]);
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