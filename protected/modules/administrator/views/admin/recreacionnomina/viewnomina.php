l<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql

(20121251, 'RECREACION DE 2012', '2012-12-14', '1', '2012', '2012-12-14', 1),
(20131251, 'RECREACION DE 2013', '2013-12-19', '1', '2013', '2013-12-19', 1);
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

$sql = 'SELECT e.* FROM empermanente e, empvariable v, nomirecreacion nv
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
                 FROM empermanente e, empvariable v, nrecreacion n, nomirecreacion nv
                 WHERE e.idemp = v.idemp  AND n.idnomina = nv.idnomina
                 AND v.idemp = nv.idemp AND v.fechamod = nv.fechamod
				 
				 /*AND n.idnomina=20121251*/
                 
				AND n.idnomina = 20131251
                 
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
	     
		 $Recreacionnominaliquidaciones = new Recreacionnominaliquidaciones;
		 $Recreacionnominaliquidaciones->RENL_CODIGO =  $rownomina[1];
		 $Recreacionnominaliquidaciones->RENL_DIAS =  $rownomina[3];
		 $Recreacionnominaliquidaciones->RENL_PUNTOS =  $rownomina[4];
		 $Recreacionnominaliquidaciones->RENL_SUELDO =  $rownomina[5];
		 $Recreacionnominaliquidaciones->RENL_SALARIO =  $rownomina[6];
		 $Recreacionnominaliquidaciones->RENL_RETEFUENTE =  $rownomina[7];
		 $Recreacionnominaliquidaciones->RENO_ID = $rownomina[0];
		 $Recreacionnominaliquidaciones->EMPL_ID = $data["EMPL_ID"];
		 $Recreacionnominaliquidaciones->RENL_FECHACAMBIO =  $rownomina['fechaproceso'];
		 $Recreacionnominaliquidaciones->RENL_REGISTRADOPOR =  Yii::app()->user->id;  
		 
		 if(!$Recreacionnominaliquidaciones->save()){		 
		  $msg = print_r($Recreacionnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data vacaciones not saving: '.$msg );
         }
         
	}	
  }
 $i++;
 }
}
   
?>





