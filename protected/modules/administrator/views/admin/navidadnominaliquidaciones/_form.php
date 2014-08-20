<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'navidadnominaliquidaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'NANL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_SEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_VACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NANL_REGISTRADOPOR',array('class'=>'span5')); ?>

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




