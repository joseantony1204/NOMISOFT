<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Sindicatos'=>array('admin/sindicatos/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Sindicatos','url'=>array('index')),
	array('label'=>'Create Sindicatos','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sindicatos-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE SINDICATOS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/sindicatos/admin',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/sindicatos/create',),$htmlOptions ); 
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
		
		array('name'=>'SIND_ID', 'value'=>'$data->SIND_ID', 'htmlOptions'=>array('width'=>'20'),),
		array('name'=>'SIND_NOMBRE', 'value'=>'$data->SIND_NOMBRE', 'htmlOptions'=>array('width'=>'200'),),
		array('name'=>'SIND_PORCENTAJE', 'value'=>'$data->SIND_PORCENTAJE', 'htmlOptions'=>array('width'=>'10'),),
	    array('name'=>'AFILIADOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->AFILIADOS', 'htmlOptions'=>array('width'=>'20', 'style'=>'text-align: center',),),
	
		array( 
			  'name'=>'DOWNLOAD',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_download.png"),
			             array("admin/sindicatos/afiliados","id"=>$data[SIND_ID],))',
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'20',
								   'title' => 'Descargar',
								   'alt' => 'Descargar'
								  ), 
			  ),
		
        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{update}&nbsp;&nbsp;{delete}',			  
			),
	),
)); ?>	
    </td>
  </tr>
</table>
