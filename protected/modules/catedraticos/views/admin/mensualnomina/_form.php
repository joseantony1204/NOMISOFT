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
           
	  <td align="center">AÑO</td> 
	  <td align="center">
	  <?php echo $form->textField($Mensualnomina,'MENO_ANIO', array('class'=>'span1', 'value'=>date("Y"),)); ?>
	  <?php echo $form->error($Mensualnomina,'MENO_ANIO'); ?>
	  </td>
	  
	  <td align="center">PERIODO</td> 
	  <td align="center">
	  <?php 
	  $data = array('01' => 'I PERIODO ACADEMICO', '02' => 'II PERIODO ACADEMICO',); 
	  ?>
	  <?php echo $form->dropDownList($Mensualnomina,'MENO_PERIODO',$data, array('class'=>'span3','multiple'=>false, 'size'=>'2')); ?> 
	  <?php echo $form->error($Mensualnomina,'MENO_PERIODO'); ?>
	  </td>	
	  
	  <td align="center">CORTE</td> 
	  <td align="center">
	  <?php echo $form->textField($Informes,'INFO_CORTE', array('class'=>'span1',)); ?>
	  <?php echo $form->error($Informes,'INFO_CORTE'); ?>
	  </td>	  

	  
     </tr>
	 
  	 <tr>
      <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_ID'); ?></td>
      
	  <td align="center">&nbsp;</td>
	 
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_FECHAPROCESO', array('class'=>'span1', 'value'=>date("Y-m-d"),)); ?></td>
	  
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_ESTADO'); ?></td> 
	 
	  <td align="center"><?php echo $form->hiddenField($Mensualnomina,'MENO_FECHACAMBIO'); ?></td> 
	 
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
		  'label'=>'Liquidar nomina mensual',
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
                                          $('#yt0').html('<i class=\"icon-ok icon-white\"></i> Liquidar nomina mensual');
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