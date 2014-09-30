<table border="0" width="100%">
     <tr>
      <td width="90%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'primaRecreacionnomina-form',
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
	<?php echo $form->errorSummary($Recreacionnomina); ?>
	 <h5>LIQUIDACION DE NOMINA DE RECREACION</h5>
     <fieldset>
	  
	 <table border="0" width="100%" align="center"> 
	 <tr>
      <td align="center"><?php echo $form->hiddenField($Recreacionnomina,'RENO_ID'); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Recreacionnomina,'RENO_PERIODO'); ?></td>
	  <td>&nbsp;</td>
      <td align="center">
	   <?php echo $form->labelEx($Recreacionnomina,'RENO_FECHAPROCESO'); ?>
       <?php
       $Recreacionnomina->RENO_FECHAPROCESO = date("Y-m-d");	   
       $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Recreacionnomina,
       'attribute'=>'RENO_FECHAPROCESO',
       'value'=>$Recreacionnomina->RENO_FECHAPROCESO,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Recreacionnomina->RENO_FECHAPROCESO,
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
       <?php echo $form->error($Recreacionnomina,'RENO_FECHAPROCESO'); ?>
	  
	  
	  </td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Recreacionnomina,'RENO_ESTADO'); ?></td> 
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Recreacionnomina,'RENO_FECHACAMBIO'); ?></td> 
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->hiddenField($Recreacionnomina,'RENO_REGISTRADOPOR'); ?></td>      
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
		  'label'=>'Liquidar de recreacion',
          'loadingText'=>'loading...',
          'ajaxOptions' => array(
                'type' => 'POST',
                'url' =>Yii::app()->createURL('administrator/admin/recreacionnomina/create'),
                'beforeSend'=>"js:function(){
                                             $('#yt0').addClass('disabled');
                                             $('#yt0').html('<i class=\"icon-edit icon-white\"></i> Espere un momento por favor...');
											 $('#bar').attr('class','progress progress-success progress-striped active');
											 $('#load').attr('class','bar');										 
                                            }
						  ",
				'success'=>"js:function(data){										  
										  $('#yt0').removeClass('disabled');
                                          $('#yt0').html('<i class=\"icon-ok icon-white\"></i> Liquidar de recreacion');
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