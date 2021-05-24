<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['nombre'])
	&& isset($_POST['tipo'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['costo'])) {

	$nombre = limpiarDatos($_POST['nombre']);
	$tipo = numero($_POST['tipo']);
	$cantidad = numero($_POST['cantidad']);
	$costo = numero($_POST['costo']);

	registrarImplemento($conexion, $nombre, $cantidad, $costo, $tipo);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>