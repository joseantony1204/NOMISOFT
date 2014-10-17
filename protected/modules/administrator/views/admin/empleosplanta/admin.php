<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Historial de cargos'=>array('admin/empleosplanta/admin','personaGeneral'=>$Personasgenerales->PEGE_ID),
	'Administrar',
);

/*
$this->menu=array(
	array('label'=>'List Empleosplanta','url'=>array('index')),
	array('label'=>'Create Empleosplanta','url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('empleosplanta-grid', {
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
             <td width="64%"><strong><span><em>HISTORIAL DE CARGOS DE (<?php echo $Personasgenerales->PEGE_PRIMERNOMBRE." ".$Personasgenerales->PEGE_PRIMERAPELLIDO; ?>) </em></span></strong></td>
			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir a Inicio');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/empleosplanta/search',),$htmlOptions ); 
?>         
					              </td>
             <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/empleosplanta/admin','personaGeneral'=>$Personasgenerales->PEGE_ID),$htmlOptions ); 
?>         
					              </td>

			 <td width="10%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/add.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Crear Registro');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/empleosplanta/create','personaGeneral'=>$Personasgenerales->PEGE_ID),$htmlOptions ); 
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
	'id'=>'empleosplanta-grid',
	'dataProvider'=>$Empleosplanta->busqueda(),
	'type'=>'striped bordered condensed',
    'filter'=>$Empleosplanta,
	'columns'=>array(
		array('name'=>'EMPL_CARGO', 'value'=>'$data->EMPL_CARGO', 'htmlOptions'=>array('width'=>'200'),),
		array('name'=>'EMPL_FECHAINGRESO', 'value'=>'$data->EMPL_FECHAINGRESO', 'htmlOptions'=>array('width'=>'50'),),
		array('name'=>'EMPL_PUNTOS', 'value'=>'$data->EMPL_PUNTOS', 'htmlOptions'=>array('width'=>'30','style'=>'text-align: right',),),
		array('name'=>'EMPL_SUELDO', 'type'=>'number', 'value'=>'$data->EMPL_SUELDO', 'htmlOptions'=>array('width'=>'30','style'=>'text-align: right',),),
		array('name'=>'TICA_ID', 'value'=>'$data->Tiposcargos->TICA_NOMBRE',  'filter'=>Empleosplanta::Tiposcargos(), 'htmlOptions'=>array('width'=>'30'),),
        array('name'=>'ESEM_NOMBRE', 'filter'=>false, 'value'=>'$data->ESEM_NOMBRE', 'htmlOptions'=>array('width'=>'40',),),
		array('name'=>'ESEP_FECHAREGISTRO', 'filter'=>false, 'value'=>'$data->ESEP_FECHAREGISTRO', 'htmlOptions'=>array('width'=>'20'),),
		
        array(
              'class'=>'bootstrap.widgets.TbButtonColumn',
              'template'=>'{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',			  
			),
	),
)); ?>

    </td>
  </tr>
</table>
