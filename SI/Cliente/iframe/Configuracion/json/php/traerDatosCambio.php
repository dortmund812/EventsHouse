<?php session_start();
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (isset($_SESSION) && $_SESSION['rol'] == 'Cliente') {
		$correo = $_SESSION['usuario'];
		$salida = traerDatosCambio($conexion, $correo);
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo json_encode($salida);

?>