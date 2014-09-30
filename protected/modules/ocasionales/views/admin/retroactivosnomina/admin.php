<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Nomina Retroactivos'=>array('admin/retroactivosnomina/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Retroactivosnomina','url'=>array('index')),
	array('label'=>'Create Retroactivosnomina','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('retroactivosnomina-grid', {
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
             <td width="54%"><strong><span><em>ADMINISTRACION DE NOMINA DE RETROACTIVOS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/retroactivosnomina/admin',),$htmlOptions ); 
?>         
		     </td>
			 
			 <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/search.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Busqueda Avanzada');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/retroactivosnomina/search',),$htmlOptions ); 
?>          </td>

			 <td width="10%" align="center">
					 <?php					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/retroactivosnomina/create',),$htmlOptions ); 
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
	'id'=>'retroactivosnomina-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
	    array('name'=>'RANO_ID', 'value'=>'$data->RANO_ID', 'htmlOptions'=>array('width'=>'5'),),
		array('name'=>'RANO_PERIODO', 'value'=>'$data->RANO_PERIODO', 'htmlOptions'=>array('width'=>'300'),),
		array('name'=>'RANO_AUMENTO', 'value'=>'$data->RANO_AUMENTO', 'htmlOptions'=>array('width'=>'30'),),
		array('name'=>'RANO_AUMENTOPUNTO', 'value'=>'$data->RANO_AUMENTOPUNTO', 'htmlOptions'=>array('width'=>'80'),),
		array('name'=>'RANO_FECHAPROCESO', 'value'=>'$data->RANO_FECHAPROCESO', 'htmlOptions'=>array('width'=>'80'),),
		array( 
			  'name'=>'RANO_ESTADO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->estado),array("admin/retroactivosnomina/setEstado",
			                                                           "id"=>$data[RANO_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'10',
								   'title' => 'PAGADA / NO PAGADA' , 
								   'alt' => 'PAGADA / NO PAGADA'), 
			  ),
		array( 
			  'name'=>'RANO_DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> '
			             CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_totales.png"), array("admin/retroactivosnominaliquidaciones/totales","retroactivoNomina"=>$data[RANO_ID],))
						',
						
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'10',
								   'title' => 'DETALLES',
								   'alt' => 'DETALLES'
								  ),		
 
			  ),
		
		/*
		'RANO_FECHACAMBIO',
		'RANO_REGISTRADOPOR',
		*/
		
        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{delete}',
              'buttons'=>array(       
			   'delete' => array(
			    'url'=>'Yii::app()->controller->createUrl("admin/retroactivosnomina/delete", array("id"=>$data[RANO_ID],"command"=>"delete"))',
				'visible'=>'$data->RANO_ESTADO==0',
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
