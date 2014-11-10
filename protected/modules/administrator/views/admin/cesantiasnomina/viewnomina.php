l<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql

(20121271, 'LIQUIDACION CESANTIAS DEL 2012', '2012-12-30', '1', '2012', '2012-12-30', 1),
(20131271, 'LIQUIDACION CESANTIAS DEL 2013', '2013-12-27', '1', '2013', '2013-12-27', 1);
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

$sql = 'SELECT e.* FROM empermanente e, empvariable v, tbl_liqui_cesantias nv
WHERE e.idemp = v.idemp  AND v.idemp = nv.idemp AND v.fechamod = nv.noce_fechamod
GROUP BY e.idemp';

$rows = mysql_query($sql);
$i = 1;
while($row = mysql_fetch_array($rows)){
 $criteria = new CDbCriteria;
 $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".$row[0]."'";
 $Personasgeneral = Personasgenerales::model()->find($criteria);
 if($Personasgenerales = Personasgenerales::model()->findByPk($Personasgeneral->PEGE_ID)){
 // echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' '.$Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.'<br>';
   
   //recuperar descuentos mensuales en nomina//  
   
    $string = 'SELECT nv.*, v.idestado, n.noce_fecha_proceso
                 FROM empermanente e, empvariable v, tbl_nomi_cesantias n, tbl_liqui_cesantias nv
                 WHERE e.idemp = v.idemp  AND n.noce_id = nv.noce_id
                 AND v.idemp = nv.idemp AND v.fechamod = nv.noce_fechamod
				 
				 /*AND n.noce_id=20121271*/
                 
				AND n.noce_id = 20131271
                 
				 AND e.idemp = '.$Personasgenerales->PEGE_IDENTIFICACION;
				
	$query = mysql_query($string);
    while($rownomina = mysql_fetch_array($query)){
	 
	 $string3 = 'SELECT ep."EMPL_ID"
				FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep
				WHERE ep."PEGE_ID" = p."PEGE_ID" AND p."PEGE_IDENTIFICACION" = '."'".$Personasgenerales->PEGE_IDENTIFICACION."' ".'	
				AND ep."EMPL_FECHAINGRESO" ='."'".$rownomina['noce_fechamod']."'".'
                GROUP BY p."PEGE_ID", ep."EMPL_ID", ep."EMPL_FECHAINGRESO"
				ORDER BY ep."EMPL_FECHAINGRESO" ASC';
		  
     $rows3 = $connection->createCommand($string3)->queryAll();
	 foreach($rows3 as $data){
	 echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' - '.$data["EMPL_ID"].' - '.$rownomina["noce_fechamod"].' - '.$rownomina["idnomina"].' - '.$rownomina["idestado"].'<br>';
	     
		 $Cesantiasnominaliquidaciones = new Cesantiasnominaliquidaciones;
		 $Cesantiasnominaliquidaciones->CENL_CODIGO =  $rownomina[1];
		 $Cesantiasnominaliquidaciones->CENL_DIAS =  $rownomina[3];
		 $Cesantiasnominaliquidaciones->CENL_PUNTOS =  $rownomina[4];
		 $Cesantiasnominaliquidaciones->CENL_SUELDO =  $rownomina[5];
		 $Cesantiasnominaliquidaciones->CENL_SALARIO =  $rownomina[5];
		 $Cesantiasnominaliquidaciones->CENL_PRIMAANTIGUEDAD =  $rownomina[6];
		 $Cesantiasnominaliquidaciones->CENL_TRANSPORTE =  $rownomina[9];
		 $Cesantiasnominaliquidaciones->CENL_ALIMENTACION =  $rownomina[10];
		 $Cesantiasnominaliquidaciones->CENL_PRIMATECNICA =  $rownomina[8];
		 $Cesantiasnominaliquidaciones->CENL_GASTOSRP =  $rownomina[7];
		 $Cesantiasnominaliquidaciones->CENL_BONIFICACION =  $rownomina[13];
		 $Cesantiasnominaliquidaciones->CENL_HORASEXTRAS =  $rownomina[11];
		 $Cesantiasnominaliquidaciones->CENL_SEMESTRAL =  $rownomina[12];
		 $Cesantiasnominaliquidaciones->CENL_PRIMAVACACIONES =  $rownomina[14];
		 $Cesantiasnominaliquidaciones->CENL_PRIMANAVIDAD =  $rownomina[15];
		 $Cesantiasnominaliquidaciones->CENO_ID =  $rownomina[0];
		 $Cesantiasnominaliquidaciones->EMPL_ID =  $data["EMPL_ID"];
		 $Cesantiasnominaliquidaciones->CENL_FECHACAMBIO = $rownomina['noce_fecha_proceso'];
		 $Cesantiasnominaliquidaciones->CENL_REGISTRADOPOR =  Yii::app()->user->id; 
		 
		 if(!$Cesantiasnominaliquidaciones->save()){		 
		  $msg = print_r($Cesantiasnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data cesantias not saving: '.$msg );
         }
	}	
  }
 $i++;
 }
}
   
?>





