<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['nombre'])
	&& isset($_POST['apellido'])
	&& isset($_POST['rol'])
	&& isset($_POST['fecha'])
	&& isset($_POST['correo'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$apellido = limpiarDatos($_POST['apellido']);
	$rol = limpiarDatos($_POST['rol']);
	$fecha = limpiarDatos($_POST['fecha']);
	$correo = limpiarDatos($_POST['correo']);
	$estado = limpiarDatos($_POST['estado']);

	$resultado = paginacionEmpleados($conexion, 10, $id, $nombre, $apellido, $rol, $fecha, $correo, $estado);
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