<?php
$this->breadcrumbs=array(
	'Pensions',
);

$this->menu=array(
	array('label'=>'Create Pension','url'=>array('create')),
	array('label'=>'Manage Pension','url'=>array('admin')),
);
?>

<h1>Pensions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
