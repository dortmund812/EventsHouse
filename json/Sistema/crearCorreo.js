$(document).ready(function(){
	// VALIDAR TITULO
	$('#tit_env_cor').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
	});
	// VALIDAR USUARIO
	$('#selc_user_cor').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
			$('#corr_user_cor').prop('disabled', true)
		} else {
			$(this).removeClass('brd_red');
			if ($(this).val() == 6) {
				$('#corr_user_cor').prop('disabled', false);
			} else {
				$('#corr_user_cor').val('');
				$('#corr_user_cor').prop('disabled', true);
				$('#corr_user_cor').removeClass('brd_red');
				$('#mensaje_correo_dont_cor').text('');
			}
		}
	});
	// VALIDAR CORREO
	$('#corr_user_cor').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
		vlidarCorreoCor($(this).val());
	});
	// VALIDAR MENSAJE
	$('#mens_cor').on('change', function(){
		if ($(this).val() == '') {
			$(this).addClass('brd_red');
		} else {
			$(this).removeClass('brd_red');
		}
	});
	// CREAR CORREO
	$('#env_cor_new').on('click', function(e){
		e.preventDefault();
		$('#si_envio_cor').text('');
		validarDatosCor();
		if ($('#tit_env_cor').hasClass("brd_red") == true
			|| $('#selc_user_cor').hasClass("brd_red") == true
			|| $('#corr_user_cor').hasClass("brd_red") == true
			|| $('#mens_cor').hasClass("brd_red") == true) {
			$('#no_envio_cor').text('*Faltan Datos');
		} else {
			$('#no_envio_cor').text('');
			crearCorreo($('#tit_env_cor').val(), $('#selc_user_cor').val(), $('#corr_user_cor').val(), $('#mens_cor').val(), $('#nom_arc_cor').attr('placeholder'), $('#nom_arc_cor').val());
		}
	});
	// AGREGAR ARCHIVO
	$('#arch_cor').on('change', function(){
		traerArchivoCor();
	});
	// SUBIR ARCHIVO
	function traerArchivoCor(){
		var formData = new FormData();
		var files = $('#arch_cor')[0].files[0];
		formData.append('file',files);
		$.ajax({
			url: '../../json/Sistema/php/subirArchivoCorreo',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				$('#nom_arc_cor').attr('placeholder', response);
				$('#nom_arc_cor').val(response);
			}
		});
	}
	// VALIDAR CORREO EN LA BASE DE DATOS
	function vlidarCorreoCor(consulta){
		$.ajax({
			url: '../../json/Sistema/php/validarCorreo',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#corr_user_cor').removeClass('brd_red');
				$('#mensaje_correo_dont_cor').text('');
			} else {
				$('#corr_user_cor').addClass('brd_red');
				$('#mensaje_correo_dont_cor').text('El correo no existe');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
	// VALIDAR DATOS NOTIFICACION
	function validarDatosCor(){
		// VALIDAR TITULO
		if ($('#tit_env_cor').val() == '') {
			$('#tit_env_cor').addClass('brd_red');
		} else {
			$('#tit_env_cor').removeClass('brd_red');
		}
		// USUARIO
		if ($('#selc_user_cor').val() == '') {
			$('#selc_user_cor').addClass('brd_red');
		} else {
			$('#selc_user_cor').removeClass('brd_red');
			// CORREO USUARIO
			if ($('#selc_user_cor').val() == 6) {
				if ($('#corr_user_cor').val() == '') {
					$('#corr_user_cor').addClass('brd_red');
				} else {
					$('#corr_user_cor').removeClass('brd_red');
				}
			} else {
				$('#corr_user_cor').removeClass('brd_red');
			}
		}
		// VALIDAR MENSAJE
		if ($('#mens_cor').val() == '') {
			$('#mens_cor').addClass('brd_red');
		} else {
			$('#mens_cor').removeClass('brd_red');
		}
	}
	// FUNCION DE CREAR NOTIFICACION
	function crearCorreo(titulo, usuario, correo, mensaje, archivo, nombreArchivo){
		$.ajax({
			url: '../../json/Sistema/php/crearCorreo',
			type: 'POST',
			dataType: 'html',
			data: {titulo: titulo, usuario: usuario, correo: correo, mensaje: mensaje, archivo: archivo, nombreArchivo: nombreArchivo},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#tit_env_cor').val(''); 
				$('#selc_user_cor').val('');
				$('#corr_user_cor').val(''); 
				$('#mens_cor').val('');
				$('#arch_cor').val('');
				$('#nom_arc_cor').val('');
				$('#nom_arc_cor').attr('placeholder', '');
				$('#corr_user_cor').prop('disabled', true);
				$('#si_envio_cor').text('*Correo Enviado Correctamente*');
			} else {
				$('#si_envio_cor').text('');
				alert(respuesta);
				alert('Lo siento, algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});