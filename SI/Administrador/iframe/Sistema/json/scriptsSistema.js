$(document).ready(function(){
	// TRAER EVENTOS
	traerEventos(0);
	// PAGINACION EVENTOS
	paginacionEventos('HW');
	// IMAGEN DEL EVENTO
	$('#img_tipo_evento').on('change', function(){
		subirImagenEvento();
	});
	// IMAGEN DEL EVENTO CARD
	$('#img_tipo_evento_card').on('change', function(){
		subirImagenEventoCard();
	});
	// COSTO
	$('#costo_evento').on('keypress', function(){
		return soloNumeros(event);
	});
	// AGREGAR EVENTO
	$('#agregar_evento').on('click', function(e){
		e.preventDefault();
		if ($('#tipo_evento').val() != ''
			&& $('#img_tipo_evento').val() != ''
			&& $('#img_tipo_evento_card').val() != ''
			&& $('#extracto_evento').val() != ''
			&& $('#costo_evento').val() != '') {
			registrarEvento($('#tipo_evento').val(), $('#nom_img_tipo_evento').val(), $('#nom_img_tipo_evento_card').val(), $('#extracto_evento').val(), $('#costo_evento').val());
			$('#mens_err_agr_eve').text('');
		} else {
			$('#mens_err_agr_eve').text('Completa todos los datos*');
		}
	});
	// ELIMINAR EVENTO
	$('#elim_eve_btn').on('click', function(e){
		e.preventDefault();
		eliminarEvento($(this).val());
	});
	// FUNCION TARER EVENTOS
	function traerEventos(consulta){
		$.ajax({
			url: 'json/php/Eventos/traerEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody_eventos').html(respuesta);
			// EDITAR EVENTO
			$('.edit_event').on('click', function(){
				alert('Editar: ' + $(this).val());
			});
			// ELIMINAR EVENTO
			$('.elim_event').on('click', function(){
				$('#elim_eve_btn').val($(this).val());
				$('#tit_eve_elim').text($(this).attr('title'));
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionEventos(consulta){
		$.ajax({
			url: 'json/php/Eventos/paginacionEventos',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#paginacion_eventos').html(respuesta);
			// BOTON DE PAGINACION
			$('.pag').on('click', function(e){
				e.preventDefault();
				$('.pag').addClass('bg-dark');
				$(this).removeClass('bg-dark');
				$(this).addClass('bg-info');
			});
			// ACTUALIZAR LA TABLA AUTOMATICAMENTE
			$('.pag').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 5;
				traerEventos(num);
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// SUBIR IMAGEN 
	function subirImagenEvento(){
		var formData = new FormData();
		var files = $('#img_tipo_evento')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: 'json/php/Eventos/subirImagen',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$('#nom_img_tipo_evento').val(response);
				} else {
					alert('Error de subida');
				}
			}
		});
	}
	// SUBIR IMAGEN CARD
	function subirImagenEventoCard(){
		var formData = new FormData();
		var files = $('#img_tipo_evento_card')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: 'json/php/Eventos/subirImagenCard',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$('#nom_img_tipo_evento_card').val(response);
				} else {
					alert('Error de subida');
				}
			}
		});
	}
	// REGISTRAR NUEVO EVENTO
	function registrarEvento(tipo, imagen, imagen_card, extracto, costo){
		$.ajax({
			url: 'json/php/Eventos/registrarEvento',
			type: 'POST',
			dataType: 'html',
			data: {tipo: tipo, imagen: imagen, imagen_card: imagen_card, extracto: extracto, costo: costo},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				alert('Registrado Exitosamente');
				// TRAER EVENTOS
				traerEventos(0);
				// PAGINACION EVENTOS
				paginacionEventos('HW');
				$('#tipo_evento').val('');
				$('#img_tipo_evento').val('');
				$('#img_tipo_evento_card').val('');
				$('#extracto_evento').val('');
				$('#costo_evento').val('');
				$('#nom_img_tipo_evento').val('');
				$('#nom_img_tipo_evento_card').val('');
			} else {
				alert('Error: ' + respuesta);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ELIMINAR EVENTO
	function eliminarEvento(consulta){
		$.ajax({
			url: 'json/php/Eventos/eliminarEvento',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				alert('El evento ha sido eliminado');
				// TRAER EVENTOS
				traerEventos(0);
				// PAGINACION EVENTOS
				paginacionEventos('HW');
				$('#canc_eve_btn').click();
			} else if (respuesta == 'Ocupado') {
				alert('Lo siento, hay solicitudes de este evento');
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

	// TRAER LUGARES
	traerLugares(0);
	// PAGINACION LUGARES
	paginacionLugares('HW');
	// TRAER TIPO DE LUGARES
	traerTipoLugares('HW');
	// COSTO DEL LUGAR
	$('#cost_lug').on('keypress', function(){
		return soloNumeros(event);
	});
	// SUBIR IMAGEN SEGUN EL TIPO DE LUGAR
	$('#tip_lug').on('change', function(){
		if ($(this).val() != '') {
			$('#img_lug').prop('disabled', false);
			$('#lbl_img_lug').removeClass('disabled');
			detectarTipoLugar($(this).val());
		} else {
			$('#img_lug').prop('disabled', true);
			$('#lbl_img_lug').addClass('disabled');
		}
	});
	// SUBIR IMAGEN
	$('#img_lug').on('change', function(){
		subirImagenLugar();
	});
	// AGREGAR LUGAR
	$('#agr_lug').on('click', function(e){
		e.preventDefault();
		if ($('#nom_lug').val() != ''
			&& $('#tip_lug').val() != ''
			&& $('#img_lug').val() != ''
			&& $('#direc_lug').val() != ''
			&& $('#desc_lug').val() != ''
			&& $('#cost_lug').val() != '') {
			registrarLugar($('#nom_lug').val(), $('#tip_lug').val(), $('#nom_img_lug').val(), $('#direc_lug').val(), $('#desc_lug').val(), $('#cost_lug').val());
			$('#men_err_agr_lug').text('');
		} else {
			$('#men_err_agr_lug').text('Completa todos los datos*');
		}
	});
	// ELIMINAR LUGAR
	$('#elim_lug_btn').on('click', function(e){
		e.preventDefault();
		eliminarLugar($(this).val());
	});
	// DETECTAR TIPO DE LUGAR
	function detectarTipoLugar(consulta){
		$.ajax({
			url: 'json/php/Lugares/detectarTipoLugar',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// DETECTO TIPO LUGAR
			if (respuesta != 'Exito') {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// FUNCION SUBIR IMAGEN
	function subirImagenLugar(){
		var formData = new FormData();
		var files = $('#img_lug')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: 'json/php/Lugares/subirImagen',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$('#nom_img_lug').val(response);
				} else {
					alert('Error de subida' + response);
				}
			}
		});
	}
	// TRAER TIPO DE LUGARES
	function traerTipoLugares(consulta){
		$.ajax({
			url: 'json/php/Lugares/traerTipoLugar',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#tip_lug').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// FUNCION TARER EVENTOS
	function traerLugares(consulta){
		$.ajax({
			url: 'json/php/Lugares/traerLugares',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody_lugares').html(respuesta);
			// EDITAR EVENTO
			$('.edit_lug').on('click', function(){
				alert('Editar: ' + $(this).val());
			});
			// ELIMINAR EVENTO
			$('.elim_lug').on('click', function(){
				$('#elim_lug_btn').val($(this).val());
				$('#tit_lug_elim').text($(this).attr('title'));
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionLugares(consulta){
		$.ajax({
			url: 'json/php/Lugares/paginacionLugares',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#paginacion_lugares').html(respuesta);
			// BOTON DE PAGINACION
			$('.lug').on('click', function(e){
				e.preventDefault();
				$('.lug').addClass('bg-dark');
				$(this).removeClass('bg-dark');
				$(this).addClass('bg-info');
			});
			// ACTUALIZAR LA TABLA AUTOMATICAMENTE
			$('.lug').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 5;
				traerLugares(num);
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// REGISTRAR LUGAR
	function registrarLugar(nombre, tipo, imagen, direccion, descripcion, costo){
		$.ajax({
			url: 'json/php/Lugares/registrarLugar',
			type: 'POST',
			dataType: 'html',
			data: {nombre: nombre, tipo: tipo, imagen: imagen, direccion: direccion, descripcion: descripcion, costo: costo},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#nom_lug').val('');
				$('#tip_lug').val('');
				$('#img_lug').val('');
				$('#direc_lug').val('');
				$('#desc_lug').val('');
				$('#cost_lug').val('');
				$('#nom_img_lug').val('');
				// ALERTA
				alert('Agregado correctamente');
				// TRAER LUGARES
				traerLugares(0);
				// PAGINACION LUGARES
				paginacionLugares('HW');
			} else {
				alert('Lo siento, algo ha salido mal: ' + respuesta);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// ELIMINAR LUGAR
	function eliminarLugar(consulta){
		$.ajax({
			url: 'json/php/Lugares/eliminarLugares',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				// TRAER LUGARES
				traerLugares(0);
				// PAGINACION LUGARES
				paginacionLugares('HW');
				// CERRAR MODAL
				$('#canc_lug_btn').click();
			} else if (respuesta == 'Ocupado') {
				alert('Lo siento, hay solicitudes con este lugar');
			} else {
				alert('Lo siento, algo ha salido mal: ' + respuesta);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}

	// TRAER EVENTOS
	traerTematicas(0);
	// PAGINACION EVENTOS
	paginacionTematicas('HW');
	// FUNCION TARER EVENTOS
	function traerTematicas(consulta){
		$.ajax({
			url: 'json/php/Tematicas/traerTematicas',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody_tematicas').html(respuesta);
			// ELIMINAR EVENTO
			// --------------------------------------------------------------------
			$('.elim_tema').on('click', function(){
				$('#elim_tem_btn').val($(this).val());
			});
			// --------------------------------------------------------------------
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionTematicas(consulta){
		$.ajax({
			url: 'json/php/Tematicas/paginacionTematicas',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#paginacion_tematicas').html(respuesta);
			// BOTON DE PAGINACION
			$('.tema').on('click', function(e){
				e.preventDefault();
				$('.tema').addClass('bg-dark');
				$(this).removeClass('bg-dark');
				$(this).addClass('bg-info');
			});
			// ACTUALIZAR LA TABLA AUTOMATICAMENTE
			$('.tema').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 5;
				traerTematicas(num);
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	// TRAER VISTA PREVIA XLSX
	$('#btn_subir_xlsx').on('change', function(){
		$('#name_xlsx').val($(this).val());
		traerVistaPrevia();
	});
	// SUBIR ARCHIVO XLSX
	$('#btn_sub_arch_xlsx').on('click', function(e){
		e.preventDefault();
		subirArchivoXlsx();
	});
	// TRAER VISTA PREVIA
	function traerVistaPrevia(){
		var formData = new FormData();
		var files = $('#btn_subir_xlsx')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: 'json/php/Tematicas/vistaPrevia',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				$('#tbody_xlsx').html(response);
			}
		});
	}
	// SUBIR ARCHIVO
	function subirArchivoXlsx(){
		var formData = new FormData();
		var files = $('#btn_subir_xlsx')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: 'json/php/Tematicas/subirArchivo',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 'Error') {
					// LIMPIAR TABLA
					$('#tbody_xlsx').html(response);
					// TRAER EVENTOS
					traerTematicas(0);
					// PAGINACION EVENTOS
					paginacionTematicas('HW');
					// LIMPIAR DATOS
					$('#btn_subir_xlsx').val('');
					$('#name_xlsx').val('');
					// CERRAR MODAL
					$('#cerrar_xlsx').click();
				} else {
					alert(response);
				}
			}
		});
	}
	// ELIMINAR TEMATICA
	$('#elim_tem_btn').on('click', function(e){
		e.preventDefault();
		eliminarTematica($(this).val());
	});
	// ELIMINAR EVENTO
	function eliminarTematica(consulta){
		$.ajax({
			url: 'json/php/Tematicas/eliminarTematica',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				alert('La tematica ha sido eliminada');
				// TRAER EVENTOS
				traerTematicas(0);
				// PAGINACION EVENTOS
				paginacionTematicas('HW');
				$('#canc_tem_btn').click();
			} else if (respuesta == 'Ocupado') {
				alert('Lo siento, hay solicitudes de esta tematica');
			} else {
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// --------------------------------------------------------------------------------------------
	// TRAER EVENTOS
	traerUsuarios(0);
	// PAGINACION EVENTOS
	paginacionUsuarios('HW');
	// FUNCION TARER EVENTOS
	function traerUsuarios(consulta){
		$.ajax({
			url: 'json/php/Usuarios/traerUsuarios',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			// TRAER TABLA
			$('#tbody_usuarios').html(respuesta);
			// EDITAR EVENTO
			$('.edit_user').on('click', function(){
				alert('Editar: ' + $(this).val());
			});
			// ELIMINAR EVENTO
			$('.elim_user').on('click', function(){
				alert('Eliminar: ' + $(this).val());
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
	var num = 0;
	// PAGINACION EVENTOS
	function paginacionUsuarios(consulta){
		$.ajax({
			url: 'json/php/Usuarios/paginacionUsuarios',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#paginacion_usuarios').html(respuesta);
			// BOTON DE PAGINACION
			$('.user').on('click', function(e){
				e.preventDefault();
				$('.user').addClass('bg-dark');
				$(this).removeClass('bg-dark');
				$(this).addClass('bg-info');
			});
			// ACTUALIZAR LA TABLA AUTOMATICAMENTE
			$('.user').on('click', function(e){
				e.preventDefault();
				num = $(this).text();
				num = (num - 1) * 10;
				traerUsuarios(num);
			});
		})
		.fail(function(){
			console.log('error');
		});
	}
});