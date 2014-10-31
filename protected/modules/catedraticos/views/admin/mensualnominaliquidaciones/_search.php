<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'MENL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HED',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HEDTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HEN',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HENTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HEDF',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HEDFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HENF',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_HENFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_DYF',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_DYFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_REN',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_RENTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_RENDYF',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_RENDYFTOTAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_PRIMAVACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'MENL_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
