 <style>
.ui-progressbar {
position: relative;
}
.progress-label {
position: absolute;
left: 50%;
top: 4px;
font-weight: bold;
text-shadow: 1px 1px 0 #fff;
}
</style> 
 
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
	  <div id="progressbar"><div class="progress-label">Cargando...</div></div>
		<?php /* $this->widget('bootstrap.widgets.TbProgress', array(
			'id'=>'progressbar',
			'type'=>'success',
			'percent'=>0,
			'striped'=>true,
			'animated'=>true,
		)); */ ?>	  
	  </td>
	 </tr>
	 <tr>
	  <td colspan="7" align="center">
	  <h5>Seleccione el la fecha de proceso y luego haga click el en boton liquidar !!!</h5>
	  
	  <div class="form-actionsS">
	  <?php $this->widget('bootstrap.widgets.TbButton', array(
		  'label'=>$Mensualnomina->isNewRecord ? 'Liquidar Nomina Mensual' : 'Actualizar',
		  'buttonType'=>'ajaxButton',
          'icon'=>'ok white',
          'url'=>$this->createUrl('admin/mensualnomina/create'),		  
		  'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		  'size'=>'small', // null, 'large', 'small' or 'mini'
		  'ajaxOptions'=>array(
			  'type' => 'POST',
			  'beforeSend'=>'function(){
                                        $("#update_info").replaceWith("<p id=\"update_info\">sending...</p>");
                                    }',
			  'success' => 'function(data) {
												var progressbar = $( "#progressbar" ),
												progressLabel = $( ".progress-label" );
												progressbar.progressbar({
												value: false,
												change: function() {
												progressLabel.text( progressbar.progressbar( "value" ) + "%" );
												},
												complete: function() {
												progressLabel.text( "Completo!" );
												}
												});
												function progress() {
												var val = progressbar.progressbar( "value" ) || 0;
												progressbar.progressbar( "value", val + 1 );
												if ( val < 99 ) {
												setTimeout( progress, 100 );
												}
												}
												setTimeout( progress, 3000 );
											}'
			  ,
		   ),
		 )); 
	   ?>
	  </div>	  
	  </td>
	 </tr>
	 </table>
	  
	 </fieldset>
	 </td>	 
	</tr>
	
	
	
	</table>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>