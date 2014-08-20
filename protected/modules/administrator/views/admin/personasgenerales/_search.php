<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
)); ?>
   
   
   <table width="80%" border="0" align="center">
            <tr>
             <td width="20%" align="center"><?php echo $form->textFieldRow($model,'PEGE_IDENTIFICACION',array('class'=>'span2','placeholder'=>'IDENTIFICACION')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($model,'PEGE_PRIMERNOMBRE',array('class'=>'span2', 'placeholder'=>'PRIMER NOMBRE')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($model,'PEGE_SEGUNDONOMBRE',array('class'=>'span2', 'placeholder'=>'SEGUNDO NOMBRE')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($model,'PEGE_PRIMERAPELLIDO',array('class'=>'span2','placeholder'=>'PRIMER APELLIDO')); ?></td>
             <td width="20%"align="center"><?php echo $form->textFieldRow($model,'PEGE_SEGUNDOAPELLIDOS',array('class'=>'span2', 'placeholder'=>'SEGUNDO APELLIDO')); ?></td>
           </tr>
		   <tr>
             <td width="20%" align="left" colspan="5">&nbsp;</td>
           </tr>
		   
		   <tr>
             <td width="20%" align="left" colspan="2">			 
			 <?php echo $form->labelEx($model,'TICA_ID'); ?>
			 <?php $data = CHtml::listData(Tiposcargos::model()->findAll(),'TICA_ID','TICA_NOMBRE') ?>
			 <?php echo $form->dropDownList($model,'TICA_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
			 <?php echo $form->error($model,'TICA_ID'); ?>
			 			 
			 </td>
             <td width="20%"align="left" colspan="2">			 
			 <?php echo $form->labelEx($model,'SEXO_ID'); ?>
			 <?php $data = CHtml::listData(Sexos::model()->findAll(),'SEXO_ID','SEXO_NOMBRE') ?>
			 <?php echo $form->dropDownList($model,'SEXO_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
			 <?php echo $form->error($model,'SEXO_ID'); ?>			 
			 </td>
			 
			 <td width="20%"align="left" colspan="3">			 
			 <?php echo $form->labelEx($model,'CESA_ID'); ?>
			 <?php $data = CHtml::listData(Cesantias::model()->findAll(),'CESA_ID','CESA_NOMBRE') ?>
			 <?php echo $form->dropDownList($model,'CESA_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
			 <?php echo $form->error($model,'CESA_ID'); ?>			 
			 </td>
            </tr>
		   
		   <tr>
             <td width="20%" align="lefth" colspan="5">
             <div class="form-actions">
		     <?php $this->widget('bootstrap.widgets.TbButton', array(
			 'buttonType'=>'submit',
			 'type'=>'success',
			 'label'=>'Busqueda',
			 'icon'=>'search white',
		     )); 
			 ?>
	         </div>			 
			 </td>
           </tr>
        </table>	

<?php $this->endWidget(); ?>
