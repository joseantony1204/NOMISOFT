<table border="0" width="99%" align="center">
     <tr>
      <td>         


<?php 
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'personasgenerales-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well',),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>
	
	<table border="0" width="100%" align="center">

	<tr>
	<td align="left">
	 <p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>
	 <?php echo $form->errorSummary($Estadosempleosplanta); ?>
	
     <fieldset>
	  <table border="0" width="100%" align="center"> 
	 <tr>
      <td align="center">
	  <?php echo $form->labelEx($Estadosempleosplanta,'ESEP_FECHAREGISTRO'); ?>
      <?php 
       $Estadosempleosplanta->ESEP_FECHAREGISTRO	= date('Y-m-d');   
       $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Estadosempleosplanta,
       'attribute'=>'ESEP_FECHAREGISTRO',
       'value'=>$Estadosempleosplanta->ESEP_FECHAREGISTRO,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Estadosempleosplanta->ESEP_FECHAREGISTRO,
       'dateFormat'=>'yy-mm-dd',
	   'yearRange'=>'1900:2050',
       'buttonImage'=>Yii::app()->baseUrl.'/images/date.png',
       'buttonImageOnly'=>true,
       'buttonText'=>'Fecha Ingreso',	   
       'selectOtherMonths'=>true,
       'showAnim'=>'slide',
       'showButtonPanel'=>true,
       'showOn'=>'button',
       'showOtherMonths'=>true,
       'changeMonth' => 'true',
       'changeYear' => 'true',
       ),
       ));
	   ?>
      <?php echo $form->error($Estadosempleosplanta,'ESEP_FECHAREGISTRO'); ?>
	  
	  </td>
      <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Estadosempleosplanta,'ESEM_ID'); ?>
      <?php $data = CHtml::listData(Estadosempleos::model()->findAll(),'ESEM_ID','ESEM_NOMBRE') ?>
      <?php echo $form->dropDownList($Estadosempleosplanta,'ESEM_ID',$data, array('class'=>'span3',)); ?>
      <?php echo $form->error($Estadosempleosplanta,'ESEM_ID'); ?>
	  </td>     
     </tr>
	 </table>
	 </td>
	 </fieldset>
	</tr>
	
	<?php echo $form->hiddenField($Estadosempleosplanta,'EMPL_ID',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($Estadosempleosplanta,'ESEP_FECHACAMBIO',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($Estadosempleosplanta,'ESEP_REGISTRADOPOR',array('class'=>'span5')); ?>
	
	</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Estadosempleosplanta->isNewRecord ? 'Retirar Cargo' : 'Retirar Cargo',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>