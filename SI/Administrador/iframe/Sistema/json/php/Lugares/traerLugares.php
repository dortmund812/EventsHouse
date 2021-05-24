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
	$eventos = traerLugaresSistemaAdmin($conexion, $pagina);
	if (!empty($eventos)) {
		foreach ($eventos as $evento) {
			$salida .= '<tr>
							<td class="px-3">' . $evento[0] . '</td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[1] . '" disabled="true"></td>
							<td><input type="text" class="form-control py-0 my-0" placeholder="Nombre" style="background: none;border: none;text-align: center;" value="' . $evento[3] . '" disabled="true"></td>
							<td class="d-flex justify-content-around">
								<button class="btn btn-sm btn-light p-0 mx-0 elim_lug" value="' . $evento[0] . '" data-toggle="modal" data-target="#eliminar_lugar_modal" title="'.$evento[1].'">
									<i class="icon-trash-2 i_conf"></i>
								</button>
							</td>
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