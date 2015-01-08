<?php 
$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$styleArray = array(
  'font' => array(
    'bold' => true,
    ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
  'borders' => array(
    'top' => array(
     'style' => PHPExcel_Style_Border::BORDER_THIN,
      ),
    ),
  'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
       'rotation' => 90,
        'startcolor' => array(
          'argb' => 'FFA0A0A0',
           ),
        'endcolor' => array(
         'argb' => 'FFFFFFFF',
         ),
      ),
 );
 
 $styleArrayB = array(
   'font' => array(
   'bold' => true,
    ),
  'borders' => array(
   'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THIN,
   'color' => array('argb' => '000000'),
   ),
  ),
  
);

$styleArrayBInt = array(
  'borders' => array(
   'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_DASHED,
   'color' => array('argb' => '000000'),
   ),
  ),
);

$model=Cesantiasnomina::model()->findByPk($cesantiasNomina);
$Periodo = $model->CENO_PERIODO;
$sql = ' cn."CENO_ID" = '.$model->CENO_ID;
$unidades = $Cesantiasnominaliquidaciones->getUnidadesEnNomina($sql);

$objPHPExcel = new PHPExcel(); 
$objPHPExcel->getProperties()
					->setCreator("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setLastModifiedBy("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setTitle("REPORTE PLANO PARA PAGOS")
					->setSubject("REPORTE")
					->setDescription("REPORTE")
					->setKeywords("REPORTE, NOMINA")
					->setCategory("NOMINA");

$index = 0;
foreach($unidades as $unidad){
 $Unidades = Unidades::model()->findByPk($unidad["UNID_ID"]);
 $query = ' '.$sql.' AND u."UNID_ID" =  '.$Unidades->UNID_ID;
 $Cesantiasnominaliquidaciones->mostrarLiquidacion($query);
 
 $filas = count($Cesantiasnominaliquidaciones->liquidacion);
 $columnas = count($Cesantiasnominaliquidaciones->liquidacion[1]);
 
 $objPHPExcel->createSheet();
 $objPHPExcel->setActiveSheetIndex($index) 
		 ->setCellValue('A1', 'UNIVERSIDAD DE LA GUAJIRA')
		 ->setCellValue('A2', 'DIRECCION DE TALENTO HUMANO')
		 ->setCellValue('A3', 'RELACION PAGO DE CESANTIAS')
		 ->setCellValue('A4', 'UNIDAD: '.$Unidades->UNID_ID.' - '. $Unidades->UNID_NOMBRE)
		 ->setCellValue('A6', 'PERIODO : '.$Periodo)
		  
		 ->setCellValue('A8', 'CEDULA') 
		 ->setCellValue('B8', 'NOMBRES')
		 ->setCellValue('C8', 'INTERESES 12%');
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:A6')->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('A8:C8')->applyFromArray($styleArrayB);
    
	$fxls=9; $numEmpleados = 0; $totalCesantias = 0; $totalIntereses = 0;
    for ($i=1;$i<$filas-1;$i++)
    {
	 $objPHPExcel->getActiveSheet()->getStyle('A'.$fxls.':'.'C'.$fxls)->applyFromArray($styleArrayBInt);
	 
	 $anio=substr($Cesantiasnominaliquidaciones->liquidacion[$i][16],0,4);    
     $Parametrosglobales = new Parametrosglobales; 	 
     $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
     $valorPunto = $Parametrosglobales[1][3];
     $Cesantiasnomina = Cesantiasnomina::model()->findByPk($Cesantiasnominaliquidaciones->liquidacion[$i][16]);
     $Mensualnomina = new Mensualnomina;
     $Mensualnomina->cargarEmpleoPlanta($Cesantiasnominaliquidaciones->liquidacion[$i][17]);
	 
	 $neto=($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1]); 
	 $intereses=($Cesantiasnominaliquidaciones->liquidacion[$i][$columnas-1])*(0.12);
	 
	 $numEmpleados = $numEmpleados + 1; 
     $totalCesantias = $totalCesantias + $neto;  
     $totalIntereses = $totalIntereses + $intereses;
	 
	 if($neto>0 AND ($Mensualnomina->Unidad->TIUN_ID==1 OR $Mensualnomina->Unidad->TIUN_ID==2)){
		$nombre = trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).' '.trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fxls, trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, $nombre);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls, ($intereses));
		$fxls++;
		$objPHPExcel->getActiveSheet()->getStyle('C9:'.'C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
     }
	}
	
	$objPHPExcel->getActiveSheet()->setCellValue('A'.($fxls+1), "TOTALES");
    $objPHPExcel->getActiveSheet()->setCellValue('B'.($fxls+1), 'SON '.$numEmpleados.' FUNCIONARIOS');
    $objPHPExcel->getActiveSheet()->setCellValue('C'.($fxls+1), $totalIntereses);
    $objPHPExcel->getActiveSheet()->getStyle('C'.($fxls+1))->getNumberFormat()->setFormatCode('#,##0');
    $objPHPExcel->getActiveSheet()->getStyle('C'.($fxls+1).':'.'C'.($fxls+1))->applyFromArray($styleArrayB);
    $objPHPExcel->getActiveSheet()->getStyle('C'.($fxls+1))->applyFromArray($styleArrayB);
   
    //Lo de abajo de la hoja
    $objPHPExcel->getActiveSheet()->setCellValue('A'.($fxls+5), 'VICERRECTOR  ADMINISTRATIVO                         PRESUPUESTO                            TESORERIA                       TALENTO  HUMANO');
  
    //Cuadricula
    $objPHPExcel->getActiveSheet()->setShowGridlines(false);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	
	//Tamaño y fuente
	$objPHPExcel->getActiveSheet()->getStyle('A1:'.'C'.$fxls)->getFont()->setName('Arial');
	$objPHPExcel->getActiveSheet()->getStyle('A1:'.'C'.$fxls)->getFont()->setSize(10);
	//$objPHPExcel->getActiveSheet()->getStyle('A5:'.$colme[$c-1].'5')->getFont()->setSize(10);
	//Orientacion y papel
	$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
	//Margenes de impresion
	$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0);
	$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0);
	$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.4);
	$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0);
	$objPHPExcel->getActiveSheet()->getPageMargins()->setHeader(0);
	$objPHPExcel->getActiveSheet()->getPageMargins()->setFooter(0);
	
 
   //CREANDO HOJAS PARA CADA DEPENDENCIA INCLUYENDO SUS RESPECTIVAS LIQUIDACIONES ASIGNADAS//
   $objPHPExcel->setActiveSheetIndex($index);
   $Unidad = substr($Unidades->UNID_NOMBRE,0,20);
   $objPHPExcel->getActiveSheet()->setTitle("$Unidad");
   $index++;
}

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	$objWriter->save('PAGO_CESANTIAS.xls'); 
	 header('Content-Type: application/vnd.ms-excel');
	 header('Content-Disposition: attachment;filename="PAGO_CESANTIAS.xls"');
	 header('Cache-Control: max-age=0');
	 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	 $objWriter->save('php://output');    
    unset($this->objWriter);
    unset($this->objWorksheet);
    unset($this->objReader);
    unset($this->objPHPExcel);
    Yii::app()->end();
 
?>