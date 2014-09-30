<?php
$this->breadcrumbs=array(
	'Primastecnicases',
);

$this->menu=array(
	array('label'=>'Create Primastecnicas','url'=>array('create')),
	array('label'=>'Manage Primastecnicas','url'=>array('admin')),
);
?>

<h1>Primastecnicases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
