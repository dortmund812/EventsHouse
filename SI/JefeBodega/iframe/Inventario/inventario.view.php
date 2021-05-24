<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Inventario</title>
	<style>
		.brd_error{
			border-color: red;
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
		<form action="" class="row py-2">
			<div class="col-11">
				<div class="row">
					<div class="col-3 px-1">
						<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Nombre"] ?>" id="reg_nombre" autocomplete="off">
					</div>
					<div class="col-3 px-1">
						<select name="tipo" id="tipo" class="form-control">
							<!-- TARER TIPOS DE IMPLEMENTOS -->
						</select>
					</div>
					<div class="col-3 px-1">
						<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Cantidad"] ?>" id="reg_cantidad" autocomplete="off">
					</div>
					<div class="col-3 px-1">
						<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Costoporevento"] ?>" id="reg_costo" autocomplete="off">
					</div>
				</div>
			</div>
			<button class="col-1 btn btn-block btn-success" id="agr_implemento"><?php echo $lenguaje["Agregar"] ?></button>
		</form>
		<div class="row">
			<table class="table table-striped table-responsive-md mb-5">
				<thead>
					<tr class="bg-info text-white text-center">
						<td><input autocomplete="off" type="text" id="id_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="ID" style="max-width: 50px;"></td>
						<td><input autocomplete="off" type="text" id="nom_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Nombre"] ?>"></td>
						<td><input autocomplete="off" type="text" id="tip_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Tipo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="can_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Cantidad"] ?>"></td>
						<td><input autocomplete="off" type="text" id="cos_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Costo"] ?>"></td>
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
			<!-- MODAL DE ASPIRANTE -->
			<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_modal" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
						<div class="card card-body">
							<h4 class="text-center mb-3"><?php echo $lenguaje["EstasSeguroquequiereseliminaresteimplemento"] ?></h4>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-block btn-primary" id="btn_elim_imp"><?php echo $lenguaje["Eliminar"] ?></button>
								</div>
								<div class="col-6">
									<button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Cerrar"><?php echo $lenguaje["Cancelar"] ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL MODIFICAR -->
			<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="modificar" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="card card-body">
							<form action="" class="row">
								<!-- NOMBRE -->
								<div class="col-12 form-group">
									<label for="nom_impl_mod" class="mb-0 pl-1"><?php echo $lenguaje["Nombre"] ?></label>
									<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Nombre"] ?>" id="nom_impl_mod">
								</div>
								<!-- TIPO -->
								<div class="col-12 form-group">
									<label for="mod_tipo" class="mb-0 pl-1"><?php echo $lenguaje["Tipo"] ?></label>
									<select name="mod_tipo" id="mod_tipo" class="form-control">
										<!-- TRAER TIPOS DE IMPLEMENTO -->
									</select>
								</div>
								<!-- CANTIDAD -->
								<div class="col-12 form-group">
									<label for="cant_impl_mod" class="mb-0 pl-1"><?php echo $lenguaje["Cantidad"] ?></label>
									<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Cantidad"] ?>" id="cant_impl_mod">
								</div>
								<!-- COSTO -->
								<div class="col-12 form-group">
									<label for="cost_impl_mod" class="mb-0 pl-1"><?php echo $lenguaje["Costo"] ?></label>
									<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Costo"] ?>" id="cost_impl_mod">
								</div>
								<!-- MODIFICAR -->
								<div class="col-6 form-group mb-0 pr-1">
									<button class="btn btn-block btn-primary" id="mod_impl"><?php echo $lenguaje["Modificar"] ?></button>
								</div>
								<!-- CANCELAR -->
								<div class="col-6 form-group mb-0 pl-1">
									<button id="btn_cer_mod" class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Cerrar"><?php echo $lenguaje["Cancelar"] ?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL NOTIFICACION EXITOSA -->
			<button class="" id="abrir_modal" data-toggle="modal" data-target="#notificacion_exitosa" style="width: -1px;height: -1px;position: absolute;top: 0;left: 0;opacity: 0;"></button>
			<div class="modal fade" id="notificacion_exitosa" tabindex="-1" role="dialog" aria-labelledby="notificacion_exitosa" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_notifiacion_exitosa" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body d-flex justify-content-center align-items-center py-5">
							<h3 class="text-success text-center">¡Implemento Registrado!</h3>
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
	<!-- SCRIPTS INVENTARIO -->
	<script src="json/scriptsInventario.js"></script>
</body>
</html>