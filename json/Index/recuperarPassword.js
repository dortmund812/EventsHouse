$(document).ready(function(){
	$('#aprov_rec_pass').on('click', function(e){
		e.preventDefault();
		if ($('#rec_correo').val() != ''
			&& $('#rec_cedula').val() != '') {
			validarDatosRecPass($('#rec_correo').val(), $('#rec_cedula').val());
		} else {
			$('#rech_rec_con').text('*Completa todos los datos.');
			$('#apro_rec_con').text('');
		}
	});
	function validarDatosRecPass(correo, cedula){
		$.ajax({
			url: 'json/Index/php/validarRecPass',
			type: 'POST',
			dataType: 'html',
			data: {correo: correo, cedula: cedula},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				$('#apro_rec_con').text('*Recibiras en tu correo la nueva contraseña');
				$('#rech_rec_con').text('');
				$('#rec_correo').val('');
				$('#rec_cedula').val('');
			} else {
				$('#apro_rec_con').text('');
				$('#rech_rec_con').text('*Datos incorrectos');
				alert(respuesta);
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});