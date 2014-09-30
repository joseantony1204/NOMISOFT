<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'horasextrasyrecargos-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

    <table border="0" width="100%" align="center">
	

	
	<tr>
	<td align="left">
	<?php echo $form->errorSummary($Horasextrasyrecargos); ?>
	 <h5>HORAS EXTRAS Y RECARGOS</h5>
     <fieldset>
	  <table border="0" width="100%" align="center"> 
	 <tr>
      <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_HED',array('class'=>'span2')); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_HEN',array('class'=>'span2')); ?></td>
	  <td>&nbsp;</td>
      <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_HEDF',array('class'=>'span2')); ?></td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_HENF',array('class'=>'span2')); ?></td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
	 </tr>
	 <tr>
      <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_DYF',array('class'=>'span2')); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_REN',array('class'=>'span2')); ?></td>
	  <td>&nbsp;</td>
      <td align="center"><?php echo $form->textFieldRow($Horasextrasyrecargos,'HOER_RENDYF',array('class'=>'span2')); ?></td>
	  <td colspan="2">&nbsp;</td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
	 </tr>
	 </table>
	 </td>
	 </fieldset>
	</tr>
	
	
	
	</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Horasextrasyrecargos->isNewRecord ? 'Guardar' : 'Actualizar registro',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>




