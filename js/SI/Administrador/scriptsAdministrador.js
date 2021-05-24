$(document).ready(function(){
	// DETECTAR IDIOMA
	if ($('#detectar_idioma').text() == 'Idioma') {
		window.location.href = 'administrador';
	}
	// AL SELECCIONAR UNA OPCION DEL MENU LATERAL
	$('.barra-lateral .menu a.menu-opcion').on('click', function(){
		$('.barra-lateral .menu a').removeClass('seleccionado');
		$(this).toggleClass('seleccionado');
		$('.titular h2').text($(this).text());
	});
	// VENTANA MODAL OCULTA
	$('#modal-notificacion').hide();
	// AL PRECIONAR LA CAMPANA DE NOTIFICACIONES
	$('#notificacion').on('click', function(){
		$('#modal-notificacion').show(0, function(){
			$('#menu-tematicas').animate({
				right: '0px'
			});
		});
	});
	// AL PRECIONAR LA CAMPANA EN MODO TABLT O CELULAR
	$('#notificacion_min').on('click', function(e){
		e.preventDefault();
		$('#modal-notificacion').show(0, function(){
			$('#menu-tematicas').animate({
				right: '0px'
			});
		});
	});
	// CERRAR EL MODAL CON EL BOTON DE CERRAR
	$('#cerrar-notificaciones').on('click', function(){
		$('#menu-tematicas').animate({
			right: '-280px'
		}, 500, function(){
			$('#modal-notificacion').hide();
		});
	});
	// CERRAR EL MODAL DANDO CLICK AFUERA
	$('#fuera-menu').on('click', function(){
		$('#menu-tematicas').animate({
			right: '-280px'
		}, 500, function(){
			$('#modal-notificacion').hide();
		});
	});

});