<?php 
require '../../../config/config.php';
require '../../../config/funciones.php';
require '../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['correo'])
	&& isset($_POST['cedula'])) {
	$correo = limpiarDatos($_POST['correo']);
	$cedula = limpiarDatos($_POST['cedula']);
	
	$validacion = validarDatosRecPass($conexion, $correo, $cedula);

	if (!empty($validacion)) {

		$ran = rand(7,15);
		// CARACTERES DEL RANDOM PASS
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$password = "";
		// RANDOM PASS
		for($i=0;$i<$ran;$i++) {
			// NEW PASS
			$password .= substr($str,rand(0,62),1);
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
		$mail->addAddress($_POST['correo'], 'Recuperar clave');
		$mail->Subject = 'Events House - Recuperar clave';
		$mail->Body = 'Tu solicitud de recuperar contraseña ha sido exitosa, tu nueva contraseña es: ' . $password;
		$mail->IsHTML(true);
		// ENVIAR CORREO
		if ($mail->send()) {
			// NEW PASS ENCRYPT
			$newPass = hash('sha512', $password);
			// USUARIO
			$user = numero($validacion[0]);
			// CAMBIAR PASSWORD
			recuperarPassword($conexion, $newPass, $user);
			$salida .= 'Exito';
		} else {
			$salida .= 'Error';
		}
	}
	
} else {
	$salida .= 'Error';
}

echo $salida;

 ?>