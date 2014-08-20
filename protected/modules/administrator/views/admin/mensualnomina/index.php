<?php
$this->breadcrumbs=array(
	'Mensualnominas',
);

$this->menu=array(
	array('label'=>'Create Mensualnomina','url'=>array('create')),
	array('label'=>'Manage Mensualnomina','url'=>array('admin')),
);
?>

<h1>Mensualnominas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
