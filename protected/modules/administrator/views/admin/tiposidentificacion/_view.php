<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIID_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TIID_ID),array('view','id'=>$data->TIID_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIID_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->TIID_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIID_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->TIID_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIID_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->TIID_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIID_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->TIID_REGISTRADOPOR); ?>
	<br />


</div>