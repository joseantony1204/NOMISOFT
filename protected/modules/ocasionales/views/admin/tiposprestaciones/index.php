<?php
$this->breadcrumbs=array(
	'Tiposprestaciones',
);

$this->menu=array(
	array('label'=>'Create Tiposprestaciones','url'=>array('create')),
	array('label'=>'Manage Tiposprestaciones','url'=>array('admin')),
);
?>

<h1>Tiposprestaciones</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
