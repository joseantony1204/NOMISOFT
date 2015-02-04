<?php
$this->breadcrumbs=array(
	'Retroactivospuntosnominas',
);

$this->menu=array(
	array('label'=>'Create Retroactivospuntosnomina','url'=>array('create')),
	array('label'=>'Manage Retroactivospuntosnomina','url'=>array('admin')),
);
?>

<h1>Retroactivospuntosnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
