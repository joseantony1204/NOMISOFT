<?php
$this->breadcrumbs=array(
	'Cesantiasnominas',
);

$this->menu=array(
	array('label'=>'Create Cesantiasnomina','url'=>array('create')),
	array('label'=>'Manage Cesantiasnomina','url'=>array('admin')),
);
?>

<h1>Cesantiasnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
