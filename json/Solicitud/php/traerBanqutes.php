<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (isset($_POST['consulta'])) {
	$resultado = obtenerBanquetes($conexion, $_POST['consulta']);
} else {
	empty($resultado);
}
if (!empty($resultado)) {
	foreach ($resultado as $dato) {
		$salida .= '<div class="col-12 col-sm-6 col-lg-3">
						<input type="radio" class="rad-banq" name="banquete" id="bqt' . $dato[0] . '" value="' . $dato[0] . '">
						<label for="bqt' . $dato[0] . '" class="py-0 my-0 banquete-card h-100" id="banquete'.$dato[0].'">
							<img src="../../img/Banquetes/banquete'.$dato[0].'.jpg" class="w-100 img_banq_bor rounded m-0" alt="">
							<button class="btn btn-block btn-info m-0 d-none banquetePS banquete'.$dato[0].'">Seleccionado</button>
							<button class="btn btn-block btn-dark m-0 disabled banqueteMs banqueten'.$dato[0].'">Seleccionar</button>
						</label>
					</div>';
	}
} else {
	$salida .= 'NO HAY DATOS';
}

echo $salida;


// $salida .= '<div class="col-12 col-sm-6 col-lg-3">
// 						<input type="radio" class="rad-banq" name="banquete" id="bqt' . $dato[0] . '" value="' . $dato[0] . '">
// 						<label for="bqt' . $dato[0] . '" class="card card-body banquete-card h-100">
// 							<h4>' . $dato[1] . '</h4>
// 							<!-- ENTRADA -->
// 							<strong>Entrada..........</strong>
// 							<small>' . $dato[2] . '</small>
// 							<!-- PLATO PRINCIPAL -->
// 							<strong>Plato Principal..........</strong>
// 							<small>' . $dato[3] . '</small>
// 							<!-- ENSALADA -->
// 							<strong>Ensalada..........</strong>
// 							<small>' . $dato[4] . '</small>
// 							<!-- PRINCIPIO -->
// 							<strong>Principio..........</strong>
// 							<small>' . $dato[5] . '</small>
// 							<!-- ACOMPAÑAMIENTO -->
// 							<strong>Acompañamiento..........</strong>
// 							<small>' . $dato[6] . '</small>
// 							<!-- BEBIDAS -->
// 							<strong>Bebidas..........</strong>
// 							<small>' . $dato[8] . '</small>
// 							<!-- POSTRE -->
// 							<strong>Postre..........</strong>
// 							<small>' . $dato[7] . '</small>
// 						</label>
// 					</div>';

?>