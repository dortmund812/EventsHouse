<?php session_start();
require '../../../config/config.php';
require '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['correo']) && isset($_POST['password'])) {
	$correo = limpiarDatos($_POST['correo']);
	$password = limpiarDatos($_POST['password']);
	$password = hash('sha512', $password);
	
	$resultado = ingresarUsuario($conexion, $correo, $password);

} else {
	empty($resultado);
}

if (!empty($resultado)) {
	$ingreso = $resultado['rol_ingreso'];
	$estado = $resultado['estado'];
	if ($estado == 'Habilitado') {
		$_SESSION['rol'] = $ingreso;
		$_SESSION['usuario'] = $correo;
		$_SESSION['estado'] = $estado;
		
		$usuario = obtenerReceptor($conexion, $correo);
		$ip = $_SERVER['REMOTE_ADDR'];
		$servidor = $_SERVER['SERVER_ADDR'];
		$navegador = $_SERVER['HTTP_USER_AGENT'];
		$puerto_remoto = $_SERVER['REMOTE_PORT'];
		$puerto_servidor = $_SERVER['SERVER_PORT'];
		registrarIngreso($conexion, $usuario[0], $ip, $servidor, $navegador, $puerto_remoto, $puerto_servidor);
		$salida .= 'true';
	} else {
		$salida .= 'Deshabilitado';
	}

} else {
	$_SESSION = array();
	$salida .= 'false';
}

echo $salida;

?>