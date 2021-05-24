<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['id'])
	&& isset($_POST['nombre'])
	&& isset($_POST['apellido'])
	&& isset($_POST['cargo'])
	&& isset($_POST['honorarios'])
	&& isset($_POST['telefono'])
	&& isset($_POST['correo'])) {

	$id = limpiarDatos($_POST['id']);
	$nombre = limpiarDatos($_POST['nombre']);
	$apellido = limpiarDatos($_POST['apellido']);
	$cargo = limpiarDatos($_POST['cargo']);
	$honorarios = limpiarDatos($_POST['honorarios']);
	$telefono = limpiarDatos($_POST['telefono']);
	$correo = limpiarDatos($_POST['correo']);

	$resultado = paginacionPersonalAdmin($conexion, 10, $id, $nombre, $apellido, $cargo, $honorarios, $telefono, $correo);
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