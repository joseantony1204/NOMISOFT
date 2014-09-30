<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNID_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->UNID_ID),array('view','id'=>$data->UNID_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNID_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->UNID_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIUN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TIUN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNID_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->UNID_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UNID_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->UNID_REGISTRADOPOR); ?>
	<br />


</div>