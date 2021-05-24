<?php require_once '../../views/Sistema/header.view.php'; ?>
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/SI/Solicitud/estiloSolicitud.css">
	<!-- RUTA -->
	<p id="rutaP" class="d-none"><?php echo RUTA; ?></p>
	<!-- DETECTAR IDIOMA -->
	<p id="detectar_idioma" class="d-none"><?php echo $idi; ?></p>
	<!-- ############################ -->
	<!-- ---------- NMODAL ---------- -->
	<!-- ############################ -->
	<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresar" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-content-ingreso">
				<button id="cerrar_modal" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
				<!-- MODAL DE INGRESO -->
				<div class="nuevo-modal" id="modal_ingreso" style="max-width: 95vw;">
					<div class="formulario-modal ingreso">
						<!-- IMAGEN DE USUARIO AL INGRESAR -->
						<div class="usuario">
							<img id="usuario_submit_ingresar" class="imagen-ingreso" src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="">
							<div id="" class="attrimg"></div>
						</div>
						<!-- FORMULARIO DE INGRESO -->
						<form action="" method="POST" id="form_ingreso">
							<input type="email" name="correo" id="correo" placeholder="<?php echo $lenguaje["Correo"]; ?>" autocomplete="off">
							<input type="password" name="password" id="password" placeholder="<?php echo $lenguaje["Contraseña"]; ?>">
							<!-- AVISO DE ERROR -->
							<div class="alerta-modal d-none">
								<div class="error-modal"><?php echo $lenguaje["datosIncorrectos"]; ?></div>
							</div>
							<input type="submit" value="<?php echo $lenguaje["Ingresar"]; ?>" id="btn_submit_ingresar" name="submit_ingresar">
						</form>
						<!-- REGISTRARSE Y OLVIDO DE CONTRASEÑA -->
						<div class="extras-modal">
							<a href="" id="btn_modal_registro" class="registro-modal"><?php echo $lenguaje["Registrarse"]; ?></a>
							<a href=""><?php echo $lenguaje["Olvidastetucontraseña"]; ?></a>
						</div>
					</div>
				</div>
				<!-- MODAL DE REGISTRO -->
				<div class="nuevo-modal-registro" id="modal_registro" style="max-width: 95vw;">
					<div class="formulario-modal ingreso">
						<form enctype="multipart/form-data" action="" method="POST" class="row pt-0" id="formulario_registro">
							<div class="col-12 px-0">
								<!-- FOTO DEL USUARIO Y SUBIR FOTO -->
								<div class="usuario">
									<img id="imagen_usuario_registro" src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="">
									<!-- SUBIR FOTO DEL USUARIO -->
									<div class="subir-archivo d-flex flex-wrap justify-content-center">
										<label for="subir_foto"><?php echo $lenguaje["Subirfoto"] ?> <i class="icon-upload-to-cloud"></i></label>
										<!-- SUBIR FOTO -->
										<input type="file" id="subir_foto" name="subir_foto" accept=".jpg,.jpeg,.png" value="computer-1331579_960_720.png">
										<!-- IMAGEN DE HOJA DE VIDA -->
										<img src="" id="hoja_vida_frame" alt="" style="display: none;">
									</div>
								</div>
							</div>
							<!-- NOMBRES Y APELLIDOS -->
							<div class="col-12">
								<div class="row">
									<!-- ERROR SOLICITUD... -->
									<input type="text" id="registro_nombre" name="registro_nombre" class="col-6" placeholder="<?php echo $lenguaje["Nombre"]; ?>" autocomplete="off">
									<input type="text" id="registro_apellido" name="registro_apellido" class="col-6" placeholder="<?php echo $lenguaje["Apellido"]; ?>" autocomplete="off">
								</div>
							</div>
							<!-- TELEFONO Y CEDULA -->
							<div class="col-12">
								<div class="row">
									<input type="text" id="registro_telefono" name="registro_telefono" class="col-6" placeholder="<?php echo $lenguaje["Telefono"]; ?>" autocomplete="off">
									<input type="text" id="registro_cedula" name="registro_cedula" class="col-6" placeholder="<?php echo $lenguaje["Cedula"]; ?>" autocomplete="off">
								</div>
							</div>
							<!-- CORREO -->
							<input type="email" id="registro_correo" name="registro_correo" class="col-12" placeholder="<?php echo $lenguaje["Correo"]; ?>" required="true" autocomplete="off">
							<!-- PASSWORD -->
							<input type="password" id="registro_password" name="registro_password" class="col-12" placeholder="<?php echo $lenguaje["Contraseña"] ?>">
							<!-- PASSWORD 2 -->
							<input type="password" id="registro_password2" name="registro_password2" class="col-12" placeholder="<?php echo $lenguaje["Confirmarcontraseña"] ?>">
							<!-- SUBMIT -->
							<input type="submit" value="<?php echo $lenguaje["Registrarse"] ?>" id="submit_registrarse" name="submit_registrarse">
						</form>
						<!-- INGRESAR -->
						<div class="extras-modal">
							<a href="" class="" id="btn_modal_ingreso"><?php echo $lenguaje["Ingresar"] ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ############################ -->
	<!-- ---------- AMODAL ---------- -->
	<!-- ############################ -->
	<a href="" id="btn_alerta" data-toggle="modal" data-target="#alerta"></a>
	<div class="modal fade" id="alerta" tabindex="-1" role="dialog" aria-labelledby="alerta">
		<div class="modal-dialog modal-sm">
			<div class="modal-content modal-content-ingreso" id="alerta_solicitud">
				<div class="card card-body">
					<div class="img-alerta">
						<img src="<?php echo RUTA; ?>img/personal/usuarios/computer-1331579_960_720.png" alt="" id="img_alerta_solicitud" class="img-rounded">
					</div>
					<h2 class="text-center"><?php echo $lenguaje["Bienvenido"] ?><br>Calos David</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- LOADER -->
	<div class="pre-loader" id="pre-loader">
		<div class="loader"></div>
	</div>
	<!-- CONTENIDO DE LA PAGINA -->
	<div class="container-fluid">
		<!-- NAVEGACION -->
		<div class="row justify-content-between mb-3">
			<!-- BOTONES DE IDIOMA -->
			<div class="idiomas">
				<ul>
					<li>
						<a href="<?php echo RUTA.'SI/Solicitud/solicitud?id_evento='.$id_evento.'&lenguaje=es'; ?>">
							<img src="<?php echo RUTA; ?>img/Extras/CO.png" alt="">
						</a>
						<a href="<?php echo RUTA.'SI/Solicitud/solicitud?id_evento='.$id_evento.'&lenguaje=en'; ?>">
							<img src="<?php echo RUTA; ?>img/Extras/US.png" alt="">
						</a>
						<a href="<?php echo RUTA.'SI/Solicitud/solicitud?id_evento='.$id_evento.'&lenguaje=fr'; ?>">
							<img src="<?php echo RUTA; ?>img/Extras/FR.png" alt="">
						</a>
					</li>
				</ul>
			</div>
			<!-- OPCIONES PAQUETE -->
			<div class="col-sm-12 menu-opciones bg-dark">
				<!-- MENU -->
				<ul class="nav nav-tabs d-flex justify-content-around" id="myTab" role="tablist">
					<!-- BTN INICIO -->
					<li class="d-flex align-items-center">
						<a href="<?php echo RUTA; ?>" class="px-5 py-2 btn_icn" style="font-size: 20px;"><?php echo $lenguaje["Inicio"]; ?></a>
					</li>
					<!-- BTN EVENTO -->
					<li class="nav-item">
						<a class="nav-link px-5 py-2 active btn_icn" id="evento_tab" data-toggle="tab" href="#evento" role="tab" aria-controls="evento" aria-selected="true" style="font-size: 20px;"><?php echo $lenguaje["evento"]; ?></a>
					</li>
					<!-- BTN LUGAR -->
					<li class="nav-item">
						<a class="nav-link px-5 py-2 btn_icn" id="lugar_tab" data-toggle="tab" href="#lugar" role="tab" aria-controls="lugar" aria-selected="false" style="font-size: 20px;"><?php echo $lenguaje["lugar"]; ?></a>
					</li>
					<!-- BTN BANQUETE -->
					<li class="nav-item">
						<a class="nav-link px-5 py-2 btn_icn" id="banquete_tab" data-toggle="tab" href="#banquete" role="tab" aria-controls="banquete" aria-selected="false" style="font-size: 20px;"><?php echo $lenguaje["Banquete"]; ?></a>
					</li>
					<!-- BTN PAQUETE -->
					<li class="nav-item">
						<a class="nav-link px-5 py-2 btn_icn" id="paquete_tab" data-toggle="tab" href="#paquete" role="tab" aria-controls="paquete" aria-selected="false" style="font-size: 20px;"><?php echo $lenguaje["paquete"]; ?></a>
					</li>
					<!-- BTN INGRESAR -->
					<li class="d-flex align-items-center">
						<a href="" id="btn_menu_ingresar" class="px-5 py-2 btn_icn" style="font-size: 20px;" data-toggle="modal" data-target="#ingresar"><?php echo $lenguaje["Ingresar"]; ?></a>
					</li>
				</ul>
			</div>
		</div>
		<!-- PAQUETE DE COTIZACION -->
		<div class="row">
			<div class="col-12">
				<!-- CONTENIDO -->
				<div class="tab-content" id="myTabContent">
					<!-- #1 EVENTO -->
					<div class="tab-pane fade show active" id="evento" role="tabpanel" aria-labelledby="evento_tab">
						<div class="row row-evento">
							<!-- IMAGEN DE EVENTO -->
							<div class="col-12 col-md-4 pr-md-0">
								<div class="form-group card h-100 box-sha">
									<!-- IMAGEN DE LA TEMATICA -->
									<img src="<?php echo RUTA; ?>" alt="" class="card-img-top img-fluid" id="img_event">
									<!-- TEMATICAS DEL EVENTO -->
									<div class="card-body">
										<label for="tematica_evento"><?php echo $lenguaje["TematicadelEvento"]; ?></label>
										<select id="tematica_evento" class="form-control mb-2">
											<!-- TRAER TEMATICAS -->
										</select>
										<!-- DESCRIPCION DE LA TEMATICA -->
										<p id="extracto_evento"></p>
									</div>
								</div>
							</div>
							<!-- FORM DE EVENTO -->
							<div class="col-12 col-md-8">
								<div class="card card-body pb-2 pt-1 h-100">
									<div class="row">
										<div class="col-12">
											<span class="spnevt" id="<?php echo $id_evento; ?>"></span>
											<h1 class="text-center h3 m-0" id="tit_event"></h1>
										</div>
										<!-- NOMBRE DEL EVENTO -->
										<div class="form-group col-12">
											<label for="nombre_evento"><?php echo $lenguaje["Titulodelevento"]; ?></label>
											<input type="text" class="form-control" id="nombre_evento" placeholder="<?php echo $lenguaje["Titulodelevento"]; ?>" autocomplete="off">
										</div>
										<!-- NOMBRE DEL ANFITRION -->
										<div class="form-group col-12">
											<label for="nombre_anfitrion"><?php echo $lenguaje["NombredelAnfitrion"]; ?></label>
											<input type="text" class="form-control" id="nombre_anfitrion" placeholder="<?php echo $lenguaje["NombredelAnfitrion"] ?>" autocomplete="off">
										</div>
										<!-- FORMALIDAD DEL EVENTO -->
										<div class="form-group col-12 col-md-6">
											<label for="formalidad_evento"><?php echo $lenguaje["Comodeseastuevento"]; ?></label>
											<select id="formalidad_evento" class="form-control">
												<option value="Sin Especificar" selected="true"><?php echo $lenguaje["Seleccionar"]; ?></option>
												<option value="Formal"><?php echo $lenguaje["Formal"]; ?></option>
												<option value="Informal"><?php echo $lenguaje["Informal"]; ?></option>
											</select>
										</div>
										<!-- RECORDATORIOS -->
										<div class="form-group col-12 col-md-6">
											<label for="recordatorios"><?php echo $lenguaje["Deseasdarrecordatorios"]; ?></label>
											<select id="recordatorios" class="form-control">
												<option value="1" selected="true"><?php echo $lenguaje["Seleccionar"]; ?></option>
												<option value="2"><?php echo $lenguaje["Si"]; ?></option>
												<option value="1"><?php echo $lenguaje["No"]; ?></option>
											</select>
										</div>
										<!-- CANTIDAD DE PEROSNAS -->
										<div class="form-group col-12">
											<label for="cantidad_personas"><?php echo $lenguaje["Cantidaddeperonas"]; ?></label>
											<input type="text" class="form-control" id="cantidad_personas" placeholder="<?php echo $lenguaje["Cantidaddeperonas"]; ?>" maxlength="3" autocomplete="off">
										</div>
										<!-- FECHA DE LA SOLICITUD -->
										<div class="form-group col-12 col-md-6">
											<label for="fecha_solicitud"><?php echo $lenguaje["FechadeSolicitud"]; ?></label>
											<input type="date" id="fecha_solicitud" class="form-control" disabled="true">
										</div>
										<!-- FECHA DEL EVENTO -->
										<div class="form-group col-12 col-md-6">
											<label for="fecha_evento"><?php echo $lenguaje["FechadelEvento"]; ?></label>
											<input type="date" id="fecha_evento" class="form-control">
										</div>
										<!-- COMENTARIOS -->
										<div class="form-group col-12">
											<label for="comentarios"><?php echo $lenguaje["Comentarios"]; ?></label>
											<textarea id="comentarios" class="form-control textar" placeholder="<?php echo $lenguaje["Comentarios"]; ?>" autocomplete="off"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-3 mb-3">
							<div class="col-12 d-flex justify-content-between">
								<button disabled="true" class="btn btn-dark btn-lg"><?php echo $lenguaje["Anterior"]; ?></button>
								<button class="btn btn-dark btn-lg" id="btn_sig_eve"><?php echo $lenguaje["Siguiente"]; ?></button>
							</div>
						</div>
					</div>
					<!-- #2 LUGAR -->
					<div class="tab-pane fade" id="lugar" role="tabpanel" aria-labelledby="lugar_tab">
						<div class="row row-lugar">
							<div class="col-12 col-md-4 pr-md-0">
								<div class="card h-100 box-sha">
									<!-- IMAGEN PRINCIPAL DEL LUGAR -->
									<img src="<?php echo RUTA; ?>img/Tematicas/bar-discoteca-la-caci-k-13.jpg" alt="" class="card-img-top img-fluid" id="img_lugar">
									<div class="card-body">
										<div class="row">
											<!-- IMAGEN EXTRA #1 -->
											<div class="col-6 p-1">
												<img src="<?php echo RUTA; ?>img/Tematicas/bar-el-bembe-facebook-1.jpg" class="w-100" alt="">
											</div>
											<!-- IMAGEN EXTRA #2 -->
											<div class="col-6 p-1">
												<img src="<?php echo RUTA; ?>img/Tematicas/el-fabuloso-facebook-1.jpg" class="w-100" alt="">
											</div>
											<!-- IMAGEN EXTRA #3 -->
											<div class="col-6 p-1">
												<img src="<?php echo RUTA; ?>img/Tematicas/gaira-cafe-contenido-2.jpg" class="w-100" alt="">
											</div>
											<!-- IMAGEN EXTRA #4 -->
											<div class="col-6 p-1">
												<img src="<?php echo RUTA; ?>img/Tematicas/octava.jpg" class="w-100" alt="">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-8">
								<div class="card card-body h-100" >
									<!-- TIPOS DE LUGARES EVENTO -->
									<div class="form-group">
										<label for="tipo_lugar"><?php echo $lenguaje["TipodeLugar"]; ?></label>
										<select id="tipo_lugar" class="form-control">
											<!-- TARER TIPOS DE LUGARES -->
										</select>
									</div>
									<!-- LUGARES DEL EVENTO -->
									<div class="form-group">
										<label for="lugares"><?php echo $lenguaje["Lugares"]; ?></label>
										<select id="lugares" class="form-control">
											<!-- TARER LUGARES -->
										</select>
									</div>
									<div class="row">
										<div class="col-12 col-md-8">
											<div class="row">
												<!-- NOMBRE DEL LUGAR -->
												<div class="form-group col-12 col-md-6">
													<label for="nombre_lugar"><?php echo $lenguaje["NombredelLugar"]; ?></label>
													<input type="text" class="form-control" id="nombre_lugar" placeholder="<?php echo $lenguaje["NombreLugar"]; ?>" readonly="true">
												</div>
												<!-- TIPO DE LUGAR -->
												<div class="form-group col-12 col-md-6">
													<label for="tipo_lugar_info"><?php echo $lenguaje["TipodeLugar"]; ?></label>
													<input type="text" class="form-control" id="tipo_lugar_info" placeholder="<?php echo $lenguaje["TipodeLugar"]; ?>" readonly="true">
												</div>
												<!-- DIRECCION -->
												<div class="form-group col-12 col-md-6">
													<label for="direccion_lugar"><?php echo $lenguaje["Direccion"]; ?></label>
													<input type="text" class="form-control" id="direccion_lugar" placeholder="<?php echo $lenguaje["DirecciondelLugar"]; ?>" readonly="true">
												</div>
												<!-- ESTADO -->
												<div class="form-group col-12 col-md-6">
													<label for="estado_lugar"><?php echo $lenguaje["Estado"]; ?></label>
													<input type="text" class="form-control" id="estado_lugar" placeholder="<?php echo $lenguaje["EstadodelLugar"]; ?>" readonly="true">
												</div>
												<!-- DESCRIPCION -->
												<div class="form-group col-12">
													<label for="descripcion_lugar"><?php echo $lenguaje["Descripcion"]; ?></label>
													<textarea id="descripcion_lugar" class="form-control textar" readonly="true" style="min-height: 120px;"></textarea>
												</div>
											</div>
										</div>
										<!-- DIRECCION EN GOOGLE MAPS -->
										<div class="col-12 col-md-4">
											<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3976.675741319405!2d-74.06500178573684!3d4.6517959433761575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1541340050999" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-3 mb-3">
							<div class="col-12 d-flex justify-content-between">
								<button class="btn btn-dark btn-lg" id="btn_ant_lug"><?php echo $lenguaje["Anterior"]; ?></button>
								<button class="btn btn-dark btn-lg" id="btn_sig_lug"><?php echo $lenguaje["Siguiente"]; ?></button>
							</div>
						</div>
					</div>
					<!-- #3 BANQUETE -->
					<div class="tab-pane fade" id="banquete" role="tabpanel" aria-labelledby="banquete_tab">
						<!-- TRAER LOS BANQUETES DE A 4 A LA VEZ -->
						<div class="row row-banquete d-flex justify-content-center" id="banquetes_bd" style="margin-bottom: 80px;">
							<!-- BANQUETES DE LA BASE DE DATOS -->
						</div>
						<div class="row">
							<!-- PAGINACION -->
							<div class="col-12 d-flex justify-content-between align-items-center fixed-bottom bg-dark py-0">
								<button class="btn btn-dark btn-lg" id="btn_ant_ban"><?php echo $lenguaje["Anterior"]; ?></button>
								<div id="paginacion_banquetes">
									<!-- PAGINACION -->
								</div>
								<button class="btn btn-dark btn-lg" id="btn_sig_ban"><?php echo $lenguaje["Siguiente"]; ?></button>
							</div>
						</div>
					</div>
					<!-- #4 PAQUETE -->
					<div class="tab-pane fade" id="paquete" role="tabpanel" aria-labelledby="paquete_tab">
						<form action="" class="row" name="form_solicitud" id="form_solicitud">
							<!-- IMAGENES DEL EVENTO -->
							<div class="col-12 order-2 order-md-1 col-md-4 mb-5 mb-md-0 pr-md-0 h-100">
								<!-- IMAGEN DEL TIPO DE EVENTO SELECCIONADO -->
								<img src="" class="w-100 rounded mb-2" alt="" id="img_paqut">
								<!-- IMAGEN DEL LUGAR SELECCIONADO -->
								<img src="<?php echo RUTA; ?>img/Tematicas/andres-dc-fiesta.jpg" class="w-100 rounded mb-2" alt="" id="img_lugar_persona">
								<!-- IMAGEN DEL BANQUETE SELECCIONADO -->
								<img src="" class="w-100 rounded mb-2" alt="" id="img_banquet">
							</div>
							<!-- BTN ANT Y SIG -->
							<div class="pl-3" style="position: absolute;bottom: 30px;">
								<button class="btn btn-dark btn-lg" id="btn_ant_paq"><?php echo $lenguaje["Anterior"]; ?></button>
							</div>
							<!-- FORMULARIO -->
							<div class="col-12 order-1 order-md-2 col-md-8 mb-3">
								<div class="card h-100 px-3 py-2 pb-0" style="border-radius: 0;">
									<div class="row">
										<!-- TIPO DE EVENTO -->
										<div class="form-group col-6">
											<label for="paquete_tipo_evento"><?php echo $lenguaje["TipodeEvento"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_tipo_evento" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>" value="">
										</div>
										<!-- TEMATICA -->
										<div class="form-group col-6">
											<label for="paquete_tematica_evento"><?php echo $lenguaje["Tematica"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_tematica_evento" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- NOMBRE DEL EVENTO -->
										<div class="form-group col-12">
											<label for="paquete_titulo_evento"><?php echo $lenguaje["NombredelEvento"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_titulo_evento" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- NOMBRE DEL ANFITRION -->
										<div class="form-group col-12">
											<label for="paquete_nombre_anfitrion"><?php echo $lenguaje["NombredelAnfitrion"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_nombre_anfitrion" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- FORMALIDAD DEL EVENTO -->
										<div class="form-group col-12 col-md-6">
											<label for="paquete_formalidad_evento"><?php echo $lenguaje["FormalidaddelEvento"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_formalidad_evento" disabled="true" style="background: none;" value="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- RECORDATORIOS -->
										<div class="form-group col-12 col-md-6">
											<label for="paqute_recordatorios_evento"><?php echo $lenguaje["Recordatorios"]; ?></label>
											<input type="text" class="form-control inppaq" id="paqute_recordatorios_evento" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- CANTIDAD DE PERSONAS -->
										<div class="form-group col-6">
											<label for="paquete_cantidad_personas"><?php echo $lenguaje["Cantidaddeperonas"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_cantidad_personas" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- FECHA DEL EVENTO -->
										<div class="form-group col-6">
											<label for="paquete_fecha_evento"><?php echo $lenguaje["FechadelEvento"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_fecha_evento" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- COMENTARIOS -->
										<div class="form-group col-12">
											<label for="paquete_comentarios"><?php echo $lenguaje["Comentarios"]; ?></label>
											<textarea id="paquete_comentarios" class="form-control inppaq textar" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>"></textarea>
										</div>
									</div>
									<div class="row">
										<!-- TIPO DE LUGAR -->
										<div class="form-group col-12">
											<label for="paquete_tipo_lugar"><?php echo $lenguaje["TipodeLugar"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_tipo_lugar" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- NOMBRE DEL LUGAR -->
										<div class="form-group col-12">
											<label for="paquete_nombre_lugar"><?php echo $lenguaje["NombredelLugar"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_nombre_lugar" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- DIRECCION DEL LUGAR -->
										<div class="form-group col-6">
											<label for="paqute_direccion_lugar"><?php echo $lenguaje["DirecciondelLugar"]; ?></label>
											<input type="text" class="form-control inppaq" id="paqute_direccion_lugar" disabled=" true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- ESTADO DEL LUGAR -->
										<div class="form-group col-6">
											<label for="paquete_estado_lugar"><?php echo $lenguaje["EstadodelLugar"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_estado_lugar" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- DESCRIPCION DEL LUGAR -->
										<div class="form-group col-12">
											<label for="paqute_descripcion_lugar"><?php echo $lenguaje["DescripciondelLugar"]; ?></label>
											<textarea id="paqute_descripcion_lugar" class="form-control inppaq textar" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>"></textarea>
										</div>
										<!-- BANQUETE -->
										<div class="form-group col-12">
											<label for="paquete_banquete"><?php echo $lenguaje["Banquete"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_banquete" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
										<!-- COSTO MINIMO -->
										<div class="form-group col-6">
											<label for="paquete_costo_minimo"><?php echo $lenguaje["Costominimo"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_costo_minimo" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>" value="">
										</div>
										<!-- COSTO MAXIMO -->
										<div class="form-group col-6">
											<label for="paquete_costo_maximo"><?php echo $lenguaje["CostoMaximo"]; ?></label>
											<input type="text" class="form-control inppaq" id="paquete_costo_maximo" disabled="true" style="background: none;" placeholder="<?php echo $lenguaje["SinEspecificar"]; ?>">
										</div>
									</div>
									<div class="row">
										<!-- TERMINOS Y CONDICIONES -->
										<div class="col">
											<input type="checkbox" name="terminos_condiciones" id="terminos_condiciones">
											<label for="terminos_condiciones"><?php echo $lenguaje["Aceptolos"]; ?> <a href="" id="btn_terminos" data-toggle="modal" data-target="#terminosCondiciones"><?php echo $lenguaje["TerminosyCondiciones"]; ?></a> <?php echo $lenguaje["delasolicitud"]; ?></label>
										</div>
										<div class="col">
											<p class="text-danger" id="alerta_terminos_falta"></p>
										</div>
									</div>
									<div class="row">
										<!-- BTN ENVIAR -->
										<div class="col-12 mb-3">
											<input type="submit" value="<?php echo $lenguaje["Enviar"]; ?>" class="btn btn-block btn-dark" id="envio_formulario">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL DE TERMINOS Y CONDICIONES -->
	<div class="modal fade" id="terminosCondiciones" tabindex="-1" role="dialog" aria-labelledby="terminosCondiciones" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content modal-content-ingreso">
				<div class="card card-body">
					<p>1. El Servicio del Sistema de Información Events House funcionará en cualquier
						dispositivo móvil o computadora el cual posea conexión a Internet.</p>
					<p>2. Para poder acceder a las funcionalidades del Sistema debe de haberse registrado.</p>
					<p>3. El usuario debe de tener al menos 18 años de edad para aceptar estos términos de servicio.</p>
					<p>4. Al utilizar el Servicio, usted autoriza la recopilación y procesamiento y utilización de toda aquella información relacionada que haya ingresado al sistema.</p>
					<p>5. Si se realiza algún cambio en los términos de Servicio se generará una notificación a cada usuario manteniéndose activo.</p>
					<p>6.El sistema no registrará ninguna solicitud sin antes no se ha aceptado los términos y condiciones de la empresa.</p>
					<p>7.Si la fecha de la solicitud está entre o es menor a una semana de la fecha del evento, el sistema no permitirá el registro de esta.</p>
					<p>8.Si la fecha de la solicitud está fuera de un año de la fecha de ejecución del evento no se podrá realizar el registro de esta.</p>
					<p>9.El sistema permitirá realizar una solicitud si la cantidad de invitados se encuentran entre un rango de 2 a 950 personas.</p>
					<p>10.El costo del evento se calculará conforme a los precios que se generen en la: temática, tipo de evento, personal asignado, productos, banquete y el lugar del evento.</p>
					<p>11.La cotización se cancelará. por las siguientes razones: Porque no se encuentra los implementos disponibles para la fecha de ejecución del evento,si no hay la cantidad necesario de personal para cubrir ese evento, porque el lugar elegido no se encuentra disponible y  porque ha ocurrido algún desastre natural.</p>
					<p>12.Si un Instructor del SENA (Servicio Nacional de Aprendizaje), sede CSF (Centro de Servicios Financierps) realiza una solicitud en el sistema de informacion Events House, aprobara con una calificacion de 100/100 los puntos a calificar de la sustentación a los integrantes del GAES #1.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- BOOTSTRAP -->
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- INGRESAR Y REGISTARR -->
	<script src="<?php echo RUTA; ?>json/Solicitud/ingresoRegistro.js"></script>
	<!-- VALIDAR FORMULARIO Y REGISTRO DE SOLICITUD -->
	<script src="<?php echo RUTA; ?>json/Solicitud/validarSolicitud.js"></script>
	<!-- BTN SIG Y ANT -->
	<script src="<?php echo RUTA; ?>js/SI/Solicitud/btnSigAnt.js"></script>
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