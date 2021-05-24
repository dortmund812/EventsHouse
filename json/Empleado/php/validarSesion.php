<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$salida = '';

$sesion = sesionEmpleado();

if (isset($_POST['consulta'])) {
	if ($sesion == true) {
		$salida .= 'OK';
	} else {
		$salida .= 'ERROR';
	}
}

echo $salida;
?>