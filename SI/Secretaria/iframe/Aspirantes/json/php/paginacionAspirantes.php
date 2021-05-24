<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['nombre'])
	&& isset($_POST['correo'])
	&& isset($_POST['telefono'])
	&& isset($_POST['cedula'])
	&& isset($_POST['cargo'])
	&& isset($_POST['estado'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$correo = limpiarDatos($_POST['correo']);
	$telefono = limpiarDatos($_POST['telefono']);
	$cedula = limpiarDatos($_POST['cedula']);
	$cargo = limpiarDatos($_POST['cargo']);
	$estado = limpiarDatos($_POST['estado']);
	
	$resultado = paginacionAspirantes($conexion, 10, $id, $nombre, $correo, $telefono, $cedula, $cargo, $estado);
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