<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA; ?>css/Icomoon/style.css">
	<title>Eventos</title>
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
						<td><input autocomplete="off" type="text" id="tit_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Eventos"] ?>"></td>
						<td><input autocomplete="off" type="text" id="eve_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Fecha"] ?>"></td>
						<td><input autocomplete="off" type="text" id="tem_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Tematica"] ?>"></td>
						<td><span id="lbl_fec"><?php echo $lenguaje["Fecha"] ?></span><input type="date" id="fec_busq" class="form-control text-center m-0 p-0 d-none"></td>
						<td><input autocomplete="off" type="text" id="lug_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Lugar"] ?>"></td>
						<td><input autocomplete="off" type="text" id="est_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Estado"] ?>"></td>
						<td><span id="incon_search" class="btn btn-outline-light py-0" style="cursor: pointer;"><i class="icon-search mr-2"></i><?php echo $lenguaje["Buscar"] ?></span></td>
					</tr>
				</thead>
				<tbody class="text-center" id="tbody">
					<!-- DATOS DE SOLICITUDES -->
				</tbody>
			</table>
			<div class="col-12 d-flex justify-content-center fixed-bottom bg-dark mb-0 pb-0" id="paginacionAspirantes">
				<!-- PAGINACION -->
			</div>
			<div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresar" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content modal-content-ingreso">
						<button id="mod_2" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true"></span></button>
						<div class="card card-body pb-2">
							<form action="">
								<!-- INFORMACION DE LA SOLICITUD -->
								<div class="row" id="formulario_solicitud">
									<!-- ID -->
									<div class="col-3 pr-0 form-group">
										<label for="" class="m-0 px-1">ID</label>
										<input type="text" value="" class="form-control" id="id" disabled="true">
									</div>
									<!-- FECHA -->
									<div class="col-3 px-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Fecha"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="fecha">
									</div>
									<!-- EVENTO -->
									<div class="col-3 px-0 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Evento"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="evento">
									</div>
									<!-- ESTADO -->
									<div class="col-3 pl-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Estado"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="estado">
									</div>
									<!-- USUARIO -->
									<div class="col-6 pr-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Usuario"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="usuario">
									</div>
									<!-- ANFITRION -->
									<div class="col-6 pl-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Anfitrion"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="anfitrion">
									</div>
									<!-- TEMATICA -->
									<div class="col-4 pr-0 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Tematica"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="tematica">
									</div>
									<!-- LUGAR -->
									<div class="col-4 px-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Lugar"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="lugar">
									</div>
									<!-- CANTIDAD DE PERSONAS -->
									<div class="col-4 pl-0 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Personas"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="personas">
									</div>
									<!-- BANQUETE -->
									<div class="col-12 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Banquete"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="banquete">
									</div>
									<!-- FORMALIDAD -->
									<div class="col-6 pr-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Formalidad"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="formalidad">
									</div>
									<!-- RECORDATORIOS -->
									<div class="col-6 pl-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Recordatorios"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="recordatorios">
									</div>
									<!-- COSTO MINIMO -->
									<div class="col-6 pr-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Titulo"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="costoMinimo">
									</div>
									<!-- COSTO MAXIMO -->
									<div class="col-6 pl-1 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Costo"] ?></label>
										<input type="text" value="" class="form-control" disabled="true" id="costoMaximo">
									</div>
									<!-- COMENTARIOS -->
									<div class="col-12 form-group">
										<label for="" class="m-0 px-1"><?php echo $lenguaje["Comentarios"] ?></label>
										<textarea name="" id="comentarios" class="form-control" placeholder="Comentarios: " disabled="true" style="min-height: 50px;max-height: 80px;"></textarea>
									</div>
									<!-- APROBAR O DENEGAR COTIZACION -->
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-6 pr-1">
												<button class="btn btn-block btn-info disablied" disabled="true" id="btn_cancel_cot"><?php echo $lenguaje["Cancelar"] ?></button>
											</div>
											<div class="col-6 pl-1">
												<button class="btn btn-block btn-info disabled" disabled="true" id="btn_aprov_cot"><?php echo $lenguaje["Aprobar"] ?></button>
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
	</div>
	
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS EVENTOS -->
	<script src="json/scriptsEventos.js"></script>
</body>
</html>