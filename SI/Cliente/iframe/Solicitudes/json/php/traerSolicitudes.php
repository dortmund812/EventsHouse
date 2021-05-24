<?php session_start();
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
}
$salida = '';
if (isset($_POST['consulta'])
	&& isset($_POST['evento'])
	&& isset($_POST['titulo'])
	&& isset($_POST['fecha'])
	&& isset($_POST['tematica'])
	&& isset($_POST['lugar'])
	&& isset($_POST['estado'])) {

	$evento = limpiarDatos($_POST['evento']);
	$titulo = limpiarDatos($_POST['titulo']);
	$fecha = limpiarDatos($_POST['fecha']);
	$tematica = limpiarDatos($_POST['tematica']);
	$lugar = limpiarDatos($_POST['lugar']);
	$estado = limpiarDatos($_POST['estado']);

	$usuario = $_SESSION['usuario'];
	$pagina = numero($_POST['consulta']);
	$resultado = traerSolicitudesCliente($conexion, $usuario, $pagina, $evento, $titulo, $fecha, $tematica, $lugar, $estado);
	if (!empty($resultado)) {
		foreach ($resultado as $valor) {
			$salida .= '<tr>
							<td>' . $valor[1] . '</td>
							<td>' . $valor[2] . '</td>
							<td>' . fecha($valor[3]) . '</td>
							<td>' . $valor[4] . '</td>
							<td>' . $valor[5] . '</td>
							<td>' . $valor[6] . '</td>
							<td>
								<a href="" id="" data-toggle="modal" data-target="#ingresar">
									<i class="icon-eye btn btn-info text-dark ver-mas" id="' . $valor[0] . '"></i>
								</a>
							</td>
						</tr>';
		}
	} else {
		$salida .= '<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>No hay solicitudes</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>';
	}
}

echo $salida;

?>