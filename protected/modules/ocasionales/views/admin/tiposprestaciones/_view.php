<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPR_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIPR_ID),array('view','id'=>$data->TIPR_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPR_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->TIPR_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPR_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->TIPR_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPR_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->TIPR_REGISTRADOPOR); ?>
	<br />


</div>