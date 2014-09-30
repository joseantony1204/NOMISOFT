<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEME_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DEME_ID),array('view','id'=>$data->DEME_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEME_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->DEME_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEME_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DEME_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEME_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->DEME_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEME_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->DEME_REGISTRADOPOR); ?>
	<br />


</div>