<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'search-update-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<table width="100%" border="0" align="center">
		   <tr>             
			 <td width="50%" align="left">			 
			 <?php echo $form->labelEx($Catedras,'FACU_ID'); ?>
			 <?php $data = CHtml::listData(Facultades::model()->findAll(),'FACU_ID','FACU_NOMBRE') ?>
			 <?php echo $form->dropDownList($Catedras,'FACU_ID',$data, array('class'=>'span4','prompt'=>'Elige...')); ?>
			 <?php echo $form->error($Catedras,'FACU_ID'); ?>
			 </td>		 
           </tr>		   
        </table>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Catedras->isNewRecord ? 'Continuar...' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>


