<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mensualnomina-form',
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
	<?php echo $form->errorSummary($Mensualnomina); ?>
	 <h5>LIQUIDACION DE NOMINA MENSUAL</h5>
     <fieldset>
	  
	 <table border="0" width="100%" align="center"> 
	 <tr>
      <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_ID'); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_PERIODO'); ?></td>
	  <td>&nbsp;</td>
      <td align="center">
	   <?php echo $form->labelEx($Mensualnomina,'MENO_FECHAPROCESO'); ?>
       <?php
       $Mensualnomina->MENO_FECHAPROCESO = date("Y-m-d");	   
       $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Mensualnomina,
       'attribute'=>'MENO_FECHAPROCESO',
       'value'=>$Mensualnomina->MENO_FECHAPROCESO,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Mensualnomina->MENO_FECHAPROCESO,
       'dateFormat'=>'yy-mm-dd',
	   'yearRange'=>'1900:2050',
       'buttonImage'=>Yii::app()->baseUrl.'/images/date.png',
       'buttonImageOnly'=>true,
       'buttonText'=>'Fecha Proceso',
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
       <?php echo $form->error($Mensualnomina,'MENO_FECHAPROCESO'); ?>
	  
	  
	  </td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_ESTADO'); ?></td> 
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_FECHACAMBIO'); ?></td> 
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_REGISTRADOPOR'); ?></td>      
     </tr>
	 <tr>
	  <td colspan="7" align="center">
	  <h5 class="h5" >Seleccione el la fecha de proceso y luego haga click el en boton liquidar !!!</h5>
	  
	  <div class="form-actions">
	   <?php $this->widget('bootstrap.widgets.TbButton', array(
          'buttonType'=>'ajaxLink',
          'type'=>'success',
		  'size'=>'small',
          'icon'=>'ok white',
		  'disabled' => false,
		  'label'=>'Liquidaciones posteriores de nomina',
          'loadingText'=>'loading...',
          'ajaxOptions' => array(
                'type' => 'POST',
                'url' =>Yii::app()->createURL('administrator/admin/mensualnomina/create'),
                'beforeSend'=>"js:function(){
                                             $('#yt0').addClass('disabled');
                                             $('#yt0').html('<i class=\"icon-edit icon-white\"></i> Espere un momento por favor...');
											 $('#bar').attr('class','progress progress-success progress-striped active');
											 $('#load').attr('class','bar');										 
                                            }
						  ",
				'success'=>"js:function(data){										  
										  $('#yt0').removeClass('disabled');
                                          $('#yt0').html('<i class=\"icon-ok icon-white\"></i> Liquidaciones posteriores de nomina');
										  $('#bar').removeAttr('class','progress progress-success progress-striped active');
										  $('#load').removeAttr('class','bar');
										  $('#result').html(data);  
                                         }
						  ",
				)	  
          )); 
		?>


	  </div>	  
	  </td>
	 </tr>
	 
	 </table>
	  
	 </fieldset>
	 </td>	 
	</tr>
	
	<tr>
	  <td colspan="7" align="center">
	  <div id="bar" class="">
       <div id="load" class="" style="width: 100%;"></div>
      </div>
      
      <div id="result"></div>	  
	  </td>
	 </tr>
	
	</table>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
	 
    </table>