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
	&& isset($_POST['fecha'])
	&& isset($_POST['evento'])
	&& isset($_POST['tematica'])
	&& isset($_POST['lugar'])
	&& isset($_POST['usuario'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$fecha = limpiarDatos($_POST['fecha']);
	$evento = limpiarDatos($_POST['evento']);
	$tematica = limpiarDatos($_POST['tematica']);
	$lugar = limpiarDatos($_POST['lugar']);
	$usuario = limpiarDatos($_POST['usuario']);
	$estado = limpiarDatos($_POST['estado']);

	$pagina = numero($_POST['consulta']);
	$fila = traerSolicitudesSecretaria($conexion, $pagina, $id, $fecha, $evento, $tematica, $lugar, $usuario, $estado);

	if (!empty($fila)) {
		foreach ($fila as $col) {
			$salida .= '<tr>
							<td>' . $col[0] . '</td>
							<td>' . fecha($col[1]) . '</td>
							<td>' . $col[2] . '</td>
							<td>' . $col[3] . '</td>
							<td>' . $col[4] . '</td>
							<td>' . $col[5] . '</td>
							<td>' . $col[6] . '</td>
							<td>
								<a href="" id="" data-toggle="modal" data-target="#ingresar">
									<i class="icon-eye btn btn-info text-dark ver-mas" id="' . $col[0] . '"></i>
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