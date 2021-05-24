<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (!empty($_SESSION)) {
		$salida .= 'true';
	} else {
		$salida .= 'false';
	}
} else {
	$salida .= 'false';
}

echo $salida;

 ?>