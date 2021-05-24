<?php 
require '../../../config/config.php';
require '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$busqueda = limpiarDatos($_POST['consulta']);
	$busqueda = filter_var($busqueda, FILTER_SANITIZE_EMAIL);
	if (!filter_var($busqueda, FILTER_VALIDATE_EMAIL)) {
		$salida .= 'error-solicitud';
	} else {
		$statement = $conexion->prepare('SELECT * FROM usuario WHERE correo = :busqueda');
		$statement->execute(array(':busqueda' => $busqueda));
		$resultado = $statement->fetchAll();
	}
} else {
	empty($resultado);
}

if(!empty($resultado)){
	$salida .= 'error-solicitud';

} else {
	$salida .= 'success-solicitud';
}

echo $salida;

 ?>