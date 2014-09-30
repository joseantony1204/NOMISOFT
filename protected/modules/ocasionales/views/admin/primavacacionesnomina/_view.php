<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PVNO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PVNO_ID),array('view','id'=>$data->PVNO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PVNO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->PVNO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PVNO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->PVNO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRNO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->PRNO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PVNO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->PVNO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PVNO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->PVNO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PVNO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->PVNO_REGISTRADOPOR); ?>
	<br />


</div>