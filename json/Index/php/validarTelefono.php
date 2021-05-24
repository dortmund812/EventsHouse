<?php 
require '../../../config/config.php';
require '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$busqueda = $_POST['consulta'];
	$statement = $conexion->prepare('SELECT * FROM usuario WHERE telefono = :busqueda');
	$statement->execute(array(':busqueda' => $busqueda));
	$resultado = $statement->fetchAll();
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