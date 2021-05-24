<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$busqueda = limpiarDatos($_POST['consulta']);
	$resultado = obtenerLugares($conexion, $busqueda);
} else {
	empty($resultado);
}

if (!empty($resultado)) {
	foreach ($resultado as $dato) {
		$salida .= '<option value="' . $dato[0] . '">' . $dato[1] . '</option>';
	}
} else {
	$salida .= '<option value="">No Hay Datos</option>';
}

echo $salida;

 ?>