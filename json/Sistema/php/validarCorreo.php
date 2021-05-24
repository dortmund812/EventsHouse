<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['consulta'])) {
	$correo = limpiarDatos($_POST['consulta']);
	$alerta = obtenerAlertaUsuario($conexion, $correo);
	if (!empty($alerta)) {
		$salida .= 'Exito';
	} else {
		$salida .= 'Error';
	}
}

echo $salida;

?>