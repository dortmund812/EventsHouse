<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: '.RUTA.'config/error.php');
	die();
}
$salida = '';
if (isset($_POST['nombre'])
	&& isset($_POST['tipo'])
	&& isset($_POST['imagen'])
	&& isset($_POST['direccion'])
	&& isset($_POST['descripcion'])
	&& isset($_POST['costo'])) {
	
	$nombre = limpiarDatos($_POST['nombre']);
	$tipo = numero($_POST['tipo']);
	$imagen = limpiarDatos($_POST['imagen']);
	$direccion = limpiarDatos($_POST['direccion']);
	$descripcion = limpiarDatos($_POST['descripcion']);
	$costo = numero($_POST['costo']);

	agregarLugar($conexion, $nombre, $tipo, $imagen, $direccion, $descripcion, $costo);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;
?>