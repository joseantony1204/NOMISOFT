<?php
$this->breadcrumbs=array(
	'Saluds',
);

$this->menu=array(
	array('label'=>'Create Salud','url'=>array('create')),
	array('label'=>'Manage Salud','url'=>array('admin')),
);
?>

<h1>Saluds</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
