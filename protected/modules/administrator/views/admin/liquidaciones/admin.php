<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Liquidaciones'=>array('admin/liquidaciones/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Liquidaciones','url'=>array('index')),
	array('label'=>'Create Liquidaciones','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('liquidaciones-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE LIQUIDACIONES FINALES</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/liquidaciones/admin',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/liquidaciones/create',),$htmlOptions ); 
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
   <td colspan="2">
	 <?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>	 <div class="search-form" style="display:none" >
	 <?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
   </td>
  </tr>
  <tr>
    <td>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'liquidaciones-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		'PEGE_IDENTIFICACION',
		'PEGE_PRIMERNOMBRE',
		'PEGE_PRIMERAPELLIDO',
		'PEGE_SEGUNDOAPELLIDOS',
		'LIQU_FECHAPROCESO',		
		'LIQU_ANIO',
		
		array(
		 'class'=>'CLinkColumn',
		 'header'=>'...',
		 'urlExpression'=>'"javascript:estado($data->LIQU_ID)"',
		 'labelExpression'=>'CHtml::image($data["estado"])',
		 'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'25',
								   ),
		),
		
		array( 
			  'name'=>'DOWNLOAD',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image(Yii::app()->baseurl."/images/nomina/icon_resumen.png"),
			             array("admin/liquidaciones/download","id"=>$data[LIQU_ID],))',
			  'htmlOptions'=>array(
			                       'style'=>'text-align: center','width'=>'25',
								   'title' => 'Descargar',
								   'alt' => 'Descargar'
								  ), 
			  ),
			  
		        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{delete}',
              'buttons'=>array(       
			   'delete' => array(
			    'url'=>'Yii::app()->controller->createUrl("admin/liquidaciones/delete", array("id"=>$data[LIQU_ID],"command"=>"delete"))',
				'visible'=>'$data->LIQU_ESTADO==0',
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

<script>
 function estado(id){
  if(confirm(" Esta seguro de cambiar el estado a la liquidacion? "))
  {
    $.ajax({
            data:{id:id},
            url:'updateState',		
            success:function(data){$("#liquidaciones-grid").yiiGridView("update",{});},
            complete: function(){alert('Registro actualizado con exito...');},			
          });
  }
}
</script>

<script>
 function download(id){
    $.ajax({
            data:{id:id},
            url:'download',			
          });
}
</script>
