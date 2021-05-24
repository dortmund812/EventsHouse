<?php require_once '../../views/Sistema/header.view.php'; ?>
<!-- ESTILOS -->
<link rel="stylesheet" href="<?php echo RUTA; ?>css/SI/Administrador/estiloAdministrador.css">
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
	<!-- FORMULARIO DE CREAR ALERTA -->
	<div class="contenedor-alert card" id="card_alerta">
		<form action="" class="row py-4 d-flex justify-content-center">
			<!-- TITULO DE ALERTA -->
			<div class="form-group col-10">
				<label for="titulo_alerta_imp" class="mb-0 pl-1"><?php echo $lenguaje["Titulodealerta"]; ?></label>
				<input id="titulo_alerta_imp" type="text" class="form-control" placeholder="<?php echo $lenguaje["Titulodealerta"]; ?>">
			</div>
			<!-- SELECCIONAR EL USUARIO -->
			<div class="form-group col-10">
				<label for="select_user_alert" class="mb-0 pl-1"><?php echo $lenguaje["Seleccionarusuario"]; ?></label>
				<select name="select_user_alert" id="select_user_alert" class="form-control">
					<option value="" selected="true"><?php echo $lenguaje["Usuario"] ?></option>
					<option value="1"><?php echo $lenguaje["Secretaria"] ?></option>
					<option value="2"><?php echo $lenguaje["JefedeBodega"] ?></option>
					<option value="3"><?php echo $lenguaje["Empleados"] ?></option>
					<option value="4"><?php echo $lenguaje["Clientes"] ?></option>
					<option value="5"><?php echo $lenguaje["Todos"] ?></option>
					<option value="6"><?php echo $lenguaje["Seleccionar"] ?></option>
				</select>
			</div>
			<!-- CORREO DE USUARIO -->
			<div class="form-group col-10">
				<label for="correo_alerta_inp" class="mb-0 pl-1"><?php echo $lenguaje["Correodelusuario"]; ?> <span id="mensaje_correo_dont" class="text-danger"></span></label>
				<input id="correo_alerta_inp" type="email" class="form-control" placeholder="Usuario@example.com" disabled="true">
			</div>
			<!-- MENSAJE -->
			<div class="form-group col-10">
				<label for="mensaje_alerta_inp" class="mb-0 pl-1"><?php echo $lenguaje["Mensaje"]; ?></label>
				<textarea name="mensaje_alerta_inp" id="mensaje_alerta_inp" placeholder="<?php echo $lenguaje["Mensaje"]; ?>" class="form-control" style="min-height: 120px;max-height: 250px;"></textarea>
			</div>
			<p id="mens_err_alert" class="text-danger"></p>
			<p id="mens_env_alert" class="text-success"></p>
			<!-- ENVIAR -->
			<div class="form-group col-10">
				<input type="submit" id="btn_env_alert" value="<?php echo $lenguaje["Enviar"]; ?>" class="btn btn-block btn-info">
			</div>
		</form>
	</div>
	<!-- FORMULARIO DE CORREO -->
	<div class="contenedor-alert card" id="card_correo">
		<form action="" class="row py-4 d-flex justify-content-center">
			<!-- TITULO DE ALERTA -->
			<div class="form-group col-10">
				<label for="tit_env_cor" class="mb-0 pl-1"><?php echo $lenguaje["TitulodeCorreo"]; ?></label>
				<input id="tit_env_cor" type="text" class="form-control" placeholder="<?php echo $lenguaje["TitulodeCorreo"]; ?>">
			</div>
			<!-- SELECCIONAR EL USUARIO -->
			<div class="form-group col-10">
				<label for="selc_user_cor" class="mb-0 pl-1"><?php echo $lenguaje["Seleccionarusuario"]; ?></label>
				<select name="selc_user_cor" id="selc_user_cor" class="form-control">
					<option value="" selected="true"><?php echo $lenguaje["Usuario"] ?></option>
					<option value="1"><?php echo $lenguaje["Secretaria"] ?></option>
					<option value="2"><?php echo $lenguaje["JefedeBodega"] ?></option>
					<option value="3"><?php echo $lenguaje["Empleados"] ?></option>
					<option value="4"><?php echo $lenguaje["Clientes"] ?></option>
					<option value="5"><?php echo $lenguaje["Todos"] ?></option>
					<option value="6"><?php echo $lenguaje["Seleccionar"] ?></option>
				</select>
			</div>
			<!-- CORREO DE USUARIO -->
			<div class="form-group col-10">
				<label for="corr_user_cor" class="mb-0 pl-1"><?php echo $lenguaje["Correodelusuario"]; ?> <span id="mensaje_correo_dont_cor" class="text-danger"></span></label>
				<input id="corr_user_cor" type="email" class="form-control" placeholder="Usuario@example.com" disabled="true">
			</div>
			<!-- MENSAJE -->
			<div class="form-group col-10">
				<label for="mens_cor" class="mb-0 pl-1"><?php echo $lenguaje["Mensaje"]; ?></label>
				<textarea name="mens_cor" id="mens_cor" placeholder="<?php echo $lenguaje["Mensaje"]; ?>" class="form-control" style="min-height: 120px;max-height: 250px;"></textarea>
			</div>
			<div class="form-group col-10">
				<input type="file" name="arch_cor" id="arch_cor" style="width: -1px;height: -1px;position: absolute;top: 0;left: 0;opacity: 0;z-index: -1;">
				<div class="input-group">
					<div class="input-group-append">
						<label for="arch_cor" class="btn btn-info m-0">
							<i class="icon-folder-open"></i>
						</label>
					</div>
					<input type="text" id="nom_arc_cor" class="form-control" placeholder="Nombre del archivo">
				</div>
			</div>
			<p id="no_envio_cor" class="text-danger"></p>
			<p id="si_envio_cor" class="text-success"></p>
			<!-- ENVIAR -->
			<div class="form-group col-10">
				<input type="submit" id="env_cor_new" value="<?php echo $lenguaje["Enviar"]; ?>" class="btn btn-block btn-info">
			</div>
		</form>
	</div>
	<!-- FORMULARIO DE CREAR NOTIFICACION -->
	<div class="contenedor-alert card" id="card_notificacion">
		<form action="" class="row py-4 d-flex justify-content-center">
			<!-- TITULO DE ALERTA -->
			<div class="form-group col-10">
				<label for="" class="mb-0 pl-1"><?php echo $lenguaje["TitulodeNotifiacion"]; ?></label>
				<input id="tit_notif" type="text" class="form-control" placeholder="<?php echo $lenguaje["TitulodeNotifiacion"]; ?>">
			</div>
			<!-- SELECCIONAR EL USUARIO -->
			<div class="form-group col-10">
				<label for="seleccionar_user_noti" class="mb-0 pl-1"><?php echo $lenguaje["Seleccionarusuario"]; ?></label>
				<select name="seleccionar_user_noti" id="seleccionar_user_noti" class="form-control">
					<option value="" selected="true"><?php echo $lenguaje["Usuario"]; ?></option>
					<option value="1"><?php echo $lenguaje["Secretaria"] ?></option>
					<option value="2"><?php echo $lenguaje["JefedeBodega"] ?></option>
					<option value="3"><?php echo $lenguaje["Empleados"] ?></option>
					<option value="4"><?php echo $lenguaje["Clientes"] ?></option>
					<option value="5"><?php echo $lenguaje["Todos"] ?></option>
					<option value="6"><?php echo $lenguaje["Seleccionar"] ?></option>
				</select>
			</div>
			<!-- CORREO DE USUARIO -->
			<div class="form-group col-10">
				<label for="corr_user_notif" class="mb-0 pl-1"><?php echo $lenguaje["Correodelusuario"]; ?><span id="mensaje_correo_dont_notif" class="text-danger"></span></label>
				<input id="corr_user_notif" type="email" class="form-control" placeholder="Usuario@example.com" disabled="true">
			</div>
			<!-- MENSAJE -->
			<div class="form-group col-10">
				<label for="mens_notif" class="mb-0 pl-1"><?php echo $lenguaje["Mensaje"]; ?></label>
				<textarea name="mens_notif" id="mens_notif" placeholder="<?php echo $lenguaje["Mensaje"]; ?>" class="form-control" style="min-height: 120px;max-height: 250px;"></textarea>
			</div>
			<p id="no_envio_notif" class="text-danger"></p>
			<p id="si_envio_notif" class="text-success"></p>
			<!-- ENVIAR -->
			<div class="form-group col-10">
				<input type="submit" id="env_crear_notif" value="<?php echo $lenguaje["Enviar"]; ?>" class="btn btn-block btn-info">
			</div>
		</form>
	</div>
	<!-- FORMULARIO DE VER NOTIFICACIONES -->
	<div class="contenedor-alert card" id="card_recibir_notif">
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
	<div class="fuera-menu d-flex justify-content-center py-5" id="fuera-menu"> </div>
	<!-- MENU -->
	<nav class="menu-tematicas" id="menu-tematicas">
		<div class="contenido-menu">
			<!-- TITULO DE LAS NOTIFICACIONES -->
			<div class="titular">
				<h5 class="titulo-notificaciones mb-0"><?php echo $lenguaje["Notificaciones"]; ?></h5>
				<i class="icon-cross1" id="cerrar-notificaciones"></i>
			</div>
			<!-- OPCION #1 NOTIFICACIONES -->
			<a id="btn_create_notif" href="" class="w-100 nav-link">
				<i class="icon-bell icono-notificacion"></i>
				<span><?php echo $lenguaje["Notificaciones"]; ?></span>
			</a>
			<!-- OPCION #1.1 MIS NOTIFICACIONES -->
			<a id="btn_view_notif" href="" class="w-100 nav-link">
				<i class="icon-eye icono-notificacion"></i>
				<span class="mr-2"><?php echo $lenguaje["MisNotificaciones"]; ?></span><span class="bg-info text-white icon_cont" id="cant_not_int"></span>
			</a>
			<!-- OPCION #2 MENSAJES -->
			<a id="btn_create_alert" href="" class="w-100 nav-link">
				<i class="icon-notification icono-mensajes"></i>
				<span><?php echo $lenguaje["Alertas"]; ?></span>
			</a>
			<!-- OPCION #3 USUARIOS NUEVOS -->
			<a id="btn_create_correo" href="" class="w-100 nav-link">
				<i class="icon-mail1 icono-usuarios"></i>
				<span><?php echo $lenguaje["Correos"]; ?></span>
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
				<h2><?php echo $lenguaje["Cotizacion"]; ?></h2>
			</div>
			<div class="usuario-lateral pb-0">
				<img class="imagen-usuario img-lateral" src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="">
				<div class="descripcion-usuario">
					<h5 class="rol-cliente">Rol</h5>
					<p class="nombre-cliente">User Name</p>
				</div>
			</div>
			<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
				<!-- BTN #3 COLLAPSE COTIZACIONES -->
				<a class="menu-opcion seleccionado" id="btn_cotizaciones" target="principal" href="<?php echo RUTA; ?>SI/Administrador/iframe/Cotizaciones/cotizaciones">
					<i class="icon-content_paste"></i><span><?php echo $lenguaje["Cotizaciones"]; ?></span>
				</a>
				<!-- BTN #5 COLLAPSE PERSONAL -->
				<a class="menu-opcion" id="btn_personal" target="principal" href="<?php echo RUTA; ?>SI/Administrador/iframe/Personal/personal">
					<i class="icon-users1"></i><span><?php echo $lenguaje["Personal"]; ?></span>
				</a>
				<!-- BTN #? COLLAPSE INFORMES -->
				<a class="menu-opcion" id="btn_informes" target="principal" href="<?php echo RUTA; ?>SI/Administrador/iframe/Informes/informes">
					<i class="icon-stats-dots"></i><span><?php echo $lenguaje["Informes"]; ?></span>
				</a>
				<!-- BTN #6 COLLAPSE SISTEMA -->
				<a class="menu-opcion" id="btn_sistema" target="principal" href="<?php echo RUTA; ?>SI/Administrador/iframe/Sistema/sistema">
					<i class="icon-desktop"></i><span><?php echo $lenguaje["Sistema"]; ?></span>
				</a>
				<!-- BTN #7 COLLAPSE CONFIGURACION -->
				<a class="menu-opcion" id="btn_configuracion" target="principal" href="<?php echo RUTA; ?>SI/Administrador/iframe/Configuracion/configuracion">
					<i class="icon-cog"></i><span><?php echo $lenguaje["Configuracion"]; ?></span>
				</a>
				<!-- NOTIFICACIONES MIN -->
				<a href="" class="d-block d-sm-none">
					<i class="icon-bell" id="notificacion_min"></i>
				</a>
				<!-- SALIR MIN -->
				<a href="<?php echo RUTA; ?>/config/cerrarSesion" class="d-block d-sm-none">
					<i class="icon-switch1" id="salir"></i>
				</a>
			</nav>
			<span class="mx-5 mb-0 py-1 spm-miga text-center d-none d-lg-block"><span id="modulo"><?php echo $lenguaje["Administrador"]; ?></span>/<span id="ruta"><?php echo $lenguaje["Cotizacion"]; ?></span></span>
		</div>
		<!-- CONTENIDO CENTRAL -->
		<main class="main col pt-0">
			<!-- BARRA SUPERIOR -->
			<div class="row d-none d-sm-block barra-superior mb-3">
				<!-- NOTIFICACIONES -->
				<div class="notificaciones">
					<!-- USUARIO -->
					<div class="usuario">
						<a class="menu-opcion" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7" class="user-name"><span class="nombre-cliente">User Name</span> <img src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="" class="imagen-usuario img-superior"></a>
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
						<!-- CARD #2 COTIZACIONES -->
						<div class="py-0 cotizaciones">
							<div id="collapse3">
								<!-- ACORDIO DE COTIZACIONES -->
								<div class="card card-body p-0">
									<div id="accordion-eventos" style="height: 89vh">
										<iframe id="principal" title="principal" name="principal" class="w-100" height="100%" src="<?php echo RUTA; ?>SI/Administrador/iframe/Cotizaciones/cotizaciones" frameborder="0"></iframe>
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
<script src="<?php echo RUTA; ?>js/SI/Administrador/scriptsAdministrador.js"></script>
<!-- SCRIPTS ALERTA -->
<script src="<?php echo RUTA; ?>json/Sistema/scriptsAlerta.js"></script>
<!-- SCRIPT INFOADMIN -->
<script src="<?php echo RUTA; ?>json/Administrador/infoAdministrador.js"></script>
<!-- SCRIPTS DE ALERTA BTN -->
<script src="<?php echo RUTA; ?>js/SI/Administrador/scriptsBotones.js"></script>
<!-- SCRIPTS NOTIFICACIONES -->
<script src="<?php echo RUTA; ?>json/Administrador/scriptsNotificacion.js"></script>
<!-- SCRIPTS IDIOMA -->
<script src="<?php echo RUTA; ?>json/Administrador/idioma.js"></script>
<!-- SCRIPTS CREAR ALERTA -->
<script src="<?php echo RUTA; ?>json/Sistema/crearAlerta.js"></script>
<!-- SCRIPTS CREAR NOTIFICACION -->
<script src="<?php echo RUTA; ?>json/Sistema/crearNotificacion.js"></script>
<!-- SCRIPT ENVIAR CORREOS -->
<script src="<?php echo RUTA; ?>json/Sistema/crearCorreo.js"></script>
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