<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('MUNI_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->MUNI_ID),array('view','id'=>$data->MUNI_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MUNI_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->MUNI_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MUNI_CODIGO')); ?>:</b>
	<?php echo CHtml::encode($data->MUNI_CODIGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEPA_ID')); ?>:</b>
	<?php echo CHtml::encode($data->DEPA_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MUNI_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->MUNI_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MUNI_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->MUNI_REGISTRADOPOR); ?>
	<br />


</div>