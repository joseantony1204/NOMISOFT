<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'PENS_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PENS_NIT',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PENS_CODIGO',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PENS_NOMBRE',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'PENS_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PENS_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
