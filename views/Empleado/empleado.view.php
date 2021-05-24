<?php require_once '../../views/Sistema/header.view.php'; ?>
<link rel="stylesheet" href="<?php echo RUTA; ?>css/SI/Empleado/estiloEmpleado.css">
<link rel="stylesheet" href="<?php echo RUTA; ?>css/SI/Sistema/estilosAlerta.css">
<!-- RUTA -->
<p id="rutaP" class="d-none"><?php echo RUTA; ?></p>
<!-- DETECTAR IDIOMA -->
<p id="detectar_idioma" class="d-none"><?php echo $idi; ?></p>
<!-- LOADER -->
<div class="pre-loader" id="pre-loader">
	<div class="loader"></div>
</div>
<!-- MODAL ALERTA -->
<div class="modal-alerta" id="modal_alerta">
	<div class="alerta-alert d-none" id="int_alert">
		<svg><rect></rect></svg>
		<div class="contenido-alerta">
			<h1 id="titulo_alerta"></h1>
			<p id="texto_alerta"></p>
			<button class="btn-cerrar" id="btn_cerrar_alerta"><?php echo $lenguaje["Cerrar"]; ?></button>
		</div>
	</div>
</div>
<!-- MODAL DE NOTIFICACION -->
<div class="modal-notificacion" id="modal-notificacion">
	<!-- FORMULARIO DE ALERTA -->
	<div class="contenedor-alert card" id="card_alerta">
		<div class="row py-4 d-flex justify-content-center" id="container_notif">
			<!-- NOTIFICACIONES -->
		</div>
		<div class="row px-4 py-2">
			<!-- PAGINACION NOTIFICACION -->
			<div class="col-12 py-1 bg-dark d-flex justify-content-center" id="pagin_notif">
				<!-- PAGINACIO NOTIFICACIONES -->
			</div>
		</div>
	</div>
	<!-- RESTO DE PANTALLA -->
	<div class="fuera-menu" id="fuera-menu"> </div>
	<!-- MENU -->
	<nav class="menu-tematicas" id="menu-tematicas">
		<div class="contenido-menu">
			<!-- TITULO DE LAS NOTIFICACIONES -->
			<div class="titular">
				<h5 class="titulo-notificaciones mb-0"><?php echo $lenguaje["Notificaciones"]; ?></h5>
				<i class="icon-cross1" id="cerrar-notificaciones"></i>
			</div>
			<!-- OPCION #1 NOTIFICACIONES -->
			<a id="btn_view_notif" href="" class="w-100 nav-link">
				<i class="icon-bell icono-notificacion"></i>
				<span class="mr-2"><?php echo $lenguaje["Notificaciones"]; ?></span><span class="bg-info text-white icon_cont" id="cant_not_int"></span>
			</a>
		</div>
		<!-- ICONOS INFERIORES -->
		<div class="logos">
			<i class="ban_es" id="leng_es"></i>
			<i class="ban_en" id="leng_en"></i>
			<i class="ban_fr" id="leng_fr"></i>
		</div>
	</nav>
</div>
<!-- CONTAINER -->
<div class="container-fluid">
	<div class="row">
		<!-- MENU LATERAL IZQUIERDO -->
		<div class="barra-lateral col-12 col-sm-auto">
			<div class="titular">
				<h2><?php echo $lenguaje["Eventos"]; ?></h2>
			</div>
			<div class="usuario-lateral">
				<img class="imagen-usuario img-lateral" src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="">
				<div class="descripcion-usuario">
					<h5 class="rol-cliente">Rol</h5>
					<p class="nombre-cliente">User Name</p>
				</div>
			</div>
			<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
				<!-- BTN #2 COLLAPSE SOLICITUDES -->
				<a class="menu-opcion seleccionado" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" id="btn_solicitudes">
					<i class="icon-content_paste"></i><span><?php echo $lenguaje["Eventos"]; ?></span>
				</a>
				<!-- BTN #6 COLLAPSE CONFIGURACION -->
				<a class="menu-opcion" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6" id="btn_configuracion">
					<i class="icon-cog"></i><span><?php echo $lenguaje["Configuracion"]; ?></span>
				</a>
				<!-- NOTIFICACIONES MIN -->
				<a href="" class="d-block d-sm-none">
					<i class="icon-bell" id="notificacion_min"></i>
				</a>
				<!-- SALIR MIN -->
				<a href="<?php echo RUTA; ?>/config/cerrarSesion" class="d-block d-sm-none">
					<i class="icon-switch" id="salir"></i>
				</a>
			</nav>
			<span class="mx-5 mb-0 py-1 spm-miga d-none d-lg-block"><span id="modulo"><?php echo $lenguaje["Empleado"]; ?></span>/<span id="ruta"><?php echo $lenguaje["Solicitudes"]; ?></span></span>
		</div>
		<!-- CONTENIDO CENTRAL -->
		<main class="main col pt-0">
			<!-- BARRA SUPERIOR -->
			<div class="row d-none d-sm-block barra-superior mb-3">
				<!-- NOTIFICACIONES -->
				<div class="notificaciones">
					<!-- USUARIO -->
					<div class="usuario">
						<a class="menu-opcion" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6" class="user-name"><span class="nombre-cliente">User Name</span> <img src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="" class="imagen-usuario img-superior"></a>
					</div>
					<!-- NOTIFICAION -->
					<div class="notificacion not1">
						<i class="icon-bell" id="notificacion"></i>
						<span class="bg-info" id="cont_notif">3</span>
					</div>
					<div class="home">
						<a href="<?php echo RUTA; ?>"><i class="icon-home" style="font-size: 1.8em;"></i></a>
					</div>
					<!-- SALIR -->
					<div class="salir">
						<a href="<?php echo RUTA; ?>config/cerrarSesion"><i class="icon-switch" id="salir"></i></a>
					</div>
				</div>
			</div>
			<!-- CONTENIDO PRINCIPAL -->
			<div class="row pr-3">
				<div class="columna col">
					<div id="accordion">
						<!-- CARD #2 SOLICITUDES -->
						<div class="py-0 cotizaciones">
							<div id="collapse1" class="collapse despliegue show" arial-labelledby="heading1" data-parent="#accordion">
								<!-- ACORDIO DE SOLICITUDES -->
								<div class="card card-body p-0">
									<div id="accordion-solicitudes">
										<iframe src="<?php echo RUTA; ?>SI/Empleado/iframe/Eventos/eventos" frameborder="0"></iframe>
									</div>
								</div>
							</div>
						</div>
						<!-- CARD #6 CONFIGURACION-->
						<div class="py-0 configuracion">
							<div id="collapse6" class="collapse despliegue" arial-labelledby="heading6" data-parent="#accordion">
								<!-- ACORDION DE CONFIGURACION -->
								<div class="card card-body p-0">
									<div id="accordion-configuracion">
										<iframe src="<?php echo RUTA; ?>SI/Empleado/iframe/Configuracion/configuracion" frameborder="0"></iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
<!-- SCRIPTS BOOTSTARP -->
<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
<!-- SCRIPS PROPIOS -->
<script src="<?php echo RUTA; ?>js/SI/Empleado/scriptsEmpleado.js"></script>
<!-- SCRIPTS ALERTA -->
<script src="<?php echo RUTA; ?>json/Sistema/scriptsAlerta.js"></script>
<!-- SCRIPTS NOTIFICACIONES -->
<script src="<?php echo RUTA; ?>json/Sistema/scriptsNotificacion.js"></script>
<!-- SCRIPTS IDIOMA -->
<script src="<?php echo RUTA; ?>json/Empleado/idioma.js"></script>
<!-- SCRIPTS INFORMACION EMPLEADO -->
<script src="<?php echo RUTA; ?>json/Empleado/infoEmpleado.js"></script>
<script>
	setInterval(function(){
		traerCargos('HW');
	}, 1000);
	function traerCargos(consulta){
		$.ajax({
			url: '../../config/validar',
			type: 'POST',
			dataType: 'html',
			data: {consulta: consulta},
		})
		.done(function(respuesta){
			console.log(respuesta);
		})
		.fail(function(){
			console.log('error');
		});
	}
</script>
</body>
</html>