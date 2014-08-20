<?php
$this->breadcrumbs=array(
	'Descuentosprestaciones',
);

$this->menu=array(
	array('label'=>'Create Descuentosprestaciones','url'=>array('create')),
	array('label'=>'Manage Descuentosprestaciones','url'=>array('admin')),
);
?>

<h1>Descuentosprestaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
