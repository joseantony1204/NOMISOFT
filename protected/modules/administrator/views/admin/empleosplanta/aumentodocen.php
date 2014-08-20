<?php
Yii::app()->homeUrl = array('/administrator/');
$this->breadcrumbs=array(
	'Actualizar sueldo docentes'=>array('admin/empleosplanta/aumentodocen',),
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
             <td width="74%"><strong><span><em>AUMENTO DE SUELDO PARA DOCENTES</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/empleosplanta/aumentodocen',),$htmlOptions ); 
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
        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	    'id'=>'aumentodocen-form',
	    'enableAjaxValidation'=>false,
	    'type'=>'vertical',
	    'htmlOptions'=>array('class'=>'well'),
	    'enableClientValidation'=>true,
	    'clientOptions'=>array(
		'validateOnSubmit'=>true,),
        )); 
		?>
      <table width="100%" border="0">
       <tr>
        <td width="65%" align="right"><div class="tab"><strong>Digite el nuevo valor del punto </strong> :</div></td>
        <td width="8%" align="center">
		<?php echo $form->textField($Cform,'AUAD_PORCENTAJE',array('class'=>'span1')); ?> 
        <?php echo $form->error($Cform,'AUAD_PORCENTAJE'); ?>       
        </td>
        <td width="3%" align="left"><div class="tab">%</div></td>
        <td width="12%" align="center">
        <div class="form-actionsv">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'Proyectar',
		)); ?>
	    </div>
        </td>
        <td width="12%" align="center">
        <div class="form-actionsv">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'Guardar',
		)); ?>
	    </div>
        </td>
       </tr>
      </table>
      <?php $this->endWidget(); ?>

    </td>
  </tr>
  
  <tr>
    <td>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'aumentodocen-grid',
	'dataProvider'=>$Empleosplanta->aumentoDataProvider,
	'type'=>'striped bordered condensed',
    'filter' => null,
	'columns'=>array(
		 array(
            'header' => 'IDENTIFICACION',
            'type' => 'number',
            'name' => 'PEGE_IDENTIFICACION',
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'100',
								),   
         ),
		 
		 array(
            'header' => 'APELLIDO',
            'name' => 'PEGE_PRIMERAPELLIDO',
         ),
		 
		 array(
            'header' => 'NOMBRE',
            'name' => 'PEGE_PRIMERNOMBRE',
         ),
		 
		 array(
            'header' => 'SEG. NOMBRE',
            'name' => 'PEGE_SEGUNDONOMBRE',
         ),
		 
		 array(
            'header' => 'CARGO',
            'name' => 'EMPL_CARGO',
         ),
		 
		 array(
            'header' => 'PUNTOS',
			'name' => 'EMPL_PUNTOS',			
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'50',
								),
			),
			
			array(
            'header' => 'SUELDO',
            'type' => 'number',
			'name' => 'EMPL_SUELDO',			
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'80',
								),
			),
			
			array(
            'header' => 'AUMENTO',
            'type' => 'number',
			'name' => 'AUMENTO',			
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'80',
								),
			),
			
			array(
            'header' => 'NETO',
            'type' => 'number',
			'name' => 'NETO',			
			'htmlOptions'=>array(
			                       'style'=>'text-align: right','width'=>'80',
								),
			),					
		 
		 
	),
	
   )
  );  
?>

    </td>
  </tr>
</table>
