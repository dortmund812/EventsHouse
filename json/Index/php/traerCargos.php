<?php 
require '../../../config/config.php';
require '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$statement = $conexion->prepare('SELECT * FROM rol_trabajador');
	$statement->execute();
	$resultado = $statement->fetchAll();
} else {
	empty($resultado);
}

if(!empty($resultado)){
	$salida .= '<option value="">Cargo</option>';
	foreach ($resultado as $valor) {
		$salida .= '<option value="' . $valor[0] . '">' . $valor[1] . '</option>';
	}

} else {
	$salida .= 'Error de datos';
}

echo $salida;

 ?>