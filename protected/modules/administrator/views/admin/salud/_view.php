<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALU_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SALU_ID),array('view','id'=>$data->SALU_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALU_NIT')); ?>:</b>
	<?php echo CHtml::encode($data->SALU_NIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALU_CODIGO')); ?>:</b>
	<?php echo CHtml::encode($data->SALU_CODIGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALU_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->SALU_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALU_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->SALU_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALU_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->SALU_REGISTRADOPOR); ?>
	<br />


</div>