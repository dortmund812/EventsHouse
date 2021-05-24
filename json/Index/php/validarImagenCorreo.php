<?php 
require '../../../config/config.php';
require '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$consulta = limpiarDatos($_POST['consulta']);
	$statement = $conexion->prepare('SELECT foto FROM usuario WHERE correo = :correo');
	$statement->execute(array(':correo' => $consulta));
	$resultado = $statement->fetch();
} else {
	empty($resultado);
}

if (!empty($resultado)) {
	$salida .= $resultado[0];
} else {
	$salida .= 'computer-1331579_960_720.png';
}

echo $salida;

?>