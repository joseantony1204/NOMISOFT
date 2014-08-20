<?php
$this->breadcrumbs=array(
	'Factoressalariales',
);

$this->menu=array(
	array('label'=>'Create Factoressalariales','url'=>array('create')),
	array('label'=>'Manage Factoressalariales','url'=>array('admin')),
);
?>

<h1>Factoressalariales</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
