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
	&& isset($_POST['rol'])
	&& isset($_POST['fecha'])
	&& isset($_POST['correo'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$apellido = limpiarDatos($_POST['apellido']);
	$rol = limpiarDatos($_POST['rol']);
	$fecha = limpiarDatos($_POST['fecha']);
	$correo = limpiarDatos($_POST['correo']);
	$estado = limpiarDatos($_POST['estado']);

	$pagina = numero($_POST['consulta']);
	$fila = traerEmpleadosSecretaria($conexion, $pagina, $id, $nombre, $apellido, $rol, $fecha, $correo, $estado);

	if (!empty($fila)) {
		foreach ($fila as $val) {
			$salida .= '<tr>
			<td id="">'. $val[0] .'</td>
			<td id="">'. $val[1] .'</td>
			<td id="">'. $val[2] .'</td>
			<td id="">'. $val[3] .'</td>
			<td id="">'. fecha($val[4]) .'</td>
			<td id="">'. $val[5] .'</td>
			<td id="">'. $val[6] .'</td>
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