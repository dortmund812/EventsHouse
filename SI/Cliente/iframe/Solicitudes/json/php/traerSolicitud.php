<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}

if (isset($_POST['consulta'])) {
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$id = numero($_POST['consulta']);
	$salida = traerSolicitudID($conexion, $id);
} else {
	empty($resultado);
}

echo json_encode($salida);

?>