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
	devolverCotizacion($conexion, $id);
	devolverProductosCotizacion($conexion, $id);
	enviarAlerta($conexion, 'Devolución de cotización', 'Por favor revisar nuevamente la asignación de materiales de la cotización devuelta.', 2);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>