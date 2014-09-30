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
mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

$sql = 'SELECT e.*, v.idemp, nd.idemp, v.fechamod,  nd.fechamod, v.idtipo, v.idestado,
(SELECT c.fecha_nacimiento FROM cumpleanos c WHERE c.idemp = e.idemp) AS fechanac,
(SELECT c.cesa_id FROM tbl_empl_cesantias c WHERE c.idemp = e.idemp) cesantias,
SUM(v.idemp-nd.idemp) AS DIFIDENT, SUM(v.fechamod-nd.fechamod) AS DIFFECHA
FROM empermanente e, empvariable v, nomidevengado nd
WHERE e.idemp = v.idemp  AND v.idemp = nd.idemp AND v.fechamod = nd.fechamod AND v.idtipo <>3
GROUP BY e.idemp
ORDER BY e.fechaent ASC';
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
  
  
  $Personasgenerales->PEGE_FECHAINGRESO =  trim($row['fechaent']);
  $Personasgenerales->PEGE_DIRECCION =  "";
  $Personasgenerales->PEGE_TELEFONOFIJO = 0;
  $Personasgenerales->PEGE_TELEFONOMOVIL =  trim($row['telefono']);
  $Personasgenerales->PEGE_EMAIL =  trim($row['email']);
  $Personasgenerales->PEGE_NUMEROCUENTA =  trim($row['cuenta']);
  
  if((($row['fechanac'])=='0000-00-00') or (($row['fechanac'])=='')){
	$fn = '1900-01-01';
   }else{ $fn = $row['fechanac']; }
				
  $Personasgenerales->PEGE_FECHANACIMIENTO =  $fn;
  $Personasgenerales->PEGE_LUGAREXPEDIDENTIDAD =  "";
  $Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD = '1900-01-01';
  
  $Personasgenerales->PEGE_FOTO =  "/";
  
  $Personasgenerales->TIID_ID =  1;
  $Personasgenerales->SALU_ID =  $row['idseguro'];
  $Personasgenerales->PENS_ID =  $row['idpension'];
  $Personasgenerales->SIND_ID =  $row['idsindicato'];
  
  $Personasgenerales->SEXO_ID =  1;
  $Personasgenerales->PAIS_ID =  "";
  $Personasgenerales->DEPA_ID =  "";
  $Personasgenerales->MUNI_ID =  "";
  $Personasgenerales->GRSA_ID =  "";
  $Personasgenerales->ESCI_ID =  "";
  
  if((($row['cesantias'])==5) or (($row['cesantias'])=='')){
   $cesa = 999;
  }else{
       $cesa = $row['cesantias'];
	   } 
  
  $Personasgenerales->CESA_ID =  $cesa; 
  $Personasgenerales->PEGE_FECHACAMBIO =  $row['fechaent'];
  $Personasgenerales->PEGE_REGISTRADOPOR = Yii::app()->user->id;
  
  if($Personasgenerales->save()){
  
  echo $i.' - '.$Personasgenerales->PEGE_ID.' '.$Personasgenerales->PEGE_IDENTIFICACION.'<br>';
  
			//$uploadedFile->saveAs("$realPath/{$nameFile}");
				
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
				$Personasgenerales->defaultNovedadesRetroactivo($Personasgenerales);
				
  }else{
       $msg = print_r($Personasgenerales->getErrors(),1);
       throw new CHttpException(400,'data not saving: '.$msg );
	   }

	   
*/
 $criteria = new CDbCriteria; 
 $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".trim($row['idemp'])."'";
 $Personasgeneral = Personasgenerales::model()->find($criteria);
 if($Personasgenerales = Personasgenerales::model()->findByPk($Personasgeneral->PEGE_ID)){
 
	$string = 'SELECT  v.*
	FROM empermanente e, empvariable v, nomidevengado nd
	WHERE e.idemp = v.idemp  AND v.idemp = nd.idemp AND v.fechamod = nd.fechamod AND v.idtipo <>3
	AND nd.idemp ='.$Personasgenerales->PEGE_IDENTIFICACION.'
	GROUP BY v.idemp, v.fechamod
	ORDER BY v.fechamod DESC';
	$query = mysql_query($string);
    while($result = mysql_fetch_array($query)){
     $Empleosplanta = new Empleosplanta;
     $Estadosempleosplanta = new Estadosempleosplanta;
     $Factoressalariales = new Factoressalariales;
     $Horasextrasyrecargos = new Horasextrasyrecargos; 
	 
	            $Empleosplanta->EMPL_ID	= $EMPL_ID;
	            $Empleosplanta->PEGE_ID	= $Personasgenerales->PEGE_ID;
				
				$Empleosplanta->EMPL_FECHAINGRESO =  $result['fechamod'];
				$Empleosplanta->EMPL_CARGO =  trim($result['cargo']);
				$Empleosplanta->EMPL_SUELDO =  trim($result['sueldo']);
				$Empleosplanta->EMPL_PUNTOS =  trim($result['puntos']);
				$Empleosplanta->EMPL_DIASAPAGAR =  30;
				
				if(($result['primatecnica'])==0){
				 $pt = 1;
				}elseif(($result['primatecnica'])==30){
				 $pt = 2;
				}elseif(($result['primatecnica'])==40){
				 $pt = 3;
				}elseif(($result['primatecnica'])==50){
				 $pt = 4;
				}
				
				if(($result['gastosrepre'])==0){
				 $gr = 1;
				}elseif(($result['gastosrepre'])==30){
				 $gr = 2;
				}elseif(($result['gastosrepre'])==40){
				 $gr = 3;
				}elseif(($result['gastosrepre'])==50){
				 $gr = 4;
				}
				
				$Empleosplanta->PRTE_ID =  $pt;				
				$Empleosplanta->GARE_ID =  $gr;
				
				$Empleosplanta->TICA_ID =  $result['idtipo'];
				$Empleosplanta->GRAD_ID =  "";
				$Empleosplanta->NIVE_ID =  "";
				$Empleosplanta->UNID_ID =  (int)($result['idunidad']);							
                $Empleosplanta->EMPL_FECHACAMBIO =  $Empleosplanta->EMPL_FECHAINGRESO;
			    $Empleosplanta->EMPL_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
				$Empleosplanta->save();
				
				//buscar el ultimo cargo del empleado para colocarle inactivo a los demas que halla tenido//
				$estado = estadoempleo($Personasgenerales->PEGE_IDENTIFICACION,$Empleosplanta->EMPL_FECHAINGRESO,$result['idestado']);				
				//$Estadosempleosplanta->ESEM_ID =$result['idestado'];
				$Estadosempleosplanta->ESEM_ID =$estado;
	               if($Personasgenerales->PEGE_IDENTIFICACION==84070453){ echo 'aqui';}
                   echo $i.' - '.$j.' - '.
	               $Empleosplanta->EMPL_ID.' - '.
	               $Personasgenerales->PEGE_IDENTIFICACION.' - '.
	               $Empleosplanta->PEGE_ID.' - '.
				   $Empleosplanta->EMPL_FECHAINGRESO.' - '.
				   $Empleosplanta->EMPL_CARGO.' - '.
				   $Empleosplanta->EMPL_SUELDO.' - '.
				   $Empleosplanta->EMPL_PUNTOS.' - '.
				   $Empleosplanta->EMPL_DIASAPAGAR.' - '.
				   $Empleosplanta->PRTE_ID.' - '.
				   $Empleosplanta->GARE_ID.' - '.
				   $Empleosplanta->TICA_ID.' - '.
				   $Empleosplanta->GRAD_ID.' - '.
				   $Empleosplanta->NIVE_ID.' - '.
				   $Empleosplanta->UNID_ID.' - estado -->'.
				   $Estadosempleosplanta->ESEM_ID.'<br>';
				 	
					
				    //AGREGANDO EL ESTADO DEL CARGO//
					$Estadosempleosplanta->EMPL_ID = $Empleosplanta->EMPL_ID;
					//$Estadosempleosplanta->ESEM_ID = $result['idestado'];
				    $Estadosempleosplanta->ESEP_FECHAREGISTRO = $Empleosplanta->EMPL_FECHAINGRESO;				    
					$Estadosempleosplanta->ESEP_FECHACAMBIO =  $Empleosplanta->EMPL_FECHAINGRESO;
			        $Estadosempleosplanta->ESEP_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					
					$Estadosempleosplanta->save();
					
					//ASIGNADO DESCUENTOS MENSUALES POR DEFECTO//	
					$Empleosplanta->defaultDescuentosMensuales($Empleosplanta->EMPL_ID);
					
					//AGREGANDO LOS FACTORES SALARIALES//
					$Factoressalariales->FASA_SUBTRANSPORTE = "t";
					$Factoressalariales->FASA_SUBALIMIENTACION = "t";
					$Factoressalariales->FASA_BSP = "t";
					$Factoressalariales->FASA_PRIMAVACACIONES = "t";
					$Factoressalariales->FASA_SUBSISTENCIA = "t";
					$Factoressalariales->FASA_ESTAMPILLA = "t";
					$Factoressalariales->FASA_RETEFUENTE = "t";
					$Factoressalariales->FASA_FSP = "t";					
					$Factoressalariales->EMPL_ID = $Empleosplanta->EMPL_ID;					
					$Factoressalariales->FASA_FECHACAMBIO =  $Personasgenerales->PEGE_FECHACAMBIO;
			        $Factoressalariales->FASA_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					$Factoressalariales->save();
					
					//AGREGANDO LAS INFORMACION DE HORAS EXTRAS//
					$Horasextrasyrecargos->HOER_HED = 0;
					$Horasextrasyrecargos->HOER_HEN = 0;
					$Horasextrasyrecargos->HOER_HEDF = 0;
					$Horasextrasyrecargos->HOER_HENF = 0;
					$Horasextrasyrecargos->HOER_DYF = 0;
					$Horasextrasyrecargos->HOER_REN = 0;
					$Horasextrasyrecargos->HOER_RENDYF = 0;					
					$Horasextrasyrecargos->EMPL_ID = $Empleosplanta->EMPL_ID;					
					$Horasextrasyrecargos->HOER_FECHACAMBIO =  $Personasgenerales->PEGE_FECHACAMBIO;
			        $Horasextrasyrecargos->HOER_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					$Horasextrasyrecargos->save();
					
					
     $j++;	
     $EMPL_ID = $EMPL_ID + 10;  
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