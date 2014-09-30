<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CENO_ID),array('view','id'=>$data->CENO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->CENO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->CENO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->CENO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->CENO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->CENO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CENO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->CENO_REGISTRADOPOR); ?>
	<br />


</div>