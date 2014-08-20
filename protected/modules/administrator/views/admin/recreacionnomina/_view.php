<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RENO_ID),array('view','id'=>$data->RENO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RENO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->RENO_REGISTRADOPOR); ?>
	<br />


</div>