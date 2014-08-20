<?php
$this->breadcrumbs=array(
	'Unidades',
);

$this->menu=array(
	array('label'=>'Create Unidades','url'=>array('create')),
	array('label'=>'Manage Unidades','url'=>array('admin')),
);
?>

<h1>Unidades</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
