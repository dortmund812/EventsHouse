<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: '.RUTA.'config/error');
	die();
}
$salida = '';
if (isset($_POST['consulta'])) {
	$id = numero($_POST['consulta']);
	$conteo = buscarEventosSolicitados($conexion, $id);
	if ($conteo >= 1) {
		$salida .= 'Ocupado';
	} else {
		eliminarEvento($conexion, $id);
		$salida .= 'Exito';
	}
} else {
	$salida .= 'Error';
}
echo $salida;
?>