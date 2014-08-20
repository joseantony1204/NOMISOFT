<?php 
require_once('Classes/PHPExcel.php');
require_once('Classes/PHPExcel/Reader/Excel2007.php');

$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("1.xlsx");
$objFecha = new PHPExcel_Shared_Date();       
$objPHPExcel->setActiveSheetIndex(0);

for ($i=1;$i<=47;$i++){
	echo $_DATOS_EXCEL[$i]['nocontrol'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['grado']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['grupo']= $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	$_DATOS_EXCEL[$i]['sexo'] = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
}		




?>