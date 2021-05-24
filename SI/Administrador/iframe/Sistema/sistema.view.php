<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Sistema</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- TABLA DE EVENTOS -->
			<div class="col-12 col-sm-3 p-1">
				<table class="table table-sm table-striped table-bordered table-responsive-md mb-0">
					<thead class="bg-info text-white text-center">
						<tr>
							<h6 class="bg-dark text-white mb-0 p-1 px-3 d-flex justify-content-between align-items-center">
								<span><?php echo $lenguaje["Eventos"] ?></span>
								<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#agregar_eventos">
									<i class="icon-plus"></i>
								</button>
							</h6>
						</tr>
						<tr>
							<td>ID</td>
							<td><?php echo $lenguaje["Evento"] ?></td>
							<td><i class="icon-more-horizontal"></i></td>
						</tr>
					</thead>
					<tbody class="text-center" id="tbody_eventos">
						<!-- TRAER EVENTOS -->
					</tbody>
				</table>
				<div class="w-100 bg-dark d-flex justify-content-center" id="paginacion_eventos">
					<!-- TRAER PAGINACION DE EVENTOS -->
				</div>
			</div>
			<!-- TABLA LUGARES -->
			<div class="col-12 col-sm-6 p-1">
				<table class="table table-sm table-striped table-bordered table-responsive-md mb-0">
					<thead class="bg-info text-white text-center">
						<tr>
							<h6 class="bg-dark text-white mb-0 p-1 px-3 d-flex justify-content-between align-items-center">
								<span><?php echo $lenguaje["Lugar"] ?></span>
								<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#agregar_lugares">
									<i class="icon-plus"></i>
								</button>
							</h6>
						</tr>
						<tr>
							<td>ID</td>
							<td><?php echo $lenguaje["Nombre"] ?></td>
							<td><?php echo $lenguaje["Direccion"] ?></td>
							<td><i class="icon-more-horizontal"></i></td>
						</tr>
					</thead>
					<tbody class="text-center" id="tbody_lugares">
						<!-- TRAER LUGARES -->
					</tbody>
				</table>
				<div class="w-100 bg-dark d-flex justify-content-center" id="paginacion_lugares">
					<!-- TRAER PAGINACION LUGARES -->
				</div>
			</div>
			<!-- TABLA DE TEMATICAS -->
			<div class="col-12 col-sm-3 p-1">
				<table class="table table-sm table-striped table-bordered table-responsive-md mb-0">
					<thead class="bg-info text-white text-center">
						<tr>
							<h6 class="bg-dark text-white mb-0 p-1 px-3 d-flex justify-content-between align-items-center">
								<span><?php echo $lenguaje["Tematica"] ?></span>
								<!-- SUBIR ARCHIVO XLSX A LA BASE DE DATOS -->
								<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#subir_xlsx">
									<i class="icon-file-excel"></i>
								</button>
							</h6>
						</tr>
						<tr>
							<td>ID</td>
							<td><?php echo $lenguaje["Tematica"] ?></td>
							<td><i class="icon-more-horizontal"></i></td>
						</tr>
					</thead>
					<tbody class="text-center" id="tbody_tematicas">
						<!-- TRAER TEMATICAS -->
					</tbody>
				</table>
				<div class="w-100 bg-dark d-flex justify-content-center" id="paginacion_tematicas">
					<!-- TRAER PAGINACION TEMATICAS -->
				</div>
			</div>
			<!-- TABLA DE USUARIOS -->
			<div class="col-12 p-1">
				<table class="table table-sm table-striped table-bordered table-responsive-md mb-0">
					<thead class="bg-info text-white text-center">
						<tr>
							<h6 class="bg-dark text-white mb-0 p-1 px-3 d-flex justify-content-between align-items-center">
								<span><?php echo $lenguaje["Usuario"] ?></span>
							</h6>
						</tr>
						<tr>
							<td>ID</td>
							<td><?php echo $lenguaje["Nombre"] ?></td>
							<td><?php echo $lenguaje["Correo"] ?></td>
							<td><?php echo $lenguaje["Telefono"] ?></td>
							<td><?php echo $lenguaje["Cedula"] ?></td>
							<td><?php echo $lenguaje["Rol"] ?></td>
							<td><?php echo $lenguaje["Estado"] ?></td>
						</tr>
					</thead>
					<tbody class="text-center" id="tbody_usuarios">
						<!-- TRAER USUARIOS -->
					</tbody>
				</table>
				<div class="w100 bg-dark d-flex justify-content-center" id="paginacion_usuarios">
					<!-- TRAER PAGINACION USUARIOS -->
				</div>
			</div>
			<!-- MODAL ELIMINAR TEMATICA -->
			<div class="modal fade" id="eliminar_tematica_modal" tabindex="-1" role="dialog" aria-labelledby="eliminar_tematica_modal" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_eliminar_tematica_modal" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<div class="col-12">
									<h4 class="text-center">¿Quieres eliminar la tematica?</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-danger btn-block" id="elim_tem_btn">Eliminar</button>
								</div>
								<div class="col-6">
									<button class="btn btn-info btn-block" id="canc_tem_btn" data-dismiss="modal" aria-label="Cerrar">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL DE AGREGAR TEMATICAS -->
			<div class="modal fade" id="subir_xlsx" tabindex="-1" role="dialog" aria-labelledby="subir_xlsx" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<button id="cerrar_xlsx" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body" style="min-height: 400px;">
							<div class="row">
								<h4 class="col-12 text-center mb-3">Subir Archivo</h4>
								<div class="col-12" id="sub_arch_xlsx">
									<!-- SUBIR ARCHIVO -->
									<div class="row">
										<!-- INPUTS XLSX -->
										<div class="col-9">
											<div class="input-group">
												<div class="input-group-append">
													<label for="btn_subir_xlsx" class="btn btn-info m-0">
														<i class="icon-file-excel"></i>
													</label>
												</div>
												<input type="file" accept=".xlsx" name="btn_subir_xlsx" id="btn_subir_xlsx" class="" style="width: -1px;height: -1px;position: absolute;top: 0;left: 0;opacity: 0;z-index: -1;">
												<input type="text" class="form-control" placeholder="Nombre del archivo" id="name_xlsx">
											</div>
										</div>
										<!-- INPUT SUBMIT -->
										<div class="col-3">
											<input type="submit" id="btn_sub_arch_xlsx" value="Subir" class="btn btn-block btn-info">
										</div>
									</div>
									<!-- VISTA PREVIA -->
									<div class="row mt-2">
										<div class="col-12">
											<table class="table table-striped table-sm table-bordered table-responsive-md">
												<thead class="bg-info text-white text-center">
													<tr>
														<td>Tematica</td>
														<td>Costo</td>
													</tr>
												</thead>
												<tbody id="tbody_xlsx" class="text-center">
													<!-- TRAER VISTA PREVIA -->
													<tr>
														<td>Sin Datos</td>
														<td>Sin Datos</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL DE AGREGAR EVENTOS -->
			<div class="modal fade" id="agregar_eventos" tabindex="-1" role="dialog" aria-labelledby="agregar_eventos" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<button id="cerrar_agregar_eventos" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body" style="min-height: 400px;">
							<form action="">
								<!-- TIPO DE EVENTO -->
								<div class="form-group">
									<label for="tipo_evento">Tipo de Evento*</label>
									<input type="text" id="tipo_evento" class="form-control" placeholder="Tipo de evento" autocomplete="off">
								</div>
								<!-- IMAGEN TIPO DE EVENTO -->
								<div class="form-group">
									<label for="img_tipo_evento">Imagen del evento*</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<label for="img_tipo_evento" class="btn btn-info mb-0">
												<i class="icon-plus"></i>
											</label>
											<input type="file" accept=".jpg,.jpeg,.png" name="img_tipo_evento" id="img_tipo_evento" style="width: -1px;height: -1px;position: absolute;left: 0;top: 0;opacity: 0;z-index: -1;">
										</div>
										<input type="text" placeholder="Imagen" class="form-control" id="nom_img_tipo_evento" disabled="true">
									</div>
								</div>
								<!-- IMAGEN CARD TIPO DE EVENTO -->
								<div class="form-group">
									<label for="img_tipo_evento_card">Imagen del evento* (Card)</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<label for="img_tipo_evento_card" class="btn btn-info mb-0">
												<i class="icon-plus"></i>
											</label>
											<input type="file" accept=".jpg,.jpeg,.png" name="img_tipo_evento_card" id="img_tipo_evento_card" style="width: -1px;height: -1px;position: absolute;left: 0;top: 0;opacity: 0;z-index: -1;">
										</div>
										<input type="text" placeholder="Imagen Card" class="form-control" id="nom_img_tipo_evento_card" disabled="true">
									</div>
								</div>
								<!-- EXTRACTO EVENTO -->
								<div class="form-group">
									<label for="extracto_evento">Extracto de Evento*</label>
									<textarea name="extracto_evento" id="extracto_evento" class="form-control" placeholder="Extracto" style="min-height: 70px;max-height: 70px;"></textarea>
								</div>
								<!-- CCOSTO EVENTO -->
								<div class="form-group">
									<label for="costo_evento">Costo del evento* (Por persona)</label>
									<input type="text" class="form-control" name="costo_evento" id="costo_evento" placeholder="Costo del evento (Por persona)" autocomplete="off">
								</div>
								<p class="text-danger" id="mens_err_agr_eve"></p>
								<!-- ENVIAR -->
								<div class="form-group mb-0">
									<input type="submit" value="Agregar" class="btn btn-info btn-block" id="agregar_evento">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL ELIMINAR EVENTOS -->
			<div class="modal fade" id="eliminar_evento_modal" tabindex="-1" role="dialog" aria-labelledby="eliminar_evento_modal" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_eliminar_evento_modal" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<div class="col-12">
									<h4 class="text-center">¿Quieres eliminar el evento "<span id="tit_eve_elim"></span>"?</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-danger btn-block" id="elim_eve_btn">Eliminar</button>
								</div>
								<div class="col-6">
									<button class="btn btn-info btn-block" id="canc_eve_btn" data-dismiss="modal" aria-label="Cerrar">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL DE AGREGAR LUGARES -->
			<div class="modal fade" id="agregar_lugares" tabindex="-1" role="dialog" aria-labelledby="agregar_lugares" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<button id="cerrar_agregar_lugares" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<form action="" class="row">
								<!-- NOMBRE DEL LUGAR -->
								<div class="col-12 form-group">
									<label for="nom_lug" class="mb-0 pl-1">Nombre del lugar*</label>
									<input type="text" name="nom_lug" id="nom_lug" class="form-control" placeholder="Nombre del lugar">
								</div>
								<!-- TIPO DE LUGAR -->
								<div class="col-12 form-group">
									<label for="tip_lug" class="mb-0 pl-1">Tipo de lugar*</label>
									<select name="tip_lug" id="tip_lug" class="form-control">
										<!-- AGREGAR TIPOS DE LUGARES -->
									</select>
								</div>
								<!-- IMAGEN DEL LUGAR -->
								<div class="col-12 form-group">
									<input type="file" accept=".jpg,.jpeg,.png" name="img_lug" id="img_lug" style="width: -1px;height: -1px;position: absolute;left: 0;top: 0;opacity: 0;z-index: -1;" disabled="true">
									<label for="img_lug" class="mb-0 pl-1">Imgagen del lugar*</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<label for="img_lug" id="lbl_img_lug" class="btn btn-info mb-0 disabled">
												<i class="icon-plus"></i>
											</label>
										</div>
										<input type="text" class="form-control" id="nom_img_lug" placeholder="Imagen" disabled="true">
									</div>
								</div>
								<!-- DIRECCION DEL LUGAR -->
								<div class="col-12 form-group">
									<label for="direc_lug" class="mb-0 pl-1">Dirección del lugar*</label>
									<input type="text" class="form-control" id="direc_lug" placeholder="Dirección del lugar">
								</div>
								<!-- DESCRIPCION DEL LUGAR -->
								<div class="col-12 form-group">
									<label for="desc_lug" class="mb-0 pl-1">Descripción del lugar*</label>
									<textarea name="desc_lug" id="desc_lug" class="form-control" placeholder="Descripción del lugar" style="min-height: 70px;max-height: 70px;"></textarea>
								</div>
								<!-- COSTO -->
								<div class="col-12 form-group">
									<label for="cost_lug" class="mb-0 pl-1">Costo del lugar*</label>
									<input type="text" name="cost_lug" id="cost_lug" class="form-control" placeholder="Costo del lugar">
								</div>
								<div class="col-12">
									<p class="text-danger" id="men_err_agr_lug"></p>
								</div>
								<!-- ENVIAR DATOS -->
								<div class="col-12">
									<input type="submit" value="Agregar" name="agr_lug" id="agr_lug" class="btn btn-info btn-block">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL ELIMINAR LUGARES -->
			<div class="modal fade" id="eliminar_lugar_modal" tabindex="-1" role="dialog" aria-labelledby="eliminar_lugar_modal" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<button id="cerrar_eliminar_lugar_modal" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
							<!-- MODAL #2 -->
						<div class="card card-body">
							<div class="row">
								<div class="col-12">
									<h4 class="text-center">¿Quieres eliminar el Lugar "<span id="tit_lug_elim"></span>"?</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-danger btn-block" id="elim_lug_btn">Eliminar</button>
								</div>
								<div class="col-6">
									<button class="btn btn-info btn-block" id="canc_lug_btn" data-dismiss="modal" aria-label="Cerrar">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BOOTSTARP -->
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPT EVENTOS -->
	<script src="json/scriptsSistema.js"></script>
</body>
</html>