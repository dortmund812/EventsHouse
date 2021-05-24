<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$id = numero($_POST['consulta']);
	eliminarProducto($conexion, $id);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>