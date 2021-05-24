$(document).ready(function(){
	$('#correo').on('change', function(){
		validarImagenCorreo($(this).val());
	});

	function validarImagenCorreo(consulta){
		$.ajax({
			url: 'json/Index/php/validarImagenCorreo',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			var estado = respuesta;
			$('#usuario_submit_ingresar').attr('src', 'img/personal/usuarios/' + estado);
		})
		.fail(function(){
			console.log('error');
		});
	}
	function validarDatos(correo, password){
		$.ajax({
			url: 'json/Index/php/validarIngreso',
			type: 'POST',
			dataType: 'html',
			data: {correo: correo, password: password}
		})
		.done(function(respuesta){
			if (respuesta == 'true') {
				window.location.href = "config/direccion";
			} else if (respuesta == 'Deshabilitado') {
				window.location.href = "config/error";
			} else {
				$('.alerta-modal').removeClass('d-none');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}

	$('#btn_submit_ingresar').on('click', function(e){
		e.preventDefault();
		validarDatos($('#correo').val(), $('#password').val());
	});
	
});