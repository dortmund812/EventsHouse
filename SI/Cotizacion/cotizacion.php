<?php 
require_once '../../config/config.php'; 
require_once '../../config/funciones.php'; 
$conexion = conexion($base_datos); 
// CONEXION 
if (!$conexion) { 
	header('Location: ' . RUTA . 'config/error'); die(); 
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
	require "../../config/Lenguaje/".$len."/".$len."cotizacion.php"; 
	$idi = 'Idioma';
} else { 
	require "../../config/Lenguaje/".$len."/".$len."cotizacion.php"; 
	$idi = 'Normal';
} 
require_once '../../views/Cotizacion/cotizacion.view.php';
?>