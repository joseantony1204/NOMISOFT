<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'RPNO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNO_PERIODO',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'RPNO_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNO_VALORPUNTO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNO_FECHAPROCESO',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'RPNO_ESTADO'); ?>

	<?php echo $form->textFieldRow($model,'RPNO_MESINICIO',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'RPNO_MESFINAL',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'RPNO_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNO_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
