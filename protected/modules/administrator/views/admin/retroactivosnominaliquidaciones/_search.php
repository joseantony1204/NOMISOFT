<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'RANL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_HEDTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_HENTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_HEDFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_HENFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_DYFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_RENTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_RENDYFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_PRIMAVACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RANL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
