<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mensualnominaliquidaciones-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

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




