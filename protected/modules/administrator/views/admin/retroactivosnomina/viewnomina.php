<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql
*/
mysql_connect('localhost','root','qwerty123') or die('Ocurrió un error al intentar conectar');

mysql_select_db('nomina') or die('Error al seleccionar la base de datos. Posiblemente no existe.');
$sql = 'SELECT e.* FROM empermanente e, empvariable v, nomiretroactivo ns
WHERE e.idemp = v.idemp  AND v.idemp = ns.idemp AND v.fechamod = ns.fechamod 
GROUP BY e.idemp';

$rows = mysql_query($sql);
$i = 1;
while($row = mysql_fetch_array($rows)){
 $criteria = new CDbCriteria;
 $criteria->condition = ' "PEGE_IDENTIFICACION" = '."'".$row[0]."'";
 $Personasgeneral = Personasgenerales::model()->find($criteria);
 if($Personasgenerales = Personasgenerales::model()->findByPk($Personasgeneral->PEGE_ID)){
 //echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' '.$Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.'<br>';
   
   //recuperar descuentos mensuales en nomina//  
   
    $string = 'SELECT n.idnomina, nr.numero, nr.idemp, sum(dias), sum(salario), sum(prantiguedad), sum(transporte), sum(alimentacion), sum(hed), sum(hen), sum(hedf), sum(henf),
			   sum(ren), sum(dyf), sum(rndyf), sum(prtecnica), sum(nr.sobrenumeracion), sum(bonserv), sum(prvacaciones), v.fechamod, n.fechaproceso
			   FROM empermanente e, empvariable v, nretroactivo n, nomiretroactivo nr
			   WHERE e.idemp = v.idemp  AND n.idnomina = nr.idnomina
			   AND v.idemp = nr.idemp AND v.fechamod = nr.fechamod
			   /*AND n.idnomina like  '."'2012%'".'*/
			   /*AND n.idnomina like  '."'2013%'".'*/
			   AND n.idnomina like  '."'2014%'".'
			   AND nr.idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.'
			   GROUP BY nr.idemp';
				
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
	//echo $i.' - '.$Personasgenerales->PEGE_IDENTIFICACION.' - '.$data["EMPL_ID"].' - '.$rownomina["fechamod"].' - '.$rownomina["idnomina"].' - '.$rownomina["idestado"].'<br>';
	    
		 $Retroactivosnominaliquidaciones = new Retroactivosnominaliquidaciones;
		 $Retroactivosnominaliquidaciones->RANL_CODIGO =  $rownomina[1];
		 $Retroactivosnominaliquidaciones->RANL_DIAS = $rownomina[3];
		 $Retroactivosnominaliquidaciones->RANL_SALARIO = $rownomina[4];
		 $Retroactivosnominaliquidaciones->RANL_PRIMAANTIGUEDAD = $rownomina[5];
		 $Retroactivosnominaliquidaciones->RANL_TRANSPORTE = $rownomina[6];
		 $Retroactivosnominaliquidaciones->RANL_ALIMENTACION = $rownomina[7];
		 $Retroactivosnominaliquidaciones->RANL_HEDTOTAL = $rownomina[8];
		 $Retroactivosnominaliquidaciones->RANL_HENTOTAL = $rownomina[9];
		 $Retroactivosnominaliquidaciones->RANL_HEDFTOTAL = $rownomina[10];
		 $Retroactivosnominaliquidaciones->RANL_HENFTOTAL = $rownomina[11];
		 $Retroactivosnominaliquidaciones->RANL_DYFTOTAL = $rownomina[13];
		 $Retroactivosnominaliquidaciones->RANL_RENTOTAL = $rownomina[12];
		 $Retroactivosnominaliquidaciones->RANL_RENDYFTOTAL = $rownomina[14];
		 $Retroactivosnominaliquidaciones->RANL_PRIMATECNICA = $rownomina[15];
		 $Retroactivosnominaliquidaciones->RANL_GASTOSRP = $rownomina[16];
		 $Retroactivosnominaliquidaciones->RANL_BONIFICACION = $rownomina[17];
		 $Retroactivosnominaliquidaciones->RANL_PRIMAVACACIONES = $rownomina[18];
		 
		 $lastnomina = getLastnomina(' AND mn."MENO_ID" >= 20140101 AND mn."MENO_ID" <=20140101 ',$Personasgenerales->PEGE_ID);
		 
		 $Retroactivosnominaliquidaciones->RANO_ID = 2014;
		 $Retroactivosnominaliquidaciones->MENL_ID =  $lastnomina;
		 $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO = $rownomina['fechaproceso'];
		 $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR = Yii::app()->user->id;
		 if(!$Retroactivosnominaliquidaciones->save()){		 
		  $msg = print_r($Retroactivosnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data retroactivos not saving: '.$msg );
         }
         
		 
		$sqldescuentosnomina = 'SELECT idnomina, numero, iddeduccion, idemp, sum(valor) as valor
								FROM nretroactivodeduccion n where idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' 
								AND idnomina like  '."'2014%'".'
								GROUP by iddeduccion';	
								
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Retroactivosnominadescuentos = new Retroactivosnominadescuentos;
         $Retroactivosnominadescuentos->RAND_VALOR = $rowsqldescuentosnomina["valor"];
		 
		 $iddeduccion = $rowsqldescuentosnomina["iddeduccion"];
		 if($iddeduccion==1){
		  $newiddeduccion = 17;
		 }elseif($iddeduccion==2){
		       $newiddeduccion = 18;
			  }elseif($iddeduccion==3){
		            $newiddeduccion = 19;
			       }elseif($iddeduccion==4){
		                 $newiddeduccion = 20;
			            }
						
         $Retroactivosnominadescuentos->DEPR_ID = $newiddeduccion;
         $Retroactivosnominadescuentos->RANL_ID = $Retroactivosnominaliquidaciones->RANL_ID;
         $Retroactivosnominadescuentos->RAND_FECHACAMBIO = $Retroactivosnominaliquidaciones->RANL_FECHACAMBIO;
         $Retroactivosnominadescuentos->RAND_REGISTRADOPOR = $Retroactivosnominaliquidaciones->RANL_REGISTRADOPOR;
         if(!$Retroactivosnominadescuentos->save()){
		  $msgpd= print_r($Retroactivosnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	}	
  }
 $i++;
 }
}
 function getLastnomina($query,$id){
	 $connection = Yii::app()->db;
	 $sql = 'SELECT mnl."MENL_ID"
				   FROM "TBL_NOMPERSONASGENERALES" pg, "TBL_NOMEMPLEOSPLANTA" ep, "TBL_NOMMENSUALNOMINALIQUIDACIONES" mnl, "TBL_NOMMENSUALNOMINA" mn 
                   WHERE pg."PEGE_ID" = ep."PEGE_ID" AND ep."EMPL_ID" = mnl."EMPL_ID" AND mn."MENO_ID" = mnl."MENO_ID" 
                   '.$query.' AND pg."PEGE_ID" = '.$id.' 
                   ORDER BY mnl."MENL_ID" DESC
				   LIMIT 1';
     $liquidacion = $connection->createCommand($sql)->queryScalar();
	 /**
	 *Retornando ultima liquidacion del empleado 
	 **/
	 return $liquidacion;     
	}
   
?>





