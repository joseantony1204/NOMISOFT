<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LIQU_ID),array('view','id'=>$data->LIQU_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_FECHAINGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_FECHAINGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_FECHARETIRO')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_FECHARETIRO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LIQU_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->LIQU_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>