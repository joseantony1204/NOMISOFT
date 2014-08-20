<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOME_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NOME_ID),array('view','id'=>$data->NOME_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOME_VALOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOME_VALOR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEME_ID')); ?>:</b>
	<?php echo CHtml::encode($data->DEME_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMPL_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EMPL_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOME_FECHACAMBIO')); ?>:</b>
	<?php echo CHtml::encode($data->NOME_FECHACAMBIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOME_REGISTRADOPOR')); ?>:</b>
	<?php echo CHtml::encode($data->NOME_REGISTRADOPOR); ?>
	<br />


</div>