<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

header('Content-type: application/json; charset=utf-8');

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	if (!empty($_SESSION)) {
		$usuario = $_SESSION['usuario'];
		$id = obtenerAlertaUsuario($conexion, $usuario);
		$pagina = numero($_POST['consulta']);
		$resultado = validarNotificaciones($conexion, $id[3], $pagina);

		if (!empty($resultado)) {
			foreach ($resultado as $value) {
				$emisor = obtenerEmisor($conexion, $value[3]);
				if ($value[5] == 3) {
					$salida .= '<div class="card form-group col-10 py-1 px-1">
									<div class="row">
										<div class="col-3 pr-0 py-0 text-center">
											<img src="../../img/personal/usuarios/'.$emisor[0].'" alt="" class="w-100 rounded">
											<small>'.$emisor[1].'</small>
										</div>
										<div class="col-9 text-center">
											<div class="row">
												<div class="col-12 text-center">
													<strong>' . $value[1] . '</strong>
												</div>
											</div>
											' . $value[2] . '
										</div>
										<div class="col-12 mt-1" id="options' . $value[0] . '">
											<div class="row">
												<div class="col-6 pr-1">
													<button class="btn btn-outline-danger btn-block btn-sm p-0 btn_elim_not" value="' . $value[0] . '">
														Eliminar <i class="icon-bin"></i>
													</button>
												</div>
												<div class="col-6 pl-1">
													<button class="btn btn-outline-info btn-block btn-sm p-0 btn_resp_not disabled" disabled="true" value="">
														Responder <i class="icon-pencil"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>';
				} else {
					notificacionVista($conexion, $value[0]);
					$salida .= '<div class="card form-group col-10 py-1 px-1">
									<div class="row">
										<div class="col-3 pr-0 py-0 text-center">
											<img src="../../img/personal/usuarios/'.$emisor[0].'" alt="" class="w-100 rounded">
											<small>'.$emisor[1].'</small>
										</div>
										<div class="col-9 text-center">
											<div class="row">
												<div class="col-12 text-center">
													<strong>' . $value[1] . '</strong>
												</div>
											</div>
											' . $value[2] . '
											<div class="row mb-1">
												<div class="col-12">
													<textarea name="mensaje' . $value[0] . '" id="mensaje' . $value[0] . '" class="form-control d-none" placeholder="Mensaje" maxlength="250" style="max-height: 50px;min-height: 50px;"></textarea>
												</div>
											</div>
										</div>
										<div class="col-12 mt-1" id="options' . $value[0] . '">
											<div class="row">
												<div class="col-6 pr-1">
													<button class="btn btn-outline-danger btn-block btn-sm p-0 btn_elim_not" value="' . $value[0] . '">
														Eliminar <i class="icon-bin"></i>
													</button>
												</div>
												<div class="col-6 pl-1">
													<button class="btn btn-outline-info btn-block btn-sm p-0 btn_resp_not" value="' . $value[0] . '">
														Responder <i class="icon-pencil"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="col-12 mt-1 d-none" id="conf' . $value[0] . '">
											<div class="row">
												<div class="col-6 pr-1">
													<button class="btn btn-outline-danger btn-block btn-sm p-0 cancel_resp" value="' . $value[0] . '">
														<i class="icon-undo2"></i> Cancelar
													</button>
												</div>
												<div class="col-6 pl-1">
													<button class="btn btn-outline-success btn-block btn-sm p-0 btn_resp_not_confirmado" value="' . $value[0] . '">
														Enviar <i class="icon-pencil"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>';
				}
			}
		} else {
			$salida .= '<div class="card form-group col-10 py-1 px-1">
									<div class="row">
										<div class="col-3 pr-0 py-0 text-center">
											<img src="../../img/personal/usuarios/computer-1331579_960_720.png" alt="" class="w-100 rounded">
											<small>--</small>
										</div>
										<div class="col-9 text-center">
											<div class="row">
												<div class="col-12 text-center">
													<strong>No tienes notificaciones</strong>
												</div>
											</div>
											Todavía no tienes notificaciones.
										</div>
										<div class="col-12 mt-1" id="options">
											<div class="row">
												<div class="col-6 pr-1">
													<button class="btn btn-outline-danger btn-block btn-sm p-0 btn_elim_not" value="" disabled="true">
														Eliminar <i class="icon-bin"></i>
													</button>
												</div>
												<div class="col-6 pl-1">
													<button class="btn btn-outline-info btn-block btn-sm p-0 btn_resp_not disabled" disabled="true" value="">
														Responder <i class="icon-pencil"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>';
		}
	} else {
		$resultado = array('nombre' => 'Desconocido');
		header('Location: ' . RUTA . 'index.php');
		die();
	}
} else {
	$salida .= 'Error';
}


echo $salida;

?>