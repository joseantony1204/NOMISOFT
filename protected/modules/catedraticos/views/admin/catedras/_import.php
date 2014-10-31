<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'search-update-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well','enctype' => 'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<table width="100%" border="0" align="center">
		   <tr>             
			 <td width="50%" align="left">			 
			 <?php echo $form->labelEx($Catedras,'FACU_ID'); ?>
			 <?php $data = CHtml::listData(Facultades::model()->findAll(),'FACU_ID','FACU_NOMBRE') ?>
			 <?php echo $form->dropDownList($Catedras,'FACU_ID',$data, array('class'=>'span4','prompt'=>'Elige...')); ?>
			 <?php echo $form->error($Catedras,'FACU_ID'); ?>
			 </td>		 
           </tr>
		   
		   <tr>             
			 <td width="50%" align="left">&nbsp;</td>		 
           </tr>
		   
		   <tr>             
			 <td width="50%" align="left">
              <?php
				echo $form->labelEx($Catedras, 'CATE_ARCHIVO');
				echo $form->fileField($Catedras, 'CATE_ARCHIVO',array('class'=>'span4','maxlength'=>45,'size' =>57));
				echo $form->error($Catedras, 'CATE_ARCHIVO');
			  ?>
			 </td>		 
           </tr>		   
        </table>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>'Continuar...',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>


