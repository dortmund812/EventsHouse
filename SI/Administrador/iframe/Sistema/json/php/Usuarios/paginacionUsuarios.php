<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}

$salida = '';
if (isset($_POST['consulta'])) {
	$resultado = paginacionUsuariosSistemaAdmin($conexion, 10);
} else {
	empty($resultado);
}
if (!empty($resultado)) {
	for ($i=1; $i <= $resultado; $i++) { 
		$salida .= '<a href="" class="text-white px-1 bg-dark user">' . $i . '</a>';
	}
} else {
	$salida .= 'NO HAY DATOS';
}

echo $salida;

?>