<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Configuración</title>
	<style>
		.inp-cambio-foto{
			width: -0.1px;
			height: -0.1px;
			position: absolute;
			top: 0;
			left: 0;
			opacity: 0;
		}
		.error-solicitud{
			border-color: red;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 px-0">
				<div class="card card-body mb-2">
					<form action="" class="row" id="from_cambio">
						<!-- CAMBIO DE FOTO DE PERFIL -->
						<div class="form-group col-12 col-lg-5">
							<div class="row">
								<div class="col-12 mb-3">
									<div class="row">
										<!-- VISTA PREVIA DE LA FOTO -->
										<div class="col-12 col-lg-6 mb-2 mb-lg-0">
											<img style="border: 1px solid;border-radius: 50%;" src="<?php echo RUTA; ?>img/personal/usuarios/persona2.jpg" alt="" id="imagen_user" class="w-100">
										</div>
										<!-- SUBIR LA FOTO -->
										<div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center align-items-center">
											<label for="cambio_foto" class="btn btn-info"><?php echo $lenguaje["CambiarFotodePerfil"] ?></label>
											<a for="" class="btn btn-info text-white" data-toggle="modal" data-target="#empleados_list_2">Política de privacidad</a>
											<input type="file" class="inp-cambio-foto" name="cambio_foto" id="cambio_foto" accept=".jpg,.jpeg,.png">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- NOMBRES; APELLIDOS; TELEFONO -->
						<div class="form-group col-12 col-lg-7">
							<div class="row p-2 pt-3">
								<!-- NOMBRE -->
								<div class="form-group col-12 col-lg-6">
									<label for="cambio_nombre"><?php echo $lenguaje["Nombres"] ?></label>
									<input type="text" class="form-control" name="cambio_nombre" id="cambio_nombre" placeholder="<?php echo $lenguaje["Nombres"] ?>">
								</div>
								<!-- APELLIDOS -->
								<div class="form-group col-12 col-lg-6">
									<label for="cambio_apellido"><?php echo $lenguaje["Apellidos"] ?></label>
									<input type="text" class="form-control" name="cambio_apellido" id="cambio_apellido" placeholder="<?php echo $lenguaje["Apellidos"] ?>">
								</div>
								<!-- TELEFONO -->
								<div class="form-group col-12">
									<label for="cambio_telefono"><?php echo $lenguaje["Telefono"] ?></label>
									<input type="text" class="form-control" name="cambio_telefono" id="cambio_telefono" placeholder="<?php echo $lenguaje["Telefono"] ?>">
								</div>
								<!-- CORREO -->
								<div class="form-group col-12">
									<label for="cambio_correo"><?php echo $lenguaje["Correo"] ?></label>
									<input type="email" class="form-control" name="cambio_correo" id="cambio_correo" placeholder="<?php echo $lenguaje["Correo"] ?>" disabled="true">
								</div>
								<!-- CONTRASEÑA ACTUAL -->
								<div class="form-group col-12">
									<label for="password_actual"><?php echo $lenguaje["Contraseñaactual"] ?></label>
									<input type="password" class="form-control" name="password_actual" id="password_actual" placeholder="<?php echo $lenguaje["Contraseñaactual"] ?>">
								</div>
								<!-- NUEVA CONTRASEÑA -->
								<div class="form-group col-12 col-lg-6 mb-lg-0">
									<label for="registro_password"><?php echo $lenguaje["NuevaContraseña"] ?></label>
									<input type="password" class="form-control" name="registro_password" id="registro_password" placeholder="<?php echo $lenguaje["NuevaContraseña"] ?>">
								</div>
								<!-- CONFIRMAR CONTARSEÑA -->
								<div class="form-group col-12 col-lg-6 mb-lg-0">
									<label for="registro_password2"><?php echo $lenguaje["ConfirmarContraseña"] ?></label>
									<input type="password" class="form-control" name="registro_password2" id="registro_password2" placeholder="<?php echo $lenguaje["ConfirmarContraseña"] ?>">
								</div>
								<p class="d-flex w-100 justify-content-end text-danger mb-0 pr-3" id="error_pass"></p>
								<p class="d-flex w-100 justify-content-end text-success mb-0 pr-3" id="success_pass"></p>
							</div>
						</div>
						<!-- ENVIAR FORMULARIO -->
						<div class="form-group col-12 mt-0 pt-0">
							<input type="submit" value="<?php echo $lenguaje["ActualizarInformacion"]; ?>" name="actualizar_informacion" id="actualizar_informacion" class="btn btn-block btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="empleados_list_2" tabindex="-1" role="dialog" aria-labelledby="empleados_list_2" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- MODAL #3 -->
					<div class="card card-body">
						<h2>POLÍTICAS DE PRIVACIDAD</h2>
						<p>1. Bienvenido a Events House, un Sistema el que deseamos cambiar la dinámica de cómo cotizar un evento de forma total personalizada para nuestros clientes recolectando información del cómo desea su evento, adquiriendo datos de contacto, respetando su privacidad. Además, el sistema cuenta con la posibilidad de que los usuarios que deseen trabajar con nosotros pueden realizar esta gestión mediante la plataforma.</p>

						<p>2. Si tiene alguna pregunta sobre esta política de privacidad, puede contactarnos con la empresa por medio del siguiente correo "eventshouse1234@gmail.com".
							En la información de registro solamente solicitamos los siguientes datos: Nombre, Apellido, Teléfono, Dirección, para el tema contacto para así poder gestionar el evento.</p>

						<p>4. Cuando usted visita nuestro sistema o pulsa algún hipervínculo que aparece en ella, o usa uno o más de nuestros servicios, podremos usar una tecnología industrial llamada "cookies" la cual almacena cierta información en su computadora y que nos permitirá personalizar su experiencia para alinearse con sus intereses y preferencias o simplemente facilitar su acceso al usar nuestros servicios.</p>

						<p>5. En el tema de como utilizamos tu información de contacto es totalmente confidencial a la cual solo puede tener acceso la secretaria y el administrador cuyos cargos son los más influyentes en nuestro sistema.</p>

						<p>6. Usamos métodos razonables de seguridad para proteger la data que reside en nuestros servidores. Sin embargo, ningún sistema de seguridad es impenetrable, debido a esto, no le podemos garantizar la seguridad de nuestros servidores. Es también posible que la información que usted nos provea pueda ser interceptada durante la transmisión de datos.</p>

						<p>7. Cómo examinar, actualizar o borrar la información de registro se basa en el como parte del uso de nuestros servicios, así que usted es el responsable de actualizar información sometida para que sea actualizada y completa. Para actualizar esta información de registro, debe de acceder al sistema y realizar dicho cambio o sino deberá de comunicarse al siguiente correo eventshouse1234@gmail.com y solicitar el cambio de información.</p>

						<button id="mod_2" class="btn btn.block btn-info text-white" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">Cerrar</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS CONFIGURACION -->
	<script src="json/scriptsConfiguracion.js"></script>
</body>
</html>