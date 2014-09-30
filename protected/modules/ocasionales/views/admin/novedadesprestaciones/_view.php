<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOPR_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOPR_ID),array('view','id'=>$data->NOPR_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOPR_VALOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOPR_VALOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPR_ID')); ?>:</b>
	<?php echo CHtml::encode($data->DEPR_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOPR_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->NOPR_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOPR_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOPR_REGISTRADOPOR); ?>
	<br />


</div>