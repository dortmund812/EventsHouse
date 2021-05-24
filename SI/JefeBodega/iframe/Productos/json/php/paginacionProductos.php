<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['implemento'])
	&& isset($_POST['tipo'])
	&& isset($_POST['cotizacion'])
	&& isset($_POST['evento'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['costo'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$implemento = limpiarDatos($_POST['implemento']);
	$tipo = limpiarDatos($_POST['tipo']);
	$cotizacion = limpiarDatos($_POST['cotizacion']);
	$evento = limpiarDatos($_POST['evento']);
	$cantidad = limpiarDatos($_POST['cantidad']);
	$costo = limpiarDatos($_POST['costo']);
	$estado = limpiarDatos($_POST['estado']);

	$resultado = paginacionProductos($conexion, 10, $id, $implemento, $tipo, $cotizacion, $evento, $cantidad, $costo, $estado);
} else {
	empty($resultado);
}
if (!empty($resultado)) {
	for ($i=1; $i <= $resultado; $i++) { 
		$salida .= '<a href="" class="btn btn-dark text-white mx-1 pag">' . $i . '</a>';
	}
} else {
	$salida .= 'NO HAY DATOS';
}

echo $salida;

?>