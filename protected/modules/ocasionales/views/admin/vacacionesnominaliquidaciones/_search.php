<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'VANL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_SEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'VANL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
