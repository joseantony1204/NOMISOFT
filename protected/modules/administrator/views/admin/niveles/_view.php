<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIVE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NIVE_ID),array('view','id'=>$data->NIVE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIVE_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->NIVE_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIVE_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->NIVE_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIVE_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->NIVE_REGISTRADOPOR); ?>
	<br />


</div>