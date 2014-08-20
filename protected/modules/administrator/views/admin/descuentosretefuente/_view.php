<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DERE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DERE_ID),array('view','id'=>$data->DERE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DERE_VALOR')); ?>:</b>
	<?php echo CHtml::encode($data->DERE_VALOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FARE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->FARE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DERE_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->DERE_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DERE_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->DERE_REGISTRADOPOR); ?>
	<br />


</div>