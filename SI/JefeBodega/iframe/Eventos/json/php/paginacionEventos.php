<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['evento'])
	&& isset($_POST['tipo'])
	&& isset($_POST['costo'])
	&& isset($_POST['lugar'])
	&& isset($_POST['usuario'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$evento = limpiarDatos($_POST['evento']);
	$tipo = limpiarDatos($_POST['tipo']);
	$costo = limpiarDatos($_POST['costo']);
	$lugar = limpiarDatos($_POST['lugar']);
	$usuario = limpiarDatos($_POST['usuario']);
	$estado = limpiarDatos($_POST['estado']);

	$resultado = paginacionEventos($conexion, 10, $id, $evento, $tipo, $costo, $lugar, $usuario, $estado);
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