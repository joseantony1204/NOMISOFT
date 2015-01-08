<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Cesantias'=>array('admin/cesantiasnomina/admin'),
	'Resumen'
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cesantiasnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
//echo Yii::app()->request->requestUri;

$Cesantiasnomina = Cesantiasnomina::model()->findByPk($Cesantiasnominaliquidaciones->CENO_ID);

$filas = count($Cesantiasnominaliquidaciones->liquidacion);
$columnas = count($Cesantiasnominaliquidaciones->liquidacion[1]);

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
             <td width="74%"><strong><span><em>RESUMEN DE LIQUIDACION NOMINA DE CESANTIAS ( <?php echo $Periodo; ?> )<br><?php echo $tercero; ?></em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/planoresumen',					                                                                              
																								  'cesantiasNomina'=>$cesantiasNomina,
																								  'cesantiasNomina2'=>$cesantiasNomina2,
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
			<?php 
			$total = 0;
			$total = $total + 
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][5]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][10]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][6]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][7]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][9]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][8];
			?>
            <td width="17%" align="right">&nbsp;</td>
			<td width="20%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][5]);?></td>           
            <td width="18%" align="right">&nbsp;</td>
          </tr>
		  
		  <tr>
            <td width="45%">GASTOS DE REPRESENTACION</td>
            <td width="17%" align="right">&nbsp;</td>
			<td width="20%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][10]);?></td>           
            <td width="18%" align="right">&nbsp;</td>
          </tr>
		  
		  <tr>
            <td width="45%">SUBSIDIO DE TRANSPORTTE</td>
			<td width="17%" align="right">&nbsp;</td>
            <td width="20%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][7]);?></td>
            <td width="18%" align="right">&nbsp;</td>
          </tr>
		  
		  <tr>
            <td width="45%">PRIMA DE ANTIGUEDAD</td>
			<td width="17%" align="right">&nbsp;</td>
            <td width="20%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][6]);?></td>
            <td width="18%" align="right">&nbsp;</td>
          </tr>
		  
		  <tr>
            <td width="45%">PRIMA TECNICA</td>
			<td width="17%" align="right">&nbsp;</td>
            <td width="20%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][9]);?></td>
            <td width="18%" align="right">&nbsp;</td>
          </tr>
          
		  <tr>
            <td width="45%">SUBSIDIO DE ALIMENTACION</td>
			<td width="17%" align="right">&nbsp;</td>
            <td width="20%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][8]);?></td>
            <td width="18%" align="right">&nbsp;</td>
          </tr>
          
		  <tr>
            <th>TOTAL DEVENGADO</th>
			<td width="17%" align="right">&nbsp;</td>
            <th align="right"><?php echo number_format($total);?></th>
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
            <th colspan="4" align="center">PRESTACIONES SOCIALES</th>
          </tr>
          <tr>
            <td width="51%" height="31">1/12 PRIMA SEMESTRAL</td>
            <td width="7%" align="right">&nbsp;</td>
			<?php 
			$sumaprestaciones = 0;
			$sumaprestaciones = $sumaprestaciones + 
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][12]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][11]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][13]+
			                    $Cesantiasnominaliquidaciones->liquidacion[$filas-1][14];
			?>
            <td width="15%" align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][12]);?></td>
            <td width="27%" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>1/12 PRIMA DE SERVICIOS (BSP)</td>
            <td align="right">&nbsp;</td>
            <td align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][11]);?></td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>1/12 PRIMA DE VACACIONES</td>
            <td align="right">&nbsp;</td>
            <td align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][13]);?></td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>1/12 PRIMA DE NAVIDAD</td>
            <td align="right">&nbsp;</td>
            <td align="right"><?php echo number_format($Cesantiasnominaliquidaciones->liquidacion[$filas-1][14]);?></td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <th>TOTAL PRESTACIONES</th>
            <td align="right">&nbsp;</td>
            <th align="right"><?php echo number_format($sumaprestaciones);?></th>
            <td align="right">&nbsp;</td>
          </tr>
		  
        </table>
		
		
		</td>
      </tr>
	  
	  <tr>
         <th>TOTAL GENERAL (DEVENGADO Y PRESTACIONES)</th>
         <th align="left"><?php echo number_format($total+$sumaprestaciones);?></th>
      </tr>
    </table>
	
    </td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
</table>
