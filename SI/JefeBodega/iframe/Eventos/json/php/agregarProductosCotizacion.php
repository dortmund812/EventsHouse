<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['costo'])) {
	$costo = numero($_POST['costo']);
	$id = numero($_POST['consulta']);
	agregarProductosCotizacion($conexion, $id);
	preAprobarCotizacion($conexion, $id, $costo);	
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>