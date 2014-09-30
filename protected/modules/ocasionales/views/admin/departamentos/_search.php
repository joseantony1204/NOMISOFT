<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'DEPA_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DEPA_NOMBRE',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'DEPA_INDICATIVO',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'PAIS_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DEPA_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'DEPA_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
