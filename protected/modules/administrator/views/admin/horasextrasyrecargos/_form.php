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
)); 

$Empleosplanta = Empleosplanta::model()->findByPk($Horasextrasyrecargos->EMPL_ID);
$Personasgenerales = Personasgenerales::model()->findByPk($Empleosplanta->PEGE_ID);
?>
    	
    <table border="0" width="100%" align="center">
	
	<tr>	 
      <td width="100%">
	  <div class="form-actions" align="right">
	  <table border="0" width="100%">
	  <tr>
	   <td width="50%" colspan="2" align="center"><strong><?php echo $Personasgenerales->PEGE_PRIMERNOMBRE.' '.$Personasgenerales->PEGE_SEGUNDONOMBRE.' '.$Personasgenerales->PEGE_PRIMERAPELLIDO.' '.$Personasgenerales->PEGE_SEGUNDOAPELLIDOS; ?></strong></td>
	   <td width="25%" align="center">
	 
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'edit white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'ACTUALIZAR VALORES DE HORAS EXTRAS',
		)); ?>
	   </td>
	   <td width="25%" align="center">
	   
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'list white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'VER LIQUIDACION PRELIMINAR DEL CARGO',
		)); ?>
	    
	   </td>
	  </tr>
	  </table>
	   </div>
	  </td> 
	 </tr>
	
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
		
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>




