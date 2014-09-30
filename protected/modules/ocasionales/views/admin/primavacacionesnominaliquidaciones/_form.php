<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'primavacacionesnominaliquidaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'PVNL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_SEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_RETEFUENTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PVNL_REGISTRADOPOR',array('class'=>'span5')); ?>

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




