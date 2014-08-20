<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<table width="100%" border="0">
  <tr>
    <td width="50%" align="right">&nbsp;</td>
    <td width="50%" align="right">
    <h1>Iniciar sesión</h1>
    <p>Por favor utiliza tu <strong>usuario y contraseña</strong> en este formulario para acceder a la aplicaciòn.</p>
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    <?php 			 
	$imageUrl = Yii::app()->request->baseUrl . '/images/logidn.png';
	echo $image = CHtml::image($imageUrl); 
    ?>
    </td>
    <td>
    <table width="100%" border="0" align="right">
      <tr>
        <td><div class="form">
          <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'usuarioslogin-form',
			'type'=>'vertical',
			'htmlOptions'=>array('class'=>'well'),
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		   )); 
		  ?>
          <p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>
          <?php echo $form->textFieldRow($model,'usuario',  
	 array('class'=>'input-medium', 'placeholder'=>'Digite su usuario', 'prepend'=>'<i class="icon-user"></i>')); ?> <?php echo $form->passwordFieldRow($model,'clave',
	 array('class'=>'input-medium', 'placeholder'=>'Digite su clave', 'prepend'=>'<i class="icon-lock"></i>')); ?> <?php echo $form->checkBoxRow($model,'recordarme'); ?>
          <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'success',
			'size'=>'small',
            'label'=>'Iniciar Sesiòn',
			'icon'=>'user white',
        )); ?>
          </div>
          <?php $this->endWidget(); ?>
        </div>
          <!-- form --></td>
      </tr>
    </table></td>
  </tr>
</table>
