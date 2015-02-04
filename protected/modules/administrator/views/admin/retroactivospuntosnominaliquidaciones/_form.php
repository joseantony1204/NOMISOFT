<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'retroactivospuntosnominaliquidaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

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
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>




