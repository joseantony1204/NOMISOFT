<?php
Yii::app()->homeUrl = array('/'.$this->module->id.'/');
$this->breadcrumbs=array(
	'Novedades Mensuales'=>array('admin/catedras/search'),
	'Agregar catedra',
);
?>


<table width="80%" border="0" align="left" class="">
  <tr>
   <td colspan="2">
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
             <td width="63%"><strong><span><em>ADMINISTRACION DE NOVEDADES MENSUALES  [ Agregar catedra ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/search',),$htmlOptions ); 
?>         
					              </td>
             <td width="13%" align="center">
					 <?php

					 
					 $imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 $image = CHtml::image($imageUrl);
					 echo CHtml::link($image, array('admin/catedras/formcatedras','id'=>$Personageneral->PEGE_ID,'facultad'=>$Facultades->FACU_ID),$htmlOptions ); 
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
      <td colspan="2">
		  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		 'action'=>Yii::app()->createUrl($this->route),
		 'method'=>'POST',
		 'type'=>'vertical',
		 'htmlOptions'=>array('class'=>'well'),
		 'enableClientValidation'=>true,
		 'clientOptions'=>array(
			'validateOnSubmit'=>true,),
		  )); 
		 ?>
        <table width="100%" border="1" align="center">
            <tr>             
			 <td width="20%" align="center" bgcolor="">
			 IDENTIFICACION <br>
			 <?php echo $Personageneral->PEGE_IDENTIFICACION; ?>
			 </td>			 
			 <td width="20%" align="center">
			 NOMBRES <br>
			 <?php echo $Personageneral->PEGE_PRIMERNOMBRE.' '.$Personageneral->PEGE_SEGUNDONOMBRE; ?>
			 </td>			 
			 <td width="20%" align="center">
			 APELLIDOS <br>
			 <?php echo $Personageneral->PEGE_PRIMERAPELLIDO.' '.$Personageneral->PEGE_SEGUNDOAPELLIDOS; ?>
			 </td>			 
           </tr>
		   
		   <tr>
             <td width="20%" align="left" colspan="3">&nbsp;</td>
           </tr>
		   
		   <tr>             
			 <td width="20%" align="center">
			 CODIGO FACULTAD <br>
			 <?php echo $Facultades->FACU_ID; ?>
			 </td>			 
			 <td width="20%" align="center">&nbsp;</td>			 
			 <td width="20%" align="center">
			 NOMBRE FACULTAD <br>
			 <?php echo $Facultades->FACU_NOMBRE; ?>
			 </td>			 
           </tr>
		   
		   <tr>
             <td width="20%" align="left" colspan="3">&nbsp;</td>
           </tr>
		   
		   <tr>             
			 <td width="20%" align="center">
			 <?php echo $form->textFieldRow($Catedras,'CATE_NUMHORAS',array('class'=>'span2')); ?>
			 <?php //echo $form->textFieldRow($Catedras,'PEAC_ID',array('class'=>'span2')); ?>
			 </td>			 
			 <td width="20%" align="center">
			 <?php echo $form->textFieldRow($Catedras,'CATE_VALORHORA',array('class'=>'span2', "style"=>"text-align: center", 'readonly'=>'readonly')); ?>
			 </td>			 
			 <td width="20%" align="center">
			 VALOR A PAGAR <br>
			 <?php echo CHtml::textField('CATE_VALORAPAGAR',0,array("class"=>"span2","style"=>"text-align: center", 'readonly'=>'readonly')); ?>
			 </td>			 
           </tr>
		   
		   <tr>
             <td width="20%" align="left" colspan="3">&nbsp;</td>
           </tr>
		   
		   <tr>
             <td width="20%" align="lefth" colspan="3">
            <div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'icon'=>'ok white',
				'type'=>'success',
				'size'=>'small',
				'label'=>$Catedras->isNewRecord ? 'Guardar Informacion' : 'Actualizar Informacion',
			)); ?>
		    </div>		 
			 </td>
           </tr>
        </table>
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