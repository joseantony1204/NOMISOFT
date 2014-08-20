<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pension-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'PENS_NIT',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PENS_CODIGO',array('class'=>'span3','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PENS_NOMBRE',array('class'=>'span3','maxlength'=>100)); ?>

	<?php echo $form->hiddenField($model,'PENS_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'PENS_REGISTRADOPOR',array('class'=>'span5')); ?>

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




