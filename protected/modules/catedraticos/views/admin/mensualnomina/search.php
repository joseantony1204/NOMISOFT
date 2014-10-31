<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Nomina Mensual'=>array('admin/mensualnomina/search'),
	'Busqueda Avanzada',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mensualnomina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<script type="text/javascript">
$(document).ready(function(){
        //Al cambiar la opción del SELECT
        $('#Informes_INFO_MESINICIO').change(function(){
            //Fijarse el valor de la opción seleccionada en el otro select
            var mesInicial = $(this).find('option:selected').val();
            var mesFinal = $(this).find('option:selected').val();			
			$("#Informes_INFO_MESFINAL").val(mesInicial); 
			
        });
		
		$('#Informes_INFO_MESFINAL').change(function(){
            var mesFinal = $(this).find('option:selected').val();             
        });
		
		
		$('#Informes_INFO_PERIODOINICIO').click(function(){
            //Fijarse el valor de la opción seleccionada en el otro select
            var periodoInicial = $(this).find('option:checked').val();
            var periodoFinal = $(this).find('option:checked').val();			
			$("#Informes_INFO_PERIODOFINAL").val(periodoInicial); 
			
        });
		
		$('#Informes_INFO_PERIODOFINAL').click(function(){
            var periodoFinal = $(this).find('option:selected').val();			
        });
				
		$('#Informes_INFO_ANIOINICIO').change(function(){
            //Fijarse el valor de la opción seleccionada en el otro select
            var anioInicial = $(this).find('option:selected').val();
            var anioFinal = $(this).find('option:selected').val();			
			$("#Informes_INFO_ANIOFINAL").val(anioInicial); 
			
        });
		
		$('#Informes_INFO_ANIOFINAL').change(function(){
            var anioFinal = $(this).find('option:selected').val();           
        });
		
		$('#Informes_INFO_IDENTIFICACION').keyup(function() {
            var identificacion = parseInt($("#Informes_INFO_IDENTIFICACION").val());
			var unidad = $("#Informes_INFO_UNIDAD").val('');
            var tipoEmpleado = $("#Informes_INFO_CARGO").val('');
		});
		
		$('#Informes_INFO_UNIDAD').change(function(){
            //Fijarse el valor de la opción seleccionada en el otro select
            var identificacion = $("#Informes_INFO_IDENTIFICACION").val('');
            var tipoEmpleado = $("#Informes_INFO_CARGO").val('');
			
        });
		
		$('#Informes_INFO_CARGO').change(function(){
            //Fijarse el valor de la opción seleccionada en el otro select
            var identificacion = $("#Informes_INFO_IDENTIFICACION").val('');
            var unidad = $("#Informes_INFO_UNIDAD").val('');
			
        });
});

function validar(form){
 if(($("#Informes_INFO_MESINICIO").val())==''){
  alert("El corte inicial no debe ser nulo...");
  return;
 }
  
 if(($("#Informes_INFO_PERIODOINICIO").val())==null){
  alert("El periodo inicial no debe ser nulo...");
  return;
 } 
 
 if(($("#Informes_INFO_ANIOINICIO").val())==''){
  alert("El año inicial no debe ser nulo...");
  return;
 } 
 
 if(($("#Informes_INFO_MESFINAL").val())==''){
  alert("El corte final no debe ser nulo...");
  return;
 }
 
 if(($("#Informes_INFO_PERIODOFINAL").val())==null){
  alert("El periodo final no debe ser nulo...");
  return;
 } 
 
 if(($("#Informes_INFO_ANIOFINAL").val())==''){
  alert("El año final no debe ser nulo...");
  return;
 } 
 
 return 1;
}

	function detalles(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/detalles/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion);
	  }
	}
	
	
	function resumen(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/resumen/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion);
	  }
	}
	
	function email(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/email/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion);
	  }
	}
	
	function salud(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		var idSalud = $("#Informes_INFO_SALUD").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/salud/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion+"/idSalud/"+idSalud);
	  }
	 }
	 
	 function ibc(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		var idSalud = $("#Informes_INFO_SALUD").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/ibc/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion);
	  }
	 }
	  
	  function pension(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		var idPension = $("#Informes_INFO_PENSION").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/pension/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion+"/idPension/"+idPension);
	  }
	}
	
	function sindicato(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		var idSindicato = $("#Informes_INFO_SINDICATOS").val();
		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/sindicato/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion+"/idSindicato/"+idSindicato);
	  }
	}
	
	function descuento(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();
		var identificacion = $("#Informes_INFO_IDENTIFICACION").val();
		var facultad = $("#Informes_INFO_UNIDAD").val();
		var idDescuento = $("#Informes_INFO_DESCUENTOS").val();
		if((idDescuento)!=''){
		 if((idDescuento)==null){
          alert('Debe seleccionar algun descuento de la lista..!');
		 }else{
		      window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/descuento/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal+"/facultad/"+facultad+"/personaGral/"+identificacion+"/idDescuento/"+idDescuento);
	         }		 
		}
	 }
	}
	
	function retefuente(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/retefuente/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal);
	  }
	}
	
	function estampilla(f){
	 if(validar(f)==1){
		var anioInicial = $("#Informes_INFO_ANIOINICIO").val();
		var anioFinal = $("#Informes_INFO_ANIOFINAL").val();
		var periodoFinal = $("#Informes_INFO_PERIODOFINAL").val();
		var periodoInicio = $("#Informes_INFO_PERIODOINICIO").val();
		var mesInicial = $("#Informes_INFO_MESINICIO").val();
		var mesFinal = $("#Informes_INFO_MESFINAL").val();		
		window.location=("/Dropbox/NOMINA/catedraticos/admin/mensualnominaliquidaciones/estampilla/mensualNomina/"+anioInicial+periodoInicio+mesInicial+"/mensualNomina2/"+anioFinal+periodoFinal+mesFinal);
	  }
	}
</script>

<table width="90%" border="0" align="left" class="">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             <td width="6%" align="center">
					  <?php 			 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
					  echo $image = CHtml::image($imageUrl); 
					  ?>         
					               
             </td>
             <td width="63%"><strong><span><em>ADMINISTRACION DE REPORTES DE NOMINA [ Busqueda Avanzada ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnomina/admin',),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/mensualnomina/search',),$htmlOptions ); 
?>         
					              </td>
           </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  
  
  
  <tr>
    <td>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>"form1",
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'POST',
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); 

?>
        <table width="100%" border="0" align="center">
            
			<tr>
             <td width="100%" align="left">
			 <h5>PERIODO</h5>
			 <p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>
             <fieldset>
			 <table width="100%" border="0" align="center">            
	            <?php echo $form->errorSummary($Informes); ?>
			  <tr>
               <td width="25%"  align="center"><h5>CORTE DE LIQUIDACION</h5></td>
               <td width="25%"  align="center"><h5>PERIODO DE LIQUIDACION</h5></td>
               <td width="25%"  align="center"><h5>AÑO DE LIQUIDACION</h5></td>
			  </tr>
			  
			   <?php 
			   $data = array('01' => '01', '02' => '02', '03' => '03', '04' => '04'); 
			   ?>
			   
			   <?php 
	           $periodos = array('01' => 'I PERIODO ACADEMICO', '02' => 'II PERIODO ACADEMICO',); 
	           ?>
			   
			   <?php 
		       $criterio = new CDbCriteria;
		       $criterio ->select = '"MENO_ANIO"';
		       $criterio->group = '"MENO_ANIO"'; 
			   $criterio->order = '"MENO_ANIO" DESC';    
		       $anios = CHtml::listData(Mensualnomina::model()->findAll($criterio),'MENO_ANIO','MENO_ANIO');
		       ?>
			  
			  <tr>		  
			   <td width="25%" align="center">	
               <?php echo $form->labelEx($Informes,'INFO_MESINICIO'); ?>
			   <?php echo $form->dropDownList($Informes,'INFO_MESINICIO',$data, array('class'=>'span2', 'prompt'=>'Elige...',)); ?> 
		       <?php echo $form->error($Informes,'INFO_MESINICIO'); ?>
			   </td>
			   
			   <td width="25%" align="center">               
	           <?php echo $form->dropDownList($Informes,'INFO_PERIODOINICIO',$periodos, array('class'=>'span3','multiple'=>false, 'size'=>'2')); ?> 
	           <?php echo $form->error($Informes,'INFO_PERIODOINICIO'); ?>
			   </td>
			   
			   <td width="25%" align="center">	
               <?php echo $form->labelEx($Informes,'INFO_ANIOINICIO'); ?>
			   <?php echo $form->dropDownList($Informes,'INFO_ANIOINICIO',$anios, array('class'=>'span2', 'prompt'=>'Elige...',)); ?> 
		       <?php echo $form->error($Informes,'INFO_ANIOINICIO'); ?>
			   </td>
			  </tr>
			  
			  <tr>		  
			   <td width="25%" align="center">
			   <?php echo $form->labelEx($Informes,'INFO_MESFINAL'); ?>
			   <?php echo $form->dropDownList($Informes,'INFO_MESFINAL',$data, array('class'=>'span2', 'prompt'=>'Elige...',)); ?> 
		       <?php echo $form->error($Informes,'INFO_MESFINAL'); ?>
			   </td>
			   
			   <td width="25%" align="center">               
	           <?php echo $form->dropDownList($Informes,'INFO_PERIODOFINAL',$periodos, array('class'=>'span3','multiple'=>false, 'size'=>'2')); ?> 
	           <?php echo $form->error($Informes,'INFO_PERIODOFINAL'); ?>
			   </td>
			   
			   <td width="25%" align="center">
			   <?php echo $form->labelEx($Informes,'INFO_ANIOFINAL'); ?>
			   <?php echo $form->dropDownList($Informes,'INFO_ANIOFINAL',$anios, array('class'=>'span2', 'prompt'=>'Elige...',)); ?> 
		       <?php echo $form->error($Informes,'INFO_ANIOFINAL'); ?>
			   </td>
			   
			  </tr>
			  
			</table>
			 
			 </fieldset>			 
			 </td>
			</tr>	
		</table>	
<?php  $this->endWidget(); ?>
	</td>
  </tr>
  <tr>
    <td>
	
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs', //pills
    'placement'=>'above', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'GENERALES', 'content'=>$this->renderPartial("_search",array("Informes"=>$Informes),true),'active'=>true),  
        array('label'=>'TERCEROS', 'content'=>$this->renderPartial("_search2",array(
		                                                                             "Informes"=>$Informes,
																				   ),
																				   true
																   ),
	        ), 
		array('label'=>'OTROS', 'content'=>$this->renderPartial("_search3",array(
		                                                                             "Informes"=>$Informes,
																				   ),
																				   true
																   ),
	        ),  
     ),
     )); 
	?>
	</td>
  </tr>
</table>
