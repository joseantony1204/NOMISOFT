<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'departamentos-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'DEPA_NOMBRE',array('class'=>'span3','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'DEPA_INDICATIVO',array('class'=>'span3','maxlength'=>3)); ?>

	<?php echo $form->labelEx($model,'PAIS_ID'); ?>
    <?php $data = CHtml::listData(Paises::model()->findAll(),'PAIS_ID','PAIS_NOMBRE') ?>
    <?php echo $form->dropDownList($model,'PAIS_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
    <?php echo $form->error($model,'PAIS_ID'); ?>

	<?php echo $form->hiddenField($model,'DEPA_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'DEPA_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>




