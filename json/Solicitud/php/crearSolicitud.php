<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
require_once '../../../config/PHPMailer/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['titulo'])
	&& isset($_POST['anfitrion'])
	&& isset($_POST['formalidad'])
	&& isset($_POST['recordatorios'])
	&& isset($_POST['comentarios'])
	&& isset($_POST['personas'])
	&& isset($_POST['costoMinimo'])
	&& isset($_POST['costoMaximo'])
	&& isset($_POST['fecha'])
	&& isset($_POST['banquete'])
	&& isset($_POST['lugar'])
	&& isset($_POST['tematica'])
	&& isset($_POST['evento'])) {

	$titulo = limpiarDatos($_POST['titulo']);
	$anfitrion = limpiarDatos($_POST['anfitrion']);
	$formalidad = limpiarDatos($_POST['formalidad']);
	$recordatorios = numero($_POST['recordatorios']);
	$comentarios = limpiarDatos($_POST['comentarios']);
	$personas = numero($_POST['personas']);
	$costoMinimo = numero($_POST['costoMinimo']);
	$costoMaximo = numero($_POST['costoMaximo']);
	$fecha = $_POST['fecha'];
	$banquete = numero($_POST['banquete']);
	$lugar = numero($_POST['lugar']);
	$tematica = numero($_POST['tematica']);
	$evento = numero($_POST['evento']);

	if (!empty($_SESSION)) {
		$user = obtenerAlertaUsuario($conexion, $_SESSION['usuario']);
		crearSolicitud($conexion, $titulo, $anfitrion, $formalidad, $recordatorios, $comentarios, $personas, $costoMinimo, $costoMaximo, $fecha, $banquete, $lugar, $tematica, $evento, $user[3]);
		$mail = new PHPMailer();

		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->Username = 'eventshouse1234@gmail.com';
		$mail->Password = 'eventshouse1234';

		$mail->setFrom('eventshouse1234@gmail.com', 'Events House');
		$mail->addAddress($_SESSION['usuario'], 'Cliente');
		$mail->Subject = 'Events House';
		$mail->Body = 'Bienvenido a la casa de eventos y banquetes AMSAYUL, hemos recibido una solicitud a nombre de ' . $anfitrion . ' Gracias por elegirnos, en los proximos dias recibiras una notificacion con la respuesta de tu solicitud.';
		$mail->IsHTML(true);

		if ($mail->send()) {
			$salida .= 'Exito';
		} else {
			$salida .= 'Error';
		}
	}
	
} else {
	$salida .= 'Error De Solicitud';
}

echo $salida;

 ?>