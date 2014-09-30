<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Factoresretefuente'=>array('admin/factoresretefuente/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Factoresretefuente','url'=>array('index')),
	array('label'=>'Create Factoresretefuente','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('factoresretefuente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE FACTORES RETEFUENTE</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/factoresretefuente/admin',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/factoresretefuente/create',),$htmlOptions ); 
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
		
		array('name'=>'FARE_ID', 'value'=>'$data->FARE_ID', 'htmlOptions'=>array('width'=>'10'),),
		array('name'=>'FARE_NOMBRE', 'value'=>'$data->FARE_NOMBRE', 'htmlOptions'=>array('width'=>'100'),),
		array('name'=>'FARE_DESCRIPCION', 'value'=>'$data->FARE_DESCRIPCION', 'htmlOptions'=>array('width'=>'250'),),
		array('name'=>'FARE_TOPEDESCUENTO', 'type'=>'number', 'value'=>'$data->FARE_TOPEDESCUENTO', 'htmlOptions'=>array('width'=>'100', 'style'=>'text-align: right',),),
	    array('name'=>'AFILIADOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->AFILIADOS', 'htmlOptions'=>array('width'=>'20', 'style'=>'text-align: center',),),
		
		array( 
			  'name'=>'DOWNLOAD',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_download.png"),
			             array("admin/factoresretefuente/download","id"=>$data[FARE_ID],))',
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'10',
								   'title' => 'Descargar',
								   'alt' => 'Descargar'
								  ), 
			  ),
		
        array('name'=>'SUMATORIA', 'type'=>'number', 'value'=>'$data->SUMATORIA', 'htmlOptions'=>array('width'=>'30', 'style'=>'text-align: right',),),
		
		array( 
			  'name'=>'RESET',
			  'type'=>'raw',
			  'filter'=>false,			  
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_reset.png"), "#", array("submit"=>array("reset", "id"=>$data->FARE_ID), "confirm" => "Esta seguro de reestablecer los valores de esta factor de retefuente a cero?", "csrf"=>true))', 
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'5',
								   'title' => 'Reestablecer valor total',
								   'alt' => 'Reestablecer valor total'
								  ), 
			  ),
		
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{update}&nbsp;&nbsp;&nbsp;&nbsp;{delete}',
              'buttons'=>array(       
			   'delete' => array(
			    'url'=>'Yii::app()->controller->createUrl("admin/factoresretefuente/delete", array("id"=>$data[FARE_ID],"command"=>"delete"))',
				
				),
			  ),
              'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/crosse.png',
			  'deleteConfirmation'=>'Seguro que quiere eliminar el elemento?',
			  'afterDelete'=>'function(link,success,data){ if(success) alert("Elemento borrado exitosamente..."); }',			  
			),
	),
)); ?>	
    </td>
  </tr>
</table>
