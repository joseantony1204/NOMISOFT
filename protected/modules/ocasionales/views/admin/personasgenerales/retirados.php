<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Personas Generales Retirados'=>array('admin/personasgenerales/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Personasgenerales','url'=>array('index')),
	array('label'=>'Create Personasgenerales','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('personasgenerales-grid', {
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
             <td width="64%"><strong><span><em>ADMINISTRACION DE PERSONAS RETIRADAS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/personasgenerales/retirados',),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/personasgenerales/crearretiro',),$htmlOptions ); 
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
	'id'=>'personasgenerales-grid',
	'dataProvider'=>$model->retirados(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		'PEGE_IDENTIFICACION',
		'PEGE_PRIMERAPELLIDO',
		'PEGE_SEGUNDOAPELLIDOS',
		'PEGE_PRIMERNOMBRE',
		'PEGE_SEGUNDONOMBRE',
		'PEGE_FECHAINGRESO',
		'ESEP_FECHAREGISTRO',
		/*
		
		'PEGE_DIRECCION',
		'PEGE_TELEFONOFIJO',
		'PEGE_TELEFONOMOVIL',
		'PEGE_EMAIL',
		
		'PEGE_FECHANACIMIENTO',
		'PEGE_LUGAREXPEDIDENTIDAD',
		'PEGE_FECHAEXPEDIDENTIDAD',
		'PEGE_FOTO',
		'TIID_ID',
		'SALU_ID',
		'PENS_ID',
		'SIND_ID',
		'SEXO_ID',
		'PAIS_ID',
		'DEPA_ID',
		'MUNI_ID',
		'GRSA_ID',
		'ESCI_ID',
		'CESA_ID',
		'PEGE_FECHACAMBIO',
		'PEGE_REGISTRADOPOR',
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
