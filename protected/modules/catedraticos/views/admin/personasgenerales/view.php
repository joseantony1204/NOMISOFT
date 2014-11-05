<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql
*/
mysql_connect('localhost','root','') or die('Ocurrió un error al intentar conectar');
mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');
$sql = 'SELECT e.* FROM empermanente e, empvariable v, nomidevengado nd 
        WHERE e.idemp = v.idemp  AND v.idemp = nd.idemp AND v.fechamod = nd.fechamod
		GROUP BY e.idemp';
$rows = mysql_query($sql);
$i = 1;
while($row = mysql_fetch_array($rows)){
 $criteria = new CDbCriteria;
 $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".$row[0]."'";
 $Personasgeneral = Personasgenerales::model()->find($criteria);
 if($Personasgenerales = Personasgenerales::model()->findByPk($Personasgeneral->PEGE_ID)){
 // echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' '.$Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.'<br>';
 
    $string = 'SELECT  v.*
	FROM empermanente e, empvariable v, nomidevengado nd
	WHERE e.idemp = v.idemp  AND v.idemp = nd.idemp AND v.fechamod = nd.fechamod AND v.idtipo <>3
	AND nd.idemp ='.$Personasgenerales->PEGE_IDENTIFICACION.'
	GROUP BY v.idemp, v.fechamod
	ORDER BY v.fechamod DESC
	LIMIT 1';
	$query = mysql_query($string);
    while($result = mysql_fetch_array($query)){
	 
	 $string3 = 'SELECT ep."EMPL_ID"
				FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep
				WHERE ep."PEGE_ID" = p."PEGE_ID" AND p."PEGE_IDENTIFICACION" = '."'".$Personasgenerales->PEGE_IDENTIFICACION."' ".'	
				AND ep."EMPL_FECHAINGRESO" ='."'".$result['fechamod']."'".'
                GROUP BY p."PEGE_ID", ep."EMPL_ID", ep."EMPL_FECHAINGRESO"
				ORDER BY ep."EMPL_FECHAINGRESO" ASC';
		  
     $rows3 = $connection->createCommand($string3)->queryAll();
	 foreach($rows3 as $data){
	 echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' - '.$data["EMPL_ID"].' - '.$result["fechamod"].' - '.$result["idestado"].'<br>';
	
  //recuperar novedades mensuales en nomina//
  
  $sqldescuentos = 'SELECT idemp, ideduccion, valor FROM empdeduccion WHERE valor!=0 AND idemp = '.$Personasgenerales->PEGE_IDENTIFICACION;
  $rowsdescuentos = mysql_query($sqldescuentos);
  while($rowdescuentos = mysql_fetch_array($rowsdescuentos)){  
   if($rowdescuentos[1]==1){
    $criteria = new CDbCriteria;
    $criteria->condition = ' "PEGE_ID" = '.$Personasgenerales->PEGE_ID.' AND "FARE_ID" = '.$rowdescuentos[1];
    $Descuentoretefuente = Descuentosretefuente::model()->find($criteria);
    if($Descuentosretefuente = Descuentosretefuente::model()->findByPk($Descuentoretefuente->DERE_ID)){
	 $Descuentosretefuente->DERE_VALOR = $rowdescuentos[2];
     $Descuentosretefuente->save();
    }
   }else{
	     $criteria = new CDbCriteria;
         $criteria->condition = ' "EMPL_ID" = '.$data["EMPL_ID"].' AND "DEME_ID" = '.$rowdescuentos[1];
         $Novedadmensual = Novedadesmensuales::model()->find($criteria);
         if($Novedadesmensuales = Novedadesmensuales::model()->findByPk($Novedadmensual->NOME_ID)){
	      $Novedadesmensuales->NOME_VALOR = $rowdescuentos[2];
          $Novedadesmensuales->save();
         }		 
		} 
    }
  
   }	
 }
  
  $i++;
 }
}
   
?>





