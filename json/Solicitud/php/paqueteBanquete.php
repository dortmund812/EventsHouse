<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$salida = obtenerBanquetesID($conexion, $_POST['consulta']);
} else {
	empty($salida);
}

echo json_encode($salida);

?>