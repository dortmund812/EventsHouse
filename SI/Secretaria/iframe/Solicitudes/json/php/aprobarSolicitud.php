<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}

if (isset($_POST['consulta'])
	&& isset($_POST['costo'])) {
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$id = numero($_POST['consulta']);
	$costo = numero($_POST['costo']);
	$salida = aprobarSolicitud($conexion, $id, $costo);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>