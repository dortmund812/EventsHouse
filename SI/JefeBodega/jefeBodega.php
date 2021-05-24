<?php 
session_start();
require_once '../../config/config.php';
require_once '../../config/funciones.php';

$conexion = conexion($base_datos);
// CONEXION
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error');
}
$idi;
// LENGUAJE
if (isset($_COOKIE['lenguaje'])) {
	$len = $_COOKIE['lenguaje'];
} else {
	$len = 'es';
}
if (isset($_GET["lenguaje"])) {
	$lenguaje = $_GET["lenguaje"];
	setcookie('lenguaje', $lenguaje, time() + 60 * 60 * 24 * 365, '/');
	require "../../config/Lenguaje/".$len."/".$len."jefebodega.php";
	$idi = 'Idioma';
}
else {
	require "../../config/Lenguaje/".$len."/".$len."jefebodega.php";
	$idi = 'Normal';
}
// SESION DE JEFE DE BODEGA
if (sesionJefeBodega()) {
	require_once '../../views/JefeBodega/jefeBodega.view.php';
} else {
	header('Location: ' . RUTA . 'config/direccion');
	die();
}

require_once '../../views/JefeBodega/jefeBodega.view.php';
?>