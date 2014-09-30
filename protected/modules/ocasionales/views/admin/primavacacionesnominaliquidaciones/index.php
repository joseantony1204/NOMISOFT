<?php
$this->breadcrumbs=array(
	'Primavacacionesnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Primavacacionesnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Primavacacionesnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Primavacacionesnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
