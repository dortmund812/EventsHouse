<?php session_start();
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';
if (isset($_COOKIE['ruta_lugar'])) {
    $ruta = $_COOKIE['ruta_lugar'];
} else {
    $ruta = 'discotecas/';
}
if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../../../../../../img/Lugares/".$ruta.$_FILES['file']['name'])) {
            echo $_FILES['file']['name'];
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 0;
}

?>