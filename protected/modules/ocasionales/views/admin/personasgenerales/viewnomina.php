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
   
   //recuperar descuentos mensuales en nomina//  
   
    $string = 'SELECT nd.*, n.idnomina, n.fechaproceso, np.*, v.idestado
                 FROM empermanente e, empvariable v, nomina n, nomidevengado nd, nomiparafiscales np
                 WHERE e.idemp = v.idemp  AND n.idnomina = nd.idnomina
                 AND v.idemp = nd.idemp AND v.fechamod = nd.fechamod AND nd.idnomina = np.idnomina AND nd.numero = np.numero
                 /*AND n.idnomina>=20120101 AND n.idnomina <=20120201*/
                 /*AND n.idnomina>=20120301 AND n.idnomina <=20120401*/
                 /*AND n.idnomina>=20120501 AND n.idnomina <=20120601*/
                 /*AND n.idnomina>=20120701 AND n.idnomina <=20120801*/
                 /*AND n.idnomina>=20120901 AND n.idnomina <=20121001*/
                 /*AND n.idnomina>=20121101 AND n.idnomina <=20121201*/
                 
				 /*AND n.idnomina>=20130101 AND n.idnomina <=20130201*/				
				 /*AND n.idnomina>=20130301 AND n.idnomina <=20130401*/	
				 /*AND n.idnomina>=20130501 AND n.idnomina <=20130601*/
				 /*AND n.idnomina>=20130701 AND n.idnomina <=20130801*/	
				 /*AND n.idnomina>=20130901 AND n.idnomina <=20131001*/	
				 /*AND n.idnomina>=20131101 AND n.idnomina <=20131201*/
				 
				 /*AND n.idnomina>=20140101 AND n.idnomina <=20140201*/
				 /*AND n.idnomina>=20140301 AND n.idnomina <=20140401*/
				 /*AND n.idnomina>=20140501 AND n.idnomina <=20140601*/
				 AND n.idnomina>=20140701 AND n.idnomina <=20140701
				             
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
	     $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;
	     $Mensualnominaparafiscales = new Mensualnominaparafiscales;
         $Mensualnominaliquidaciones->MENL_CODIGO = $rownomina[1];  
		 $Mensualnominaliquidaciones->MENL_DIAS = $rownomina[3];  
		 $Mensualnominaliquidaciones->MENL_PUNTOS = $rownomina[4];
		 $Mensualnominaliquidaciones->MENL_SALARIO = $rownomina[5];
		 $Mensualnominaliquidaciones->MENL_PRIMAANTIGUEDAD = $rownomina[6];
		 $Mensualnominaliquidaciones->MENL_TRANSPORTE =  $rownomina[7];
		 $Mensualnominaliquidaciones->MENL_ALIMENTACION = $rownomina[8];
		 $Mensualnominaliquidaciones->MENL_HED = $rownomina[9];
		 $Mensualnominaliquidaciones->MENL_HEDTOTAL = $rownomina[10];
		 $Mensualnominaliquidaciones->MENL_HEN = $rownomina[11];
		 $Mensualnominaliquidaciones->MENL_HENTOTAL = $rownomina[12];
		 $Mensualnominaliquidaciones->MENL_HEDF = $rownomina[13];
		 $Mensualnominaliquidaciones->MENL_HEDFTOTAL = $rownomina[14];
		 $Mensualnominaliquidaciones->MENL_HENF = $rownomina[15];
		 $Mensualnominaliquidaciones->MENL_HENFTOTAL = $rownomina[16];
		 $Mensualnominaliquidaciones->MENL_DYF = $rownomina[19];
		 $Mensualnominaliquidaciones->MENL_DYFTOTAL = $rownomina[20];
		 $Mensualnominaliquidaciones->MENL_REN = $rownomina[17];
		 $Mensualnominaliquidaciones->MENL_RENTOTAL = $rownomina[18];
		 $Mensualnominaliquidaciones->MENL_RENDYF = $rownomina[21];
		 $Mensualnominaliquidaciones->MENL_RENDYFTOTAL = $rownomina[22];
		 $Mensualnominaliquidaciones->MENL_PRIMATECNICA = $rownomina[23];
		 $Mensualnominaliquidaciones->MENL_GASTOSRP = $rownomina[24];
		 $Mensualnominaliquidaciones->MENL_BONIFICACION = $rownomina[26];
		 $Mensualnominaliquidaciones->MENL_PRIMAVACACIONES = $rownomina[27];
		 $Mensualnominaliquidaciones->MENO_ID = $rownomina[0];
		 $Mensualnominaliquidaciones->EMPL_ID = $data["EMPL_ID"];
		 $Mensualnominaliquidaciones->MENL_FECHACAMBIO = $rownomina[30];
		 $Mensualnominaliquidaciones->MENL_REGISTRADOPOR = Yii::app()->user->id;
		 if(!$Mensualnominaliquidaciones->save()){		 
		  $msg = print_r($Mensualnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msg );
         }
         
		 $Mensualnominaparafiscales->SALU_ID = $rownomina[33];
         $Mensualnominaparafiscales->MENP_SALUDTOTAL = $rownomina[34];
         $Mensualnominaparafiscales->PENS_ID = $rownomina[35];
         $Mensualnominaparafiscales->MENP_PENSIONTOTAL = $rownomina[36];
         $Mensualnominaparafiscales->SIND_ID = $rownomina[40];
         $Mensualnominaparafiscales->MENP_SINDICATOTOTAL = $rownomina[41];
         $Mensualnominaparafiscales->MENP_FONDOSP = $rownomina[37];
         $Mensualnominaparafiscales->MENP_SUBSISTENCIA = $rownomina[38];
         $Mensualnominaparafiscales->MENP_ESTAMPILLA = $rownomina[39];
         $Mensualnominaparafiscales->MENP_RETEFUENTETOTAL = $rownomina[42];
         $Mensualnominaparafiscales->MENL_ID = $Mensualnominaliquidaciones->MENL_ID;
         $Mensualnominaparafiscales->MENP_FECHACAMBIO = $Mensualnominaliquidaciones->MENL_FECHACAMBIO;
         $Mensualnominaparafiscales->MENP_REGISTRADOPOR = $Mensualnominaliquidaciones->MENL_REGISTRADOPOR;
         if(!$Mensualnominaparafiscales->save()){
		  $msgp = print_r($Mensualnominaparafiscales->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgp );
		 }
		 
		 $sqldescuentosnomina = 'SELECT * FROM nomideduccion n WHERE idemp = '.$Personasgenerales->PEGE_IDENTIFICACION.' 
		                         AND idnomina = '.$rownomina[0].' AND numero = '.$rownomina[1];				 
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Mensualnominadescuentos = new Mensualnominadescuentos;
         $Mensualnominadescuentos->MEND_VALOR = $rowsqldescuentosnomina["valor"];
         $Mensualnominadescuentos->DEME_ID = $rowsqldescuentosnomina["iddeduccion"];
         $Mensualnominadescuentos->MENL_ID = $Mensualnominaliquidaciones->MENL_ID;
         $Mensualnominadescuentos->MEND_FECHACAMBIO = $Mensualnominaliquidaciones->MENL_FECHACAMBIO;
         $Mensualnominadescuentos->MEND_REGISTRADOPOR = $Mensualnominaliquidaciones->MENL_REGISTRADOPOR;
         if(!$Mensualnominadescuentos->save()){
		  $msgpd= print_r($Mensualnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	}	
  }
 $i++;
 }
}
   
?>





