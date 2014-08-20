<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENS_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PENS_ID),array('view','id'=>$data->PENS_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENS_NIT')); ?>:</b>
	<?php echo CHtml::encode($data->PENS_NIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENS_CODIGO')); ?>:</b>
	<?php echo CHtml::encode($data->PENS_CODIGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENS_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->PENS_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENS_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->PENS_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PENS_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->PENS_REGISTRADOPOR); ?>
	<br />


</div>