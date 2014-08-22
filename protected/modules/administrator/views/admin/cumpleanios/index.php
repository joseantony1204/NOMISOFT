<?php
$this->breadcrumbs=array(
	'Cumpleanioses',
);

$this->menu=array(
	array('label'=>'Create Cumpleanios','url'=>array('create')),
	array('label'=>'Manage Cumpleanios','url'=>array('admin')),
);
?>

<h1>Cumpleanioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
