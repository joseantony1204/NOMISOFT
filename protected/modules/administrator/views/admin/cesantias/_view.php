<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CESA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CESA_ID),array('view','id'=>$data->CESA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CESA_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->CESA_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CESA_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->CESA_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CESA_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->CESA_REGISTRADOPOR); ?>
	<br />


</div>