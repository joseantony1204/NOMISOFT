        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	    'id'=>'pass-form',
	    'enableAjaxValidation'=>false,
	    'type'=>'vertical',
	    'htmlOptions'=>array('class'=>'well'),
	    'enableClientValidation'=>true,
	    'clientOptions'=>array(
		'validateOnSubmit'=>true,),
        )); 
		?>	  
    <table border="0" width="100%" align="center">

	<tr>
	<td align="left">
	 <h5>INGRESE SU CONTRASEÑA PARA CONFIRMAR LOS CAMBIOS...</h5>
     <fieldset>
	  <table border="0" width="100%" align="center"> 	
	 <tr>
      <td align="left"><?php echo $form->hiddenField($Cform,'NOVE_URL',array('class'=>'span2')); ?></td>    
      <td align="left"><?php echo $form->passwordFieldRow($Cform,'NOVE_PASS',array('class'=>'span2')); ?></td>    
     </tr>	 
	 </table>
	 </fieldset>
	</td>
	</tr>
	
	</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'CONFIRMAR CAMBIOS',
			'htmlOptions'=>array(
					            'id'=>'confirmarform',		        
								),
		)); ?>
	</div>
  <?php $this->endWidget(); ?>