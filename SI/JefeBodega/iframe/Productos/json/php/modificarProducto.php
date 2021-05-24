<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['id'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['implemento'])) {

	$id = numero($_POST['id']);
	$cantidad = numero($_POST['cantidad']);
	$implemento = numero($_POST['implemento']);

	$costo = calcularCostoProducto($conexion, $implemento, $cantidad);

	modificarProducto($conexion, $id, $cantidad, $implemento, $costo);
	
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;
?>