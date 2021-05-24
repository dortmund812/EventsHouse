<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['nombre'])
	&& isset($_POST['tipo'])
	&& isset($_POST['cantidad'])
	&& isset($_POST['costo'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$tipo = limpiarDatos($_POST['tipo']);
	$cantidad = limpiarDatos($_POST['cantidad']);
	$costo = limpiarDatos($_POST['costo']);

	$resultado = paginacionInventario($conexion, 10, $id, $nombre, $tipo, $cantidad, $costo);
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