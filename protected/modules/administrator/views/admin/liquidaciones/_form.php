<table border="0" width="100%">
     <tr>
      <td width="100%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'liquidaciones-form',
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
	<?php echo $form->errorSummary($Liquidaciones); ?>
	 <h5>LIQUIDACION DE EMPLEADOS RETIRADOS</h5>
     <fieldset>
	  
	 <table border="1" width="100%" align="center"> 
	 
	 <tr>
	  <?php echo $form->hiddenField($Liquidaciones,'LIQU_ID'); ?>
      <td align="center">Liquidar</td>
      <td align="center">DESDE: </td>
	  <td align="left">
	  <?php 
	  $data = array('01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL', '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO', '09' => 'SEPTIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE'); 
	  ?>
      <?php echo $form->dropDownList($Liquidaciones,'LIQU_MESINICIO',$data, array('class'=>'span2',)); ?> 
	  <?php echo $form->error($Liquidaciones,'LIQU_MESINICIO'); ?>
	  </td>
	  <td align="center">HASTA: </td>
	  <td align="left">
	  <?php 
	  $data = array('01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL', '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO', '09' => 'SEPTIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE'); 
	  ?>
      <?php echo $form->dropDownList($Liquidaciones,'LIQU_MESFINAL',$data, array('class'=>'span2',)); ?> 
	  <?php echo $form->error($Liquidaciones,'LIQU_MESFINAL'); ?>
	  </td>
      
	  <td align="center">DEL AÑO</td> 
	  <td align="left">
	  <?php echo $form->textField($Liquidaciones,'LIQU_ANIO', array('class'=>'span1', 'value'=>date("Y"),)); ?>
	  <?php echo $form->error($Liquidaciones,'LIQU_ANIO'); ?>
	  </td>	       
     </tr>
	 
	 <?php echo $form->hiddenField($Liquidaciones,'LIQU_ESTADO'); ?>
	 <?php echo $form->hiddenField($Liquidaciones,'LIQU_FECHACAMBIO'); ?>
	 <?php echo $form->hiddenField($Liquidaciones,'LIQU_REGISTRADOPOR'); ?>
	 <tr>
      <td colspan="7" align="center">&nbsp;</td>     
     </tr>
	 
	 
	 <tr>
	  <td colspan="7" align="center">
	  <h5 class="h5" >Para comenzar el proceso de liquidación haga click el en siguiente boton !!!</h5>
	  
	  <div class="form-actions">
	   <?php $this->widget('bootstrap.widgets.TbButton', array(
          'buttonType'=>'ajaxLink',
          'type'=>'success',
		  'size'=>'small',
          'icon'=>'ok white',
		  'disabled' => false,
		  'label'=>'Liquidar empleados',
          'loadingText'=>'loading...',
          'ajaxOptions' => array(
                'type' => 'POST',
                'url' =>Yii::app()->createURL('administrator/admin/liquidaciones/create'),
                'beforeSend'=>"js:function(){
                                             $('#yt0').addClass('disabled');
                                             $('#yt0').html('<i class=\"icon-edit icon-white\"></i> Espere un momento por favor...');
											 $('#bar').attr('class','progress progress-success progress-striped active');
											 $('#load').attr('class','bar');										 
                                            }
						  ",
				'success'=>"js:function(data){										  
										  $('#yt0').removeClass('disabled');
                                          $('#yt0').html('<i class=\"icon-ok icon-white\"></i> Liquidar empleados');
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
      
      <div id="ok">
	  <div id="result">
	  
	  </div>
	  </div>
	  
	  </td>
	 </tr>
	
	</table>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
	 <tr>
	  <td>&nbsp;</td>
	 </tr>
	 
    </table>