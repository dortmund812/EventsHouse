<?php session_start();
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (isset($_SESSION) && $_SESSION['rol'] == 'Cliente') {
		$correo = $_SESSION['usuario'];
		$pass = limpiarDatos($_POST['consulta']);
		$pass = hash('sha512', $pass);
		$resultado = traerPassCambio($conexion, $pass, $correo);
		if (!empty($resultado)) {
			$salida .= 'Exito';
		}
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo $salida;

?>