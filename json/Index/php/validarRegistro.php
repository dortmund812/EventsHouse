<?php session_start();
require '../../../config/config.php';
require '../../../config/funciones.php';

$conexion = conexion($base_datos);
$salida = '';

if (is_array($_FILES) && count($_FILES) > 0) {
    if (($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/gif")) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../../img/personal/usuarios/".$_FILES['file']['name'])) {
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