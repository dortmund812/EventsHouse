<?php session_start();
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['foto'])
	&& isset($_POST['nombre'])
	&& isset($_POST['apellido'])
	&& isset($_POST['telefono'])
	&& isset($_POST['actPass'])
	&& isset($_POST['password'])) {
	$pass = limpiarDatos($_POST['actPass']);
	$pass = hash('sha512', $pass);
	$user = $_SESSION['usuario'];
	$usuario = validarCamposCambio($conexion, $pass, $user);
	// FOTO
	if ($_POST['foto'] == '') {
		$foto =  $usuario[0];
	} else {
		$foto = $_POST['foto'];
	}
	// NOMBRE
	if ($_POST['nombre'] == '') {
		$nombre =  $usuario[1];
	} else {
		$nombre = $_POST['nombre'];
	}
	// APELLIDO
	if ($_POST['apellido'] == '') {
		$apellido =  $usuario[2];
	} else {
		$apellido = $_POST['apellido'];
	}
	// TELEFONO
	if ($_POST['telefono'] == '') {
		$telefono =  $usuario[3];
	} else {
		$telefono = $_POST['telefono'];
	}
	// PASSWORD
	if ($_POST['password'] == '') {
		$password =  $usuario[4];
	} else {
		$password = hash('sha512', $_POST['password']);
	}
	// ACTUALIZAR
	actualizarUsuario($conexion, $pass, $user, $foto, $nombre, $apellido, $telefono, $password);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;

?>