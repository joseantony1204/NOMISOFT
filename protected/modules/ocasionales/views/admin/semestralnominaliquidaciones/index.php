<?php
$this->breadcrumbs=array(
	'Semestralnominaliquidaciones',
);

$this->menu=array(
	array('label'=>'Create Semestralnominaliquidaciones','url'=>array('create')),
	array('label'=>'Manage Semestralnominaliquidaciones','url'=>array('admin')),
);
?>

<h1>Semestralnominaliquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
