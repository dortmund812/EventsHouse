<?php session_start();
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['evento'])
	&& isset($_POST['titulo'])
	&& isset($_POST['fecha'])
	&& isset($_POST['tematica'])
	&& isset($_POST['lugar'])
	&& isset($_POST['estado'])) {

	$evento = limpiarDatos($_POST['evento']);
	$titulo = limpiarDatos($_POST['titulo']);
	$fecha = limpiarDatos($_POST['fecha']);
	$tematica = limpiarDatos($_POST['tematica']);
	$lugar = limpiarDatos($_POST['lugar']);
	$estado = limpiarDatos($_POST['estado']);

	$usuario = $_SESSION['usuario'];
	$resultado = paginacionSolicitudesCliente($conexion, 10, $usuario, $evento, $titulo, $fecha, $tematica, $lugar, $estado);
} else {
	empty($resultado);
}
if (!empty($resultado)) {
	for ($i=1; $i <= $resultado; $i++) { 
		$salida .= '<a href="" class="btn btn-dark text-white mx-1 pag">' . $i . '</a>';
	}
} else {
	$salida .= '<a href="" class="btn btn-dark text-white mx-1 pag">0</a>';
}

echo $salida;

?>