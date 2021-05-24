<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}

$salida = '';
if (isset($_POST['consulta'])) {
	$pagina = numero($_POST['consulta']);
	$eventos = traerUsuariosSistemaAdmin($conexion, $pagina);
	if (!empty($eventos)) {
		foreach ($eventos as $evento) {
			$salida .= '<tr>
							<td class="px-3">' . $evento[0] . '</td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[1] . ' ' . $evento[2] . '" disabled="true"></td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[3] . '" disabled="true"></td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[4] . '" disabled="true"></td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[5] . '" disabled="true"></td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[6] . '" disabled="true"></td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[7] . '" disabled="true"></td>
						</tr>';
		}
	} else {
		$salida .= 'No hay datos';
	}
} else {
	$salida .= 'Error';
}

echo $salida;

?>