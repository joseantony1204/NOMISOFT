<?php 
$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$Personasgeneral = Personasgenerales::model()->findByPk($Liquidaciones->PEGE_ID);
$Personasgeneral->loadPersonageneral($Personasgeneral->PEGE_ID);
$nombre = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO);			  
$nombrecompleto = trim($Personasgeneral->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDONOMBRE).' '.trim($Personasgeneral->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Personasgeneral->Personageneral->PEGE_SEGUNDOAPELLIDOS).' Num. Identificacion '.number_format(trim($Personasgeneral->Personageneral->PEGE_IDENTIFICACION));			  

/** 
 *obtener las liquidaciones de cada una de las prestaciones
 */
$filasprimasemestral = count($Liqprimasemestral->liquidacion);
$columnasprimasemestral = count($Liqprimasemestral->liquidacion[1]);

$filasvacaciones = count($Liqvacaciones->liquidacion);
$columnasvacaciones = count($Liqvacaciones->liquidacion[1]);

$filasprimavacaciones = count($Liqprimavacaciones->liquidacion);
$columnasprimavacaciones = count($Liqprimavacaciones->liquidacion[1]);

$filasprimanavidad = count($Liqprimanavidad->liquidacion);
$columnasprimanavidad = count($Liqprimanavidad->liquidacion[1]);

$filascesantias = count($Liqcesantias->liquidacion);
$columnascesantias = count($Liqcesantias->liquidacion[1]);

$styleArray = array(
  'font' => array(
    'bold' => true,
    ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
  'borders' => array(
   'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THICK,
    'color' => array('argb' => '000000'),
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
  'borders' => array(
   'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THICK,
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

$styleBordes = array(
  'borders' => array(
   'right' => array(
    'style' => PHPExcel_Style_Border::BORDER_THICK, //BORDER_THICK -- BORDER_THIN
   'color' => array('argb' => '000000'),
   ),
   'bottom' => array(
    'style' => PHPExcel_Style_Border::BORDER_THICK, //BORDER_THICK -- BORDER_THIN
   'color' => array('argb' => '000000'),
   ),
   'left' => array(
    'style' => PHPExcel_Style_Border::BORDER_THICK, //BORDER_THICK -- BORDER_THIN
   'color' => array('argb' => '000000'),
   ),
  ),
);
			  
$objPHPExcel = new PHPExcel(); 


$objPHPExcel->getProperties()
					->setCreator("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setLastModifiedBy("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setTitle("REPORTE PLANO LIQUIDACIONES")
					->setSubject("LIQUIDACIONES")
					->setDescription("REPORTE")
					->setKeywords("REPORTE, NOMINA")
					->setCategory("LIQUIDACIONES");
$index = 0;  
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex($index)
								 ->setCellValue('B2', 'UNIVERSIDAD DE LAGUAJIRA')
								 ->setCellValue('B3', 'TALENTO HUMANO')
								 ->setCellValue('B4', 'LIQUIDACION DE PRESTACIONES SOCIALES')
								 
								 ->setCellValue('C2', 'F. INGRESO: '.$Liquidaciones->getFormatoFecha($Liquidaciones->LIQU_FECHAINGRESO))
								 ->setCellValue('F2', 'F. RETIRO: '.$Liquidaciones->getFormatoFecha($Liquidaciones->LIQU_FECHARETIRO));
								 
								 
$objPHPExcel->setActiveSheetIndex($index)->mergeCells('B5:H5');
$objPHPExcel->getActiveSheet()->setCellValue('B5', $nombrecompleto);
$objPHPExcel->getActiveSheet()->getStyle('B5:H5')->applyFromArray($styleArray);

    $fxls = 6; $totalliquidacion = 0;
	/**
	*imprimir prima de servicios
	*/	
	if($filasprimasemestral>1){
	 
	 for($i=1;$i<$filasprimasemestral;$i++){
		 
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->applyFromArray($styleArrayBInt);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	 
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'PRIMA DE SERVICIOS');
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, 'MESES'); 
	 $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls, 'DEVENGADO');
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, 'NETO'); $fxls = $fxls+1;
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls,number_format($Liqprimasemestral->liquidacion[$i][1]));
	 
	 $valor = 0;
	  for ($ln=4;$ln<10;$ln++){	   
	   if($Liqprimasemestral->liquidacion[$i][$ln]!=0){	   
	    $dias = (($Liqprimasemestral->liquidacion[$i][1]*22)/12);
		$valor = ((30*$Liqprimasemestral->liquidacion[$i][$ln])/($dias));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqprimasemestral->liquidacion[0][$ln]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqprimasemestral->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }

     $fxls = $fxls+1; $valor = 0;
	 for ($ln=10;$ln<11;$ln++){
	   if($Liqprimasemestral->liquidacion[$i][$ln]!=0){
        $dias = (($Liqprimasemestral->liquidacion[$i][1]*22)/12);
		$valor = ((30*$Liqprimasemestral->liquidacion[$i][$ln])/($dias));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqprimasemestral->liquidacion[0][$ln]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqprimasemestral->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     } 
	 
	 $fxls = $fxls+1;
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'TOTAL DE SERVICIOS VACACIONES');
	 $totalliquidacion = $totalliquidacion+$Liqprimasemestral->liquidacion[$i][13];
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $Liqprimasemestral->liquidacion[$i][13]);
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->applyFromArray($styleArray);
	 $objPHPExcel->getActiveSheet()->getStyle('B6:H'.$fxls)->applyFromArray($styleBordes);
	 
    }
   }
   
   /**
	*imprimir vacaciones
	*/	
	if($filasvacaciones>1){
	 
	 for($i=1;$i<$filasvacaciones;$i++){
	 $fxls = $fxls+1;
	 
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->applyFromArray($styleArrayBInt);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	 
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'VACACIONES');
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, 'MESES'); 
	 $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls, 'DEVENGADO');
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, 'NETO'); $fxls = $fxls+1;
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls,number_format($Liqvacaciones->liquidacion[$i][1]));
	 
	 
	  $valor = 0;
	  for ($ln=4;$ln<10;$ln++){	   
	   if($Liqvacaciones->liquidacion[$i][$ln]!=0){	   
	    $dias = (($Liqvacaciones->liquidacion[$i][1]*22)/12);
		$valor = ((30*$Liqvacaciones->liquidacion[$i][$ln])/($dias));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqvacaciones->liquidacion[0][$ln]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqvacaciones->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }
	 $fxls = $fxls+1; $valor = 0;
	 for ($ln=10;$ln<12;$ln++){
	   if($Liqvacaciones->liquidacion[$i][$ln]!=0){
        $dias = (($Liqvacaciones->liquidacion[$i][1]*22)/12);
		$valor = ((30*$Liqvacaciones->liquidacion[$i][$ln])/($dias));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqvacaciones->liquidacion[0][$ln]);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqvacaciones->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }	 
	 $fxls = $fxls+1;
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'TOTAL VACACIONES');
	 $totalliquidacion = $totalliquidacion+$Liqvacaciones->liquidacion[$i][14];
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $Liqvacaciones->liquidacion[$i][14]);
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->applyFromArray($styleArray);
	 $objPHPExcel->getActiveSheet()->getStyle('B6:H'.$fxls)->applyFromArray($styleBordes);
    }
   }
   
   /**
	*imprimir prima vacaciones
	*/	
	if($filasprimavacaciones>1){
	 
	 for($i=1;$i<$filasprimavacaciones;$i++){
	  $fxls = $fxls+1; 	 
	 
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->applyFromArray($styleArrayBInt);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	 
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'PRIMA VACACIONES');
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, 'MESES'); 
	 $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls, 'DEVENGADO');
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, 'NETO'); $fxls = $fxls+1;
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls,number_format($Liqprimavacaciones->liquidacion[$i][1]));
	  
	  $valor = 0;
	  for ($ln=4;$ln<10;$ln++){
	   if($Liqprimavacaciones->liquidacion[$i][$ln]!=0){
	    $dias = ($Liqprimavacaciones->liquidacion[$i][1]);
		$valor = (((12*$Liqprimavacaciones->liquidacion[$i][$ln])/($dias))*2);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqprimavacaciones->liquidacion[0][$ln]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqprimavacaciones->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }
	 $fxls = $fxls+1; $valor = 0;
	 for ($ln=10;$ln<12;$ln++){
	   if($Liqprimavacaciones->liquidacion[$i][$ln]!=0){
	    $dias = ($Liqprimavacaciones->liquidacion[$i][1]);
		$valor = (((12*$Liqprimavacaciones->liquidacion[$i][$ln])/($dias))*2);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqprimavacaciones->liquidacion[0][$ln]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqprimavacaciones->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }	
	 
	 $fxls = $fxls+1;
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'TOTAL PRIMA VACACIONES');
	 $totalliquidacion = $totalliquidacion+$Liqprimavacaciones->liquidacion[$i][14];
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $Liqprimavacaciones->liquidacion[$i][14]);
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->applyFromArray($styleArray);
	 $objPHPExcel->getActiveSheet()->getStyle('B6:H'.$fxls)->applyFromArray($styleBordes);
    }
   }
   
   /**
	*imprimir prima navidad
	*/	
	if($filasprimanavidad>1){
	 
	 for($i=1;$i<$filasprimanavidad;$i++){
	  $fxls = $fxls+1; 	 
	 
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->applyFromArray($styleArrayBInt);
	 $objPHPExcel->getActiveSheet()->getStyle('B'.$fxls.':H'.$fxls)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	 
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'PRIMA NAVIDAD');
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, 'MESES'); 
	 $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls, 'DEVENGADO');
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, 'NETO'); $fxls = $fxls+1;
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls,number_format($Liqprimanavidad->liquidacion[$i][1]));
	 
	 $valor = 0;
	  for ($ln=4;$ln<10;$ln++){
	   if($Liqprimanavidad->liquidacion[$i][$ln]!=0){
	    $dias = ($Liqprimanavidad->liquidacion[$i][1]);
		$valor = (((12*$Liqprimanavidad->liquidacion[$i][$ln])/($dias)));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqprimanavidad->liquidacion[0][$ln]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqprimanavidad->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }
	 
	 $fxls = $fxls+1; $valor = 0;
	 for ($ln=10;$ln<13;$ln++){
	   if($Liqprimanavidad->liquidacion[$i][$ln]!=0){
	    $dias = ($Liqprimanavidad->liquidacion[$i][1]);
		$valor = (((12*$Liqprimanavidad->liquidacion[$i][$ln])/($dias)));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqprimanavidad->liquidacion[0][$ln]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqprimanavidad->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }	 
	 $fxls = $fxls+1;
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'TOTAL PRIMA NAVIDAD');
	 $totalliquidacion = $totalliquidacion+$Liqprimanavidad->liquidacion[$i][15];
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $Liqprimanavidad->liquidacion[$i][15]);
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->applyFromArray($styleArray);
	 $objPHPExcel->getActiveSheet()->getStyle('B6:H'.$fxls)->applyFromArray($styleBordes);
    }
   }
   
   /**
	*imprimir cesantias
	*/	
	if($filascesantias>1){
	 
	 for($i=1;$i<$filascesantias;$i++){
	  $fxls = $fxls+1; 	 
	 
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'CESANTIAS');
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, 'DIAS'); 
	 $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls, 'DEVENGADO');
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, 'NETO'); $fxls = $fxls+1;
	 $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls,number_format($Liqcesantias->liquidacion[$i][1]));
	 
	 $valor = 0;
	  for ($ln=4;$ln<10;$ln++){
	   if($Liqcesantias->liquidacion[$i][$ln]!=0){
	    $dias = ($Liqcesantias->liquidacion[$i][1]);
		$valor = (((360*$Liqcesantias->liquidacion[$i][$ln])/($dias)));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqcesantias->liquidacion[0][$ln]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqcesantias->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }
	 
     $fxls = $fxls+1; $valor = 0;
	 for ($ln=10;$ln<14;$ln++){
	   if($Liqcesantias->liquidacion[$i][$ln]!=0){
	    $dias = ($Liqcesantias->liquidacion[$i][1]);
		$valor = (((360*$Liqcesantias->liquidacion[$i][$ln])/($dias)));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls,$Liqcesantias->liquidacion[0][$ln]);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fxls,$valor);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fxls,$Liqcesantias->liquidacion[$i][$ln]);
		$objPHPExcel->getActiveSheet()->getStyle('C7:C'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
		$objPHPExcel->getActiveSheet()->getStyle('E7:E'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	   $fxls++;
	   }	  
     }
	 
	 $fxls = $fxls+1;
	 $objPHPExcel->setActiveSheetIndex($index)->mergeCells('B'.$fxls.':C'.$fxls);
	 $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, 'TOTAL CESANTIAS');
	 $totalliquidacion = $totalliquidacion+$Liqcesantias->liquidacion[$i][16];
	 $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $Liqcesantias->liquidacion[$i][16]);
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	 $objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->applyFromArray($styleArray);
	 $objPHPExcel->getActiveSheet()->getStyle('B6:H'.$fxls)->applyFromArray($styleBordes);
    }
   }
	
	$fxls = $fxls+2;
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fxls, 'Total Liquidación:');
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $totalliquidacion);
	$objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	
	$fxls = $fxls+2;
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fxls, 'Descuentos:');
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $descuento);
	$objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
	
	$fxls = $fxls+2;
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('F'.$fxls.':G'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fxls, 'Neto a Recibir:');
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fxls, $totalliquidacion-$descuento);
	$objPHPExcel->getActiveSheet()->getStyle('H'.$fxls)->getNumberFormat()->setFormatCode('#,##0');
								 
	$fxls = $fxls+3;							 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, '---------------');
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('D'.$fxls.':E'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, '---------------');
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('G'.$fxls.':H'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fxls, '---------------');
	
	$fxls = $fxls+2;							 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, '---------------');
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('D'.$fxls.':E'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, '---------------');
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('G'.$fxls.':H'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fxls, '---------------');
	
	$fxls = $fxls+2;							 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fxls, '---------------');
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('D'.$fxls.':E'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fxls, '---------------');
	
	$objPHPExcel->setActiveSheetIndex($index)->mergeCells('G'.$fxls.':H'.$fxls);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fxls, '---------------');
	
	$fxls = $fxls+3;							 
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fxls, 'Rector           V. Rector Admtivo            Prof.  Univ. Ppto            Tesorera           Dir. Talento Humano');
								 
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
	
	//Crea el archivo y modifica el nombre de la hoja
	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle($nombre);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	$objWriter->save('Liquidacion_'.$Liquidaciones->LIQU_ID.'.xlsx');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Liquidacion_'.$Liquidaciones->LIQU_ID.'.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');    
    unset($this->objWriter);
    unset($this->objWorksheet);
    unset($this->objReader);
    unset($this->objPHPExcel);
    Yii::app()->end();								 
?>