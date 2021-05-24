<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';
require_once '../../../../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['correo'])) {
	$id = numero($_POST['consulta']);
	denegarAspirante($conexion, $id);

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '587';
	$mail->Username = 'eventshouse1234@gmail.com';
	$mail->Password = 'eventshouse1234';

	$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
	$mail->addAddress($_POST['correo'], 'Aspirante');
	$mail->Subject = 'Events House';
	$mail->Body = 'Hola, Usted Ha sido rechazado por no cumplir con los requerimientos de la empresa.';
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