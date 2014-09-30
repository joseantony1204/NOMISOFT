<?php
$this->breadcrumbs=array(
	'Parametrosglobales',
);

$this->menu=array(
	array('label'=>'Create Parametrosglobales','url'=>array('create')),
	array('label'=>'Manage Parametrosglobales','url'=>array('admin')),
);
?>

<h1>Parametrosglobales</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
