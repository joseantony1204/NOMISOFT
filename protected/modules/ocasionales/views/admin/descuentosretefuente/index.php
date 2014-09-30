<?php
$this->breadcrumbs=array(
	'Descuentosretefuentes',
);

$this->menu=array(
	array('label'=>'Create Descuentosretefuente','url'=>array('create')),
	array('label'=>'Manage Descuentosretefuente','url'=>array('admin')),
);
?>

<h1>Descuentosretefuentes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
