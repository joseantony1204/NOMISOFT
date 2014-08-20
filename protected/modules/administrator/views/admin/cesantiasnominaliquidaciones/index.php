<?php
$this->breadcrumbs=array(
	'Cesantiasnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Cesantiasnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Cesantiasnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Cesantiasnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
