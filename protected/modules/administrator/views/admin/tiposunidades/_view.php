<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIUN_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIUN_ID),array('view','id'=>$data->TIUN_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIUN_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->TIUN_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIUN_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->TIUN_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIUN_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->TIUN_REGISTRADOPOR); ?>
	<br />


</div>