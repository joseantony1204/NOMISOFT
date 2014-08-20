<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEP_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ESEP_ID),array('view','id'=>$data->ESEP_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEP_FECHAREGISTRO')); ?>:</b>
	<?php echo CHtml::encode($data->ESEP_FECHAREGISTRO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEP_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->ESEP_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEP_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->ESEP_REGISTRADOPOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESEM_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ESEM_ID); ?>
	<br />


</div>