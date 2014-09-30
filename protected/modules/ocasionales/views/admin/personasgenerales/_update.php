<table border="0" width="99%" align="center">
     <tr>
      <td>         


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
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
	
	</table>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Personasgenerales->isNewRecord ? 'Actualizar Informacion' : 'Actualizar Informacion',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>