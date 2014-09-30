<?php
$this->breadcrumbs=array(
	'Retroactivosnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Retroactivosnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Retroactivosnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Retroactivosnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
