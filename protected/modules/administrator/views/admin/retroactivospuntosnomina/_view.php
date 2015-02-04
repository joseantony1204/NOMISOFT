<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RPNO_ID),array('view','id'=>$data->RPNO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_PUNTOS')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_PUNTOS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_VALORPUNTO')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_VALORPUNTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_MESINICIO')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_MESINICIO); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_MESFINAL')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_MESFINAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RPNO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->RPNO_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>