<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->FASA_ID),array('view','id'=>$data->FASA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_SUBTRANSPORTE')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_SUBTRANSPORTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_SUBALIMIENTACION')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_SUBALIMIENTACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_BSP')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_BSP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_PRIMAVACACIONES')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_PRIMAVACACIONES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_SUBSISTENCIA')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_SUBSISTENCIA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_ESTAMPILLA')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_ESTAMPILLA); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_RETEFUENTE')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_RETEFUENTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_FSP')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_FSP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FASA_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->FASA_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>