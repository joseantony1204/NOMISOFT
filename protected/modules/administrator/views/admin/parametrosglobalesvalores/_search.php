<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'PAGV_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PAGV_ANIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PAGV_VALOR',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PAGL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PAGV_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PAGV_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>