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
	&& isset($_POST['nombre'])
	&& isset($_POST['tipo'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['costo'])) {

	$pagina = numero($_POST['consulta']);
	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$tipo = limpiarDatos($_POST['tipo']);
	$cantidad = limpiarDatos($_POST['cantidad']);
	$costo = limpiarDatos($_POST['costo']);

	$fila = traerInventario($conexion, $pagina, $id, $nombre, $tipo, $cantidad, $costo);

	if (!empty($fila)) {
		foreach ($fila as $val) {
			$salida .= '<tr>
							<td>'. $val[0] .'</td>
							<td>'. $val[1] .'</td>
							<td>'. $val[2] .'</td>
							<td>'. $val[3] .'</td>
							<td>'. $val[4] .'</td>
							<td>
								<button class="btn btn-danger btn-sm py-1 eliminar" data-toggle="modal" data-target="#eliminar" value="'. $val[0] .'">
									<i class="icon-minus"></i>
								</button>
								<button class="btn btn-info btn-sm py-1 editar" data-toggle="modal" data-target="#modificar" value="'. $val[0] .'">
									<i class="icon-cog"></i>
								</button>
							</td>
						</tr>';
		}


	} else {
		$salida .= 'Error de datos';
	}
}

echo $salida;
?>