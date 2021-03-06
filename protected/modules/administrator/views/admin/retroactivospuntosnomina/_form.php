<script type="text/javascript">
$(document).ready(function(){
        			
		$('#VALORPUNTOANTERIOR').keyup(function() {
            var puntoanterior = parseInt($("#VALORPUNTOANTERIOR").val());
            var puntoactual = parseInt($("#VALORPUNTOACTUAL").val());
			
			var diferencia=entero(puntoactual)-entero(puntoanterior);
	        var porcentaje=(diferencia/(puntoanterior)*100);
	        var Nporcentaje =(porcentaje);
			$("#Retroactivospuntosnomina_RPNO_VALORPUNTO").val(Nporcentaje.toFixed(2));
			
		});	
		
		$('#VALORPUNTOACTUAL').keyup(function() {
            var puntoanterior = parseInt($("#VALORPUNTOANTERIOR").val());
            var puntoactual = parseInt($("#VALORPUNTOACTUAL").val());
		
			$("#Retroactivospuntosnomina_RPNO_VALORPUNTO").val(puntoactual);
			
		});		
		
});

function entero(valor){
   //intento convertir a entero.
   //si era un entero no le afecta, si no lo era lo intenta convertir
   valor = parseInt(valor);

    //comprobamos si es un valor entero
    if (isNaN(valor)) {
          //no es entero 0
          return 0;
    }else{
          //es un valor entero
          return valor;
    }
}
</script>

<table border="0" width="100%">
     <tr>
      <td width="100%">         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'Retroactivospuntosnomina-form',
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
	<?php echo $form->errorSummary($Retroactivospuntosnomina); ?>
	 <h5>LIQUIDACION DE NOMINA DE RETROACTIVOS PUNTOS</h5>
     <fieldset>
	  
	 <table border="1" width="100%" align="center"> 
	 
	 <tr>
	  <?php echo $form->hiddenField($Retroactivospuntosnomina,'RPNO_ID'); ?>
      <td align="center">Aplicar retroactivo</td>
      <td align="center">DESDE: </td>
	  <td align="left">
	  <?php 
	  $data = array('01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL', '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO', '09' => 'SEPTIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE'); 
	  ?>
      <?php echo $form->dropDownList($Retroactivospuntosnomina,'RPNO_MESINICIO',$data, array('class'=>'span2',)); ?> 
	  <?php echo $form->error($Retroactivospuntosnomina,'RPNO_MESINICIO'); ?>
	  </td>
	  <td align="center">HASTA: </td>
	  <td align="left">
	  <?php 
	  $data = array('01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL', '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO', '09' => 'SEPTIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE'); 
	  ?>
      <?php echo $form->dropDownList($Retroactivospuntosnomina,'RPNO_MESFINAL',$data, array('class'=>'span2',)); ?> 
	  <?php echo $form->error($Retroactivospuntosnomina,'RPNO_MESFINAL'); ?>
	  </td>
      
	  <td align="center">DEL AÑO</td> 
	  <td align="left">
	  <?php echo $form->textField($Retroactivospuntosnomina,'RPNO_ANIO', array('class'=>'span1', 'value'=>date("Y"),)); ?>
	  <?php echo $form->error($Retroactivospuntosnomina,'RPNO_ANIO'); ?>
	  </td>	       
     </tr>
	 
	 <?php echo $form->hiddenField($Retroactivospuntosnomina,'RPNO_ESTADO'); ?>
	 <?php echo $form->hiddenField($Retroactivospuntosnomina,'RPNO_FECHACAMBIO'); ?>
	 <?php echo $form->hiddenField($Retroactivospuntosnomina,'RPNO_VALORPUNTO'); ?>
	 <?php echo $form->hiddenField($Retroactivospuntosnomina,'RPNO_REGISTRADOPOR'); ?>
	 <tr>
      <td colspan="7" align="center">&nbsp;</td>     
     </tr>
	 
	 <tr>
	  <td colspan="7" align="center">
	  <table border="0" width="100%" align="center">
       
	  <tr>
       <td colspan="2" align="center"><strong>PUNTOS A LIQUIDAR</strong></td>	  
       <td colspan="4" align="center"><strong>VARIACION PUNTO</strong></td>
	  </tr> 
	  
	  <tr>
	   <td align="center">Total Puntos</td>
	   <td align="center">
	    <?php echo $form->textField($Retroactivospuntosnomina,'RPNO_PUNTOS', array('class'=>'span1','value'=>0, 'style'=>'text-align:right')); ?>
	    <?php echo $form->error($Retroactivospuntosnomina,'RPNO_PUNTOS'); ?>
	   </td>
	  
       <td align="center">Valor anterior punto</td>
       <td align="center"><?php echo CHtml::textField('Text', '0', array('id'=>'VALORPUNTOANTERIOR', 'class'=>'span1', 'class'=>'span1', 'style'=>'text-align:right', 'maxlength'=>10)); ?></td>
       <td align="center">Valor nuevo punto</td>
       <td align="center"><?php echo CHtml::textField('VALORPUNTOACTUAL', '0', array('id'=>'VALORPUNTOACTUAL', 'class'=>'span1', 'style'=>'text-align:right', 'maxlength'=>10)); ?></td>
    
	   </td>
	  </tr> 
	  
	  </table> 
	  
	  </td>      
	 </tr>
	 
	 <tr>
	  <td colspan="7" align="center">
	  <h5 class="h5" >Para comenzar el proceso de liquidación de retroactivos puntos haga click el en siguiente boton !!!</h5>
	  
	  <div class="form-actions">
	   <?php $this->widget('bootstrap.widgets.TbButton', array(
          'buttonType'=>'ajaxLink',
          'type'=>'success',
		  'size'=>'small',
          'icon'=>'ok white',
		  'disabled' => false,
		  'label'=>'Liquidar nomina retroactivos puntos',
          'loadingText'=>'loading...',
          'ajaxOptions' => array(
                'type' => 'POST',
                'url' =>Yii::app()->createURL('administrator/admin/retroactivospuntosnomina/create'),
                'beforeSend'=>"js:function(){
                                             $('#yt0').addClass('disabled');
                                             $('#yt0').html('<i class=\"icon-edit icon-white\"></i> Espere un momento por favor...');
											 $('#bar').attr('class','progress progress-success progress-striped active');
											 $('#load').attr('class','bar');										 
                                            }
						  ",
				'success'=>"js:function(data){										  
										  $('#yt0').removeClass('disabled');
                                          $('#yt0').html('<i class=\"icon-ok icon-white\"></i> Liquidar nomina retroactivos puntos');
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