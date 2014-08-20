<?php
$this->breadcrumbs=array(
	'Gradoses',
);

$this->menu=array(
	array('label'=>'Create Grados','url'=>array('create')),
	array('label'=>'Manage Grados','url'=>array('admin')),
);
?>

<h1>Gradoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
