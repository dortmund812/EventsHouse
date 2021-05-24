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
						<td><input autocomplete="off" type="text" id="eve_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Eventos"] ?>"></td>
						<td><span id="lbl_fec"><?php echo $lenguaje["Fecha"] ?></span><input type="date" id="fec_busq" class="form-control text-center m-0 p-0 d-none"></td>
						<td><input autocomplete="off" type="text" id="tem_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Tematica"] ?>"></td>
						<td><input autocomplete="off" type="text" id="lug_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Lugar"] ?>"></td>
						<td><input autocomplete="off" type="text" id="dir_busq" class="form-control inp_busq text-center m-0 p-0" placeholder="<?php echo $lenguaje["Direccion"] ?>"></td>
						<td><?php echo $lenguaje["Honorarios"] ?></td>
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
		</div>
	</div>
	
	<script src="<?php echo RUTA; ?>js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/popper.min.js"></script>
	<script src="<?php echo RUTA; ?>js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS EVENTOS -->
	<script src="json/scriptsEventos.js"></script>
</body>
</html>