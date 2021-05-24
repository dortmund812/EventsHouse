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
	&& isset($_POST['correo'])) {
	// LIMPIAR LOS DATOS ANTES DE PASARLOS
	$id = numero($_POST['consulta']);
	$salida = denegarSolicitud($conexion, $id);
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
	$mail->Body = 'Lo sentimos, tu solicitud ha sido rechazada.';
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