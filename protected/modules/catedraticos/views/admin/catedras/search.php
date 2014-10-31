<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Novedades Mensuales'=>array('admin/catedras/search'),
	'Buscar persona',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('Personasgenerales-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<table width="80%" border="0" align="left" class="">
  <tr>
   <td colspan="2">
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
             <td width="63%"><strong><span><em>ADMINISTRACION DE NOVEDADES MENSUALES  [ Agregar catedra ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('/'.$this->module->id,),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/search',),$htmlOptions ); 
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
    <?php $this->renderPartial('_search',array('Personasgenerales'=>$Personasgenerales,)); ?>
	</td>
  </tr> 
  
   <tr>
    <td>
    <?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'Personasgenerales-grid',
	'dataProvider'=>$Personasgenerales->search(),
	'type'=>'striped bordered condensed',
    'filter'=>$Personasgenerales,

	'columns'=>array(
	     array('name'=>'PEGE_IDENTIFICACION', 'filter'=>false, 'value'=>'$data->PEGE_IDENTIFICACION', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'PEGE_PRIMERNOMBRE', 'filter'=>false, 'value'=>'$data->PEGE_PRIMERNOMBRE', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'PEGE_SEGUNDONOMBRE', 'filter'=>false, 'value'=>'$data->PEGE_SEGUNDONOMBRE', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'PEGE_PRIMERAPELLIDO', 'filter'=>false, 'value'=>'$data->PEGE_PRIMERAPELLIDO', 'htmlOptions'=>array('width'=>'100'),),
	     array('name'=>'PEGE_SEGUNDOAPELLIDOS', 'filter'=>false, 'value'=>'$data->PEGE_SEGUNDOAPELLIDOS', 'htmlOptions'=>array('width'=>'100'),),
		 
		 array( 
			  'name'=>'VINCULO',
			  'type'=>'html',
			  'filter'=>false,
			  'value'=> 'CHtml::link(CHtml::image($data->link),array("admin/catedras/create",
			                                                           "id"=>$data[PEGE_ID],))',
			  'htmlOptions'=>array('style'=>'text-align: center',
			                       'width'=>'10',
								   'title' => 'Cargar novedades' , 
								   'alt' => 'Cargar novedades'), 
			  ),
	  ),
    )); 
	?>
	</td>
  </tr>
	
  
  
</table>