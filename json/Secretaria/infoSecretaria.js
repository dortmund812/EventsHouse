$(document).ready(function(){
	// EL ANCHO Y LARGO DE LA IMAGEN LATERAL
	var img_lateral = $('.img-lateral').width();
	$('.img-lateral').height(img_lateral);

	// TARE LOS DATOS DEL USUARIO
	function traerDatos(){
		var loader = document.getElementById('pre-loader');
		var peticion = new XMLHttpRequest();
		peticion.open('GET', '../../json/Secretaria/php/informacionSecretaria');

		loader.classList.add('active');

		peticion.onload = function(){
			var datos = JSON.parse(peticion.responseText);
			$('.imagen-usuario').attr('src', '../../img/personal/' + datos['ruta'] + datos['foto']);
			$('.nombre-cliente').text(datos['nombre']);
			$('.rol-cliente').text(datos['rol_ingreso']);
			// console.log(peticion.status);
		}

		peticion.onreadystatechange = function(){
			if (peticion.readyState == 4 && peticion.status == 200) {
				loader.classList.remove('active');
			}
		}
		peticion.send();
	}
	traerDatos();
	var rutaHome = $('#rutaP').text() + "config/direccion";
	// VALIDAR SESION
	setInterval(function(){
		$.ajax({
			url: '../../json/Secretaria/php/validarSesion',
			type: 'POST',
			dataType: 'html',
			data: {consulta: 'consulta'},
		})
		.done(function(respuesta){
			if (respuesta != 'OK') {
				window.location.href = rutaHome;
			}
		})
		.fail(function(){
			console.log('error');
		});
	}, 1000);
	setInterval(function(){
		$.ajax({
			url: '../../json/Secretaria/php/infoActual',
			type: 'POST',
			dataType: 'json',
			data: {consulta: 'consulta'},
		})
		.done(function(respuesta){
			$('.imagen-usuario').attr('src', '../../img/personal/' + respuesta[0] + respuesta[1]);
			$('.nombre-cliente').text(respuesta[2]);
			$('.rol-cliente').text(respuesta[3]);
		})
		.fail(function(){
			console.log('error');
		});
	}, 1000);

	// SOLICITUDES
	$('#btn_solicitudes').on('click', function(){
		$('#ruta').text('Solicitudes');
	});
	// ASPIRANTES
	$('#btn_aspirantes').on('click', function(){
		$('#ruta').text('Aspirantes');
	});
	// EMPLEADOS
	$('#btn_empleados').on('click', function(){
		$('#ruta').text('Empleados');
	});
	// CONFIGURACION
	$('#btn_configuracion').on('click', function(){
		$('#ruta').text('Configuración');
	});
});