<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GARE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GARE_ID),array('view','id'=>$data->GARE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GARE_PORCENTAJE')); ?>:</b>
	<?php echo CHtml::encode($data->GARE_PORCENTAJE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GARE_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->GARE_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GARE_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->GARE_REGISTRADOPOR); ?>
	<br />


</div>