<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Retroactivosnominaliquidaciones'=>array('admin/retroactivosnominaliquidaciones/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Retroactivosnominaliquidaciones','url'=>array('index')),
	array('label'=>'Create Retroactivosnominaliquidaciones','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('retroactivosnominaliquidaciones-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE RETROACTIVOSNOMINALIQUIDACIONES</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/retroactivosnominaliquidaciones/admin',),$htmlOptions ); 
?>         
			</td>

			<td width="10%" align="center">
					 <?php				 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/retroactivosnominaliquidaciones/create',),$htmlOptions ); 
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
	'id'=>'retroactivosnominaliquidaciones-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		'RANL_ID',
		'RANL_CODIGO',
		'RANL_DIAS',
		'RANL_SALARIO',
		'RANL_PRIMAANTIGUEDAD',
		'RANL_TRANSPORTE',
		/*
		'RANL_ALIMENTACION',
		'RANL_HEDTOTAL',
		'RANL_HENTOTAL',
		'RANL_HEDFTOTAL',
		'RANL_HENFTOTAL',
		'RANL_DYFTOTAL',
		'RANL_RENTOTAL',
		'RANL_RENDYFTOTAL',
		'RANL_PRIMATECNICA',
		'RANL_GASTOSRP',
		'RANL_BONIFICACION',
		'RANL_PRIMAVACACIONES',
		'RANO_ID',
		'MENL_ID',
		'RANL_FECHACAMBIO',
		'RANL_REGISTRADOPOR',
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
