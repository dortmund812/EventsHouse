<?php require_once 'views/Sistema/header.view.php'; ?>
	<!-- LINKS -->
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/SI/Index/estiloIndex.css">
	<!-- DETECTAR IDIOMA -->
	<p id="detectar_idioma" class="d-none"><?php echo $idi; ?></p>
	<!-- BOTON DE DESPLIEGUE DEL MENU -->
	<a href="" id="btn-despliegue" class="btn-despliegue">
		<i class="icon-menu1" id="iconomenu"></i>
	</a>
	<!-- LOADER -->
	<div class="pre-loader" id="pre-loader">
		<div class="loader"></div>
	</div>
	<!-- BOTONES DE IDIOMA -->
	<div class="idiomas">
		<ul>
			<li>
				<a href="<?php echo RUTA; ?>index?lenguaje=es">
					<img src="<?php echo RUTA; ?>img/Extras/CO.png" alt="">
				</a>
				<a href="<?php echo RUTA; ?>index?lenguaje=en">
					<img src="<?php echo RUTA; ?>img/Extras/US.png" alt="">
				</a>
				<a href="<?php echo RUTA; ?>index?lenguaje=fr">
					<img src="<?php echo RUTA; ?>img/Extras/FR.png" alt="">
				</a>
			</li>
		</ul>
	</div>
	<!-- BOTON DE SUBIR AL INICIO -->
	<a href="" id="btn-subir" class="btn-subir">
		<i class="icon-chevron-up"></i>
	</a>
	<!-- ############################ -->
	<!-- ---------- NMODAL ---------- -->
	<!-- ############################ -->
	<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresar" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-content-ingreso">
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
								<div class="error-modal"><?php echo $lenguaje["datosIncorrectos"] ?></div>
							</div>
							<input type="submit" value="<?php echo $lenguaje["ingresar"] ?>" id="btn_submit_ingresar" name="submit_ingresar">
						</form>
						<!-- REGISTRARSE Y OLVIDO DE CONTRASEÑA -->
						<div class="extras-modal">
							<a href="" id="btn_modal_registro" class="registro-modal"><?php echo $lenguaje["registrarse"] ?></a>
							<a href="" data-toggle="modal" data-target="#olvido_password"><?php echo $lenguaje["Olvidastetucontraseña"] ?></a>
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
										<label for="subir_hoja_vida" id="lbl_shv" class="cliente deshabilitado"><small><?php echo $lenguaje["hojadevida"] ?></small> <i class="icon-attachment1"></i></label>
										<label for="subir_foto"><?php echo $lenguaje["Subirfoto"] ?> <i class="icon-upload-to-cloud"></i></label>
										<!-- SUBIR FOTO -->
										<input type="file" id="subir_foto" name="subir_foto" accept=".jpg,.jpeg,.png" value="computer-1331579_960_720.png">
										<!-- SUBIT HOJA DE VIDA -->
										<input type="file" id="subir_hoja_vida" name="subir_hoja_vida" disabled="true" accept=".pdf">
										<!-- IMAGEN DE HOJA DE VIDA -->
										<img src="" id="hoja_vida_frame" alt="" style="display: none;">
										<!-- SELECCIONAR ROL -->
										<select name="seleccion_rol" id="seleccion_rol" class="form-control">
											<option value="1"><?php echo $lenguaje["cliente"] ?></option>
											<option value="6"><?php echo $lenguaje["aspirante"] ?></option>
										</select>
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
							<input type="email" id="registro_correo" name="registro_correo" class="col-12" placeholder="<?php echo $lenguaje["Correo"] ?>" required="true" autocomplete="off">
							<!-- PASSWORD -->
							<input type="password" id="registro_password" name="registro_password" class="col-12" placeholder="<?php echo $lenguaje["Contraseña"]; ?>">
							<!-- PASSWORD 2 -->
							<input type="password" id="registro_password2" name="registro_password2" class="col-12" placeholder="<?php echo $lenguaje["Confirmarcontraseña"]; ?>">
							<!-- CARGO -->
							<select name="cargo_aspirante" id="cargo_aspirante" class="form-control mb-2" disabled="true">
								<!-- CARGOS DE LOS ASPIRANTES -->
							</select>
							<!-- SUBMIT -->
							<input type="submit" value="<?php echo $lenguaje["registrarse"]; ?>" id="submit_registrarse" name="submit_registrarse">
						</form>
						<!-- INGRESAR -->
						<div class="extras-modal">
							<a href="" class="" id="btn_modal_ingreso"><?php echo $lenguaje["ingresar"] ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ############################ -->
	<!-- ---------- OMODAL ---------- -->
	<!-- ############################ -->
	<div class="modal fade" id="olvido_password" tabindex="-1" role="dialog" aria-labelledby="olvido_password" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-content-ingreso">
				<div class="card card-body">
					<form action="" class="row">
						<div class="form-group col-12">
							<label for="rec_correo"><?php echo $lenguaje["ingresarCorreo"] ?></label>
							<input type="text" id="rec_correo" name="rec_correo" class="form-control" placeholder="<?php echo $lenguaje["Correo"]; ?>">
						</div>
						<div class="form-group col-12">
							<label for="rec_cedula"><?php echo $lenguaje["ingresarCedula"]; ?></label>
							<input type="text" id="rec_cedula" name="rec_cedula" class="form-control" placeholder="<?php echo $lenguaje["Cedula"]; ?>">
						</div>
						<div class="w-100 text-center text-success" id="apro_rec_con"></div>
						<div class="w-100 text-center text-danger" id="rech_rec_con"></div>
						<div class="form-group col-6 pr-1">
							<button class="btn btn-block btn-info" data-dismiss="modal" aria-label="Cerrar"><?php echo $lenguaje["cancelar"] ?></button>
						</div>
						<div class="form-group col-6 pl-1">
							<button class="btn btn-block btn-info" id="aprov_rec_pass"><?php echo $lenguaje["enviar"] ?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- ############################ -->
	<!-- ---------- HEADER ---------- -->
	<!-- ############################ -->
	<nav class="menu d-none d-md-block" id="menu">
		<div class="cierre-int" id="cierre_int"></div>
		<ul class="lista">
			<li class="logo">
				<img src="<?php echo RUTA; ?>img/Extras/favicon.png" alt="">
			</li>
			<li>
				<a href="" id="btn_inicio"><?php echo $lenguaje["inicio"] ?></a>
			</li>
			<li>
				<a href="" id="btn_quienes_somos"><?php echo $lenguaje["QuienesSomos"] ?></a>
			</li>
			<li>
				<a href="" id="btn_galeria"><?php echo $lenguaje["Galeria"] ?></a>
			</li>
			<li>
				<a href="" id="btn_contacto"><?php echo $lenguaje["Contacto"] ?></a>
			</li>
			<li>
				<a href="" id="btn_menu_ingresar" data-toggle="modal" data-target="#ingresar"><?php echo $lenguaje["ingresar"] ?></a>
			</li>
		</ul>
	</nav>
	<!-- ############################ -->
	<!-- ---------- INICIO ---------- -->
	<!-- ############################ -->
	<section class="inicio" id="inicio">
		<h1>Events House</h1>
		<h4><?php echo $lenguaje["Cotizatueventoahora"] ?></h4>
		<a href="<?php echo RUTA; ?>SI/Cotizacion/cotizacion" class="mt-5"><?php echo $lenguaje["Cotizacion"] ?></a>
	</section>
	<!-- ################################### -->
	<!-- ---------- QUIENES SOMOS ---------- -->
	<!-- ################################### -->
	<section class="quienesSomos container-fluid pb-5" id="quienes_somos">
		<h2 class="pt-3"><?php echo $lenguaje["QuienesSomos"]; ?></h2>
		<p class="text-center text-white"><?php echo $lenguaje["DescripcionQuinesSomos"]; ?></p>
		<div class="row contenido2 d-flex align-items-center justify-content-around">
			<!-- MISION -->
			<div class="col-12 col-sm-6 col-lg-3 p-2 py-5">
				<div class="box">
					<div class="imgbox">
						<img src="<?php echo RUTA; ?>img/Extras/entrepreneur-1340649_1920.jpg" alt="">
					</div>
					<div class="cont">
						<h2><?php echo $lenguaje["Mision"] ?></h2>
						<p><?php echo $lenguaje["Descripcionmision"] ?></p>
					</div>
				</div>
			</div>
			<!-- VISION -->
			<div class="col-12 col-sm-6 col-lg-3 p-2 py-5">
				<div class="box">
					<div class="imgbox">
						<img src="<?php echo RUTA; ?>img/Extras/fountain-pen-1851096_1920.jpg" alt="">
					</div>
					<div class="cont">
						<h2><?php echo $lenguaje["Vision"] ?></h2>
						<p><?php echo $lenguaje["Descripcionvision"] ?></p>
					</div>
				</div>
			</div>
			<!-- HISTORIA -->
			<div class="col-12 col-sm-6 col-lg-3 p-2 py-5">
				<div class="box">
					<div class="imgbox">
						<img src="<?php echo RUTA; ?>img/Extras/notebook-581128_1920.jpg" alt="">
					</div>
					<div class="cont">
						<h2><?php echo $lenguaje["Historia"] ?></h2>
						<p><?php echo $lenguaje["descripcionhistoria"] ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ############################# -->
	<!-- ---------- GALERIA ---------- -->
	<!-- ############################# -->
	<section class="galeria container-fluid pb-5" id="galeria">
		<!-- SLIDERS RESPONSIVE -->
		<div class="row">
			<div class="col-12 mb-5">
				<h2 class="text-center titulo"><?php echo $lenguaje["NuestrosEventos"] ?></h2>
			</div>
			<div class="col-12">
				<div class="row d-flex justify-content-center">
					<!-- SLIDER DE FOTOS #1 -->
					<div class="col-12 col-sm-6 col-md-4 mb-3">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<!-- IMAGEN #1 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/crowd-1056764_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #2 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/restaurant-2697945_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #3 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/getlstd-property-photo.jpg" alt="">
								</div>
								<!-- IMAGEN #4 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/guitar-756326_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #5 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/foto-1.1.jpg" alt="">
								</div>
								<!-- IMAGEN #6 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/graduacion_4_mini.jpg" alt="">
								</div>
								<!-- IMAGEN #7 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/Vintage.jpg" alt="">
								</div>
								<!-- IMAGEN #8 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/waters-3366444_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #9 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/wedding.jpg" alt="">
								</div>
								<!-- IMAGEN #10 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/maquina-de-humo.jpg" alt="">
								</div>
							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					</div>
					<!-- SLIDER DE FOTOS #2 -->
					<div class="col-12 col-sm-6 col-md-4 mb-3">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<!-- IMAGEN #1 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/thank-you-362164_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #2 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/romantica.jpg" alt="">
								</div>
								<!-- IMAGEN #3 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/octava.jpg" alt="">
								</div>
								<!-- IMAGEN #4 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/8205644.jpg" alt="">
								</div>
								<!-- IMAGEN #5 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/birthday-1208233_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #6 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/bloom-1836315_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #7 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/beach-394503_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #8 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/console-2911959_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #9 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/el-fabuloso-facebook-1.jpg" alt="">
								</div>
								<!-- IMAGEN #10 -->
								<div class="swiper-slide">
									<img src="img/Tematicas/rose-3063284_1920.jpg" alt="">
								</div>
							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					</div>
					<!-- SLIDER DE FOTOS #3 -->
					<div class="col-12 col-sm-6 col-md-4 mb-3">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<!-- IMAGEN #1 -->
								<div class="swiper-slide">
									<img src="img/Comidas/Plato-principal-o-fuerte-2.1.jpg" alt="">
								</div>
								<!-- IMAGEN #2 -->
								<div class="swiper-slide">
									<img src="img/Comidas/Malteadas.jpg" alt="">
								</div>
								<!-- IMAGEN #3 -->
								<div class="swiper-slide">
									<img src="img/Comidas/abundance-1868573_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #4 -->
								<div class="swiper-slide">
									<img src="img/Comidas/bocadillos.jpg" alt="">
								</div>
								<!-- IMAGEN #5 -->
								<div class="swiper-slide">
									<img src="img/Comidas/dessert-352475_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #6 -->
								<div class="swiper-slide">
									<img src="img/Bebidas/bar-1839361_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #7 -->
								<div class="swiper-slide">
									<img src="img/Bebidas/drink-1209002_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #8 -->
								<div class="swiper-slide">
									<img src="img/Bebidas/whiskey-2171646_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #9 -->
								<div class="swiper-slide">
									<img src="img/Bebidas/champagne-736773_1920.jpg" alt="">
								</div>
								<!-- IMAGEN #10 -->
								<div class="swiper-slide">
									<img src="img/Bebidas/beer-3445988_1920.jpg" alt="">
								</div>
							</div>
							<!-- Add Pagination -->
							<div class="swiper-pagination"></div>
							<!-- Add Arrows -->
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ############################## -->
	<!-- ---------- CONTACTO ---------- -->
	<!-- ############################## -->
	<section class="contacto container-fluid pb-5" id="contacto">
		<h2 class="row"><?php echo $lenguaje["Contactanos"] ?></h2>
		<!-- INDICACIONES -->
		<div class="row px-3">
			<div class="col-12 col-md-6 indicaciones mb-3">
				<div class="row">
					<div class="col-6">
						<p><?php echo $lenguaje["Lunesviernes"] ?></p>
						<p>8:00am - 9:00pm</p>
						<p><?php echo $lenguaje["SabadosDomingos"] ?></p>
						<p>8:00am - 12:00pm</p>
					</div>
					<div class="col-6">
						<p><?php echo $lenguaje["Direccion"] ?></p>
						<p>Calle 89 #34-51</p>
						<p>(+57)8365098</p>
						<p><?php echo $lenguaje["correo1"] ?></p>
					</div>
				</div>
			</div>
		</div>
		<!-- CONTACTOS -->
		<div class="row">
			<div class="col card-group">
				<!-- FORMULARIO DE CONTACTO -->
				<div class="card card-body mx-2 rounded">
					<div class="card-title">
						<h4><?php echo $lenguaje["Contactanos"] ?></h4>
					</div>
					<form action="" class="row" id="form_contacto">
						<!-- NOMBRE -->
						<div class="form-group col-12 col-md-6">
							<label for="contacto_nombre"><?php echo $lenguaje["Nombre"]; ?></label>
							<input type="text" id="contacto_nombre" class="form-control" placeholder="<?php echo $lenguaje["Nombre"]; ?>" required="true">
						</div>
						<!-- APELLIDO -->
						<div class="form-group col-12 col-md-6">
							<label for="contacto_apellido"><?php echo $lenguaje["Apellido"]; ?></label>
							<input type="text" id="contacto_apellido" class="form-control" placeholder="<?php echo $lenguaje["Apellido"]; ?>" required="true">
						</div>
						<!-- CORREO -->
						<div class="form-group col-12">
							<label for="contacto_correo"><?php echo $lenguaje["Correo"]; ?></label>
							<input type="email" id="contacto_correo" class="form-control" placeholder="<?php echo $lenguaje["Correo"]; ?>" required="true">
						</div>
						<!-- TELEFONO -->
						<div class="form-group col-12 col-md-6">
							<label for="contacto_telefono"><?php echo $lenguaje["Telefono"]; ?></label>
							<input type="number" id="contacto_telefono" class="form-control" placeholder="<?php echo $lenguaje["Telefono"]; ?>" required="true">
						</div>
						<!-- MOTIVO -->
						<div class="form-group col-12 col-md-6">
							<label for="contacto_motivo"><?php echo $lenguaje["Motivo"]; ?></label>
							<select name="index_motivo" id="contacto_motivo" class="form-control">
								<option value="" selected="true" disabled="true"><?php echo $lenguaje["Motivo"]; ?></option>
								<option value="contrato"><?php echo $lenguaje["Contrato"] ?></option>
								<option value="evento"><?php echo $lenguaje["Evento"] ?></option>
								<option value="otro"><?php echo $lenguaje["Otro"] ?></option>
							</select>
						</div>
						<!-- MENSAJE -->
						<div class="form-group col-12">
							<label for="contacto_mensaje"><?php echo $lenguaje["Mensaje"] ?></label>
							<textarea name="contacto_mensaje" id="contacto_mensaje" class="form-control" placeholder="<?php echo $lenguaje["Dejanostumensaje"] ?>" required="true"></textarea>
						</div>
						<!-- BTN ENVIAR -->
						<div class="form-group col-12">
							<input type="submit" value="<?php echo $lenguaje["enviar"] ?>" class="form-control btn btn-primary" id="contacto_enviar">
						</div>
					</form>
				</div>
				<!-- MAPA -->
				<div class="card card-body mx-2 rounded">
					<div class="card-title">
						<h4><?php echo $lenguaje["Ubicanos"] ?></h4>
					</div>
					<!-- MAPA -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3976.675741319405!2d-74.06500178573684!3d4.6517959433761575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1541340050999" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</section>
	<!-- ############################ -->
	<!-- ---------- FOOTER ---------- -->
	<!-- ############################ -->
	<?php require_once 'views/Sistema/footer.view.php'; ?>
	<!-- SCRIPTS INDEX -->
	<script src="<?php echo RUTA; ?>js/SI/Index/scriptsIndex.js"></script>
	<!-- SCRIPTS REGISTRO -->
	<script src="<?php echo RUTA; ?>json/Index/validarRegistro.js"></script>
	<!-- SCRIPTS FORMULARIO DE CONTACTO -->
	<script src="<?php echo RUTA; ?>json/Index/formularioContacto.js"></script>
	<!-- SCRIPT RECUPERAR CONTRASEÑA -->
	<script src="<?php echo RUTA; ?>json/Index/recuperarPassword.js"></script>
	<!-- SCRIPTS INGRESO -->
	<script src="<?php echo RUTA; ?>json/Index/validarIngreso.js"></script>
	<!-- SCRIPTS SESION -->
	<script src="<?php echo RUTA; ?>json/Index/verificarSesion.js"></script>
	<script>
		setInterval(function(){
			traerCargos('HW');
		}, 1000);
		function traerCargos(consulta){
			$.ajax({
				url: 'config/validar',
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