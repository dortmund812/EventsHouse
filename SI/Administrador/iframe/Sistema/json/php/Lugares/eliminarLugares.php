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
	$conteo = buscarLugaresSolicitados($conexion, $id);
	if ($conteo >= 1) {
		$salida .= 'Ocupado';
	} else {
		eliminarLugar($conexion, $id);
		$salida .= 'Exito';
	}
} else {
	$salida .= 'Error';
}
echo $salida;
?>