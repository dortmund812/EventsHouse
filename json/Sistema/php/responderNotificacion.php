<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

header('Content-type: application/json; charset=utf-8');

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['mensaje'])) {
	if (!empty($_SESSION)) {
		$notificacion = numero($_POST['consulta']);
		$mensaje = limpiarDatos($_POST['mensaje']);
		$emisor = obtenerReceptor($conexion, $_SESSION['usuario']);
		$receptor = obtenerReceptorRespuesta($conexion, $notificacion);
		crearNotificacion($conexion, 'Respuesta', $mensaje, $emisor[0], $receptor[0]);
		notifiacionRespondida($conexion, $notificacion);
		$salida .= 'Exito';
	}
} else {
	$salida .= 'Error';
}


echo $salida;

?>