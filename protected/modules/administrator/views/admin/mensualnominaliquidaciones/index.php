<?php
$this->breadcrumbs=array(
	'Mensualnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Mensualnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Mensualnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Mensualnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
