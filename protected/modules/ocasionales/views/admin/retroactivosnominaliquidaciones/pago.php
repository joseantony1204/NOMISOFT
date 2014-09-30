<?php 
$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$rowsgeneral = count($Retroactivosnominaliquidaciones->retroactivogeneral);
$columnsgeneral = count($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1]);


$tblD = $Retroactivosnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);


/*
*creando un array con el nombre de columnas
*para hacerlo de forma dinamica
*/
$Cantidad_de_columnas_a_crear=34;
$cont=0;
$columna='A';
while($cont<$Cantidad_de_columnas_a_crear)
{
    $columna;
    $nombrecolumnas[] = $columna;
    $cont++;
    $columna++;
}

$objPHPExcel = new PHPExcel(); 
$objPHPExcel->getProperties()
					->setCreator("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setLastModifiedBy("ING. JOSE ANTONIO GONZALEZ LIÑAN")
					->setTitle("REPORTE PLANO PARA PAGOS")
					->setSubject("REPORTE")
					->setDescription("REPORTE")
					->setKeywords("REPORTE, NOMINA")
					->setCategory("RETROACTIVOS");
					
$objPHPExcel->createSheet();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'UNIVERSIDAD DE LA GUAJIRA');
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'RETROACTIVO DE SALARIO '.$Retroactivosnomina->RANO_PERIODO.'');
$Unidades = Unidades::model()->findByPk($unidad);					
$objPHPExcel->getActiveSheet()->setCellValue('A3', 'UNIDAD '.$Unidades->UNID_ID.' '.$Unidades->UNID_NOMBRE);

    //Titulos de la tabla
	$indicecoluma = 0;
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'CEDULA'); $indicecoluma++;
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'NOMBRE'); $indicecoluma++;
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'CARGO');  $indicecoluma++; 		
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'SUELDO'); $indicecoluma++;					
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'DIAS');   $indicecoluma++;
 	
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][5]!=0){$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'ANTG'); $indicecoluma++;}
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][23]!=0){$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'G. REP'); $indicecoluma++;}
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][22]!=0){$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'PR. TECN'); $indicecoluma++;}
    $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET SAL');   $indicecoluma++;
    
    
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][6]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'SUB TPTE'); $indicecoluma++;
	}
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][7]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'SUB ALIM'); $indicecoluma++;
	}
	
	for ($i=8;$i<22;$i=$i+2){
		if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][$i+1]!=0){
		 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', $Retroactivosnominaliquidaciones->retroactivogeneral[0][$i+1]); $indicecoluma++;
		} 
	}	
	
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][24]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'B. SERV'); $indicecoluma++;
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET BON'); $indicecoluma++;
	}
	if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][24]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'PRIVAC'); $indicecoluma++;
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET PV'); $indicecoluma++;
	}
	
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'T.DESC'); $indicecoluma++;
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'TOTAL');  $indicecoluma++;
	 
	$Mensualnomina = new Mensualnomina;
	//cuerpo de la tabla
	$sumaDescuentos = 0;
	for ($i=1;$i<$rowsgeneral-1;$i++){		
		$Parametrosglobales = new Parametrosglobales; 
        $Mensualnomina->cargarEmpleoPlanta($Retroactivosnominaliquidaciones->retroactivogeneral[$i][27]);
        $anio=$Retroactivosnominaliquidaciones->retroactivogeneral[$i][26];         	 
        $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
        
		$Retroactivosnomina = Retroactivosnomina::model()->findByPk($Retroactivosnominaliquidaciones->retroactivogeneral[$i][26]);
		$Mensualnomina->cargarEmpleoPlanta($Retroactivosnominaliquidaciones->retroactivogeneral[$i][27]);
		$Mensualnomina->valorestablecidos = $Parametrosglobales;
		$devengado = $Retroactivosnominaliquidaciones->getUltimosueldo($Mensualnomina,$Retroactivosnomina);
		$columnsd = count($devengado);
		/*
		$string = ' rn."RANO_ID" = '.$retroactivoNomina.' ';
        $string = ' '.$string.' AND p."PEGE_IDENTIFICACION" =  '."'".$Mensualnomina->Personageneral->PEGE_IDENTIFICACION."'";
	    $Retroactivosnominaliquidaciones->showLiquidacion($string);
        $rowsm = count($Retroactivosnominaliquidaciones->liquidacionmensual);
        $columnsm = count($Retroactivosnominaliquidaciones->liquidacionmensual[1]);
		*/
		$descuentos = $Retroactivosnominaliquidaciones->getDescuentosempleado(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION),$Retroactivosnomina->RANO_ID);
	    $sumaDescuentos = $sumaDescuentos+$descuentos;
		$indicecoluma = 0;
 		if ($i!=($rowsgeneral-1)){
			$nombre = trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).' '.trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE);
 			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION)); $indicecoluma++;
 			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $nombre); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($Mensualnomina->Empleoplanta->EMPL_CARGO)); $indicecoluma++;
 			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($devengado[4])); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivosnominaliquidaciones->retroactivogeneral[$i][2]); $indicecoluma++;
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][5]!=0){$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $devengado[5]); $indicecoluma++;}
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][23]!=0){$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $devengado[23]); $indicecoluma++;}
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][22]!=0){$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $devengado[22]); $indicecoluma++;}
			$retsal=$Retroactivosnominaliquidaciones->retroactivogeneral[$i][4]+$Retroactivosnominaliquidaciones->retroactivogeneral[$i][5]+$Retroactivosnominaliquidaciones->retroactivogeneral[$i][23]+$Retroactivosnominaliquidaciones->retroactivogeneral[$i][22];
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $retsal); $indicecoluma++;
			
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][6]!=0){//Para la sub trasporte
			 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivosnominaliquidaciones->retroactivogeneral[$i][6]); $indicecoluma++;
			}
			
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][7]!=0){//Para la sub alimentacion
			 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivosnominaliquidaciones->retroactivogeneral[$i][7]); $indicecoluma++;
			}
						
			for ($j=8;$j<22;$j=$j+2){
				if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][$j+1]!=0){
				 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivosnominaliquidaciones->retroactivogeneral[$i][$j+1]); $indicecoluma++;
				} 
			}
			
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][24]!=0){//Para la Bonificacion
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $devengado[24]); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivosnominaliquidaciones->retroactivogeneral[$i][24]); $indicecoluma++;
			}
			if ($Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][25]!=0){//para las vacaciones
				$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5),$devengado[25]); $indicecoluma++;
				$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5),$Retroactivosnominaliquidaciones->retroactivogeneral[$i][25]); $indicecoluma++;
			}
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $descuentos); $indicecoluma++;
            $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivosnominaliquidaciones->retroactivogeneral[$i][$columnsgeneral-3]-$descuentos); $indicecoluma++;
			
		}
	 }
	 
	 	 //Lo de abajo de la hoja
	 $objPHPExcel->getActiveSheet()->setCellValue('A'.($rowsgeneral+9), 'VICERRECTOR  ADMINISTRATIVO                         PRESUPUESTO                            TESORERIA                       TALENTO  HUMANO');
	 $sumDeduccionesGenT = $Retroactivosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][$columnsgeneral-3] - $sumaDescuentos;
	 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma-4].($rowsgeneral+5), 'TOTAL');
	 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma-3].($rowsgeneral+5), $rowsgeneral-2);
	 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma-2].($rowsgeneral+5), $sumDeduccionesGenT);
	 $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma-2].($rowsgeneral+5), $sumDeduccionesGenT);
	 $objPHPExcel->getActiveSheet()->mergeCells(''.$nombrecolumnas[$indicecoluma-2].($rowsgeneral+5).':'.$nombrecolumnas[$indicecoluma-1].($rowsgeneral+5)); 
	 $objPHPExcel->getActiveSheet()->getStyle(''.$nombrecolumnas[$indicecoluma-4].($rowsgeneral+5).':'.$nombrecolumnas[$indicecoluma-1].($rowsgeneral+5))->getFont()->setBold(true);
	
	 //Cuadricula
     $objPHPExcel->getActiveSheet()->setShowGridlines(false);
	 //Bordes
	 $styleThinBlackBorderOutline = array(
		'borders' => array(
			'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('argb' => 'FF000000'),
		   ),
		),
	 );
	 
     $objPHPExcel->getActiveSheet()->getStyle(''.$nombrecolumnas[$indicecoluma-4].($rowsgeneral+5).':'.$nombrecolumnas[$indicecoluma-1].($rowsgeneral+5))->applyFromArray($styleThinBlackBorderOutline);
     for ($i=0;$i<$indicecoluma;$i++)
	  $objPHPExcel->getActiveSheet()->getStyle($nombrecolumnas[$i].'5:'.$nombrecolumnas[$i].($rowsgeneral+3))->applyFromArray($styleThinBlackBorderOutline);
	  
	 $objPHPExcel->getActiveSheet()->getStyle('A5:'.$nombrecolumnas[$indicecoluma-1].'5')->applyFromArray($styleThinBlackBorderOutline);	
	 
	 //Formato numerico
	 $objPHPExcel->getActiveSheet()->getStyle('A6:'.$nombrecolumnas[$columnsgeneral-1].($rowsgeneral+6))->getNumberFormat()->setFormatCode('#,##0');
	 
	 //Negrilla
	 $objPHPExcel->getActiveSheet()->getStyle('A1:'.$nombrecolumnas[$columnsgeneral-1].'5')->getFont()->setBold(true);
	 
	 //Tamaño y fuente
	 $objPHPExcel->getActiveSheet()->getStyle('A1:'.$nombrecolumnas[$columnsgeneral].($rowsgeneral+6))->getFont()->setName('Arial');
	 $objPHPExcel->getActiveSheet()->getStyle('A1:'.$nombrecolumnas[$columnsgeneral].($rowsgeneral+6))->getFont()->setSize(8);
	 
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
	 
	 //Ancho columna
	 for ($i=5;$i<$indicecoluma;$i++){
		$objPHPExcel->getActiveSheet()->getColumnDimension($nombrecolumnas[$i])->setWidth(8);
	 }
	 $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
     $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
	 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	 
	 
	 //proteger
	 $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);	// Needs to be set to true in order to enable any worksheet protection!
     $objPHPExcel->getActiveSheet()->protectCells('A1:'.$nombrecolumnas[$indicecoluma].($rowsgeneral+9), 'thumano');
     
	
	//Crea el archivo y modifica el nombre de la hoja
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Ret '.$retroactivoNomina);	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
	$objWriter->save('RETRO_ACTIVO.xlsx');
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="RETRO_ACTIVO-'.$retroactivoNomina.'_'.$Unidades->UNID_NOMBRE.'.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	unset($this->objWriter);
    unset($this->objWorksheet);
    unset($this->objReader);
    unset($this->objPHPExcel);
    Yii::app()->end();
?> 

