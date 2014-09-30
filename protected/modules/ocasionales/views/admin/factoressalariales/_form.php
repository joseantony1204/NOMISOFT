<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'factoressalariales-form',
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
	<?php echo $form->errorSummary($Factoressalariales); ?>
	 <h5>FACTORES SALARIALES</h5>
     <fieldset>
	  
	 <table border="0" width="100%" align="center"> 
	 <tr>
      <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_SUBTRANSPORTE'); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_SUBALIMIENTACION'); ?></td>
	  <td>&nbsp;</td>
      <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_BSP'); ?></td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_PRIMAVACACIONES'); ?></td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
	 </tr>
	 <tr>
      <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_SUBSISTENCIA'); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_ESTAMPILLA'); ?></td>
	  <td>&nbsp;</td>
      <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_RETEFUENTE'); ?></td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->checkBoxRow($Factoressalariales,'FASA_FSP'); ?></td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
	 </tr>
	 </table>
	  
	 </fieldset>
	 </td>	 
	</tr>
	
	
	
	</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Factoressalariales->isNewRecord ? 'Crear' : 'Actualizar registro',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>




