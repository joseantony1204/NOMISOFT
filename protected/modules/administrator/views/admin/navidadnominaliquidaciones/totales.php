<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Prima Navidad'=>array('admin/navidadnomina/admin'),
	'Totales'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('navidadnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Navidadnomina = Navidadnomina::model()->findByPk($Navidadnominaliquidaciones->NANO_ID);
?>
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
             <td width="54%"><strong><span><em>TOTALES DE LIQUIDACION PRIMA DE NAVIDAD ( <?php echo $Navidadnomina->NANO_PERIODO; ?> )</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/navidadnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/navidadnominaliquidaciones/totales','navidadNomina'=>$Navidadnominaliquidaciones->NANO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_fna.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/navidadnominaliquidaciones/planocesantias','navidadNomina'=>$Navidadnominaliquidaciones->NANO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagomes.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Mensual');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/navidadnominaliquidaciones/planopagoexcel','navidadNomina'=>$Navidadnominaliquidaciones->NANO_ID),$htmlOptions ); 
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
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'navidadnominaliquidaciones-grid',
	'dataProvider'=>$Navidadnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Navidadnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'NANL_MESES', 'type'=>'number', 'value'=>'$data->NANL_MESES', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'NANL_PUNTOS', 'filter'=>false, 'value'=>'$data->NANL_PUNTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'NANL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->NANL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'NANL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->NANL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'NANL_RETEFUENTE', 'filter'=>false, 'type'=>'number', 'value'=>'$data->NANL_RETEFUENTE', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'NANL_DESCUENTOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->NANL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'NANL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->NANL_DEVENGADO -($data->NANL_RETEFUENTE+$data->NANL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/navidadnominaliquidaciones/detalles",
			                                                           "navidadNomina"=>$data[NANO_ID],
			                                                           "personaGral"=>trim($data[PEGE_IDENTIFICACION]),))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'5',
								   'title' => 'Detalles' , 
								   'alt' => 'Detalles'), 
			  ),
	),
)); ?>

    </td>
  </tr>
</table>
