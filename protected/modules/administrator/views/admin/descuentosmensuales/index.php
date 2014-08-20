<?php
$this->breadcrumbs=array(
	'Descuentosmensuales',
);

$this->menu=array(
	array('label'=>'Create Descuentosmensuales','url'=>array('create')),
	array('label'=>'Manage Descuentosmensuales','url'=>array('admin')),
);
?>

<h1>Descuentosmensuales</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
