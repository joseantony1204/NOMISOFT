<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Cesantias'=>array('admin/cesantias/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Cesantias','url'=>array('index')),
	array('label'=>'Create Cesantias','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cesantias-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE CESANTIAS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/cesantias/admin',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cesantias/create',),$htmlOptions ); 
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
		
		array('name'=>'CESA_ID', 'value'=>'$data->CESA_ID', 'htmlOptions'=>array('width'=>'20'),),
		array('name'=>'CESA_NOMBRE', 'value'=>'$data->CESA_NOMBRE', 'htmlOptions'=>array('width'=>'200'),),
	    array('name'=>'AFILIADOS', 'filter'=>false, 'type'=>'number', 'value'=>'$data->AFILIADOS', 'htmlOptions'=>array('width'=>'20', 'style'=>'text-align: center',),),
	
	   
		array( 
			  'name'=>'DOWNLOAD',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/icon_download.png"),
			             array("admin/cesantias/download","id"=>$data[CESA_ID],))',
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
