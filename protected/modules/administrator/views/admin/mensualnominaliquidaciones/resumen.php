<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Mensual'=>array('admin/mensualnomina/admin'),
	'Resumen'
);

/*
$this->menu=array(
	array('label'=>'List Mensualnominaliquidaciones','url'=>array('index')),
	array('label'=>'Create Mensualnominaliquidaciones','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensualnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
//echo Yii::app()->request->requestUri;

$Mensualnomina = Mensualnomina::model()->findByPk($Mensualnominaliquidaciones->MENO_ID);

$filas = count($Mensualnominaliquidaciones->liquidacion);
$columnas = count($Mensualnominaliquidaciones->liquidacion[1]);
$parafiscales = count($Mensualnominaliquidaciones->parafiscales[0]);

$tblD = $Mensualnominaliquidaciones->descuentos;
$filasTblD = count($tblD);
$columnasTblD = count($tblD[0]);

?>
<style type="text/css">

.tablatitulo{
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
}
.tablatitulo td {font:110%}
.tablatitulo th {font:160%}
.tabla1{
font:95% Arial, Helvetica, sans-serif;
border-collapse: collapse;
border-spacing: 0;
border:1px solid;padding:3px 3px; border-color:#000;
}
.tabla1 tr { 
border:0px dotted gray;
border-color:#CCC;
}
.tabla1 td {
padding:3px;
border:0px;
border-color:#999;
}
.tabla1 th {
padding:5px;
border-color:#999;
}


</style>
<table width="100%" border="0" align="center">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             <td width="6%" align="center">
					  <?php 			 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
					  echo $image = CHtml::image($imageUrl); 
					  ?>         
					               
             </td>
             <td width="74%"><strong><span><em>RESUMEN DE LIQUIDACION NOMINA MENSUAL ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, Yii::app()->request->urlReferrer, $htmlOptions ); 
?>         
					              </td>
			 <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_txt.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar Resumen Formato Texto');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnominaliquidaciones/downresumen',
																								  'mensualNomina'=>$mensualNomina,
																								  'mensualNomina2'=>$mensualNomina2,
																								  'personaGral'=>$personaGral,
																								  'unidad'=>$unidad,
																								  'tipoEmpleo'=>$tipoEmpleo,
																								  ),$htmlOptions ); 
                     ?>         
			</td>
           </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  <tr>
    <td>
	
	<table width="100%" border="1" class="tabla1" align="center" >
      <tr>
        <td><strong>PERIODO DE PAGO:</strong> <?php echo " $Periodo";?></td>
        <td><strong>FECHA PROCESO: </strong><?php echo date("d-m-Y");?></td>
      </tr>
      <tr>
        <td><?php echo $tercero;?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="50%" valign="top">
		
		 <table width="100%" border="1" class="tabla1">
          <tr>
            <th colspan="4" align="center">DEVENGADOS</th>
          </tr>
          <tr>
            <td width="45%">SUELDO BASICO</td>
            <td width="20%" align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][4]);?></td>
            <td width="17%" align="right">&nbsp;</td>
            <td width="18%" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>GASTOS DE REPRESENTACION</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][23]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>SUBSIDIO DE TRANSPORTTE</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][6]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA DE ANTIGUEDAD</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][5]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>H EXTRAS DIURNAS</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][9]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>H EXTRAS NOCTURNAS</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][11]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>H EXTRAS DIURNAS FEST</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][13]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>H EXTRAS NOCTURNAS FEST</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][15]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>RECARGO NOCT</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][19]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>DOMINGOS Y FESTIVOS</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][17]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>REC NOT DOMINGOS Y FESTIVOS</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][21]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA TECNICA</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][22]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA DE ALIMENTACION</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][7]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>BONIFICACION SERV PRESTADOS</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][24]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA DE VACACIONES</td>
            <td align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][25]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <th>TOTAL DEVENGADO</th>
            <td align="right">&nbsp;</td>
            <th align="right"><?php echo number_format($Mensualnominaliquidaciones->liquidacion[$filas-1][28]);?></th>
            <td align="right">&nbsp;</td>
          </tr>
		  <tr>
            <td colspan='4'>&nbsp;</td>
          </tr>
		  <?php  
	       $filasa=0;  $filape=0;  $filasin=0;
	       for ($i=1;$i<$filas-1;$i++){
		    @
		    //$persona=new empleado($nomina->devengados[$i][0]);
			$dsalud = Salud::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][1]);
			$dpension = Pension::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][3]);
			$dsindicato= Sindicatos::model()->findByPk($Mensualnominaliquidaciones->parafiscales[$i][5]);
			
			$salud[$dsalud->SALU_ID][0]=$dsalud->SALU_NOMBRE;
			$salud[$dsalud->SALU_ID][1]=$salud[$dsalud->SALU_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][2];
			
			$pension[$dpension->PENS_ID][0]=$dpension->PENS_NOMBRE;
			$pension[$dpension->PENS_ID][1]=$pension[$dpension->PENS_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][4];
			
			$sindicato[$dsindicato->SIND_ID][0]=$dsindicato->SIND_NOMBRE;
			$sindicato[$dsindicato->SIND_ID][1]=$sindicato[$dsindicato->SIND_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][6];
			
			$fondosp[$dpension->PENS_ID][1]=$fondosp[$dpension->PENS_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][7];
			$subcuenta[$dpension->PENS_ID][1]=$subcuenta[$dpension->PENS_ID][1]+$Mensualnominaliquidaciones->parafiscales[$i][8]; 
			

			if($dsalud->SALU_ID >$filasa and $dsalud->SALU_ID<999) $filasa=$dsalud->SALU_ID;
			if($dsindicato->SIND_ID >$filasin and $dsindicato->SIND_ID<999) $filasin=$dsindicato->SIND_ID;
			if($dpension->PENS_ID >$filape and $dpension->PENS_ID<999) $filape=$dpension->PENS_ID;
	       } 
		  ?>	  
		  <tr align='center'>
            <th colspan='4'>APORTE SALUD</th>
          </tr>
		  <tr>
		   <td>&nbsp;</td><td>EMPLEADO</td><td>EMPRESA</td><td>TOTAL</td>
		  </tr>
		  <?php
		  for($i=1;$i<=$filasa;$i++) {
           if ($salud[$i][0]){
		  ?>
		  <tr>
		   <td>SALUD <?php echo $salud[$i][0]; ?></td>
		   <td align='right'><?php echo number_format($salud[$i][1]); ?></td>
		   <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getSaludPatronal($salud[$i][1])); ?></td>
		   <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getSaludAporteTotal($salud[$i][1])); ; ?></td>
		  </tr>
		  <?php          
		   }
          }
		  ?>
		  <tr>
           <td>TOTAL SALUD</td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][2]); ?></td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getSaludPatronal($Mensualnominaliquidaciones->parafiscales[$filas-1][2])); ?></td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getSaludAporteTotal($Mensualnominaliquidaciones->parafiscales[$filas-1][2])); ?></td>
          </tr>
		  
		  <tr>
            <td colspan='4'>&nbsp;</td>
          </tr>
		  
		  <tr align='center'>
            <th colspan='4'>APORTE PENSION</th>
          </tr>
		  <tr>
		   <td>&nbsp;</td><td>EMPLEADO</td><td>EMPRESA</td><td>TOTAL</td>
		  </tr>		  
		  <?php
		  for($i=1;$i<=$filape;$i++) {
           if ($pension[$i][0]){
		  ?>
		  <tr>
		   <td>PENSION <?php echo $pension[$i][0]; ?></td>
		   <td align='right'><?php echo number_format($pension[$i][1]); ?></td>
		   <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getPensionPatronal($pension[$i][1])); ?></td>
		   <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getPensionAporteTotal($pension[$i][1])); ; ?></td>
		  </tr>
		  <?php          
		   }
          }
		  ?>		  
		  <tr>
           <td>TOTAL PENSION</td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][4]); ?></td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getPensionPatronal($Mensualnominaliquidaciones->parafiscales[$filas-1][4])); ?></td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->getPensionAporteTotal($Mensualnominaliquidaciones->parafiscales[$filas-1][4])); ?></td>
          </tr>
		  
		  <tr>
            <td colspan='4'>&nbsp;</td>
          </tr>
		  
		  <tr align='center'>
		   <th colspan='4'>FONDO S.P Y SUBCUENTA SUBSISTENCIA</th>
		  </tr>
		  
		  <tr>
		   <td>&nbsp;</td> <td>F. S. P.</td><td>SUB CTA</td> <td>&nbsp;</td>
		  </tr>
		  <?php
		  for($i=1;$i<=$filape;$i++) {
           if ($pension[$i][0]){
		  ?>
		  <tr>
		   <td><?php echo $pension[$i][0]; ?></td>
		   <td align='right'><?php echo number_format($fondosp[$i][1]); ?></td>
		   <td align='right'><?php echo number_format($subcuenta[$i][1]); ?></td>
		   <td align='right'>&nbsp;</td>
		  </tr>
		  <?php          
		   }
          }
		  ?>		  
		  <tr>
           <td>TOTALES</td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][7]); ?></td>
           <td align='right'><?php echo number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][8]); ?></td>
           <td align='right'>&nbsp;</td>
          </tr>	  
		  <tr>
            <td colspan='4'>&nbsp;</td>
          </tr>
		   <?php 
		    $riesgo=(($Mensualnominaliquidaciones->liquidacion[$filas-1][28]-($Mensualnominaliquidaciones->liquidacion[$filas-1][25]+$Mensualnominaliquidaciones->liquidacion[$filas-1][24]+$Mensualnominaliquidaciones->liquidacion[$filas-1][7]+$Mensualnominaliquidaciones->liquidacion[$filas-1][6]))*0.00522);
			?>
		  <tr>
		   <td>RIESGOS PROFESIONALES</td><td>&nbsp;</td> <td align='right'><?php  echo number_format($riesgo); ?></td><td>&nbsp;</td>
		  </tr>
		  
		  <tr>
            <td colspan='4'>&nbsp;</td>
          </tr>
		  
		  <?php 
		    $suma=($Mensualnominaliquidaciones->parafiscales[$filas-1][2]*3+$Mensualnominaliquidaciones->parafiscales[$filas-1][4]*2.125+$Mensualnominaliquidaciones->parafiscales[$filas-1][7]+$Mensualnominaliquidaciones->parafiscales[$filas-1][8]+$riesgo);
			?>
		  <tr>
		   <td>TOTAL PARAFISCALES</td><td>&nbsp;</td> <td align='right'><?php  echo number_format($suma); ?></td><td>&nbsp;</td>
		  </tr>
		  
         </table>
	    </td>
        <td width="50%" valign="top">
		
		<table width="100%" border="1" class="tabla1">
          <tr>
            <th colspan="3" align="center" valign="top">DEDUCCIONES</th>
          </tr>
          <tr>
            <td width="35%" valign="top">RETENCION EN LA FUENTE</td>
			<?php
		    $suma = 0;
			$suma = $Mensualnominaliquidaciones->parafiscales[$filas-1][10];
            ?>
            <td width="31%"><?php  echo number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][10]); ?></td>
            <td width="34%">&nbsp;</td>
          </tr>
          <tr>
            <td width="35%" valign="top">ESTAMPILLA</td>
			<?php
		    $suma += $Mensualnominaliquidaciones->parafiscales[$filas-1][9];
            ?>
            <td width="31%"><?php  echo number_format($Mensualnominaliquidaciones->parafiscales[$filas-1][9]); ?></td>
            <td width="34%">&nbsp;</td>
          </tr>
		  <?php
		   for($i=1;$i<=$filasin;$i++) {
  			if ($sindicato[$i][0]){
		   ?>
 	 	  <tr>
  			<td><?php echo $sindicato[$i][0]; ?></td>
 			<td><?php echo number_format($sindicato[$i][1]); ?></td>
  			<td>&nbsp;</td>
		  </tr>
  		  <?php
			$suma+=$sindicato[$i][1];
		   }
  		  }		  
		  ?>
		  <?php
		  for($i=1;$i<($columnasTblD-1);$i++){
		   $suma+=$tblD[$filas-1][$i];
          ?>		  
		  <tr>
            <td width="35%"><?php echo $tblD[0][$i];?></td>
            <td width="31%"><?php echo number_format($tblD[$filas-1][$i]); ?></td>
            <td width="34%">&nbsp;</td>
          </tr>
		  <?php
		  }
		  ?>
		  <tr>
            <th width='64%'>TOTAL DEDUCCIONES</th>
            <td>&nbsp;</td>
            <th width='36%' align='right'><?php echo number_format($suma); ?></th>
          </tr>
		  
		  <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
		  
		  <tr align='center'>
            <th colspan='3'>PRESTACIONES SOCIALES</th>
          </tr>
          <?php
		   $var = $Mensualnominaliquidaciones->getCesantias($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>CESANTIAS</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr=round($var);
		   $var = $Mensualnominaliquidaciones->getInteresesCesantias($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>INTERESES CESANTIAS</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Mensualnominaliquidaciones->getPrimaNavidad($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>PRIMA DE NAVIDAD</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Mensualnominaliquidaciones->getPrimaVacaciones($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>PRIMA DE VACACIONES</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Mensualnominaliquidaciones->getVacaciones($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>VACACIONES</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Mensualnominaliquidaciones->getPrimaSemestral($Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>PRIMA SEMESTRAL</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $baseicbf= $Mensualnominaliquidaciones->liquidacion[$filas-1][$columnas-1]-($Mensualnominaliquidaciones->liquidacion[$filas-1][6]);
		   $var=$Mensualnominaliquidaciones->getIcbf($baseicbf);
  		  ?>
		  <tr> 
		   <td>I. C. B. F.</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var=$Mensualnominaliquidaciones->getCajaCompensacion($baseicbf);
  		  ?>
		  <tr> 
		   <td>CAJA DE COMPENSACION</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <tr> 
		   <th>TOTAL PRESTACIONES</th><td>&nbsp;</td><th align='right'><?php echo number_format(round($var)+$totalapr); ?> </th>
		  </tr>
		  
        </table>
		
		
		</td>
      </tr>
    </table>
	
    </td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
</table>
