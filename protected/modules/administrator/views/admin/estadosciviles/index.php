<?php
$this->breadcrumbs=array(
	'Estadosciviles',
);

$this->menu=array(
	array('label'=>'Create Estadosciviles','url'=>array('create')),
	array('label'=>'Manage Estadosciviles','url'=>array('admin')),
);
?>

<h1>Estadosciviles</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
