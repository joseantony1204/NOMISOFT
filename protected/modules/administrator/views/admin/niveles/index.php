<?php
$this->breadcrumbs=array(
	'Niveles',
);

$this->menu=array(
	array('label'=>'Create Niveles','url'=>array('create')),
	array('label'=>'Manage Niveles','url'=>array('admin')),
);
?>

<h1>Niveles</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
