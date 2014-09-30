<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'GRAD_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GRAD_NOMBRE',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'GRAD_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GRAD_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'GRAD_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
