<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'catedras-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>

	<table width="100%" border="0" align="center">
		   <tr>             
			 <td width="50%" align="center">			 
			 <?php echo $form->labelEx($Catedras,'FACU_ID'); ?>
			 <?php $data = CHtml::listData(Facultades::model()->findAll(),'FACU_ID','FACU_NOMBRE') ?>
			 <?php echo $form->dropDownList($Catedras,'FACU_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
			 <?php echo $form->error($Catedras,'FACU_ID'); ?>
			 <?php echo $form->hiddenField($Catedras,'PEAC_ID',array('class'=>'span2')); ?>
			 <?php echo $form->hiddenField($Catedras,'PEGE_ID',array('class'=>'span2')); ?>
			 </td>			 
			 <td width="50%" align="center">
			 <?php echo $form->textFieldRow($Catedras,'CATE_NUMHORAS',array('class'=>'span2')); ?>
			 </td>		 
           </tr>
		   
		   <tr> 		 
			 <td width="50%" align="center">
			 <?php echo $form->textFieldRow($Catedras,'CATE_VALORHORA',array('class'=>'span2', "style"=>"text-align: center", 'readonly'=>'readonly')); ?>
			 </td>			 
			 <td width="50%" align="center">
			 VALOR A PAGAR <br>
			 <?php echo CHtml::textField('CATE_VALORAPAGAR',0,array("class"=>"span2","style"=>"text-align: center", 'readonly'=>'readonly')); ?>
			 </td>			 
           </tr>	   
		   
        </table>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Catedras->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>

<script type="text/javascript">
$(document).ready(function () {

$('#Catedras_CATE_NUMHORAS').keyup(function() {
   var CATE_NUMHORAS = parseInt($("#Catedras_CATE_NUMHORAS").val());
   var CATE_VALORHORA = $("#Catedras_CATE_VALORHORA").val();
   
   var resultado = parseInt((CATE_NUMHORAS) *(CATE_VALORHORA));
   $("#CATE_VALORAPAGAR").val(resultado);
});

 });	
</script>


