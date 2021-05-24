<?php 
session_start(); 
require_once '../../../../config/config.php'; 
require_once '../../../../config/funciones.php'; 
$conexion = conexion($base_datos); 
// CONEXION 
if (!$conexion) { 
	header('Location: ' . RUTA . 'config/error'); 
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
	require "../../../../config/Lenguaje/".$len."/".$len."secretaria.php"; 
	header('Location: configuracion'); 
} else { 
	require "../../../../config/Lenguaje/".$len."/".$len."secretaria.php"; 
} 
// SESION ADMINISTRADOR 
if (sesionSecretaria()) { 
	require_once 'configuracion.view.php'; 
} else { 
	header('Location: ' . RUTA . 'config/direccion'); 
	die(); 
} 
require_once 'configuracion.view.php';

?>