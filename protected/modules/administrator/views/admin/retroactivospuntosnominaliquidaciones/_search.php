<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'RPNL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_MESES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_PRIMASEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_PRIMAVACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_VACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_PRIMANAVIDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_CESANTIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RPNL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
