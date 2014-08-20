<?php
$this->breadcrumbs=array(
	'Vacacionesnominas',
);

$this->menu=array(
	array('label'=>'Create Vacacionesnomina','url'=>array('create')),
	array('label'=>'Manage Vacacionesnomina','url'=>array('admin')),
);
?>

<h1>Vacacionesnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
