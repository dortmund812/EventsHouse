<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['consulta'])) {
	$id = numero($_POST['consulta']);
	$resultado = traerProductoID($conexion, $id);
	if (!empty($resultado)) {
		$salida = $resultado;
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo json_encode($salida);
?>