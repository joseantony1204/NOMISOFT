<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Nomina Retroactivos Puntos'=>array('admin/retroactivospuntosnomina/admin'),
	'Administrar',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('retroactivospuntosnomina-grid', {
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
             <td width="54%"><strong><span><em>ADMINISTRACION DE NOMINA DE RETROACTIVOS PUNTOS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/retroactivospuntosnomina/admin',),$htmlOptions ); 
?>         
		     </td>
			 
			 <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/search.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Busqueda Avanzada');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/retroactivospuntosnomina/search',),$htmlOptions ); 
?>          </td>

			 <td width="10%" align="center">
					 <?php					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/retroactivospuntosnomina/create',),$htmlOptions ); 
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
	'id'=>'retroactivospuntosnomina-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
	    array('name'=>'RPNO_ID', 'value'=>'$data->RPNO_ID', 'htmlOptions'=>array('width'=>'5'),),
		array('name'=>'RPNO_PERIODO', 'value'=>'$data->RPNO_PERIODO', 'htmlOptions'=>array('width'=>'250'),),
		array('name'=>'RPNO_PUNTOS', 'value'=>'$data->RPNO_PUNTOS', 'htmlOptions'=>array('width'=>'30'),),
		array('name'=>'RPNO_VALORPUNTO', 'value'=>'$data->RPNO_VALORPUNTO', 'htmlOptions'=>array('width'=>'100'),),
		array('name'=>'RPNO_FECHAPROCESO', 'value'=>'$data->RPNO_FECHAPROCESO', 'htmlOptions'=>array('width'=>'100'),),
		array( 
			  'name'=>'RPNO_ESTADO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->estado),array("admin/retroactivospuntosnomina/setEstado",
			                                                           "id"=>$data[RPNO_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'10',
								   'title' => 'PAGADA / NO PAGADA' , 
								   'alt' => 'PAGADA / NO PAGADA'), 
			  ),
		array( 
			  'name'=>'RPNO_DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> '
			             CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_totales.png"), array("admin/retroactivospuntosnominaliquidaciones/totales","retroactivoNomina"=>$data[RPNO_ID],))
						',
						
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'10',
								   'title' => 'DETALLES',
								   'alt' => 'DETALLES'
								  ),		
 
			  ),
			  
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{delete}',
              'buttons'=>array(       
			   'delete' => array(
			    'url'=>'Yii::app()->controller->createUrl("admin/retroactivospuntosnomina/delete", array("id"=>$data[RPNO_ID],"command"=>"delete"))',
				'visible'=>'$data->RPNO_ESTADO==0',
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
