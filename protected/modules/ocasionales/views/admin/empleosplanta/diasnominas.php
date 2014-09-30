<?php
Yii::app()->homeUrl = array('/ocasionales/');
$this->breadcrumbs=array(
	'Actualizar unidades de nominas'=>array('admin/empleosplanta/diasnominas',),
	'Administrar',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('diasnominas-grid', {
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
             <td width="74%"><strong><span><em>ACTUALIZAR UNIDADES PARA LIQUIDCION DE NOMINAS</em></span></strong></td>
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
					 echo CHtml::link($image, array('admin/empleosplanta/diasnominas',),$htmlOptions ); 
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
        
		<td width="40%" align="center">
	    <?php echo $form->labelEx($Cform,'NOVE_TIPONOMINA'); ?>
	    <?php $data = array('01'=>'MENSUAL','02'=>'SEMESTRAL','03'=>'PRIMA VACACIONES', '04'=>'PRIMA NAVIDAD', '05'=>'VACACIONES', '06'=>'CESANTIAS'); ?>
        <?php echo $form->dropDownList($Cform,'NOVE_TIPONOMINA',$data, 
			                                array(
											      'ajax' => array(
                                                                  'type' => 'POST',
                                                                  'url' => CController::createUrl('admin/empleosplanta/diasnominas'),                                                                  
                                                                  ),
												  'class'=>'span4', 'prompt'=>'Elige...',
												  )
											     ); 
	    ?>
        <?php echo $form->error($Cform,'NOVE_TIPONOMINA'); ?>      
        </td>
		
		<td width="25%" align="center">
		<?php echo $form->labelEx($Cform,'NOVE_TIPOCARGO'); ?>
	     <?php $data = CHtml::listData(Tiposcargos::model()->findAll(),'TICA_ID','TICA_NOMBRE'); ?>
        <?php echo $form->dropDownList($Cform,'NOVE_TIPOCARGO',$data, 
			                                array(
											      'ajax' => array(
                                                                  'type' => 'POST',
                                                                  'url' => CController::createUrl('admin/empleosplanta/selecttipo'),                                                                  
                                                                  ),
												  'class'=>'span3', 'prompt'=>'Elige...',
												  )
											     ); 
	    ?>
        <?php echo $form->error($Cform,'NOVE_TIPOCARGO'); ?>      
        </td>
		
		<td width="20%" align="center">
		<?php echo $form->textFieldRow($Cform,'NOVE_UNIDADES',array('class'=>'span1')); ?>       
        </td>
    
        
        <td width="15%" align="center">
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
</table>
