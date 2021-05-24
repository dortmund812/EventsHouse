<?php 
session_start();
require_once 'config.php';
require_once 'funciones.php';

if (!empty($_SESSION)) {
	if ($_SESSION['rol'] == 'Administrador') {
		header('Location: ' . RUTA . 'SI/Administrador/administrador');
		die();
	} else if ($_SESSION['rol'] == 'Secretaria') {
		if ($_SESSION['estado'] == 'Habilitado') {
			header('Location: ' . RUTA . 'SI/Secretaria/secretaria');
			die();
		}
	} else if ($_SESSION['rol'] == 'Jefe bodega') {
		if ($_SESSION['estado'] == 'Habilitado') {
			header('Location: ' . RUTA . 'SI/JefeBodega/jefeBodega');
			die();
		}
	} else if ($_SESSION['rol'] == 'Empleado') {
		if ($_SESSION['estado'] == 'Habilitado') {
			header('Location: ' . RUTA . 'SI/Empleado/empleado');
			die();
		}
	} else if ($_SESSION['rol'] == 'Cliente') {
		if ($_SESSION['estado'] == 'Habilitado') {
			header('Location: ' . RUTA . 'SI/Cliente/cliente');
			die();
		}
	} else if ($_SESSION['rol'] == 'Aspirante') {
		if ($_SESSION['estado'] == 'Habilitado') {
			header('Location: ' . RUTA . 'config/cerrarSesion');
			die();
		}
	} else if ($_SESSION['estado'] == 'Deshabilitado') {
		header('Location: ' . RUTA . 'config/error');
		die();
	} else {
		header('Location: ' . RUTA . 'index');
	}
} else {
	header('Location: ' . RUTA . 'index');
}
?>