<?php session_start();
require '../../../config/config.php';
require '../../../config/funciones.php';
require '../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['nombre'])
	&& isset($_POST['apellido'])
	&& isset($_POST['correo']) 
	&& isset($_POST['password'])
	&& isset($_POST['telefono'])
	&& isset($_POST['cedula'])
	&& isset($_POST['foto'])
	&& isset($_POST['rol_ingreso'])
	&& isset($_POST['hoja_vida'])
	&& isset($_POST['rol_aspirante'])) {

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '587';
	$mail->Username = 'eventshouse1234@gmail.com';
	$mail->Password = 'eventshouse1234';

	$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
	$mail->addAddress($_POST['correo'], $_POST['nombre'] . ' ' . $_POST['apellido']);
	$mail->Subject = 'Events House';
	$mail->Body = 'Hola, ' . $_POST['nombre'] . ' ' . $_POST['apellido'] . ' bienvenido a Events House, nos alegra que quieras trabajar con nosotros, en este momento tu solicitud esta siendo procesada en los proximos dias recibiras un correo informando de tu proceso.';
	$mail->IsHTML(true);
	// $mail->addAttachment('ganancias-mensuales.pdf', 'Ganancias.pdf');
	if ($mail->send()) {
		$statement = $conexion->prepare('INSERT INTO usuario (nombre, apellido, correo, password, telefono, cedula, foto, rol_ingreso) VALUES (:nombre, :apellido, :correo, :password, :telefono, :cedula, :foto, :rol_ingreso);');
		$statement->execute(array(
			':nombre' => $_POST['nombre'],
			':apellido' => $_POST['apellido'],
			':correo' => $_POST['correo'],
			':password' => hash('sha512', $_POST['password']),
			':telefono' => $_POST['telefono'],
			':cedula' => $_POST['cedula'],
			':foto' => $_POST['foto'],
			':rol_ingreso' => $_POST['rol_ingreso']
		));
		$statementAspi = $conexion->prepare(
			'SELECT usuario.id_usuario, usuario.correo, estado_usuario.estado, rol_ingreso.rol_ingreso FROM usuario
			INNER JOIN estado_usuario ON usuario.estado_usuario = estado_usuario.id_estado
			INNER JOIN rol_ingreso ON usuario.rol_ingreso = rol_ingreso.id_rol
			WHERE usuario.correo = :correoAsp;'
		);
		$statementAspi->execute(array(':correoAsp' => $_POST['correo']));
		$resultadoAspi = $statementAspi->fetch();
		$statementRegAspi = $conexion->prepare('INSERT INTO aspirante (hoja_vida, usuario, rol_aspirante) VALUES (:hoja_vida, :usuario, :rol_aspirante);');
		$statementRegAspi->execute(array(
			':hoja_vida' => $_POST['hoja_vida'],
			':usuario' => $resultadoAspi[0],
			':rol_aspirante' => $_POST['rol_aspirante']
		));
		$salida .= $_POST['nombre'] . ' ' . $_POST['apellido'];
	} else {
		$salida .= 'Error';
	}
} else {
	empty($resultado);
	$salida .= 'Error';
}
echo $salida;
?>