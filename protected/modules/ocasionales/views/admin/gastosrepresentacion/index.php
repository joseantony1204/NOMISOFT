<?php
$this->breadcrumbs=array(
	'Gastosrepresentacions',
);

$this->menu=array(
	array('label'=>'Create Gastosrepresentacion','url'=>array('create')),
	array('label'=>'Manage Gastosrepresentacion','url'=>array('admin')),
);
?>

<h1>Gastosrepresentacions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
