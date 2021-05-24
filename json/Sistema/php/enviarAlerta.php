<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['titulo'])
	&& isset($_POST['usuario'])
	&& isset($_POST['correo'])
	&& isset($_POST['mensaje'])) {

	$titulo = limpiarDatos($_POST['titulo']);
	$usuario = limpiarDatos($_POST['usuario']);
	$correo = limpiarDatos($_POST['correo']);
	$mensaje = limpiarDatos($_POST['mensaje']);

	if ($usuario == 1) {
		$secretarias = traerSecretarias($conexion);
		foreach ($secretarias as $secretaria) {
			$secret = $secretaria[0];
			enviarAlerta($conexion, $titulo, $mensaje, $secret);
		}
		$salida .= 'Exito';
	} else if ($usuario == 2) {
		$jefeBodega = traerJefeBodega($conexion);
		foreach ($jefeBodega as $jefe) {
			$user = $jefe[0];
			enviarAlerta($conexion, $titulo, $mensaje, $user);
		}
		$salida .= 'Exito';
	} else if ($usuario == 3) {
		$empleados = traerEmpleados($conexion);
		foreach ($empleado as $emple) {
			$user = $emple[0];
			enviarAlerta($conexion, $titulo, $mensaje, $user);
		}
		$salida .= 'Exito';
	} else if ($usuario == 4) {
		$clientes = traerClientes($conexion);
		foreach ($clientes as $client) {
			$user = $client[0];
			enviarAlerta($conexion, $titulo, $mensaje, $user);
		}
		$salida .= 'Exito';
	} else if ($usuario == 5) {
		$todos = traerTodos($conexion);
		foreach ($todos as $uno) {
			$user = $uno[0];
			enviarAlerta($conexion, $titulo, $mensaje, $user);
		}
		$salida .= 'Exito';
	} else if ($usuario == 6) {
		$seleccionado = traerSeleccionado($conexion, $correo);
		enviarAlerta($conexion, $titulo, $mensaje, $seleccionado[0]);
		$salida .= 'Exito';
	} else {
		$salida .= 'Error';
	}
}

echo $salida;

?>