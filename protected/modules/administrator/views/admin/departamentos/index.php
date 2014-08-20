<?php
$this->breadcrumbs=array(
	'Departamentoses',
);

$this->menu=array(
	array('label'=>'Create Departamentos','url'=>array('create')),
	array('label'=>'Manage Departamentos','url'=>array('admin')),
);
?>

<h1>Departamentoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
