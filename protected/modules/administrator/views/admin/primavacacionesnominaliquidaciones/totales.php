<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Prima Vacaciones'=>array('admin/primavacacionesnomina/admin'),
	'Totales'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('primavacacionesnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Primavacacionesnomina = Primavacacionesnomina::model()->findByPk($Primavacacionesnominaliquidaciones->PVNO_ID);
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
             <td width="54%"><strong><span><em>TOTALES DE LIQUIDACION PRIMA DE VACACIONES ( <?php echo $Primavacacionesnomina->PVNO_PERIODO; ?> )</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnominaliquidaciones/totales','primavacacionesNomina'=>$Primavacacionesnominaliquidaciones->PVNO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_fna.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnominaliquidaciones/planocesantias','primavacacionesNomina'=>$Primavacacionesnominaliquidaciones->PVNO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagomes.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Mensual');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnominaliquidaciones/planopagoexcel','primavacacionesNomina'=>$Primavacacionesnominaliquidaciones->PVNO_ID),$htmlOptions ); 
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
	'id'=>'primavacacionesnominaliquidaciones-grid',
	'dataProvider'=>$Primavacacionesnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Primavacacionesnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PVNL_DIAS', 'type'=>'number', 'value'=>'$data->PVNL_DIAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'PVNL_PUNTOS', 'filter'=>false, 'value'=>'$data->PVNL_PUNTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'PVNL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->PVNL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'PVNL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->PVNL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'PVNL_RETEFUENTE', 'filter'=>false, 'type'=>'number', 'value'=>'$data->PVNL_RETEFUENTE', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'PVNL_DESCUENTOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->PVNL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'PVNL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->PVNL_DEVENGADO -($data->PVNL_RETEFUENTE+$data->PVNL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/primavacacionesnominaliquidaciones/detalles",
			                                                           "primavacacionesNomina"=>$data[PVNO_ID],
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
