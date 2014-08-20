<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEM_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ESEM_ID),array('view','id'=>$data->ESEM_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEM_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->ESEM_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEM_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->ESEM_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEM_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->ESEM_REGISTRADOPOR); ?>
	<br />


</div>