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
	$resultado = traerPersonalID($conexion, $id);
	if (!empty($resultado)) {
		$resultado[9] = fecha($resultado[9]);
		$salida = $resultado;
	} else {
		$salida = array('Error' => 'Error');
	}
} else {
	$salida = array('Error' => 'Error');
}

echo json_encode($salida);

?>