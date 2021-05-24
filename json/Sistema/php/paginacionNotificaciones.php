<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

header('Content-type: application/json; charset=utf-8');

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (!empty($_SESSION)) {
		$usuario = $_SESSION['usuario'];
		$id = obtenerAlertaUsuario($conexion, $usuario);
		$resultado = paginacionNotificaciones($conexion, 2, $id[3]);

		if (!empty($resultado)) {
			for ($i=1; $i <= $resultado ; $i++) { 
				$salida .= '<a href="" class="btn btn-dark btn-sm mx-1 pag">'.$i.'</a>';
			}
		} else {
			$salida .= '<a href="" class="btn btn-dark btn-sm mx-1 pag">0</a>';
		}
	} else {
		$resultado = array('nombre' => 'Desconocido');
		header('Location: ' . RUTA . 'index.php');
		die();
	}
} else {
	$salida .= 'Error';
}


echo $salida;

?>