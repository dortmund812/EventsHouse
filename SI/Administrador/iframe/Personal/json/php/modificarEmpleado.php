<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['id'])
	&& isset($_POST['estado'])
	&& isset($_POST['aspirante'])
	&& isset($_POST['rol'])) {

	$id = numero($_POST['id']);
	$estado = numero($_POST['estado']);
	$aspirante = numero($_POST['aspirante']);
	$rol = numero($_POST['rol']);

	modificarEmpleado($conexion, $id, $estado, $aspirante, $rol);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>