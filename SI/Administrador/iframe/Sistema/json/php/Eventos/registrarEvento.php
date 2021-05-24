<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: '.RUTA.'config/error.php');
	die();
}
$salida = '';
if (isset($_POST['tipo'])
	&& isset($_POST['imagen'])
	&& isset($_POST['imagen_card'])
	&& isset($_POST['extracto'])
	&& isset($_POST['costo'])) {
	
	$tipo = limpiarDatos($_POST['tipo']);
	$imagen = limpiarDatos($_POST['imagen']);
	$imagen_card = limpiarDatos($_POST['imagen_card']);
	$extracto = limpiarDatos($_POST['extracto']);
	$costo = numero($_POST['costo']);

	agregarEvento($conexion,$tipo,$imagen,$imagen_card,$extracto,$costo);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;
?>