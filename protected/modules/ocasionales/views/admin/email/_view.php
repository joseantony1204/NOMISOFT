<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAI_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EMAI_ID),array('view','id'=>$data->EMAI_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAI_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->EMAI_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAI_NOMINA')); ?>:</b>
	<?php echo CHtml::encode($data->EMAI_NOMINA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAI_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->EMAI_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAI_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->EMAI_REGISTRADOPOR); ?>
	<br />


</div>