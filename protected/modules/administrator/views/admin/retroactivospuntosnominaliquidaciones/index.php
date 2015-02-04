<?php
$this->breadcrumbs=array(
	'Retroactivospuntosnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Retroactivospuntosnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Retroactivospuntosnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Retroactivospuntosnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
