<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'CENL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_HORASEXTRAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_SEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMAVACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMANAVIDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
