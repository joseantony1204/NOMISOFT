<?php
$this->breadcrumbs=array(
	'Sindicatoses',
);

$this->menu=array(
	array('label'=>'Create Sindicatos','url'=>array('create')),
	array('label'=>'Manage Sindicatos','url'=>array('admin')),
);
?>

<h1>Sindicatoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
