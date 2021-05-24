<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Cotizaciones</title>
	<style>
		.brd_error{
			border-color: red;
		}
		.inppaq{
			border: none;
			border-bottom: 1px solid;
			border-radius: 0;
		}
		.car_link{
			color: #fff;
		}
		.select_link,
		.car_link:hover{
			background: #fff;
			color: #000;
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
					<!-- DATOS DE ASPIRANTES -->
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
								<div class="col-6 px-0">
									<div class="card p-1" style="border-radius: 0;box-shadow: 0 0 5px #000;">
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Tipo"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="<?php echo $lenguaje["Tipo"] ?>" id="tipo" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Nombre"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="<?php echo $lenguaje["Nombre"] ?>" id="nombre" disabled="true" style="background: none;">
											</div>
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Lugar"] ?></label>
											<input type="text" class="form-control inppaq" placeholder="<?php echo $lenguaje["Lugar"] ?>" id="lugar" disabled="true" style="background: none;">
										</div>
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Fecha"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="<?php echo $lenguaje["Fecha"] ?>" id="fecha" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Personas"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="<?php echo $lenguaje["Personas"] ?>" id="personas" disabled="true" style="background: none;">
											</div>
										</div>
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Tematica"] ?></label>
												<input type="text" class="form-control inppaq" placeholder="<?php echo $lenguaje["Tematica"] ?>" id="tematica" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Correo"] ?></label>
												<input type="text" class="form-control inppaq" id="correo_inp" disabled="true" style="background: none;">
											</div>
										</div>
										<div class="row">
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Usuario"] ?></label>
												<input type="text" class="form-control inppaq" id="usuario" disabled="true" style="background: none;">
											</div>
											<div class="form-group col-6">
												<label for="" class="mb-0 pl-1"><?php echo $lenguaje["Anfitrion"] ?></label>
												<input type="text" class="form-control inppaq" id="anfitrion" disabled="true" style="background: none;">
											</div>
										</div>
										<div class="form-group">
											<label for="" class="mb-0 pl-1"><?php echo $lenguaje["CostoTotal"] ?></label>
											<input type="text" class="form-control inppaq" id="cost_tot" disabled="true" style="background: none;">
										</div>
									</div>
								</div>
								<!-- AGREGAR IMPLEMENTOS -->
								<div class="col-6 pl-4">
									<div class="row" style="box-shadow: 0 0 5px #000;">
										<!-- BANQUETE -->
										<div class="form-group col-6">
											<label for="banquete" class="mb-0 pl-1"><?php echo $lenguaje["Banquete"] ?></label>
											<input type="text" id="banquete" class="form-control inppaq" style="background: none;" disabled="true">
										</div>
										<!-- FORMALIDAD -->
										<div class="form-group col-6">
											<label for="formalidad" class="mb-0 pl-1"><?php echo $lenguaje["Formalidad"] ?></label>
											<input type="text" id="formalidad" class="form-control inppaq" style="background: none;" disabled="true">
										</div>
										<!-- RECORDATORIOS -->
										<div class="form-group col-12">
											<label for="recordatorios" class="mb-0 pl-1"><?php echo $lenguaje["Recordatorios"] ?></label>
											<input type="text" id="recordatorios" class="form-control inppaq" style="background: none;" disabled="true">
										</div>
										<!-- COMENTARIOS -->
										<div class="form-group col-12">
											<label for="comentarios" class="mb-0 pl-1"><?php echo $lenguaje["Comentarios"] ?></label>
											<textarea name="comentarios" id="comentarios" class="form-control inppaq" style="background: none;min-height: 70px;max-height: 70px;" disabled="true"></textarea>
										</div>
									</div>
									<!-- BTN APROBAR IMPLEMENTOS ASIGNADOS -->
									<div class="row" style="position: absolute;bottom: 0;width: 100%;">
										<!-- VER LOS IMPLEMENTOS DE LA COTIZACION -->
										<div class="col-12 pl-0 pr-2 mb-1">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="<?php echo $lenguaje["Verimplementos"] ?>" value="" disabled="true" style="background: none;">
												<div class="input-group-append">
													<button class="btn btn-info ret_prodc" id="ver_impl_cot" data-toggle="modal" data-target="#implementos_list">
														<i class="icon-cog text-white"></i>
													</button>
												</div>
											</div>
										</div>
										<!-- VER Y ASIGNAR EMPLEADOS 2 -->
										<div class="col-12 pl-0 pr-2 mb-1">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="<?php echo $lenguaje["AsignarEmpleados"] ?>" value="" disabled="true" style="background: none;">
												<div class="input-group-append">
													<button class="btn btn-info ret_prodc" id="ver_empl_cot" data-toggle="modal" data-target="#empleados_list_2">
														<i class="icon-cog text-white"></i>
													</button>
												</div>
											</div>
										</div>
										<!-- DEVOLVER COTIZACION -->
										<div class="col-6 pl-0 pr-2 mb-1">
											<button class="btn btn-block btn-info" id="btn_devol_cot"><?php echo $lenguaje["Devolver"] ?></button>
										</div>
										<!-- DENEGAR COTIZACION -->
										<div class="col-6 pl-0 pr-2 mb-1">
											<button class="btn btn-block btn-info" id="btn_den_cot" data-toggle="modal" data-target="#denegar_cotizacion_conf"><?php echo $lenguaje["Denegar"] ?></button>
										</div>
										<!-- APROBAR COTIZACION -->
										<div class="col-12 pl-0 pr-2">
											<button class="btn btn-block btn-info" id="btn_apr_cot"><?php echo $lenguaje["Aprobar"] ?></button>
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
			<!-- MODAL DENEGAR COTIZACION -->
			<div class="modal fade" id="denegar_cotizacion_conf" tabindex="-1" role="dialog" aria-labelledby="denegar_cotizacion_conf" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_denegar_cotizacion_conf" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<div class="col-12">
									<h4 class="text-center">¿Quieres denegar esta cotización?</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-danger btn-block" id="den_cot_btn">Denegar</button>
								</div>
								<div class="col-6">
									<button class="btn btn-info btn-block" id="canc_cot_btn" data-dismiss="modal" aria-label="Cerrar">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL DE VER IMPLEMENTOS -->
			<div class="modal fade" id="implementos_list" tabindex="-1" role="dialog" aria-labelledby="implementos_list" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<button id="mod_3" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<h4 class="col-12 text-center mb-3"><?php echo $lenguaje["Implementos"] ?></h4>
								<div class="col-12" id="impl_cot_id">
									<!-- TRAER IMPLEMENTOS DE COTIZACION -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL DE VER Y ASIGNAR EMPLEADOS -->
			<div class="modal fade" id="empleados_list_2" tabindex="-1" role="dialog" aria-labelledby="empleados_list_2" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<!-- MODAL #3 -->
						<div class="card p-0">
							<div class="row">
								<div class="col-7">
									<div class="row" id="listar_empleados">
										<!-- MENU LATERAL -->
										<div class="col-5" id="empl_cot_id">
											<!-- MENU CON CARGOS -->
										</div>
										<!-- LISTA DE EMPLEADOS -->
										<div class="col-7 pl-1 pr-2" style="border-right: 2px solid #ccc;">
											<h4 class="text-center mb-3"><?php echo $lenguaje["Empleados"] ?></h4>
											<hr>
											<div class="row">
												<!-- TRAER EMPLEADOS DE COTIZACION -->
												<div class="accord" id="accordionExample2">
													<!-- TRAER EMPLEADOS -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- LISTA DE EMPLEADOS ASIGNADOS -->								
								<div class="col-5 pr-4" id="list_empl_asig">
									<h4 class="text-center mb-3"><?php echo $lenguaje["EmpleadosAsignados"] ?></h4>
									<hr>
									<div class="row">
										<!-- EMPLEADOS -->
										<div class="col-12 mb-5" id="empl_asig_list">
											<!-- EMPLEADOS ASIGNADOS -->
										</div>
									</div>
									<div class="row" style="position: absolute; bottom: 0;width: 100%;">
										<div class="col-12 pr-4 pb-1">
											<button id="mod_5" class="btn btn-block btn-info" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"><?php echo $lenguaje["Cerrar"] ?></span></button>
										</div>
									</div>
								</div>
							</div>
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
	<!-- SCRIPTS COTIZACIONES -->
	<script src="json/scriptsCotizaciones.js"></script>
</body>
</html>