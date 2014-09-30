<table border="0" width="100%">
     <tr>
      <td width="90%"> 
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
	'type'=>'vertical',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
)); ?>
<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.
<?php echo $form->errorSummary($Personasnaturales); ?> 
<?php echo $form->errorSummary($Usuarios); ?> 
<?php echo $form->errorSummary($Perfilesusuarios); ?></p>
<table border="0" width="100%">
     <tr>
      <td width="90%">         
	<table width="100%" border="1">
	  <tr>
	    <td>
        <h5>DATOS DE BASICOS</h5>
        <fieldset>
    <table width="100%" border="0">
      <tr>
        <td><?php echo $form->textFieldRow($Personasnaturales,'PENA_IDENTIFICACION',array('class'=>'span3')); ?></td>
        <td>&nbsp;</td>
        <td width="32%"><?php echo $form->textFieldRow($Personasnaturales,'PENA_NOMBRES',array('class'=>'span3')); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?php echo $form->hiddenField($Personasnaturales,'PENA_FECHAINGRESO',array('value'=>date("Y-m-d").' '.date("h:i:s"))); ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="33%"><?php echo $form->textFieldRow($Personasnaturales,'PENA_APELLIDOS',array('class'=>'span3')); ?></td>
        <td width="35%">&nbsp;</td>
        <td><?php echo $form->textFieldRow($Personasnaturales,'PENA_DIRECCION',array('class'=>'span3')); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo $form->textFieldRow($Personasnaturales,'PENA_TELEFONO',array('class'=>'span3')); ?></td>
        <td>&nbsp;</td>
        <td><?php echo $form->labelEx($Personasnaturales,'PENA_FECHANACIMIENTO'); ?>
          <?php
             if($Personasnaturales->PENA_FECHANACIMIENTO=='') {
             $Personasnaturales->PENA_FECHANACIMIENTO = date("Y-m-d").' '.date("h:i:s");
             }
			 
             $this->widget('zii.widgets.jui.CJuiDatePicker', array(
             'model'=>$Personasnaturales,
             'attribute'=>'PENA_FECHANACIMIENTO',
             'value'=>$Personasnaturales->PENA_FECHANACIMIENTO,
             'language' => 'es',
             'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
                 
             'options'=>array(
             'autoSize'=>true,
             'defaultDate'=>$Personasnaturales->PENA_FECHANACIMIENTO,
             'dateFormat'=>'yy-mm-dd',
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
             )); ?>
          <?php echo $form->error($Personasnaturales,'PENA_FECHANACIMIENTO'); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo $form->labelEx($Personasnaturales,'PENA_SEXO');
          echo $form->dropDownList($Personasnaturales,'PENA_SEXO',array('MASCULINO'=>'MASCULINO','FEMENINO'=>'FEMENINO',),
						   array('prompt'=>'Elige...','class'=>'span3')); 
          echo $form->error($Personasnaturales,'PENA_SEXO'); 
	?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </fieldset>
    
        </td>
	    </tr>
	  </table>
	<p class="note">&nbsp;</p>
	<div class="form-actions"></div></td>
      
     </tr>
     <tr>
       <td>
       <h5>ASIGNACIÓN DEL PERFIL DE USUARIO</h5>
        <fieldset>
    <table width="100%" border="0">
      <tr>
        <td><?php echo $form->textFieldRow($Usuarios,'USUA_USUARIO',array('class'=>'span3')); ?></td>
        <td>&nbsp;</td>
        <td><?php if(($Usuarios->USUA_CLAVE)!=''){
			   $Usuarios->USUA_CLAVE ="";
			  } 
	    ?>
          <?php echo $form->labelEx($Usuarios,'USUA_CLAVE'); ?> <?php echo $form->passwordField($Usuarios,'USUA_CLAVE',array('class'=>'span3')); ?> <?php echo $form->error($Usuarios,'USUA_CLAVE'); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php echo $form->labelEx($Usuarios,'USUA_FECHAALTA'); ?>
          <?php
             if($Usuarios->USUA_FECHAALTA=='') {
             $Usuarios->USUA_FECHAALTA = date("Y-m-d").' '.date("h:i:s");
             }
			 
             $this->widget('zii.widgets.jui.CJuiDatePicker', array(
             'model'=>$Usuarios,
             'attribute'=>'USUA_FECHAALTA',
             'value'=>$Usuarios->USUA_FECHAALTA,
             'language' => 'es',
             'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
                 
             'options'=>array(
             'autoSize'=>true,
             'defaultDate'=>$Usuarios->USUA_FECHAALTA,
             'dateFormat'=>'yy-mm-dd',
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
             )); ?>
          <?php echo $form->error($Usuarios,'USUA_FECHAALTA'); ?></td>
        <td>&nbsp;</td>
        <td><?php echo $form->labelEx($Usuarios,'USUA_FECHABAJA'); ?>
          <?php
             $Usuarios->USUA_FECHABAJA = "1900-01-01";
             $this->widget('zii.widgets.jui.CJuiDatePicker', array(
             'model'=>$Usuarios,
             'attribute'=>'USUA_FECHABAJA',
             'value'=>$Usuarios->USUA_FECHABAJA,
             'language' => 'es',
             'htmlOptions' => array('readonly'=>"readonly",'class'=>'span2'),
                 
             'options'=>array(
             'autoSize'=>true,
             'defaultDate'=>$Usuarios->USUA_FECHABAJA,
             'dateFormat'=>'yy-mm-dd',
             'buttonImage'=>Yii::app()->baseUrl.'/images/date.png',
             'buttonImageOnly'=>true,
             'buttonText'=>'Fecha Salida',
             'selectOtherMonths'=>true,
             'showAnim'=>'slide',
             'showButtonPanel'=>true,
             'showOn'=>'button',
             'showOtherMonths'=>true,
             'changeMonth' => 'true',
             'changeYear' => 'true',
             ),
             )); ?>
          <?php echo $form->error($Usuarios,'USUA_FECHABAJA'); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><?php if(($Usuarios->USUA_ULTIMOACCESO)==''){
			   $Usuarios->USUA_ULTIMOACCESO ="1900-01-01";
			  } 
	    ?>
          <?php echo $form->textFieldRow($Usuarios,'USUA_ULTIMOACCESO',array('class'=>'span2', 'readonly'=>'readonly')); ?></td>
        <td><?php echo $form->hiddenField($Perfilesusuarios,'USPU_FECHAINGRESO',array('value'=>date("Y-m-d").' '.date("h:i:s"))); ?></td>
        <td>
		  <?php echo $form->labelEx($Perfilesusuarios,'USPE_ID'); ?>
          <?php $data = CHtml::listData(Perfiles::model()->findAll(),'USPE_ID','USPE_NOMBRE') ?>
          <?php echo $form->dropDownList($Perfilesusuarios,'USPE_ID',$data, array('class'=>'span3','prompt'=>'Elige...')); ?> 
		  <?php echo $form->error($Perfilesusuarios,'USPE_ID'); ?></td>
      </tr>
    </table>
    </fieldset>
       </td>
     </tr>
    </table>
    
<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'icon'=>'ok white',
			'type'=>'success',
			'size'=>'small',
			'label'=>$Perfilesusuarios->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</td>
      
     </tr>
    </table>


