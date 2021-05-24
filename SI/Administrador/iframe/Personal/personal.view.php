<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Personal</title>
	<style>
		.inppaq{
			border: none;
			border-bottom: 1px solid;
			border-radius: 0;
		}
		.brd_cambio{
			border-color: #80B9E6;
		}
		.inp_busq::placeholder,
		.inp_busq:hover,
		.inp_busq:focus,
		.inp_busq{
			color: #fff;
			outline: none;
			background: none;
			border: none;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<table class="table table-striped table-responsive-md mb-5">
				<thead>
					<tr class="bg-info text-white text-center">
						<td><input autocomplete="off" type="text" id="id_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="ID" style="max-width: 50px;"></td>
						<td><input autocomplete="off" type="text" id="nom_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Nombre"] ?>"></td>
						<td><input autocomplete="off" type="text" id="ape_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Apellido"] ?>"></td>
						<td><input autocomplete="off" type="text" id="car_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Cargo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="hon_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Honorarios"] ?>"></td>
						<td><input autocomplete="off" type="text" id="tel_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Telefono"] ?>"></td>
						<td><input autocomplete="off" type="text" id="cor_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Correo"] ?>"></td>
						<td><span id="incon_search" class="btn btn-outline-light py-0" style="cursor: pointer;"><i class="icon-search mr-2"></i><?php echo $lenguaje["Buscar"] ?></span></td>
					</tr>
				</thead>
				<tbody class="text-center" id="tbody">
					<!-- DATOS DE ASPIRANTES -->
				</tbody>
			</table>
			<div class="col-12 d-flex justify-content-center fixed-bottom bg-dark mb-0 pb-0" id="paginacionAspirantes">
				<!-- PAGINACION -->
			</div>
			<!-- MODAL MODIFICAR -->
			<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="modificar" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<button id="mod_2" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body pt-2">
							<div class="row">
								<div class="col-12 mt-0 pt-0">
									<div class="row">
										<div class="col-8">
											<div class="row">
												<div class="form-group col-12">
													<h5 class="text-center"><?php echo $lenguaje["Empleado"] ?> #<span id="id"></span></h5>
												</div>
												<div class="form-group col-12 px-1">
													<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Nombre"] ?></label>
													<input type="text" class="form-control inppaq" id="nombre" disabled="true" style="background: none;">
												</div>
												<div class="form-group col-12 px-1">
													<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Cedula"] ?></label>
													<input type="text" class="form-control inppaq" id="cedula" disabled="true" style="background: none;">
												</div>
											</div>
										</div>
										<div class="col-4 px-1 mb-1">
											<div class="row">
												<div class="col-12">
													<img src="<?php echo RUTA; ?>img/personal/usuarios/persona2.jpg" class="w-100" alt="" id="img_persona">
												</div>
												<div class="col-12">
													<button class="btn btn-block btn-info" id="hoja_vida_btn" data-toggle="modal" data-target="#hoja_vida"><?php echo $lenguaje["Hojadevida"] ?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- ESPECIFICACION COTIZACION -->
								<div class="col-12 px-0">
									<div class="card p-1" style="border: none;">
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Telefono"] ?></label>
												<input type="text" class="form-control inppaq" id="telefono" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Cargo"] ?></label>
												<select name="cargo" id="cargo" class="form-control inppaq" disabled="true" style="background: none;">
													<!-- TRAER CARGOS -->
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Correo"] ?></label>
											<input type="text" class="form-control inppaq" id="correo" disabled="true" style="background: none;">
										</div>
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["FechadeContrato"] ?></label>
												<input type="text" class="form-control inppaq" id="fecha_contrato" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Estado"] ?></label>
												<select name="estado" id="estado" class="form-control inppaq" disabled="true" style="background: none;">
													<!-- TRAER ESTADOS -->
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Honorarios"] ?></label>
											<input type="text" class="form-control inppaq" id="honorarios" disabled="true" style="background: none;">
										</div>
									</div>
								</div>
								<!-- ACCIONES DEL EMPLEADO -->
								<div class="col-12">
									<div class="row">
										<div class="col-6 px-1">
											<button class="btn btn-block btn-dark" id="desp_empl" data-toggle="modal" data-target="#despedir_empleado_conf"><?php echo $lenguaje["Despedir"] ?></button>
										</div>
										<div class="col-6 px-1">
											<button class="btn btn-block btn-dark" id="mod_empl"><?php echo $lenguaje["Modificar"] ?></button>
										</div>
										<div class="col-12 px-1">
											<button class="btn btn-block btn-info d-none" id="btn_act_camb"><?php echo $lenguaje["Aceptar"] ?></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL HOJA DE VIDA -->
			<div class="modal fade" id="hoja_vida" tabindex="-1" role="dialog" aria-labelledby="hoja_vida" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<iframe src="<?php echo RUTA; ?>archivos/" frameborder="0" style="min-height: 500px;" id="hoja_vida_empleado"></iframe>
					</div>
				</div>
			</div>
			<!-- MODAL DESPEDIR EMPLEADO -->
			<div class="modal fade" id="despedir_empleado_conf" tabindex="-1" role="dialog" aria-labelledby="despedir_empleado_conf" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_despedir_empleado_conf" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<div class="col-12">
									<h4 class="text-center">¿Quieres despedir a este empleado?</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-danger btn-block" id="desp_emp_btn">Despedir</button>
								</div>
								<div class="col-6">
									<button class="btn btn-info btn-block" id="canc_emp_btn" data-dismiss="modal" aria-label="Cerrar">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL NOTIFICACION EXITOSA -->
			<button class="btn btn-block btn-dark" id="abrir_modal" data-toggle="modal" data-target="#notificacion_exitosa"></button>
			<div class="modal fade" id="notificacion_exitosa" tabindex="-1" role="dialog" aria-labelledby="notificacion_exitosa" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_notifiacion_exitosa" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body d-flex justify-content-center align-items-center py-5">
							<h3 class="text-success text-center">¡Modificación Exitosa!</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BOOTSTRAP -->
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS PERSONAL -->
	<script src="json/scriptsPersonal.js"></script>
</body>
</html>