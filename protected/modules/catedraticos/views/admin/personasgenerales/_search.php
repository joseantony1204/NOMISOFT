<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_IDENTIFICACION',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_PRIMERNOMBRE',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_SEGUNDONOMBRE',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_PRIMERAPELLIDO',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_SEGUNDOAPELLIDOS',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_FECHAINGRESO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_DIRECCION',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_TELEFONOFIJO',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_TELEFONOMOVIL',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_EMAIL',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_NUMEROCUENTA',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_FECHANACIMIENTO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_LUGAREXPEDIDENTIDAD',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PEGE_FECHAEXPEDIDENTIDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_FOTO',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'SALU_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PENS_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SIND_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SEXO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CATE_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEGE_REGISTRADOPOR',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
