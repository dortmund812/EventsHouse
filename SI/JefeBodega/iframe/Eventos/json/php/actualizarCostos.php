<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$costoTotal = 0;
$costoImplementos = 0;
if (isset($_POST['consulta'])) {
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$id = numero($_POST['consulta']);
	$resultado = actualizarCostos($conexion, $id);

	if (!empty($resultado)) {
		foreach ($resultado as $val) {
			$costoImplementos += $val[0];
			$costoTotal = $val[1];
		}
		$costoTotal = $costoTotal + $costoImplementos;
	}
	$salida = array('implementos' => $costoImplementos, 'total' => $costoTotal);
} else {
	$salida = array('Error' => 'Error');
}

echo json_encode($salida);

?>