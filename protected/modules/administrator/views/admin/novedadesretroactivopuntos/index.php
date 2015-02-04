<?php
$this->breadcrumbs=array(
	'Novedadesretroactivopuntoses',
);

$this->menu=array(
	array('label'=>'Create Novedadesretroactivopuntos','url'=>array('create')),
	array('label'=>'Manage Novedadesretroactivopuntos','url'=>array('admin')),
);
?>

<h1>Novedadesretroactivopuntoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
