<?php
$this->breadcrumbs=array(
	'Vacacionesnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Vacacionesnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Vacacionesnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Vacacionesnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
