<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['fecha'])
	&& isset($_POST['evento'])
	&& isset($_POST['tematica'])
	&& isset($_POST['lugar'])
	&& isset($_POST['usuario'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$fecha = limpiarDatos($_POST['fecha']);
	$evento = limpiarDatos($_POST['evento']);
	$tematica = limpiarDatos($_POST['tematica']);
	$lugar = limpiarDatos($_POST['lugar']);
	$usuario = limpiarDatos($_POST['usuario']);
	$estado = limpiarDatos($_POST['estado']);

	$resultado = paginacionSolicitudes($conexion, 10, $id, $fecha, $evento, $tematica, $lugar, $usuario, $estado);
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