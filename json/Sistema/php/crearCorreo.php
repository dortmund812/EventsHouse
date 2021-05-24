<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
require_once '../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';

if (isset($_POST['titulo'])
	&& isset($_POST['usuario'])
	&& isset($_POST['correo'])
	&& isset($_POST['mensaje'])
	&& isset($_POST['archivo'])
	&& isset($_POST['nombreArchivo'])) {

	$titulo = limpiarDatos($_POST['titulo']);
	$usuario = numero($_POST['usuario']);
	$correo = limpiarDatos($_POST['correo']);
	$mensaje = limpiarDatos($_POST['mensaje']);
	$archivo = limpiarDatos($_POST['archivo']);
	$nombreArchivo = limpiarDatos($_POST['nombreArchivo']);
	$userRec = obtenerReceptor($conexion, $_SESSION['usuario']);

	if ($usuario == 1) {
		$secretarias = correosSecretarias($conexion);
		foreach ($secretarias as $secretaria) {
			$secret = $secretaria[0];
			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->Username = 'eventshouse1234@gmail.com';
			$mail->Password = 'eventshouse1234';

			$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
			$mail->addAddress($secret, 'Usuario');
			$mail->Subject = 'Events House - ' . $titulo;
			$mail->Body = $mensaje;
			if (!empty($archivo)) {
				$mail->addAttachment( '../../../archivos/correo/' . $archivo, $nombreArchivo);
			}
			$mail->IsHTML(true);
			if ($mail->send()) {
				$salida = 'Exito';
			} else {
				$salida = 'Error';
			}
		}
		$salida .= 'Exito';
	} else if ($usuario == 2) {
		$jefeBodega = correosJefeBodega($conexion);
		foreach ($jefeBodega as $jefe) {
			$user = $jefe[0];
			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->Username = 'eventshouse1234@gmail.com';
			$mail->Password = 'eventshouse1234';

			$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
			$mail->addAddress($user, 'Usuario');
			$mail->Subject = 'Events House - ' . $titulo;
			$mail->Body = $mensaje;
			if (!empty($archivo)) {
				$mail->addAttachment( '../../../archivos/correo/' . $archivo, $nombreArchivo);
			}
			$mail->IsHTML(true);
			if ($mail->send()) {
				$salida = 'Exito';
			} else {
				$salida = 'Error';
			}
		}
		$salida .= 'Exito';
	} else if ($usuario == 3) {
		$empleados = correosEmpleados($conexion);
		foreach ($empleados as $emple) {
			$user = $emple[0];
			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->Username = 'eventshouse1234@gmail.com';
			$mail->Password = 'eventshouse1234';

			$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
			$mail->addAddress($user, 'Usuario');
			$mail->Subject = 'Events House - ' . $titulo;
			$mail->Body = $mensaje;
			if (!empty($archivo)) {
				$mail->addAttachment( '../../../archivos/correo/' . $archivo, $nombreArchivo);
			}
			$mail->IsHTML(true);
			if ($mail->send()) {
				$salida = 'Exito';
			} else {
				$salida = 'Error';
			}
		}
		$salida .= 'Exito';
	} else if ($usuario == 4) {
		$clientes = correosClientes($conexion);
		foreach ($clientes as $client) {
			$user = $client[0];
			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->Username = 'eventshouse1234@gmail.com';
			$mail->Password = 'eventshouse1234';

			$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
			$mail->addAddress($user, 'Usuario');
			$mail->Subject = 'Events House - ' . $titulo;
			$mail->Body = $mensaje;
			if (!empty($archivo)) {
				$mail->addAttachment( '../../../archivos/correo/' . $archivo, $nombreArchivo);
			}
			$mail->IsHTML(true);
			if ($mail->send()) {
				$salida = 'Exito';
			} else {
				$salida = 'Error';
			}
		}
		$salida .= 'Exito';
	} else if ($usuario == 5) {
		$todos = correosUsuarios($conexion);
		foreach ($todos as $uno) {
			$user = $uno[0];
			$mail = new PHPMailer();

			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->Username = 'eventshouse1234@gmail.com';
			$mail->Password = 'eventshouse1234';

			$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
			$mail->addAddress($user, 'Usuario');
			$mail->Subject = 'Events House - ' . $titulo;
			$mail->Body = $mensaje;
			if (!empty($archivo)) {
				$mail->addAttachment( '../../../archivos/correo/' . $archivo, $nombreArchivo);
			}
			$mail->IsHTML(true);
			if ($mail->send()) {
				$salida = 'Exito';
			} else {
				$salida = 'Error';
			}
		}
		$salida .= 'Exito';
	} else if ($usuario == 6) {
		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->Username = 'eventshouse1234@gmail.com';
		$mail->Password = 'eventshouse1234';

		$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
		$mail->addAddress($correo, 'Usuario');
		$mail->Subject = 'Events House - ' . $titulo;
		$mail->Body = $mensaje;
		if (!empty($archivo)) {
			$mail->addAttachment( '../../../archivos/correo/' . $archivo, $nombreArchivo);
		}
		$mail->IsHTML(true);
		if ($mail->send()) {
			$salida = 'Exito';
		} else {
			$salida = 'Error';
		}
	} else {
		$salida .= 'Error';
	}
}

echo $salida;

?>