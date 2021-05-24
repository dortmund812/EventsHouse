<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

header('Content-type: application/json; charset=utf-8');

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
		$id = numero($_POST['consulta']);
		$resultado = eliminarNotificacion($conexion,$id);
		$salida .= 'Exito';
} else {
	$salida .= 'Error';
}


echo $salida;

?>