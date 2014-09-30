<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EMPL_ID),array('view','id'=>$data->EMPL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_FECHAINGRESO')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_FECHAINGRESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_CARGO')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_CARGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_SUELDO')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_SUELDO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_PUNTOS')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_PUNTOS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_DIASAPAGAR')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_DIASAPAGAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRTE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PRTE_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('GARE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->GARE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TICA_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TICA_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GRAD_ID')); ?>:</b>
	<?php echo CHtml::encode($data->GRAD_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIVE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->NIVE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNID_ID')); ?>:</b>
	<?php echo CHtml::encode($data->UNID_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>