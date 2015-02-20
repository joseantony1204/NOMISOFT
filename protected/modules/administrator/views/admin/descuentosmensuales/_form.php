<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'descuentosmensuales-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>
     
	 <p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	 <?php echo $form->errorSummary($model); ?>
	
     <table border="0" width="100%">
      
	  <tr>
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_NIT',array('class'=>'span4','maxlength'=>30)); ?></td>      
       <td width="20%">&nbsp;</td>      
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_NOMBRE',array('class'=>'span4','maxlength'=>30)); ?></td>      
      </tr>
	  
	  <tr>      
       <td width="20%" colspan="3">&nbsp;</td>    
      </tr>
	  
	  <tr>
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_DESCRIPCION',array('class'=>'span4','maxlength'=>20)); ?></td>      
       <td width="20%">&nbsp;</td>      
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_DIRECCION',array('class'=>'span4','maxlength'=>30)); ?></td>      
      </tr>
	  
	  <tr>      
       <td width="20%" colspan="3">&nbsp;</td>    
      </tr>
	  
	  <tr>
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_TELEFONO',array('class'=>'span4','maxlength'=>10)); ?></td>      
       <td width="20%">&nbsp;</td>      
       <td width="40%">&nbsp;</td>   
      </tr>
	  
	  <tr>      
       <td width="20%" colspan="3">&nbsp;</td>    
      </tr>
	  
	  <tr>
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_IDREPRESENTANTE',array('class'=>'span4','maxlength'=>15)); ?></td>      
       <td width="20%">&nbsp;</td>      
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_NOMBREREPRESENTANTE',array('class'=>'span4','maxlength'=>50)); ?></td>      
      </tr>
	  
	  <tr>      
       <td width="20%" colspan="3">&nbsp;</td>    
      </tr>
	  
	  <tr>
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_IDCONTACTO',array('class'=>'span4','maxlength'=>15)); ?></td>      
       <td width="20%">&nbsp;</td>      
       <td width="40%"><?php echo $form->textFieldRow($model,'DEME_NOMBRECONTACTO',array('class'=>'span4','maxlength'=>50)); ?></td>      
      </tr>
	  
     </table>

	<?php echo $form->hiddenField($model,'DEME_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'DEME_REGISTRADOPOR',array('class'=>'span5')); ?>

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




