<?php
$this->breadcrumbs=array(
	'Cesantiases',
);

$this->menu=array(
	array('label'=>'Create Cesantias','url'=>array('create')),
	array('label'=>'Manage Cesantias','url'=>array('admin')),
);
?>

<h1>Cesantiases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
