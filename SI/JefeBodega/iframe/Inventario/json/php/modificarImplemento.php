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
	&& isset($_POST['nombre'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['costo'])
	&& isset($_POST['tipo'])) {

	$id = numero($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$cantidad = numero($_POST['cantidad']);
	$costo = numero($_POST['costo']);
	$tipo = numero($_POST['tipo']);
	modificarImplemento($conexion, $id, $nombre, $cantidad, $costo, $tipo);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;
?>