<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Eventos</title>
	<style>
		.brd_error{
			border-color: red;
		}
		.inppaq{
			border: none;
			border-bottom: 1px solid;
			border-radius: 0;
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
						<td><input autocomplete="off" type="text" id="eve_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Evento"] ?>"></td>
						<td><input autocomplete="off" type="text" id="tip_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Tipo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="cos_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Costo"] ?>"></td>
						<td><input autocomplete="off" type="text" id="lug_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Lugar"] ?>"></td>
						<td><input autocomplete="off" type="text" id="usu_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Usuario"] ?>"></td>
						<td><input autocomplete="off" type="text" id="est_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Estado"] ?>"></td>
						<td><span id="incon_search" class="btn btn-outline-light py-0" style="cursor: pointer;"><i class="icon-search mr-2"></i><?php echo $lenguaje["Buscar"] ?></span></td>
					</tr>
				</thead>
				<tbody class="text-center" id="tbody">
					<!-- DATOS DE EVENTOS -->
				</tbody>
			</table>
			<div class="col-12 d-flex justify-content-center fixed-bottom bg-dark mb-0 pb-0" id="paginacionAspirantes">
				<!-- PAGINACION -->
			</div>
			<!-- MODAL MODIFICAR -->
			<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="modificar" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<button id="mod_2" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<!-- ESPECIFICACION COTIZACION -->
								<div class="col-5 px-0">
									<div class="card p-1" style="border-radius: 0;box-shadow: 0 0 5px #000;">
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Tipo"] ?></label>
											<input type="text" class="form-control inppaq" placeholder="Tipo" id="tipo" disabled="true" style="background: none;">
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Lugar"] ?></label>
											<input type="text" class="form-control inppaq" placeholder="Lugar" id="lugar" disabled="true" style="background: none;">
										</div>
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Recordatorios"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="Recordatorios" id="recordatorios" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Personas"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="Cantidad de personas" id="personas" disabled="true" style="background: none;">
											</div>
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Tematica"] ?></label>
											<input type="text" class="form-control inppaq" placeholder="Tematica" id="tematica" disabled="true" style="background: none;">
										</div>
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["CostoMinimo"] ?></label>
												<input type="text" placeholder="Costo Minimo" class="form-control inppaq" id="cost_min" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["CostoMaximo"] ?></label>
												<input type="text" class="form-control inppaq" id="cost_max" disabled="true" style="background: none;">
											</div>
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Costototal"] ?></label>
											<input type="text" class="form-control inppaq" id="cost_tot" disabled="true" style="background: none;">
										</div>
									</div>
								</div>
								<!-- AGREGAR IMPLEMENTOS -->
								<div class="col-7">
									<div class="row mb-2" style="max-height: 15%;">
										<!-- SELECCIONAR IMPLEMENTO NUEVO -->
										<div class="col-7 pr-0">
											<select name="sel_imp" id="sel_imp" class="form-control">
												<!-- SELECCIONAR IMPLEMENTO -->
											</select>
										</div>
										<!-- AGREGAR CANTIDAD DE IMPLEMENTO -->
										<div class="col-3 px-0">
											<input type="text" class="form-control" placeholder="Cantidad" id="agr_cant" autocomplete="off">
										</div>
										<!-- BTN AGREGAR PRODUCTO -->
										<div class="col-2 pl-0">
											<button class="btn btn-block btn-success" id="btn_agr_impl">
												<i class="icon-plus"></i>
											</button>
										</div>
									</div>
									<!-- LISTADO DE PRODUCTOS IMPLEMENTOS ASIGNADOS -->
									<div class="row mb-5" style="height: 70%; max-height: 70%;">
										<div class="col-12">
											<div class="p-1 pb-0" id="agr_imp">
												<!-- TRAER IMPLEMENTOS ASIGNADOS -->
											</div>
										</div>
									</div>
									<!-- BTN APROBAR IMPLEMENTOS ASIGNADOS -->
									<div class="row" style="max-height: 15%;position: absolute;bottom: 0;width: 100%;">
										<div class="col-12">
											<button class="btn btn-block btn-success" id="btn_apr_impl"><?php echo $lenguaje["Aprobar"] ?> - <span id="cost_imple">$000.000</span></button>
										</div>
									</div>
								</div>
							</div>
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
							<h3 class="text-success text-center">¡Cotización Aprobada!</h3>
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
	<!-- SCRIPTS EVENTOS -->
	<script src="json/scriptsEventos.js"></script>
</body>
</html>