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
	if (isset($_SESSION)) {
		$alerta = validarAlertas($conexion, $_SESSION['usuario']);
		if (!empty($alerta)) {
			$salida = $alerta;
		} else {
			$salida = array();
		}
	}
}

echo json_encode($salida);

?>