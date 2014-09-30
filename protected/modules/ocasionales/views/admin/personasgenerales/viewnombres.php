<?php
set_time_limit(0);

$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);
 
$objPHPExcel = $objReader->load("EMPL.xlsx");
$objWorksheet = $objPHPExcel->getActiveSheet();
 
$j=0;  
foreach ($objWorksheet->getRowIterator() as $row) {
 $cellIterator = $row->getCellIterator();
 $cellIterator->setIterateOnlyExistingCells(false); 
 $i=0;
 foreach ($cellIterator as $cell) {
  $data[$j][$i] = $cell->getValue();
  $i++;
  }
 $j++;
}
 $x = 1;
echo "<h2>IMPORTAR DATOS</h2>";
 for($k=0;$k<count($data);$k++){
 $criteria = new CDbCriteria; 
 $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".trim($data[$k][0])."'";
 $Personasgeneral = Personasgenerales::model()->find($criteria);
 if($Personasgenerales = Personasgenerales::model()->findByPk($Personasgeneral->PEGE_ID)){ 
 
  $Personasgenerales->PEGE_IDENTIFICACION =  trim($data[$k][0]);
  $Personasgenerales->PEGE_PRIMERAPELLIDO =  trim($data[$k][2]);
  $Personasgenerales->PEGE_SEGUNDOAPELLIDOS =  trim($data[$k][3]);
  $Personasgenerales->PEGE_PRIMERNOMBRE =  trim($data[$k][4]);
  $Personasgenerales->PEGE_SEGUNDONOMBRE =  trim($data[$k][5]);
  $Personasgenerales->PEGE_EMAIL =  trim($Personasgenerales->PEGE_EMAIL);
  
 if($Personasgenerales->save()){  
   echo $x.' - '.$Personasgenerales->PEGE_ID.' '.$Personasgenerales->PEGE_IDENTIFICACION.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_EMAIL.'<br>';   
   }else{
       $msg = print_r($Personasgenerales->getErrors(),1);
       throw new CHttpException(400,'data not saving: '.$msg );
	   }
 $x++; 
 }
}
   
?>