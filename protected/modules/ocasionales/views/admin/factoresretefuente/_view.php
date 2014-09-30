<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FARE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->FARE_ID),array('view','id'=>$data->FARE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FARE_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->FARE_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FARE_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->FARE_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FARE_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->FARE_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FARE_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->FARE_REGISTRADOPOR); ?>
	<br />


</div>