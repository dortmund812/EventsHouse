<?php 
require_once '../../config/config.php';
require_once '../../config/funciones.php';
// ESTABLECER LA CONEXION
$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error');
	die();
}
$idi;
// ASIGNAR EL ID DEL EVENTO
if (isset($_GET['id_evento'])) {
	$id_evento = numero($_GET['id_evento']);
} else {
	$id_evento = 1;
}
// LENGUAJE
if (isset($_COOKIE['lenguaje'])) {
	$len = $_COOKIE['lenguaje'];
} else {
	$len = 'es';
}
if (isset($_GET["lenguaje"])) {
	$lenguaje = $_GET["lenguaje"];
	setcookie('lenguaje', $lenguaje, time() + 60 * 60 * 24 * 365, '/');
	require "../../config/Lenguaje/".$len."/".$len."solicitud.php";
	$idi = 'Idioma';
}
else {
	require "../../config/Lenguaje/".$len."/".$len."solicitud.php";
	$idi = 'Normal';
}

require_once '../../views/Solicitud/solicitud.view.php';
?>