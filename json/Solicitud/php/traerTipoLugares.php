<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$resultado = traerTipoDeLugares($conexion);
} else {
	empty($resultado);
}
if (!empty($resultado)) {
	$salida .= '<option value="">Seleccionar</option>';
	foreach ($resultado as $dato) {
		$salida .= '<option value="' . $dato[0] . '">' . $dato[1] . '</option>';
	}
} else {
	$salida .= '<option value="" disabled="true">No Hay Resultados</option>';
}

echo $salida;

?>