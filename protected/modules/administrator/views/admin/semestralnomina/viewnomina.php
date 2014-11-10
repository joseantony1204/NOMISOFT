<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');
$sql = 'SELECT e.* FROM empermanente e, empvariable v, nomisemestral ns
WHERE e.idemp = v.idemp  AND v.idemp = ns.idemp AND v.fechamod = ns.fechamod 
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
   
    $string = 'SELECT ns.*, v.idestado, n.fechaproceso
                 FROM empermanente e, empvariable v, nsemestral n, nomisemestral ns
                 WHERE e.idemp = v.idemp  AND n.idnomina = ns.idnomina
                 AND v.idemp = ns.idemp AND v.fechamod = ns.fechamod
				 
				 /*AND n.idnomina>=20120611 AND n.idnomina <=20120611*/
                 
				 /*AND n.idnomina>=20130611 AND n.idnomina <=20130611*/
				 
				 AND n.idnomina>=20140611 AND n.idnomina <=20140611
                 
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
	     
		 $Semestralnominaliquidaciones = new Semestralnominaliquidaciones;
		 $Semestralnominaliquidaciones->SENL_CODIGO =  $rownomina[1];
		 $Semestralnominaliquidaciones->SENL_MESES = $rownomina[3];
		 $Semestralnominaliquidaciones->SENL_PUNTOS = $rownomina[4];
		 $Semestralnominaliquidaciones->SENL_SALARIO = $rownomina[6];
		 $Semestralnominaliquidaciones->SENL_PRIMAANTIGUEDAD = $rownomina[7];
		 $Semestralnominaliquidaciones->SENL_TRANSPORTE = $rownomina[8];
		 $Semestralnominaliquidaciones->SENL_ALIMENTACION = $rownomina[9];
		 $Semestralnominaliquidaciones->SENL_PRIMATECNICA = $rownomina[10];
		 $Semestralnominaliquidaciones->SENL_GASTOSRP = $rownomina[11];
		 $Semestralnominaliquidaciones->SENL_BONIFICACION = $rownomina[12];
		 $Semestralnominaliquidaciones->SENL_RETEFUENTE = $rownomina[13];
		 $Semestralnominaliquidaciones->SENO_ID = $rownomina[0];
		 $Semestralnominaliquidaciones->EMPL_ID = $data["EMPL_ID"];	 
		 $Semestralnominaliquidaciones->SENL_FECHACAMBIO = $rownomina['fechaproceso'];
		 $Semestralnominaliquidaciones->SENL_REGISTRADOPOR = Yii::app()->user->id;
		 if(!$Semestralnominaliquidaciones->save()){		 
		  $msg = print_r($Semestralnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msg );
         }
         
		 
		 $sqldescuentosnomina = 'SELECT * FROM nsemestraldeduccion n WHERE idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' 
		                         AND idnomina = '.$rownomina[0].' AND numero = '.$rownomina[1];				 
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Semestralnominadescuentos = new Semestralnominadescuentos;
         $Semestralnominadescuentos->SEND_VALOR = $rowsqldescuentosnomina["valor"];
         $Semestralnominadescuentos->DEPR_ID = $rowsqldescuentosnomina["iddeduccion"];
         $Semestralnominadescuentos->SENL_ID = $Semestralnominaliquidaciones->SENL_ID;
         $Semestralnominadescuentos->SEND_FECHACAMBIO = $Semestralnominaliquidaciones->SENL_FECHACAMBIO;
         $Semestralnominadescuentos->SEND_REGISTRADOPOR = $Semestralnominaliquidaciones->SENL_REGISTRADOPOR;
         if(!$Semestralnominadescuentos->save()){
		  $msgpd= print_r($Semestralnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	}	
  }
 $i++;
 }
}
   
?>





