<?php
$this->breadcrumbs=array(
	'Estadosempleosplantas',
);

$this->menu=array(
	array('label'=>'Create Estadosempleosplanta','url'=>array('create')),
	array('label'=>'Manage Estadosempleosplanta','url'=>array('admin')),
);
?>

<h1>Estadosempleosplantas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
