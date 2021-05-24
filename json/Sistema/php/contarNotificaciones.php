<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

header('Content-type: application/json; charset=utf-8');

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (!empty($_SESSION)) {
		$correo = $_SESSION['usuario'];
		$usuario = obtenerReceptor($conexion, $correo);
		$cantidad = contarNotificaciones($conexion, $usuario[0]);
		$salida = $cantidad;
	} else {
		$salida .= '0';
	}
} else {
	$salida .= 'Error';
}


echo $salida;

?>