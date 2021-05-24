<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';
if (is_array($_FILES) && count($_FILES) > 0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../../archivos/correo/".$_FILES['file']['name'])) {
        $salida .= $_FILES['file']['name'];
    } else {
        $salida .= 'Error';
    }
} else {
    $salida .= 'Error';
}
echo $salida;
?>