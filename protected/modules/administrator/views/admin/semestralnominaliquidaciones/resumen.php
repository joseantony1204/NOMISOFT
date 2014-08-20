<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Prima Semestral'=>array('admin/semestralnomina/admin'),
	'Resumen'
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('semestralnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
//echo Yii::app()->request->requestUri;

$Semestralnomina = Semestralnomina::model()->findByPk($Semestralnominaliquidaciones->SENO_ID);

$filas = count($Semestralnominaliquidaciones->liquidacion);
$columnas = count($Semestralnominaliquidaciones->liquidacion[1]);
$parafiscales = count($Semestralnominaliquidaciones->parafiscales[0]);

$tblD = $Semestralnominaliquidaciones->descuentos;
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
             <td width="74%"><strong><span><em>RESUMEN DE LIQUIDACION PRIMA SEMESTRAL ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/semestralnominaliquidaciones/planoresumen',					                                                                              
																								  'semestralNomina'=>$semestralNomina,
																								  'semestralNomina2'=>$semestralNomina2,
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
            <td width="20%" align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][4]);?></td>
            <td width="17%" align="right">&nbsp;</td>
            <td width="18%" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>GASTOS DE REPRESENTACION</td>
            <td align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][9]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>SUBSIDIO DE TRANSPORTTE</td>
            <td align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][6]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA DE ANTIGUEDAD</td>
            <td align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][5]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA TECNICA</td>
            <td align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][8]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>PRIMA DE ALIMENTACION</td>
            <td align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][7]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>BONIFICACION SERV PRESTADOS</td>
            <td align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][10]);?></td>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <th>TOTAL DEVENGADO</th>
            <td align="right">&nbsp;</td>
            <th align="right"><?php echo number_format($Semestralnominaliquidaciones->liquidacion[$filas-1][13]);?></th>
            <td align="right">&nbsp;</td>
          </tr>
		  <tr>
            <td colspan='4'>&nbsp;</td>
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
			$suma = $Semestralnominaliquidaciones->parafiscales[$filas-1][1];
            ?>
            <td width="31%"><?php  echo number_format($Semestralnominaliquidaciones->parafiscales[$filas-1][1]); ?></td>
            <td width="34%">&nbsp;</td>
          </tr>
          
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
		   $var = $Semestralnominaliquidaciones->getCesantias($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>CESANTIAS</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr=round($var);
		   $var = $Semestralnominaliquidaciones->getInteresesCesantias($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>INTERESES CESANTIAS</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Semestralnominaliquidaciones->getPrimaNavidad($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>PRIMA DE NAVIDAD</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Semestralnominaliquidaciones->getPrimaVacaciones($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>PRIMA DE VACACIONES</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Semestralnominaliquidaciones->getVacaciones($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>VACACIONES</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var = $Semestralnominaliquidaciones->getPrimaSemestral($Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]);
  		  ?>
		  <tr> 
		   <td>PRIMA SEMESTRAL</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $baseicbf= $Semestralnominaliquidaciones->liquidacion[$filas-1][$columnas-1]-($Semestralnominaliquidaciones->liquidacion[$filas-1][6]);
		   $var=$Semestralnominaliquidaciones->getIcbf($baseicbf);
  		  ?>
		  <tr> 
		   <td>I. C. B. F.</td><td align='right'><?php echo number_format($var); ?> </td><td>&nbsp;</td>
		  </tr>
		  
		  <?php
		   $totalapr+=round($var);
		   $var=$Semestralnominaliquidaciones->getCajaCompensacion($baseicbf);
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
