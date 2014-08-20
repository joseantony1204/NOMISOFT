<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRTE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PRTE_ID),array('view','id'=>$data->PRTE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRTE_PORCENTAJE')); ?>:</b>
	<?php echo CHtml::encode($data->PRTE_PORCENTAJE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRTE_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->PRTE_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRTE_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->PRTE_REGISTRADOPOR); ?>
	<br />


</div>