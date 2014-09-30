<?php
$this->breadcrumbs=array(
	'Parametrosglobalesvalores',
);

$this->menu=array(
	array('label'=>'Create Parametrosglobalesvalores','url'=>array('create')),
	array('label'=>'Manage Parametrosglobalesvalores','url'=>array('admin')),
);
?>

<h1>Parametrosglobalesvalores</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
