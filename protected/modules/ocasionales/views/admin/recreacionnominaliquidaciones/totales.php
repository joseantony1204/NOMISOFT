<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Recreacion'=>array('admin/recreacionnomina/admin'),
	'Totales'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('recreacionnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Recreacionnomina = Recreacionnomina::model()->findByPk($Recreacionnominaliquidaciones->RENO_ID);
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
             <td width="54%"><strong><span><em>TOTALES DE LIQUIDACION NOMINA DE RECREACION ( <?php echo $Recreacionnomina->RENO_PERIODO; ?> )</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/recreacionnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/recreacionnominaliquidaciones/totales','recreacionNomina'=>$Recreacionnominaliquidaciones->RENO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_fna.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/recreacionnominaliquidaciones/downfna','recreacionNomina'=>$Recreacionnominaliquidaciones->RENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagomes.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Mensual');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/recreacionnominaliquidaciones/planopagoexcel','recreacionNomina'=>$Recreacionnominaliquidaciones->RENO_ID),$htmlOptions ); 
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
	'id'=>'recreacionnominaliquidaciones-grid',
	'dataProvider'=>$Recreacionnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Recreacionnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_SEGUNDOAPELLIDOS',  'value'=>'$data->PEGE_SEGUNDOAPELLIDOS', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'RENL_DIAS', 'type'=>'number', 'value'=>'$data->RENL_DIAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'RENL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->RENL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RENL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->RENL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RENL_RETEFUENTE', 'filter'=>false, 'type'=>'number', 'value'=>'$data->RENL_RETEFUENTE', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'RENL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'($data->RENL_DEVENGADO -($data->RENL_RETEFUENTE))', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/recreacionnominaliquidaciones/detalles",
			                                                           "recreacionNomina"=>$data[RENO_ID],
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
