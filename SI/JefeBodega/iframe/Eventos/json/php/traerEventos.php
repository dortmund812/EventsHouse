<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['evento'])
	&& isset($_POST['tipo'])
	&& isset($_POST['costo'])
	&& isset($_POST['lugar'])
	&& isset($_POST['usuario'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$evento = limpiarDatos($_POST['evento']);
	$tipo = limpiarDatos($_POST['tipo']);
	$costo = limpiarDatos($_POST['costo']);
	$lugar = limpiarDatos($_POST['lugar']);
	$usuario = limpiarDatos($_POST['usuario']);
	$estado = limpiarDatos($_POST['estado']);


	$pagina = numero($_POST['consulta']);
	$fila = traerEventosJefe($conexion, $pagina, $id, $evento, $tipo, $costo, $lugar, $usuario, $estado);

	if (!empty($fila)) {
		foreach ($fila as $val) {
			if ($val[6] == 'Pre-Aprobado') {
				$salida .= '<tr>
								<td>'. $val[0] .'</td>
								<td>'. $val[1] .'</td>
								<td>'. $val[2] .'</td>
								<td>'. $val[3] .'</td>
								<td>'. $val[4] .'</td>
								<td>'. $val[5] .'</td>
								<td>'. $val[6] .'</td>
								<td>
									<button class="btn btn-success py-1 disabled" data-toggle="modal" data-target="#modificar" value="" disabled="true">
										<i class="icon-checkmark"></i>
									</button>
								</td>
							</tr>';
			} else {
				$salida .= '<tr>
								<td>'. $val[0] .'</td>
								<td>'. $val[1] .'</td>
								<td>'. $val[2] .'</td>
								<td>'. $val[3] .'</td>
								<td>'. $val[4] .'</td>
								<td>'. $val[5] .'</td>
								<td>'. $val[6] .'</td>
								<td>
									<button class="btn btn-success py-1 editar" data-toggle="modal" data-target="#modificar" value="'. $val[0] .'">
										<i class="icon-plus"></i>
									</button>
								</td>
							</tr>';
			}
		}


	} else {
		$salida .= 'Error de datos';
	}
}

echo $salida;
?>