<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DEPA_ID),array('view','id'=>$data->DEPA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPA_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->DEPA_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPA_INDICATIVO')); ?>:</b>
	<?php echo CHtml::encode($data->DEPA_INDICATIVO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_ID')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPA_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->DEPA_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPA_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->DEPA_REGISTRADOPOR); ?>
	<br />


</div>