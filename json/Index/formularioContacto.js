$(document).ready(function(){
	$('#form_contacto').submit(function(){
		if ($('#contacto_nombre').val() != ''
			&& $('#contacto_apellido').val() != ''
			&& $('#contacto_correo').val() != ''
			&& $('#contacto_telefono').val() != ''
			&& $('#contacto_motivo').val() != ''
			&& $('#contacto_mensaje').val() != '') {
			enviarFormularioContacto($('#contacto_nombre').val(), $('#contacto_apellido').val(), $('#contacto_correo').val(), $('#contacto_telefono').val(), $('#contacto_motivo').val(), $('#contacto_mensaje').val());
		} else {
			alert('Porfavor completa todos los datos');
		}
		return false;
	});
	function enviarFormularioContacto(nombre, apellido, correo, telefono, motivo, mensaje){
		$.ajax({
			url: 'json/Index/php/contacto',
			type: 'POST',
			dataType: 'html',
			data: {nombre: nombre, apellido: apellido, correo: correo, telefono: telefono, motivo: motivo, mensaje: mensaje},
		})
		.done(function(respuesta){
			if (respuesta == 'Exito') {
				alert('Mensaje Enviado Exitosamente');
				window.location.href = 'index';
			} else {
				alert('Algo ha salido mal');
			}
		})
		.fail(function(){
			console.log('error');
		});
	}
});