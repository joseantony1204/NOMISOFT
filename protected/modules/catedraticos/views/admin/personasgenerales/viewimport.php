<?php
set_time_limit(0);
/*
$phpExcelPath = Yii::getPathOfAlias('ext.vendors.phpexcel');
spl_autoload_unregister(array('YiiBase','autoload'));
include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);
 
$objPHPExcel = $objReader->load("P12.xlsx");
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
 */
 
/**
*conexion a mysql
*/
mysql_connect('localhost','root','') or die('Ocurrió un error al intentar conectar');
mysql_select_db('catedraticos') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

$sql = 'SELECT e.* FROM empbasico e GROUP BY e.idemp ORDER BY e.nombres ASC';
$rows = mysql_query($sql);
$i = 1; $j = 1;
echo "<h2>IMPORTAR DATOS</h2>";
$PEGE_ID = 1010;
$EMPL_ID = 1010;

while($row = mysql_fetch_array($rows)){
  
 /*
  $Personasgenerales = new Personasgenerales;
  	
  $Personasgenerales->PEGE_ID = $PEGE_ID; 
  $Personasgenerales->PEGE_IDENTIFICACION =  trim($row['idemp']);
  
  
  $Personasgenerales->PEGE_PRIMERAPELLIDO =  trim($PEGE_ID);
  $Personasgenerales->PEGE_SEGUNDOAPELLIDOS =  trim($PEGE_ID);
  $Personasgenerales->PEGE_PRIMERNOMBRE =  trim($PEGE_ID);
  $Personasgenerales->PEGE_SEGUNDONOMBRE =  trim($PEGE_ID);
  
  
  $Personasgenerales->PEGE_FECHAINGRESO =   date('Y-m-d');
  $Personasgenerales->PEGE_DIRECCION =  "";
  $Personasgenerales->PEGE_TELEFONOFIJO = 0;
  $Personasgenerales->PEGE_TELEFONOMOVIL =  trim($row['telefono']);
  $Personasgenerales->PEGE_EMAIL =  trim($row['email']);
  $Personasgenerales->PEGE_NUMEROCUENTA =  trim($row['cuenta']);
  
  $fn = '1900-01-01';
				
  $Personasgenerales->PEGE_FECHANACIMIENTO =  $fn;
  $Personasgenerales->PEGE_LUGAREXPEDIDENTIDAD =  "";
  $Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD = '1900-01-01';
  
  
  $Personasgenerales->TIID_ID =  1;
  $Personasgenerales->SALU_ID =  999;
  $Personasgenerales->PENS_ID =  999;
  $Personasgenerales->SIND_ID =  $row['idsindicato'];
  
  $Personasgenerales->SEXO_ID =  1;
  $Personasgenerales->CATE_ID =  $row['idcategoria']; 
   
  $Personasgenerales->PEGE_FECHACAMBIO =  date('Y-m-d');
  $Personasgenerales->PEGE_REGISTRADOPOR = Yii::app()->user->id;
  
  if($Personasgenerales->save()){
  
  echo $i.' - '.$Personasgenerales->PEGE_ID.' '.$Personasgenerales->PEGE_IDENTIFICACION.'<br>';
  
			//$uploadedFile->saveAs("$realPath/{$nameFile}");
				/*
				//ASIGNADO FACTORES DE RETEFUENTE POR DEFECTO//
				$Personasgenerales->defaultFactoresRetefuente($Personasgenerales->PEGE_ID);				
				//ASIGNADO DESCUENTOS PARA PRESTACIONES POR DEFECTO//
				$Personasgenerales->defaultDescuentosPrestaciones($Personasgenerales->PEGE_ID);
				
				//ASIGNADO NOVEDADES POR DEFECTO PARA LAS PRIMAS, VACACIONES Y CESANTIAS//
				$Personasgenerales->defaultNovedadesPrimaSemestral($Personasgenerales);
				$Personasgenerales->defaultNovedadesPrimaNavidad($Personasgenerales);
				$Personasgenerales->defaultNovedadesPrimaVacaciones($Personasgenerales);
				$Personasgenerales->defaultNovedadesVacaciones($Personasgenerales);
				$Personasgenerales->defaultNovedadesCesantias($Personasgenerales);				
				$Personasgenerales->defaultNovedadesRetroactivo($Personasgenerales);*/
/*			
  }else{
       $msg = print_r($Personasgenerales->getErrors(),1);
       throw new CHttpException(400,'data not saving: '.$msg );
	   }
*/
	   

 $criteria = new CDbCriteria; 
 $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".trim($row['idemp'])."'";
 $Personasgeneral = Personasgenerales::model()->find($criteria);
 if($Personasgenerales = Personasgenerales::model()->findByPk($Personasgeneral->PEGE_ID)){
 
	$string = 'SELECT  c.*
	FROM catedra c
	WHERE c.idemp ='.$Personasgenerales->PEGE_IDENTIFICACION.'
	ORDER BY c.idcatedra DESC';
	$query = mysql_query($string);
	
    while($result = mysql_fetch_array($query)){
     $Catedras = new Catedras;
	 
	            $Catedras->CATE_ID	= $result['idcatedra'];
	            $Catedras->CATE_CATEDRA	= $result['catedra'];
	            $Catedras->CATE_NUMHORAS	= $result['hrscatedra'];
	            $Catedras->CATE_VALORHORA	= $result['vrhora'];
	            $Catedras->PEGE_ID	= $Personasgenerales->PEGE_ID;
	            $Catedras->FACU_ID	= $result['idprograma'];
	            $Catedras->PEAC_ID	= $result['idperiodo'];
	            $Catedras->CATE_ARCHIVO	= 0;
				
                $Catedras->CATE_FECHACAMBIO =  date('Y-m-d');
			    $Catedras->CATE_REGISTRADOPOR =  Yii::app()->user->id;
				if($Catedras->save()){
				 echo $Catedras->CATE_ID.' '.$Catedras->PEGE_ID.'<br>';
				 $Catedras->defaultDescuentosMensuales($Catedras->CATE_ID); 
				}else{
					   $msg = print_r($Catedras->getErrors(),1);
					   throw new CHttpException(400,'data not saving: '.$msg );
					   }
    }
 }
	
	   
$PEGE_ID = $PEGE_ID + 10;
 $i++;
} 
   
 function estadoempleo($persona,$fechaingreso,$estado){

    $sqlestado = 'SELECT  v.*
				FROM empermanente e, empvariable v, nomidevengado nd
				WHERE e.idemp = v.idemp  AND v.idemp = nd.idemp AND v.fechamod = nd.fechamod AND v.idtipo <>3
				AND nd.idemp = '.$persona.'
				GROUP BY v.idemp, v.fechamod
				ORDER BY v.fechamod DESC
				LIMIT 1';
				$queryestado = mysql_query($sqlestado);
				while($resultestado = mysql_fetch_array($queryestado)){
				 if($resultestado['fechamod']==$fechaingreso){
				  if($estado==1){
				   $estado =1;
				  }else{
				        $estado = $estado;
					   }
				 }else{
				      $estado = 3;
					  }
				}
				

return $estado;
}   
   
?>