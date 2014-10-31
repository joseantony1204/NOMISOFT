<?php
$this->breadcrumbs=array(
	'Catedrases',
);

$this->menu=array(
	array('label'=>'Create Catedras','url'=>array('create')),
	array('label'=>'Manage Catedras','url'=>array('admin')),
);
?>

<h1>Catedrases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
