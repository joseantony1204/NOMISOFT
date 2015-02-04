<?php 
$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$rowsgeneral = count($Retroactivospuntosnominaliquidaciones->retroactivogeneral);
$columnsgeneral = count($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1]);
$Retroactivospuntosnomina = Retroactivospuntosnomina::model()->findByPk($retroactivoNomina);

$tblD = $Retroactivospuntosnominaliquidaciones->descuentos;
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
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'RETROACTIVO DE PUNTOS '.$Retroactivospuntosnomina->RPNO_PERIODO.'');
$Unidades = Unidades::model()->findByPk($unidad);					
$objPHPExcel->getActiveSheet()->setCellValue('A3', 'UNIDAD '.$Unidades->UNID_ID.' '.$Unidades->UNID_NOMBRE);

    //Titulos de la tabla
	$indicecoluma = 0;
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'CEDULA'); $indicecoluma++;
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'NOMBRE'); $indicecoluma++;
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'CARGO');  $indicecoluma++; 		
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'PUNTOS '.$Retroactivospuntosnomina->RPNO_ID); $indicecoluma++;					
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'SUELDO'); $indicecoluma++;					
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'MESES');   $indicecoluma++;
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'PUNTOS');   $indicecoluma++;
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'VALOR PUNTOS');   $indicecoluma++;
 	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET SUELDO');   $indicecoluma++;
 	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][5]!=0)
	{
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'ANTG'); $indicecoluma++;
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET ANT'); $indicecoluma++;
    }
	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][6]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'B. SERV'); $indicecoluma++;
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET BON'); $indicecoluma++;
	}
	
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET SAL');   $indicecoluma++;
    
	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][7]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET PS'); $indicecoluma++;
	}
	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][8]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET PV'); $indicecoluma++;
	}
	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][9]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET V'); $indicecoluma++;
	}
	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][10]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET PN'); $indicecoluma++;
	}
	
	if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][11]!=0){
		$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'RET C'); $indicecoluma++;
	}
	
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'T.DESC'); $indicecoluma++;
	$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].'5', 'TOTAL');  $indicecoluma++;
	 
	$Mensualnomina = new Mensualnomina;
	//cuerpo de la tabla
	$sumaDescuentos = 0;
	for ($i=1;$i<$rowsgeneral-1;$i++){		
		$Parametrosglobales = new Parametrosglobales; 
        $Mensualnomina->cargarEmpleoPlanta($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][13]);
        $anio=$Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][12];         	 
        $Parametrosglobales = $Parametrosglobales->getParametrosglobales($anio);
        
		$Retroactivospuntosnomina = Retroactivospuntosnomina::model()->findByPk($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][12]);
		$Mensualnomina->cargarEmpleoPlanta($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][13]);
		$Mensualnomina->valorestablecidos = $Parametrosglobales;
		$devengado = $Retroactivospuntosnominaliquidaciones->getUltimosueldo($Mensualnomina,$Retroactivospuntosnomina);
		$columnsd = count($devengado);
		
		$descuentos = $Retroactivospuntosnominaliquidaciones->getDescuentosempleado(trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION),$Retroactivospuntosnomina->RPNO_ID);
	    $sumaDescuentos = $sumaDescuentos+$descuentos;
		$indicecoluma = 0;
 		if ($i!=($rowsgeneral-1)){
			$nombre = trim($Mensualnomina->Personageneral->PEGE_PRIMERAPELLIDO).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDOAPELLIDOS).' '.trim($Mensualnomina->Personageneral->PEGE_PRIMERNOMBRE).' '.trim($Mensualnomina->Personageneral->PEGE_SEGUNDONOMBRE);
 			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($Mensualnomina->Personageneral->PEGE_IDENTIFICACION)); $indicecoluma++;
 			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $nombre); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($Mensualnomina->Empleoplanta->EMPL_CARGO)); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($Mensualnomina->Empleoplanta->EMPL_PUNTOS)); $indicecoluma++;
 			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), trim($devengado[4])); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][2]); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnomina->RPNO_PUNTOS); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnomina->RPNO_VALORPUNTO); $indicecoluma++;
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][4]!=0){//Para el sueldo
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][4]); $indicecoluma++;
			}
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][5]!=0){//Para el sueldo
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $devengado[5]); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][5]); $indicecoluma++;
			}
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][6]!=0){//Para el sueldo
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $devengado[6]); $indicecoluma++;
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][6]); $indicecoluma++;
			}
			
			$retsal=$Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][4]+$Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][5]+$Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][6];
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $retsal); $indicecoluma++;
			
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][7]!=0){//Para semestral
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][7]); $indicecoluma++;
			}
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][8]!=0){//Para p vacaciones
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][8]); $indicecoluma++;
			}
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][9]!=0){//Para vacaciones
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][9]); $indicecoluma++;
			}
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][10]!=0){//Para p navidad
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][10]); $indicecoluma++;
			}
			
			if ($Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][11]!=0){//Para cesantias
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][11]); $indicecoluma++;
			}
			
			$objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $descuentos); $indicecoluma++;
            $objPHPExcel->getActiveSheet()->setCellValue(''.$nombrecolumnas[$indicecoluma].($i+5), $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$i][$columnsgeneral-3]-$descuentos); $indicecoluma++;
			
		}
	 }
	 
	 	 //Lo de abajo de la hoja
	 $objPHPExcel->getActiveSheet()->setCellValue('A'.($rowsgeneral+9), 'VICERRECTOR  ADMINISTRATIVO                         PRESUPUESTO                            TESORERIA                       TALENTO  HUMANO');
	 $sumDeduccionesGenT = $Retroactivospuntosnominaliquidaciones->retroactivogeneral[$rowsgeneral-1][$columnsgeneral-3] - $sumaDescuentos;
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
	 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
	 
	 
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
	header('Content-Disposition: attachment;filename="RETRO_ACTIVOPUNTOS-'.$retroactivoNomina.'_'.$Unidades->UNID_NOMBRE.'.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	unset($this->objWriter);
    unset($this->objWorksheet);
    unset($this->objReader);
    unset($this->objPHPExcel);
    Yii::app()->end();
?> 

