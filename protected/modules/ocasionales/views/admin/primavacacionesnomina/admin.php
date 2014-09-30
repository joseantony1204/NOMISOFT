<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Prima Vacaciones'=>array('admin/primavacacionesnomina/admin'),
	'Administrar',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('primavacacionesnomina-grid', {
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
             <td width="54%"><strong><span><em>ADMINISTRACION DE PRIMA DE VACACIONES</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/primavacacionesnomina/admin',),$htmlOptions ); 
?>         
			 </td>
             <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/search.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Busqueda Avanzada');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnomina/search',),$htmlOptions ); 
?>          </td>
			 <td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnomina/create',),$htmlOptions ); 
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
	'id'=>'navidadnomina-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(

		array('name'=>'PVNO_ID', 'value'=>'$data->PVNO_ID', 'htmlOptions'=>array('width'=>'10'),),
		array('name'=>'PVNO_PERIODO', 'value'=>'$data->PVNO_PERIODO', 'htmlOptions'=>array('width'=>'200'),),
		array('name'=>'PVNO_FECHAPROCESO', 'value'=>'$data->PVNO_FECHAPROCESO', 'htmlOptions'=>array('width'=>'10'),),
		array( 
			  'name'=>'PVNO_ESTADO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->estado),array("admin/primavacacionesnomina/setEstado",
			                                                           "id"=>$data[PVNO_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'10',
								   'title' => 'PAGADA / NO PAGADA' , 
								   'alt' => 'PAGADA / NO PAGADA'), 
			  ),
		array( 
			  'name'=>'PVNO_DETALLES',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> '
			             CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_totales.png"), array("admin/primavacacionesnominaliquidaciones/totales","primavacacionesNomina"=>$data[PVNO_ID],))
			             ."&nbsp;&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;".
						 CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_detalles.png"), array("admin/primavacacionesnominaliquidaciones/detalles","primavacacionesNomina"=>$data[PVNO_ID],"sw"=>true,))
			             ."&nbsp;&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;".
						 CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/nomina/icon_resumen.png"), array("admin/primavacacionesnominaliquidaciones/resumen","primavacacionesNomina"=>$data[PVNO_ID],))						 
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
			    'url'=>'Yii::app()->controller->createUrl("admin/primavacacionesnomina/delete", array("id"=>$data[PVNO_ID],"command"=>"delete"))',
				'visible'=>'$data->PVNO_ESTADO==0',
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
