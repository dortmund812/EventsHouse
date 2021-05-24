<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$busqueda = $_POST['consulta'];
	$resultado = obtenerEventoPorId($conexion, $busqueda);
} else {
	empty($resultado);
}

echo json_encode($resultado);

 ?>