<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RENL_ID),array('view','id'=>$data->RENL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_CODIGO')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_CODIGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_DIAS')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_DIAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_PUNTOS')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_PUNTOS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_SUELDO')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_SUELDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_SALARIO')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_SALARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_RETEFUENTE')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_RETEFUENTE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_ID')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENL_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->RENL_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>