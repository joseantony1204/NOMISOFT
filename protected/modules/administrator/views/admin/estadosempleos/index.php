<?php
$this->breadcrumbs=array(
	'Estadosempleoses',
);

$this->menu=array(
	array('label'=>'Create Estadosempleos','url'=>array('create')),
	array('label'=>'Manage Estadosempleos','url'=>array('admin')),
);
?>

<h1>Estadosempleoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
