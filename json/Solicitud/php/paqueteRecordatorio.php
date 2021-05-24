<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$resultado = obtenerRecordatorioPorId($conexion, $_POST['consulta']);
} else {
	empty($resultado);
}
if (!empty($resultado)) {
	$salida .= $resultado[1];
} else {
	$salida .= 'No hay datos';
}

echo $salida;

?>