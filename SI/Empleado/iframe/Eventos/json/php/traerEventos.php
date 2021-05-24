<?php session_start();
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$salida = '';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error');
	die();
}

if (isset($_POST['consulta'])
	&& isset($_POST['evento'])
	&& isset($_POST['fecha'])
	&& isset($_POST['tematica'])
	&& isset($_POST['lugar'])
	&& isset($_POST['direccion'])) {

	$evento = limpiarDatos($_POST['evento']);
	$fecha = limpiarDatos($_POST['fecha']);
	$tematica = limpiarDatos($_POST['tematica']);
	$lugar = limpiarDatos($_POST['lugar']);
	$direccion = limpiarDatos($_POST['direccion']);

	$usuario = $_SESSION['usuario'];
	$id = traerIDTrabajador($conexion, $usuario);
	$pagina = numero($_POST['consulta']);
	$resultado = traerEventosEmpleado($conexion, $pagina, $id[0], $evento, $fecha, $tematica, $lugar, $direccion);
	if (!empty($resultado)) {
		foreach ($resultado as $valor) {
			$salida .= '<tr>
							<td>' . $valor[0] . '</td>
							<td>' . fecha($valor[1]) . '</td>
							<td>' . $valor[2] . '</td>
							<td>' . $valor[3] . '</td>
							<td>' . $valor[4] . '</td>
							<td>' . $valor[5] . '</td>
							<td>' . $valor[6] . '</td>
						</tr>';
		}
	} else {
		$salida .= '<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>No hay eventos</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>';
	}
} else {
	$salida .= 'Datos Incompletos';
}

echo $salida;

?>