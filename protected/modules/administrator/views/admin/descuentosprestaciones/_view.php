<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPR_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DEPR_ID),array('view','id'=>$data->DEPR_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPR_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->DEPR_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPR_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DEPR_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPR_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TIPR_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPR_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->DEPR_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPR_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->DEPR_REGISTRADOPOR); ?>
	<br />


</div>