<?php  
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';
if (isset($_POST['cantidad'])
	&& isset($_POST['implemento'])
	&& isset($_POST['cotizacion'])
	&& isset($_POST['costoTotal'])
	&& isset($_POST['CostoMaximo'])) {
	
	$cantidad = numero($_POST['cantidad']);
	$implemento = numero($_POST['implemento']);
	$cotizacion = numero($_POST['cotizacion']);
	$costoTotal = numero($_POST['costoTotal']);
	$CostoMaximo = numero($_POST['CostoMaximo']);

	$costo = calcularCostoProducto($conexion, $implemento, $cantidad);

	if ($costoTotal >= $CostoMaximo) {
		$salida .= 'Igual';
	} else {
		if (($costoTotal + $costo) > $CostoMaximo) {
			$salida .= 'Excede';
		} else {
			agregarImplemento($conexion, $cantidad, $costo, $implemento, $cotizacion);
			$salida .= 'Exito';
		}
	}


} else {
	$salida .= 'Error';
}

echo $salida;

?>