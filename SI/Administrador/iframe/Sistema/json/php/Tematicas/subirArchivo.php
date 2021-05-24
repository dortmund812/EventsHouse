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
		$tematica = limpiarDatos($tematica);
		$costo = numero($costo);
		$statement = $conexion->prepare("INSERT INTO tematica (tematica,costo) VALUES ('$tematica','$costo')");
		$statement->execute();
	}
	$salida .= '<tr>';
	$salida .= '<td>Sin Datos</td>';
	$salida .= '<td>Sin Datos</td>';
	$salida .= '</tr>';
} else {
    $salida .= 'Error';
}
echo $salida;
?>