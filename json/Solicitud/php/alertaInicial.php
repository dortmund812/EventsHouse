<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (!empty($_SESSION)) {
		$correo = $_SESSION['usuario'];
		$usuario = obtenerAlertaUsuario($conexion, $correo);
		$salida .= '<div class="card card-body">
									<div class="img-alerta">
										<img src="' . RUTA . 'img/personal/' . $usuario['ruta'] . $usuario['foto'] . '" alt="" id="img_alerta_solicitud" class="img-rounded">
									</div>
									<h2 class="text-center">Bienvenido<br>' . $usuario['nombre'] . '</h2>
								</div>';
	} else {
		$salida .= '<div class="card card-body">
						<div class="img-alerta">
							<img src="' . RUTA . 'img/personal/usuarios/computer-1331579_960_720.png" alt="" id="img_alerta_solicitud" class="img-rounded">
						</div>
						<h2 class="text-center">Porfavor Inicia Sesion</h2>
					</div>';
	}
} else {
	$salida .= 'Error de Datos';
}

echo $salida;

 ?>