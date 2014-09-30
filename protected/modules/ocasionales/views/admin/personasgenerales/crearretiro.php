<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Personas Generales Retirados'=>array('admin/personasgenerales/crearretiro'),
	'Buscar cargo persona',
);

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
<table width="80%" border="0" align="left" class="">
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
             <td width="63%"><strong><span><em>DESCUENTOS PARA PRESTACIONES  [ Buscar persona ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/administrator',),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
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
    <td>
	<?php  //echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button btn')); ?>
    <div class="search-form" style="display:nones" >
    <?php $this->renderPartial('_crearretiro',array('Personasgenerales'=>$Personasgenerales,)); ?>
	</td>
  </tr>
  <tr>
    <td>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'personasgenerales-grid',
	'dataProvider'=>$Personasgenerales->buscar(),
	'type'=>'striped bordered condensed',
    'filter'=>$Personasgenerales,

	'columns'=>array(
	     array('name'=>'PEG_IDENTIFICACION', 'filter'=>false, 'value'=>'$data->PEG_IDENTIFICACION', 'htmlOptions'=>array('width'=>'80'),),
	     array('name'=>'PEG_PRIMERNOMBRE', 'filter'=>false, 'value'=>'$data->PEG_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'PEG_SEGUNDONOMBRE', 'filter'=>false, 'value'=>'$data->PEG_SEGUNDONOMBRE', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'PEG_PRIMERAPELLIDO', 'filter'=>false, 'value'=>'$data->PEG_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'EMPL_CARGO', 'filter'=>false, 'value'=>'$data->EMPL_CARGO', 'htmlOptions'=>array('width'=>'100'),),
		 
		 array( 
			  'name'=>'VINCULO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->link),array("admin/personasgenerales/insertretiro",
			                                                           "empleoPlanta"=>$data[EMPL_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'10',
								   'title' => 'Retirar cargo' , 
								   'alt' => 'Retirar cargo'), 
			  ),
	),
)); ?>
	</td>
  </tr>
</table>
