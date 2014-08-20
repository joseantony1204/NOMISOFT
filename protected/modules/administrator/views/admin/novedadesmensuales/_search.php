<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'GET',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); 

?>
        <table width="50%" border="0" align="center">
            <tr>
             <td width="20%" align="center"><?php echo $form->textFieldRow($Novedadesmensuales,'PEGE_IDENTIFICACION',array('class'=>'span2', 'placeholder'=>'IDENTIFICACION')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($Novedadesmensuales,'PEGE_PRIMERNOMBRE',array('class'=>'span2', 'placeholder'=>'PRIMER NOMBRE')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($Novedadesmensuales,'PEGE_SEGUNDONOMBRE',array('class'=>'span2', 'placeholder'=>'SEGUNDO NOMBRE')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($Novedadesmensuales,'PEGE_PRIMERAPELLIDO',array('class'=>'span2','placeholder'=>'PRIMER APELLIDO')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($Novedadesmensuales,'PEGE_SEGUNDOAPELLIDOS',array('class'=>'span2', 'placeholder'=>'SEGUNDO APELLIDO')); ?></td>
           </tr>
		   <tr>
             <td width="20%" align="left" colspan="5">&nbsp;</td>
           </tr><tr>
             <td width="20%" align="lefth" colspan="5">
<div class="form-actionss">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Busqueda',
			'icon'=>'search white',
		)); ?>
	</div>			 
			 </td>
           </tr>
        </table>
	

<?php $this->endWidget(); ?>

