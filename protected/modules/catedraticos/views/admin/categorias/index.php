<?php
$this->breadcrumbs=array(
	'Categoriases',
);

$this->menu=array(
	array('label'=>'Create Categorias','url'=>array('create')),
	array('label'=>'Manage Categorias','url'=>array('admin')),
);
?>

<h1>Categoriases</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
