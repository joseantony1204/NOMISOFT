<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Nomina Mensual'=>array('admin/mensualnomina/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Mensualnomina','url'=>array('index')),
	array('label'=>'Create Mensualnomina','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensualnomina-grid', {
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
             <td width="54%"><strong><span><em>ADMINISTRACION DE NOMINA MENSUAL</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/mensualnomina/admin',),$htmlOptions ); 
?>          </td>
            <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/search.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Busqueda Avanzada');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnomina/search',),$htmlOptions ); 
?>          </td>
			 <td width="10%" align="center">
					 <?php
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnomina/create',),$htmlOptions ); 
?>         </td>
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
	'id'=>'mensualnomina-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(

		array('name'=>'MENO_ID', 'value'=>'$data->MENO_ID', 'htmlOptions'=>array('width'=>'10'),),
		array('name'=>'MENO_PERIODO', 'value'=>'$data->MENO_PERIODO', 'htmlOptions'=>array('width'=>'200'),),
		array('name'=>'MENO_FECHAPROCESO', 'value'=>'$data->MENO_FECHAPROCESO', 'htmlOptions'=>array('width'=>'10'),),
		array( 
			  'name'=>'MENO_ESTADO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->estado),array("admin/mensualnomina/setEstado",
			                                                           "id"=>$data[MENO_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'10',
								   'title' => 'PAGADA / NO PAGADA' , 
								   'alt' => 'PAGADA / NO PAGADA'), 
			  ),
		array( 
			  'name'=>'MENO_DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> '
			             CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_totales.png"), array("admin/mensualnominaliquidaciones/totales","mensualNomina"=>$data[MENO_ID],))
			             ."&nbsp;&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;".
						 CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_detalles.png"), array("admin/mensualnominaliquidaciones/detalles","mensualNomina"=>$data[MENO_ID],"sw"=>true,))
			             ."&nbsp;&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;".
						 CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_resumen.png"), array("admin/mensualnominaliquidaciones/resumen","mensualNomina"=>$data[MENO_ID],))						 
			            ',
						
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'50',
								   'title' => 'DETALLES',
								   'alt' => 'DETALLES'
								  ),		
 
			  ),	  
		
        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{delete}',
              'buttons'=>array(       
			   'delete' => array(
			    'url'=>'Yii::app()->controller->createUrl("admin/mensualnomina/delete", array("id"=>$data[MENO_ID],"command"=>"delete"))',
				'visible'=>'$data->MENO_ESTADO==0',
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
