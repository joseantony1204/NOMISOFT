<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Primavacacionesnominaliquidaciones'=>array('admin/primavacacionesnominaliquidaciones/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Primavacacionesnominaliquidaciones','url'=>array('index')),
	array('label'=>'Create Primavacacionesnominaliquidaciones','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('primavacacionesnominaliquidaciones-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE PRIMAVACACIONESNOMINALIQUIDACIONES</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/primavacacionesnominaliquidaciones/admin',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/primavacacionesnominaliquidaciones/create',),$htmlOptions ); 
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
	'id'=>'primavacacionesnominaliquidaciones-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		'PVNL_ID',
		'PVNL_CODIGO',
		'PVNL_DIAS',
		'PVNL_PUNTOS',
		'PVNL_SUELDO',
		'PVNL_SALARIO',
		/*
		'PVNL_PRIMAANTIGUEDAD',
		'PVNL_TRANSPORTE',
		'PVNL_ALIMENTACION',
		'PVNL_PRIMATECNICA',
		'PVNL_GASTOSRP',
		'PVNL_BONIFICACION',
		'PVNL_SEMESTRAL',
		'PVNL_RETEFUENTE',
		'PVNO_ID',
		'EMPL_ID',
		'PVNL_FECHACAMBIO',
		'PVNL_REGISTRADOPOR',
		*/
		
        
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{update}&nbsp;&nbsp;{delete}',			  
			),
	),
)); ?>

    </td>
  </tr>
</table>
