$(document).ready(function(){
	$('#btn_menu_ingresar').on('click', function(){
		validaSesion();
	});

	function validaSesion(){
		var peticion = new XMLHttpRequest();
		peticion.open('GET', 'json/Index/php/validarSesion');

		peticion.onload = function(){
			console.log(peticion.responseText);
			var datos = JSON.parse(peticion.responseText);
			if (datos['respuesta'] == true) {
				// REDIRIGIR
				window.location.href = "config/direccion";
			}
		}

		peticion.onreadystatechange = function(){
			if (peticion.readyState == 4 && peticion.status == 200) {
				// alert('onready traer');
			}
		}
		peticion.send();
	}
});