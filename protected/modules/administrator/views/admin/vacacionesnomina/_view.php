<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VANO_ID),array('view','id'=>$data->VANO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->VANO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->VANO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->VANO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->VANO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->VANO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VANO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->VANO_REGISTRADOPOR); ?>
	<br />


</div>