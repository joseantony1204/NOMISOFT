<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Nomina Mensual'=>array('admin/mensualnomina/admin'),
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
	$.fn.yiiGridView.update('mensualnominaliquidaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Mensualnomina = Mensualnomina::model()->findByPk($Mensualnominaliquidaciones->MENO_ID);
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
             <td width="54%"><strong><span><em>TOTALES DE LIQUIDACION NOMINA MENSUAL ( <?php echo $Mensualnomina->MENO_PERIODO; ?> )</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnominaliquidaciones/totales','mensualNomina'=>$Mensualnominaliquidaciones->MENO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_fna.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnominaliquidaciones/planocesantias','mensualNomina'=>$Mensualnominaliquidaciones->MENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagomes.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Mensual');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnominaliquidaciones/planoPagoExcel','mensualNomina'=>$Mensualnominaliquidaciones->MENO_ID),$htmlOptions ); 
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
	'id'=>'mensualnominaliquidaciones-grid',
	'dataProvider'=>$Mensualnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Mensualnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'MENL_DIAS', 'type'=>'number', 'value'=>'$data->MENL_DIAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'MENL_PUNTOS', 'filter'=>false, 'value'=>'$data->MENL_PUNTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'MENL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->MENL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'MENL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->MENL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'MENL_PARAFISCALES', 'filter'=>false, 'type'=>'number', 'value'=>'$data->MENL_PARAFISCALES', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'MENL_DESCUENTOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->MENL_DESCUENTOS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'MENL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->MENL_DEVENGADO -($data->MENL_PARAFISCALES+$data->MENL_DESCUENTOS))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/mensualnominaliquidaciones/detalles",
			                                                           "id"=>$data[MENL_ID],
			                                                           "mensualNomina"=>$data[MENO_ID],
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
