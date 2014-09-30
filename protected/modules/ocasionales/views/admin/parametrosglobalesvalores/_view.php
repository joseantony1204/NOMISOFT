<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGV_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PAGV_ID),array('view','id'=>$data->PAGV_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGV_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->PAGV_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGV_VALOR')); ?>:</b>
	<?php echo CHtml::encode($data->PAGV_VALOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PAGL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGV_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->PAGV_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAGV_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->PAGV_REGISTRADOPOR); ?>
	<br />


</div>