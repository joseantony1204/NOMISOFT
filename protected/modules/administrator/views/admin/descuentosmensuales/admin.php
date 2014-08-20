<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Descuentos Mensuales'=>array('admin/descuentosmensuales/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Descuentosmensuales','url'=>array('index')),
	array('label'=>'Create Descuentosmensuales','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('descuentosmensuales-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE DESCUENTOS MENSUALES</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/administrator',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/descuentosmensuales/admin',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/descuentosmensuales/create',),$htmlOptions ); 
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
	'id'=>'descuentosmensuales-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		
		array('name'=>'DEME_ID', 'value'=>'$data->DEME_ID', 'htmlOptions'=>array('width'=>'20'),),
		array('name'=>'DEME_NOMBRE', 'value'=>'$data->DEME_NOMBRE', 'htmlOptions'=>array('width'=>'120'),),
		array('name'=>'DEME_DESCRIPCION', 'value'=>'$data->DEME_DESCRIPCION', 'htmlOptions'=>array('width'=>'140'),),
		array('name'=>'AFILIADOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->AFILIADOS', 'htmlOptions'=>array('width'=>'20', 'style'=>'text-align: center',),),
	
		array( 
			  'name'=>'DOWNLOAD',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_download.png"),
			             array("admin/descuentosmensuales/download","id"=>$data[DEME_ID],))',
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'20',
								   'title' => 'Descargar',
								   'alt' => 'Descargar'
								  ), 
			  ),
		
        array('name'=>'SUMATORIA', 'filter'=>false, 'type'=>'number', 'value'=>'$data->SUMATORIA', 'htmlOptions'=>array('width'=>'60', 'style'=>'text-align: right',),),
		
		array( 
			  'name'=>'RESET',
			  'type'=>'raw',
			  'filter'=>false,			  
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_reset.png"), "#", array("submit"=>array("reset", "id"=>$data->DEME_ID), "confirm" => "Esta seguro de reestablecer los valores de esta deduccion a cero?", "csrf"=>true))', 
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'5',
								   'title' => 'Reestablecer valor total',
								   'alt' => 'Reestablecer valor total'
								  ), 
			  ),
			
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{update}&nbsp;&nbsp;{delete}',
              'buttons'=>array(       
			   'delete' => array(
			    'url'=>'Yii::app()->controller->createUrl("admin/descuentosmensuales/delete", array("id"=>$data[DEME_ID],"command"=>"delete"))',
				
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
