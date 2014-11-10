<?php
$this->breadcrumbs=array(
	'Liquidaciones',
);

$this->menu=array(
	array('label'=>'Create Liquidaciones','url'=>array('create')),
	array('label'=>'Manage Liquidaciones','url'=>array('admin')),
);
?>

<h1>Liquidaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
