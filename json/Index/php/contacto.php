<?php session_start();
require '../../../config/config.php';
require '../../../config/funciones.php';
require '../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['nombre'])
	&& isset($_POST['apellido'])
	&& isset($_POST['correo']) 
	&& isset($_POST['telefono'])
	&& isset($_POST['motivo'])
	&& isset($_POST['mensaje'])) {

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '587';
	$mail->Username = 'eventshouse1234@gmail.com';
	$mail->Password = 'eventshouse1234';

	$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
	$mail->addAddress('eventshouse1234@gmail.com', 'Events House');
	$mail->Subject = 'Events House - Contacto';
	$mail->Body = $_POST['nombre'] . ' ' . $_POST['apellido'] . ' - Motivo: ' . $_POST['motivo'] . ' <br>' . 'Correo: ' . $_POST['correo'] . '<br>' . 'Telefono: ' . $_POST['telefono'] . '<hr>' . $_POST['mensaje'];
	$mail->IsHTML(true);
	// $mail->addAttachment('ganancias-mensuales.pdf', 'Ganancias.pdf');
	if ($mail->send()) {
		$salida .= 'Exito';
	} else {
		$salida .= 'Error';
	}
} else {
	empty($resultado);
	$salida .= 'NO FUNCIONO ESTA JODA';
}
echo $salida;
?>