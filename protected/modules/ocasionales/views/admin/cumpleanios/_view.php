<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CUMP_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CUMP_ID),array('view','id'=>$data->CUMP_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CUMP_FECHANOTIFIACION')); ?>:</b>
	<?php echo CHtml::encode($data->CUMP_FECHANOTIFIACION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />


</div>