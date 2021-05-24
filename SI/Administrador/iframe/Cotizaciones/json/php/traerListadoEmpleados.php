<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['consulta'])) {
	$cotizacion = numero($_POST['consulta']);
	$fila = traerCargos($conexion);

	if (!empty($fila)) {
		$salida .= '<div class="col-5" id="empl_cot_id">
						<div class="nav bg-dark">';
			foreach ($fila as $val) {
				$salida .= '<a href="" class="w-100 text-center py-2 nav-link car_link" data-toggle="collapse" data-target="#cargo' . $val[0] . '" aria-expanded="true" aria-controls="cargo' . $val[0] . '">' . $val[1] . '</a>';
			}
		$salida .= '	</div>
					</div>
					<!-- LISTA DE EMPLEADOS -->
					<div class="col-7 pl-1 pr-2" style="border-right: 2px solid #ccc;">
						<h4 class="text-center mb-3">Empleados</h4>
						<hr>
						<div class="row">
							<!-- TRAER EMPLEADOS DE COTIZACION -->
							<div class="accord" id="accordionExample2">';
							foreach ($fila as $valorn) {
								$cargo = $valorn[0];
								$personal = traerEmpleadosCargo($conexion, $cargo);
								$salida .= '<!-- EMPLEADOS -->
											<div class="col-12">
												<div id="cargo' . $valorn[0] . '" class="collapse" aria-labelledby="header' . $valorn[0] . '" data-parent="#accordionExample2">';
								if (empty($personal)) {
									$salida .= '
												<div class="input-group mb-1">
													<input type="text" class="form-control" placeholder="Asignar Empleados" value="No hay empleados de este cargo" disabled="true" style="background: none;">
													<div class="input-group-append">
														<button class="btn btn-info id_empl_asg" value="" disabled="true">
															<i class="icon-minus text-white"></i>
														</button>
													</div>
												</div>';
								} else {
									foreach ($personal as $value) {
										$comprobar = traerAsignacionEmpleados($conexion, $value[0], $cotizacion);
										if (!empty($comprobar)) {
											$salida .= '
																<div class="input-group mb-1">
																	<input type="text" class="form-control" placeholder="Asignar Empleados" value="' . $value[1] . ' ' . $value[2] . '" disabled="true" style="background: none;">
																	<div class="input-group-append">
																		<button class="btn btn-info id_empl_asg" value="' . $value[0] . '" disabled="true" id="asp' . $value[0] . '">
																			<i class="icon-minus text-white"></i>
																		</button>
																	</div>
																</div>';
										} else {
											$salida .= '
																<div class="input-group mb-1">
																	<input type="text" class="form-control" placeholder="Asignar Empleados" value="' . $value[1] . ' ' . $value[2] . '" disabled="true" style="background: none;">
																	<div class="input-group-append">
																		<button class="btn btn-info id_empl_asg" value="' . $value[0] . '" id="asp' . $value[0] . '">
																			<i class="icon-plus text-white"></i>
																		</button>
																	</div>
																</div>';
										}
									}
								}
								$salida .= '	</div>
											</div>';
							}
		$salida .= '						
											</div>
										</div>
									</div>';
	} else {
		$salida .= 'Error de datos';
	}
}

echo $salida;
?>