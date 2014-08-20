<?php
$this->breadcrumbs=array(
	'Novedadesmensuales',
);

$this->menu=array(
	array('label'=>'Create Novedadesmensuales','url'=>array('create')),
	array('label'=>'Manage Novedadesmensuales','url'=>array('admin')),
);
?>

<h1>Novedadesmensuales</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
