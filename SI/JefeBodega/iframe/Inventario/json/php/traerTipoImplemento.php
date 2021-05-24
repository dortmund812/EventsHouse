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
	$resultado = traerTipoImplemento($conexion);
	if (!empty($resultado)) {
		$salida .= '<option value="" selected="true">Tipo</option>';
		foreach ($resultado as $valor) {
			$salida .= '<option value="' . $valor[0] . '">' . $valor[1] . '</option>';
		}
	}
}

echo $salida;

?>