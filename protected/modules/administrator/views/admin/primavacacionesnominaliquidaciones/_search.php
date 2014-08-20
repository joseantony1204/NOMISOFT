<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'PVNL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_SEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
