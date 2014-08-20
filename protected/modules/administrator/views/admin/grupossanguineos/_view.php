<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRSA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GRSA_ID),array('view','id'=>$data->GRSA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRSA_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->GRSA_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRSA_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->GRSA_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRSA_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->GRSA_REGISTRADOPOR); ?>
	<br />


</div>