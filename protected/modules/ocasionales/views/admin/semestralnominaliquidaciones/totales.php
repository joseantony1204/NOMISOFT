<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Prima Semetral'=>array('admin/semestralnomina/admin'),
	'Totales'
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
	$.fn.yiiGridView.update('semestralnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Semestralnomina = Semestralnomina::model()->findByPk($Semestralnominaliquidaciones->SENO_ID);
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
             <td width="54%"><strong><span><em>TOTALES DE LIQUIDACION PRIMA SEMESTRAL ( <?php echo $Semestralnomina->SENO_PERIODO; ?> )</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/semestralnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/semestralnominaliquidaciones/totales','semestralNomina'=>$Semestralnominaliquidaciones->SENO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_fna.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/semestralnominaliquidaciones/downfna','semestralNomina'=>$Semestralnominaliquidaciones->SENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagomes.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Mensual');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/semestralnominaliquidaciones/planopagoexcel','semestralNomina'=>$Semestralnominaliquidaciones->SENO_ID),$htmlOptions ); 
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
	'id'=>'semestralnominaliquidaciones-grid',
	'dataProvider'=>$Semestralnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Semestralnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'SENL_MESES', 'type'=>'number', 'value'=>'$data->SENL_MESES', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'SENL_PUNTOS', 'filter'=>false, 'value'=>'$data->SENL_PUNTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'SENL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->SENL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'SENL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->SENL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'SENL_RETEFUENTE', 'filter'=>false, 'type'=>'number', 'value'=>'$data->SENL_RETEFUENTE', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'SENL_DESCUENTOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->SENL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'SENL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->SENL_DEVENGADO -($data->SENL_RETEFUENTE+$data->SENL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/semestralnominaliquidaciones/detalles",
			                                                           "semestralNomina"=>$data[SENO_ID],
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
