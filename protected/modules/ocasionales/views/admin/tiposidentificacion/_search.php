<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'TIID_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TIID_NOMBRE',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'TIID_DESCRIPCION',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'TIID_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'TIID_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
