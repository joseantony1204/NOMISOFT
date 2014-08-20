<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SENO_ID),array('view','id'=>$data->SENO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->SENO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->SENO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->SENO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->SENO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->SENO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->SENO_REGISTRADOPOR); ?>
	<br />


</div>