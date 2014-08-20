<?php
$this->breadcrumbs=array(
	'Paises',
);

$this->menu=array(
	array('label'=>'Create Paises','url'=>array('create')),
	array('label'=>'Manage Paises','url'=>array('admin')),
);
?>

<h1>Paises</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
