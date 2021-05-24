<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: '.RUTA.'config/error.php');
	die();
}
$salida = '';
if (isset($_POST['consulta'])) {
	$tipo = numero($_POST['consulta']);
	$id = obtenerRutaTipoLugar($conexion, $tipo);
	setcookie('ruta_lugar', $id, time() + 60 * 60, '/');
	$salida.='Exito';
} else {
	$salida .= 'Error';
}

echo $salida;
?>