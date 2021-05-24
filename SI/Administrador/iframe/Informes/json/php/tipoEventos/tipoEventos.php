<?php session_start();
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';
if (isset($_SESSION) && $_SESSION['rol'] == 'Administrador') {
	if (isset($_POST['consulta'])) {
		$statement = $conexion->prepare('SELECT evento.tipo_evento FROM evento');
		$statement->execute();
		$resultado = $statement->fetchAll();

		if (!empty($resultado)) {
			$salida = $resultado;
		} else {
			$salida .= 'Error';
		}

	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo json_encode($salida);

?>