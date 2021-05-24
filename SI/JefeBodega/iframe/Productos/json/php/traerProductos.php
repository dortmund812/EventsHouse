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
	&& isset($_POST['implemento'])
	&& isset($_POST['tipo'])
	&& isset($_POST['cotizacion'])
	&& isset($_POST['evento'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['costo'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$implemento = limpiarDatos($_POST['implemento']);
	$tipo = limpiarDatos($_POST['tipo']);
	$cotizacion = limpiarDatos($_POST['cotizacion']);
	$evento = limpiarDatos($_POST['evento']);
	$cantidad = limpiarDatos($_POST['cantidad']);
	$costo = limpiarDatos($_POST['costo']);
	$estado = limpiarDatos($_POST['estado']);

	$pagina = numero($_POST['consulta']);
	$resultado = traerProductos($conexion, $pagina, $id, $implemento, $tipo, $cotizacion, $evento, $cantidad, $costo, $estado);
	if (!empty($resultado)) {
		foreach ($resultado as $val) {
			if ($val[7] == 'Agregado') {
				$salida .= '<tr>
								<td>'. $val[0] .'</td>
								<td>'. $val[1] .'</td>
								<td>'. $val[2] .'</td>
								<td>'. $val[3] .'</td>
								<td>'. $val[4] .'</td>
								<td>'. $val[5] .'</td>
								<td>'. $val[6] .'</td>
								<td>'. $val[7] .'</td>
								<td>
									<button class="btn btn-danger btn-sm py-1 eliminar" data-toggle="modal" data-target="#eliminar" value="'. $val[0] .'">
										<i class="icon-minus"></i>
									</button>
									<button class="btn btn-info btn-sm py-1 editar" data-toggle="modal" data-target="#modificar" value="'. $val[0] .'">
										<i class="icon-cog"></i>
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
								<td>'. $val[7] .'</td>
								<td>
									<button class="btn btn-danger btn-sm py-1 eliminar disabled" data-toggle="modal" data-target="#eliminar" value="'. $val[0] .'" disabled="true">
										<i class="icon-minus"></i>
									</button>
									<button class="btn btn-info btn-sm py-1 editar" data-toggle="modal" data-target="#modificar" value="'. $val[0] .'">
										<i class="icon-cog"></i>
									</button>
								</td>
							</tr>';
			}
		}
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo $salida;
?>