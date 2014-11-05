<?php
set_time_limit(0);
$connection = Yii::app()->db;
/**
*conexion a mysql
*/
mysql_connect('localhost','root','') or die('Ocurrió un error al intentar conectar');
mysql_select_db('catedraticos') or die('Error al seleccionar la base de datos. Posiblemente no existe.');

   //recuperar descuentos mensuales en nomina//  
   
    echo $string = 'SELECT p.*
               FROM pagoemp p, nomina n
               where p.idnomina = n.idnomina
                  /*AND n.idnomina>=20120101 AND n.idnomina <=20120103*/
                  /*AND n.idnomina>=20120201 AND n.idnomina <=20120204*/
                  
				  /*AND n.idnomina>=20130101 AND n.idnomina <=20130104*/
                  /*AND n.idnomina>=20130201 AND n.idnomina <=20130204*/
				  
                  /*AND n.idnomina>=20140101 AND n.idnomina <=20140104*/			             
                  AND n.idnomina>=20140201 AND n.idnomina <=20140204			             
				  order by n.idnomina, p.idcatedra';
	$i=1;			
	$query = mysql_query($string);
    while($rownomina = mysql_fetch_array($query)){
	     echo $i.' '.$rownomina[0].' '.$rownomina[1].'<br>';
		 
	     $Mensualnominaliquidaciones = new Mensualnominaliquidaciones;	     
		 $Mensualnominaliquidaciones->MENL_CODIGO = $rownomina[1];  		  
		 $Mensualnominaliquidaciones->MENL_HORASAPAGAR = $rownomina[2];
		 $Mensualnominaliquidaciones->MENL_VALORHORA = $rownomina[3];
		 $Mensualnominaliquidaciones->MENL_SALUDTOTAL = $rownomina[9];
		 $Mensualnominaliquidaciones->MENL_PENSIONTOTAL = $rownomina[11];
		 $Mensualnominaliquidaciones->MENL_SINDICATOTOTAL = $rownomina[5];
		 $Mensualnominaliquidaciones->MENL_ESTAMPILLA = $rownomina[6];
		 $Mensualnominaliquidaciones->MENL_RETEFUENTE = $rownomina[7];
		 $Mensualnominaliquidaciones->CATE_ID = $rownomina[1];
		 
		 if($rownomina[8]==0){ $s = 999;}else{ $s = $rownomina[8];}
		 $Mensualnominaliquidaciones->SALU_ID = $s;
		 
		 if($rownomina[10]==0){ $p = 999;}else{ $p = $rownomina[10];}
		 $Mensualnominaliquidaciones->PENS_ID = $p;
		 
		 $Mensualnominaliquidaciones->SIND_ID = $rownomina[4];
		 $Mensualnominaliquidaciones->MENO_ID = $rownomina[0];
		 $Mensualnominaliquidaciones->MENL_FECHACAMBIO = date('Y-m-d');
		 $Mensualnominaliquidaciones->MENL_REGISTRADOPOR = Yii::app()->user->id;
		 if(!$Mensualnominaliquidaciones->save()){		 
		  $msg = print_r($Mensualnominaliquidaciones->getErrors(),1);
          throw new CHttpException(400,'data nomina not saving: '.$msg );
         }
         
		 
		$sqldescuentosnomina = 'SELECT * FROM nomideduccion n where idnomina = '.$rownomina[0].' and idcatedra = '.$rownomina[1];				 
        $rowssqldescuentosnomina = mysql_query($sqldescuentosnomina);
        while($rowsqldescuentosnomina = mysql_fetch_array($rowssqldescuentosnomina)){
		 $Mensualnominadescuentos = new Mensualnominadescuentos;
         $Mensualnominadescuentos->MEND_VALOR = $rowsqldescuentosnomina["valor"];
         $Mensualnominadescuentos->DEME_ID = $rowsqldescuentosnomina["iddeduccion"];
         $Mensualnominadescuentos->CATE_ID = $rowsqldescuentosnomina["idcatedra"];
         $Mensualnominadescuentos->MENO_ID = $rowsqldescuentosnomina["idnomina"];
         $Mensualnominadescuentos->MEND_FECHACAMBIO = $Mensualnominaliquidaciones->MENL_FECHACAMBIO;
         $Mensualnominadescuentos->MEND_REGISTRADOPOR = $Mensualnominaliquidaciones->MENL_REGISTRADOPOR;
         if(!$Mensualnominadescuentos->save()){
		  $msgpd= print_r($Mensualnominadescuentos->getErrors(),1);
          throw new CHttpException(400,'data not saving: '.$msgd );
         }
        }
	$i++;	
	}	
   
?>





