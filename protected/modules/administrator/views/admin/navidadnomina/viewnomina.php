l<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql

(20121221, 'PRIMA DE NAVIDAD 2012', '2012-12-03', '1', '2012', '2012-12-03', 1),
(20131221, 'PRIMA DE NAVIDAD 2013', '2013-12-04', '1', '2013', '2013-12-04', 1);
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

$sql = 'SELECT e.* FROM empermanente e, empvariable v, nominavidad nn
WHERE e.idemp = v.idemp  AND v.idemp = nn.idemp AND v.fechamod = nn.fechamod
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
   
    $string = 'SELECT nn.*, v.idestado, n.fechaproceso
                 FROM empermanente e, empvariable v, nnavidad n, nominavidad nn
                 WHERE e.idemp = v.idemp  AND n.idnomina = nn.idnomina
                 AND v.idemp = nn.idemp AND v.fechamod = nn.fechamod
				 
				 AND n.idnomina=20121221
                 
				/*AND n.idnomina = 20131221*/
                 
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
	     
		 $Navidadnominaliquidaciones = new Navidadnominaliquidaciones;
		 $Navidadnominaliquidaciones->NANL_CODIGO =  $rownomina[1];
		 $Navidadnominaliquidaciones->NANL_MESES =  $rownomina[3];
		 $Navidadnominaliquidaciones->NANL_PUNTOS =  $rownomina[4];
		 $Navidadnominaliquidaciones->NANL_SUELDO =  $rownomina[5];
		 $Navidadnominaliquidaciones->NANL_SALARIO =  $rownomina[6];
		 $Navidadnominaliquidaciones->NANL_PRIMAANTIGUEDAD =  $rownomina[7];
		 $Navidadnominaliquidaciones->NANL_TRANSPORTE =  $rownomina[8];
		 $Navidadnominaliquidaciones->NANL_ALIMENTACION =  $rownomina[9];
		 $Navidadnominaliquidaciones->NANL_PRIMATECNICA =  $rownomina[10];
		 $Navidadnominaliquidaciones->NANL_GASTOSRP =  $rownomina[11];
		 $Navidadnominaliquidaciones->NANL_BONIFICACION =  $rownomina[12];
		 $Navidadnominaliquidaciones->NANL_SEMESTRAL =  $rownomina[13];
		 $Navidadnominaliquidaciones->NANL_PRIMAVACACIONES =  $rownomina[14];
		 $Navidadnominaliquidaciones->NANL_RETEFUENTE =  $rownomina[15];
		 $Navidadnominaliquidaciones->NANO_ID =  $rownomina[0];
		 $Navidadnominaliquidaciones->EMPL_ID =  $data["EMPL_ID"];	
		 $Navidadnominaliquidaciones->NANL_FECHACAMBIO =  $rownomina['fechaproceso'];
		 $Navidadnominaliquidaciones->NANL_REGISTRADOPOR =  Yii::app()->user->id;
		 
		 if(!$Navidadnominaliquidaciones->save()){		 
		  $msg = print_r($Navidadnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data prima navidad not saving: '.$msg );
         }
         
		 
		 $sqldescuentosnomina = 'SELECT * FROM nnavidaddeduccion n WHERE idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' 
		                         AND idnomina = '.$rownomina[0].' AND numero = '.$rownomina[1];				 
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Navidadnominadescuentos = new Navidadnominadescuentos;
         $Navidadnominadescuentos->NAND_VALOR = $rowsqldescuentosnomina["valor"];
		 
		 $iddeduccion = $rowsqldescuentosnomina["iddeduccion"];
		 if($iddeduccion==1){
		  $newiddeduccion = 5;
		 }elseif($iddeduccion==2){
		       $newiddeduccion = 6;
			  }elseif($iddeduccion==3){
		            $newiddeduccion = 7;
			       }elseif($iddeduccion==4){
		                 $newiddeduccion = 8;
			            }
		 
         $Navidadnominadescuentos->DEPR_ID = $newiddeduccion;
         $Navidadnominadescuentos->NANL_ID = $Navidadnominaliquidaciones->NANL_ID;
         $Navidadnominadescuentos->NAND_FECHACAMBIO = $Navidadnominaliquidaciones->NANL_FECHACAMBIO;
         $Navidadnominadescuentos->NAND_REGISTRADOPOR = $Navidadnominaliquidaciones->NANL_REGISTRADOPOR;
         if(!$Navidadnominadescuentos->save()){
		  $msgpd= print_r($Navidadnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	}	
  }
 $i++;
 }
}
   
?>





