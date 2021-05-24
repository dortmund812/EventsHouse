<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Productos</title>
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
		<div class="row">
			<table class="table table-striped table-responsive-md mb-5">
				<thead>
					<tr class="bg-info text-white text-center">
						<td><input autocomplete="off" type="text" id="id_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="ID" style="max-width: 50px;"></td>
						<td><input autocomplete="off" type="text" id="imp_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Implemento"] ?>"></td>
						<td><input autocomplete="off" type="text" id="tip_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Tipo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="cot_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Cotizacion"] ?>"></td>
						<td><input autocomplete="off" type="text" id="eve_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Evento"] ?>"></td>
						<td><input autocomplete="off" type="text" id="can_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Cantidad"] ?>"></td>
						<td><input autocomplete="off" type="text" id="cos_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Costo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="est_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Estado"] ?>"></td>
						<td><span id="incon_search" class="btn btn-outline-light py-0" style="cursor: pointer;"><i class="icon-search mr-2"></i><?php echo $lenguaje["Buscar"] ?></span></td>
					</tr>
				</thead>
				<tbody class="text-center" id="tbody">
					<!-- DATOS DE LOS PRODUCTOS -->
				</tbody>
			</table>
			<div class="col-12 d-flex justify-content-center fixed-bottom bg-dark mb-0 pb-0" id="paginacionAspirantes">
				<!-- PAGINACION -->
			</div>
			<!-- MODAL DE ELIMINAR -->
			<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content modal-content-ingreso">
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
						<button id="cerrar_modificar" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
						<div class="card card-body">
							<form action="" class="row">
								<!-- IMPLELEMENTO -->
								<div class="form-group col-12">
									<label for="cam_impl" class="mb-0 pl-1"><?php echo $lenguaje["Implemento"] ?></label>
									<select name="cam_impl" id="cam_impl" class="form-control">
										<!-- TARER TIPO DE IMPLEMENTO -->
									</select>
								</div>
								<!-- CANTIDAD -->
								<div class="form-group col-12">
									<label for="cam_cant" class="mb-0 pl-1"><?php echo $lenguaje["Cantidad"] ?></label>
									<input type="text" name="cam_cant" id="cam_cant" class="form-control" placeholder="Cantidad">
								</div>
								<!-- ACCIONES -->
								<div class="form-group col-6 mb-0">
									<button class="btn btn-block btn-primary" id="btn_mod"><?php echo $lenguaje["Modificar"] ?></button>
								</div>
								<div class="form-group col-6 mb-0">
									<button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Cerrar"><?php echo $lenguaje["Cancelar"] ?></button>
								</div>
							</form>
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
	<!-- SCRIPTS PRODUCTOS -->
	<script src="json/scriptsProductos.js"></script>
</body>
</html>