l<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql

(20121241, 'VACACIONES 2012', '2012-12-19', '1', '2012', '2012-12-19', 1),
(20131241, 'VACACIONES 2013', '2013-12-19', '1', '2013', '2013-12-19', 1);
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

$sql = 'SELECT e.* FROM empermanente e, empvariable v, nomivacaciones nv
WHERE e.idemp = v.idemp  AND v.idemp = nv.idemp AND v.fechamod = nv.fechamod
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
   
    $string = 'SELECT nv.*, v.idestado, n.fechaproceso
                 FROM empermanente e, empvariable v, vacaciones n, nomivacaciones nv
                 WHERE e.idemp = v.idemp  AND n.idnomina = nv.idnomina
                 AND v.idemp = nv.idemp AND v.fechamod = nv.fechamod
				 
				 /*AND n.idnomina=20121241*/
                 
				AND n.idnomina = 20131241
                 
				 AND e.idemp = '.$Personasgenerales->PEGE_IDENTIFICACION;
				
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
	     
		 $Vacacionesnominaliquidaciones = new Vacacionesnominaliquidaciones;
		 $Vacacionesnominaliquidaciones->VANL_CODIGO =  $rownomina[1];
		 $Vacacionesnominaliquidaciones->VANL_DIAS =  $rownomina[3];
		 $Vacacionesnominaliquidaciones->VANL_PUNTOS =  $rownomina[4];
		 $Vacacionesnominaliquidaciones->VANL_SUELDO =  $rownomina[5];
		 $Vacacionesnominaliquidaciones->VANL_SALARIO =  $rownomina[6];
		 $Vacacionesnominaliquidaciones->VANL_PRIMAANTIGUEDAD =  $rownomina[7];
		 $Vacacionesnominaliquidaciones->VANL_TRANSPORTE =  $rownomina[8];
		 $Vacacionesnominaliquidaciones->VANL_ALIMENTACION =  $rownomina[9];
		 $Vacacionesnominaliquidaciones->VANL_PRIMATECNICA =  $rownomina[10];
		 $Vacacionesnominaliquidaciones->VANL_GASTOSRP =  $rownomina[11];
		 $Vacacionesnominaliquidaciones->VANL_BONIFICACION =  $rownomina[12];
		 $Vacacionesnominaliquidaciones->VANL_SEMESTRAL =  $rownomina[13];
		 $Vacacionesnominaliquidaciones->VANL_RETEFUENTE =  $rownomina[14];
		 $Vacacionesnominaliquidaciones->VANO_ID =  $rownomina[0];
		 $Vacacionesnominaliquidaciones->EMPL_ID =  $data["EMPL_ID"];
		 $Vacacionesnominaliquidaciones->VANL_FECHACAMBIO =  $rownomina['fechaproceso'];
		 $Vacacionesnominaliquidaciones->VANL_REGISTRADOPOR =  Yii::app()->user->id;  
		 
		 if(!$Vacacionesnominaliquidaciones->save()){		 
		  $msg = print_r($Vacacionesnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data vacaciones not saving: '.$msg );
         }
         
		 
		 $sqldescuentosnomina = 'SELECT * FROM nvacadeduccion n WHERE idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' 
		                         AND idnomina = '.$rownomina[0].' AND numero = '.$rownomina[1];				 
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Vacacionesnominadescuentos = new Vacacionesnominadescuentos;
         $Vacacionesnominadescuentos->VAND_VALOR = $rowsqldescuentosnomina["valor"];
		 
		 $iddeduccion = $rowsqldescuentosnomina["iddeduccion"];
		 if($iddeduccion==1){
		  $newiddeduccion = 13;
		 }elseif($iddeduccion==2){
		       $newiddeduccion = 14;
			  }elseif($iddeduccion==3){
		            $newiddeduccion = 15;
			       }elseif($iddeduccion==4){
		                 $newiddeduccion = 16;
			            }
		 
         $Vacacionesnominadescuentos->DEPR_ID = $newiddeduccion;
         $Vacacionesnominadescuentos->VANL_ID = $Vacacionesnominaliquidaciones->VANL_ID;
         $Vacacionesnominadescuentos->VAND_FECHACAMBIO = $Vacacionesnominaliquidaciones->VANL_FECHACAMBIO;
         $Vacacionesnominadescuentos->VAND_REGISTRADOPOR = $Vacacionesnominaliquidaciones->VANL_REGISTRADOPOR;
         if(!$Vacacionesnominadescuentos->save()){
		  $msgpd= print_r($Vacacionesnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	}	
  }
 $i++;
 }
}
   
?>





