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
	&& isset($_POST['rol_ingreso'])) {

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
	$mail->Body = 'Hola, ' . $_POST['nombre'] . ' ' . $_POST['apellido'] . ' Te damos la bienvenida a nuestro sistema de informacion, espero puedas seguir on nosotros.';
	$mail->IsHTML(true);
	// $mail->addAttachment('ganancias-mensuales.pdf', 'Ganancias.pdf');
	if ($mail->send()) {
		if ($_POST['foto'] == '') {
			$_POST['foto'] = 'computer-1331579_960_720.png';
		}
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
			'SELECT usuario.correo, estado_usuario.estado, rol_ingreso.rol_ingreso, usuario.id_usuario FROM usuario
			INNER JOIN estado_usuario ON usuario.estado_usuario = estado_usuario.id_estado
			INNER JOIN rol_ingreso ON usuario.rol_ingreso = rol_ingreso.id_rol
			WHERE usuario.correo = :correoAsp;'
		);
		$statementAspi->execute(array(':correoAsp' => $_POST['correo']));
		$resultadoAspi = $statementAspi->fetch();

		$userID = $resultadoAspi[3];
		$titulo = 'Events House';
		$mensaje = 'Bienvenido ' . $_POST['nombre'] . ' ' . $_POST['apellido'] . ', Te queremos agraceder por habernos escogido para realizar tus eventos, si no tienes cotizaciones con nosotros, te invitamos a que realizes una dando click al boton de "Cotiza".';
		enviarAlerta($conexion, $titulo, $mensaje, $userID);


		$_SESSION['usuario'] = $resultadoAspi[0];
		$_SESSION['estado'] = $resultadoAspi[1];
		$_SESSION['rol'] = $resultadoAspi[2];

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