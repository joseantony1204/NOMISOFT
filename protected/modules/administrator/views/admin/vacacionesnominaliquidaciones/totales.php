<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Vacaciones'=>array('admin/vacacionesnomina/admin'),
	'Totales'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vacacionesnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Vacacionesnomina = Vacacionesnomina::model()->findByPk($Vacacionesnominaliquidaciones->VANO_ID);
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
             <td width="54%"><strong><span><em>TOTALES DE LIQUIDACION DE VACACIONES ( <?php echo $Vacacionesnomina->VANO_PERIODO; ?> )</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/vacacionesnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/vacacionesnominaliquidaciones/totales','vacacionesNomina'=>$Vacacionesnominaliquidaciones->VANO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_fna.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/vacacionesnominaliquidaciones/planocesantias','vacacionesNomina'=>$Vacacionesnominaliquidaciones->VANO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagomes.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Mensual');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/vacacionesnominaliquidaciones/planopagoexcel','vacacionesNomina'=>$Vacacionesnominaliquidaciones->VANO_ID),$htmlOptions ); 
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
	'id'=>'vacacionesnominaliquidaciones-grid',
	'dataProvider'=>$Vacacionesnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Vacacionesnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'VANL_DIAS', 'type'=>'number', 'value'=>'$data->VANL_DIAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'VANL_PUNTOS', 'filter'=>false, 'value'=>'$data->VANL_PUNTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'VANL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->VANL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'VANL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->VANL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'VANL_RETEFUENTE', 'filter'=>false, 'type'=>'number', 'value'=>'$data->VANL_RETEFUENTE', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'VANL_DESCUENTOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->VANL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'VANL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->VANL_DEVENGADO -($data->VANL_RETEFUENTE+$data->VANL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/vacacionesnominaliquidaciones/detalles",
			                                                           "vacacionesNomina"=>$data[VANO_ID],
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
