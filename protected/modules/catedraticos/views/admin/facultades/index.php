<?php
$this->breadcrumbs=array(
	'Facultades',
);

$this->menu=array(
	array('label'=>'Create Facultades','url'=>array('create')),
	array('label'=>'Manage Facultades','url'=>array('admin')),
);
?>

<h1>Facultades</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
