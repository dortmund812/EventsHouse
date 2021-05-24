<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$salida .= fecha($_POST['consulta']);
} else {
	$salida .= 'false';
}

echo $salida;

 ?>