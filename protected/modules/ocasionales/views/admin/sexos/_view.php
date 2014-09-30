<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEXO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SEXO_ID),array('view','id'=>$data->SEXO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEXO_NOMBRE')); ?>:</b>
	<?php echo CHtml::encode($data->SEXO_NOMBRE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEXO_DESCRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->SEXO_DESCRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEXO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->SEXO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEXO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->SEXO_REGISTRADOPOR); ?>
	<br />


</div>