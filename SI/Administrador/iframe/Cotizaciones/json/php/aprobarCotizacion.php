<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';
require_once '../../../../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['nombre'])
	&& isset($_POST['correo'])) {
	$id = numero($_POST['consulta']);
	aprobarCotizacionAdmin($conexion, $id);
	$listadoEmpleados = traerEmpleadosAsignados($conexion, $id);
	$asunto = 'Evento asignado';
	$mensaje = 'Te queremos informar que has sido asignado a un evento, Por favor revisa tu bandeja de entrada.';
	foreach ($listadoEmpleados as $value) {
		$receptor = idUsuarioTrabajador($conexion, $value[0]);
		crearNotificacion($conexion, $asunto, $mensaje, 1, $receptor[0]);
	}
	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '587';
	$mail->Username = 'eventshouse1234@gmail.com';
	$mail->Password = 'eventshouse1234';

	$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
	$mail->addAddress($_POST['correo'], 'Cliente');
	$mail->Subject = 'Events House';
	$mail->Body = 'Hola ' . $_POST['nombre'] . ', Acabamos de aprobar tu cotizacion, gracias por realizar tu evento con nosotros.';
	$mail->IsHTML(true);

	if ($mail->send()) {
		$salida .= 'Exito';
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo $salida;

?>