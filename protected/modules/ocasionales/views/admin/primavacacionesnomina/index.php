<?php
$this->breadcrumbs=array(
	'Primavacacionesnominas',
);

$this->menu=array(
	array('label'=>'Create Primavacacionesnomina','url'=>array('create')),
	array('label'=>'Manage Primavacacionesnomina','url'=>array('admin')),
);
?>

<h1>Primavacacionesnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
