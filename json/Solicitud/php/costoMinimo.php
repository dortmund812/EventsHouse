<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['evento'])
	&& isset($_POST['tematica'])
	&& isset($_POST['recordatorios'])
	&& isset($_POST['personas'])
	&& isset($_POST['lugar'])
	&& isset($_POST['banquete'])) {

	if ($_POST['evento'] != ''
	&& $_POST['tematica'] != ''
	&& $_POST['recordatorios'] != ''
	&& $_POST['personas'] != ''
	&& $_POST['lugar'] != ''
	&& $_POST['banquete'] != 'Sin Especificar') {
		$costoMinimo = costoMinimo($conexion, $_POST['evento'], $_POST['tematica'], $_POST['recordatorios'], $_POST['personas'], $_POST['lugar'], $_POST['banquete']);
		$salida .= $costoMinimo;
	} else {
		$salida .= '000000';
	}
	
} else {
	$salida .= '000000';
}

echo $salida;

 ?>