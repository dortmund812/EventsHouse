<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$busqueda = limpiarDatos($_POST['consulta']);
	$resultado = buscarEventos($conexion, $busqueda);
} else {
	empty($resultado);
}

if (!empty($resultado)) {
	foreach ($resultado as $valor) {
		$salida .= '<div class="col-sm-6 col-md-4 evento">
						<div class="columna">
							<div class="imgbox">
								<img src="' . RUTA . 'img/eventos/' . $valor['imagen_card'] . '" alt=""></img>
							</div>
							<div class="detalles">
								<div class="contenido">
									<h2>' .  $valor['tipo_evento'] . '</h2>
									<p>' . $valor['extracto'] . '</p>
									<a href="' . RUTA . 'SI/Solicitud/solicitud?id_evento=' . $valor['id_evento'] . '">¡Cotizar!</a>
								</div>
							</div>
						</div>
					</div>';
	}
} else {
	$salida .= 'No hay datos';
}

echo $salida;

 ?>