<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CATE_ID),array('view','id'=>$data->CATE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATE_CATEDRA')); ?>:</b>
	<?php echo CHtml::encode($data->CATE_CATEDRA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATE_NUMHORAS')); ?>:</b>
	<?php echo CHtml::encode($data->CATE_NUMHORAS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATE_VALORHORA')); ?>:</b>
	<?php echo CHtml::encode($data->CATE_VALORHORA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEGE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FACU_ID')); ?>:</b>
	<?php echo CHtml::encode($data->FACU_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEAC_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PEAC_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CATE_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->CATE_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CATE_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->CATE_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>