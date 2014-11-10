<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');
$sql = 'SELECT e.* FROM empermanente e, empvariable v, nomiprvacaciones pv
WHERE e.idemp = v.idemp  AND v.idemp = pv.idemp
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
   
    $string = 'SELECT pv.*, v.fechamod, v.idestado, n.fechaproceso
                 FROM empvariable v, nvacaciones n, nomiprvacaciones pv
                 WHERE  n.idnomina = pv.idnomina
                 AND v.idemp = pv.idemp
				 
				 /*AND n.idnomina=20121231*/
				 AND n.idnomina=20131131
                 
				 AND v.idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' GROUP BY v.idemp';
				
	$query = mysql_query($string);
    while($rownomina = mysql_fetch_array($query)){
	 
	 $string3 = 'SELECT ep."EMPL_ID"
				FROM "TBL_NOMPERSONASGENERALES" p, "TBL_NOMEMPLEOSPLANTA" ep
				WHERE ep."PEGE_ID" = p."PEGE_ID" AND p."PEGE_IDENTIFICACION" = '."'".$Personasgenerales->PEGE_IDENTIFICACION."' ".'	
				AND ep."EMPL_FECHAINGRESO" ='."'".$rownomina['fechamod']."'".'
                GROUP BY p."PEGE_ID", ep."EMPL_ID", ep."EMPL_FECHAINGRESO"
				ORDER BY ep."EMPL_FECHAINGRESO" ASC';
		  
     $rows3 = $connection->createCommand($string3)->queryAll();
	 foreach($rows3 as $data){
	 echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' - '.$data["EMPL_ID"].' - '.$rownomina["fechamod"].' - '.$rownomina["idnomina"].' - '.$rownomina["idestado"].'<br>';
	     
		 $Primavacacionesnominaliquidaciones = new Primavacacionesnominaliquidaciones;
		 $Primavacacionesnominaliquidaciones->PVNL_CODIGO =  $rownomina[1];
		 $Primavacacionesnominaliquidaciones->PVNL_DIAS =  $rownomina[3];
		 $Primavacacionesnominaliquidaciones->PVNL_PUNTOS =  $rownomina[4];
		 $Primavacacionesnominaliquidaciones->PVNL_SUELDO =  $rownomina[5];
		 $Primavacacionesnominaliquidaciones->PVNL_SALARIO =  $rownomina[6];
		 $Primavacacionesnominaliquidaciones->PVNL_PRIMAANTIGUEDAD =  $rownomina[7];
		 $Primavacacionesnominaliquidaciones->PVNL_TRANSPORTE =  $rownomina[8];
		 $Primavacacionesnominaliquidaciones->PVNL_ALIMENTACION =  $rownomina[9];
		 $Primavacacionesnominaliquidaciones->PVNL_PRIMATECNICA =  $rownomina[10];
		 $Primavacacionesnominaliquidaciones->PVNL_GASTOSRP =  $rownomina[11];
		 $Primavacacionesnominaliquidaciones->PVNL_BONIFICACION =  $rownomina[12];
		 $Primavacacionesnominaliquidaciones->PVNL_SEMESTRAL =  $rownomina[13];
		 $Primavacacionesnominaliquidaciones->PVNL_RETEFUENTE =  $rownomina[14];
		 $Primavacacionesnominaliquidaciones->PVNO_ID =  $rownomina[0];
		 $Primavacacionesnominaliquidaciones->EMPL_ID =  $data["EMPL_ID"];	 
		 $Primavacacionesnominaliquidaciones->PVNL_FECHACAMBIO = $rownomina['fechaproceso'];
		 $Primavacacionesnominaliquidaciones->PVNL_REGISTRADOPOR = Yii::app()->user->id;
		 if(!$Primavacacionesnominaliquidaciones->save()){		 
		  $msg = print_r($Primavacacionesnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msg );
         }
         
		 
		 $sqldescuentosnomina = 'SELECT * FROM nvacacionesdeduccion n WHERE idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' 
		                         AND idnomina = '.$rownomina[0].' AND numero = '.$rownomina[1];				 
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Primavacacionesnominadescuentos = new Primavacacionesnominadescuentos;
         $Primavacacionesnominadescuentos->PVND_VALOR = $rowsqldescuentosnomina["valor"];
		 
		 $iddeduccion = $rowsqldescuentosnomina["iddeduccion"];
		 if($iddeduccion==1){
		  $newiddeduccion = 9;
		 }elseif($iddeduccion==2){
		       $newiddeduccion = 10;
			  }elseif($iddeduccion==3){
		            $newiddeduccion = 11;
			       }elseif($iddeduccion==4){
		                 $newiddeduccion = 12;
			            }
		 
         $Primavacacionesnominadescuentos->DEPR_ID = $newiddeduccion;
         $Primavacacionesnominadescuentos->PVNL_ID = $Primavacacionesnominaliquidaciones->PVNL_ID;
         $Primavacacionesnominadescuentos->PVND_FECHACAMBIO = $Primavacacionesnominaliquidaciones->PVNL_FECHACAMBIO;
         $Primavacacionesnominadescuentos->PVND_REGISTRADOPOR = $Primavacacionesnominaliquidaciones->PVNL_REGISTRADOPOR;
         if(!$Primavacacionesnominadescuentos->save()){
		  $msgpd= print_r($Primavacacionesnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	}	
  }
 $i++;
 }
}
   
?>





