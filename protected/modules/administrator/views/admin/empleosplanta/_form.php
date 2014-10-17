<script type="text/javascript">
// Esperar a que se cargue todo el documento
$(document).ready(function(){
        $('#Empleosplanta_TICA_ID').change(function(){
                val = $(this).find('option:selected').val();
                if(val==1){           
                      $('#Empleosplanta_EMPL_SUELDO').removeAttr('readonly'); 
                      $('#Empleosplanta_EMPL_PUNTOS').attr('readonly', 'readonly');					  
                      $('#Empleosplanta_EMPL_PUNTOS').val(0);					  
                }else{
				      if(val==''){ 
					    $('#Empleosplanta_EMPL_SUELDO').attr('readonly', 'readonly'); 
					    $('#Empleosplanta_EMPL_PUNTOS').attr('readonly', 'readonly');
                        $('#Empleosplanta_EMPL_SUELDO').val(0);
                        $('#Empleosplanta_EMPL_PUNTOS').val(0);						
                      }else{
							$('#Empleosplanta_EMPL_SUELDO').attr('readonly', 'readonly');
					        $('#Empleosplanta_EMPL_PUNTOS').removeAttr('readonly');
                            $('#Empleosplanta_EMPL_SUELDO').val(0);							
						   }
                     }
        });
		 
		$('#Empleosplanta_EMPL_PUNTOS').keyup(function() {
          var puntos = ($("#Empleosplanta_EMPL_PUNTOS").val());
          var valorPunto = ($("#punto").val());
   
          var resultado = parseInt(Math.ceil((puntos)*(valorPunto)));
          $("#Empleosplanta_EMPL_SUELDO").val(resultado);
       }); 
});
</script>
<table border="0" width="99%" align="center">
     <tr>
      <td>         


<?php 
    $Parametrosglobales = new Parametrosglobales; 	 
    $valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y"));
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
	<?php echo $form->errorSummary($Empleosplanta); ?>
	 <h5>INFORMACION PARA CREAR EL CARGO</h5>
	 <fieldset>
	  <table border="0" width="100%" align="center">	 
	 <tr>
      <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'TICA_ID'); ?>
      <?php $data = CHtml::listData(Tiposcargos::model()->findAll(),'TICA_ID','TICA_NOMBRE') ?>
      <?php echo $form->dropDownList($Empleosplanta,'TICA_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Empleosplanta,'TICA_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_PUNTOS',array('class'=>'span2', "readonly"=>"readonly")); ?></td>
	  <td><?php echo CHtml::hiddenField('punto',$valorestablecidos[1][3],array("class"=>"span2","style"=>"text-align: center",)); ?></td>
      <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_SUELDO',array('class'=>'span2', "readonly"=>"readonly")); ?></td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_CARGO',array('class'=>'span3',)); ?></td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
	 </tr>
	 <tr>
      <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'GARE_ID'); ?>
      <?php $data = CHtml::listData(Gastosrepresentacion::model()->findAll(),'GARE_ID','GARE_PORCENTAJE') ?>
      <?php echo $form->dropDownList($Empleosplanta,'GARE_ID',$data, array('class'=>'span3',)); ?>
      <?php echo $form->error($Empleosplanta,'GARE_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'EMPL_FECHAINGRESO'); ?>
      <?php
	   if($Empleosplanta->EMPL_FECHAINGRESO == ''){
	    $Empleosplanta->EMPL_FECHAINGRESO =  date("Y-m-d");	   
	   }
	   
       $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Empleosplanta,
       'attribute'=>'EMPL_FECHAINGRESO',
       'value'=>$Empleosplanta->EMPL_FECHAINGRESO,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Empleosplanta->EMPL_FECHAINGRESO,
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
      <?php echo $form->error($Empleosplanta,'EMPL_FECHAINGRESO'); ?>
	  </td>
	  <td>&nbsp;</td>
      <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_DIASAPAGAR',array('class'=>'span2',"readonly"=>"readonly")); ?></td>
	  <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'PRTE_ID'); ?>
      <?php $data = CHtml::listData(Primastecnicas::model()->findAll(),'PRTE_ID','PRTE_PORCENTAJE') ?>
      <?php echo $form->dropDownList($Empleosplanta,'PRTE_ID',$data, array('class'=>'span3',)); ?>
      <?php echo $form->error($Empleosplanta,'PRTE_ID'); ?>
	  </td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
	 </tr>
	 <tr>
      <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'UNID_ID'); ?>
      <?php $data = CHtml::listData(Unidades::model()->findAll(),'UNID_ID','UNID_NOMBRE') ?>
      <?php echo $form->dropDownList($Empleosplanta,'UNID_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Empleosplanta,'UNID_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'NIVE_ID'); ?>
      <?php $data = CHtml::listData(Niveles::model()->findAll(),'NIVE_ID','NIVE_NOMBRE') ?>
      <?php echo $form->dropDownList($Empleosplanta,'NIVE_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Empleosplanta,'NIVE_ID'); ?>
	  </td>
	  <td>&nbsp;</td>
      <td align="center">
	  <?php echo $form->labelEx($Empleosplanta,'GRAD_ID'); ?>
      <?php $data = CHtml::listData(Grados::model()->findAll(),'GRAD_ID','GRAD_NOMBRE') ?>
      <?php echo $form->dropDownList($Empleosplanta,'GRAD_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Empleosplanta,'GRAD_ID'); ?>
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
	
	<tr>
	 <td colspan="7">&nbsp;</td>
	</tr>
	
	<tr>
	<td align="left">
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
	
	<tr>
	 <td colspan="7">&nbsp;</td>
	</tr>
	
	<tr>
	<td align="left">
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
			'label'=>$Empleosplanta->isNewRecord ? 'Guardar Cargo' : 'Actualizar cargo',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>