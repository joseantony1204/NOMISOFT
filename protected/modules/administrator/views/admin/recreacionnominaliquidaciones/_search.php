<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'RENL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
