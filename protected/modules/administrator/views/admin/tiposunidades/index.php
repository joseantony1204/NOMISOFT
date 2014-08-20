<?php
$this->breadcrumbs=array(
	'Tiposunidades',
);

$this->menu=array(
	array('label'=>'Create Tiposunidades','url'=>array('create')),
	array('label'=>'Manage Tiposunidades','url'=>array('admin')),
);
?>

<h1>Tiposunidades</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
