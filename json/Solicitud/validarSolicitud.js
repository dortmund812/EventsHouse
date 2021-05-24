$(document).ready(function(){
	// DETECTAR IDIOMA
	if ($('#detectar_idioma').text() == 'Idioma') {
		window.location.href = "solicitud?id_evento="+$('.spnevt').attr('id');
	}
	// FUNCTION ALERTA INICIAL
	function alertaInicial(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/alertaInicial',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#alerta_solicitud').html(respuesta);
						// ABRIR MODAL
						$('#btn_alerta').click();
					})
		.fail(function(){
			console.log('error');
		});	
	}
	alertaInicial('HW');
	var rutaConfigDireccion = $('#rutaP').text() + 'config/direccion';
	// VALIDAR UNA SESION
	function validarSesionBoton(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/comprobarSesion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'true') {
				window.location.href = rutaConfigDireccion;
			}
		})
		.fail(function(){
			console.log('error');
		});	
	}
	// TRAER EVENTO
	function traerEvento(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerEvento',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#tit_event').text(respuesta[1]);
			$('#paquete_tipo_evento').val(respuesta[1]);
			$('#img_event').attr('src', '../../img/eventos/' + respuesta[2]);
			$('#img_paqut').attr('src', '../../img/eventos/' + respuesta[2]);
			$('#extracto_evento').text(respuesta[4]);
			$('#paquete_costo_minimo').val(respuesta[6]);
		})
		.fail(function(){
			console.log('error');
		});
	}
	traerEvento($('.spnevt').attr('id'));
	// TRAER TEMATICAS
	function traerTematicas(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerTematicas',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#tematica_evento').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	traerTematicas('HM');
	// TRAER TIPOS DE LUGARES
	function traerTipoLugares(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerTipoLugares',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#tipo_lugar').html(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	traerTipoLugares('HM');
	// TRAER LUGARES SEGUN EL TIPO
	function traerLugares(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerLugares',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#lugares').html(respuesta);
			traerEspecificacion($('#lugares').val());
		})
		.fail(function(){
			console.log('error');
		});
	}
	traerLugares($('#tipo_lugar').val());
	// TRAER ESPECIFICACION DEL LUGAR
	function traerEspecificacion(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerEspecificacion',
			type: 'POST',
			dataType: 'json',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#img_lugar_persona').attr('src', '../../img/lugares/' + respuesta[0] + respuesta[1]);
			$('#img_lugar').attr('src', '../../img/lugares/' + respuesta[0] + respuesta[1]);
			$('#nombre_lugar').val(respuesta[2]);
			$('#tipo_lugar_info').val(respuesta[3]);
			$('#direccion_lugar').val(respuesta[4]);
			$('#estado_lugar').val(respuesta[5]);
			$('#descripcion_lugar').val(respuesta[6]);
			infoLugar();
		})
		.fail(function(){
			console.log('error');
		});
	}
	// INFORMACION DEL LUGAR
	function infoLugar(){
		// TIPO DE LUGAR
		$('#paquete_tipo_lugar').val($('#tipo_lugar_info').val());
		// NOMBRE DEL LUGAR
		$('#paquete_nombre_lugar').val($('#nombre_lugar').val());
		// DIRECCION
		$('#paqute_direccion_lugar').val($('#direccion_lugar').val());
		// ESTADO
		$('#paquete_estado_lugar').val($('#estado_lugar').val());
		// DESCRIPCION
		$('#paqute_descripcion_lugar').val($('#descripcion_lugar').val());
		}
	// TRAER BANQUETES
	function traerBanquetes(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerBanqutes',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#banquetes_bd').html(respuesta);
				// ESTILOS DEL BANQUETE SELECCIONADO
				$('.banquete-card').on('click', function(){
					$('.banquete-card').removeClass('card-select');
					$(this).addClass('card-select');
				});
				// BANQUETE
				$('.rad-banq').on('click', function(){
					$('#paquete_banquete').attr('placeholder', $(this).val());
					$.ajax({
						url: '../../json/Solicitud/php/paqueteBanquete',
						type: 'POST',
						dataType: 'json',
						data: {consulta: $(this).val()},
					})
					.done(function(respuesta){
						$('#paquete_banquete').val(respuesta[1]);
						$('#img_banquet').attr('src', '../../img/Comidas/' + respuesta[2]);
					})
					.fail(function(){
						console.log('error');
					});
				});
				// SELECCIONAR BANQUETE
				$('#banquete1').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete1').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten1').addClass('d-none');
				});
				$('#banquete2').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete2').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten2').addClass('d-none');
				});
				$('#banquete3').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete3').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten3').addClass('d-none');
				});
				$('#banquete4').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete4').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten4').addClass('d-none');
				});
				$('#banquete5').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete5').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten5').addClass('d-none');
				});
				$('#banquete6').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete6').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten6').addClass('d-none');
				});
				$('#banquete7').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete7').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten7').addClass('d-none');
				});
				$('#banquete8').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete8').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten8').addClass('d-none');
				});
				$('#banquete9').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete9').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten9').addClass('d-none');
				});
				$('#banquete10').on('click', function(){
					$('.banquetePS').addClass('d-none');
					$('.banquete10').removeClass('d-none');
					$('.banqueteMs').removeClass('d-none');
					$('.banqueten10').addClass('d-none');
				});
			})
		.fail(function(){
			console.log('error');
		});
	}
	traerBanquetes(0);
	// PAGINACION DE BANQUETES
	function paginacionBanquete(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/traerPaginacion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#paginacion_banquetes').html(respuesta);
						// BOTON DE PAGINACION
						$('.btn-paginacion').on('click', function(e){
							e.preventDefault();
							$('.btn-paginacion').addClass('btn-dark');
							$(this).removeClass('btn-dark');
							$(this).addClass('btn-primary');
							traerBanquetes((($(this).text()) - 1) * 4);
						});
					})
		.fail(function(){
			console.log('error');
		});
	}
	paginacionBanquete('HW');
	// FECHA DE SOLICITUD
	function fechaSolicitud(){
		var fecha = new Date();
		// DIA
		if (fecha.getDate() < 10) {
			dia = '0' + fecha.getDate();
		} else {
			dia = fecha.getDate();
		}
		// MES
		if ((fecha.getMonth() + 1) < 10) {
			var mes = '0' + (fecha.getMonth() + 1);
		} else {
			var mes = fecha.getMonth() + 1;
		}
		// AÑO
		var year = fecha.getFullYear();
		// FECHA ACTUAL
		return year + '-' + mes + '-' + dia;
	}
	// FECHA MINIMA DEL EVENTO
	function fechaMinEvento(){
		var fecha = new Date();
		// DIA
		if ((fecha.getDate() + 7) < 10) {
			dia = '0' + (fecha.getDate() + 7);
			// MES
			if ((fecha.getMonth()+1) < 10) {
			var mes = '0' + (fecha.getMonth()+1);
			} else {
				var mes = fecha.getMonth() + 1;
			}
		} else {
			// ASIGNAR LA FECHA MINIMA DEL EVENTO
			if ((fecha.getDate() + 7) > 30) {
				dia = (fecha.getDate() + 7) - 30;
				if (dia < 10) {
					dia = '0' + dia;
				}
				// MES
				if ((fecha.getMonth() + 2) < 10) {
					var mes = '0' + (fecha.getMonth() + 2);
				} else {
					var mes = fecha.getMonth() + 2;
				}
			} else {
				dia = fecha.getDate() + 7;
				// MES
				if ((fecha.getMonth()+1) < 10) {
				var mes = '0' + (fecha.getMonth()+1);
				} else {
					var mes = fecha.getMonth() + 1;
				}
			}
		}
		// AÑO
		var year = fecha.getFullYear();
		// FECHA ACTUAL
		return year + '-' + mes + '-' + dia;
	}
	// FECHA MAXIMA DEL EVENTO
	function fechaMaxEvento(){
		var fecha = new Date();
		// DIA
		if (fecha.getDate() < 10) {
			dia = '0' + fecha.getDate();
		} else {
			dia = fecha.getDate();
		}
		// MES
		if ((fecha.getMonth() + 1) < 10) {
			var mes = '0' + (fecha.getMonth() + 1);
		} else {
			var mes = fecha.getMonth() + 1;
		}
		// AÑO
		var year = fecha.getFullYear() + 1;
		// FECHA ACTUAL
		return year + '-' + mes + '-' + dia;
	}
	// FORMATO DE FECHA
	function formatoFecha(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/formatoFecha',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			$('#paquete_fecha_evento').val(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
	// VALIDAR DATOS
	function validarDatosFormulario(){
		// TIPO DE EVENTO
		if ($('#paquete_tipo_evento').val() == '') {
			$('#paquete_tipo_evento').addClass('inp-falta');
		} else {
			$('#paquete_tipo_evento').removeClass('inp-falta');
		}
		// TEMATICA
		if ($('#paquete_tematica_evento').val() == '') {
			$('#paquete_tematica_evento').addClass('inp-falta');
		} else {
			$('#paquete_tematica_evento').removeClass('inp-falta');
		}
		// NOMBRE DEL EVENTO
		if ($('#paquete_titulo_evento').val() == '') {
			$('#paquete_titulo_evento').addClass('inp-falta');
		} else {
			$('#paquete_titulo_evento').removeClass('inp-falta');
		}
		// NOMBRE DEL ANFITRION
		if ($('#paquete_nombre_anfitrion').val() == '') {
			$('#paquete_nombre_anfitrion').addClass('inp-falta');
		} else {
			$('#paquete_nombre_anfitrion').removeClass('inp-falta');
		}
		// RECORDATORIOS
		if ($('#paqute_recordatorios_evento').val() == '') {
			$('#paqute_recordatorios_evento').addClass('inp-falta');
		} else {
			$('#paqute_recordatorios_evento').removeClass('inp-falta');
		}
		// CANTIDAD DE PERSONAS
		if ($('#paquete_cantidad_personas').val() == '') {
			$('#paquete_cantidad_personas').addClass('inp-falta');
		} else {
			if ($('#paquete_cantidad_personas').val() > 950) {
				$('#paquete_cantidad_personas').addClass('inp-falta');
			} else {
				$('#paquete_cantidad_personas').removeClass('inp-falta');
			}
		}
		// FECHA DEL EVENTO
		if ($('#paquete_fecha_evento').val() == '') {
			$('#paquete_fecha_evento').addClass('inp-falta');
		} else {
			$('#paquete_fecha_evento').removeClass('inp-falta');
		}
		// BANQUETE
		if ($('#paquete_banquete').val() == '') {
			$('#paquete_banquete').addClass('inp-falta');
		} else {
			$('#paquete_banquete').removeClass('inp-falta');
		}
	}
	// CALCULAR COSTO MINIMO
	function costoMinimo(evento, tematica, recordatorios, personas, lugar, banquete){
		$.ajax({
			url: '../../json/Solicitud/php/costoMinimo',
			type: 'POST',
			dataType: 'html',
			data: {evento: evento, tematica: tematica, recordatorios: recordatorios, personas: personas, lugar: lugar, banquete: banquete},
		})
		.done(function(respuesta){
						// ASIGNAMOS VALOR
						$('#paquete_costo_minimo').val(respuesta);
						$('#paquete_costo_maximo').val(respuesta * 1.3);
						// PLACEHOLDER
						$('#paquete_costo_minimo').attr('placeholder', respuesta);
						$('#paquete_costo_maximo').attr('placeholder', respuesta * 1.3);
						// CONVERSION A MONEDA
						$('#paquete_costo_minimo').val(monedaChange($('#paquete_costo_minimo').val()));
						$('#paquete_costo_maximo').val(monedaChange($('#paquete_costo_maximo').val()));
					})
		.fail(function(){
			console.log('error');
		});
	}
	// VALIDAR SESION FORMULARIO
	function validarSesionFormulario(consulta){
		$.ajax({
			url: '../../json/Solicitud/php/comprobarSesion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'true') {
				enviarSolicitud($('#paquete_titulo_evento').val(), $('#paquete_nombre_anfitrion').val(), $('#paquete_formalidad_evento').val(), $('#recordatorios').val(), $('#paquete_comentarios').val(), $('#cantidad_personas').val(), $('#paquete_costo_minimo').attr('placeholder'), $('#paquete_costo_maximo').attr('placeholder'), $('#fecha_evento').val(), $('#paquete_banquete').attr('placeholder'), $('#lugares').val(), $('#tematica_evento').val(), $('.spnevt').attr('id'));
			} else {
				$('#alerta_terminos_falta').text('*Porfavor Inicia Sesion');
				$('#btn_menu_ingresar').click();
				$('#envio_formulario').prop('disabled', false);
				$('#pre-loader').removeClass('active');
			}
		})
		.fail(function(){
			console.log('error');
		});	
	}
	// ENVIAR SOLICITUD
	function enviarSolicitud(titulo, anfitrion, formalidad, recordatorios, comentarios, personas, costoMinimo, costoMaximo, fecha, banquete, lugar, tematica, evento){
		$.ajax({
			url: '../../json/Solicitud/php/crearSolicitud',
			type: 'POST',
			dataType: 'html',
			data: {titulo: titulo, anfitrion: anfitrion, formalidad: formalidad, recordatorios: recordatorios, comentarios: comentarios, personas: personas, costoMinimo: costoMinimo, costoMaximo: costoMaximo, fecha: fecha, banquete: banquete, lugar: lugar, tematica: tematica, evento: evento},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				window.location.href = rutaConfigDireccion;
			} else {
				alert(respuesta);
				$('#envio_formulario').prop('disabled', false);
				$('#pre-loader').removeClass('active');
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
	// FUNCION VALIDAR LETRAS
	function soloLetras(e) {
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
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
	// CONVERSION DE COSTO A MONEDA
	function monedaChange (inputNumv) {
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
				separados.push(inputNum[0].substring(pos, (pos + 3)))
			}
		} else {
			separados = [inputNum[0]]
		}
		return '$' + separados.join(',');
	};
	// CALCULAR EL COSTO MINIMO
	setInterval(function(){
		costoMinimo($('.spnevt').attr('id'), $('#tematica_evento').val(), $('#recordatorios').val(), $('#cantidad_personas').val(), $('#lugares').val(), $('#paquete_banquete').attr('placeholder'));
	}, 1000);
	// VALIDAR SESION CON EL BOTON
	$('#btn_menu_ingresar').on('click', function(e){
		e.preventDefault();
		validarSesionBoton('HW');
	});
	// ASIGNAR LA FECHA DE LA SOLICITUD
	$('#fecha_solicitud').val(fechaSolicitud());
	// ASIGNAR FECHA MINIMA DEL EVENTO
	$('#fecha_evento').attr('min', fechaMinEvento());
	$('#fecha_evento').attr('max', fechaMaxEvento());
	// TEMATICA DEL EVENTO
	$('#tematica_evento').on('change', function(){
		$.ajax({
			url: '../../json/Solicitud/php/paqueteTematica',
			type: 'POST',
			dataType: 'html',
			data: {consulta: $('#tematica_evento').val()},
		})
		.done(function(respuesta){
			$('#paquete_tematica_evento').val(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	});
	// NOMBRE DEL EVENTO
	$('#nombre_evento').on('change', function(){
		$('#paquete_titulo_evento').val($(this).val());
	});
	// NOMBRE DEL ANFITRION
	$('#nombre_anfitrion').on('change', function(){
		$('#paquete_nombre_anfitrion').val($(this).val());
	});
	$('#nombre_anfitrion').on('keypress', function(){
		return soloLetras(event);
	});
	// FORMALIDAD DEL EVENTO
	$('#formalidad_evento').on('change', function(){
		$('#paquete_formalidad_evento').val($(this).val());
	});
	// RECORDATORIOS
	$('#recordatorios').on('change', function(){
		$.ajax({
			url: '../../json/Solicitud/php/paqueteRecordatorio',
			type: 'POST',
			dataType: 'html',
			data: {consulta: $('#recordatorios').val()},
		})
		.done(function(respuesta){
			$('#paqute_recordatorios_evento').val(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	});
	// CANTIDAD DE PERSONAS
	$('#cantidad_personas').on('change', function(){
		if ($(this).val() >= 2 && $(this).val() <= 950) {
			$('#paquete_cantidad_personas').val($(this).val());
		} else {
			if ($(this).val() > 950) {
				$(this).val(950);
				$('#paquete_cantidad_personas').val($(this).val());
			} else if ($(this).val() < 2) {
				$(this).val('');
				$('#paquete_cantidad_personas').val($(this).val());
			}
		}
	});
	$('#cantidad_personas').on('keypress', function(){
		return soloNumeros(event);
	});
	// FECHA DE EVENTO
	$('#fecha_evento').on('change', function(){
		formatoFecha($(this).val());
	});
	// SI SE ELIGE UNA FECHA MENOR A LA FECHA MINIMA
	$('#fecha_evento').blur(function(){
		if ($(this).val() < fechaMinEvento()) {
			$(this).val(fechaMinEvento());
		}
		formatoFecha($(this).val());
	});
	// COMENTARIOS
	$('#comentarios').on('change', function(){
		$('#paquete_comentarios').val($(this).val());
	});
	// TIPO DE LUGAR
	$('#tipo_lugar').on('change', function(){
		traerLugares($('#tipo_lugar').val());
	});
	// LUGAR
	$('#lugares').on('change', function(){
		traerEspecificacion($('#lugares').val());
	});
	// ENVIAR FORMULARIO
	$('#form_solicitud').submit(function(){
		// VALIDAR TERMINOS Y CONDICIONES
		if ($('#terminos_condiciones').prop('checked') == true) {
			$('#alerta_terminos_falta').text('');
			validarDatosFormulario();
			if ($('#paquete_tipo_evento').val() != ''
				&& $('#paquete_tematica_evento').val() != ''
				&& $('#paquete_titulo_evento').val() != ''
				&& $('#paquete_nombre_anfitrion').val() != ''
				&& $('#paquete_cantidad_personas').val() != ''
				&& $('#paquete_fecha_evento').val() != ''
				&& $('#paquete_banquete').val() != '') {
				$('#envio_formulario').prop('disabled', true);
				validarSesionFormulario('HW');
				$('#pre-loader').addClass('active');
			} else {
				$('#alerta_terminos_falta').text('*Faltan Datos en la Solicitud');
			}
		} else {
			$('#alerta_terminos_falta').text('*Porfavor acepta los terminos y condiciones');
		}
		return false;
	});
});