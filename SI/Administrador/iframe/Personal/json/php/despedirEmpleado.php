<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['consulta'])) {
	$id = numero($_POST['consulta']);

	despedirEmpleado($conexion, $id);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>