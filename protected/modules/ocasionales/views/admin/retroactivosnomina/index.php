<?php
$this->breadcrumbs=array(
	'Retroactivosnominas',
);

$this->menu=array(
	array('label'=>'Create Retroactivosnomina','url'=>array('create')),
	array('label'=>'Manage Retroactivosnomina','url'=>array('admin')),
);
?>

<h1>Retroactivosnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
