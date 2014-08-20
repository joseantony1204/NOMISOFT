<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PAIS_ID),array('view','id'=>$data->PAIS_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_INDICATIVO')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS_INDICATIVO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PAIS_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->PAIS_REGISTRADOPOR); ?>
	<br />


</div>