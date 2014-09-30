<?php
$this->breadcrumbs=array(
	'Semestralnominas',
);

$this->menu=array(
	array('label'=>'Create Semestralnomina','url'=>array('create')),
	array('label'=>'Manage Semestralnomina','url'=>array('admin')),
);
?>

<h1>Semestralnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
