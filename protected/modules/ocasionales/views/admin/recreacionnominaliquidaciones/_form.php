<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'recreacionnominaliquidacion-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'RENL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RENL_REGISTRADOPOR',array('class'=>'span5')); ?>

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




