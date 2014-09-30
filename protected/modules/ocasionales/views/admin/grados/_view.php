<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRAD_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GRAD_ID),array('view','id'=>$data->GRAD_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRAD_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->GRAD_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRAD_SUELDO')); ?>:</b>
	<?php echo CHtml::encode($data->GRAD_SUELDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRAD_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->GRAD_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRAD_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->GRAD_REGISTRADOPOR); ?>
	<br />


</div>