<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'DEME_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DEME_NOMBRE',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'DEME_DESCRIPCION',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'DEME_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DEME_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
