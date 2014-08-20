<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TICA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TICA_ID),array('view','id'=>$data->TICA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TICA_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->TICA_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TICA_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->TICA_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TICA_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->TICA_REGISTRADOPOR); ?>
	<br />


</div>