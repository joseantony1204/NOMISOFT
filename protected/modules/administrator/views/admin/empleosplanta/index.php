<?php
$this->breadcrumbs=array(
	'Empleosplantas',
);

$this->menu=array(
	array('label'=>'Create Empleosplanta','url'=>array('create')),
	array('label'=>'Manage Empleosplanta','url'=>array('admin')),
);
?>

<h1>Empleosplantas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
