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
	&& isset($_POST['apellido'])
	&& isset($_POST['cargo'])
	&& isset($_POST['honorarios'])
	&& isset($_POST['telefono'])
	&& isset($_POST['correo'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$apellido = limpiarDatos($_POST['apellido']);
	$cargo = limpiarDatos($_POST['cargo']);
	$honorarios = limpiarDatos($_POST['honorarios']);
	$telefono = limpiarDatos($_POST['telefono']);
	$correo = limpiarDatos($_POST['correo']);

	$pagina = numero($_POST['consulta']);
	$fila = traerPersonalAdmin($conexion, $pagina, $id, $nombre, $apellido, $cargo, $honorarios, $telefono, $correo);

	if (!empty($fila)) {
		foreach ($fila as $val) {
			$salida .= '<tr>
							<td>'. $val[0] .'</td>
							<td>'. $val[1] .'</td>
							<td>'. $val[2] .'</td>
							<td>'. $val[3] .'</td>
							<td>'. $val[4] .'</td>
							<td>'. $val[5] .'</td>
							<td>'. $val[6] .'</td>
							<td>
								<button class="btn btn-success btn-sm py-1 editar" data-toggle="modal" data-target="#modificar" value="'. $val[0] .'">
									<i class="icon-plus"></i>
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