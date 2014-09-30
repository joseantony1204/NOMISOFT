<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Descuentos Prestaciones'=>array('admin/descuentosprestaciones/admin', 'id'=>$model->TIPR_ID),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Descuentosprestaciones','url'=>array('index')),
	array('label'=>'Create Descuentosprestaciones','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('descuentosprestaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$Tiposprestaciones = Tiposprestaciones::model()->findByPk($model->TIPR_ID);
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE DESCUENTOS PRESTACIONES (<?php echo $Tiposprestaciones->TIPR_NOMBRE; ?>) </em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/ocasionales',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/descuentosprestaciones/admin','id'=>$model->TIPR_ID),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/descuentosprestaciones/create','id'=>$model->TIPR_ID),$htmlOptions ); 
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
	'id'=>'salud-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		
		array('name'=>'DEPR_ID', 'value'=>'$data->DEPR_ID', 'htmlOptions'=>array('width'=>'20'),),
		array('name'=>'DEPR_NOMBRE', 'value'=>'$data->DEPR_NOMBRE', 'htmlOptions'=>array('width'=>'120'),),
		array('name'=>'DEPR_DESCRIPCION', 'value'=>'$data->DEPR_DESCRIPCION', 'htmlOptions'=>array('width'=>'100'),),
		array('name'=>'AFILIADOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->AFILIADOS', 'htmlOptions'=>array('width'=>'20', 'style'=>'text-align: center',),),
	
		array( 
			  'name'=>'DOWNLOAD',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_download.png"),
			             array("admin/descuentosprestaciones/download","id"=>$data[DEPR_ID],))',
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'20',
								   'title' => 'Descargar',
								   'alt' => 'Descargar'
								  ), 
			  ),
		
        array('name'=>'SUMATORIA', 'type'=>'number', 'filter'=>false, 'value'=>'$data->SUMATORIA', 'htmlOptions'=>array('width'=>'60', 'style'=>'text-align: right',),),
		
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{update}&nbsp;&nbsp;{delete}',			  
			),
	),
)); ?>
    </td>
  </tr>
</table>
