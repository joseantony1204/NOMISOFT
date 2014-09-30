<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'semestralnominaliquidaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'SENL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SENL_REGISTRADOPOR',array('class'=>'span5')); ?>

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




