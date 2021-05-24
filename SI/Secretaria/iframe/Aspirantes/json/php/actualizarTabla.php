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
	&& isset($_POST['correo'])
	&& isset($_POST['telefono'])
	&& isset($_POST['cedula'])
	&& isset($_POST['cargo'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$correo = limpiarDatos($_POST['correo']);
	$telefono = limpiarDatos($_POST['telefono']);
	$cedula = limpiarDatos($_POST['cedula']);
	$cargo = limpiarDatos($_POST['cargo']);
	$estado = limpiarDatos($_POST['estado']);

	$pagina = numero($_POST['consulta']);
	$fila = traerAspirantesSecretaria($conexion, $pagina, $id, $nombre, $correo, $telefono, $cedula, $cargo, $estado);

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
			<a href="" id="" data-toggle="modal" data-target="#ingresar">
			<i class="icon-eye btn btn-info text-dark ver-mas" id="'. $val[0] .'"></i>
			</a>
			</td>
			</tr>';
		}


	} else {
		$salida .= 'Error de datos';
	}
}

echo $salida;
?>