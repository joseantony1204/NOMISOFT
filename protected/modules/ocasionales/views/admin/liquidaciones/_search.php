<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'LIQU_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LIQU_FECHAINGRESO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LIQU_FECHARETIRO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LIQU_FECHAPROCESO',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'LIQU_ESTADO'); ?>

	<?php echo $form->textFieldRow($model,'LIQU_ANIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LIQU_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'LIQU_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
