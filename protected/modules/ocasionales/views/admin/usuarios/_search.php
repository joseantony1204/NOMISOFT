<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'USUA_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'USUA_USUARIO',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'USUA_CLAVE',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'USUA_SESSION',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'USUA_FECHAALTA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'USUA_FECHABAJA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'USUA_ULTIMOACCESO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PENA_ID',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
