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
          var puntos = parseInt($("#Empleosplanta_EMPL_PUNTOS").val());
          var valorPunto = parseInt($("#punto").val());
   
          var resultado = parseInt((puntos)*(valorPunto));
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
	'htmlOptions'=>array('class'=>'well', 'enctype' => 'multipart/form-data',),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>
	
	<table border="0" width="100%" align="center">
	  <tr>       
	   <td align="center" width="100%"><h2>INGRESO DE EMPLEADO E INFORMACION LABORAL</h2></td>
	 </tr>	 
	 <tr>
      <td align="left">
	  <p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($Personasgenerales); ?>
	 <h5>INFORMACION BASICA Y PERSONAL</h5>
     <fieldset>
	 <table border="0" width="100%" align="center">
	 <tr>
      <td align="center">
	   <?php echo $form->labelEx($Personasgenerales,'TIID_ID'); ?>
       <?php $data = CHtml::listData(Tiposidentificacion::model()->findAll(),'TIID_ID','TIID_NOMBRE') ?>
       <?php echo $form->dropDownList($Personasgenerales,'TIID_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
       <?php echo $form->error($Personasgenerales,'TIID_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_IDENTIFICACION',array('class'=>'span3')); ?></td>
	  <td>&nbsp;</td>
	  <td colspan="3" rowspan="2" align="center">
	  <?php echo $form->labelEx($Personasgenerales,'PEGE_FOTO'); ?>
	  <?php 
      if($Personasgenerales->PEGE_FOTO==""){
         $img = '/images/img_profile.jpg'; 
	  }else{
            $img = $Personasgenerales->PEGE_FOTO;         
		   }
	  $imageUrl = Yii::app()->request->baseUrl .$img;
      $htmlOptions = array('style'=>'width: 100px; height: 100px', 'class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Imagen De Hoja De Vida');
      $image = CHtml::image($imageUrl);
      echo CHtml::link($image,"",$htmlOptions );   
	  ?>
	  </td>    
     </tr>
	 <tr>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td> 	  
     </tr>
	 <tr>
      <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_LUGAREXPEDIDENTIDAD',array('class'=>'span3','maxlength'=>20)); ?></td>
      <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'PEGE_FECHAEXPEDIDENTIDAD'); ?>
       <?php 
       $Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD	= '0000-00-00';   
       $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Personasgenerales,
       'attribute'=>'PEGE_FECHAEXPEDIDENTIDAD',
       'value'=>$Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD,
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
       <?php echo $form->error($Personasgenerales,'PEGE_FECHAEXPEDIDENTIDAD'); ?>
	  </td>
	  <td>&nbsp;</td> 
      <td colspan="3" align="center">
	  <?php echo CHtml::activeFileField($Personasgenerales, 'PEGE_FOTO'); ?> 
      <?php echo $form->error($Personasgenerales,'PEGE_FOTO'); ?>
	  </td>	  
     </tr>
	 <tr>
      <td colspan="7">&nbsp;</td>     
     </tr>
	 <tr>
      <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_PRIMERNOMBRE',array('class'=>'span3','maxlength'=>20)); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_SEGUNDONOMBRE',array('class'=>'span3','maxlength'=>20)); ?></td>
	  <td>&nbsp;</td>
      <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'GRSA_ID'); ?>
      <?php $data = CHtml::listData(Grupossanguineos::model()->findAll(),'GRSA_ID','GRSA_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'GRSA_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'GRSA_ID'); ?>
	  </td>
	  <td>&nbsp;</td>
	  <td align="center">
	   <?php echo $form->labelEx($Personasgenerales,'PEGE_FECHANACIMIENTO'); ?>
       <?php	   
       $Personasgenerales->PEGE_FECHANACIMIENTO = '0000-00-00';
	   $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Personasgenerales,
       'attribute'=>'PEGE_FECHANACIMIENTO',
       'value'=>$Personasgenerales->PEGE_FECHANACIMIENTO,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Personasgenerales->PEGE_FECHANACIMIENTO,
       'dateFormat'=>'yy-mm-dd',
	   'yearRange'=>'1900:2050',
       'buttonImage'=>Yii::app()->baseUrl.'/images/date.png',
       'buttonImageOnly'=>true,
       'buttonText'=>'Fecha Nacimiento',
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
       <?php echo $form->error($Personasgenerales,'PEGE_FECHANACIMIENTO'); ?>
	  </td>      
     </tr>
	 <tr>
      <td colspan="7">&nbsp;</td>      
     </tr>
	 <tr>
      <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_PRIMERAPELLIDO',array('class'=>'span3','maxlength'=>20)); ?></td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_SEGUNDOAPELLIDOS',array('class'=>'span3','maxlength'=>20)); ?></td>
	  <td>&nbsp;</td>
      <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'SEXO_ID'); ?>
      <?php $data = CHtml::listData(Sexos::model()->findAll(),'SEXO_ID','SEXO_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'SEXO_ID',$data, array('class'=>'span2','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'SEXO_ID'); ?>
	  </td>
	  <td>&nbsp;</td>
	  <td align="center">
	   <?php echo $form->labelEx($Personasgenerales,'PEGE_FECHAINGRESO'); ?>
       <?php
       $Personasgenerales->PEGE_FECHAINGRESO = date("Y-m-d");	   
       $this->widget('zii.widgets.jui.CJuiDatePicker', array(
       'model'=>$Personasgenerales,
       'attribute'=>'PEGE_FECHAINGRESO',
       'value'=>$Personasgenerales->PEGE_FECHAINGRESO,
       'language' => 'es',
       'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
         
       'options'=>array(
       'autoSize'=>true,
       'defaultDate'=>$Personasgenerales->PEGE_FECHAINGRESO,
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
       <?php echo $form->error($Personasgenerales,'PEGE_FECHAINGRESO'); ?>	  
	  </td>      
     </tr>
	 <tr>
	<td colspan="7">&nbsp;</td>
	</tr>
	<tr>
      <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'ESCI_ID'); ?>
      <?php $data = CHtml::listData(Estadosciviles::model()->findAll(),'ESCI_ID','ESCI_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'ESCI_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'ESCI_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_EMAIL',array('class'=>'span3','maxlength'=>100)); ?></td>
	  <td>&nbsp;</td>
      <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_TELEFONOMOVIL',array('class'=>'span2','maxlength'=>20)); ?></td>
	  <td>&nbsp;</td>
	 <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_TELEFONOFIJO',array('class'=>'span2','maxlength'=>20)); ?></td>      
    </tr>	
	<tr>
	 <td colspan="7">&nbsp;</td>
	</tr>
	<tr>
      <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_NUMEROCUENTA',array('class'=>'span3','maxlength'=>50)); ?></td>
      <td>&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td align="center">&nbsp;</td>      
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
	 <h5>LUGAR DE RESIDENCIA</h5>
     <fieldset>
	  <table border="0" width="100%" align="center">	 
	 <tr>
      <td align="center">
	  <?php $criterio = array('order'=>'"PAIS_NOMBRE"'); ?>
	  <?php echo $form->labelEx($Personasgenerales,'PAIS_ID'); ?>
	  <?php $data = CHtml::listData(Paises::model()->findAll($criterio),'PAIS_ID','PAIS_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'PAIS_ID',$data, 
			                                array(
											      'ajax' => array(
                                                                  'type' => 'POST',
                                                                  'url' => CController::createUrl('admin/personasgenerales/dptos'),
                                                                  'update' => '#'.CHtml::activeId($Personasgenerales,'DEPA_ID'),
                                                                  ),
												  'class'=>'span3',
											      'prompt'=>'Elige...',
												  )
											     ); 
	  ?>
      <?php echo $form->error($Personasgenerales,'PAIS_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center">
	  <?php $criterio = array('order'=>'DEPA_NOMBRE'); ?>
      <?php echo $form->labelEx($Personasgenerales,'DEPA_ID'); ?>
	  <?php
	   $lista_uno = array(); 
	   if(isset($Personasgenerales->PAIS_ID)){
        $id_uno = intval($Personasgenerales->PAIS_ID);
		$lista_uno = CHtml::listData(Departamentos::model()->findAll('"PAIS_ID" = '.$id_uno.'',$criterio),'DEPA_ID','DEPA_NOMBRE');
	   }
	   ?>
       <?php echo $form->dropDownList($Personasgenerales,'DEPA_ID',$lista_uno, 
			                                array(
											      'ajax' => array(
                                                                  'type' => 'POST',
                                                                  'url' => CController::createUrl('admin/personasgenerales/municipios'),
                                                                  'update' => '#'.CHtml::activeId($Personasgenerales,'MUNI_ID'),
                                                                  ),
												  'class'=>'span3',
											      'prompt'=>'Elige un pais...',
												  )
											     ); 
	  ?>
      <?php echo $form->error($Personasgenerales,'DEPA_ID'); ?> 	  
	  </td>
	  <td>&nbsp;</td>
      <td align="center">
	  <?php $criterio = array('order'=>'MUNI_NOMBRE'); ?>
      <?php echo $form->labelEx($Personasgenerales,'MUNI_ID'); ?>
	  <?php 
		$lista_uno = array();
		if(isset($Personasgenerales->DEPA_ID)){
          $id_uno = intval($Personasgenerales->DEPA_ID);
		  $lista_uno = CHtml::listData(Municipios::model()->findAll('"DEPA_ID" = '.$id_uno.'',$criterio),'MUNI_ID','MUNI_NOMBRE');
		 }
	  ?>
      <?php echo $form->dropDownList($Personasgenerales,'MUNI_ID',$lista_uno, array('class'=>'span3','prompt'=>'Elige un departamento...')); ?>
      <?php echo $form->error($Personasgenerales,'MUNI_ID'); ?>
	  </td>
	  <td>&nbsp;</td>
	  <td align="center"><?php echo $form->textFieldRow($Personasgenerales,'PEGE_DIRECCION',array('class'=>'span3','maxlength'=>500)); ?></td>      
     </tr>
	 <tr>
	  <td colspan="7">&nbsp;</td>
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
	 <h5>INFORME DE AFILIACION A SEGURIDAD SOCIAL, SINCIDATO Y CESANTIAS</h5>
     <fieldset>
	  <table border="0" width="100%" align="center">	 
	 <tr>
      <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'SALU_ID'); ?>
      <?php $data = CHtml::listData(Salud::model()->findAll(),'SALU_ID','SALU_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'SALU_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'SALU_ID'); ?>
	  </td>
      <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'PENS_ID'); ?>
      <?php $data = CHtml::listData(Pension::model()->findAll(),'PENS_ID','PENS_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'PENS_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'PENS_ID'); ?>
	  </td>
	  <td>&nbsp;</td>
      <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'SIND_ID'); ?>
      <?php $data = CHtml::listData(Sindicatos::model()->findAll(),'SIND_ID','SIND_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'SIND_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'SIND_ID'); ?>
	  </td>
	  <td>&nbsp;</td>
	  <td align="center">
	  <?php echo $form->labelEx($Personasgenerales,'CESA_ID'); ?>
      <?php $data = CHtml::listData(Cesantias::model()->findAll(),'CESA_ID','CESA_NOMBRE') ?>
      <?php echo $form->dropDownList($Personasgenerales,'CESA_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?>
      <?php echo $form->error($Personasgenerales,'CESA_ID'); ?>
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
	  <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_PUNTOS',array('class'=>'span2',"readonly"=>"readonly")); ?></td>
	  <td><?php echo CHtml::hiddenField('punto',$valorestablecidos[1][3],array("class"=>"span2","style"=>"text-align: center",)); ?></td>
      <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_SUELDO',array('class'=>'span2',"readonly"=>"readonly")); ?></td>
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
       $Empleosplanta->EMPL_FECHAINGRESO = date("Y-m-d");	   
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
      <td align="center"><?php echo $form->textFieldRow($Empleosplanta,'EMPL_DIASAPAGAR',array('class'=>'span2')); ?></td>
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
	 </td>
	 </fieldset>
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
	

	<?php /* echo $form->textFieldRow($Personasgenerales,'PEGE_FECHACAMBIO',array('class'=>'span5')); */ ?>

	<?php /*echo $form->textFieldRow($Personasgenerales,'PEGE_REGISTRADOPOR',array('class'=>'span5')); */ ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Personasgenerales->isNewRecord ? 'Guardar Informacion' : 'Actualizar Informacion',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>