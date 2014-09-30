<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RANO_ID),array('view','id'=>$data->RANO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_PERIODO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_PERIODO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_AUMENTO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_AUMENTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_AUMENTOPUNTO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_AUMENTOPUNTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_FECHAPROCESO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_FECHAPROCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_ESTADO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_ESTADO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_MES')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_MES); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_ANIO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_ANIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANO_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->RANO_REGISTRADOPOR); ?>
	<br />

	*/ ?>

</div>