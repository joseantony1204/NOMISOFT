<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SIND_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SIND_ID),array('view','id'=>$data->SIND_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SIND_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->SIND_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SIND_PORCENTAJE')); ?>:</b>
	<?php echo CHtml::encode($data->SIND_PORCENTAJE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SIND_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->SIND_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SIND_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->SIND_REGISTRADOPOR); ?>
	<br />


</div>