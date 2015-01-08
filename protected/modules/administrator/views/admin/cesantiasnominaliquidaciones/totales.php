<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Cesantias'=>array('admin/cesantiasnomina/admin'),
	'Totales'
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
$Cesantiasnomina = Cesantiasnomina::model()->findByPk($Cesantiasnominaliquidaciones->CENO_ID);
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
             <td width="34%"><strong><span><em>TOTALES DE LIQUIDACION NOMINA DE CESANTIAS <br>( <?php echo $Cesantiasnomina->CENO_PERIODO; ?> )</em></span></strong></td>
			 <td width="8%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="8%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/totales','cesantiasNomina'=>$Cesantiasnominaliquidaciones->CENO_ID),$htmlOptions ); 
?>         
					              </td>

			<td width="8%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_ibc.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Descargar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/planocesantias','cesantiasNomina'=>$Cesantiasnominaliquidaciones->CENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="8%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_unidtotal.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago General por Dependencias');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/planoexcelgrad','cesantiasNomina'=>$Cesantiasnominaliquidaciones->CENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			
			<td width="8%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_unidinteres.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Intereses por Dependencias');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/planoexcelintd','cesantiasNomina'=>$Cesantiasnominaliquidaciones->CENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			
			<td width="8%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagototal.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Plano General');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/planopagoexcel','cesantiasNomina'=>$Cesantiasnominaliquidaciones->CENO_ID),$htmlOptions ); 
                     ?>         
			</td>
			<td width="8%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/icon_download_pagointeres.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Reporte de Pago Plano Intereses');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantiasnominaliquidaciones/planopagoexcel','cesantiasNomina'=>$Cesantiasnominaliquidaciones->CENO_ID,'sw'=>true),$htmlOptions ); 
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
	'id'=>'cesantiasnominaliquidaciones-grid',
	'dataProvider'=>$Cesantiasnominaliquidaciones->totales(),
	'type'=>'striped bordered condensed',
    'filter'=>$Cesantiasnominaliquidaciones,
	'columns'=>array(
	
		array('name'=>'PEGE_PRIMERAPELLIDO',  'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_SEGUNDOAPELLIDOS',  'value'=>'$data->PEGE_SEGUNDOAPELLIDOS', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'PEGE_PRIMERNOMBRE',  'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'CENL_DIAS', 'type'=>'number', 'value'=>'$data->CENL_DIAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: center',),),
		array('name'=>'CENL_SALARIO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->CENL_SALARIO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'CENL_HORASEXTRAS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->CENL_HORASEXTRAS', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'CENL_DEVENGADO', 'filter'=>false, 'type'=>'number', 'value'=>'$data->CENL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
		array('name'=>'CENL_TOTALGRAL', 'filter'=>false, 'type'=>'number', 'value'=>'$data->CENL_DEVENGADO', 'htmlOptions'=>array('width'=>'10','style'=>'text-align: right',),),
        array( 
			  'name'=>'DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->detalles),array("admin/cesantiasnominaliquidaciones/detalles",
			                                                           "cesantiasNomina"=>$data[CENO_ID],
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
