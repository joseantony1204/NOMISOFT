<?php
$this->breadcrumbs=array(
	'Municipioses',
);

$this->menu=array(
	array('label'=>'Create Municipios','url'=>array('create')),
	array('label'=>'Manage Municipios','url'=>array('admin')),
);
?>

<h1>Municipioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
