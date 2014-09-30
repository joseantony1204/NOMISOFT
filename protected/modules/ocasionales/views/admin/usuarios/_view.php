<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->USUA_ID),array('view','id'=>$data->USUA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->USUA_USUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_CLAVE')); ?>:</b>
	<?php echo CHtml::encode($data->USUA_CLAVE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_SESSION')); ?>:</b>
	<?php echo CHtml::encode($data->USUA_SESSION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_FECHAALTA')); ?>:</b>
	<?php echo CHtml::encode($data->USUA_FECHAALTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_FECHABAJA')); ?>:</b>
	<?php echo CHtml::encode($data->USUA_FECHABAJA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USUA_ULTIMOACCESO')); ?>:</b>
	<?php echo CHtml::encode($data->USUA_ULTIMOACCESO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PENA_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PENA_ID); ?>
	<br />

	*/ ?>

</div>