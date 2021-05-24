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
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$id = numero($_POST['consulta']);
	$resultado = traerImplementosRegistrados($conexion, $id);
	foreach ($resultado as $val) {
		if ($val[4] == 'Agregado') {
			$salida .= '<div class="input-group mb-1">
						<input type="text" class="form-control" placeholder="Implemento - Cantidad - Costo" value="' . $val[2] . ' - ' . $val[1] . ' - $' . $val[3] . '" disabled="true" style="background: none;">
						<div class="input-group-append">
							<button class="btn btn-danger ret_prodc" value="' . $val[0] . '">
								<i class="icon-minus text-white"></i>
							</button>
						</div>
					</div>';
		} else {
			$salida .= '<div class="input-group mb-1">
						<input type="text" class="form-control" placeholder="Implemento - Cantidad - Costo" value="' . $val[2] . ' - ' . $val[1] . ' - $' . $val[3] . '" disabled="true" style="background: none;">
						<div class="input-group-append">
							<button class="btn btn-danger disabled" value="' . $val[0] . '" disabled="true">
								<i class="icon-minus text-white"></i>
							</button>
						</div>
					</div>';
		}
	}
} else {
	$salida .= 'Error';
}

echo $salida;

?>