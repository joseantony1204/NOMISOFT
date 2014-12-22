<?php 
$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$filas = count($Mensualnominaliquidaciones->liquidacion);
$columnas = count($Mensualnominaliquidaciones->liquidacion[1]);
$parafisales = count($Mensualnominaliquidaciones->parafiscales[0]);

$tblD = $Mensualnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);


$objPHPExcel = new PHPExcel(); 


$objPHPExcel->getProperties()
					->setCreator("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setLastModifiedBy("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setTitle("REPORTE PLANO PARA PAGOS")
					->setSubject("REPORTE")
					->setDescription("REPORTE")
					->setKeywords("REPORTE, NOMINA")
					->setCategory("NOMINA");
  
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0)
								 ->setCellValue('A1', 'C')
								 ->setCellValue('B1', 'B')
								 ->setCellValue('C1', 'C')
								 ->setCellValue('D1', 'D');

$fxls=2;
for ($i=1;$i<$filas-1;$i++)
{
	
	$Mensualnomina = Mensualnomina::model()->findByPk($Mensualnominaliquidaciones->liquidacion[$i][5]);
    $Mensualnomina->cargarEmpleoPlanta($Mensualnominaliquidaciones->liquidacion[$i][6]);
	
	$neto=(($Mensualnominaliquidaciones->liquidacion[$i][$columnas-1])-(($Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1])+($tblD[$i][$columnasTblD-1])));
	//echo $Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO.' - '.$Mensualnominaliquidaciones->liquidacion[$i][$columnas-1].' - '.$Mensualnominaliquidaciones->parafiscales[$i][$parafisales-1].' - '.$tblD[$i][$columnasTblD-1].' - '.$neto.'<br>';
	
	if($neto>0){
		$nombre = trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).' '.trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fxls, trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, round($neto));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls, $nombre);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, trim($Mensualnomina->Personageneral->PEGE_NUMEROCUENTA));
		$fxls++;
    }
}
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getStyle('B2:B'.$fxls)->getNumberFormat()->setFormatCode('###0');
$objPHPExcel->getActiveSheet()->getStyle('D2:D'.$fxls)->getNumberFormat()->setFormatCode('###0');

  
   
   //Crea el archivo y modifica el nombre de la hoja
	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('PagoPlanta'.$mensualNomina);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	$objWriter->save('TotalPlano.xlsx');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="PAGOMES.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');    
    unset($this->objWriter);
    unset($this->objWorksheet);
    unset($this->objReader);
    unset($this->objPHPExcel);
    Yii::app()->end();
 
?>