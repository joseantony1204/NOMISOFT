<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Cumpleanios'=>array('admin/cumpleanios/admin'),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Cumpleanios','url'=>array('index')),
	array('label'=>'Create Cumpleanios','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cumpleanios-grid', {
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
             <td width="74%"><strong><span><em>ADMINISTRACION DE CUMPLEAÑOS DE EMPLEADOS</em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/'.$this->module->id),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/cumpleanios/admin',),$htmlOptions ); 
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
	'id'=>'cumpleanios-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$model,
	'columns'=>array(
		'PEGE_IDENTIFICACION',
		'PEGE_PRIMERNOMBRE',
		'PEGE_SEGUNDONOMBRE',
		'PEGE_PRIMERAPELLIDO',
		'PEGE_SEGUNDOAPELLIDOS',
		'PEGE_FECHANACIMIENTO',
		'CUMP_FECHANOTIFIACION',
		
	),
)); ?>

    </td>
  </tr>
</table>
