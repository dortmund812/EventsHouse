<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Empleados</title>
	<style>
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
						<td><input autocomplete="off" type="text" id="rol_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Rol"] ?>"></td>
						<td><span id="lbl_fec"><?php echo $lenguaje["Contratado"] ?></span><input type="date" id="fec_busq" class="form-control text-center m-0 p-0 d-none"></td>
						<td><input autocomplete="off" type="text" id="cor_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Correo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="est_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Estado"] ?>"></td>
						<td><span id="incon_search" class="btn btn-outline-light py-0" style="cursor: pointer;"><i class="icon-search mr-2"></i><?php echo $lenguaje["Buscar"] ?></span></td>
					</tr>
				</thead>
				<tbody class="text-center" id="tbody">
					<!-- EMPLEADOS -->
				</tbody>
			</table>
			<div class="col-12 d-flex justify-content-center fixed-bottom bg-dark mb-0 pb-0" id="paginacionAspirantes">
				<!-- PAGINACION -->
			</div>
			<!-- MODAL EMPLEADO -->
			<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresar" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content modal-content-ingreso">
						<div class="card card-body">
							<form action="">
								<div class="row" id="formulario_solicitud">
									<!-- ID -->
									<div class="col-4 pr-0 form-group mb-1">
										<label for="" class="m-0 px-1">ID</label>
										<input type="text" value="ID:" class="form-control" id="id" disabled="true">
									</div>
									<!-- FECHA -->
									<div class="col-4 px-0 form-group mb-1">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Fecha"] ?></label>
										<input type="text" value="Fecha:" class="form-control" disabled="true" id="fecha">
									</div>
									<!-- ROL -->
									<div class="col-4 pl-0 form-group mb-1">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Rol"] ?></label>
										<input type="text" value="Rol:" class="form-control" disabled="true" id="rol">
									</div>
									<!-- NOMBRE -->
									<div class="col-6 pr-1 form-group mb-1">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Nombre"] ?></label>
										<input type="text" value="Nombre:" class="form-control" disabled="true" id="nombre">
									</div>
									<!-- APELLIDO -->
									<div class="col-6 pl-1 form-group mb-1">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Apellido"] ?></label>
										<input type="text" value="Apellido:" class="form-control" disabled="true" id="apellido">
									</div>
									<!-- CORREO -->
									<div class="col-6 pr-1 form-group mb-1">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Correo"] ?></label>
										<input type="text" value="Correo:" class="form-control" disabled="true" id="correo">
									</div>
									<!-- TELEFONO -->
									<div class="col-6 pl-1 form-group mb-1">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Telefono"] ?></label>
										<input type="text" value="Telefono:" class="form-control" disabled="true" id="telefono">
									</div>
									<!-- CEDULA -->
									<div class="col-6 pr-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Cedula"] ?></label>
										<input type="text" value="C.C." class="form-control" disabled="true" id="cedula">
									</div>
									<!-- ESTADO -->
									<div class="col-6 pl-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Estado"] ?></label>
										<input type="text" value="Estado:" class="form-control" disabled="true" id="estado">
									</div>
									<!-- FOTO Y HOJA DE VIDA -->
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-12 mb-2">
												<a href="" class="btn btn-block btn-info" data-toggle="modal" data-target="#foto"><?php echo $lenguaje["Foto"] ?></a>
											</div>
											<div class="col-12 mb-2">
												<a href="" class="btn btn-block btn-info" data-toggle="modal" data-target="#hoja_vida"><?php echo $lenguaje["Hojadevida"] ?></a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL FOTO -->
			<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="foto" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="card">
							<img src="<?php echo RUTA; ?>img/personal/usuarios/persona2.jpg" class="card-img-top img-fluid" alt="" id="foto_aspirante"></img>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL HOJA DE VIDA -->
			<div class="modal fade" id="hoja_vida" tabindex="-1" role="dialog" aria-labelledby="hoja_vida" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<iframe src="<?php echo RUTA; ?>archivos/" frameborder="0" style="min-height: 500px;" id="hoja_vida_aspirante"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BOOTSTRAP -->
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS EMPLEADOS -->
	<script src="json/scriptsEmpleados.js"></script>
</body>
</html>