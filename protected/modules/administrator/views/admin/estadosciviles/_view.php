<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESCI_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ESCI_ID),array('view','id'=>$data->ESCI_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESCI_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->ESCI_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESCI_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->ESCI_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESCI_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->ESCI_REGISTRADOPOR); ?>
	<br />


</div>