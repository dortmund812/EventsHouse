<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

header('Content-type: application/json; charset=utf-8');

if ($_SESSION['rol'] == 'Administrador') {
	$usuario = $_SESSION['usuario'];
	$conexion = conexion($base_datos);
	$statement = $conexion->prepare('
		SELECT usuario.*, rol_ingreso.rol_ingreso FROM usuario
		INNER JOIN rol_ingreso ON usuario.rol_ingreso = rol_ingreso.id_rol
		WHERE correo = :correo'
	);
	$statement->execute(array(':correo' => $usuario));
	$resultado = $statement->fetch();
} else {
	$resultado = array('nombre' => 'Desconocido');
	header('Location: ' . RUTA . 'index.php');
}

echo json_encode($resultado);
?>