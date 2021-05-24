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
		$statement = $conexion->prepare('SELECT evento.id_evento FROM evento');
		$statement->execute();
		$resultado = $statement->fetchAll();

		if (!empty($resultado)) {
			$salida = $resultado;
		} else {
			$salida .= 'Error1';
		}

	} else {
		$salida .= 'Error2';
	}

echo json_encode($salida);
?>