<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NORP_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NORP_ID),array('view','id'=>$data->NORP_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NORP_FECHAINGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->NORP_FECHAINGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NORP_MESES')); ?>:</b>
	<?php echo CHtml::encode($data->NORP_MESES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NORP_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->NORP_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NORP_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->NORP_REGISTRADOPOR); ?>
	<br />


</div>