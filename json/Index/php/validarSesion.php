<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
header('Content-type: application/json; charset=utf-8');

$conexion = conexion($base_datos);

$resultado = array('respuesta' => false);

if (!empty($_SESSION)) {
	$resultado['respuesta'] = true;
}

echo json_encode($resultado);

 ?>