<?php 
require_once '../../../../../../../config/config.php';
require_once '../../../../../../../config/funciones.php';
require_once '../../../../../../../config/PHPExcel/Classes/PHPExcel/IOFactory.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	header('Location: ' . RUTA . 'config/error.php');
	die();
}
$salida = '';
if (is_array($_FILES) && count($_FILES) > 0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../../../../../../archivos/excel/".$_FILES['file']['name'])) {
        $archivo = "../../../../../../../archivos/excel/".$_FILES['file']['name'];

        // Cargo la hoja de cálculo
		$objPHPExcel = PHPExcel_IOFactory::load($archivo);
			
		//Asigno la hoja de calculo activa
		$objPHPExcel->setActiveSheetIndex(0);
		//Obtengo el numero de filas del archivo
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

		for ($i=1; $i <= $numRows; $i++) { 
			$tematica = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$costo = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$salida .= '<tr>';
			$salida .= '<td>'.$tematica.'</td>';
			$salida .= '<td>'.$costo.'</td>';
			$salida .= '</tr>';
		}
    } else {
        $salida .= '<tr>';
		$salida .= '<td>Error de</td>';
		$salida .= '<td>Datos</td>';
		$salida .= '</tr>';
    }
} else {
    $salida .= '<tr>';
	$salida .= '<td>Error de</td>';
	$salida .= '<td>Datos</td>';
	$salida .= '</tr>';
}
echo $salida;
?>