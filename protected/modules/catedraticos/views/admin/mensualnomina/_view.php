<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('MENO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->MENO_ID),array('view','id'=>$data->MENO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MENO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->MENO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MENO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->MENO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MENO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->MENO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MENO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->MENO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MENO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->MENO_REGISTRADOPOR); ?>
	<br />


</div>