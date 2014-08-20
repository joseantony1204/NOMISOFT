<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PAGL_ID),array('view','id'=>$data->PAGL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGL_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->PAGL_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGL_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->PAGL_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGL_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->PAGL_REGISTRADOPOR); ?>
	<br />


</div>