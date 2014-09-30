<?php
$this->breadcrumbs=array(
	'Usuarioses',
);

$this->menu=array(
	array('label'=>'Create Usuarios','url'=>array('create')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>

<h1>Usuarioses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
