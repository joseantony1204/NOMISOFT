<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NANO_ID),array('view','id'=>$data->NANO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->NANO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->NANO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->NANO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->NANO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->NANO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NANO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->NANO_REGISTRADOPOR); ?>
	<br />


</div>