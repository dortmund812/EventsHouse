<?php 
require_once '../../../../../../config/config.php';
require_once '../../../../../../config/funciones.php';
require_once '../../../../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])
	&& isset($_POST['correo'])) {
	$id = numero($_POST['consulta']);
	contratarAspirante($conexion, $id);

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
	$mail->Body = 'Hola, Queremos darte la bienvenida a la casa de eventos y banquetes AMSAYUL Usuario .... s';
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