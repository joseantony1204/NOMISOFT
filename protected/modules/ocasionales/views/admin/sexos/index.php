<?php
$this->breadcrumbs=array(
	'Sexoses',
);

$this->menu=array(
	array('label'=>'Create Sexos','url'=>array('create')),
	array('label'=>'Manage Sexos','url'=>array('admin')),
);
?>

<h1>Sexoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
