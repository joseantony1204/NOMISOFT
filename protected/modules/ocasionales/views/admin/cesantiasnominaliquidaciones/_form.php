<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cesantiasnominaliquidaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CENL_CODIGO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_DIAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PUNTOS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_SUELDO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_SALARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMAANTIGUEDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_TRANSPORTE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_ALIMENTACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMATECNICA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_GASTOSRP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_BONIFICACION',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_HORASEXTRAS',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_SEMESTRAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMAVACACIONES',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_PRIMANAVIDAD',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENO_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CENL_REGISTRADOPOR',array('class'=>'span5')); ?>

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




