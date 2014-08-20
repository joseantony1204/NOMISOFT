<?php
$this->breadcrumbs=array(
	'Tiposidentificacions',
);

$this->menu=array(
	array('label'=>'Create Tiposidentificacion','url'=>array('create')),
	array('label'=>'Manage Tiposidentificacion','url'=>array('admin')),
);
?>

<h1>Tiposidentificacions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
