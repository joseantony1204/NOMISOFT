<?php
$this->breadcrumbs=array(
	'Novedadesprestaciones',
);

$this->menu=array(
	array('label'=>'Create Novedadesprestaciones','url'=>array('create')),
	array('label'=>'Manage Novedadesprestaciones','url'=>array('admin')),
);
?>

<h1>Novedadesprestaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
