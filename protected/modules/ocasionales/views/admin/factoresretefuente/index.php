<?php
$this->breadcrumbs=array(
	'Factoresretefuentes',
);

$this->menu=array(
	array('label'=>'Create Factoresretefuente','url'=>array('create')),
	array('label'=>'Manage Factoresretefuente','url'=>array('admin')),
);
?>

<h1>Factoresretefuentes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
